<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    protected $table = 'users';

    public function __construct() {
        parent::__construct();
    }

    public function user($id){
        return $this->db->where('id',$id)->get($this->table)->row_array();
    }

    public function find_user($email){
        return $this->db->where('email',$email)->get($this->table)->row_array();
    }

}
