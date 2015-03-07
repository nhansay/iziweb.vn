<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category extends CI_Controller {
    public function __construct() {
        parent::__construct();

        if(!$this->session->userdata('user') || $this->session->userdata('user') != 'admin') {
            redirect('/admin/login');
        }

        $this->load->model('category_model');
        $this->form_validation->set_error_delimiters('<p class="error-message">', '</p>');
    }

    public function index($page = 1) {
        $fields = array('id', 'name', 'img', 'sort_order');
        $sql = array(
            'current' => $page,
            'per_page' => PER_PAGE_ADMIN
        );
        $categories = $this->category_model->get_by_pagination($sql, $fields);
        $config = array(
            'url' => 'admin/category',
            'per-page' => PER_PAGE_ADMIN,
            'total' => $this->category_model->count()
        );

        $data_temp['content'] = array(
            'categories'=>$categories,
            'pagination'=>pagination($config, $page)
        );

        $this->template->load_admin_view('catalog/category', $data_temp);
    }

    public function add_new() {
        $this->form_validation->set_rules('name', 'Tên', 'trim|required|xss_clean|is_unique[category.name]');
        $this->form_validation->set_rules('img', 'Hình ảnh', 'trim|xss_clean');
        $this->form_validation->set_rules('sort_order', 'Thứ tự', 'trim|xss_clean');
        $this->form_validation->set_rules('tag_title', 'Thẻ tiêu đề', 'trim|xss_clean');
        $this->form_validation->set_rules('tag_description', 'Thẻ mô tả', 'trim|xss_clean');
        $this->form_validation->set_rules('tag_keywords', 'Thẻ từ khóa', 'trim|xss_clean');

        if ($this->form_validation->run() == FALSE)
        {
            $data_temp['content'] = array(
                'categories' => $this->category_model->get()
            );

            $this->template->load_admin_view('catalog/category_form', $data_temp);
        }
        else {
            // add new
            $post_array = $this->input->post();
            $this->category_model->insert($post_array);
            redirect('admin/category');
        }
    }

    public function edit($id = '') {
        $this->form_validation->set_rules('name', 'Tên', 'trim|required|xss_clean|callback_check_unique');
        $this->form_validation->set_rules('img', 'Hình ảnh', 'trim|xss_clean');
        $this->form_validation->set_rules('sort_order', 'Thứ tự', 'trim|xss_clean');
        $this->form_validation->set_rules('tag_title', 'Thẻ tiêu đề', 'trim|xss_clean');
        $this->form_validation->set_rules('tag_description', 'Thẻ mô tả', 'trim|xss_clean');
        $this->form_validation->set_rules('tag_keywords', 'Thẻ từ khóa', 'trim|xss_clean');

        if ($this->form_validation->run() == FALSE)
        {
            if ($id == '') redirect('admin/category');
            $data_temp['content'] = array(
                'category'=>$this->category_model->get_id($id),
                'categories'=>$this->category_model->get('id != '.$id)
            );

            $this->template->load_admin_view('catalog/category_edit', $data_temp);
        }
        else {
            // submit editing
            $post_array = $this->input->post();
            $this->category_model->update($post_array['id'], $post_array);

            redirect('admin/category');
        }
    }

    public function check_unique($name) {
        $category = $this->category_model->get_id($this->input->post('id'));
        if ($name != $category['name'] && $this->category_model->count('name = \''.$name.'\'')) {
            $this->form_validation->set_message('check_unique', 'Danh mục đã tồn tại!');
            return false;
        }
        return true;
    }

    public function delete($id = '', $token = '') {
        if ($id == '') redirect('admin/category');
        if ($token != $this->security->get_csrf_hash()) show_404();
        else {
            $this->category_model->delete($id);
            $this->product_model->delete_where("category_id = $id");
            redirect('admin/category');
        }
    }

    public function mass_action() {
        $action = $this->input->post('action', true);
        if ($action == '') redirect('admin/category');
        if ($action == 'delete') {
            foreach ($this->input->post('check') as $key=>$value) {
                $this->category_model->delete($key);
                $this->product_model->delete_where("category_id = $key");
            }
            redirect('/admin/category');
        }
    }
}