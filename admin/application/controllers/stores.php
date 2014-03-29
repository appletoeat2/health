<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed') ;

class Stores extends CI_Controller
{
	public function __construct()
	{
		parent::__construct() ;
		
		if($this->session->userdata('logged_in') != TRUE)
			redirect(base_url()."home") ;
	}
	
	public function index($message = 0)
	{
		$data["stores"] = $this->model1->get_all("stores") ;
		$this->load->view("template/body", array_merge($data, $this->load_view("stores/index", $message)));
	}
	
	public function estores($message = 0)
	{
		$data["stores"] = $this->model1->get_all("estores") ;
		$this->load->view("template/body", array_merge($data, $this->load_view("stores/estore_index", $message)));
	}
	
	public function store_detail($store_id = 0)
	{
		if($store_id)
		{
			$data["errors"] = false ;
			$data["store_rec"] = $this->model1->get_one(array("id" => $store_id), "stores") ;
			$this->load->view("template/body", array_merge($data, $this->load_view("stores/store_detail"))) ;
		}
		else
		{
			redirect(base_url()."stores") ;
		}
	}
	
	public function add_stores()
	{
		$data["errors"] = false ;
		$this->load->view("template/body", array_merge($data, $this->load_view("stores/add_stores"))) ;
	}
	
	public function insert_stores()
	{
		if($_POST)
		{
			$validation_parameters = array("customer_code" => "Customer Code&required", "retailer_name" => "Retailer Name&required", "email1" => "Email1&", "email2" => "Email2&", "address1" => "Address1&required", "address2" => "Address2&required", "city" => "City&required", "province" => "Province&required", "postal_code" => "Postal Code&required", "telephone" => "Telephone&required", "website" => "Website&", "ecommerce" => "Ecommerce Link&", "facebook" => "Facebook Link&", "twitter" => "Twitter Link&", "googleplus" => "GooglePlus Link&", "linkedin" => "Linkedin Link&", "latitude" => "Latitude&required", "longitude" => "Longitude&required", "map_request_status" => "Map Request Status&required", "status" => "Status&required") ;
	
			if(form_validation_function($validation_parameters) == FALSE)
			{
				$data["errors"] = validation_errors("<li>", "</li>") ;
				$this->load->view("template/body", array_merge($data, $this->load_view("stores/add_stores"))) ;
			}
			else
			{
				$attributes = post_data(array("customer_code" => "customer_code", "retailer_name" => "retailer_name", "email1" => "email1", "email2" => "email2", "address1" => "address1", "address2" => "address2", "city" => "city", "province" => "province", "postal_code" => "postal_code", "telephone" => "telephone", "website" => "website", "ecommerce" => "ecommerce", "facebook" => "facebook", "twitter" => "twitter", "googleplus" => "googleplus", "linkedin" => "linkedin", "latitude" => "latitude", "longitude" => "longitude", "map_request_status" => "map_request_status", "status" => "status")) ;
				
				$store_id = $this->model1->insert_rec($attributes, "stores") ;
				redirect(base_url()."stores/index/1") ;
			}
		}
		else
		{
			redirect(base_url()."stores") ;
		}
	}
	
	public function insert_estore()
	{
		if($_POST)
		{
			$attributes = post_data(array("store_name_english" => "store_name_english", "store_name_french" => "store_name_french", "website_url" => "website_url", "status" => "status")) ;
				
			$store_id = $this->model1->insert_rec($attributes, "estores") ;
			redirect(base_url()."stores/estores/1") ;
		}
		else
		{
			redirect(base_url()."stores/estore_index") ;
		}
	}
	
	public function edit_stores($store_id = 0)
	{
		if($store_id)
		{
			$data["errors"] = false ;
			$data["store_rec"] = $this->model1->get_one(array("id" => $store_id), "stores") ;
			$this->load->view("template/body", array_merge($data, $this->load_view("stores/edit_stores")));
		}
		else
		{
			redirect(base_url()."stores") ;
		}
	}
	
	public function update_store()
	{
		if($_POST)
		{ 
			$validation_parameters = array("customer_code" => "Customer Code&required", "retailer_name" => "Retailer Name&required", "email1" => "Email1&", "email2" => "Email2&", "address1" => "Address1&required", "address2" => "Address2&required", "city" => "City&required", "province" => "Province&required", "postal_code" => "Postal Code&required", "telephone" => "Telephone&required", "website" => "Website&", "ecommerce" => "Ecommerce Link&", "facebook" => "Facebook Link&", "twitter" => "Twitter Link&", "googleplus" => "GooglePlus Link&", "linkedin" => "Linkedin Link&", "latitude" => "Latitude&required", "longitude" => "Longitude&required", "map_request_status" => "Map Request Status&required", "status" => "Status&required") ;
	
			if(form_validation_function($validation_parameters) == FALSE)
			{
				$data["errors"] = validation_errors("<li>", "</li>") ;
				$data["store_rec"] = $this->model1->get_one(array("id" => $this->input->post("store_id")), "stores") ;
				$this->load->view("template/body", array_merge($data, $this->load_view("stores/edit_stores"))) ;
			}
			else
			{
				$attributes = post_data(array("customer_code" => "customer_code", "retailer_name" => "retailer_name", "email1" => "email1", "email2" => "email2", "address1" => "address1", "address2" => "address2", "city" => "city", "province" => "province", "postal_code" => "postal_code", "telephone" => "telephone", "website" => "website", "ecommerce" => "ecommerce", "facebook" => "facebook", "twitter" => "twitter", "googleplus" => "googleplus", "linkedin" => "linkedin", "latitude" => "latitude", "longitude" => "longitude", "map_request_status" => "map_request_status", "status" => "status")) ;
				$store_id = $this->input->post("store_id") ;
				$success = $this->model1->update_rec($attributes, array("id" => $this->input->post("store_id")), "stores") ;
				
				redirect(base_url()."stores/index/2") ;
			}
		}
		else
		{
			redirect(base_url()."stores") ;
		}
	}
	
	public function edit_estores($store_id = 0)
	{
		if($store_id)
		{
			$data["errors"] = false ;
			$data["store_rec"] = $this->model1->get_one(array("estore_id" => $store_id), "estores") ;
			$this->load->view("template/body", array_merge($data, $this->load_view("stores/edit_estores")));
		}
		else
		{
			redirect(base_url()."stores") ;
		}
	}
	
	public function update_estore()
	{
		if($_POST)
		{
			$attributes = post_data(array("store_name_english" => "store_name_english", "store_name_french" => "store_name_french", "website_url" => "website_url", "status" => "status")) ;
			$store_id = $this->input->post("store_id") ;
			$success = $this->model1->update_rec($attributes, array("estore_id" => $this->input->post("store_id")), "estores") ;
			redirect(base_url()."stores/estores/2") ;
		}
		else
		{
			redirect(base_url()."stores/estores") ;
		}
	}
	
	public function remove_stores($store_id = 0)
	{
		if($store_id)
		{
			$this->model1->delete_rec(array("id" => $store_id), "stores") ;
			redirect(base_url()."stores/index/3") ;
		}
		else
		{
			redirect(base_url()."stores/index") ;
		}
	}
	
	public function remove_estores($estore_id = 0)
	{
		if($estore_id)
		{
			$this->model1->delete_rec(array("estore_id" => $estore_id), "estores") ;
			redirect(base_url()."stores/estores/3") ;
		}
		else
		{
			redirect(base_url()."stores/estores") ;
		}
	}
	
	public function import_stores($store_type, $update_type, $message = 0)
	{
		$data["store_type"] = $store_type ;
		$data["update_type"] = $update_type ;
		$this->load->view("template/body", array_merge($data, $this->load_view("stores/stores_import", $message)));
	}
	
	public function upload_import_file()
	{
		if($_POST)
		{
			$store_type = $this->input->post("store_type") ;
			$update_type = $this->input->post("update_type") ;
			$config["upload_path"] = "./export_import_datafiles/" ;
			$config["allowed_types"] = "xls" ;
			$config["max_size"] = "0" ;
			$config["file_name"] = "stores" ;
		
			$this->upload->initialize($config) ;
			
			if($this->upload->do_upload("stores_records_file")) {
				$data = array_merge(array("status" => 1), $this->upload->data()) ;
				$this->load->view("template/body", array_merge($data, $this->load_view("stores/stores_import", 1))) ;
				
				if($store_type == "stores") {
					$this->InsertStoresRecords($data["file_name"], $update_type) ;
					$this->UpdateLongitudeLatitude() ;
					unlink($data["full_path"]) ;
					redirect(base_url()."stores/import_stores/".$store_type."/".$update_type."/3") ;
				} elseif($store_type == "estores") {
					$this->InserteStoresRecords($data["file_name"], $update_type) ;
					unlink($data["full_path"]) ;
					redirect(base_url()."stores/import_stores/".$store_type."/".$update_type."/1") ;
				}
			} else {
				$data = array("store_type" => $store_type, "update_type" => $update_type, "status" => 2, "errors" => $this->upload->display_errors('<li>', '</li>')) ;
				$this->load->view("template/body", array_merge($data, $this->load_view("stores/stores_import", 2)));
			}
		}
		else
		{
			redirect(base_url()."stores") ;
		}
		/**/
	}
	
	private function InsertStoresRecords($filename, $update_type)
	{
		$file = EXCEL_SHEET.$filename ;
		$this->spreadsheet_excel_reader->read($file) ;
		$content = array() ;
		
		$k = 1 ;
		$x = 1 ;
		
		while($x <= $this->spreadsheet_excel_reader->sheets[0]['numRows'])
		{
			$y = 1 ;
			$row = array() ;
			while($y <= $this->spreadsheet_excel_reader->sheets[0]['numCols'])
			{
				$cell = isset($this->spreadsheet_excel_reader->sheets[0]['cells'][$x][$y]) ? $this->spreadsheet_excel_reader->sheets[0]['cells'][$x][$y] : '' ;
				$row[] = $cell ; 
				$y++ ;
			}
			
			$content[] = $row ;
			$x++;
		}
		
		if(sizeof($content) > 0)
		{
			if($update_type == "replace") $this->model1->truncate_table("stores") ;
			for($i = 1 ; ($i < sizeof($content) && $i < 500) ; $i++)
			{
				$params = array("customer_code" => $content[$i][0],
								"retailer_name" => $content[$i][1],
								"email1" => $content[$i][2],
								"email2" => $content[$i][3],
								"address1" => $content[$i][4],
								"address2" => $content[$i][5],
								"city" => $content[$i][6],
								"province" => $content[$i][7],
								"postal_code" => $content[$i][8],
								"telephone" => $content[$i][9],
								"website" => $content[$i][10],
								"ecommerce" => $content[$i][11],
								"facebook" => $content[$i][12],
								"twitter" => $content[$i][13],
								"googleplus" => $content[$i][14],
								"linkedin" => $content[$i][15],
								"youtube" => $content[$i][16],
								"map_request_status" => "NEW") ;
								
				$this->model1->insert_rec($params, "stores") ;
			}
		}
		return true ;
	}
	
	private function InserteStoresRecords($filename, $update_type)
	{
		$file = EXCEL_SHEET.$filename ;
		$this->spreadsheet_excel_reader->read($file) ;
		$content = array() ;
		
		$k = 1 ;
		$x = 1 ;
		
		while($x <= $this->spreadsheet_excel_reader->sheets[0]['numRows'])
		{
			$y = 1 ;
			$row = array() ;
			while($y <= $this->spreadsheet_excel_reader->sheets[0]['numCols'])
			{
				$cell = isset($this->spreadsheet_excel_reader->sheets[0]['cells'][$x][$y]) ? $this->spreadsheet_excel_reader->sheets[0]['cells'][$x][$y] : '' ;
				$row[] = $cell ; 
				$y++ ;
			}
			
			$content[] = $row ;
			$x++;
		}
		
		if(sizeof($content) > 0)
		{
			if($update_type == "replace") $this->model1->truncate_table("estores") ;
			for($i = 1 ; $i < sizeof($content) ; $i++)
			{
				$params = array("store_name_english" => $content[$i][0],
								"store_name_french" => $content[$i][1],
								"website_url" => $content[$i][2],
								"status" => "Active") ;
								
				$this->model1->insert_rec($params, "estores") ;
			}
		}
		return true ;
	}
	
	private function UpdateLongitudeLatitude()
	{
		$store_recs = $this->model1->get_all_cond(array("map_request_status" => "NEW"), "stores")  ;
		if($store_recs)
		{
			foreach($store_recs as $rec):
				$address = $rec->address1.", ".$rec->city.", ".$rec->province.", ".$rec->postal_code ;
				$address = str_replace(" ", "+", $address) ;
				$url = "https://maps.googleapis.com/maps/api/geocode/json?address=" . $address . "&sensor=false&key=AIzaSyCyGAu05sQeK7UhFmsVqB7S_MEbH20T7ic" ;
				$request = file_get_contents($url) ;
				$json = json_decode($request, true) ;
				if($json["status"] == "OK")
					$this->model1->update_rec(array("latitude" => $json["results"][0]["geometry"]["location"]["lat"],
													"longitude" => $json["results"][0]["geometry"]["location"]["lng"],
													"map_request_status" => $json["status"]), array("id" => $rec->id), "stores") ;
				else
					$this->model1->update_rec(array("map_request_status" => $json["status"]), array("id" => $rec->id), "stores") ;
				
			endforeach ;
		}
	}
	
	private function load_view($view, $message = 0)
	{
		$data = array() ;
		
		$data["title"] = "InnoviteHealth - Admin: Stores" ;
		$data["current_page"] = "stores" ;
		$data["message"] = $message ;
		$data["side_menu_type"] = "" ;
		$data["side_menu"] = false ;
		$data["view"] = $view ;
		
		return $data ;
	}
}