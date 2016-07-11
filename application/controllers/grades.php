<?php

class Grades extends CI_Controller{
	
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
		$data['passed_grade'] = $this->grades_model->get_passed_grades();
		if ($data['passed_grade'] != null){
			$data['main_content'] = 'passedgradelist';
			$this->load->view('layouts/main', $data);
		} else {
			//print_r('No Grades');
			$data['main_content'] = 'passedgradelist';
			$this->load->view('layouts/main', $data);
		}
	}
	
	public function add(){
		
	
	}
	
	// function for getting the details of the pending grade
	public function pending_grade_details(){
		$data = array(
			'sub_code' => $this->input->post('sub_code'),
			'fac_id' => $this->input->post('fac_id'));
	
		
		$data['pending'] = $this->grades_model->get_grade();
		$data['main_content'] = 'passed_grade_details';
		$this->load->view('layouts/main', $data);
	}
	
	public function view_all(){
	
		$data['grades'] = $this->grades_model->get_passed_subs();
		$data['grades_list'] = $this->grades_model->get_all_grades();
		$data['main_content'] = 'viewgrades';
		$this->load->view('layouts/main', $data);
	
	}
	
	// students list in view grade list
	public function get_students_list(){
	
		$data['students_grade'] = $this->grades_model->get_student_grade_list();
		
		$subcode = $this->input->post('subject_code');
		$faculty_id = $this->input->post('faculty_id');
		
		$data['s_info'] = $this->subject_model->get_subject_info($subcode);
		$data['f_info'] = $this->faculty_model->get_faculty($faculty_id);
		
		
		
		$data['main_content'] = 'studentgradeslist';
		$this->load->view('layouts/main', $data);
	
	}
	public function pdf(){
	
		$data['students_grade'] = $this->grades_model->get_student_grade_list();
		
		$subcode = $this->input->post('subject_code');
		$faculty_id = $this->input->post('faculty_id');
		
		$data['s_info'] = $this->subject_model->get_subject_info($subcode);
		$data['f_info'] = $this->faculty_model->get_faculty($faculty_id);
		
		
		
		
		$this->load->view('pdf');
	
	
	
	}
	
	public function search_grades(){
	
		$data['students_grade'] = $this->grades_model->search_grades();
		//print_r($data['students_grade']); die();
		$data['main_content'] = 'searchgrade';
		$this->load->view('layouts/main', $data);
		
	}
	
}