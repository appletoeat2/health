<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed') ;

class Products extends CI_Controller
{
	public function __construct()
	{
		parent::__construct() ;
	}
	
	public function index($category_id)
	{
		$data["categories"] = $this->model1->get_one(array("cat_id" => $category_id), "categories") ;
		$data["products"] = $this->model1->get_all_cond_orderby(array("cat_id" => $category_id), "products", "sort_order", "ASC") ;
		
		$this->load->view('template/body', array_merge($data, $this->load_data("products/index", "wrap", $category_id)));
	}
	
	public function product_details($category_id, $product_id)
	{
		$data["product_detail"] = $this->model1->get_one(array("prod_id" => $product_id), "products") ;
		$data["skus_detail"] = $this->model1->get_all_cond_orderby(array("prod_id" => $product_id), "skus", "sort", "ASC") ;
		$data["brochure"] = $this->model2->get_brochures($product_id) ;
		$data["related_products"] = $this->model1->get_all_cond_orderby(array("cat_id" => $category_id), "products", "sort_order", "ASC") ;
		
		$this->load->view('template/body', array_merge($data, $this->load_data("products/product_details", "boxed-wrap", $category_id)));
	}
	
	public function product_brochures($brochure_name)
	{
		echo "You are trying to access product brochure \"".$brochure_name."\". I was not directed to deal with this. :)" ;
		exit ;
	}
	
	public function bone_and_joint_health_information($category_id)
	{
		$this->load->view('template/body', $this->load_data("products/joint_and_bone_health_information", "boxed-wrap", $category_id));
	}
		
	private function load_data($view, $main_class, $category_id)
	{
		$data = array() ;
		$data["main_class"] = $main_class ;
		$data["title"] = "Muscular Skeletal Therapies - Bone, Joint, Muscle, Skin, and Connective Tissue Health" ;
		$data["category_id"] = $category_id ;
		$data["view"] = $view ;
		
		return $data ;
	}
}