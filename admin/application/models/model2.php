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
	
	public function get_food_sensitivities($product_id)
	{
		$q = "SELECT food_sensitivities.id AS id, food_sensitivities.name AS name FROM `products_food_sensitivites_relation` INNER JOIN `food_sensitivities` ON products_food_sensitivites_relation.food_sensitivity_id = food_sensitivities.id WHERE products_food_sensitivites_relation.product_id = ".$product_id."" ;
		
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
	
	public function get_categories($product_id)
	{
		$q = "SELECT product_categories.id AS id, product_categories.category_name AS category_name FROM `product_categories` INNER JOIN  `products_categories_relation` ON products_categories_relation.category_id = product_categories.id WHERE products_categories_relation.product_id = ".$product_id."" ;
		
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
	
	public function search_products($search_string)
	{ 
		$q = "SELECT * FROM `products` WHERE `product_code` LIKE '%".$search_string."%' OR `product_name` LIKE '%".$search_string."%'" ;
		//echo $q ; exit ;
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