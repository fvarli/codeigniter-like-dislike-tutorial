<?php

class User_model extends CI_Model {
    public $table;

    public function __construct()
    {
        parent::__construct();
        $this->table = "users";
    }

    public function get_user($where = array())
    {
        return $this->db->where($where)->get($this->table)->row();
    }
}