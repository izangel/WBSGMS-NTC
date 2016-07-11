<?php
session_start(); //we need to start session in order to access it through CI

class Home extends CI_Controller{
	
	public function __construct() {
		parent::__construct();

		// Load form helper library
		$this->load->helper('form');

		// Load form validation library
		$this->load->library('form_validation');

		// Load session library
		$this->load->library('session');

		// Load database
		$this->load->model('user_model');
	}
	
	public function index(){
		$data['main_content'] = 'home';
		$this->load->view('layouts/main', $data);
	}
	
	public function login() {

		$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');

		if ($this->form_validation->run() == FALSE) {
			if(isset($this->session->userdata['logged_in'])){
				redirect('grades');
			}else{
				$data['main_content'] = 'home';
				$this->load->view('layouts/main', $data);
			}
		} else {
			$data = array(
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password')
			);
			$result = $this->user_model->login($data);
			if ($result == TRUE) {
				$uname = $this->input->post('username');
				$result = $this->user_model->read_user_information($uname);
				if ($result == TRUE) {
					$session_data = array(
					'userid' => $result[0]->user_id,
					'username' => $result[0]->user_name,
					'role' => $result[0]->user_role,
					'fname' => $result[0]->firstname);
					
					// Add user data in session
					$this->session->set_userdata('logged_in', $session_data);
					
					// print_r($session_data); die();
					if($result[0]->user_role == 'ADMINISTRATOR'){
						redirect('home');
						
					} elseif ($result[0]->user_role == 'FACULTY'){
						redirect('home');
					
					} else {
						redirect('home');
					}
					
				} else {
					print_r('no privilege'); die();
				}
			} else {
				print_r('invalid username / password'); die();
			}
		}
	}
	
	// Logout from admin page
	public function logout() {

		// Removing session data
		$sess_array = array('username' => '');
		$this->session->unset_userdata('logged_in', $sess_array);
		redirect('home');
	}
	

}