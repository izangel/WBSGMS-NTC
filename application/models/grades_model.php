<?php
class Grades_model extends CI_Model {
	
	// passed grades
	public function get_passed_grades(){

		$this->db->select('*');
		$this->db->from('tbl_grades');
		$this->db->where('grade_status', 'PENDING');
		$this->db->group_by(array("subject_code", "faculty_id", "set"));
		$query = $this->db->get();
		return $query->result();
	
	}
	
	// function for getting the grade details for the specific faculty and subject
	public function get_grade(){
	
		$data = array(
			'sub_code' => $this->input->post('sub_code'),
			'sub_time' => $this->input->post('sub_time'),
			'sub_day' => $this->input->post('sub_day'),
			'set' => $this->input->post('set'),
			'fac_id' => $this->input->post('fac_id'));
		
		$condition = "subject_code =" . "'" . $data['sub_code'] . "' AND faculty_id =" . "'" . $data['fac_id'] . "'";
		
		$this->db->select('*');
		$this->db->from('tbl_grades');
		$this->db->where($condition);
		$this->db->where('set', $data['set']);
		$this->db->where('sub_time', $data['sub_time']);
		$this->db->where('sub_day', $data['sub_day']);
		$query = $this->db->get();
		return $query->result();
		return $data;
	}
	
	
	public function insert_grades($grades_data){
	
		$this->db->insert('tbl_grades', $grades_data);
	}
	
	public function accept_grade($grades_data){
	
		$this->db->where('student_id', $grades_data['student_id']);
		$this->db->where('faculty_id', $grades_data['faculty_id']);
		$this->db->where('subject_code', $grades_data['subject_code']);
		$this->db->where('grade_status', 'PENDING');
		$this->db->update('tbl_grades', $grades_data);

	}
	
	public function get_all_grades(){
	
		$sy = date("Y");
		$sy2 = $sy + 1;
		$sy3 = $sy . "-" . $sy2;
	
		$this->db->select('*');
		$this->db->from('tbl_grades');
		$this->db->where('school_year', $sy3);
		$this->db->where('grade_status', 'OK');
		$query = $this->db->get();
		return $query->result();

	}
	
	public function get_passed_subs(){
	
		$sy = date("Y");
		$sy2 = $sy + 1;
		$sy3 = $sy . "-" . $sy2;
	
		$this->db->select('*');
		$this->db->from('tbl_faculty_subjects');
		$this->db->where('school_year', $sy3);
		$this->db->where('status', 'ok');
		$query = $this->db->get();
		return $query->result();
		
	}
	
	public function get_all_my_grades($id){
		$sy = date("Y");
		$sy2 = $sy + 1;
		$sy3 = $sy . "-" . $sy2;
		
		$this->db->select('*');
		$this->db->from('tbl_grades');
		$this->db->where('school_year', $sy3);
		$this->db->where('student_id', $id);
		$this->db->where('grade_status', 'OK');
		$query = $this->db->get();
		return $query->result();
	}
	
	// grades list
	public function get_student_grade_list(){
	
		$sub_code = $this->input->post('subject_code');
		$fac_id = $this->input->post('faculty_id');
		$sy = date("Y");
		$sy2 = $sy + 1;
		$sy3 = $sy . "-" . $sy2;
		
		$this->db->select('*');
		$this->db->from('tbl_grades');
		$this->db->where('school_year', $sy3);
		$this->db->where('subject_code', $sub_code);
		$this->db->where('faculty_id', $fac_id);
		$this->db->where('grade_status', 'OK');
		$query = $this->db->get();
		return $query->result();
	
	
	}
	
	// search
	public function search_grades(){
	
		$keyword = $this->input->post('keyword');
		$filter = $this->input->post('filter');
	
		if($filter == 'schoolyear'){

			$this->db->select('*');
			$this->db->from('tbl_grades');
			$this->db->like('school_year', $keyword);
			$this->db->where('grade_status', 'OK');
			$query = $this->db->get();
			return $query->result();

		
		} else {
		
			$this->db->select('*');
			$this->db->from('tbl_grades');
			$this->db->like('student_id', $keyword);
			$this->db->where('grade_status', 'OK');
			$query = $this->db->get();
			return $query->result();
			
		}
	}
	
	
}