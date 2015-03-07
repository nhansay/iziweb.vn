<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Index extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model(array('post_model', 'topic_model', 'comment_model', 'project_model'));
    }

    public function index() {
        $project_sql = array(
            'where' => 'show_in_home_page = 1',
            'order_by' => 'sort_order, id DESC'
        );
        $projects = $this->project_model->get($project_sql);

        $fields = array('id', 'title', 'post_date', 'excerpt');
        $news_sql = array(
            'where' => "status = 1 AND post_type = 'post' AND topic_id = 1",
            'order_by' => 'post_date DESC, id DESC',
            'limit' => 3,
            'offset' => 0
        );
        $top_news = $this->post_model->get_by_top($news_sql, $fields);

        $blog_sql = array(
            'where' => "status = 1 AND post_type = 'post' AND topic_id = 2",
            'order_by' => 'post_date DESC, id DESC',
            'limit' => 3,
            'offset' => 0
        );
        $top_blog = $this->post_model->get_by_top($blog_sql, $fields);

        $data_temp['content'] = array(
            'projects' => $projects,
            'top_news' => $top_news,
            'top_blog' => $top_blog
        );

        $data['tag_title'] = 'Tổng quan';
        $data['tag_keywords'] = 'Tổng quan';
        $data['tag_description'] = 'Tổng quan';

        $this->template->load_default_view('index', $data_temp, $data);
    }
}