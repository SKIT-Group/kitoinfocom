<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authenticate_Controller extends CI_Controller {
    protected $auth_user;
    public function __construct() {
        parent::__construct();
        if(!$this->session->has_userdata('auth_user')){
            return redirect(base_url('login'));
            die;
        }
        $this->load->model('user_model');

        $this->auth_user = $this->user_model->user($this->session->userdata('auth_user'));
        if(!$this->auth_user){
            $this->session->sess_destroy();
            return redirect(base_url('login'));
        }

    }
}

class Admin_Controller extends Authenticate_Controller {

    public function __construct() {
        parent::__construct();
        if($this->auth_user['type']!=='admin'){
            return redirect(base_url('login'));
        }
    }


}
