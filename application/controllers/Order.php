<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends Authenticate_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model('order_model');
    }

    public function index(){
        $data=array(
            'orders'=>$this->order_model->my_orders($this->auth_user['id']),
        );
        $this->load->view('orders',$data);
    }

    public function payment_verify(int $order){
        $response ['status'] = false;

        $order_details = $this->order_model->order($order);

        if(!$order_details)
        {
            $response['msg']="Order not found";

            return  $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
        }

        $this->load->library('paypal');

        $result = $this->paypal->capture_order($order_details['payment_id']);

        if($result['status']){
            $this->order_model->update_payment($request_data['token'],'complete');
        }else{
            $response['msg']="Wait SomeTime";
            return  $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
        }
        
        $response['status']=true;
        return  $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($response));
    }

}
