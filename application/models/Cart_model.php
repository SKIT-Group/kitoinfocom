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

}
