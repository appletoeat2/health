<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed') ;

class Product_categories extends CI_Controller
{
	public function __construct()
	{
		parent::__construct() ;
		if($this->session->userdata('logged_in') != TRUE)
			redirect(base_url()."home") ;
	}
	
	public function index($message = 0)
	{
		$data["product_categories"] = $this->model1->get_all_orderby("product_categories", "sort_order", "DESC") ;
		$this->load->view('template/body', array_merge($data, $this->load_view("product_categories/index", $message)));
	}
	
	public function add_product_category()
	{
		$data["errors"] = false ;
		$this->load->view('template/body', array_merge($data, $this->load_view("product_categories/add_product_category")));
	}
	
	public function insert_product_categories()
	{
		$validation_parameters = array("category_name" => "Category Name&required", "category_tag" => "Category Tag&required", "sort_order" => "Sort Order&required") ;
		
		if(form_validation_function($validation_parameters) == FALSE)
		{
			$data["errors"] = validation_errors('<li>', '</li>');
			$this->load->view('template/body', array_merge($data, $this->load_view("product_categories/add_product_category"))) ;
		} else {
			$attributes = post_data(array("category_name" => "category_name", "category_tag" => "category_tag", "sort_order" => "sort_order")) ;
			$user_id = $this->model1->insert_rec($attributes, "product_categories") ;
			redirect(base_url()."product_categories/index/1") ;
		}	
	}
	
	public function edit_product_category($category_id)
	{
		if($category_id)
		{
			$data["errors"] = false ;
			$data["category_rec"] = $this->model1->get_one(array("id" => $category_id), "product_categories") ;
			$this->load->view('template/body', array_merge($data, $this->load_view("product_categories/edit_product_category")));
		}
		else
		{
			redirect(base_url()."product_categories") ;
		}
	}
	
	public function update_product_categories()
	{
		$validation_parameters = array("category_name" => "Category Name&required", "category_tag" => "Category Tag&required", "sort_order" => "Sort Order&required") ;
		
		if(form_validation_function($validation_parameters) == FALSE)
		{
			$data["errors"] = validation_errors('<li>', '</li>') ;
			$data["category_rec"] = $this->model1->get_one(array("id" => $this->input->post("id")), "product_categories") ;
			$this->load->view('template/body', array_merge($data, $this->load_view("product_categories/edit_product_category"))) ;
		} else {
			$attributes = post_data(array("category_name" => "category_name", "category_tag" => "category_tag", "sort_order" => "sort_order")) ;
			$cond = post_data(array("id" => "category_id")) ;
			$user_id = $this->model1->update_rec($attributes, $cond, "product_categories") ;
			redirect(base_url()."product_categories/index/2") ;
		}
	}
	
	public function remove_product_category($category_id)
	{
		if($category_id)
		{
			$this->model1->delete_rec(array("category_id" => $category_id), "products_categories_relation") ;
			$this->model1->delete_rec(array("id" => $category_id), "product_categories") ;
			redirect(base_url()."product_categories/index/3") ;
		}
		else
		{
			redirect(base_url()."product_categories") ;
		}	
	}
	
	private function load_view($view, $message = 0)
	{
		$data = array() ;
		
		$data["title"] = "InnoviteHealth - Product Categories" ;
		$data["current_page"] = "products" ;
		$data["group_id"] = -1 ;
		$data["side_menu"] = true ;
		$data["side_menu_type"] = "products" ;
		$data["side_product_groups"] = $this->model1->get_all_orderby("product_groups", "sort_order", "ASC") ;
		$data["message"] = $message ;
		$data["view"] = $view ;
		
		return $data ;
	}
}