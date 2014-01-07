<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed') ;

class Food_sensitivities extends CI_Controller
{
	public function __construct()
	{
		parent::__construct() ;
		if($this->session->userdata('logged_in') != TRUE)
			redirect(base_url()."home") ;
	}
	
	public function index($message = 0)
	{
		$data["food_sensitivities"] = $this->model1->get_all_orderby("food_sensitivities", "sort_order", "ASC") ;
		$this->load->view('template/body', array_merge($data, $this->load_view("food_sensitivities/index", $message)));
	}
	
	public function add_food_sensitivities()
	{
		$data["errors"] = false ;
		$this->load->view('template/body', array_merge($data, $this->load_view("food_sensitivities/add_food_sensitivity")));
	}
	
	public function insert_food_sensitivity()
	{
		$validation_parameters = array("name" => "Food Sensitivity Name&required", "tag" => "Food Sensitivity Tag&required", "sort_order" => "Sort Order&required") ;
		
		if(form_validation_function($validation_parameters) == FALSE)
		{
			$data["errors"] = validation_errors('<li>', '</li>');
			$this->load->view('template/body', array_merge($data, $this->load_view("food_sensitivities/add_food_sensitivity"))) ;
		} else {
			$attributes = post_data(array("name" => "name", "tag" => "tag", "sort_order" => "sort_order")) ;
			$user_id = $this->model1->insert_rec($attributes, "food_sensitivities") ;
			redirect(base_url()."food_sensitivities/index/1") ;
		}	
	}
	
	public function edit_food_sensitivity($food_sensitivities_id)
	{
		if($food_sensitivities_id)
		{
			$data["errors"] = false ;
			$data["food_sensitivities_rec"] = $this->model1->get_one(array("id" => $food_sensitivities_id), "food_sensitivities") ;
			$this->load->view("template/body", array_merge($data, $this->load_view("food_sensitivities/edit_food_sensitivity")));
		}
		else
		{
			redirect(base_url()."food_sensitivities") ;
		}
	}
	
	public function update_food_sensitivity($food_sensitivity_id)
	{
		$validation_parameters = array("name" => "Food Sensitivity Name&required", "tag" => "Food Sensitivity Tag&required", "sort_order" => "Sort Order&required") ;
		
		if(form_validation_function($validation_parameters) == FALSE)
		{
			$data["errors"] = validation_errors('<li>', '</li>') ;
			$data["food_sensitivities_rec"] = $this->model1->get_one(array("id" => $food_sensitivities_id), "food_sensitivities") ;
			$this->load->view("template/body", array_merge($data, $this->load_view("food_sensitivities/edit_food_sensitivity")));
		} else {
			$attributes = post_data(array("name" => "name", "tag" => "tag", "sort_order" => "sort_order")) ;
			$cond = post_data(array("id" => "food_sensitivity_id")) ;
			$user_id = $this->model1->update_rec($attributes, $cond, "food_sensitivities") ;
			redirect(base_url()."food_sensitivities/index/2") ;
		}
	}
	 
	public function remove_food_sensitivity($food_sensitivity_id)
	{
		if($food_sensitivity_id)
		{
			$this->model1->delete_rec(array("food_sensitivity_id" => $food_sensitivity_id), "products_food_sensitivites_relation") ;
			$this->model1->delete_rec(array("id" => $food_sensitivity_id), "food_sensitivities") ;
			redirect(base_url()."food_sensitivities/index/3") ;
		}
		else
		{
			redirect(base_url()."food_sensitivities") ;
		}	
	}
	
	private function load_view($view, $message = 0)
	{
		$data = array() ;
		
		$data["title"] = "InnoviteHealth - Food Sensitivities" ;
		$data["current_page"] = "products" ;
		$data["side_menu"] = true ;
		$data["side_menu_type"] = "products" ;
		$data["group_id"] = -1 ;
		$data["side_product_groups"] = $this->model1->get_all_orderby("product_groups", "sort_order", "ASC") ;
		$data["message"] = $message ;
		$data["view"] = $view ;
		
		return $data ;
	}
}