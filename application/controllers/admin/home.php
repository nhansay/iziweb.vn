<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
    public function __construct() {
        parent::__construct();

        if(!$this->session->userdata('user') || $this->session->userdata('user') != 'admin') {
            redirect('/admin/login');
        }

        $this->load->model(array('order_model', 'theme_model', 'customer_model', 'comment_model'));
    }

    public function index() {
//        date_default_timezone_set('Asia/Bangkok');
//        // re-check number of online
//        $time = time() - 600;
//        $this->online_model->delete_where("on_time < $time");
//        $today = date('Y-m-d H:i:s');
//        $yesterday = date('Y-m-d H:i:s',strtotime("-1 days"));
//
//        $days_list = array('CN', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7');
//        $today_w = date('w');
//        $seven_days = array();
//        $x = 0;
//        for ($i = $today_w + 7; $i > $today_w; $i--) {
//            $seven_days[$x]['day'] = $days_list[$i%7];
//            $seven_days[$x]['sale'] = $this->order_model->get_sale_of_day(date('Y-m-d H:i:s',strtotime(-($x).' days')));
//            $x++;
//        }

        $data_temp['content'] = array(
//            'new_order_number' => $this->order_model->count('status = 1'),
//            'new_order_amount' => $this->order_model->get_new_order_amount(),
//            'comment_number' => $this->comment_model->count("comment_time <= '$today' AND comment_time >= '$yesterday'"),
//            'online_number' => $this->online_model->count(),
//            'seven_days' => $seven_days,
//            'top_sale' => $this->product_order_model->get_top_sale()
        );

        $this->template->load_admin_view('home/home', $data_temp);
    }
}