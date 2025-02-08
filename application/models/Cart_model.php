<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart_model extends CI_Model {

    protected $table = 'carts';

    public function __construct() {
        parent::__construct();
    }

    public function product_in_cart(int $user,int $product){
        return $this->db->where('user',$user)->where('product',$product)->get($this->table)->row_array();
    }

    public function update_cart(array $cart_product){
        $exists = $this->db->select('id')->where('user',$cart_product['user'])->where('product',$cart_product['product'])->get($this->table)->row_array();

        if($exists){
            return $this->db->where('id',$exists['id'])->update($this->table,$cart_product);
        }else{
            return $this->db->insert($this->table,$cart_product);
        }

    }

    public function remove_product($user,$product){
        return $this->db->where('user',$user)->where('product',$product)->delete($this->table);
    }

    public function my_cart(int $user){
        $this->db->select('c.*, p.stock as product_stock, p.img as product_img, p.name as product_name, p.price as product_price')->from($this->table." as c");
        $this->db->join('products as p',"c.product=p.id");
        $this->db->where('c.user',$user);
        return $this->db->get()->result_array();
    }

    public function insert_batch(array $batch){
        $this->db->insert_batch($this->table, $batch);
        return $this->db->affected_rows();
    }

}
