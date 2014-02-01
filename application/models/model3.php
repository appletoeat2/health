<?php
class Model3 extends CI_Model
{
	public function __construct()
	{
		parent::__construct() ;
	}
	
	public function get_meta_data($cond, $tablename)
	{
		$i = 0 ;
		$conditions = '' ;
		foreach($cond as $key => $value)
		{
			$value = mysql_real_escape_string($value);
			if($i > 0)
				$conditions .= " AND " ;
				$conditions .= "`".$key."` = '".$value."' " ;
				$i++;
		}
		
		$q = "SELECT * FROM `".$tablename."` WHERE ".$conditions."" ;
		//echo $q ; // exit ;
		$query = $this->db->query($q);
		
		if ($query->num_rows() > 0)
		{		
			$query = $query->result() ;
			$temp = array_pop($query) ;
			return array("seo_page_title" => $temp->seo_page_title, "seo_page_description" => $temp->seo_page_description, "seo_page_title_french" => $temp->seo_page_title_french, "seo_page_description_french" => $temp->seo_page_description_french) ;
		}
		else 
			 return 0 ;
	}
}
?>