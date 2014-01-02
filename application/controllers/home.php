<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed') ;

class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct() ;
	}
	
	public function index()
	{
		$this->load->view('template/body', $this->load_view("home/index"));
	}
	
	public function merge()
	{
		/*
		$c_brs = $this->model1->get_all("brochures") ;
		foreach($c_brs as $rec1):
			$brocher_id = $this->model1->insert_rec(array("brochure_file_name" => $rec1->en_file, "brochure_file_name_french" => $rec1->fr_file, "status" => 'Active'), "brochures_1") ;
			$product_ids = explode(", ", $rec1->product_codes) ;
			if($product_ids[0] == "") {}
			else
			{
				foreach($product_ids as $rec2):
					$product_rec = $this->model1->get_one(array("product_code" => $rec2), "products") ;
					if($product_rec)
						$rec_id = $this->model1->insert_rec(array("product_id" => $product_rec->id, "brochure_id" => $brocher_id), "product_brochure_relation") ;	
				endforeach ;
			}
		endforeach ;
		/**/
	}
	
	private function load_view($view)
	{
		$data = array() ;
		$data["main_class"] = "wrap" ;
		$data["title"] = "InnoviteHealth - Your Trusted Companion for Leading Natural Health Products" ;
		$data["view"] = $view ;
		
		return $data ;
	}
}