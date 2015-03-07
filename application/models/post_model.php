<?php
class Post_model extends Base_model {
    public $table_name = 'post';

    public function get_post_by_top($sql = array(), $fields = array())
    {
        if (empty($fields)) {
            $fields = $this->db->list_fields('theme');
        }
        $select = $this->table_name.'.'.implode(','.$this->table_name.'.', $fields).',topic.name as topic_name';

        $this->db->select($select);
        $this->db->join('topic', $this->table_name.'.topic_id = topic.id');
        if (isset($sql['where']) && $sql['where'] != '') $this->db->where($sql['where']);
        if (isset($sql['order_by']) && $sql['order_by'] != '') $this->db->order_by($sql['order_by']);
        $this->db->limit($sql['limit'], $sql['offset']);
        return $this->db->get($this->table_name)->result_array();
    }

    public function get_post_by_pagination($sql = array(), $fields = array())
    {
        $sql['limit'] = $sql['per_page'];
        $sql['offset'] = ($sql['current'] - 1)*$sql['per_page'];
        return $this->get_post_by_top($sql, $fields);
    }
}