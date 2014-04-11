<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed') ;

class Dynamic_content extends CI_Controller
{
	public function __construct()
	{
		parent::__construct() ;
		
		if($this->session->userdata('logged_in') != TRUE)
			redirect(base_url()."home") ;
	}
	
	public function index($message = 0)
	{
		$data["content"] = $this->model1->get_all("dynamic_content") ;
		$this->load->view("template/body", array_merge($data, $this->load_view("dynamic_content/index", $message))) ;
	}
	
	public function page_detail($page_id = 0)
	{
		if($store_id)
		{
			$data["errors"] = false ;
			$data["page_rec"] = $this->model1->get_one(array("id" => $page_id), "dynamic_content") ;
			$this->load->view("template/body", array_merge($data, $this->load_view("dynamic_content/page_detail"))) ;
		}
		else
		{
			redirect(base_url()."dynamic_content") ;
		}
	}
	
	public function add_page()
	{
		$data["errors"] = false ;
		$this->load->view("template/body", array_merge($data, $this->load_view("dynamic_content/add_page"))) ;
	}
	
	public function insert_page()
	{
		if($_POST)
		{
			$validation_parameters = array("title_english" => "Title (English)&", "html_title_english" => "HTML Title (English)&", "content_english" => "Content (English)&",
										   "title_french" => "Title (French)&", "html_title_french" => "HTML Title (French)&", "content_french" => "Content (French)&",
											"status" => "Status&required") ;
	
			if(form_validation_function($validation_parameters) == FALSE)
			{
				$data["errors"] = validation_errors("<li>", "</li>") ;
				$this->load->view("template/body", array_merge($data, $this->load_view("dynamic_content/add_page"))) ;
			}
			else
			{
				$attributes = post_data(array("title_english" => "title_english", "html_title_english" => "html_title_english", "content_english" => "content_english",
											  "title_french" => "title_french", "html_title_french" => "html_title_french", "content_french" => "content_french", "status" => "status")) ;
				$page_id = $this->model1->insert_rec($attributes, "dynamic_content") ;
				
				redirect(base_url()."dynamic_content/edit_page/".$page_id) ;
			}
		}
		else
		{
			redirect(base_url()."dynamic_content") ;
		}
	}
	
	public function edit_page($page_id = 0)
	{
		if($page_id)
		{
			$data["errors"] = 0 ;
			$data["page_rec"] = $this->model1->get_one(array("id" => $page_id), "dynamic_content") ;
			$this->load->view("template/body", array_merge($data, $this->load_view("dynamic_content/edit_page"))) ;
		}
		else
		{
			redirect(base_url()."dynamic_content") ;
		}
	}
	
	public function update_page()
	{
		if($_POST)
		{
			$validation_parameters = array("title_english" => "Title (English)&", "html_title_english" => "HTML Title (English)&", "content_english" => "Content (English)&",
										   "title_french" => "Title (French)&", "html_title_french" => "HTML Title (French)&", "content_french" => "Content (French)&") ;
	
			$page_id = $this->input->post("page_id") ;
			
			if(form_validation_function($validation_parameters) == FALSE)
			{
				$data["errors"] = validation_errors("<li>", "</li>") ;
				$data["page_rec"] = $this->model1->get_one(array("id" => $page_id), "dynamic_content") ;
				$this->load->view("template/body", array_merge($data, $this->load_view("dynamic_content/edit_page"))) ;
			}
			else
			{
				$attributes = post_data(array("title_english" => "title_english", "html_title_english" => "html_title_english", "content_english" => "content_english",
											  "title_french" => "title_french", "html_title_french" => "html_title_french", "content_french" => "content_french")) ;
				$success = $this->model1->update_rec($attributes, array("id" => $page_id), "dynamic_content") ;
				redirect(base_url()."dynamic_content/edit_page/".$page_id) ;
			}
		}
		else
		{
			redirect(base_url()."dynamic_content") ;
		}
	}
	
	public function remove_page($page_id = 0)
	{
		if($slider_id)
		{
			$this->model1->delete_rec(array("id" => $page_id), "dynamic_content") ;
			redirect(base_url()."dynamic_content/index/3") ;
		}
		else
		{
			redirect(base_url()."dynamic_content") ;
		}
	}
	
	private function load_view($view, $message = 0)
	{
		$data = array() ;
		
		$data["title"] = "InnoviteHealth - Admin: Dynamic Contents" ;
		$data["current_page"] = "dynamic_content" ;
		$data["message"] = $message ;
		$data["side_menu_type"] = "" ;
		$data["side_menu"] = false ;
		$data["view"] = $view ;
		
		return $data ;
	}
		
	public function view_library($page_offset = 1, $message = 0)
	{
		$this->load->library('pagination');

		$config['base_url'] = base_url()."dynamic_content/view_library" ;
		$config['total_rows'] = $this->model3->total_rec() ;
		$config['per_page'] = 50 ;
		$config['num_links'] = 5 ;
		$config['uri_segment'] = 3 ;
		$config['use_page_numbers'] = TRUE ;
		$config['full_tag_open'] = '<div class="pager">' ;
		$config['full_tag_close'] = '</div>' ;
		$config['cur_tag_open'] = '<a class="current">';
		$config['cur_tag_close'] = '</a>';
		$this->pagination->initialize($config);
		$data["links"] = $this->pagination->create_links() ;
		
		$data["files"] = $this->model1->get_all_cond_limit("image_library", array("status" => "Active"), (($page_offset - 1) * $config['per_page']), $config['per_page']) ;
		$this->load->view("template/body", array_merge($data, $this->load_view("dynamic_content/gallery", $message))) ;
	}
	
	public function delete_image($image_id = 0)
	{
		if($image_id != 0) {
			$img_rec = $this->model1->get_one(array("image_id" => $image_id), "image_library") ;
			unlink(IMAGE_LIB.$img_rec->image_name) ;
			unlink(IMAGE_LIB."thumbnails/".$img_rec->image_name) ;
			$this->model1->delete_rec(array("image_id" => $image_id), "image_library") ;
			redirect(base_url()."dynamic_content/view_library/1/3") ;
		} else {
			redirect(base_url()."dynamic_content/view_library/1/4") ;
		}
	}
	
	public function add_image($message = 0)
	{
		$data["files"] = array() ;
		$this->load->view("template/body", array_merge($data, $this->load_view("dynamic_content/image_upload", $message))) ;
	}
	
	public function upload_image($message = 0)
	{
		$config["upload_path"] = "./image_library/" ;
		$config["allowed_types"] = "gif|jpg|png" ;
		$config["file_name"] = $this->model3->get_highest_id() ;
		$config['max_size']	= '0' ;
		$config['max_width']  = '0' ;
		$config['max_height']  = '0' ;
		
		$this->upload->initialize($config) ;
		
		if($this->upload->do_upload("image_file")) {
			
			$data = $this->upload->data() ;
			$this->make_image_copy($data["full_path"], $data["file_path"]."thumbnails", 60, 60) ;
			$this->model1->insert_rec(array("image_name" => $data["file_name"],"insertion_timestamp" => date("Y-m-d G:i:s")), "image_library") ;
			redirect(base_url()."dynamic_content/view_library/1/1") ;
		
		} else {
		
			$data = $this->upload->display_errors('<li>', '</li>') ;
			redirect(base_url()."dynamic_content/view_library/1/2") ;
			
			redirect(base_url()."dynamic_content") ;
		}
		/**/
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
	
	/**/
}