<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Page extends CI_Controller {
    public function __construct() {
        parent::__construct();

        if(!$this->session->userdata('user') || $this->session->userdata('user') != 'admin') {
            redirect('/admin/login');
        }

        $this->load->model(array('post_model'));
        $this->load->library('tag');
        $this->form_validation->set_error_delimiters('<p class="error-message">', '</p>');
    }

    public function index($page = 1) {
        $where = "post_type = 'page'";
        $sql = array(
            'current' => $page,
            'per_page' => PER_PAGE_ADMIN,
            'where' => $where,
            'order_by' => 'id DESC'
        );

        $fields = array('id', 'title', 'post_date', 'author', 'views', 'status');

        $posts = $this->post_model->get_by_pagination($sql, $fields);
        $config = array(
            'url' => 'admin/page',
            'per-page' => PER_PAGE_ADMIN,
            'total' => $this->post_model->count()
        );

        $data_temp['content'] = array(
            'posts'=>$posts,
            'pagination'=>pagination($config, $page)
        );

        $this->template->load_admin_view('article/page', $data_temp);
    }

    public function search($key = '', $page = 1) {
        $where = "post_type = 'page' AND title LIKE '%".$key."%'";
        $sql = array(
            'current' => $page,
            'per_page' => PER_PAGE_ADMIN,
            'where' => $where,
            'order_by' => 'id DESC'
        );

        $fields = array('id', 'title', 'post_date', 'author', 'views', 'status');

        $posts = $this->post_model->get_by_pagination($sql, $fields);
        $config = array(
            'url' => ('admin/page/search/'.$key),
            'per-page' => PER_PAGE_ADMIN,
            'total' => $this->post_model->count()
        );

        $data_temp['content'] = array(
            'posts'=>$posts,
            'pagination'=>pagination($config, $page)
        );

        $this->template->load_admin_view('article/page', $data_temp);
    }

    public function add_new() {
        $this->form_validation->set_rules('title', 'Tiêu đề', 'trim|required|xss_clean');

        if ($this->form_validation->run() == FALSE)
        {
            $data_temp['content'] = array(

            );

            $this->template->load_admin_view('article/page_form', $data_temp);
        }
        else {
            // add new
            $post_array = $this->input->post();
            $post_array['post_type'] = 'page';
            if ($post_array['post_date'] == '') $post_array['post_date'] = date('Y-m-d');
            if ($post_array['excerpt'] == '') {
                $post_array['excerpt'] = strip_tags(implode(' ', array_slice(explode(' ', $post_array['content']), 0, NUMBER_EXCERPT_WORDS)));
            }
            $tag_array = convert_str_to_array($post_array['tags']);
            // to remove duplicate tags
            $post_array['tags'] = implode(',', $tag_array);

            $just_insert_id = $this->post_model->insert($post_array);
            $this->tag->make_tag($tag_array, $just_insert_id);
            redirect('admin/page');
        }
    }

    public function edit($id = '') {
        $this->form_validation->set_rules('title', 'Tiêu đề', 'trim|required|xss_clean');

        if ($this->form_validation->run() == FALSE)
        {
            if ($id == '') redirect('admin/page');
            $data_temp['content'] = array(
                'post'=>$this->post_model->get_id($id)
            );

            $this->template->load_admin_view('article/page_edit', $data_temp);
        }
        else {
            // submit editing
            $post_array = $this->input->post();
            if ($post_array['post_date'] == '') $post_array['post_date'] = date('Y-m-d');
            if ($post_array['excerpt'] == '') {
                $post_array['excerpt'] = strip_tags(implode(' ', array_slice(explode(' ', $post_array['content']), 0, NUMBER_EXCERPT_WORDS)));
            }
            $tag_array = convert_str_to_array($post_array['tags']);
            // to remove duplicate tags
            $post_array['tags'] = implode(',', $tag_array);

            $this->post_model->update($post_array['id'], $post_array);
            // delete post_tag then re-insert
            $this->tag->delete_tag($post_array['id']);
            $this->tag->make_tag($tag_array, $post_array['id']);

            redirect('admin/page');
        }
    }

    public function delete($id = '', $token = '') {
        if ($id == '') redirect('admin/page');
        if ($token != $this->security->get_csrf_hash()) show_404();
        else {
            $this->tag->delete_tag($id);
            $this->post_model->delete($id);
            redirect('admin/page');
        }
    }

    public function mass_action() {
        $action = $this->input->post('action', true);
        if ($action == '') redirect('admin/page');
        if ($action == 'delete') {
            foreach ($this->input->post('check') as $key=>$value) {
                $this->tag->delete_tag($key);
                $this->post_model->delete($key);
            }
            redirect('admin/page');
        }
    }
}