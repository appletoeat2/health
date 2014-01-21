<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed') ;

class Stores extends CI_Controller
{
	public function __construct()
	{
		parent::__construct() ;
		
		if($this->session->userdata('logged_in') != TRUE)
			redirect(base_url()."home") ;
	}
	
	public function index($message = 0)
	{
		$data["stores"] = $this->model1->get_all("stores") ;
		$this->load->view("template/body", array_merge($data, $this->load_view("stores/index", $message)));
	}
	
	public function store_detail($store_id = 0)
	{
		if($store_id)
		{
			$data["errors"] = false ;
			$data["store_rec"] = $this->model1->get_one(array("id" => $store_id), "stores") ;
			$this->load->view("template/body", array_merge($data, $this->load_view("stores/store_detail"))) ;
		}
		else
		{
			redirect(base_url()."stores") ;
		}
	}
	
	public function add_stores()
	{
		$data["errors"] = false ;
		$this->load->view("template/body", array_merge($data, $this->load_view("stores/add_stores"))) ;
	}
	
	public function insert_stores()
	{
		if($_POST)
		{
			$validation_parameters = array("customer_code" => "Customer Code&required", "retailer_name" => "Retailer Name&required", "email1" => "Email1&", "email2" => "Email2&", "address1" => "Address1&required", "address2" => "Address2&required", "city" => "City&required", "province" => "Province&required", "postal_code" => "Postal Code&required", "telephone" => "Telephone&required", "website" => "Website&", "ecommerce" => "Ecommerce Link&", "facebook" => "Facebook Link&", "twitter" => "Twitter Link&", "googleplus" => "GooglePlus Link&", "linkedin" => "Linkedin Link&", "latitude" => "Latitude&required", "longitude" => "Longitude&required", "map_request_status" => "Map Request Status&required", "status" => "Status&required") ;
	
			if(form_validation_function($validation_parameters) == FALSE)
			{
				$data["errors"] = validation_errors("<li>", "</li>") ;
				$this->load->view("template/body", array_merge($data, $this->load_view("stores/add_stores"))) ;
			}
			else
			{
				$attributes = post_data(array("customer_code" => "customer_code", "retailer_name" => "retailer_name", "email1" => "email1", "email2" => "email2", "address1" => "address1", "address2" => "address2", "city" => "city", "province" => "province", "postal_code" => "postal_code", "telephone" => "telephone", "website" => "website", "ecommerce" => "ecommerce", "facebook" => "facebook", "twitter" => "twitter", "googleplus" => "googleplus", "linkedin" => "linkedin", "latitude" => "latitude", "longitude" => "longitude", "map_request_status" => "map_request_status", "status" => "status")) ;
				
				$store_id = $this->model1->insert_rec($attributes, "stores") ;
				redirect(base_url()."stores/index/1") ;
			}
		}
		else
		{
			redirect(base_url()."stores") ;
		}
	}
	
	public function edit_stores($store_id = 0)
	{
		if($store_id)
		{
			$data["errors"] = false ;
			$data["store_rec"] = $this->model1->get_one(array("id" => $store_id), "stores") ;
			$this->load->view("template/body", array_merge($data, $this->load_view("stores/edit_stores")));
		}
		else
		{
			redirect(base_url()."stores") ;
		}
	}
	
	public function update_store()
	{
		if($_POST)
		{ 
			$validation_parameters = array("customer_code" => "Customer Code&required", "retailer_name" => "Retailer Name&required", "email1" => "Email1&", "email2" => "Email2&", "address1" => "Address1&required", "address2" => "Address2&required", "city" => "City&required", "province" => "Province&required", "postal_code" => "Postal Code&required", "telephone" => "Telephone&required", "website" => "Website&", "ecommerce" => "Ecommerce Link&", "facebook" => "Facebook Link&", "twitter" => "Twitter Link&", "googleplus" => "GooglePlus Link&", "linkedin" => "Linkedin Link&", "latitude" => "Latitude&required", "longitude" => "Longitude&required", "map_request_status" => "Map Request Status&required", "status" => "Status&required") ;
	
			if(form_validation_function($validation_parameters) == FALSE)
			{
				$data["errors"] = validation_errors("<li>", "</li>") ;
				$data["store_rec"] = $this->model1->get_one(array("id" => $this->input->post("store_id")), "stores") ;
				$this->load->view("template/body", array_merge($data, $this->load_view("stores/edit_stores"))) ;
			}
			else
			{
				$attributes = post_data(array("customer_code" => "customer_code", "retailer_name" => "retailer_name", "email1" => "email1", "email2" => "email2", "address1" => "address1", "address2" => "address2", "city" => "city", "province" => "province", "postal_code" => "postal_code", "telephone" => "telephone", "website" => "website", "ecommerce" => "ecommerce", "facebook" => "facebook", "twitter" => "twitter", "googleplus" => "googleplus", "linkedin" => "linkedin", "latitude" => "latitude", "longitude" => "longitude", "map_request_status" => "map_request_status", "status" => "status")) ;
				$store_id = $this->input->post("store_id") ;
				$success = $this->model1->update_rec($attributes, array("id" => $user_id), "stores") ;
				
				redirect(base_url()."stores/index/2") ;
			}
		}
		else
		{
			redirect(base_url()."stores") ;
		}
	}
	
	public function remove_stores($store_id = 0)
	{
		if($store_id)
		{
			$this->model1->delete_rec(array("id" => $user_id), "stores") ;
			redirect(base_url()."stores/index/3") ;
		}
		else
		{
			redirect(base_url()."stores/index") ;
		}
	}
	
	private function load_view($view, $message = 0)
	{
		$data = array() ;
		
		$data["title"] = "InnoviteHealth - Admin: Stores" ;
		$data["current_page"] = "stores" ;
		$data["message"] = $message ;
		$data["side_menu_type"] = "" ;
		$data["side_menu"] = false ;
		$data["view"] = $view ;
		
		return $data ;
	}
}