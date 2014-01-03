<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed') ;

class Stores extends CI_Controller
{
	public function __construct()
	{
		parent::__construct() ;
	}
	
	public function index()
	{
		$data["cities"] = $this->model1->get_all_cond(array("country" => "CA"), "cities") ;
		$this->load->view('template/body', array_merge($data, $this->load_data("stores/index"))) ;
	}
	
	private function load_data($view)
	{
		$data = array() ;
		
		$data["main_class"] = "wrap" ;
		$data["title"] = "Innovite Health Products - Find a Retail Location" ;
		$data["view"] = $view ;
		
		return $data ;
	}
	
	public function get_places()
	{
		if($_POST)
		{
			$lat1 = 0 ;
			$lat2 = 0 ;
			$lng1 = 0 ;
			$lng2 = 0 ;
	
			if($_POST["latitude1"] < $_POST["latitude2"]) { $lat1 = $_POST["latitude1"] ; $lat2 = $_POST["latitude2"] ;}
			else { $lat1 = $_POST["latitude2"] ; $lat2 = $_POST["latitude1"] ; }
	
			if($_POST["logitude1"] < $_POST["logitude2"]) { $lng1 = $_POST["logitude1"] ; $lng2 = $_POST["logitude2"] ; }
			else { $lng1 = $_POST["logitude2"] ; $lng2 = $_POST["logitude1"] ; }
			
			$locations = $this->model2->get_places($lat1, $lat2, $lng1, $lng2) ; 
			
			$json = array() ; 
			
			if($locations)
			{
				foreach($locations as $row):
					$marker = array("id" => $row->id,
									"retailer_name" => $row->retailer_name,
									"email1" => $row->email1,
									"email2" => $row->email2,
									"address1" => $row->address1,
									"address2" => $row->address2,
									"city" => $row->city,
									"province" => $row->province,
									"postal_code" => $row->postal_code,
									"website" => $row->website,
									"telephone" => $row->telephone,
									"ecommerce" => $row->ecommerce,
									"facebook" => $row->facebook,
									"twitter" => $row->twitter,
									"googleplus" => $row->googleplus,
									"linkedin" => $row->linkedin,
									"latitude" => $row->latitude,
									"longitude" => $row->longitude,
									"map_request_status" => $row->map_request_status,
									"insertion_timestamp" => $row->insertion_timestamp,
									"updation_timestamp" => $row->updation_timestamp,
									"status" => $row->status) ;
					$json[] = $marker ;
				endforeach ; 
			}
	
			$jsonstring = json_encode($json) ;
			
			echo $jsonstring ;
			
			exit ;
		}
		else
		{
			redirect(base_url()) ;
		}
		
	}
}