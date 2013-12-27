<?php
class Model2 extends CI_Model
{
	public function __construct()
	{
		parent::__construct() ;
	}
	
	public function get_brochures($product_code)
	{	
		$q = "SELECT * FROM brochures WHERE product_codes LIKE '%".$product_code."%'" ;
		$query = $this->db->query($q);
		
		if ($query->num_rows() > 0) {		
			$query = $query->result() ;
			return array_pop($query) ;
		} else 
			return 0 ;
	}
	
	public function get_places($latitude1, $latitude2, $longitude1, $longitude2)
	{
		$q = "SELECT * FROM stores WHERE (latitude BETWEEN ".$latitude1." AND ".$latitude2.") AND (longitude BETWEEN ".$longitude1." AND ".$longitude2.") AND map_request_status = 'OK' AND status = 'Active'" ;
		
		$query = $this->db->query($q) ;
		
		if ($query->num_rows() > 0)
		{
			foreach ($query->result() as $row)
				$data[] =  $row ;
			return $data ;
		}
		else 
			 return 0 ;
	}
}
?>