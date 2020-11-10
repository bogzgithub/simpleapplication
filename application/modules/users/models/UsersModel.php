<?php

class UsersModel extends CI_Model {

	public function checkExistEmailAddress($email_address){
		$query = $this->db->query("SELECT * FROM users WHERE email_address= '".$email_address."'");
		return $query->num_rows();
	}

	public function insertUser($data){
		$this->db->insert('users',$data);
	}


	public function getUserByEmailAddress($email_address){
		$query = $this->db->query("SELECT * FROM users WHERE email_address= '".$email_address."'");
		return $query->result();
	}

	public function lockedUsersByEmailAddress($data){
		extract($data);
	    $this->db->where('email_address', $email_address);
	    $this->db->update("users", array('locked_status' => 1));
	}

	public function updateLoginStatus($data){
		extract($data);
	    $this->db->where('user_id', $user_id);
	    $this->db->update("users", array('login_status' => 1, "login_date" => $login_date));
	}

	public function updateLogoutStatus($data){
		extract($data);
	    $this->db->where('user_id', $user_id);
	    $this->db->update("users", array('login_status' => 0));
	}


	public function updateProfilePictureInfo($data){
		extract($data);
	    $this->db->where('user_id', $user_id);
	    $this->db->update("users", array('profile_name' => $profile_name, 'profile_path' => $profile_path));
	}

	public function getAllUsers(){
		$query = $this->db->query("SELECT * FROM users WHERE role = '0'");
		return $query->result();
	}

}

?>