<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed') ;

class Product_brochure extends CI_Controller
{
	public function __construct()
	{
		parent::__construct() ;
		
		if($this->session->userdata('logged_in') != TRUE)
			redirect(base_url()."home") ;
	}
	
	public function index($message = 0)
	{
		$data["brochures"] = $this->model1->get_all("brochures") ;
		$this->load->view("template/body", array_merge($data, $this->load_view("product_brochures/index", $message)));
	}
	
	public function brochure_detail($brochure_id = 0)
	{
		if($brochure_id)
		{
			$data["errors"] = false ;
			$data["brochure_rec"] = $this->model1->get_one(array("id" => $brochure_id), "brochures") ;
			$this->load->view("template/body", array_merge($data, $this->load_view("product_brochures/coupon_detail"))) ;
		}
		else
		{
			redirect(base_url()."product_brochure") ;
		}
	}
	
	public function add_brochure()
	{
		$data["errors"] = false ;
		$data["products"] = $this->model1->get_all("products") ;
		$this->load->view("template/body", array_merge($data, $this->load_view("product_brochures/add_product_brochure"))) ;
	}
	
	public function insert_brochure()
	{
		if($_POST)
		{
			$session_data = array("error_array" => "") ;
			$this->session->set_userdata($session_data) ;
			
			$validation_parameters = array("brochure_name" => "Brochure Name (English)&", "brochure_name_french" => "Brochure Name (French)&", "status" => "Status&required") ;
	
			if(form_validation_function($validation_parameters) == FALSE)
			{
				$data["errors"] = validation_errors("<li>", "</li>") ;
				$data["products"] = $this->model1->get_all("products") ;
				$this->load->view("template/body", array_merge($data, $this->load_view("product_brochures/add_product_brochure"))) ;
			}
			else
			{
				if(file_exists(BROCHURE_ENGLISH_DIR."temp_english_pdf.pdf")) unlink(BROCHURE_ENGLISH_DIR."temp_english_pdf.pdf") ;
				if(file_exists(BROCHURE_FRENCH_DIR."temp_french_pdf.pdf")) unlink(BROCHURE_FRENCH_DIR."temp_french_pdf.pdf") ;
				
				$file1 = $this->upload_file("brochure_pdf_englsih", "./product_brochures/english/", "pdf", "temp_english_pdf") ;
				$file2 = $this->upload_file("brochure_pdf_french", "./product_brochures/french/", "pdf", "temp_french_pdf") ;
				
				$attributes = post_data(array("brochure_name" => "brochure_name", "brochure_name_french" => "brochure_name_french", "status" => "status")) ;
				$brochure_id = $this->model1->insert_rec($attributes, "brochures") ;
								
				$temp = $this->get_file_details($brochure_id, $file1, $file2) ;
				$params = $temp["file_names"] ;
				$success = $this->model1->update_rec($params, array("id" => $brochure_id), "brochures") ;
				
				$error_array = $temp["file_errors"] ;
				
				$brochure_product = $this->input->post("product_brochure") ;
				
				if(!empty($brochure_product)){
					foreach($brochure_product as $rec):
						$attributes = array("brochure_id" => $brochure_id, "product_id" => $rec) ;
						$this->model1->insert_rec($attributes, "product_brochure_relation") ;
					endforeach ;	
				}
				
				$session_data = array('error_array' => $error_array) ;
				$this->session->set_userdata($session_data) ;
				
				redirect(base_url()."product_brochure/edit_brochure/".$brochure_id) ;
			}
		}
		else
		{
			redirect(base_url()."product_brochure") ;
		}
	}
	
	public function edit_brochure($brochure_id = 0)
	{
		if($brochure_id)
		{
			$data["errors"] = 0 ;
			$data["brochure_rec"] = $this->model1->get_one(array("id" => $brochure_id), "brochures") ;
			$data["products"] = $this->model1->get_all("products") ;
			$data["product_brochure_recs"] = $this->model1->get_all_cond(array("brochure_id" => $brochure_id), "product_brochure_relation") ;
			$this->load->view("template/body", array_merge($data, $this->load_view("product_brochures/edit_product_brochure"))) ;
		}
		else
		{
			redirect(base_url()."product_brochure") ;
		}
	}
	
	public function update_brochure()
	{
		if($_POST)
		{
			$session_data = array("error_array" => "") ;
			$this->session->set_userdata($session_data) ;
			
			$brochure_id = $this->input->post("brochure_id") ;
			$brochure_rec = $this->model1->get_one(array("id" => $brochure_id), "brochures") ;
			
			$validation_parameters = array("brochure_name" => "Brochure Name (English)&", "brochure_name_french" => "Brochure Name (French)&", "status" => "Status&required") ;
			
			if(form_validation_function($validation_parameters) == FALSE)
			{
				$data["errors"] = validation_errors("<li>", "</li>") ;
				$data["brochure_rec"] = $this->model1->get_one(array("id" => $brochure_id), "brochures") ;
				$data["products"] = $this->model1->get_all("products") ;
				$data["product_brochure_recs"] = $this->model1->get_all_cond(array("brochure_id" => $brochure_id), "product_brochure_relation") ;
				$this->load->view("template/body", array_merge($data, $this->load_view("product_brochures/edit_product_brochure"))) ;
			}
			else
			{
				$attributes = post_data(array("brochure_name" => "brochure_name", "brochure_name_french" => "brochure_name_french", "status" => "status")) ;
				$success = $this->model1->update_rec($attributes, array("id" => $brochure_id), "brochures") ;
				
				$this->model1->delete_rec(array("brochure_id" => $brochure_id), "product_brochure_relation") ;
				
				$brochure_product = $this->input->post("product_brochure") ;
				
				if(!empty($brochure_product)){
					foreach($brochure_product as $rec):
						$attributes = array("brochure_id" => $brochure_id, "product_id" => $rec) ;
						$this->model1->insert_rec($attributes, "product_brochure_relation") ;
					endforeach ;	
				}
				
				$file1 ; $file2 ;
				$file_errors = "" ;
				
				if($this->input->post("brochure_pdf_checkbox_english") == "Yes") {
					
					if(file_exists(BROCHURE_ENGLISH_DIR."temp_english_pdf.pdf")) unlink(BROCHURE_ENGLISH_DIR."temp_english_pdf.pdf") ;
					$file1 = $this->upload_file("brochure_pdf_englsih", "./product_brochures/english/", "pdf", "temp_english_pdf") ;
					
					if($file1["status"] == 1) {
						unlink(BROCHURE_ENGLISH_DIR."product_brochure_".$brochure_id.".pdf") ;
						rename((BROCHURE_ENGLISH_DIR.$file1["file_name"]), (BROCHURE_ENGLISH_DIR."product_brochure_".$brochure_id.".pdf")) ;
					} else if($file1["status"] == 2)  $file_errors = $file_errors."<li>Brochure File (English)<ul>".$file1["errors"]."</ul></li>" ;
					
				}
				
				if($this->input->post("brochure_pdf_checkbox_french") == "Yes") {
					
					if(file_exists(BROCHURE_FRENCH_DIR."temp_french_pdf.pdf")) unlink(BROCHURE_FRENCH_DIR."temp_french_pdf.pdf") ;
					$file2 = $this->upload_file("brochure_pdf_french", "./product_brochures/french/", "pdf", "temp_french_pdf") ;

					if($file2["status"] == 1) {
						unlink(BROCHURE_FRENCH_DIR."product_brochure_".$brochure_id.".pdf") ;
						rename((BROCHURE_FRENCH_DIR.$file2["file_name"]), (BROCHURE_FRENCH_DIR."product_brochure_".$brochure_id.".pdf")) ;
					} else if($file2["status"] == 2) $file_errors = $file_errors."<li>Brochure File (French)<ul>".$file2["errors"]."</ul></li>" ;
				}
				
				$session_data = array("error_array" => $file_errors) ;
				$this->session->set_userdata($session_data) ;
				
				redirect(base_url()."product_brochure/edit_brochure/".$brochure_id) ;
			}
		}
		else
		{
			redirect(base_url()."product_brochure") ;
		}
	}
	
	private function upload_file($file_field_name, $path, $valid_types, $new_file_name)
	{
		$config["upload_path"] = $path ;
		$config["allowed_types"] = $valid_types ;
		$config["file_name"] = $new_file_name ;
		
		$this->upload->initialize($config) ;
		
		if($this->upload->do_upload($file_field_name))
		{
			$data = array_merge(array("status" => 1), $this->upload->data()) ;
			return $data ;
		}
		else
		{
			$data = array("status" => 2, "errors" => $this->upload->display_errors('<li>', '</li>')) ;
			return $data ;
		}
	}
	
	public function remove_brochure($brochure_id = 0)
	{
		if($brochure_id)
		{
			$this->model1->delete_rec(array("id" => $brochure_id), "brochures") ;
			$this->model1->delete_rec(array("brochure_id" => $brochure_id), "product_brochure_relation") ;
			if(file_exists(BROCHURE_ENGLISH_DIR."product_brochure_".$brochure_id.".pdf")) unlink(BROCHURE_ENGLISH_DIR."product_brochure_".$brochure_id.".pdf");
			if(file_exists(BROCHURE_FRENCH_DIR."product_brochure_".$brochure_id.".pdf")) unlink(BROCHURE_FRENCH_DIR."product_brochure_".$brochure_id.".pdf");
			redirect(base_url()."product_brochure/index/3") ;
		}
		else
		{
			redirect(base_url()."product_brochure/index") ;
		}
	}
	
	private function load_view($view, $message = 0)
	{
		$data = array() ;
		
		$data["title"] = "InnoviteHealth - Admin: Brochures" ;
		$data["current_page"] = "products" ;
		$data["message"] = $message ;
		$data["side_menu_type"] = "" ;
		$data["side_menu"] = false ;
		$data["view"] = $view ;
		
		return $data ;
	}
	
	private function get_file_details($brochure_id, $file1, $file2)
	{
		$file_names = array("brochure_file_name" => "", "brochure_file_name_french" => "") ;
		$file_errors = "" ;
		
		if($file1["status"] == 1) {
			$file_names["brochure_file_name"] = "product_brochure_".$brochure_id.".pdf" ;
			rename((BROCHURE_ENGLISH_DIR.$file1["file_name"]), (BROCHURE_ENGLISH_DIR."product_brochure_".$brochure_id.".pdf")) ;
		} else if($file1["status"] == 2)  $file_errors = $file_errors."<li>Brochure File (English)<ul>".$file1["errors"]."</ul></li>" ;
		
		if($file2["status"] == 1) {
			$file_names["brochure_file_name_french"] = "product_brochure_".$brochure_id.".pdf" ;
			rename((BROCHURE_FRENCH_DIR.$file2["file_name"]), (BROCHURE_FRENCH_DIR."product_brochure_".$brochure_id.".pdf")) ;
		} else if($file2["status"] == 2) $file_errors = $file_errors."<li>Brochure File (French)<ul>".$file2["errors"]."</ul></li>" ;
		
		return array("file_names" => $file_names, "file_errors" => $file_errors) ;
	}
}