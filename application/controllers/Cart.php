<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends Public_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model('product_model');
        $this->load->model('cart_model');
    }

	public function add(int $id)
	{
        $response['status']=false;
        
        $product = $this->product_model->product($id);

        if(!$product){
            $response['errors']=['error'=>'choose the right product'];

            return $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
        }

        if($this->auth_user){
            $product_in_cart = $this->cart_model->product_in_cart($this->auth_user['id'],$product['id']);
        }else{
            $product_in_cart = $this->product_in_cart($product['id']);
        }
        
        $qty = $product_in_cart ? $product_in_cart['qty'] + 1 : 1;

        if($qty>$product['stock']){
            $response['errors']=['error'=>"Stock Not Available"];
                    
            return $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
        }

        $cart_product = array(
            'user'=>$this->auth_user ? $this->auth_user['id'] : NULL,
            'product'=>$product['id'],
            'qty'=>$qty
        );

        $result = false;
        if($this->auth_user){
            $result = $this->cart_model->update_cart($cart_product);
        }else{
            $result = $this->update_cart($cart_product);
        }

        if(!$result){
            $response['errors']=['error'=>"Technical error ! Try some time latter"];
                    
            return $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
        }

        $response['status']=true;
        return $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($response));
	}

    public function update(int $id,int $qty){
        $response['status']=false;
        
        $product = $this->product_model->product($id);

        if(!$product){
            $response['errors']=['error'=>'choose the right product'];

            return $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
        }

        if($qty<1){
            $response['errors']=['error'=>'quantity cant be zero'];

            return $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
        }

        if($qty>$product['stock']){
            $response['errors']=['error'=>"Stock Not Available"];
                    
            return $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
        }

        $cart_product = array(
            'user'=>$this->auth_user ? $this->auth_user['id'] : NULL,
            'product'=>$product['id'],
            'qty'=>$qty
        );

        $result = false;
        if($this->auth_user){
            $result = $this->cart_model->update_cart($cart_product);
        }else{
            $result = $this->update_cart($cart_product);
        }

        if(!$result){
            $response['errors']=['error'=>"Technical error ! Try some time latter"];
                    
            return $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
        }

        $response['status']=true;
        return $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($response));
    }

    public function remove(int $product_id){
        $response['status']=false;

        $result = false;
        if($this->auth_user){

            $result = $this->cart_model->remove_product($this->auth_user,$product_id);

        }else{

            $result = $this->remove_cart_product($product_id);

        }

        if(!$result){
            $response['errors']=['error'=>"Technical error Try sometime latter!"];

            return $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));    
        }

        $response['status']=true;
        return $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($response));
    }

    protected function product_in_cart(int $product){
        $product_details = [];

        foreach ($this->session->userdata('cart') ?? [] as $key => $value) {
            if($value['product']==$product){
                $product_details=$value;
                break;
            }
        }

        return $product_details;
    }

    protected function update_cart(array $cart_product){
        $cart = $this->session->userdata('cart') ?? [];

        foreach ($cart as $key => $value) {
            if($value['product']==$cart_product['product']){
                $cart[$key]['qty']=$cart_product['qty'];
                $this->session->set_userdata('cart',$cart);
                return true;
            }
        }

        $cart[]=$cart_product;
        $this->session->set_userdata('cart',$cart);
        return true;
    }

    protected function remove_cart_product(int $product){
        $cart = $this->session->userdata('cart') ?? [];

        foreach ($cart as $key => $value) {
            if($value['product']==$product){

                array_splice($cart, $key, 1);

                $this->session->set_userdata('cart',$cart);
                return true;
            }
        }

        return true;
    }

}
