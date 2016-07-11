<?php

class FacultyCI extends CI_Controller{
	
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
	}
	
	public function index(){
		
		$data['faculty_list'] = $this->grades_model->get_fsublist($fid);
		$data['main_content'] = 'facultysublist';
		$this->load->view('layouts/main', $data);
	}
	


}