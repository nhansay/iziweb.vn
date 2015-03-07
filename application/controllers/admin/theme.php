<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Theme extends CI_Controller {
    public function __construct() {
        parent::__construct();

        if(!$this->session->userdata('user') || $this->session->userdata('user') != 'admin') {
            redirect('/admin/login');
        }

        $this->load->model(array('category_model', 'theme_model'));

        $this->load->helper('category_option');
        $this->form_validation->set_error_delimiters('<p class="error-message">', '</p>');
    }

    public function index($page = 1) {
        $fields = array('id', 'title', 'price', 'thumbnail', 'link_demo', 'sort_order');
        $sql = array(
            'current' => $page,
            'per_page' => PER_PAGE_ADMIN,
            'order_by' => 'id DESC'
        );
        $themes = $this->theme_model->get_theme_by_pagination($sql, $fields);

        $config = array(
            'url' => 'admin/theme',
            'per-page' => PER_PAGE_ADMIN,
            'total' => $this->theme_model->count()
        );

        $data_temp['content'] = array(
            'themes'=>$themes,
            'pagination'=>pagination($config, $page)
        );

        $this->template->load_admin_view('catalog/theme', $data_temp);
    }

    public function search($key = '', $page = 1) {
        $fields = array('id', 'title', 'price', 'thumbnail', 'link_demo', 'sort_order');
        $where = "theme.title LIKE '%".$key."%'";
        $sql = array(
            'current' => $page,
            'per_page' => PER_PAGE_ADMIN,
            'where' => $where,
            'order_by' => 'id DESC'
        );
        $themes = $this->theme_model->get_theme_by_pagination($sql, $fields);
        $config = array(
            'url' => ('admin/theme/search/'.$key),
            'per-page' => PER_PAGE_ADMIN,
            'total' => $this->theme_model->count($where)
        );

        $data_temp['content'] = array(
            'cat'=>'',
            'themes'=>$themes,
            'pagination'=>pagination($config, $page)
        );

        $this->template->load_admin_view('catalog/theme', $data_temp);
    }

    public function add_new() {
        $this->form_validation->set_rules('title', 'Tiêu đề', 'trim|required|xss_clean');

        if ($this->form_validation->run() == FALSE)
        {
            $data_temp['content'] = array(
                'categories' => $this->category_model->get()
            );

            $this->template->load_admin_view('catalog/theme_form', $data_temp);
        }
        else {
            // add new
            $post_array = $this->input->post();
            $this->theme_model->insert($post_array);

            redirect('admin/theme');
        }
    }

    public function edit($id = '') {
        $this->form_validation->set_rules('title', 'Tiêu đề', 'trim|required|xss_clean');

        if ($this->form_validation->run() == FALSE)
        {
            if ($id == '') redirect('admin/theme');
            $data_temp['content'] = array(
                'theme'=>$this->theme_model->get_id($id),
                'categories' => $this->category_model->get()
            );

            $this->template->load_admin_view('catalog/theme_edit', $data_temp);
        }
        else {
            // submit editing
            $post_array = $this->input->post();
            $this->theme_model->update($post_array['id'], $post_array);

            redirect('admin/theme');
        }
    }

    public function delete($id = '', $token = '') {
        if ($id == '') redirect('admin/theme');
        if ($token != $this->session->userdata("token")) show_404();
        else {
            $this->theme_model->delete($id);
            redirect('admin/theme');
        }
    }

    public function mass_action() {
        $action = $this->input->post('action', true);
        if ($action == '') redirect('admin/theme');
        if ($action == 'delete') {
            foreach ($this->input->post('check') as $key=>$value) {
                $this->theme_model->delete($key);
            }
            redirect('admin/theme');
        }
    }
}