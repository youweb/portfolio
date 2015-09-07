<?php

class MY_Model extends CI_Model
{

    protected $_table_name = '';
    protected $_primary_key = 'id';
    protected $_primary_filter = 'intval';
    protected $_order_by = '';
    protected $_rules = array();
    protected $_timestamps = FALSE;

    function __construct()
    {
        parent::__construct();
    }

    public function array_from_post($fields)
    {
        $data = array();
        foreach ($fields as $field) {
            $data[$field] = $this->input->post($field);
        }
        return $data;
    }

    public function get($id = NULL, $single = FALSE)
    {

        if ($id != NULL) {
            $filter = $this->_primary_filter;
            $id = $filter($id);
            $this->db->where($this->_primary_key, $id);
            $method = 'row';
        } elseif ($single == TRUE) {
            $method = 'row';
        } else {
            $method = 'result';
        }
        //if (!count($this->db->ar_orderby)) {
            $this->db->order_by($this->_order_by);
        //}
        return $this->db->get($this->_table_name)->$method();
    }

    public function get_by($where, $single = FALSE)
    {
        $this->db->where($where);
        return $this->get(NULL, $single);
    }

    public function get_what($what)
    {
        $this->db->select($what);
        return $this->get(NULL, NULL);
    }


    public function get_list($where = 0, $limit = 0, $offset = 0)
    {
        !$where || $this->db->where($where);
        !$limit || $this->db->limit($limit, $offset);


        return $this->get(NULL, NULL);
    }


    public function save($data, $id = NULL)
    {

        // Set timestamps
        if ($this->_timestamps == TRUE) {
            $now = time(); //date('Y-m-d H:i:s');
            $id || $data['created'] = $now;
            $data['modified'] = $now;
        }

        // Insert
        if ($id === NULL) {
            !isset($data[$this->_primary_key]) || $data[$this->_primary_key] = NULL;
            $this->db->set($data);
            $this->db->insert($this->_table_name);
            $id = $this->db->insert_id();
        } // Update
        else {
            $filter = $this->_primary_filter;
            $id = $filter($id);
            $this->db->set($data);
            $this->db->where($this->_primary_key, $id);
            $this->db->update($this->_table_name);
        }

        return $id;
    }

    public function delete($id)
    {
        $filter = $this->_primary_filter;
        $id = $filter($id);

        if (!$id) {
            return FALSE;
        }
        $this->db->where($this->_primary_key, $id);
        $this->db->limit(1);
        $this->db->delete($this->_table_name);
    }

    public function get_array_from_field($field, $where = 0){
        $this->db->select($field);
        !$where || $this->db->where($where);
        $query = $this->db->get($this->_table_name);
        if (!$query->num_rows()) return 0;
        return $query->result_array();
    }

    public function scalar($field, $where = 0)
    {
        $this->db->select($field);
        !$where || $this->db->where($where);
        $query = $this->db->get($this->_table_name);

        if (!$query->num_rows()) return 0;

        $row = $query->row_array();
        return $row[$field];
    }


    public function num_rows($where = 0)
    {

        !$where || $this->db->where($where);
        return $this->db->get($this->_table_name)->num_rows();

    }


}