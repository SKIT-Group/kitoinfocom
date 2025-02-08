<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Public_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model('product_model');
        $this->load->model('cart_model');
    }

	public function index()
	{
		$data=array(
			'auth_user'=>$this->auth_user,
		);

		$data['available_products'] = $this->product_model->shop_products();
		$data['cart_products']=$this->cart_products();
		$data['cart_product_qty']=sizeof($data['cart_products']);

		$this->load->view('home',$data);
	}

	protected function cart_products(){
		$my_cart = [];
		if($this->auth_user){
			$my_cart = $this->cart_model->my_cart($this->auth_user['id']);
		}else{
			$my_cart = $this->session->userdata('cart') ?? [];
			foreach ($my_cart as $key => $value) {
				$product_tmp = $this->product_model->product($value['product']);
				$my_cart[$key]['product_name']=$product_tmp['name'];
				$my_cart[$key]['product_price']=$product_tmp['price'];
				$my_cart[$key]['product_img']=$product_tmp['img'];
				$my_cart[$key]['product_stock']=$product_tmp['stock'];
			}
		}

		return $my_cart;
	}

	public function test(){
		echo "<pre>";
		print_r($_SESSION);
		die;
	}

}
