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
			redirect(base_url());

		}
		else
		{
			$this->load->model("user");
			$get_user= $this->user->get_user($this->input->post());

			if($get_user)
			{
				$this->session->set_userdata("user_session", $get_user);
				redirect(base_url("users/profile"));
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
			redirect(base_url());
		}
		else
		{
			$this->load->model("user");
			$user_input = $this->input->post();
			$insert_user = $this->user->insert_user($user_input);

			if ($insert_user)
			{
				$this->session->set_userdata("user_session", $user_input);
				redirect(base_url("users/profile"));
				
			}
			else
			{
				$this->session->set_flashdata("registration_errors", "Your info was not registered, please try again.");
				redirect(base_url());
			}
		}

	}


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */