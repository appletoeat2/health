<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed') ;

class Users extends CI_Controller
{
	public function __construct()
	{
		parent::__construct() ;
		
		if($this->session->userdata('logged_in') != TRUE)
			redirect(base_url()."home") ;
			
		if($this->session->userdata('role') != 'Admin')
			redirect(base_url()."dashboard") ;
	}
	
	public function index($message = 0)
	{
		$data["users"] = $this->model1->get_all("administrator_logins") ;
		$this->load->view('template/body', array_merge($data, $this->load_view("users/index", $message)));
	}
	
	public function user_detail($user_id = 0)
	{
		if($user_id)
		{
			$data["errors"] = false ;
			$data["user_rec"] = $this->model1->get_one(array("id" => $user_id), "administrator_logins") ;
			$this->load->view('template/body', array_merge($data, $this->load_view("users/user_detail")));
		}
		else
		{
			redirect(base_url()."users") ;
		}
	}
	
	public function edit_user($user_id = 0)
	{
		if($user_id)
		{
			$data["errors"] = false ;
			$data["user_rec"] = $this->model1->get_one(array("id" => $user_id), "administrator_logins") ;
			$this->load->view('template/body', array_merge($data, $this->load_view("users/edit_user")));
		}
		else
		{
			redirect(base_url()."users") ;
		}
	}
	
	public function update_user()
	{
		if($_POST)
		{ 
			$this->form_validation->set_rules('name', 'Name', 'required') ;
			$this->form_validation->set_rules('password', 'Password', 'required|matches[confirm_password]') ;
			$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]') ;
			$this->form_validation->set_rules('role', 'Role', 'required') ;
			$this->form_validation->set_rules('status', 'Status', 'required') ;
	
			if ($this->form_validation->run() == FALSE)
			{
				$data["errors"] = validation_errors('<li>', '</li>');
				$data["user_rec"] = $this->model1->get_one(array("id" => $this->input->post("id")), "administrator_logins") ;
				$this->load->view('template/body', array_merge($data, $this->load_view("users/edit_user"))) ;
			}
			else
			{
				$attributes = array("name" => addslashes($this->input->post("name")),
				  					"password" => md5(addslashes($this->input->post("password"))),
							  		"role" => addslashes($this->input->post("role")),
							  		"status" =>  addslashes($this->input->post("status"))) ;
				
				$user_id = $this->input->post("id") ;
				$success = $this->model1-> update_rec($attributes, array("id" => $user_id), "administrator_logins") ;
				
				redirect(base_url()."users/index/2") ;
			}
		}
		else
		{
			redirect(base_url()."users") ;
		}
	}
	
	public function add_user()
	{
		$data["errors"] = false ;
		$this->load->view('template/body', array_merge($data, $this->load_view("users/insert_user")));
	}
	
	public function insert_user()
	{
		if($_POST)
		{ 
			$this->form_validation->set_rules('name', 'Name', 'required') ;
			$this->form_validation->set_rules('email_address', 'Email Address', 'required|valid_email|is_unique[administrator_logins.email_address]') ;
			$this->form_validation->set_rules('username', 'Username', 'required|is_unique[administrator_logins.username]') ;
			$this->form_validation->set_rules('password', 'Password', 'required|matches[confirm_password]') ;
			$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]') ;
			$this->form_validation->set_rules('role', 'Role', 'required') ;
			$this->form_validation->set_rules('status', 'Status', 'required') ;
	
			if ($this->form_validation->run() == FALSE)
			{
				$data["errors"] = validation_errors('<li>', '</li>');
				$this->load->view('template/body', array_merge($data, $this->load_view("users/insert_user"))) ;
			}
			else
			{
				$attributes = array("name" => addslashes($this->input->post("name")),
				  					"email_address" => addslashes($this->input->post("email_address")),
							    	"username" => addslashes($this->input->post("username")),
							  		"password" => md5(addslashes($this->input->post("password"))),
							  		"role" => addslashes($this->input->post("role")),
							  		"status" =>  addslashes($this->input->post("status"))) ;
				
				$user_id = $this->model1->insert_rec($attributes, "administrator_logins") ;
				$this->send_registration_email($user_id, $this->input->post("password")) ;
			}
		}
		else
		{
			redirect(base_url()."users") ;
		}
	}
	
	public function send_registration_email($user_id, $password)
	{
		$user_rec = $this->model1->get_one(array("id" => $user_id), "administrator_logins") ;
		
		$user_registration_email_text["name"] = $user_rec->name ;
		$user_registration_email_text["role"] = $user_rec->role ;
		$user_registration_email_text["username"] = $user_rec->username ;
		$user_registration_email_text["password"] = $password ;
		
		$message = $this->load->view("users/user_registration_email", $user_registration_email_text, TRUE) ;
					
		if(send_email_message("Innovite Health", $this->input->post("email_address"), false, false, "Registration Notification", $message, false))
			redirect(base_url()."users/index/1") ;
		else
			redirect(base_url()."users/index/5") ;
	}
	
	public function remove_user($user_id = 0)
	{
		if($user_id)
		{
			if($user_id == $this->session->userdata('id'))
			{
				redirect(base_url()."users/index/4") ;
			} else {
				$this->model1->delete_rec(array("id" => $user_id), "administrator_logins") ;
				redirect(base_url()."users/index/3") ;
			}
		}
		else
		{
			redirect(base_url()."users/index") ;
		}
	}
	
	private function load_view($view, $message = 0)
	{
		$data = array() ;
		
		$data["title"] = "InnoviteHealth - Admin: Users" ;
		$data["current_page"] = "users" ;
		$data["message"] = $message ;
		$data["side_menu_type"] = "" ;
		$data["side_menu"] = false ;
		$data["view"] = $view ;
		
		return $data ;
	}
}