<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Admin_Controller {

    public function __construct() {
        parent::__construct();
    }

	public function index()
	{
        $data=array(
            'main_page'=>'admin/dashboard',
            'auth_user'=>$this->auth_user
        );
        $this->load->view('admin/template',$data);
	}

}
