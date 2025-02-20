<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model {

    protected $table = 'products';

    public function __construct() {
        parent::__construct();
    }

    public function add(array $data_array){
        return $this->db->insert($this->table,$data_array);
    }

    public function update(int $id,array $data_array){
        return $this->db->where('id',$id)->update($this->table,$data_array);
    }

    public function all(){
        return $this->db->get($this->table)->result_array();
    }

    public function product(int $id){
        return $this->db->where('id',$id)->get($this->table)->row_array();
    }

    public function all_active(){
        return $this->db->where('status','enable')->get($this->table)->result_array();
    }

    public function shop_products(){
        return $this->db->where('status','enable')->where('stock >',0)->get($this->table)->result_array();
    }

    public function update_qty(int $product,int $qty){
        $this->db->set('stock', 'stock + '.$qty, FALSE); // FALSE ensures raw SQL execution
        $this->db->where('id',$product); // Ensures the condition stays valid
        return $this->db->update($this->table);
    }

}
