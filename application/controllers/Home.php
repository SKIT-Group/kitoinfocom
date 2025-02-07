<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Public_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model('product_model');
    }

	public function index()
	{
		$data=array(
			'auth_user'=>$this->auth_user,
		);

		$data['available_products'] = $this->product_model->shop_products();

		$this->load->view('home',$data);
	}

}
