<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {
    public function __construct() {
        parent::__construct();

        if(!$this->session->userdata('user') || $this->session->userdata('user') != 'admin') {
            redirect('admin/login');
        }

        $this->load->model('user_model');
        $this->form_validation->set_error_delimiters('<p class="error-message">', '</p>');
    }

    public function index($page = 1) {
        $sql = array(
            'current' => $page,
            'per_page' => PER_PAGE_ADMIN,
            'order_by' => 'id DESC'
        );
        $fields = array('id', 'username', 'email');
        $users = $this->user_model->get_by_pagination($sql, $fields);

        $config = array(
            'url' => 'admin/user',
            'per-page' => PER_PAGE_ADMIN,
            'total' => $this->user_model->count()
        );

        $data_temp['content'] = array(
            'users'=>$users,
            'pagination'=>pagination($config, $page)
        );

        $this->template->load_admin_view('user/user', $data_temp);
    }

    public function add_new() {
        $this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[user.username]|xss_clean');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[user.email]|');
        $this->form_validation->set_rules('password', 'Mật khẩu', 'required|matches[confirm]|md5');
        $this->form_validation->set_rules('confirm', 'Mật khẩu', 'required|md5');

        if ($this->form_validation->run() == FALSE)
        {
            $data_temp['content'] = array(

            );

            $this->template->load_admin_view('user/user_form', $data_temp);
        }
        else {
            // add new user
            $post_array = $this->input->post();
            unset($post_array['confirm']);
            $this->user_model->insert($post_array);
            redirect('admin/user');
        }
    }

    public function edit($id = '') {
        $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean|callback_check_username');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|callback_check_email');
        $this->form_validation->set_rules('old_password', 'Mật khẩu cũ', 'md5|callback_change_password');
        $this->form_validation->set_rules('password', 'Mật khẩu mới', 'matches[confirm]|md5');
        $this->form_validation->set_rules('confirm', 'Mật khẩu', 'md5');

        if ($this->form_validation->run() == FALSE)
        {
            if ($id == '') redirect('admin/user');
            $data_temp['content'] = array(
                'user'=>$this->user_model->get_id($id)
            );

            $this->template->load_admin_view('user/user_edit', $data_temp);
        }
        else {
            // submit editing user
            $post_array = $this->input->post();
            $user = $this->user_model->get_id($post_array['id']);
            if ($post_array['password'] == '') {
                $post_array['password'] = $user['password'];
            }
            unset($post_array['old_password']);
            unset($post_array['confirm']);
            $this->user_model->update($post_array['id'], $post_array);

            redirect('admin/user');
        }
    }

    public function check_username($username) {
        $user = $this->user_model->get_id($this->input->post('id'));
        if ($username != $user['username'] && $this->user_model->count("username = '$username'") >= 1) {
            $this->form_validation->set_message('check_username', 'Username đã sử dụng!');
            return false;
        }
        return true;
    }

    public function check_email($email) {
        $user = $this->user_model->get_id($this->input->post('id'));
        if ($email != $user['email'] && $this->user_model->count("email = '$email'") >= 1) {
            $this->form_validation->set_message('check_email', 'Email đã sử dụng!');
            return false;
        }
        return true;
    }

    public function change_password($old_password) {
        $post_array = $this->input->post();
        if ($old_password == '' && $post_array['password'] == '' && $post_array['confirm'] == '') return true;
        $user = $this->user_model->get_id($post_array['id']);
        if ($user['password'] != $old_password) {
            $this->form_validation->set_message('change_password', 'Mật khẩu cũ không khớp');
            return false;
        }
        return true;
    }

    public function delete($id = '', $token = '') {
        if ($id == '') redirect('admin/user');
        if ($token != $this->security->get_csrf_hash()) show_404();
        else {
            $this->user_model->delete($id);
            redirect('admin/user');
        }
    }

    public function mass_action() {
        $action = $this->input->post('action', true);
        if ($action == '') redirect('admin/user');
        if ($action == 'delete') {
            foreach ($this->input->post('check') as $key=>$value) {
                $this->user_model->delete($key);
            }
            redirect('/admin/user');
        }
    }
}