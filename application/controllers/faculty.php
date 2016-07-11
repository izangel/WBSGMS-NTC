<?php

class Faculty extends CI_Controller{
	
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
		
		$data['faculty_list'] = $this->faculty_model->get_all_faculty();
		$data['main_content'] = 'faculty';
		$this->load->view('layouts/main', $data);
	}
	
	public function get_faculty_details($faculty_id){
		
		$data['faculty'] = $this->faculty_model->get_faculty($faculty_id);
		$data['main_content'] = 'faculty_details';
		$this->load->view('layouts/main', $data);
	
	
	}
	
	public function get_mysubs($faculty_id){

		$data['f_id'] = $faculty_id;
		$data['facultysubjects'] = $this->faculty_model->get_subjects($faculty_id);
		$data['main_content'] = 'facultysublist';
		$this->load->view('layouts/main', $data);
	
	}
	
	// subject info and students list
	public function subject($subcode){
	
		$data['subject_info'] = $this->faculty_model->get_sub_info($subcode);
		//$data[''] = $this->faculty_model->
		$data['main_content'] = 'subjectform';
		$this->load->view('layouts/main', $data);
	
	}
	
	public function pass_grade(){
		
		$data['main_content'] = 'submitform';
		$this->load->view('layouts/main', $data);
	
		
	}
}