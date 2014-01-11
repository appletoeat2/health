<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed') ;

class Product_groups extends CI_Controller
{
	public function __construct()
	{
		parent::__construct() ;
		if($this->session->userdata('logged_in') != TRUE)
			redirect(base_url()."home") ;
	}
	
	public function index($message = 0)
	{
		$data["product_groups"] = $this->model1->get_all_orderby("product_groups", "sort_order", "ASC") ;
		$this->load->view('template/body', array_merge($data, $this->load_view("product_groups/index", $message)));
	}
	
	public function add_product_group()
	{
		$data["errors"] = false ;
		$this->load->view('template/body', array_merge($data, $this->load_view("product_groups/add_product_group")));
	}
	
	public function insert_product_group()
	{
		$validation_parameters = array("group_name" => "Group Name&required", "short_description" => "Short Description&required", "landing_page_description" => "Landing Page Description&required", "group_name_french" => "Group Name (French)&required", "short_description_french" => "Short Description (French)&required", "landing_page_description_french" => "Landing Page Description (French)&required", "sort_order" => "Sort Order&required") ;
		
		if(form_validation_function($validation_parameters) == FALSE)
		{
			$data["errors"] = validation_errors('<li>', '</li>');
			$this->load->view('template/body', array_merge($data, $this->load_view("product_groups/add_product_group"))) ;
		} else {
			
			$response = $this->upload_product_file(get_random_string()) ;
			
			if($response["status"] == 1) {
				$attributes = post_data(array("group_name" => "group_name", "short_description" => "short_description", "landing_page_description" => "landing_page_description", "group_name_french" => "group_name_french", "short_description_french" => "short_description_french", "landing_page_description_french" => "landing_page_description_french", "sort_order" => "sort_order")) ;
				$attributes["banner_file"] = ($response["file_name"]) ;
				$user_id = $this->model1->insert_rec($attributes, "product_groups") ;
				redirect(base_url()."product_groups/index/1") ;
			
			} else {
				
				if($response["status"] == 2) $data["errors"] = $response["errors"] ;
				elseif($response["status"] == 3) $data["errors"] = "<li>File is not according to size.</li>" ;
				
				$this->load->view('template/body', array_merge($data, $this->load_view("product_groups/add_product_group"))) ;
			}
		}	
	}
	
	public function edit_product_group($group_id)
	{
		if($group_id)
		{
			$data["errors"] = false ;
			$data["group_rec"] = $this->model1->get_one(array("id" => $group_id), "product_groups") ;
			$this->load->view('template/body', array_merge($data, $this->load_view("product_groups/edit_product_group")));
		}
		else
			redirect(base_url()."product_groups") ;
	}
	
	public function update_product_group($group_id)
	{
		$validation_parameters = array("group_name" => "Group Name&required", "short_description" => "Short Description&required", "landing_page_description" => "Landing Page Description&", "group_name_french" => "Group Name (French)&required", "short_description_french" => "Short Description (French)&required", "landing_page_description_french" => "Landing Page Description (French)&", "sort_order" => "Sort Order&required", "upload_new_banner" => "Upload New Banner&") ;
		
		if(form_validation_function($validation_parameters) == FALSE)
		{
			$data["errors"] = validation_errors('<li>', '</li>') ;
			$data["group_rec"] = $this->model1->get_one(array("id" => $group_id), "product_groups") ;
			$this->load->view('template/body', array_merge($data, $this->load_view("product_groups/edit_product_group"))) ;
		} else {
			
			if(($this->input->post("upload_new_banner")) == "Yes") 
			{
				$response = $this->upload_product_file(get_random_string()) ;
				
				if($response["status"] == 1) {
					$group_rec = $this->model1->get_one(post_data(array("id" => "group_id")), "product_groups") ;
					$attributes = post_data(array("group_name" => "group_name", "short_description" => "short_description", "landing_page_description" => "landing_page_description", "group_name_french" => "group_name_french", "short_description_french" => "short_description_french", "landing_page_description_french" => "landing_page_description_french", "sort_order" => "sort_order")) ;
					$attributes["banner_file"] = ($response["file_name"]) ;
					$cond = post_data(array("id" => "group_id")) ;
					$user_id = $this->model1->update_rec($attributes, $cond, "product_groups") ;
					unlink(BANNER_IMAGE_DIR.($group_rec->banner_file)) ;
					redirect(base_url()."product_groups/index/2") ;
				
				} else {
					
					if($response["status"] == 2) $data["errors"] = $response["errors"] ;
					elseif($response["status"] == 3) $data["errors"] = "<li>File is not according to size.</li>" ;
					
					$data["group_rec"] = $this->model1->get_one(array("id" => $group_id), "product_groups") ;
					$this->load->view('template/body', array_merge($data, $this->load_view("product_groups/edit_product_group"))) ;
				}
			}
			else
			{
				$attributes = post_data(array("group_name" => "group_name", "short_description" => "short_description", "landing_page_description" => "landing_page_description", "group_name_french" => "group_name_french", "short_description_french" => "short_description_french", "landing_page_description_french" => "landing_page_description_french", "sort_order" => "sort_order")) ;
				$cond = post_data(array("id" => "group_id")) ;
				$user_id = $this->model1->update_rec($attributes, $cond, "product_groups") ;
				redirect(base_url()."product_groups/index/2") ;
			}
		}
	}
	
	private function upload_product_file($file_name)
	{
		$config["upload_path"] = "./images/banner_images/" ;
		$config["allowed_types"] = "jpg" ;
		$config["file_name"] = $file_name ;
		
		$this->upload->initialize($config) ;
		
		if($this->upload->do_upload("banner_file")) {
			$data = array_merge(array("status" => 1), $this->upload->data()) ;
			if($data["image_width"] == 600 && $data["image_height"] == 800)
				return $data ;
			else
			{
				$data["status"] = 3 ;
				unlink($data["full_path"]) ;
				return $data ;
			}
		} else {
			$data = array("status" => 2, "errors" => $this->upload->display_errors('<li>', '</li>')) ;
			return $data ;
		}
	}
	
	public function remove_product_group($group_id)
	{
		if($group_id)
		{
			$product_recs = $this->model1->get_all_cond(array("group_id" => $group_id), "products") ;
			if($product_recs){
				foreach($product_recs as $rec):
					unlink(LARGE_IMAGE_DIR.($rec->product_code).".jpg") ;
					unlink(MEDIUM_IMAGE_DIR.($rec->product_code).".jpg") ;
					unlink(SMALL_IMAGE_DIR.($rec->product_code).".jpg") ;
					$this->model1->delete_rec(array("product_id" => $rec->id), "skus") ;
					$this->model1->delete_rec(array("product_id" => $rec->id), "product_brochure_relation") ;
					$this->model1->delete_rec(array("product_id" => $rec->id), "products_food_sensitivites_relation") ;
					$this->model1->delete_rec(array("product_id" => $rec->id), "products_categories_relation") ;
					$this->model1->delete_rec(array("id" => $rec->id), "products") ;
				endforeach ;
			}
			
			$group_rec = $this->model1->get_one(array("id" => $group_id), "product_groups") ;
			unlink(BANNER_IMAGE_DIR.($group_rec->banner_file)) ;
			$this->model1->delete_rec(array("id" => $group_id), "product_groups") ;
			redirect(base_url()."product_groups/index/3") ;
		}
		else
			redirect(base_url()."product_categories") ;
	}
	
	private function load_view($view, $message = 0)
	{
		$data = array() ;
		
		$data["title"] = "InnoviteHealth - Product Categories" ;
		$data["current_page"] = "products" ;
		$data["side_menu"] = false ;
		$data["side_menu_type"] = "products" ;
		$data["side_product_groups"] = $this->model1->get_all_orderby("product_groups", "sort_order", "ASC") ;
		$data["group_id"] = -1 ;
		$data["message"] = $message ;
		$data["product_groups"] = $this->model1->get_all_orderby("product_groups", "sort_order", "ASC") ;
		$data["view"] = $view ;
		
		return $data ;
	}
}