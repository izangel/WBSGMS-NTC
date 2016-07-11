<?php
class Products extends CI_Controller{
	public function index(){
		//Get All Products
		$data['products'] =$this->Product_model->get_products();
		//load view 
		$data['main_content'] = 'products';
		$this->load->view('layouts/main', $data);
	}
	public function details($id){
	
		$data['products'] = $this->Product_model->get_product_details($id);
		
		$data['main_content'] = 'details';
		$this->load->view('layouts/main', $data);
	}
	
}