<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed') ;

class Product_brochures extends CI_Controller
{
	public function __construct()
	{
		parent::__construct() ;
		
		if($this->session->userdata('logged_in') != TRUE)
			redirect(base_url()."home") ;
	}
	
	public function index($message = 0)
	{
		$data["coupons"] = $this->model1->get_all("product_coupons") ;
		$this->load->view("template/body", array_merge($data, $this->load_view("coupons/index", $message)));
	}
	
	public function coupon_detail($coupon_id = 0)
	{
		if($store_id)
		{
			$data["errors"] = false ;
			$data["coupon_rec"] = $this->model1->get_one(array("id" => $coupon_id), "coupons") ;
			$this->load->view("template/body", array_merge($data, $this->load_view("coupons/coupon_detail"))) ;
		}
		else
		{
			redirect(base_url()."stores") ;
		}
	}
	
	public function add_coupon()
	{
		$data["errors"] = false ;
		$data["product_groups"] = $this->model1->get_all("product_groups") ;
		$data["products"] = $this->model1->get_all("products") ;
		$this->load->view("template/body", array_merge($data, $this->load_view("coupons/add_coupon"))) ;
	}
	
	public function insert_coupon()
	{
		if($_POST)
		{
			$session_data = array("error_array" => "") ;
			$this->session->set_userdata($session_data) ;
			
			$validation_parameters = array("expiry_date" => "Expiry Date&", "coupon_message" => "Coupon Message (English)&", "coupon_message_french" => "Coupon Message (French)&", "sort_order" => "Sort Order&", "status" => "Status&required") ;
	
			if(form_validation_function($validation_parameters) == FALSE)
			{
				$data["errors"] = validation_errors("<li>", "</li>") ;
				$data["product_groups"] = $this->model1->get_all("product_groups") ;
				$data["products"] = $this->model1->get_all("products") ;
				$this->load->view("template/body", array_merge($data, $this->load_view("coupons/add_coupon"))) ;
			}
			else
			{
				if(file_exists(COUPON_DIR."coupon_images/temp_image_english.jpg")) unlink(COUPON_DIR."coupon_images/temp_image_english.jpg") ;
				if(file_exists(COUPON_DIR."coupon_images/temp_image_french.jpg")) unlink(COUPON_DIR."coupon_images/temp_image_french.jpg") ;
				if(file_exists(COUPON_DIR."coupon_pdf/temp_pdf_english.pdf")) unlink(COUPON_DIR."coupon_pdf/temp_pdf_english.pdf") ;
				if(file_exists(COUPON_DIR."coupon_pdf/temp_pdf_french.pdf")) unlink(COUPON_DIR."coupon_pdf/temp_pdf_french.pdf") ;
				
				$file1 = $this->upload_image_file("coupon_image", "./coupons/coupon_images/", "jpg", "temp_image_english", 850, 380) ;
				$file2 = $this->upload_image_file("coupon_image_french", "./coupons/coupon_images/", "jpg", "temp_image_french", 850, 380) ;
				$file3 = $this->upload_file("coupon_pdf", "./coupons/coupon_pdfs/", "pdf", "temp_pdf_english") ;
				$file4 = $this->upload_file("coupon_pdf_french", "./coupons/coupon_pdfs/", "pdf", "temp_pdf_french") ;
				
				$attributes = post_data(array("expiry_date" => "expiry_date", "coupon_message" => "coupon_message", "coupon_message_french" => "coupon_message_french", "sort_order" => "sort_order", "status" => "status")) ;
				$attributes["expiry_date"] = date("Y-m-d", strtotime($attributes["expiry_date"])) ; 
				$coupon_id = $this->model1->insert_rec($attributes, "product_coupons") ;
				//$coupon_id = 1 ;
				//id expire_date sort_order coupon_message coupon_image coupon_pdf coupon_message_french coupon_image_french coupon_pdf_french status
				
				$temp = $this->get_file_details($coupon_id, $file1, $file2, $file3, $file4) ;
				$params = $temp["file_names"] ;
				$success = $this->model1->update_rec($params, array("id" => $coupon_id), "product_coupons") ;
				
				$coupon_group = $this->input->post("groups_coupon") ;
				$coupon_product = $this->input->post("products_coupon") ;
				$error_array = $temp["file_errors"] ;
				
				if(!empty($coupon_group)){
					foreach($coupon_group as $rec):
						$attributes = array("coupon_id" => $coupon_id, "group_id" => $rec) ;
						$this->model1->insert_rec($attributes, "group_coupons_relation") ;
					endforeach ;	
				}
				if(!empty($coupon_product)){
					foreach($coupon_product as $rec):
						$attributes = array("coupon_id" => $coupon_id, "product_id" => $rec) ;
						$this->model1->insert_rec($attributes, "prouduct_coupons_relation") ;
					endforeach ;	
				}
				
				$session_data = array('error_array' => $error_array) ;
				$this->session->set_userdata($session_data) ;
				
				redirect(base_url()."coupon/edit_coupon/".$coupon_id) ;
			}
		}
		else
		{
			redirect(base_url()."stores") ;
		}
	}
	
	public function edit_coupon($coupon_id = 0)
	{
		if($coupon_id)
		{
			$data["errors"] = 0 ;
			$data["coupon_rec"] = $this->model1->get_one(array("id" => $coupon_id), "product_coupons") ;
			
			$data["product_groups"] = $this->model1->get_all("product_groups") ;
			$data["products"] = $this->model1->get_all("products") ;
			
			$data["group_coupons_recs"] = $this->model1->get_all_cond(array("coupon_id" => $coupon_id), "group_coupons_relation") ;
			$data["product_coupons_recs"] = $this->model1->get_all_cond(array("coupon_id" => $coupon_id), "prouduct_coupons_relation") ;
			
			$this->load->view("template/body", array_merge($data, $this->load_view("coupons/edit_coupon"))) ;
		}
		else
		{
			redirect(base_url()."coupon") ;
		}
	}
	
	public function update_coupon()
	{
		if($_POST)
		{
			$session_data = array("error_array" => "") ;
			$this->session->set_userdata($session_data) ;
			
			$coupon_id = $this->input->post("coupon_id") ;
			$coupn_rec = $this->model1->get_one(array("id" => $coupon_id), "product_coupons") ;
			$validation_parameters = array("expiry_date" => "Expiry Date&", "coupon_message" => "Coupon Message (English)&", "coupon_message_french" => "Coupon Message (French)&", "sort_order" => "Sort Order&", "status" => "Status&required") ;
			
			if(form_validation_function($validation_parameters) == FALSE)
			{
				$data["errors"] = validation_errors("<li>", "</li>") ;
				$data["coupon_rec"] = $this->model1->get_one(array("id" => $coupon_id), "product_coupons") ;
			
				$data["product_groups"] = $this->model1->get_all("product_groups") ;
				$data["products"] = $this->model1->get_all("products") ;
				
				$data["group_coupons_recs"] = $this->model1->get_all_cond(array("coupon_id" => $coupon_id), "group_coupons_relation") ;
				$data["product_coupons_recs"] = $this->model1->get_all_cond(array("coupon_id" => $coupon_id), "prouduct_coupons_relation") ;
				
				$this->load->view("template/body", array_merge($data, $this->load_view("coupons/edit_coupon"))) ;
			}
			else
			{
				$attributes = post_data(array("expiry_date" => "expiry_date", "coupon_message" => "coupon_message", "coupon_message_french" => "coupon_message_french", "sort_order" => "sort_order", "status" => "status")) ;
				$attributes["expiry_date"] = date("Y-m-d", strtotime($attributes["expiry_date"])) ; 
				$success = $this->model1->update_rec($attributes, array("id" => $coupon_id), "product_coupons") ;
				
				$this->model1->delete_rec(array("coupon_id" => $coupon_id), "group_coupons_relation") ;
				$this->model1->delete_rec(array("coupon_id" => $coupon_id), "prouduct_coupons_relation") ;
				
				$coupon_group = $this->input->post("groups_coupon") ;
				$coupon_product = $this->input->post("products_coupon") ;
				
				if(!empty($coupon_group)){
					foreach($coupon_group as $rec):
						$attributes = array("coupon_id" => $coupon_id, "group_id" => $rec) ;
						$this->model1->insert_rec($attributes, "group_coupons_relation") ;
					endforeach ;	
				}
				if(!empty($coupon_product)){
					foreach($coupon_product as $rec):
						$attributes = array("coupon_id" => $coupon_id, "product_id" => $rec) ;
						$this->model1->insert_rec($attributes, "prouduct_coupons_relation") ;
					endforeach ;	
				}
				
				$file1 ; $file2 ; $file3 ; $file4 ;
				$file_errors = "" ;
				if($this->input->post("coupon_image_checkbox_english") == "Yes")
				{
					if(file_exists(COUPON_DIR."coupon_images/temp_image_english.jpg")) unlink(COUPON_DIR."coupon_images/temp_image_english.jpg") ;	
					$file1 = $this->upload_image_file("coupon_image", "./coupons/coupon_images/", "jpg", "temp_image_english", 850, 380) ;
					
					if($file1["status"] == 1) {
						unlink(COUPON_DIR."coupon_images/coupon_image_en_".$coupon_id.".jpg") ;
						rename((COUPON_DIR."coupon_images/".$file1["file_name"]), (COUPON_DIR."coupon_images/coupon_image_en_".$coupon_id.".jpg")) ;
					} else if($file1["status"] == 2) $file_errors = $file_errors."<li>Coupon Image (English)<ul>".$file1["errors"]."</ul></li>" ;
					else if($file1["status"] == 3) $file_errors = $file_errors.$this->messages(2) ;
				}
				
				if($this->input->post("coupon_image_checkbox_french") == "Yes") {
					if(file_exists(COUPON_DIR."coupon_images/temp_image_french.jpg")) unlink(COUPON_DIR."coupon_images/temp_image_french.jpg") ;
					$file2 = $this->upload_image_file("coupon_image_french", "./coupons/coupon_images/", "jpg", "temp_image_french", 850, 380) ;
								
					if($file2["status"] == 1) {
						unlink(COUPON_DIR."coupon_images/coupon_image_fr_".$coupon_id.".jpg") ;
						rename((COUPON_DIR."coupon_images/".$file2["file_name"]), (COUPON_DIR."coupon_images/coupon_image_fr_".$coupon_id.".jpg")) ;
					} else if($file2["status"] == 2) $file_errors = $file_errors."<li>Coupon Image (English)<ul>".$file2["errors"]."</ul></li>" ;
					else if($file2["status"] == 3) $file_errors = $file_errors.$this->messages(4) ;
				}
				
				if($this->input->post("coupon_pdf_checkbox_english") == "Yes") {
					if(file_exists(COUPON_DIR."coupon_pdf/temp_pdf_english.pdf")) unlink(COUPON_DIR."coupon_pdf/temp_pdf_english.pdf") ;
					$file3 = $this->upload_file("coupon_pdf", "./coupons/coupon_pdfs/", "pdf", "temp_pdf_english") ;
					
					if($file3["status"] == 1) {
						unlink(COUPON_DIR."coupon_pdfs/coupon_pdf_en_".$coupon_id.".pdf") ;
						rename((COUPON_DIR."coupon_pdfs/".$file3["file_name"]), (COUPON_DIR."coupon_pdfs/coupon_pdf_en_".$coupon_id.".pdf")) ;
					} else if($file3["status"] == 2)  $file_errors = $file_errors."<li>Coupon Image (French)<ul>".$file3["errors"]."</ul></li>" ;
				}
				
				if($this->input->post("coupon_pdf_checkbox_french") == "Yes") {
					if(file_exists(COUPON_DIR."coupon_pdf/temp_pdf_french.pdf")) unlink(COUPON_DIR."coupon_pdf/temp_pdf_french.pdf") ;
					$file4 = $this->upload_file("coupon_pdf_french", "./coupons/coupon_pdfs/", "pdf", "temp_pdf_french") ;	
					
					if($file4["status"] == 1) {
						unlink(COUPON_DIR."coupon_pdfs/coupon_pdf_fr_".$coupon_id.".pdf") ;
						rename((COUPON_DIR."coupon_pdfs/".$file4["file_name"]), (COUPON_DIR."coupon_pdfs/coupon_pdf_fr_".$coupon_id.".pdf")) ;
					} else if($file4["status"] == 2) $file_errors = $file_errors."<li>Coupon PDF (French)<ul>".$file4["errors"]."</ul></li>" ;
				}
				
				$session_data = array("error_array" => $file_errors) ;
				$this->session->set_userdata($session_data) ;
				//id expiry_date sort_order coupon_message coupon_image coupon_pdf coupon_message_french coupon_image_french coupon_pdf_french status
				redirect(base_url()."coupon/edit_coupon/".$coupon_id) ;
			}
		}
		else
		{
			redirect(base_url()."stores") ;
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
	
	private function upload_image_file($file_field_name, $path, $valid_types, $new_file_name, $max_width, $max_height)
	{
		$config["upload_path"] = $path ;
		$config["allowed_types"] = $valid_types ;
		$config["file_name"] = $new_file_name ;
		
		$this->upload->initialize($config) ;
		
		if($this->upload->do_upload($file_field_name))
		{
			$data = array_merge(array("status" => 1), $this->upload->data()) ;
			if($data["image_width"] == $max_width && $data["image_height"] == $max_height)
			{
				return $data ;
			}
			else
			{
				$data["status"] = 3 ;
				unlink($data["full_path"]) ;
				return $data ;
			}
		}
		else
		{
			$data = array("status" => 2, "errors" => $this->upload->display_errors('<li>', '</li>')) ;
			return $data ;
		}
	}
	
	public function remove_coupons($coupon_id = 0)
	{
		if($coupon_id)
		{
			$this->model1->delete_rec(array("id" => $coupon_id), "product_coupons") ;
			$this->model1->delete_rec(array("coupon_id" => $coupon_id), "group_coupons_relation") ;
			$this->model1->delete_rec(array("coupon_id" => $coupon_id), "prouduct_coupons_relation") ;
			
	if(file_exists(COUPON_DIR."coupon_images/coupon_image_en_".$coupon_id.".jpg")) unlink(COUPON_DIR."coupon_images/coupon_image_en_".$coupon_id.".jpg") ;
	if(file_exists(COUPON_DIR."coupon_images/coupon_image_fr_".$coupon_id.".jpg")) unlink(COUPON_DIR."coupon_images/coupon_image_fr_".$coupon_id.".jpg") ;
	if(file_exists(COUPON_DIR."coupon_pdfs/coupon_pdf_en_".$coupon_id.".pdf")) unlink(COUPON_DIR."coupon_pdfs/coupon_pdf_en_".$coupon_id.".pdf") ;
	if(file_exists(COUPON_DIR."coupon_pdfs/coupon_pdf_fr_".$coupon_id.".pdf")) unlink(COUPON_DIR."coupon_pdfs/coupon_pdf_fr_".$coupon_id.".pdf") ;
			redirect(base_url()."coupon/index/3") ;
		}
		else
		{
			redirect(base_url()."stores/index") ;
		}
	}
	
	private function load_view($view, $message = 0)
	{
		$data = array() ;
		
		$data["title"] = "InnoviteHealth - Admin: Coupons" ;
		$data["current_page"] = "coupons" ;
		$data["message"] = $message ;
		$data["side_menu_type"] = "" ;
		$data["side_menu"] = false ;
		$data["view"] = $view ;
		
		return $data ;
	}
	
	private function messages($index)
	{
		$messages = array(1 => "<li>Coupon Image (English) could not be uploaded.</li>",
		                  2 => "<li>Coupon Image (English) is not of right size. It should be 850px width x 380px height.</li>",
						  3 => "<li>Coupon Image (French) could not be uploaded.</li>",
		                  4 => "<li>Coupon Image (French) is not of right size. It should be 850px width x 380px height.</li>",
						  5 => "<li>Coupon PDF (English) could not be uploaded.</li>",
		                  6 => "<li>Coupon PDF (French) could not be uploaded.</li>") ;
		
		return $messages[$index] ;
	}	
	
	private function get_file_details($coupon_id, $file1, $file2, $file3, $file4)
	{
		$file_names = array("coupon_image" => "", "coupon_image_french" => "", "coupon_pdf" => "", "coupon_pdf_french" => "") ;
		$file_errors = "" ;
		
		if($file1["status"] == 1) {
			$file_names["coupon_image"] = "coupon_image_en_".$coupon_id.".jpg" ;
			rename((COUPON_DIR."coupon_images/".$file1["file_name"]), (COUPON_DIR."coupon_images/coupon_image_en_".$coupon_id.".jpg")) ;
		} else if($file1["status"] == 2) $file_errors = $file_errors."<li>Coupon Image (English)<ul>".$file1["errors"]."</ul></li>" ;
		else if($file1["status"] == 3)  $file_errors = $file_errors.$this->messages(2) ;
		
		if($file2["status"] == 1) {
			$file_names["coupon_image_french"] = "coupon_image_fr_".$coupon_id.".jpg" ;
			rename((COUPON_DIR."coupon_images/".$file2["file_name"]), (COUPON_DIR."coupon_images/coupon_image_fr_".$coupon_id.".jpg")) ;
		} else if($file2["status"] == 2)  $file_errors = $file_errors."<li>Coupon Image (French)<ul>".$file2["errors"]."</ul></li>" ;
		else if($file2["status"] == 3)  $file_errors = $file_errors.$this->messages(4) ;
		
		if($file3["status"] == 1) {
			$file_names["coupon_pdf"] = "coupon_pdf_en_".$coupon_id.".pdf" ;
			rename((COUPON_DIR."coupon_pdfs/".$file3["file_name"]), (COUPON_DIR."coupon_pdfs/coupon_pdf_en_".$coupon_id.".pdf")) ;
		} else if($file3["status"] == 2)  $file_errors = $file_errors."<li>Coupon PDF (English)<ul>".$file3["errors"]."</ul></li>" ;
		
		if($file4["status"] == 1) {
			$file_names["coupon_pdf_french"] = "coupon_pdf_fr_".$coupon_id.".pdf" ;
			rename((COUPON_DIR."coupon_pdfs/".$file4["file_name"]), (COUPON_DIR."coupon_pdfs/coupon_pdf_fr_".$coupon_id.".pdf")) ;
		} else if($file4["status"] == 2) $file_errors = $file_errors."<li>Coupon PDF (French)<ul>".$file4["errors"]."</ul></li>" ;
		
		return array("file_names" => $file_names, "file_errors" => $file_errors) ;
	}
}