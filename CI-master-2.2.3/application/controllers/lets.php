<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lets extends CI_Controller {
	protected $view_data = array();
	protected $user_session = NULL;

	function __construct()
	{
		parent::__construct();
		// $this->output->enable_profiler();
		$this->view_data['user_session'] = $this->user_session = $this->session->userdata("user_session");
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
		$this->load->library("form_validation");
		$this->form_validation->set_rules("username", "Username", "trim|required");
		$this->form_validation->set_rules("password", "Password", "trim|min_length[8]|required|md5");

		if($this->form_validation->run() === FALSE)
		{
			$this->session->set_flashdata("login_errors", validation_errors());
			redirect(base_url('lets/login_page'));

		}
		else
		{
			$this->load->model("let");
			$get_user= $this->let->get_user($this->input->post());

			if($get_user)
			{
				$this->session->set_userdata("user_session", $get_user);
				redirect(base_url("lets/dashboard"));
			}
			else
			{
				$this->session->set_flashdata("login_errors", "Incorrect username and/or password");
				redirect(base_url());
			}
		}
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
			redirect(base_url('lets/dashboard'));
		}
		else
		{
			$this->load->model("let");
			$user_input = $this->input->post();
			$insert_user = $this->let->insert_user($user_input);

			if ($insert_user)
			{
				$this->session->set_userdata("user_session", $user_input);
				redirect(base_url("/"));
				
			}
			else
			{
				$this->session->set_flashdata("registration_errors", "Your info was not registered, please try again.");
				redirect(base_url());
			}
		}

	}

	public function dashboard(){
		$this->load->view('dashboard', $this->view_data);
	}

	public function view_profile(){
		$this->load->view('user_profile', $this->view_data);
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('/');
	}

	public function edit_page(){
		$this->load->view('edit_profile', $this->view_data);
	}

	public function edit_profile(){
		
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */