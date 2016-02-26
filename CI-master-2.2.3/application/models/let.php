<?php

class Let extends CI_Model
{
	public function __construct(){
		parent::__construct();
	}

	public function get_user($user_info){
		return $this->db->query("SELECT * FROM users WHERE username='{$user_info['username']}'
			                               AND password = '{$user_info['password']}'")->row_array();

		
	}
	public function insert_user($user_info){
		$insert_user= "INSERT INTO users (first_name, last_name, username, email, password, created_at) 
		               VALUES (?, ?, ?, ?, ?, NOW())";
		$values= (array($user_info['first_name'], $user_info['last_name'], $user_info['username'], $user_info['email'], $user_info['password']));
		$this->db->query($insert_user, $values);
		return $this->db->insert_id();

	}


	// public function get_user_by_id($id){
	// 	$get_user = "SELECT * from users WHERE id=?";
	// 	$values= array($id);
	// 	$this->db->query($get_user, $id);
	// 	return $this->db->edit_id()->row_array();
	// }

	public function edit_profile($user_data, $id){
		$update= "UPDATE users SET first_name=?, last_name=?, username=?, email=? WHERE id=?";
		$values= array($user_data['first_name'], $user_data['last_name'], $user_data['username'], $user_data['email'], $id);
		return $this->db->query($update, $values);

	}



}

?>