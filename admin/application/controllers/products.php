<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed') ;

class Products extends CI_Controller
{
	public function __construct()
	{
		parent::__construct() ;
	}
	
	public function index()
	{
		$data["products"] = $this->model1->get_all("products") ;
		$this->load->view("template/body", array_merge($data, $this->load_view("products/products_index")));
	}
	
	public function insert_product()
	{
		$data["product_groups"]  = $this->model1->get_all_orderby("product_groups", "sort_order", "ASC") ;
		$data["product_categories"] = $this->model1->get_all_orderby("product_categories", "sort_order", "ASC") ;
		$data["food_sensitivities"] = $this->model1->get_all_orderby("food_sensitivities", "sort_order", "ASC") ;
		
		$this->load->view("template/body", array_merge($data, $this->load_view("products/insert_product"))) ;
	}
	
	public function product_detail($product_id = 0)
	{
		if($product_id)
		{
			$data["product_detail"] = $this->model1->get_one(array("id" => $product_id), "products") ;
			$data["group_rec"] = $this->model1->get_one(array("id" => $data["product_detail"]->group_id), "product_groups") ;
			$data["categories_recs"] = $this->model2->get_categories($product_id) ;
			$data["food_sensitivities_recs"] = $this->model2->get_food_sensitivities($product_id) ;
			$data["skus_recs"] = $this->model1->get_all_cond(array("product_id" => $product_id), "skus") ;
			$this->load->view("template/body", array_merge($data, $this->load_view("products/product_details"))) ;
		}
		else
		{
			redirect(base_url()."products") ;
		}
	}
	
	public function update_product()
	{
		if($_POST)
		{
			// Validation Code in the last of this file
			$attributes = array("product_code" => addslashes($this->input->post("product_code")), 
						   	    "group_id" => addslashes($this->input->post("group_id")),
				  				"product_name" => addslashes($this->input->post("product_name")),
				  				"health_claim" => addslashes($this->input->post("health_claim")),
				  				"short_description" => addslashes($this->input->post("short_description")),
				  				"description" => addslashes($this->input->post("description")),
							    "formula" => addslashes($this->input->post("formula")),
							  	"product_name_french" => addslashes($this->input->post("product_name_french")),
							  	"health_claim_french" => addslashes($this->input->post("health_claim_french")),
							  	"short_description_french" => addslashes($this->input->post("short_description_french")),
							  	"description_french" => addslashes($this->input->post("description_french")),
							  	"formula_french" => addslashes($this->input->post("formula_french")),
							  	"sort_order" => addslashes($this->input->post("sort_order")),
							  	"isnew" => addslashes($this->input->post("isnew")),
							  	"filter" => addslashes($this->input->post("filter")),
							  	"npn" => addslashes($this->input->post("npn")),
							  	"status" =>  addslashes($this->input->post("status"))) ;	
			
			$product_id = $this->input->post("product_id") ;
			$success = $this->model1-> update_rec($attributes, array("id" => $product_id), "products") ;
			
			$product_categories = $this->input->post("product_categories") ;
			$food_sensitivities = $this->input->post("food_sensitivities") ;
			
			$this->model1->delete_rec(array("product_id" => $product_id), "products_categories_relation") ;
			$this->model1->delete_rec(array("product_id" => $product_id), "products_food_sensitivites_relation") ;
			
			if(!empty($product_categories)) {
				foreach($product_categories as $rec):
					$attributes = array("product_id" => $product_id, "category_id" => $rec) ;
					$this->model1->insert_rec($attributes, "products_categories_relation") ;
				endforeach ;
			}
			if(!empty($food_sensitivities)) {
				foreach($food_sensitivities as $rec):
					$attributes = array("product_id" => $product_id, "food_sensitivity_id" => $rec) ;
					$this->model1->insert_rec($attributes, "products_food_sensitivites_relation") ;
				endforeach ;
			}
			
			$this->model1->delete_rec(array("product_id" => $product_id), "skus") ;
			
			$row_counter = $this->input->post("counter_rows") ;
			$sku_codes = $this->input->post("sku_code") ;
			$sizes = $this->input->post("size") ;
			$sizes_french = $this->input->post("size_french") ;
			$prices = $this->input->post("price") ;
			$wholesale_prices = $this->input->post("wholesale_price") ;
			$weights = $this->input->post("weight") ;
			$upc = $this->input->post("upc") ;
			
			if($row_counter > 0) {
				for($x = 0 ; $x < $row_counter ; $x++) {
					
					$attributes = array("sku_code" => addslashes($sku_codes[$x]), "product_id" => $product_id, "size" => addslashes($sizes[$x]), "size_french" => addslashes($sizes_french[$x]), "price" => $prices[$x], "wholesale_price" => $wholesale_prices[$x], "weight" => addslashes($weights[$x]), "upc" => addslashes($upc[$x]), "status" => 'Active') ;
					
					$this->model1->insert_rec($attributes, "skus") ;
				}
			}
			
			redirect(base_url()."products/index") ;
		}
		else
			redirect(base_url()."products") ; 
	}
	
	public function edit_product($product_id = 0)
	{
		if($product_id){
			
			$data["product_detail"] = $this->model1->get_one(array("id" => $product_id), "products") ;
			$data["group_rec"] = $this->model1->get_one(array("id" => $data["product_detail"]->group_id), "product_groups") ;
			$data["categories_recs"] = $this->model2->get_categories($product_id) ;
			$data["food_sensitivities_recs"] = $this->model2->get_food_sensitivities($product_id) ;
			$data["skus_recs"] = $this->model1->get_all_cond(array("product_id" => $product_id), "skus") ;
			
			$data["product_groups"]  = $this->model1->get_all_orderby("product_groups", "sort_order", "ASC") ;
			$data["product_categories"] = $this->model1->get_all_orderby("product_categories", "sort_order", "ASC") ;
			$data["food_sensitivities"] = $this->model1->get_all_orderby("food_sensitivities", "sort_order", "ASC") ;
			
			$this->load->view("template/body", array_merge($data, $this->load_view("products/edit_product"))) ;
			
		} else {
			redirect(base_url()."products/index") ;
		}
	}
	
	public function add_product()
	{
		if($_POST)
		{
			// Validation Code in the last of this file
			$attributes = array("product_code" => addslashes($this->input->post("product_code")), 
						   	    "group_id" => addslashes($this->input->post("group_id")),
				  				"product_name" => addslashes($this->input->post("product_name")),
				  				"health_claim" => addslashes($this->input->post("health_claim")),
				  				"short_description" => addslashes($this->input->post("short_description")),
				  				"description" => addslashes($this->input->post("description")),
							    "formula" => addslashes($this->input->post("formula")),
							  	"product_name_french" => addslashes($this->input->post("product_name_french")),
							  	"health_claim_french" => addslashes($this->input->post("health_claim_french")),
							  	"short_description_french" => addslashes($this->input->post("short_description_french")),
							  	"description_french" => addslashes($this->input->post("description_french")),
							  	"formula_french" => addslashes($this->input->post("formula_french")),
							  	"sort_order" => addslashes($this->input->post("sort_order")),
							  	"isnew" => addslashes($this->input->post("isnew")),
							  	"filter" => addslashes($this->input->post("filter")),
							  	"npn" => addslashes($this->input->post("npn")),
							  	"status" =>  addslashes($this->input->post("status"))) ;	
			
			$product_id = $this->model1->insert_rec($attributes, "products") ;
			
			$product_categories = $this->input->post("product_categories") ;
			$food_sensitivities = $this->input->post("food_sensitivities") ;
			$row_counter = $this->input->post("counter_rows") ;
			
			$sku_codes = $this->input->post("sku_code") ;
			$sizes = $this->input->post("size") ;
			$sizes_french = $this->input->post("size_french") ;
			$prices = $this->input->post("price") ;
			$wholesale_prices = $this->input->post("wholesale_price") ;
			$weights = $this->input->post("weight") ;
			$upc = $this->input->post("upc") ;
			
			if(!empty($product_categories)) {
				foreach($product_categories as $rec):
					$attributes = array("product_id" => $product_id, "category_id" => $rec) ;
					$this->model1->insert_rec($attributes, "products_categories_relation") ;
				endforeach ;
			}
			if(!empty($food_sensitivities)) {
				foreach($food_sensitivities as $rec):
					$attributes = array("product_id" => $product_id, "food_sensitivity_id" => $rec) ;
					$this->model1->insert_rec($attributes, "products_food_sensitivites_relation") ;
				endforeach ;
			}
			
			if($row_counter > 0) {
				for($x = 0 ; $x < $row_counter ; $x++) {
					$attributes = array("sku_code" => addslashes($sku_codes[$x]), "product_id" => $product_id, "size" => addslashes($sizes[$x]), "size_french" => addslashes($sizes_french[$x]), "price" => $prices[$x], "wholesale_price" => $wholesale_prices[$x], "weight" => addslashes($weights[$x]), "upc" => addslashes($upc[$x]), "status" => 'Active') ; 
					$this->model1->insert_rec($attributes, "skus") ;
				}
			}
			
			redirect(base_url()."products/index") ;
			
		} else {
			redirect(base_url()."products/index") ;
		}
	}
	
	private function load_view($view)
	{
		$data = array() ;
		
		$data["title"] = "InnoviteHealth - Admin: Products" ;
		$data["current_page"] = "products" ;
		$data["side_menu"] = false ;
		$data["view"] = $view ;
		
		return $data ;
	}
}

/*
			$this->form_validation->set_rules('product_name', 'Product Name (English)', 'required');
			$this->form_validation->set_rules('formula', 'Formula (English)', 'required');
			$this->form_validation->set_rules('health_claim', 'Health Claim (English)', 'required');
			$this->form_validation->set_rules('short_description', 'Short Description (English)', 'required');
			$this->form_validation->set_rules('description', 'Description (English)', 'required');
			
			$this->form_validation->set_rules('product_name', 'Product Name (French)', 'required');
			$this->form_validation->set_rules('formula', 'Formula (French)', 'required');
			$this->form_validation->set_rules('health_claim', 'Health Claim (French)', 'required');
			$this->form_validation->set_rules('short_description', 'Short Description (French)', 'required');
			$this->form_validation->set_rules('description', 'Description (French)', 'required');
			
			$this->form_validation->set_rules('product_code', 'Product Code', 'required');
			$this->form_validation->set_rules('npn', 'NPN', 'required');
			$this->form_validation->set_rules('sort_order', 'Sort Order', 'required');
			$this->form_validation->set_rules('group_id', '', 'required');
			$this->form_validation->set_rules('product_category[]', 'Product Category', 'required');
			$this->form_validation->set_rules('food_sensitivities[]', 'Food Sensitivities', 'required');
			/**/
	