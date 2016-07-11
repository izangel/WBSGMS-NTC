<?php

class Admin extends CI_Controller{
	
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
	
	public function students_list(){
	
		$data['students'] = $this->students_model->view_all_students();
		$data['main_content'] = 'students';
		$this->load->view('layouts/main', $data);
	
	}
	
	// get the student info in the student listttttttttttttt
	public function get_student($stud_id){
	
		// get the student information
		$data['student'] = $this->students_model->get_student($stud_id);
		$sid = $data['student']->student_id;
		
		//get the student subjects
		$data['subs'] = $this->students_model->get_student_subs($sid);
		
		// display
		$data['main_content'] = 'studentprofile';
		$this->load->view('layouts/main', $data);
	}
	
	// view for the edit form
	public function edit($stud_id){
	
		// get the student information
		$data['student'] = $this->students_model->get_student($stud_id);
		$sid = $data['student']->student_id;
		
		//get the student subjects
		$data['subs'] = $this->students_model->get_student_subs($sid);
		
		// display
		$data['main_content'] = 'editstudent';
		$this->load->view('layouts/main', $data);
	
	}
	
	// update student info
	public function update($stud_id){
	
		$result = $this->students_model->update_stud_info($stud_id);
		if($result == true){
			// get the student information
			$data['student'] = $this->students_model->get_student($stud_id);
			$sid = $data['student']->student_id;
			
			//get the student subjects
			$data['subs'] = $this->students_model->get_student_subs($sid);
			
			// display
			$data['main_content'] = 'studentprofile';
			$this->load->view('layouts/main', $data);

		} else {
			print_r('error'); die();
		
		}

	}
	
	// function for drop add subjects display
	public function editsubjects($stud_id){
		
		// get the student information
		$data['student'] = $this->students_model->get_student($stud_id);
		$sid = $data['student']->student_id;
		
		//get the student subjects
		$data['subs'] = $this->students_model->get_student_subs($sid);
		
		// display
		$data['main_content'] = 'editsubject';
		$this->load->view('layouts/main', $data);
	

	}
	
	// add subject to single student
	public function add(){

		$result = $this->subject_model->addsubject();
		if($result == true){
			$data['students'] = $this->students_model->view_all_students();
			$data['main_content'] = 'students';
			$this->load->view('layouts/main', $data);
		}
	}
	
	public function drop($subcode){
		$result = $this->subject_model->dropsubject($subcode);
		$stud_id = $this->input->post('student_id');
		if($result == true){
			// get the student information
			$data['student'] = $this->students_model->get_student($stud_id);
			$sid = $data['student']->student_id;
			
			//get the student subjects
			$data['subs'] = $this->students_model->get_student_subs($sid);
			
			// display
			$data['main_content'] = 'studentprofile';
			$this->load->view('layouts/main', $data);
		} else {
			print_r('error'); die();
		
		}
		
	}
	// primary search
	public function search(){
		
		$data['students'] = $this->students_model->searchstudent();
		$data['main_content'] = 'students';
		$this->load->view('layouts/main', $data);
	
	}
	
	// secondary search
	public function search_student(){
		
		$data['students'] = $this->students_model->searchbyfilter();
		$data['main_content'] = 'students';
		$this->load->view('layouts/main', $data);
	
	}
	//view
	public function add_student(){
	
		$data['main_content'] = 'addstudent';
		$this->load->view('layouts/main', $data);
	}
	public function  add_stud(){
		$result = $this->students_model->add_new_student();
		if($result == true){
		$data['main_content'] = 'addstudent';
		$this->load->view('layouts/main', $data);
		}
		
		
	
	}
	
	// view
	public function assign(){
	
		$data['faculties'] = $this->faculty_model->get_all_faculty();
		//print_r($data['faculties']); die();
		$data['subcodes'] = $this->subject_model->get_all_subs();
		$data['faculty_subjects'] = $this->faculty_model->view_all();
		$data['main_content'] = 'assign';
		$this->load->view('layouts/main', $data);
		
	}
	
	// button
	public function assign_subs(){
	
		$result = $this->subject_model->assign_subjects();
		
		if($result == true){
		
			$sub_data = array(
				'faculty_id' => $this->input->post('faculty'),
				'subject_code' => $this->input->post('scode'),
				'subject_sem' => $this->input->post('semester'),
				'subject_term' => $this->input->post('term'),
				'subject_sess' => $this->input->post('subday'),
				'subject_time' => $this->input->post('subtime'),
				'yearlevel' => $this->input->post('yearlevel'),
				'set' => $this->input->post('set'),
				'school_year' => $this->input->post('schoolyear')
			);
			
			
			$allstudents = $this->students_model->find_student_per_set($sub_data);
			
			if($allstudents != null){
			
				foreach($allstudents as $stud) :
					$sub_data2 = array(
						'faculty_id' => $this->input->post('faculty'),
						'subject_code' => $this->input->post('scode'),
						'sem' => $this->input->post('semester'),
						'term' => $this->input->post('term'),
						'day' => $this->input->post('subday'),
						'time' => $this->input->post('subtime'),
						'yearlevel' => $this->input->post('yearlevel'),
						'set' => $this->input->post('set'),
						'schoolyear' => $this->input->post('schoolyear'),
						'stud_id' => $stud->student_id
					);

					$resultss = $this->subject_model->set_students_sub($sub_data2);
					if($resultss == true){
						
						// updated
						$data['faculties'] = $this->faculty_model->get_all_faculty();
						//print_r($data['faculties']); die();
						$data['subcodes'] = $this->subject_model->get_all_subs();
						$data['faculty_subjects'] = $this->faculty_model->view_all();
						$data['main_content'] = 'assign';
						$this->load->view('layouts/main', $data);
						
						
					} else {
					
						print('error');
					}
				
				endforeach;
			
			} else {
			
				print_r('no students');
			
			}
			
			
		} else {
			print_r('error'); die();
		}
	}
	
	public function submit($faculty_id){
	
		$data['subject_info'] = null;
		$data['f_id'] = $faculty_id;
		$data['faculty_subjects'] = $this->faculty_model->get_my_sub_lists($faculty_id);
		$data['studentslist'] = null; // empty
		$data['main_content'] = 'subjectlist';
		$this->load->view('layouts/main', $data);
		
	
	}
	
	public function setsubject(){
		$data = array(
			'subject_code' => $this->input->post('subs'),
			'f_id' => $this->input->post('facultyyy'),
			'set' => $this->input->post('set')
		);
		$subcode = $this->input->post('subs');
		$faculty_id = $this->input->post('facultyyy');
		$data['f_id'] = $this->input->post('facultyyy');
		$data['faculty_subjects'] = $this->faculty_model->get_my_sub_lists($faculty_id);	// get the faculty subjects in select
		$data['studentslist'] = $this->faculty_model->get_my_stud_lists($faculty_id);		// get the students list under the faculty
		$data['subject_info'] = $this->subject_model->get_subject_info($subcode);
		$data['main_content'] = 'submit';
		$this->load->view('layouts/main', $data);
		
	}
	
	public function submitgrade(){
	
		$student_counter = $this->input->post('studentcntr');
		
		for($x=1; $x<=$student_counter; $x++){
			$grades_data = array(
				'subject_code' => $this->input->post('subject_code'),
				'set' => $this->input->post('set' . $x),
				'sub_time' => $this->input->post('time' . $x),
				'sub_day' => $this->input->post('day' . $x),
				'term' => $this->input->post('term' . $x),
				'semester' => $this->input->post('semester' . $x),
				'school_year' => $this->input->post('schoolyear' . $x),
				'faculty_id' => $this->input->post('facultyid'),
				'student_id' => $this->input->post('studentid' . $x),
				'student_final_grade' => $this->input->post('studgrade' . $x),
				'grade_status' => 'PENDING'
			);
			//print_r($grades_data);
			$insert_result = $this->grades_model->insert_grades($grades_data);

		}
		
		$subs_data = array(
			'subject_code' => $this->input->post('subject_code'),
			'faculty_id' => $this->input->post('facultyid'),
			'set' => $this->input->post('set1')
			);
		$result = $this->faculty_model->update_sub_stats($subs_data);
		
		$data['subject_info'] = null;
		$data['f_id'] = $this->input->post('facultyid');
		$faculty_id = $this->input->post('facultyid');
		$data['faculty_subjects'] = $this->faculty_model->get_my_sub_lists($faculty_id);
		$data['studentslist'] = null; // empty
		$data['main_content'] = 'subjectlist';
		$this->load->view('layouts/main', $data);
	
	}
	
	// view manage subjects
	public function manage(){
	
		$data['sublist'] = $this->subject_model->get_all_subs();
		$data['main_content'] = 'manage';
		$this->load->view('layouts/main', $data);

	}
	
	public function add_subject(){
	
		$result = $this->subject_model->add_new_sub();
		if($result == true){
		
			$data['sublist'] = $this->subject_model->get_all_subs();
			$data['main_content'] = 'manage';
			$this->load->view('layouts/main', $data);
		}
	
	}
	
	public function accept_pending(){
	
		$cntr = $this->input->post('cntr');
		for($x = 1; $x <= $cntr; $x++){
		
			$grades_data = array(
				'subject_code' => $this->input->post('subcode'),
				'faculty_id' => $this->input->post('faculty'),
				'student_id' => $this->input->post('student' . $x),
				'grade_status' => 'OK'
			);
				
			
			$this->grades_model->accept_grade($grades_data);

		}
	
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
	public function addfaculty(){
		$data['main_content'] = 'addfaculty';
		$this->load->view('layouts/main', $data);
		
	}
	public function add_faculty(){
		$result = $this->faculty_model->add_new_faculty();
		if($result == true){
		$data['main_content'] = 'addfaculty';
		$this->load->view('layouts/main', $data);
		}
		
	
	}
	
}