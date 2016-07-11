<?php
session_start(); //we need to start session in order to access it through CI

class Students extends CI_Controller{
	
	public function __construct() {
		parent::__construct();

		// Load form helper library
		$this->load->helper('form');

		// Load form validation library
		$this->load->library('form_validation');

		// Load session library
		$this->load->library('session');

		// Load user model
		$this->load->model('user_model');
		$this->load->model('grades_model');
		$this->load->model('students_model');
		$this->load->model('faculty_model');
		$this->load->model('subject_model');
	}
	
	public function index(){
		$data['main_content'] = 'home';
		$this->load->view('layouts/main', $data);
	}
	
		
	public function mygrade($id){
	
		$data['grades'] = $this->grades_model->get_all_my_grades($id);
		$data['main_content'] = 'mygrade';
		$this->load->view('layouts/main', $data);

	}
	

}