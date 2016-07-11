<?php
class Subject_model extends CI_Model {
	
	public function get_subject_info($subcode){

		$this->db->select('*');
		$this->db->from('tbl_subjects');
		$this->db->where('subject_code', $subcode);
		$query = $this->db->get();
		return $query->row();
	
	}
	
	// add subject to faculty
	public function addsubject(){
		$s_data = array(
			'stud_id' => $this->input->post('st_id'),
			'faculty_id' => $this->input->post('faculty'),
			'subject_code' => $this->input->post('subcode'),
			'schoolyear' => $this->input->post('schoolyear'),
			'sem' => $this->input->post('semester'),
			'term' => $this->input->post('term'),
			'yearlevel' => $this->input->post('yearlevel'),
			'set' => $this->input->post('set'),
			'day' => $this->input->post('day'),
			'time' => $this->input->post('subtime'),
		);
	
		$this->db->insert('tbl_student_subjects', $s_data);
		if ($this->db->affected_rows() > 0) {
			return true;
		}
	
	}
	
	public function dropsubject($subcode){
		$data['stud_id'] = $this->input->post('student_id');
		
		$condition = "subject_code = '" . $subcode . "' AND stud_id = '" . $data['stud_id'] . "'";
		$this->db->where($condition);
		$this->db->delete('tbl_student_subjects');
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
		
	}
	
	public function get_all_subs(){
		
		$this->db->select('*');
		$this->db->from('tbl_subjects');
		$query = $this->db->get();
		return $query->result();
		
	
	}
	
	public function assign_subjects(){
	
		$data = array(
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
	
		$this->db->insert('tbl_faculty_subjects', $data);
		if ($this->db->affected_rows() > 0) {
			return true;
		}
	
	}
	
	public function set_students_sub($sub_data2){
	
		$this->db->insert('tbl_student_subjects', $sub_data2);
		if ($this->db->affected_rows() > 0) {
			return true;
		}

	}
	
	public function add_new_sub(){
	
		$data = array(
			'subject_code' => $this->input->post('scode'),
			's_description' => $this->input->post('sdes'),
			's_units' => $this->input->post('sunit'),
		);
		
		$this->db->insert('tbl_subjects', $data);
		if ($this->db->affected_rows() > 0) {
			return true;
		}
	
	}
	
}