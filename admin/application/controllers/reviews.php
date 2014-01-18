<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed') ;

class Reviews extends CI_Controller
{
	public function __construct()
	{
		parent::__construct() ;
		
		if($this->session->userdata('logged_in') != TRUE)
			redirect(base_url()."home") ;
	}
	
	public function index($message = 0)
	{
		$data["reviews"] = $this->model2->get_reviews() ;
		$this->load->view("template/body", array_merge($data, $this->load_view("reviews/index", $message)));
	}
	
	public function review_detail($review_id = 0)
	{
		if($review_id)
		{
			$data["errors"] = false ;
			$data["review_rec"] = $this->model2->get_review($review_id) ;
			$this->load->view("template/body", array_merge($data, $this->load_view("reviews/review_detail")));
		}
		else
		{
			redirect(base_url()."reviews") ;
		}
	}
	
	public function add_review()
	{
		$data["errors"] = false ;
		$data["products"] = $this->model1->get_all("products") ;
		$this->load->view("template/body", array_merge($data, $this->load_view("reviews/add_product_review")));
	}
	
	public function insert_review()
	{
		if($_POST)
		{ 
			$validation_parameters = array("product_id" => "Product Id&required", "reviewer_name" => "Reviewer Name&required", "reviewer_email" => "Reviewer Email&required", "reviewer_comment" => "Reviewer Comment&required", "stars" => "Stars&required", "approved" => "Approved&required") ;
	
			if(form_validation_function($validation_parameters) == FALSE)
			{
				$data["errors"] = validation_errors('<li>', '</li>');
				$data["products"] = $this->model1->get_all("products") ;
				$this->load->view("template/body", array_merge($data, $this->load_view("reviews/add_product_review"))) ;
			}
			else
			{
				$attributes = post_data(array("product_id" => "product_id", "reviewer_name" => "reviewer_name", "reviewer_email" => "reviewer_email", "reviewer_comment" => "reviewer_comment", "stars" => "stars", "approved" => "approved")) ;
				
				$review_id = $this->model1->insert_rec($attributes, "reviews") ;
				
				redirect(base_url()."reviews/index/1") ;
			}
		}
		else
		{
			redirect(base_url()."reviews") ;
		}
	}
	
	public function edit_review($review_id = 0)
	{
		if($review_id)
		{
			$data["errors"] = false ;
			$data["review_rec"] = $this->model2->get_review($review_id) ;
			$this->load->view("template/body", array_merge($data, $this->load_view("reviews/edit_product_review")));
		}
		else
		{
			redirect(base_url()."reviews") ;
		}
	}
	
	public function update_review()
	{
		if($_POST)
		{ 
			$validation_parameters = array("reviewer_name" => "Reviewer Name&required", "reviewer_email" => "Reviewer Email&required", "reviewer_comment" => "Reviewer Comment&required", "stars" => "Stars&required", "approved" => "Approved&required") ;
	
			if(form_validation_function($validation_parameters) == FALSE)
			{
				$data["errors"] = validation_errors('<li>', '</li>');
				$data["review_rec"] = $this->model2->get_review($review_id) ;
				$this->load->view("template/body", array_merge($data, $this->load_view("reviews/edit_product_review")));
			}
			else
			{
				$attributes = post_data(array("reviewer_name" => "reviewer_name", "reviewer_email" => "reviewer_email", "reviewer_comment" => "reviewer_comment", "stars" => "stars", "approved" => "approved")) ;
				
				$review_id = $this->input->post("review_id") ;
				$success = $this->model1->update_rec($attributes, array("id" => $review_id), "reviews") ;
				
				redirect(base_url()."reviews/index/2") ;
			}
		}
		else
		{
			redirect(base_url()."reviews") ;
		}
	}
	
	public function remove_review($review_id = 0)
	{
		if($review_id)
		{
			$this->model1->delete_rec(array("id" => $review_id), "reviews") ;
			redirect(base_url()."reviews/index/3") ;
		}
		else
		{
			redirect(base_url()."reviews/index") ;
		}
	}
	
	private function load_view($view, $message = 0)
	{
		$data = array() ;
		
		$data["title"] = "InnoviteHealth - Admin: Reviews" ;
		$data["current_page"] = "products" ;
		$data["message"] = $message ;
		$data["side_menu_type"] = "" ;
		$data["side_menu"] = false ;
		$data["view"] = $view ;
		
		return $data ;
	}
}