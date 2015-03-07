<?php
class Base_model extends CI_Model {

	public $table_name = '';
	
    public function __construct()
    {
        parent::__construct();
    }
    
	public function count($where = '')
    {
        if ($where != '') $this->db->where($where);
    	return $this->db->count_all_results($this->table_name);
    }

    public function get_id($id = '', $fields = array())
    {
        if ($id == '') return false;
        if (!empty($fields)) $this->db->select(implode(',', $fields));
        return $this->db->get_where($this->table_name, array('id' => $id))->row_array();
    }

    public function get($sql = array(), $fields = array())
    {
        if (!empty($fields)) $this->db->select(implode(',', $fields));
        if (isset($sql['where']) && $sql['where'] != '') $this->db->where($sql['where']);
        if (isset($sql['order_by']) && $sql['order_by'] != '') $this->db->order_by($sql['order_by']);
        return $this->db->get($this->table_name)->result_array();
    }

    public function get_by_top($sql = array(), $fields = array())
    {
        if (!empty($fields)) $this->db->select(implode(',', $fields));
        if (isset($sql['where']) && $sql['where'] != '') $this->db->where($sql['where']);
        if (isset($sql['order_by']) && $sql['order_by'] != '') $this->db->order_by($sql['order_by']);
        $this->db->limit($sql['limit'], $sql['offset']);
        return $this->db->get($this->table_name)->result_array();
    }

    public function get_by_pagination($sql = array(), $fields = array())
    {
        $sql['limit'] = $sql['per_page'];
        $sql['offset'] = ($sql['current'] - 1)*$sql['per_page'];
        return $this->get_by_top($sql, $fields);
    }

    public function insert($array = array())
    {
        if (!empty($array))
        {
            $this->db->insert($this->table_name, $array);
            return $this->db->insert_id();
        }
        return false;
    }

    public function update($id = '', $array = '')
    {
        if ($id == '' || empty($array)) return false;
    	$this->db->where('id', $id);
        return $this->db->update($this->table_name, $array);
    }

    public function delete($id = '')
    {
        if ($id == '') return false;
    	$this->db->where('id', $id);
        return $this->db->delete($this->table_name);
    }

    public function delete_where($where = '') {
        if ($where == '') return false;
        $this->db->where($where);
        return $this->db->delete($this->table_name);
    }
}