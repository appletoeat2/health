<?php
class Model3 extends CI_Model
{
	public function __construct()
	{
		parent::__construct() ;
	}
	
	public function get_highest_id()
	{
		$q = "SELECT (MAX(image_id) + 1) AS ID FROM image_library" ;
		$query = $this->db->query($q);
		
		if ($query->num_rows() > 0)
		{		
			$query = $query->result() ;
			$result = array_pop($query) ;
			return $result->ID ;
		}
		else 
			 return 0 ;
	}
	
	public function total_rec()
	{
		$q = "SELECT COUNT(*) AS Total_Rec FROM image_library" ;
		$query = $this->db->query($q);
		
		if ($query->num_rows() > 0)
		{		
			$query = $query->result() ;
			$result = array_pop($query) ;
			return $result->Total_Rec ;
		}
		else 
			 return 0 ;
	}
}
?>