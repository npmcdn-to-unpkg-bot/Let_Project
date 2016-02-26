<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lets extends CI_Controller {
	protected $view_data = array();
	protected $user_session = NULL;

	function __construct()
	{
		parent::__construct();
		// $this->output->enable_profiler();
		$user =  $this->session->userdata("user_session");

		$data = array("id" => $user['id'], "username"=> $user['username']);

		$this->view_data['user_session'] = $this->user_session; 
	}


	public function index()
	{
		$this->load->view('welcome');
	}

	public function login_page(){
		$this->load->view('index');
	}

	public function process_login()
	{
		$username = $this->input->post('username');
		$this->load->model("let");
		$get_user = $this->let->get_user($username);
		$user = array(
			'users_id' => $get_user['id'],
			'username' => $get_user['username'],
		);
		$this->session->set_userdata($user);
		redirect('/lets/dashboard', $user);
	}

	public function process_registration()
	{
		$this->load->library("form_validation");
		$this->form_validation->set_rules("first_name", "First Name", "trim|required");
		$this->form_validation->set_rules("last_name", "Last Name", "trim|required");
		$this->form_validation->set_rules("username", "Username", "trim|required");
		$this->form_validation->set_rules("email", "Email", "trim|valid_email|required");
		$this->form_validation->set_rules("password", "Password", "trim|min_length[8]|required|matches[confirm_password]|md5");
		$this->form_validation->set_rules("confirm_password", "Confirm Password", "trim|required|md5");

		if($this->form_validation->run() === FALSE)
		{
			$this->session->set_flashdata("registration_errors", validation_errors());
			redirect(base_url('/lets/login_page'));		
		}
		else
		{
			$this->load->model("let");
			$user_input = $this->input->post();
			$insert_user = $this->let->insert_user($user_input);

			if ($insert_user){
				$username = $this->input->post('username');
				$this->load->model("let");
				$get_user = $this->let->get_user($username);
				$user = array(
					'users_id' => $get_user['id'],
					'username' => $get_user['username'],
				);
				$this->session->set_userdata($user);
				redirect('/lets/dashboard', $user);
			}
			else
			{
				$this->session->set_flashdata("registration_errors", "Your info was not registered, please try again.");
				redirect(base_url());
			}
		}

	}

	public function dashboard(){
		$this->load->model("let");
		$all_vents = $this->let->get_all_vents();
		$this->load->view("dashboard", array('all_vents' => $all_vents));
	}

	public function view_profile(){
		// $this->load->model('let');
		// $user_data = $this->let->get_user_by_id($id);

		$this->load->view('user_profile');
	}


	public function edit_page(){
		$this->load->view('edit_profile');
	}


	public function edit_profile($id){
		$this->load->model("let");
		$user_data = $this->input->post();
		$this->let->edit_profile($user_data, $id);
		// $get_user_data = $this->let->get_user_by_id($user_data, $id);
		redirect("lets/view_profile");
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('/');
	}

	public function get_vents(){
		$this->load->model("let");
		
		$this->load->view("dashboard", array("all_vents"=>$all_vents));
		// redirect('lets/dashboard', array("all_vents" => $all_vents));
	}

	public function add(){
		$this->load->library("form_validation");
		$this->form_validation->set_rules("vent", "Vent", "trim|required");
		
		if($this->form_validation->run() === FALSE){
			$this->session->set_flashdata("registration_errors", validation_errors());
			redirect(base_url('/lets/dashboard'));		
		}
		else{
		$this->load->model("let");
		$vents = array(
				'content' => $this->input->post("vent"),
				'category' => $this->input->post("category"),
				'username'=> $this->session->userdata['username'],
				'users_id' => $this->session->userdata['users_id']
		);
		$add_vent = $this->let->add_vent($vents);
		redirect('lets/dashboard');
		}
}


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
