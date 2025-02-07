<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('upload');
        $this->load->model('product_model');
    }

	public function index()
	{
        $products = $this->product_model->all();

        $data=array(
            'main_page'=>'admin/product',
            'auth_user'=>$this->auth_user,
            'products'=>$products,
        );
        $this->load->view('admin/template',$data);
	}

    public function add(){
        $response['status']=false;
        $request_data = $this->input->post();

        $config['upload_path']   = './uploads/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size']      = 2048; // Max file size in KB (2MB)
        $config['file_name']     = time(); 

        $this->form_validation->validation_data=$request_data;
        $this->form_validation->set_rules('name', 'Name', 'required|max_length[250]');
        $this->form_validation->set_rules('stock', 'Stock', 'required|is_natural');
        $this->form_validation->set_rules('price', 'Price', 'required|is_natural_no_zero');

        if (!$this->form_validation->run()) {
            $response['errors']=$this->form_validation->error_array();

            return $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
        }

        
        $this->upload->initialize($config);

        if(!$this->upload->do_upload('image'))
        {
            $response['errors']=['image'=>$this->upload->display_errors()];

            return $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
        }

        $insert_data = array(
            'name'=>$request_data['name'],
            'price'=>$request_data['price'],
            'stock'=>$request_data['stock'],
            'img'=>$this->upload->data()['file_name'],
        );

        if(!$this->product_model->add($insert_data)){
            $response['errors']=['error'=>'Technical errors! Try Sometime Latter'];

            return $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
        }

        $response['status']=true;
        return  $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($response));
    }

    public function update(){
        $response['status']=false;
        $request_data = $this->input->post(); 

        $this->form_validation->validation_data=$request_data;
        $this->form_validation->set_rules('product_id', 'Product', 'required|is_natural_no_zero');
        $this->form_validation->set_rules('name', 'Name', 'required|max_length[250]');
        $this->form_validation->set_rules('stock', 'Stock', 'required|is_natural');
        $this->form_validation->set_rules('price', 'Price', 'required|is_natural_no_zero');

        if (!$this->form_validation->run()) {
            $response['errors']=$this->form_validation->error_array();

            return $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
        }


        $product = $this->product_model->product($request_data['product_id']);

        if(!$product){
            $response['errors']=['Product'=>'Choose the right product'];

            return $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
        }
        
        if(isset($_FILES['image'])){
            $config['upload_path']   = './uploads/';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size']      = 2048; // Max file size in KB (2MB)
            $config['file_name']     = $product['img'];
            $config['overwrite'] = true;

            $this->upload->initialize($config);
    
            if(!$this->upload->do_upload('image'))
            {
                $response['errors']=['image'=>$this->upload->display_errors()];
    
                return $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($response));
            }
        }

        $update_data = array(
            'name'=>$request_data['name'],
            'price'=>$request_data['price'],
            'stock'=>$request_data['stock'],
        );

        if(!$this->product_model->update($product['id'],$update_data)){
            $response['errors']=['error'=>'Technical errors! Try Sometime Latter'];

            return $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
        }

        $response['status']=true;
        return  $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($response));
    }

}
