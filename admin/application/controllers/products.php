<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed') ;

class Products extends CI_Controller
{
	public function __construct()
	{
		parent::__construct() ;
		if($this->session->userdata('logged_in') != TRUE)
			redirect(base_url()."home") ;
	}
	
	public function index($group_id = 0, $message = 0)
	{
		$data["product_groups"] = $this->model1->get_all_orderby("product_groups", "sort_order", "DESC") ;
		$data["group_id"] = $group_id ;
		$data["search"] = 0 ;
		if($group_id == 0) {
			foreach($data["product_groups"] as $rec):
				$data["group_id"] = $rec->id ;
				break ;
			endforeach ;
		}
		
		$data["products"] = $this->model1->get_all_cond(array("group_id" => $data["group_id"]), "products") ;
		$this->load->view("template/body", array_merge($data, $this->load_view("products/products_index", true, $message)));
	}
	
	public function search_products()
	{
		if($_POST)
		{
			$data["product_groups"] = $this->model1->get_all("product_groups") ;
			$data["group_id"] = 0 ;
			$data["search"] = 1 ;
			
			$data["products"] = $this->model2->search_products($this->input->post("search_string")) ;
			$this->load->view("template/body", array_merge($data, $this->load_view("products/products_index", true)));
			
		}
		else
		{
			redirect(base_url()."products") ;
		}
	}
	
	public function product_detail($product_id = 0)
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
			$data["row_counter"] = 0 ;
			$data["errors"] = false ;
			$this->load->view("template/body", array_merge($data, $this->load_view("products/product_details"))) ;
			
		} else {
			redirect(base_url()."products/index") ;
		}
	}
	
	public function insert_product($group_id = 0)
	{
		$data["errors"] = false ;
		$data["product_groups"] = $this->model1->get_all_orderby("product_groups", "sort_order", "ASC") ;
		$data["product_categories"] = $this->model1->get_all_orderby("product_categories", "sort_order", "ASC") ;
		$data["food_sensitivities"] = $this->model1->get_all_orderby("food_sensitivities", "sort_order", "ASC") ;
		$data["group_id"] = $group_id ;
		$data["sort_order"] = $this->model2->get_max_sort_number() ;
		$data["row_counter"] = 0 ;
		$this->load->view("template/body", array_merge($data, $this->load_view("products/insert_product"))) ;
	}
	
	public function add_product($group_id = 0)
	{
		if($_POST)
		{
			$validation_parameters = array("product_code" => "Product Code&required|alpha_dash|is_unique[products.product_code]", "npn" => "NPN&", "sort_order" => "Sort Order&numeric", "group_id" => "Product Group&", "product_categories[]" => "Product Categories&","food_sensitivities[]" => "Food Sensitivities&", "isnew" => "Is New&", "status" => "Status&", "product_name" => "Product Name (English)&", "sub_heading" => "Product Sub Heading (English)&", "formula" => "Formula (English)&", "health_claim" => "Health Claim (English)&", "short_description" => "Short Description (English)&", "description" => "Description (English)&", "dosage" => "Dosage (English)&", "product_name_french" => "Product Name (French)&", "sub_heading_french" => "Product Sub Heading (French)&", "formula_french" => "Formula (French)&", "health_claim_french" => "Health Claim (French)&", "short_description_french" => "Short Description (French)&", "description_french" => "Description (French)&", "dosge_french" => "Dosage (French)&") ;
		
			if(form_validation_function($validation_parameters) == FALSE)
			{
				$data["errors"] = validation_errors('<li>', '</li>');
				$data["product_groups"] = $this->model1->get_all_orderby("product_groups", "sort_order", "ASC") ;
				$data["product_categories"] = $this->model1->get_all_orderby("product_categories", "sort_order", "ASC") ;
				$data["food_sensitivities"] = $this->model1->get_all_orderby("food_sensitivities", "sort_order", "ASC") ;
				$data["group_id"] = $group_id ;
				$data["sort_order"] = $this->model2->get_max_sort_number() ;
				
				$data["row_counter"] = $this->input->post("counter_rows") ;
				$data["sku_codes"] = $this->input->post("sku_code") ;
				$data["sizes"] = $this->input->post("size") ;
				$data["sizes_french"] = $this->input->post("size_french") ;
				$data["prices"] = $this->input->post("price") ;
				$data["wholesale_prices"] = $this->input->post("wholesale_price") ;
				$data["weights"] = $this->input->post("weight") ;
				$data["upc"] = $this->input->post("upc") ;
					
				$this->load->view("template/body", array_merge($data, $this->load_view("products/insert_product"))) ;
			}
			else
			{
				$response = $this->upload_product_file(get_random_string()) ;
					
				if($response["status"] == 1)
				{
					$attributes = post_data(array("product_code" => "product_code", "group_id" => "group_id", "sort_order" => "sort_order", "isnew" => "isnew", "npn" => "npn", "status" => "status", "product_name" => "product_name", "sub_heading" => "sub_heading", "health_claim" => "health_claim", "short_description" => "short_description", "description" => "description", "formula" => "formula", "dosage" => "dosage", "product_name_french" => "product_name_french", "sub_heading_french" => "sub_heading_french", "health_claim_french" => "health_claim_french", "short_description_french" => "short_description_french", "description_french" => "description_french", "formula_french" => "formula_french", "dosage_french" => "dosage_french")) ;
					
					$attributes["product_code"] = strtolower($attributes["product_code"]) ;
					
					$product_id = $this->model1->insert_rec($attributes, "products") ;
						
					$this->rename_files($response["file_name"], $attributes["product_code"].".jpg") ;
						
					$product_categories = $this->input->post("product_categories") ;
					$food_sensitivities = $this->input->post("food_sensitivities") ;
						
					if(!empty($product_categories))
					{
						foreach($product_categories as $rec):
							$attributes = array("product_id" => $product_id, "category_id" => $rec) ;
							$this->model1->insert_rec($attributes, "products_categories_relation") ;
						endforeach ;
					}
						
					if(!empty($food_sensitivities))
					{
						foreach($food_sensitivities as $rec):
							$attributes = array("product_id" => $product_id, "food_sensitivity_id" => $rec) ;
							$this->model1->insert_rec($attributes, "products_food_sensitivites_relation") ;
						endforeach ;
					}
						
					$row_counter = $this->input->post("counter_rows") ;
					$sku_codes = $this->input->post("sku_code") ;
					$sizes = $this->input->post("size") ;
					$sizes_french = $this->input->post("size_french") ;
					$prices = $this->input->post("price") ;
					$wholesale_prices = $this->input->post("wholesale_price") ;
					$weights = $this->input->post("weight") ;
					$upc = $this->input->post("upc") ;
						
					if($row_counter > 0)
					{
							for($x = 0 ; $x < $row_counter ; $x++) {
								$attributes = array("sku_code" => $sku_codes[$x],
													"product_id" => $product_id,
													"size" =>  $sizes[$x],
													"size_french" => $sizes_french[$x],
													"price" => $prices[$x],
													"wholesale_price" => $wholesale_prices[$x],
													"weight" => $weights[$x],
													"upc" => $upc[$x],
													"status" => 'Active') ;
								$this->model1->insert_rec($attributes, "skus") ;
							}
						}
					
					redirect(base_url()."products/index/".$this->input->post("group_id")."/1") ;
				}
				else
				{
					if($response["status"] == 2) $data["errors"] = $response["errors"] ;
					elseif($response["status"] == 3) $data["errors"] = '<li>Image should of 600 Width x 800 Height</li>' ;
						
					$data["product_groups"] = $this->model1->get_all_orderby("product_groups", "sort_order", "ASC") ;
					$data["product_categories"] = $this->model1->get_all_orderby("product_categories", "sort_order", "ASC") ;
					$data["food_sensitivities"] = $this->model1->get_all_orderby("food_sensitivities", "sort_order", "ASC") ;
					$data["group_id"] = $group_id ;
						
					$data["row_counter"] = $this->input->post("counter_rows") ;
					$data["sku_codes"] = $this->input->post("sku_code") ;
					$data["sizes"] = $this->input->post("size") ;
					$data["sizes_french"] = $this->input->post("size_french") ;
					$data["prices"] = $this->input->post("price") ;
					$data["wholesale_prices"] = $this->input->post("wholesale_price") ;
					$data["weights"] = $this->input->post("weight") ;
					$data["upc"] = $this->input->post("upc") ;
						
					$this->load->view("template/body", array_merge($data, $this->load_view("products/insert_product"))) ;	
				}
			}
		}
		else
			redirect(base_url()."products/index") ;
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
			$data["row_counter"] = 0 ;
			$data["errors"] = false ;
			$this->load->view("template/body", array_merge($data, $this->load_view("products/edit_product"))) ;
			
		} else {
			redirect(base_url()."products/index") ;
		}
	}
	
	public function update_product($product_id = 0)
	{
		if($_POST)
		{
			$validation_parameters = array("product_code" => "Product Code&required|alpha_dash", "npn" => "NPN&", "sort_order" => "Sort Order&numeric", "group_id" => "Product Group&", "product_categories[]" => "Product Categories&","food_sensitivities[]" => "Food Sensitivities&", "isnew" => "Is New&", "status" => "Status&", "product_name" => "Product Name (English)&", "sub_heading" => "Product Sub Heading (English)&", "formula" => "Formula (English)&", "health_claim" => "Health Claim (English)&", "short_description" => "Short Description (English)&", "description" => "Description (English)&", "dosage" => "Dosage (English)&", "product_name_french" => "Product Name (French)&", "sub_heading_french" => "Product Sub Heading (French)&", "formula_french" => "Formula (French)&", "health_claim_french" => "Health Claim (French)&", "short_description_french" => "Short Description (French)&", "description_french" => "Description (French)&", "dosge_french" => "Dosage (French)&") ;
			 
			if(form_validation_function($validation_parameters) == FALSE)
			{
				$data["errors"] = validation_errors('<li>', '</li>');
				$data["product_detail"] = $this->model1->get_one(array("id" => $product_id), "products") ;
				$data["group_rec"] = $this->model1->get_one(array("id" => $data["product_detail"]->group_id), "product_groups") ;
				$data["categories_recs"] = $this->model2->get_categories($product_id) ;
				$data["food_sensitivities_recs"] = $this->model2->get_food_sensitivities($product_id) ;
				$data["skus_recs"] = $this->model1->get_all_cond(array("product_id" => $product_id), "skus") ;
				
				$data["product_groups"]  = $this->model1->get_all_orderby("product_groups", "sort_order", "ASC") ;
				$data["product_categories"] = $this->model1->get_all_orderby("product_categories", "sort_order", "ASC") ;
				$data["food_sensitivities"] = $this->model1->get_all_orderby("food_sensitivities", "sort_order", "ASC") ;
				
				$data["row_counter"] = $this->input->post("counter_rows") ;
				$data["sku_codes"] = $this->input->post("sku_code") ;
				$data["sizes"] = $this->input->post("size") ;
				$data["sizes_french"] = $this->input->post("size_french") ;
				$data["prices"] = $this->input->post("price") ;
				$data["wholesale_prices"] = $this->input->post("wholesale_price") ;
				$data["weights"] = $this->input->post("weight") ;
				$data["upc"] = $this->input->post("upc") ;
					
				$this->load->view("template/body", array_merge($data, $this->load_view("products/edit_product"))) ;
			}
			else
			{
				$product_rec = $this->model1->get_one(array("id" => $product_id), "products") ;
				$current_name = ($product_rec->product_code).".jpg" ;
				$new_file = $this->input->post("upload_new_file") ;
				$response ;
				
				if($new_file == "Yes")
				{
					$response = $this->upload_product_file(get_random_string()) ;
					if($response["status"] == 1)
					{
						if(file_exists(LARGE_IMAGE_DIR.($product_rec->product_code).".jpg")) unlink(LARGE_IMAGE_DIR.($product_rec->product_code).".jpg") ;
						if(file_exists(MEDIUM_IMAGE_DIR.($product_rec->product_code).".jpg")) unlink(MEDIUM_IMAGE_DIR.($product_rec->product_code).".jpg") ;
						if(file_exists(SMALL_IMAGE_DIR.($product_rec->product_code).".jpg")) unlink(SMALL_IMAGE_DIR.($product_rec->product_code).".jpg") ;
						
						$current_name = $response["file_name"] ;
						$this->rename_files($current_name, ($this->input->post("product_code")).".jpg") ;
						
						$attributes = post_data(array("product_code" => "product_code", "group_id" => "group_id", "sort_order" => "sort_order", "isnew" => "isnew", "npn" => "npn", "status" => "status", "product_name" => "product_name", "sub_heading" => "sub_heading", "health_claim" => "health_claim", "short_description" => "short_description", "description" => "description", "formula" => "formula", "dosage" => "dosage", "product_name_french" => "product_name_french", "sub_heading_french" => "sub_heading_french", "health_claim_french" => "health_claim_french", "short_description_french" => "short_description_french", "description_french" => "description_french", "formula_french" => "formula_french", "dosage_french" => "dosage_french")) ;
						
						$attributes["product_code"] = strtolower($attributes["product_code"]) ;
						$product_id = $this->input->post("product_id") ;
						$success = $this->model1->update_rec($attributes, array("id" => $product_id), "products") ;
				
						$product_categories = $this->input->post("product_categories") ;
						$food_sensitivities = $this->input->post("food_sensitivities") ;
				
						$this->model1->delete_rec(array("product_id" => $product_id), "products_categories_relation") ;
						$this->model1->delete_rec(array("product_id" => $product_id), "products_food_sensitivites_relation") ;
				
						if(!empty($product_categories))
						{
							foreach($product_categories as $rec):
								$attributes = array("product_id" => $product_id, "category_id" => $rec) ;
								$this->model1->insert_rec($attributes, "products_categories_relation") ;
							endforeach ;
						}
				
						if(!empty($food_sensitivities))
						{
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
				
						redirect(base_url()."products/index/".$this->input->post("group_id")."/2") ;
					}
					else
					{
						if($response["status"] == 2)$data["errors"] = $response["errors"] ;
						elseif($response["status"] == 3) $data["errors"] = '<li>Image should of 600 Width x 800 Height</li>' ;
						
						$data["product_detail"] = $this->model1->get_one(array("id" => $product_id), "products") ;
						$data["group_rec"] = $this->model1->get_one(array("id" => $data["product_detail"]->group_id), "product_groups") ;
						$data["categories_recs"] = $this->model2->get_categories($product_id) ;
						$data["food_sensitivities_recs"] = $this->model2->get_food_sensitivities($product_id) ;
						$data["skus_recs"] = $this->model1->get_all_cond(array("product_id" => $product_id), "skus") ;
						
						$data["product_groups"]  = $this->model1->get_all_orderby("product_groups", "sort_order", "ASC") ;
						$data["product_categories"] = $this->model1->get_all_orderby("product_categories", "sort_order", "ASC") ;
						$data["food_sensitivities"] = $this->model1->get_all_orderby("food_sensitivities", "sort_order", "ASC") ;
						
						$data["row_counter"] = $this->input->post("counter_rows") ;
						$data["sku_codes"] = $this->input->post("sku_code") ;
						$data["sizes"] = $this->input->post("size") ;
						$data["sizes_french"] = $this->input->post("size_french") ;
						$data["prices"] = $this->input->post("price") ;
						$data["wholesale_prices"] = $this->input->post("wholesale_price") ;
						$data["weights"] = $this->input->post("weight") ;
						$data["upc"] = $this->input->post("upc") ;
							
						$this->load->view("template/body", array_merge($data, $this->load_view("products/edit_product"))) ;	
					}
				}
				else
				{
					$this->rename_files($current_name, ($this->input->post("product_code")).".jpg") ;
					
					$attributes = post_data(array("product_code" => "product_code", "group_id" => "group_id", "sort_order" => "sort_order", "isnew" => "isnew", "npn" => "npn", "status" => "status", "product_name" => "product_name", "sub_heading" => "sub_heading", "health_claim" => "health_claim", "short_description" => "short_description", "description" => "description", "formula" => "formula", "dosage" => "dosage", "product_name_french" => "product_name_french", "sub_heading_french" => "sub_heading_french", "health_claim_french" => "health_claim_french", "short_description_french" => "short_description_french", "description_french" => "description_french", "formula_french" => "formula_french", "dosage_french" => "dosage_french")) ;
					
					$attributes["product_code"] = strtolower($attributes["product_code"]) ;
					$product_id = $this->input->post("product_id") ;
					$success = $this->model1-> update_rec($attributes, array("id" => $product_id), "products") ;
					
					$product_categories = $this->input->post("product_categories") ;
					$food_sensitivities = $this->input->post("food_sensitivities") ;
					
					$this->model1->delete_rec(array("product_id" => $product_id), "products_categories_relation") ;
					$this->model1->delete_rec(array("product_id" => $product_id), "products_food_sensitivites_relation") ;
					
					if(!empty($product_categories))
					{
						foreach($product_categories as $rec):
							$attributes = array("product_id" => $product_id, "category_id" => $rec) ;
							$this->model1->insert_rec($attributes, "products_categories_relation") ;
						endforeach ;
					}
					
					if(!empty($food_sensitivities))
					{
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
					
					if($row_counter > 0)
					{
						for($x = 0 ; $x < $row_counter ; $x++)
						{
							$attributes = array("sku_code" => addslashes($sku_codes[$x]), "product_id" => $product_id, "size" => addslashes($sizes[$x]), "size_french" => addslashes($sizes_french[$x]), "price" => $prices[$x], "wholesale_price" => $wholesale_prices[$x], "weight" => addslashes($weights[$x]), "upc" => addslashes($upc[$x]), "status" => 'Active') ;
							$this->model1->insert_rec($attributes, "skus") ;
						}
					}	
					
					redirect(base_url()."products/index/".$this->input->post("group_id")."/2") ;		
				}
			}
		}
		else redirect(base_url()."products") ; 
	}
	
	public function remove_product($product_id = 0)
	{
		if($product_id)
		{
			$product_rec = $this->model1->get_one(array("id" => $product_id), "products") ;
			if(file_exists(LARGE_IMAGE_DIR.($product_rec->product_code).".jpg")) unlink(LARGE_IMAGE_DIR.($product_rec->product_code).".jpg") ;
			if(file_exists(MEDIUM_IMAGE_DIR.($product_rec->product_code).".jpg")) unlink(MEDIUM_IMAGE_DIR.($product_rec->product_code).".jpg") ;
			if(file_exists(SMALL_IMAGE_DIR.($product_rec->product_code).".jpg")) unlink(SMALL_IMAGE_DIR.($product_rec->product_code).".jpg") ;
			$this->model1->delete_rec(array("product_id" => $product_id), "skus") ;
			$this->model1->delete_rec(array("product_id" => $product_id), "product_brochure_relation") ;
			$this->model1->delete_rec(array("product_id" => $product_id), "products_food_sensitivites_relation") ;
			$this->model1->delete_rec(array("product_id" => $product_id), "products_categories_relation") ;
			$this->model1->delete_rec(array("id" => $product_id), "products") ;	
			redirect(base_url()."products/index/0/3") ;
		}
		else
		{
			redirect(base_url()."products/index") ;
		}
	}
	
	private function load_view($view, $side_menu = false, $message = 0)
	{
		$data = array() ;
		
		$data["title"] = "InnoviteHealth - Admin: Products" ;
		$data["current_page"] = "products" ;
		$data["side_menu"] = $side_menu ;
		$data["side_menu_type"] = "products" ;		
		$data["message"] = $message ;
		$data["side_product_groups"] = $this->model1->get_all_orderby("product_groups", "sort_order", "ASC") ;
		$data["view"] = $view ;
		
		return $data ;
	}
	
	private function rename_files($current_name, $new_name)
	{
		if(file_exists(LARGE_IMAGE_DIR.$current_name))
			rename((LARGE_IMAGE_DIR.$current_name), (LARGE_IMAGE_DIR.$new_name)) ;
		if(file_exists(MEDIUM_IMAGE_DIR.$current_name))
			rename((MEDIUM_IMAGE_DIR.$current_name), (MEDIUM_IMAGE_DIR.$new_name)) ;
		if(file_exists(SMALL_IMAGE_DIR.$current_name))
			rename((SMALL_IMAGE_DIR.$current_name), (SMALL_IMAGE_DIR.$new_name)) ;
	}
	
	private function upload_product_file($file_name)
	{
		$config["upload_path"] = "./images/prod_images/" ;
		$config["allowed_types"] = "jpg" ;
		$config["file_name"] = $file_name ;
		
		$this->upload->initialize($config) ;
		
		if($this->upload->do_upload("product_file")) {
			$data = array_merge(array("status" => 1), $this->upload->data()) ;
			if($data["image_width"] == 600 && $data["image_height"] == 800)
			{
				$this->make_image_copy($data["full_path"], $data["file_path"]."large", 600, 800) ;
				$this->make_image_copy($data["full_path"], $data["file_path"]."medium", 300, 400) ;
				$this->make_image_copy($data["full_path"], $data["file_path"]."small", 135, 180) ;
				unlink($data["full_path"]) ;
				return $data ;
			}
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
	
	private function make_image_copy($source_path, $destination_path, $width, $height)
	{
		$config["image_library"] = "gd2" ;
		$config["source_image"] = $source_path ;
		$config["new_image"] = $destination_path ;
		$config["maintain_ratio"] = TRUE ;
		$config["width"] = $width ;
		$config["height"] = $height ;
		
		$this->image_lib->initialize($config) ;
		$this->image_lib->resize() ;
		$this->image_lib->clear() ;
	}
}	