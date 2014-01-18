<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed') ;

class Settings extends CI_Controller
{
	public function __construct()
	{
		parent::__construct() ;
		
		if($this->session->userdata('logged_in') != TRUE)
			redirect(base_url()."home") ;
	}
	
	public function index($message = 0)
	{
		$data["errors"] = false ;
		$data["setting_rec"] = $this->model1->get_one(array("id" => 1), "settings") ;
		$this->load->view("template/body", array_merge($data, $this->load_view("settings/index", $message)));
	}
		 	 
	public function update_settings($message = 0)
	{
		if($_POST)
		{ 
			$validation_parameters = array("products_query_email" => "Email for Product Detail&required", "products_review_email" => "Email for Product Review&required", "google_analytics" => "Google Analytics Code&required") ;
	
			if(form_validation_function($validation_parameters) == FALSE)
			{
				$data["errors"] = validation_errors('<li>', '</li>');
				$data["setting_rec"] = $this->model1->get_one(array("id" => 1), "settings") ;
				$this->load->view("template/body", array_merge($data, $this->load_view("settings/index", $message))) ;
			}
			else
			{
				$attributes = post_data(array("products_query_email" => "products_query_email", "products_review_email" => "products_review_email", "google_analytics" => "google_analytics")) ;
				
				$success = $this->model1->update_rec($attributes, array("id" => $this->input->post("setting_rec_id")), "settings") ;
				
				redirect(base_url()."settings/index") ;
			}
		}
		else
		{
			redirect(base_url()."settings") ;
		}
	}
	
	private function load_view($view, $message = 0)
	{
		$data = array() ;
		
		$data["title"] = "InnoviteHealth - Admin: Settings" ;
		$data["current_page"] = "settings" ;
		$data["message"] = $message ;
		$data["side_menu_type"] = "" ;
		$data["side_menu"] = false ;
		$data["view"] = $view ;
		
		return $data ;
	}
}