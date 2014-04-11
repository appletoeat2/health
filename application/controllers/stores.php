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
		$data["sliders"] = $this->model1->get_all_orderby("sliders", "sort_order", "ASC") ;
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
			
			$radius = $_POST["KMradius"] ;
			$locations = $this->model2->get_places($lat1, $lat2, $lng1, $lng2) ;
			if(count($locations) > 0)
			{
				$locations1 = array_slice($locations, 0, 100) ;
				//$locations1 = $locations ;
				
				$distance_matrix = array() ;
				if($locations1)
				{
					foreach($locations1 as $row):
						$distance_matrix[] = ($row->latitude.",".$row->longitude) ;
					endforeach ;
				}
				$distance_matrix = $this->get_distances(($lat3.",".$lng3), $distance_matrix) ;
				
				$json = array() ; 
				$c = 0 ;
				if($locations1)
				{
					foreach($locations1 as $row):
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
										"distance" => round($distance_matrix[$c]),
										"check_flag" => false,
										"status" => $row->status) ;
						$json[] = $marker ;
						$c++ ;
					endforeach ; 
				}
				
				$flag = true ;
				while($flag)
				{
					$flag = false ;
					for($k = 1 ; $k < sizeof($json); $k++){
						if($json[$k - 1]["distance"] > $json[$k]["distance"]){
							$temp = $json[$k - 1] ;
							$json[$k - 1] = $json[$k] ;
							$json[$k] = $temp ;
							$flag = true ;
						}
					}
				}
		
				$jsonstring = json_encode($json) ;
				
				echo $jsonstring ;
			}
			
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
	
	//public function get_distances($from = "31.589064,74.368973", $to = array("33.746039,73.096733","30.207454,71.467323"))
	public function get_distances($from , $to)
	{
		$return = array() ;
		$offset = 20 ;
		for($co = 0 ; $co < count($to) ; $co = $co + $offset)
		{
			if($co < count($to)) {
				$to1 = array_slice($to, $co, $offset) ;
				$i = 0 ;
				$_to_ = "" ;
				
				foreach($to1 as $rec)
				{
					if($i > 0) $_to_ = $_to_ ."|" ;
					$_to_ = $_to_.$rec ;
					$i++ ;
				}
				
				$str = "http://maps.googleapis.com/maps/api/distancematrix/json?origins=".$from."&destinations=".$_to_."&sensor=false" ;
				//&key=AIzaSyCyGAu05sQeK7UhFmsVqB7S_MEbH20T7ic
				$ch = curl_init($str) ;
				curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true) ;
				$data = curl_exec($ch) ;
				$response = json_decode($data) ;
				
				for($c = 0 ; $c < $i ; $c++) {
					if(($response->rows[0]->elements[$c]->status) == "OK")
						$return[] = (($response->rows[0]->elements[$c]->distance->value)/1000)  ;
				}
			}
		}
		
		return $return ;
	}
}