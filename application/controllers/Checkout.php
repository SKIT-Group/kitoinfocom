<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout extends Authenticate_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model('product_model');
        $this->load->model('cart_model');
        $this->load->model('order_model');
        $this->load->helper('captcha');
    }

    public function index(){
        if (!extension_loaded('gd')) {
            die("Technical error try sometime latter");
        }

        $config = array(
            'img_path'      => './uploads/captcha/',
            'img_url'       => base_url('uploads/captcha/'), 
            'font_path'     => './system/fonts/texb.ttf',
            'img_width'     => 150,
            'img_height'    => 50,
            'expiration'    => 600, // 10 sec
            'word_length'   => 6,
            'font_size'     => 20,
            'img_id'        => 'captcha_img',
            'pool'          => '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',
            'colors'        => array(
                'background' => array(255, 255, 255),
                'border' => array(0, 0, 0),
                'text' => array(0, 0, 0),
                'grid' => array(255, 40, 40)
            )
        );
    
        $captcha = create_captcha($config);
        $this->session->set_userdata('captcha',$captcha['word']);
        $data=array(
            'auth_user'=>$this->auth_user,
            'captcha'=>$captcha,
        );
        
        $data['cart_products']=$this->cart_model->checkout_product($this->auth_user['id']);

        $this->load->view('checkout',$data);
    }

    public function pay(){
        $response['status']=false;
        $request_data = $this->input->post();

        $this->form_validation->validation_data=$request_data;

        $this->form_validation->set_rules('name', 'Name', 'required|max_length[30]|min_length[3]|regex_match[/^[a-zA-Z ]+$/]', ['regex_match' => 'In {field} Only alphabets and spaces are allowed.']);
        
        $this->form_validation->set_rules('mobile', 'Mobile', 'required|regex_match[/^[6-9]\d{9}$/]',['regex_match' => 'Invalid mobile number.']);

        $this->form_validation->set_rules('state', 'State', 'required|max_length[20]|min_length[3]|regex_match[/^[a-zA-Z ]+$/]', ['regex_match' => 'In {field} Only alphabets and spaces are allowed.']);
        
        $this->form_validation->set_rules('city', 'City', 'required|max_length[20]|min_length[3]|regex_match[/^[a-zA-Z ]+$/]', ['regex_match' => 'In {field} Only alphabets and spaces are allowed.']);

        $this->form_validation->set_rules('street', 'Street', 'required|max_length[50]|min_length[3]|regex_match[/^[a-zA-Z ]+$/]', ['regex_match' => 'In {field} Only alphabets and spaces are allowed.']);

        $this->form_validation->set_rules('apartment', 'Apartment', 'max_length[30]|min_length[3]|regex_match[/^[a-zA-Z ]+$/]', ['regex_match' => 'In {field} Only alphabets and spaces are allowed.']);

        $this->form_validation->set_rules('zipcode', 'Zip Code', 'required|regex_match[/^[1-9][0-9]{5}$/]', ['regex_match' => 'Invalid ZIP code.']);

        $this->form_validation->set_rules('captcha', 'Captcha', 'required|max_length[6]');
        $this->form_validation->set_rules('address_type', 'Address Type', 'required|in_list[office,home]');
        $this->form_validation->set_rules('order_note', 'Order Note', 'max_length[100]');

        if (!$this->form_validation->run()) {
            $response['errors']=$this->form_validation->error_array();

            return $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
        }

        if($request_data['captcha']!==$this->session->userdata('captcha')){
            $response['errors']=['error'=>"wrong captcha"];

            return $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
        }

        $cart_products = $this->cart_model->checkout_product($this->auth_user['id']);

        if(!$cart_products){
            $response['errors']=['error'=>"You don't have any item in cart"];

            return $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
        }

        $order = array(
            'user'=>$this->auth_user['id'],
            'address'=>array(
                'name'=>$request_data['name'],
                'mobile'=>$request_data['mobile'],
                'state'=>$request_data['state'],
                'city'=>$request_data['city'],
                'street'=>$request_data['street'],
                'apartment'=>$request_data['apartment'],
                'zipcode'=>$request_data['zipcode'],
                'address_type'=>$request_data['address_type'],
                'order_note'=>$request_data['order_note'],
            ),
            'payment_method'=>'paypal',
        );

        if(!$this->order_model->add($order,$cart_products)){
            $response['errors']=['error'=>'Technical error try someime latter'];

            return $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
        }
        
        $this->session->unset_userdata('captcha');
        $response['status']=true;
        return  $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($response));

    }

}
