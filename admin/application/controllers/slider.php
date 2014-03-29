<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed') ;

class Slider extends CI_Controller
{
	public function __construct()
	{
		parent::__construct() ;
		
		if($this->session->userdata('logged_in') != TRUE)
			redirect(base_url()."home") ;
	}
	
	public function index($message = 0)
	{
		$data["sliders"] = $this->model1->get_all("sliders") ;
		$this->load->view("template/body", array_merge($data, $this->load_view("sliders/index", $message)));
	}
	
	public function order_pages()
	{
		$data["sliders"] = $this->model1->get_all("sliders") ;
		$this->load->view("template/body", array_merge($data, $this->load_view("sliders/order_pages", $message)));
	}
	
	public function slider_detail($slider_id = 0)
	{
		if($store_id)
		{
			$data["errors"] = false ;
			$data["slider_rec"] = $this->model1->get_one(array("id" => $slider_id), "slider") ;
			$this->load->view("template/body", array_merge($data, $this->load_view("sliders/slider_detail"))) ;
		}
		else
		{
			redirect(base_url()."slider") ;
		}
	}
	
	public function add_slider()
	{
		$data["errors"] = false ;
		$this->load->view("template/body", array_merge($data, $this->load_view("sliders/add_slider"))) ;
	}
	
	public function insert_slider()
	{
		if($_POST)
		{
			$session_data = array("error_array" => "") ;
			$this->session->set_userdata($session_data) ;
			
			$validation_parameters = array("start_date" => "Start Date&", "end_date" => "End Date&", "link" => "Link&", "status" => "Status&required") ;
	
			if(form_validation_function($validation_parameters) == FALSE)
			{
				$data["errors"] = validation_errors("<li>", "</li>") ;
				$this->load->view("template/body", array_merge($data, $this->load_view("sliders/add_sldier"))) ;
			}
			else
			{
				$attributes = post_data(array("slider_title" => "slider_title", "order" => "order", "start_date" => "start_date", "end_date" => "end_date", "link" => "link", "status" => "status")) ;
				$attributes["start_date"] = date("Y-m-d", strtotime($attributes["start_date"])) ;
				$attributes["end_date"] = date("Y-m-d", strtotime($attributes["end_date"])) ;				
				$slider_id = $this->model1->insert_rec($attributes, "sliders") ;
				
				$file1 = $this->upload_image_file("english_image", "./sliders/", "jpg", "english_image_".$slider_id, 850, 380) ;
				$file2 = $this->upload_image_file("french_image", "./sliders/", "jpg", "french_image_".$slider_id, 850, 380) ;
				
				$temp = $this->get_file_details($slider_id, $file1, $file2) ;
				$params = $temp["file_names"] ;
				$success = $this->model1->update_rec($params, array("slider_id" => $slider_id), "sliders") ;
				
				$session_data = array("error_array" => $temp["file_errors"]) ;
				$this->session->set_userdata($session_data) ;
				
				redirect(base_url()."slider/edit_slider/".$slider_id) ;
			}
		}
		else
		{
			redirect(base_url()."stores") ;
		}
	}
	
	public function edit_slider($slider_id = 0)
	{
		if($slider_id)
		{
			$data["errors"] = 0 ;
			$data["slider_rec"] = $this->model1->get_one(array("slider_id" => $slider_id), "sliders") ;
			$this->load->view("template/body", array_merge($data, $this->load_view("sliders/edit_slider"))) ;
		}
		else
		{
			redirect(base_url()."slider") ;
		}
	}
	
	public function update_slider()
	{
		if($_POST)
		{
			$session_data = array("error_array" => "") ;
			$this->session->set_userdata($session_data) ;
			
			$slider_id = $this->input->post("slider_id") ;
			$slider_rec = $this->model1->get_one(array("slider_id" => $slider_id), "sliders") ;
			$validation_parameters = array("start_date" => "Start Date&", "end_date" => "End Date&", "link" => "Link&", "status" => "Status&required") ;
			
			if(form_validation_function($validation_parameters) == FALSE)
			{
				$data["errors"] = validation_errors("<li>", "</li>") ;
				$data["slider_rec"] = $this->model1->get_one(array("slider_id" => $slider_id), "sliders") ;
				
				$this->load->view("template/body", array_merge($data, $this->load_view("slider/edit_slider"))) ;
			}
			else
			{
				$attributes = post_data(array("start_date" => "start_date", "order" => "order", "end_date" => "end_date", "link" => "link", "status" => "status")) ;
				$attributes["start_date"] = date("Y-m-d", strtotime($attributes["start_date"])) ;
				$attributes["end_date"] = date("Y-m-d", strtotime($attributes["end_date"])) ;				
				$success = $this->model1->update_rec($attributes, array("slider_id" => $slider_id), "sliders") ;
				
				$file1 ; $file2 ;
				$file_errors = "" ;
				if($this->input->post("slider_image_checkbox_english") == "Yes") {
					if(file_exists(SLIDER_DIR."temp_english_image_".$slider_id.".jpg")) unlink(SLIDER_DIR."temp_english_image_".$slider_id.".jpg") ;	
					$file1 = $this->upload_image_file("english_image", "./sliders/", "jpg", "temp_english_image_".$slider_id, 850, 380) ;
					
					if($file1["status"] == 1) {
						unlink(SLIDER_DIR."english_image_".$slider_id.".jpg") ;
						rename((SLIDER_DIR."temp_english_image_".$slider_id.".jpg"), (SLIDER_DIR."english_image_".$slider_id.".jpg")) ;
					}
					else if($file1["status"] == 2) $file_errors = $file_errors."<li>Slider Image (English)<ul>".$file1["errors"]."</ul></li>" ;
					else if($file1["status"] == 3)  $file_errors = $file_errors.$this->messages(2) ;
				}
				
				if($this->input->post("slider_image_checkbox_french") == "Yes") {
					if(file_exists(SLIDER_DIR."temp_french_image_".$slider_id.".jpg")) unlink(SLIDER_DIR."temp_french_image_".$slider_id.".jpg") ;	
					$file1 = $this->upload_image_file("french_image", "./sliders/", "jpg", "temp_french_image_".$slider_id, 850, 380) ;
					
					if($file1["status"] == 1) {
						unlink(SLIDER_DIR."french_image_".$slider_id.".jpg") ;
						rename((SLIDER_DIR."temp_french_image_".$slider_id.".jpg"), (SLIDER_DIR."french_image_".$slider_id.".jpg")) ;
					}
					else if($file1["status"] == 2) $file_errors = $file_errors."<li>Slider Image (French)<ul>".$file1["errors"]."</ul></li>" ;
					else if($file1["status"] == 3)  $file_errors = $file_errors.$this->messages(4) ;
				}
				
				$session_data = array("error_array" => $file_errors) ;
				$this->session->set_userdata($session_data) ;
				redirect(base_url()."slider/edit_slider/".$slider_id) ;
			}
		}
		else
		{
			redirect(base_url()."sliders") ;
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
	
	public function remove_slider($slider_id = 0)
	{
		if($slider_id)
		{
			$this->model1->delete_rec(array("slider_id" => $slider_id), "sliders") ;
			
			if(file_exists(SLIDER_DIR."english_image_".$slider_id.".jpg")) unlink(SLIDER_DIR."english_image_".$slider_id.".jpg") ;
			if(file_exists(SLIDER_DIR."french_image_".$slider_id.".jpg")) unlink(SLIDER_DIR."french_image_".$slider_id.".jpg") ;			
			
			redirect(base_url()."slider/index/3") ;
		}
		else
		{
			redirect(base_url()."stores/index") ;
		}
	}
	
	private function load_view($view, $message = 0)
	{
		$data = array() ;
		
		$data["title"] = "InnoviteHealth - Admin: Sliders" ;
		$data["current_page"] = "sliders" ;
		$data["message"] = $message ;
		$data["side_menu_type"] = "" ;
		$data["side_menu"] = false ;
		$data["view"] = $view ;
		
		return $data ;
	}
	
	private function messages($index)
	{
		$messages = array(1 => "<li>Slider Image (English) could not be uploaded.</li>",
		                  2 => "<li>Slider Image (English) is not of right size. It should be 850px width x 380px height.</li>",
						  3 => "<li>Slider Image (French) could not be uploaded.</li>",
		                  4 => "<li>Slider Image (French) is not of right size. It should be 850px width x 380px height.</li>") ;
		
		return $messages[$index] ;
	}	
	
	private function get_file_details($slider_id, $file1, $file2)
	{
		$file_names = array("english_image" => "", "french_image" => "") ;
		$file_errors = "" ;
		
		if($file1["status"] == 1) $file_names["english_image"] = $file1["file_name"] ;
		else if($file1["status"] == 2) $file_errors = $file_errors."<li>Slider Image (English)<ul>".$file1["errors"]."</ul></li>" ;
		else if($file1["status"] == 3)  $file_errors = $file_errors.$this->messages(2) ;
		
		if($file2["status"] == 1) $file_names["french_image"] = $file2["file_name"] ;
		else if($file2["status"] == 2)  $file_errors = $file_errors."<li>Slider Image (French)<ul>".$file2["errors"]."</ul></li>" ;
		else if($file2["status"] == 3)  $file_errors = $file_errors.$this->messages(4) ;
		
		return array("file_names" => $file_names, "file_errors" => $file_errors) ;
	}
	/**/
}