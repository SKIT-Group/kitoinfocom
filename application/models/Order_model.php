<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order_model extends CI_Model {

    protected $order_table = 'orders';
    protected $order_details_table = 'order_details';

    public function __construct() {
        parent::__construct();
    }

    public function add(array $order,$products){
        $order['address']=json_encode($order['address']);
        $this->db->insert($this->order_table,$order);

        $order_id = $this->db->insert_id();

        if(!$order_id){
            return false;
        }

        $total_amount=0;
        $product_details=[];
        foreach ($products as $key => $value) {
            $product_details[]=array(
                'order_id'=>$order_id,
                'product'=>$value['product'],
                'qty'=>$value['qty'],
                'amount'=>$value['qty']*$value['product_price']
            );
            $total_amount+=$value['qty']*$value['product_price'];
        }

        $this->db->insert_batch($this->order_details_table, $product_details);
        if(!$this->db->affected_rows()){
            return false;
        }

        return $this->db->where('id',$order_id)->update($this->order_table,['total_amount'=>$total_amount]);

    }

}
