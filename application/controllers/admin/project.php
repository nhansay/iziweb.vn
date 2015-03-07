<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Project extends CI_Controller {
    public function __construct() {
        parent::__construct();

        if(!$this->session->userdata('user') || $this->session->userdata('user') != 'admin') {
            redirect('/admin/login');
        }

        $this->load->model('project_model');
        $this->form_validation->set_error_delimiters('<p class="error-message">', '</p>');
    }

    public function index($page = 1) {
        $fields = array('id', 'img', 'title', 'link', 'show_in_home_page', 'sort_order');
        $sql = array(
            'current' => $page,
            'per_page' => PER_PAGE_ADMIN
        );
        $projects = $this->project_model->get_by_pagination($sql, $fields);
        $config = array(
            'url' => 'admin/project',
            'per-page' => PER_PAGE_ADMIN,
            'total' => $this->project_model->count()
        );

        $data_temp['content'] = array(
            'projects'=>$projects,
            'pagination'=>pagination($config, $page)
        );

        $this->template->load_admin_view('catalog/project', $data_temp);
    }

    public function add_new() {
        $this->form_validation->set_rules('title', 'Tiêu đề', 'trim|required|xss_clean');

        if ($this->form_validation->run() == FALSE)
        {
            $data_temp['content'] = array(
                'projects' => $this->project_model->get()
            );

            $this->template->load_admin_view('catalog/project_form', $data_temp);
        }
        else {
            // add new
            $post_array = $this->input->post();
            $this->project_model->insert($post_array);
            redirect('admin/project');
        }
    }

    public function edit($id = '') {
        $this->form_validation->set_rules('title', 'Tiêu đề', 'trim|required|xss_clean');

        if ($this->form_validation->run() == FALSE)
        {
            if ($id == '') redirect('admin/project');
            $data_temp['content'] = array(
                'project'=>$this->project_model->get_id($id)
            );

            $this->template->load_admin_view('catalog/project_edit', $data_temp);
        }
        else {
            // submit editing
            $post_array = $this->input->post();
            $this->project_model->update($post_array['id'], $post_array);

            redirect('admin/project');
        }
    }

    public function delete($id = '', $token = '') {
        if ($id == '') redirect('admin/project');
        if ($token != $this->security->get_csrf_hash()) show_404();
        else {
            $this->project_model->delete($id);
            redirect('admin/project');
        }
    }

    public function mass_action() {
        $action = $this->input->post('action', true);
        if ($action == '') redirect('admin/project');
        if ($action == 'delete') {
            foreach ($this->input->post('check') as $key=>$value) {
                $this->project_model->delete($key);
            }
            redirect('/admin/project');
        }
    }
}