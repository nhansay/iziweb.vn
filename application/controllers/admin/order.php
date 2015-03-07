<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Order extends CI_Controller {
    public function __construct() {
        parent::__construct();

        if(!$this->session->userdata('user') || $this->session->userdata('user') != 'admin') {
            redirect('/admin/login');
        }

        $this->load->model(array('order_model', 'theme_model'));
        $this->form_validation->set_error_delimiters('<p class="error-message">', '</p>');
    }

    public function index($page = 1) {
        $fields = array('id', 'order_time', 'full_name', 'phone', 'status', 'theme_id');
        $sql = array(
            'current' => $page,
            'per_page' => PER_PAGE_ADMIN,
            'order_by' => 'id DESC'
        );
        $orders = $this->order_model->get_by_pagination($sql, $fields);
        $config = array(
            'url'=>'admin/order',
            'per-page' => PER_PAGE_ADMIN,
            'total' => $this->order_model->count()
        );

        $data_temp['content'] = array(
            'orders'=>$orders,
            'pagination'=>pagination($config, $page)
        );

        $this->template->load_admin_view('sale/order', $data_temp);
    }

    public function view($id = '') {
        if ($id == '') redirect('admin/order');
        $order = $this->order_model->get_id($id);
        if (!$order) redirect('admin/order');

        $data_temp['content'] = array(
            'order'=>$order
        );

        $this->template->load_admin_view('sale/order_detail', $data_temp);
    }

    public function check_out($id = '', $token = '') {
        if ($id == '') redirect('admin/order');
        if ($token != $this->security->get_csrf_hash()) show_404();
        else {
            $order = $this->order_model->get_id($id);
            $order['status'] = 0;
            $this->order_model->update($id, $order);
            redirect('admin/order');
        }
    }

    public function delete($id = '', $token = '') {
        if ($id == '') redirect('admin/order');
        if ($token != $this->security->get_csrf_hash()) show_404();
        else {
            $this->order_model->delete($id);
            redirect('admin/order');
        }
    }

    public function mass_action() {
        $action = $this->input->post('action', true);
        if ($action == '') redirect('admin/order');
        if ($action == 'delete') {
            foreach ($this->input->post('check') as $key=>$value) {
                $this->order_model->delete($key);
            }
            redirect('/admin/order');
        }
    }
}