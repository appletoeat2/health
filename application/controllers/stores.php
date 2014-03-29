<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed') ;

class Stores extends CI_Controller
{
	public function __construct()
	{
		parent::__construct() ;
	}
	
	public function index()
	{
		$data["meta_data"] = $this->model3->get_meta_data(array("id" => 1), "settings") ;
		$data["cities"] = $this->model1->get_all_cond(array("country" => "CA"), "cities") ;
		$this->load->view('template/body', array_merge($data, $this->load_data("stores/index"))) ;
	}
	
	private function load_data($view)
	{
		$data = array() ;
		$data["product_groups"] = $this->model1->get_all_orderby("product_groups", "sort_order", "ASC") ;
		$data["main_class"] = "wrap" ;
		$data["title"] = "Innovite Health Products - Find a Retail Location" ;
		$data["google_code"] = $this->model1->get_one(array("id" => 1), "settings") ;
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
			
			$lat3 = $_POST["latitude3"] ;
			$lng3 = $_POST["logitude3"] ;
			
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
									"telephone" => format_number($row->telephone),
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
									"distance" => "",
									"check_flag" => false,
									"status" => $row->status) ;
					$json[] = $marker ;
				endforeach ; 
			}
			
			//$json = $this->get_distance($json, $lat3, $lng3) ;
	
			$jsonstring = json_encode($json) ;
			
			echo $jsonstring ;
			
			exit ;
		}
		else
		{
			redirect(base_url()) ;
		}
		
	}
	
	public function get_distance($marker_recs, $latitude, $longitutde)
	{
		if($marker_recs){
			foreach($marker_recs as $rec):
				$rec["distance"] = $this->get_KMs($latitude, $longitutde, $rec["latitude"], $rec["longitude"]) ; 
			endforeach ;
		}
		return $marker_recs ;
	}
	
	public function get_KMs($lat1, $lng1, $lat2, $lng2)
	{
		$ch = curl_init ('http://maps.googleapis.com/maps/api/distancematrix/json?origins='.$lat1.','.$lng1.'&destinations='.$lat2.','.$lng2.'&language=en&sensor=false') ;
		curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true) ;
		$data = curl_exec($ch) ;	

		$response = json_decode($data);
		return ($response->rows[0]->elements[0]->distance->value)/1000   ;
	
	}
	
	
}