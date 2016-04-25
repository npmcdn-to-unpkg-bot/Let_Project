<?php

class Let extends CI_Model
{
	public function __construct(){
		parent::__construct();
	}

	public function get_user($username){
		return $this->db->query("SELECT * FROM users WHERE username= ?", array($username))->row_array();
	}

	public function insert_user($user_info){
		$insert_user= "INSERT INTO users (first_name, last_name, username, email, password, created_at)
		               VALUES (?, ?, ?, ?, ?, NOW())";
		$values= (array($user_info['first_name'], $user_info['last_name'], $user_info['username'], $user_info['email'], $user_info['password']));
		$this->db->query($insert_user, $values);
		return $this->db->insert_id();

	}


	public function get_user_by_id($id){
		$get_user = "SELECT * from users WHERE id=?";
		$values= array($id);
		return $this->db->query($get_user, $values)->row_array();
	}

	public function edit_profile($user_data, $id){
		$update= "UPDATE users SET first_name=?, last_name=?, username=?, email=? WHERE id=?";
		$values= array($user_data['first_name'], $user_data['last_name'], $user_data['username'], $user_data['email'], $id);
		return $this->db->query($update, $values);

	}

	public function get_all_vents(){
		return $this->db->query("SELECT username, content, vents.created_at, category FROM users JOIN vents ON users.id = vents.users_id;")->result_array();
	}
	public function show($id)
	{
			$this->load->model("let"); //loads the model
			$vents = $this->Course->get_all_vents();  //calls the get_course_by_id method
			var_dump($vents);

	}

	public function add_vent($vents){
		$query = "INSERT INTO vents ( content, category, created_at, updated_at, users_id) VALUES (?,?,?,?,?)";
    $values = array($vents['content'], $vents['category'], date("Y-m-d H:i:s"), date("Y-m-d H:i:s"), $vents['users_id']);
    return $this->db->query($query, $values);
	}

}

?>
