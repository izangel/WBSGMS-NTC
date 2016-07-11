<?php
class Students_model extends CI_Model {
	
	public function get_student($stud_id){

		$this->db->select('*');
		$this->db->from('tbl_student_info');
		$this->db->where('student_id', $stud_id);
		$query = $this->db->get();
		return $query->row();
	
	}
	
	public function view_all_students(){
		$sy = date("Y"); 
		$sy2 = $sy + 1; 
		//echo $sy . '-' . $sy2;
		
	
		$this->db->select('*');
		$this->db->from('tbl_student_info');
		$this->db->like('schoolyear', $sy2); // select only the active students in the current year
		$query = $this->db->get();
		return $query->result();
	}
	
	public function get_student_subs($sid){
	
		$this->db->select('*');
		$this->db->from('tbl_student_subjects');
		$this->db->like('stud_id', $sid);
		$query = $this->db->get();
		return $query->result();
	
	}
	
	//function for updating student info
	public function update_stud_info($stud_id){
		
		// data to be updated
		$data = array(
			'student_lastname' => $this->input->post('lname'),
			'student_firstname' => $this->input->post('fname'),
			'student_middlename' => $this->input->post('mname'),
			'student_sex' => $this->input->post('sex'),
			'course' => $this->input->post('course'),
			'yearlevel' => $this->input->post('yearlevel'),
			'set' => $this->input->post('set')
			);
		
		// update data in database
		$this->db->where('student_id', $stud_id);
		$this->db->update('tbl_student_info', $data);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}
	
	// search by filter
	public function searchbyfilter(){
	
		$data = array(
			'filter' => $this->input->post('filter'),
			'keyword' => $this->input->post('keyword')
		);
		
		$this->db->select('*');
		$this->db->from('tbl_student_info');
		$this->db->like($data['filter'], $data['keyword']);
		$query = $this->db->get();
		return $query->result();
	}
	
	// search student
	public function searchstudent(){
	
		$data = array(
			'keyword' => $this->input->post('keyword')
		);
		
		$this->db->select('*');
		$this->db->from('tbl_student_info');
		$this->db->like('student_lastname', $data['keyword']);
		$this->db->or_like('student_firstname', $data['keyword']);
		$this->db->or_like('student_middlename', $data['keyword']);
		$this->db->or_like('student_id', $data['keyword']);
		$query = $this->db->get();
		return $query->result();
	}
	
	public function find_student_per_set($sub_data){
	
		$condition = "set = '" . $sub_data['set'] . "' AND yearlevel = '" . $sub_data['yearlevel'] . "' AND schoolyear = '" . $sub_data['school_year'] . "'"; 
		$this->db->select('*');
		$this->db->from('tbl_student_info');
		$this->db->where($condition);
		$query = $this->db->get();
		$numrows = $query->num_rows();
		
		if ($query->num_rows() >= 1) {
			return $query->result();
			return $numrows;
		} else {
			print_r('no studentsssssss'); die();
		}
		
	}
	public function add_new_student(){
		$data = array(
			'user_id' =>$this->input->post('idnum'),
			'user_name' =>$this->input->post('username'),
			'user_password' =>$this->input->post('password'),
			'lastname' =>$this->input->post('lname'),
			'firstname'  =>$this->input->post('fname'),
			'middlename'  =>$this->input->post('midname'),
			'sex'  =>$this->input->post('studsex'),
			'user_role'  => 'STUDENT'
			);
		$this->db->insert('tbl_sys_users', $data);
		if ($this->db->affected_rows() > 0) {
				$f_data = array(
					'student_id' =>$this->input->post('idnum'),	
					's_username' =>$this->input->post('username'),
					's_password'  =>$this->input->post('password'),
					'student_lastname'  =>$this->input->post('lname'),
					'student_firstname'  =>$this->input->post('fname'),
					'student_middlename'  =>$this->input->post('midname'),
					'student_sex'  =>$this->input->post('studsex'),
					'studaddress'  =>$this->input->post('studadd'),
					'course'  =>$this->input->post('course'),
					'yearlevel'  =>$this->input->post('yearlevel'),
					'set'  =>$this->input->post('set'),
					'schoolyear'  =>$this->input->post('schoolyear')
					
					
					
					
					
					
					
					
					);
			$this->db->insert('tbl_student_info', $f_data);
			if ($this->db->affected_rows() > 0) {
				return true;
			}
			
			
		}
		}
	
}