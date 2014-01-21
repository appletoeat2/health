<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed') ;

class Products extends CI_Controller
{
	public function __construct()
	{
		parent::__construct() ;
	}
	
	public function index($arg = 0)
	{
		$data["products"] = $this->model2->get_all_products() ;
		
		$data["product_group_recs"]  = $this->model1->get_all_orderby("product_groups", "sort_order", "ASC") ;
		$data["product_category_recs"] = $this->model1->get_all_orderby("product_categories", "sort_order", "ASC") ;
		$data["food_sensitivity_recs"] = $this->model1->get_all_orderby("food_sensitivities", "sort_order", "ASC") ;
		
		$this->load->view('template/body', array_merge($data, $this->load_data("products/index", "wrap", 0, "Innovite Health - Products")));
	}
	
	public function group_product($group_id)
	{
		$data["products"] = $this->model1->get_all_cond_orderby(array("group_id" => $group_id, "status" => "Active"), "products", "sort_order", "ASC") ;
		$data["groups"] = $this->model1->get_one(array("id" => $group_id), "product_groups") ;
		$this->load->view('template/body', array_merge($data, $this->load_data("products/group_products", "wrap", $group_id, $data["groups"]->group_title))) ;
	}
	
	public function product_details($category_id = 0, $product_id = 0)
	{
		$data["product_detail"] = $this->model1->get_one(array("id" => $product_id), "products") ;
		$data["skus_detail"] = $this->model1->get_all_cond(array("product_id" => $product_id), "skus") ;
		$data["brochure"] = $this->model2->get_brochures($product_id) ;
		$data["product_reviews"] = $this->model1->get_all_cond(array("product_id" => $product_id, "approved" => "Yes"), "reviews") ;
		$data["groups"] = $this->model1->get_one(array("id" => $data["product_detail"]->group_id), "product_groups") ;
		$data["related_products"] = $this->model1->get_all_cond_orderby(array("group_id" => $data["product_detail"]->group_id), "products", "sort_order", "ASC") ;
		
		$this->load->view('template/body', array_merge($data, $this->load_data("products/product_details", "boxed-wrap", $category_id, $data["groups"]->group_title)));
	}
	
	public function product_brochures($brochure_name)
	{
		echo "You are trying to access product brochure \"".$brochure_name."\". I was not directed to deal with this. :)" ;
		exit ;
	}
	
	public function bone_and_joint_health_information($category_id)
	{
		$this->load->view('template/body', $this->load_data("products/joint_and_bone_health_information", "boxed-wrap", $category_id));
	}
	
	public function insert_comment()
	{
		if($_POST)
		{
			$attributes = post_data(array("product_id" => "product_id", "reviewer_name" => "name", "reviewer_email" => "email", "reviewer_comment" => "comment", "stars" => "stars")) ;
			$attributes["approved"] = "No" ;
			$attributes["status"] = "Active" ;
			$review_id = $this->model1->insert_rec($attributes, "reviews") ;
			$attributes["product_details"] = $this->model1->get_one(array("id" => $attributes["product_id"]), "products") ;
			$message = $this->load->view("products/product_review_email", $attributes, TRUE) ;
			$setting_details = $this->model1->get_one(array("id" => 1), "settings") ;
			
			if($review_id && send_email_message("Innovite Health", $setting_details->products_review_email, false, false, "Product Review Submitted", $message, false)) echo "success" ;
			else echo "fail" ;
			exit ;
		}
		else
		{
			redirect(base_url()."products") ;
		}
	}
	 // google_analytics
	public function send_product_query()
	{
		if($_POST)
		{
			$attributes = post_data(array("email_address" => "email_address", "question" => "question")) ;
			$message = $this->load->view("products/product_query_email", $attributes, TRUE) ;
			$setting_details = $this->model1->get_one(array("id" => 1), "settings") ;
			if(send_email_message("Innovite Health", $setting_details->products_query_email, false, false, "Product Query", $message, false))
				echo "success" ;
			else
				echo "fail" ;
			exit ;
		}
		else
		{
			redirect(base_url()."products") ;
		}
	}
	
	public function search_products()
	{
		if($_POST)
		{
			$data["search_string"] = $this->input->post("search_box") ;
			$data["product_recs"] = $this->model2->search_products($data["search_string"]) ;
			$this->load->view("template/body", array_merge($data, $this->load_data("products/search_product", "wrap", 1, ""))) ;
		}
		else
		{
			redirect(base_url()."products") ;
		}
	}
	
	private function load_data($view, $main_class, $group_id, $title = "")
	{
		$data = array() ;
		$data["main_class"] = $main_class ;
		$data["title"] = $title ;
		$data["group_id"] = $group_id ;
		$data["product_groups"] = $this->model1->get_all_orderby("product_groups", "sort_order", "ASC") ;
		$data["google_code"] = $this->model1->get_one(array("id" => 1), "settings") ;
		$data["view"] = $view ;
		
		return $data ;
	}
}