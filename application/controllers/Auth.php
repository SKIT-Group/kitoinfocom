<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('user_model');
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
        return  $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($response));
    }

    public function logout() {
        $this->session->sess_destroy();
        return redirect(base_url('login'));
    }

}
