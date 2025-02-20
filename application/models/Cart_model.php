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

    public function checkout_product(int $user) {
        $this->db->select('c.id, c.user, c.product, 
            (CASE WHEN c.qty > p.stock THEN p.stock ELSE c.qty END) as qty, 
            p.name as product_name, p.price as product_price');
        $this->db->from('carts as c');
        $this->db->join('products as p', 'c.product = p.id AND p.stock > 0', 'inner');
        $this->db->where('c.user', $user);
        $this->db->where('c.qty>',0);
        
        return $this->db->get()->result_array();
    }

    public function checkout_product_total(int $user) {
        $this->db->select('SUM(CASE 
        WHEN c.qty > p.stock THEN p.stock * p.price 
        ELSE c.qty * p.price 
            END) AS total_amount', false);
        $this->db->from('carts as c');
        $this->db->join('products as p', 'c.product = p.id AND p.stock > 0', 'inner');
        $this->db->where('c.user', $user);
        $this->db->where('c.qty >', 0);

        return $this->db->get()->row_array()['total_amount'];
    }

    public function delete_my_cart(int $user){
        return $this->db->where('user',$user)->delete($this->table);
    }

}
