<?php
class Faculty_model extends CI_Model {
	
	public function get_faculty($faculty_id){

		$this->db->select('*');
		$this->db->from('tbl_faculty_info');
		$this->db->where('faculty_id', $faculty_id);
		$query = $this->db->get();
		return $query->row();
	
	}
	
	
	public function get_all_faculty(){
		$this->db->select('*');
		$this->db->from('tbl_faculty_info');
		$query = $this->db->get();
		return $query->result();
	}
	
	public function get_subjects($faculty_id){
	
		$this->db->select('*');
		$this->db->from('tbl_faculty_subjects');
		$this->db->where('faculty_id', $faculty_id);
		$query = $this->db->get();
		return $query->result();
	
	}
	
	public function get_sub_info($subcode){

		$this->db->select('*');
		$this->db->from('tbl_faculty_subjects');
		$this->db->where('subject_code', $subcode);
		$query = $this->db->get();
		return $query->result();
	
		
	}
	
	/// data for the "assign" view
	public function view_all(){
		$sy = date("Y");
		$sy1 = $sy + 1;
		
		$this->db->select('*');
		$this->db->from('tbl_faculty_subjects');
		$this->db->like('school_year', $sy1);
		$query = $this->db->get();
		return $query->result();
	
	}
	
	public function get_my_sub_lists($faculty_id){
	
		$sy = date("Y");
		$sy2 = $sy + 1;
		$sy3 = $sy . "-" . $sy2;
		
		$condition = "faculty_id = '" . $faculty_id . "' AND schoolyear = '" . $sy3 . "'";
		$this->db->select('*');
		$this->db->from('tbl_faculty_subjects');
		$this->db->where('faculty_id', $faculty_id);
		$this->db->where('status', 'p');
		$query = $this->db->get();
		return $query->result();
	
	
	}
	
	
	public function get_my_stud_lists($faculty_id){
		$data = array(
			'subject_code' => $this->input->post('subs'),
			'f_id' => $this->input->post('facultyyy'),
			'set' => $this->input->post('set')
		);
		
		$sy = date("Y");
		$sy2 = $sy + 1;
		$sy3 = $sy . "-" . $sy2;
		
		$condition = "faculty_id = '" . $faculty_id . "' AND schoolyear = '" . $sy3 . "' AND subject_code = '" . $data['subject_code'] . "'";
		$this->db->select('*');
		$this->db->from('tbl_student_subjects');
		$this->db->where($condition);
		$this->db->where('set', $data['set']);
		$query = $this->db->get();
		return $query->result();
		print_r($query->result());
		print_r($condition);
	
	}
	
	public function update_sub_stats($subs_data){
		$subsdata = array('status' => 'ok');
		
		$this->db->where('faculty_id', $subs_data['faculty_id']);
		$this->db->where('subject_code', $subs_data['subject_code']);
		$this->db->where('set', $subs_data['set']);
		$this->db->update('tbl_faculty_subjects', $subsdata );
	
	}
	public function add_new_faculty(){
		$data = array(
			'user_id' =>$this->input->post('faculty_id'),
			'user_name' =>$this->input->post('user_name'),
			'user_password' =>$this->input->post('password'),
			'lastname' =>$this->input->post('faculty_lastname'),
			'firstname'  =>$this->input->post('faculty_firstname'),
			'middlename'  =>$this->input->post('faculty_middlename'),
			'sex'  =>$this->input->post('f_sex'),
			'user_role'  =>$this->input->post('user_role')
			);
		$this->db->insert('tbl_sys_users', $data);
		if ($this->db->affected_rows() > 0) {
				$f_data = array(
					'faculty_id' =>$this->input->post('faculty_id'),	
					'faculty_lastname' =>$this->input->post('faculty_lastname'),
					'faculty_firstname'  =>$this->input->post('faculty_firstname'),
					'faculty_middlename'  =>$this->input->post('faculty_middlename'),
					'faculty_sex'  =>$this->input->post('f_sex'),
					);
			$this->db->insert('tbl_faculty_info', $f_data);
			if ($this->db->affected_rows() > 0) {
				return true;
			}
			
			
		}
		
			
			
	
	}
	
}
