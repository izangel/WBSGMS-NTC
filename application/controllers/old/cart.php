<?php
class Cart extends CI_Controller{
	public $paypal_data = '';
	public $tax;
	public $shipping;
	public $total = 0;
	public $grand_total;
	
	
	public function index(){
		$data['main_content'] = 'cart';
		$this->load->view('layouts/main', $data);
	}
	
	public function add(){
		$data = array(
			'id' => $this->input->post('item_number'),
			'qty' => $this->input->post('qty'),
			'price' => $this->input->post('price'),
			'name' => $this->input->post('title')
		);
		
		//print_r($data);die();
		
		$this->cart->insert($data);
		redirect('products');

	}		
}
