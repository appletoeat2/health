<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed') ;

class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct() ;
	}
	
	public function index($error = 0)
	{
		if($this->session->userdata('logged_in') == TRUE)
			redirect(base_url()."products") ;
		$data["error"] = $error ;
		$this->load->view("login/login", array_merge($data, $this->load_view("")));
	}
	
	public function login()
	{
		if($_POST)
		{
			if($this->input->post("username") == "" || $this->input->post("password") == "")
				redirect(base_url()."home/index/1") ;
			else 
			{
				$user = $this->model1->get_one(array("username" => addslashes($this->input->post("username")), "password" =>  md5(addslashes($this->input->post("password")))), "administrator_logins") ;
				
				if($user)
				{
					$session_data = array('id' => $user->id, 'name' => $user->name, 'role' => $user->role, 'logged_in' => TRUE) ;
					$this->session->set_userdata($session_data) ;
					redirect(base_url()."products") ;
				}
				else
					redirect(base_url()."home/index/1") ;
			}	
			
		}
	}
	
	public function forget_password($error = 0)
	{
		$data["error"] = $error ;
		$this->load->view("login/forget_password", array_merge($data, $this->load_view("")));
	}
	
	public function send_email($error = 0)
	{
		if($_POST)
		{
			if($this->input->post("email_address") == "")
				redirect(base_url()."home/forget_password/1") ;
			else
			{
				$user = $this->model1->get_one(array("email_address" => addslashes($this->input->post("email_address"))), "administrator_logins") ;
				if($user)
				{
					$forget_password_email_text["name"] = $user->name ;
					$forget_password_email_text["username"] = $user->username ;
					$forget_password_email_text["password"] = $this->reset_password($user->id) ;
					$message = $this->load->view("login/forget_password_email", $forget_password_email_text, TRUE) ;
					
					if(send_email_message("Innovite Health", $this->input->post("email_address"), false, false, "Forget Password Notification", $message, false))
						redirect(base_url()."home/index/2") ;
					else
						redirect(base_url()."home/index/3") ;
					
				}
				else
					redirect(base_url()."home/forget_password/1") ;
			}
		} 
		else
			redirect(base_url()."home") ;
	}
	
	public function loggout()
	{
		$this->session->set_userdata('logged_in', FALSE) ;
		$session_data = array('id' => '', 'name' => '') ;
		$this->session->unset_userdata($session_data) ;
		
		redirect(base_url()."home") ;
	}
	
	private function reset_password($id)
	{
		$password = get_random_string() ;
		$encripted_password = md5($password) ;
		
		$this->model1->update_rec(array("password" => $encripted_password), array("id" => $id), "administrator_logins") ;
		
		return $password ;
	}
	
	private function load_view($view)
	{
		$data = array() ;
		
		$data["title"] = "InnoviteHealth - Admin: Login" ;
		$data["current_page"] = "dashboard" ;
		$data["side_menu"] = true ;
		$data["view"] = $view ;
		
		return $data ;
	}
}