<?php
class User_model extends CI_Model {
	
	public function login($data) {

		$condition = "user_name =" . "'" . $data['username'] . "' AND " . "user_password =" . "'" . $data['password'] . "'";
		$this->db->select('*');
		$this->db->from('tbl_sys_users');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();

		if ($query->num_rows() == 1) {
			return true;
		} else {
			return false;
		}
	}
	
	// Read data from database to show data in admin page
	public function read_user_information($uname) {

		$condition = "user_name =" . "'" . $uname . "' AND user_role !=''";
		$this->db->select('*');
		$this->db->from('tbl_sys_users');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();

		if ($query->num_rows() == 1) {
			return $query->result();
		} else {
			return false;
		}
	}
	
	
	
}