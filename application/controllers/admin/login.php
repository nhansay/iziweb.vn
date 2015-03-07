<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
    public function __construct() {
        parent::__construct();
        if ($this->session->userdata('user') == 'admin')
        {
            redirect('admin');
        }
        $this->load->model('user_model');
        $this->form_validation->set_error_delimiters('<p class="error-message">', '</p>');
    }

    public function index() {
        $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'Mật khẩu', 'required|md5|callback_check_user');

        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('admin/login');
        }
        else {
            redirect('admin');
        }
    }

    public function check_user($password) {
        $username = $this->input->post('username');
        $where = "username = '$username' AND password = '$password'";
        $sql = array('where' => $where);
        $users = $this->user_model->get($sql);

        if (sizeof($users) >= 1) {
            $user = $users[0];
            $this->session->set_userdata(array(
                    'user' => 'admin',
                    'id' => $user['id'],
                    'username' => $user['username']
            ));
            return true;
        }
        else {
            $this->form_validation->set_message('check_user', 'Sai tên đăng nhập hoặc mật khẩu!');
            return false;
        }
    }
}