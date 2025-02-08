<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order_model extends CI_Model {

    protected $order_table = 'orders';
    protected $order_details_table = 'order_details';

    public function __construct() {
        parent::__construct();
        $this->load->model('product_model');
    }

    public function add(array $order,$products){
        $this->db->trans_start();  // Start transaction

        $order['address']=json_encode($order['address']);
        $this->db->insert($this->order_table,$order);

        $order_id = $this->db->insert_id();

        $product_details=[];
        foreach ($products as $key => $value) {
            $product_details[]=array(
                'order_id'=>$order_id,
                'product'=>$value['product'],
                'qty'=>$value['qty'],
                'amount'=>$value['qty']*$value['product_price']
            );

            $this->product_model->update_qty($value['product'],-$value['qty']);

        }

        $this->db->insert_batch($this->order_details_table, $product_details);

        $this->db->trans_complete();  

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }

    }

    public function my_orders(int $user){
        return $this->db->where('user',$user)->get($this->order_table)->result_array();
    }

    public function update_payment($payment,$status){
        return $this->db->where('payment_id',$payment)->update($this->order_table,['payment_status'=>$status]);
    }

    public function order(int $order){
        return $this->db->where('id',$order)->get($this->order_table)->row_array();
    }

}
