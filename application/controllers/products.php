<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed') ;

class Products extends CI_Controller
{
	public function __construct()
	{
		parent::__construct() ;
	}
	
	public function index($arg = 0)
	{
		$data["products"] = $this->model2->get_all_products() ;
		
		$data["product_group_recs"]  = $this->model1->get_all_orderby("product_groups", "sort_order", "ASC") ;
		$data["product_category_recs"] = $this->model1->get_all_orderby("product_categories", "sort_order", "ASC") ;
		$data["food_sensitivity_recs"] = $this->model1->get_all_orderby("food_sensitivities", "sort_order", "ASC") ;
		
		$this->load->view('template/body', array_merge($data, $this->load_data("products/index", "wrap", 0)));
	}
	
	public function group_product($group_id)
	{
		$data["products"] = $this->model1->get_all_cond_orderby(array("group_id" => $group_id), "products", "sort_order", "ASC") ;
		$data["groups"] = $this->model1->get_one(array("id" => $group_id), "product_groups") ;
		$this->load->view('template/body', array_merge($data, $this->load_data("products/group_products", "wrap", $group_id)));
	}
	
	public function product_details($category_id = 0, $product_id = 0)
	{
		$data["product_detail"] = $this->model1->get_one(array("id" => $product_id), "products") ;
		$data["skus_detail"] = $this->model1->get_all_cond(array("product_id" => $product_id), "skus") ;
		$data["brochure"] = $this->model2->get_brochures($product_id) ;
		$data["related_products"] = $this->model1->get_all_cond_orderby(array("group_id" => $data["product_detail"]->group_id), "products", "sort_order", "ASC") ;
		
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
		
	private function load_data($view, $main_class, $group_id)
	{
		$data = array() ;
		$data["main_class"] = $main_class ;
		$data["title"] = "Muscular Skeletal Therapies - Bone, Joint, Muscle, Skin, and Connective Tissue Health" ;
		$data["group_id"] = $group_id ;
		$data["product_groups"] = $this->model1->get_all_orderby("product_groups", "sort_order", "ASC") ;
		$data["view"] = $view ;
		
		return $data ;
	}
}