<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Post extends CI_Controller {
    public function __construct() {
        parent::__construct();

        if(!$this->session->userdata('user') || $this->session->userdata('user') != 'admin') {
            redirect('/admin/login');
        }

        $this->load->model(array('topic_model', 'post_model', 'tag_model', 'post_tag_model'));
        $this->load->helper('topic_option');
        $this->load->library('tag');
        $this->form_validation->set_error_delimiters('<p class="error-message">', '</p>');
    }

    public function index($topic = 0, $page = 1) {
        $where = "post_type = 'post'";
        if ($topic != 0) $where .= " AND topic_id = $topic";
        $sql = array(
            'current' => $page,
            'per_page' => PER_PAGE_ADMIN,
            'where' => $where,
            'order_by' => 'id DESC'
        );

        $fields = array('id', 'title', 'post_date', 'author', 'views', 'status');

        $topics = $this->topic_model->get();
        $posts = $this->post_model->get_post_by_pagination($sql, $fields);
        $config = array(
            'url' => 'admin/page',
            'per-page' => PER_PAGE_ADMIN,
            'total' => $this->post_model->count()
        );

        $data_temp['content'] = array(
            'topic'=>$topic,
            'topics'=>$topics,
            'posts'=>$posts,
            'pagination'=>pagination($config, $page)
        );

        $this->template->load_admin_view('article/post', $data_temp);
    }

    public function search($key = '', $page = 1) {
        $where = "post_type = 'post' AND title LIKE '%".$key."%'";
        $sql = array(
            'current' => $page,
            'per_page' => PER_PAGE_ADMIN,
            'where' => $where,
            'order_by' => 'id DESC'
        );

        $fields = array('id', 'title', 'post_date', 'author', 'views', 'status');

        $topics = $this->topic_model->get();
        $posts = $this->post_model->get_post_by_pagination($sql, $fields);
        $config = array(
            'url' => ('admin/post/search/'.$key),
            'per-page' => PER_PAGE_ADMIN,
            'total' => $this->post_model->count()
        );

        $data_temp['content'] = array(
            'topics'=>$topics,
            'posts'=>$posts,
            'pagination'=>pagination($config, $page)
        );

        $this->template->load_admin_view('article/post', $data_temp);
    }

    public function add_new() {
        $this->form_validation->set_rules('title', 'Tiêu đề', 'trim|required|xss_clean');

        if ($this->form_validation->run() == FALSE)
        {
            $data_temp['content'] = array(
                'topics' => $this->topic_model->get()
            );

            $this->template->load_admin_view('article/post_form', $data_temp);
        }
        else {

//            // add new
            $post_array = $this->input->post();
            $post_array['post_type'] = 'post';
            if ($post_array['post_date'] == '') $post_array['post_date'] = date('Y-m-d');
            if ($post_array['excerpt'] == '') {
                $post_array['excerpt'] = get_excerpt($post_array['content'], NUMBER_EXCERPT_WORDS);
            }
            $tag_array = convert_str_to_array($post_array['tags']);
            // to remove duplicate tags
            $post_array['tags'] = implode(',', $tag_array);

            $just_insert_id = $this->post_model->insert($post_array);
            $this->tag->make_tag($tag_array, $just_insert_id);
            redirect('admin/post');
        }
    }

    public function edit($id = '') {
        $this->form_validation->set_rules('title', 'Tiêu đề', 'trim|required|xss_clean');

        if ($this->form_validation->run() == FALSE)
        {
            if ($id == '') redirect('admin/post');
            $data_temp['content'] = array(
                'post'=>$this->post_model->get_id($id)
            );

            $this->template->load_admin_view('article/post_edit', $data_temp);
        }
        else {
            // submit editing
            $post_array = $this->input->post();
            if ($post_array['post_date'] == '') $post_array['post_date'] = date('Y-m-d');
            if ($post_array['excerpt'] == '') {
                $post_array['excerpt'] = get_excerpt($post_array['content'], NUMBER_EXCERPT_WORDS);
            }
            $tag_array = convert_str_to_array($post_array['tags']);
            // to remove duplicate tags
            $post_array['tags'] = implode(',', $tag_array);

            $this->post_model->update($post_array['id'], $post_array);
            // delete post_tag then re-insert
            $this->tag->delete_tag($post_array['id']);
            $this->tag->make_tag($tag_array, $post_array['id']);

            redirect('admin/post');
        }
    }

    public function delete($id = '', $token = '') {
        if ($id == '') redirect('admin/post');
        if ($token != $this->security->get_csrf_hash()) show_404();
        else {
            $this->tag->delete_tag($id);
            $this->post_model->delete($id);
            redirect('admin/post');
        }
    }

    public function mass_action() {
        $action = $this->input->post('action', true);
        if ($action == '') redirect('admin/post');
        if ($action == 'delete') {
            foreach ($this->input->post('check') as $key=>$value) {
                $this->tag->delete_tag($key);
                $this->post_model->delete($key);
            }
            redirect('/admin/post');
        }
    }
}