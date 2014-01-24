<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed') ;

class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct() ;
	}
	
	public function index()
	{
		$this->load->view('template/body', $this->load_view("home/index"));
	}
	
	public function terms_and_conditions()
	{
		$this->load->view('template/body', $this->load_view("home/terms_and_conditions"));
	}
	
	public function privacy_policy()
	{
		$this->load->view('template/body', $this->load_view("home/privacy_policy"));
	}
	
	public function subscription_email_address()
	{
		if($_POST)
		{
			$attributes = post_data(array("email_address" => "email_address")) ;
			$email_details = $this->model1->get_one($attributes, "newsletter_subscription_emails") ;
			if($email_details)
			{
				echo "success" ;
			}
			else
			{
				$attributes["status"] = "Active" ;
				$email_id = $this->model1->insert_rec($attributes, "newsletter_subscription_emails") ;	
				
				if($email_id) echo "success" ;
				else echo "fail" ;
				exit ;
			}
		}
		else
		{
			redirect(base_url()."home") ;
		}
	}
	
	
	private function load_view($view)
	{
		$data = array() ;
		$data["main_class"] = "wrap" ;
		$data["title"] = "InnoviteHealth - nourish and heal the body from the inside out" ;
		$data["product_groups"] = $this->model1->get_all_orderby("product_groups", "sort_order", "ASC") ;
		$data["google_code"] = $this->model1->get_one(array("id" => 1), "settings") ;
		$data["view"] = $view ;
		
		return $data ;
	}
}