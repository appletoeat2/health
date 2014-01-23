<?php
class Model2 extends CI_Model
{
	public function __construct()
	{
		parent::__construct() ;
	}
	
	public function get_brochures($product_id)
	{	
		$q = "SELECT brochures.id, brochures.brochure_file_name, brochures.brochure_file_name_french, brochures.status 
				FROM products INNER JOIN product_brochure_relation ON products.id = product_brochure_relation.product_id
				INNER JOIN brochures ON product_brochure_relation.brochure_id = brochures.id
				WHERE product_brochure_relation.product_id = ".$product_id."" ;
		
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
	
	public function search_products($search_string)
	{
		$q = "SELECT products.id AS product_id, products.product_name, products.product_code, products.health_claim, product_groups.id AS group_id, product_groups.group_name, product_groups.short_description FROM products INNER JOIN product_groups ON products.group_id = product_groups.id WHERE products.product_name LIKE '%".$search_string."%'" ;
		/*
		 OR products.sub_heading LIKE '%".$search_string."%' OR products.health_claim LIKE '%".$search_string."%' OR products.short_description LIKE '%".$search_string."%' OR products.description LIKE '%".$search_string."%' OR products.formula LIKE '%".$search_string."%'
		/**/
		
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
	
	public function get_all_products()
	{
		$q1 = "(SELECT products.id as product_categories_id, GROUP_CONCAT(DISTINCT product_categories.id ORDER BY product_categories.sort_order) AS categories_id FROM products LEFT OUTER JOIN products_categories_relation ON products.id = products_categories_relation.product_id LEFT OUTER JOIN product_categories ON products_categories_relation.category_id = product_categories.id WHERE 1 GROUP BY product_categories_id) AS PRODUCTS_CATEGORIES_TABLE" ;
		
		$q2 = "(SELECT products.id as product_food_sensitivites_id, GROUP_CONCAT(DISTINCT food_sensitivities.id ORDER BY food_sensitivities.sort_order) AS food_sensitivities_id FROM products LEFT OUTER JOIN products_food_sensitivites_relation ON products.id = products_food_sensitivites_relation.product_id LEFT OUTER JOIN food_sensitivities ON products_food_sensitivites_relation.food_sensitivity_id = food_sensitivities.id WHERE 1 GROUP BY product_food_sensitivites_id) AS FOOD_SENSITIVITIES_TABLE" ;
		
		$q = "SELECT
					products.id AS product_id, products.product_name, products.product_code, products.health_claim,
					product_groups.id AS group_id, product_groups.group_name, product_groups.short_description, 
					PRODUCTS_CATEGORIES_TABLE.categories_id,
					FOOD_SENSITIVITIES_TABLE.food_sensitivities_id
			  FROM
			  		products INNER JOIN product_groups ON products.group_id = product_groups.id
					INNER JOIN ".$q1." ON products.id = PRODUCTS_CATEGORIES_TABLE.product_categories_id
					INNER JOIN ".$q2." ON products.id = FOOD_SENSITIVITIES_TABLE.product_food_sensitivites_id
					
			  WHERE products.status = 'Active' 
			  ORDER BY product_groups.sort_order, products.sort_order ASC" ;
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
	
	public function get_all_new_products()
	{
		$q1 = "(SELECT products.id as product_categories_id, GROUP_CONCAT(DISTINCT product_categories.id ORDER BY product_categories.sort_order) AS categories_id FROM products LEFT OUTER JOIN products_categories_relation ON products.id = products_categories_relation.product_id LEFT OUTER JOIN product_categories ON products_categories_relation.category_id = product_categories.id WHERE 1 GROUP BY product_categories_id) AS PRODUCTS_CATEGORIES_TABLE" ;
		
		$q2 = "(SELECT products.id as product_food_sensitivites_id, GROUP_CONCAT(DISTINCT food_sensitivities.id ORDER BY food_sensitivities.sort_order) AS food_sensitivities_id FROM products LEFT OUTER JOIN products_food_sensitivites_relation ON products.id = products_food_sensitivites_relation.product_id LEFT OUTER JOIN food_sensitivities ON products_food_sensitivites_relation.food_sensitivity_id = food_sensitivities.id WHERE 1 GROUP BY product_food_sensitivites_id) AS FOOD_SENSITIVITIES_TABLE" ;
		
		$q = "SELECT
					products.id AS product_id, products.product_name, products.product_code, products.health_claim,
					product_groups.id AS group_id, product_groups.group_name, product_groups.short_description, 
					PRODUCTS_CATEGORIES_TABLE.categories_id,
					FOOD_SENSITIVITIES_TABLE.food_sensitivities_id
			  FROM
			  		products INNER JOIN product_groups ON products.group_id = product_groups.id
					INNER JOIN ".$q1." ON products.id = PRODUCTS_CATEGORIES_TABLE.product_categories_id
					INNER JOIN ".$q2." ON products.id = FOOD_SENSITIVITIES_TABLE.product_food_sensitivites_id
					
			  WHERE products.status = 'Active' AND products.isnew = 'Yes' 
			  ORDER BY product_groups.sort_order, products.sort_order ASC" ;
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