<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('cart_model');
        $this->load->model('product_model');
    }

	public function index()
	{
		$this->load->view('auth/login');
	}

    public function login(){
        $response['status']=false;
        $request_data =  $this->input->post();

        $this->form_validation->validation_data=$request_data;
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');

        if (!$this->form_validation->run()) {
            $response['errors']=$this->form_validation->error_array();

            return $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
        }

        $user = $this->user_model->find_user($request_data['email']);
        if(!$user){
            $response['errors']=['user'=>"user not found"];
            
            return $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
        }

        if(!password_verify($request_data['password'],$user['pswd']))
        {
            $response['errors']=['password'=>"Wrong Password"];
            
            return $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
        }

        $this->session->set_userdata('auth_user',$user['id']);
        
        $response['status']=true;
        $response['user']=$user['type'];
        return  $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($response));
    }

    public function logout() {
        $this->session->sess_destroy();
        return redirect(base_url('login'));
    }

    public function signup(){
        $response['status']=false;
        $request_data =  $this->input->post();

        $this->form_validation->validation_data=$request_data;
        $this->form_validation->set_rules('name', 'Name', 'required|alpha_numeric_spaces|min_length[3]|max_length[20]');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|regex_match[/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{6,15}$/]',array('regex_match' => 'The {field} must be 6-15 characters long and contain at least one uppercase letter, one lowercase letter, one number, and one special character.'));
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');

        if (!$this->form_validation->run()) {
            $response['errors']=$this->form_validation->error_array();

            return $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
        }

        $customer = array(
            'name'=>$request_data['name'],
            'email'=>$request_data['email'],
            'pswd'=>$request_data['password'],
        );

        $user_id = $this->user_model->add_customer($customer);

        if(!$user_id){
            $response['errors']=['error'=>'Technical error try sometime latter'];

            return $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
        }

        $this->session->set_userdata('auth_user',$user_id);
        if(!$this->load_cart())
        {
            $response['errors']=['error'=>'Technical error try sometime latter'];

            return $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
        }

        $response['status']=true;
        return  $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($response));
    }

    protected function load_cart(){
        $user = $this->session->userdata('auth_user');
        $cart = $this->session->userdata('cart') ?? [];

        foreach ($cart as $key => $value) {
            $tmp_product = $this->product_model->product($value['product']);
            $cart[$key]['user']=$user;
            $cart[$key]['qty']=$value['qty']>$tmp_product['stock']?$tmp_product['stock']:$value['qty'];
        }

        if(sizeof($cart)>0 && !$this->cart_model->insert_batch($cart)){
            return false;
        }

        $this->session->unset_userdata('cart');

        return true;
    }

}
