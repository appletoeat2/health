<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed') ;

class Resources extends CI_Controller
{
	public function __construct()
	{
		parent::__construct() ;
	}
	
	public function index()
	{
		$this->load->view('template/body', $this->load_data("resources/heart_to_heart")) ;
	}
	
	public function heart_to_heart()
	{
		$this->load->view('template/body', $this->load_data("resources/heart_to_heart")) ;
	}
	
	public function current_promotions()
	{
		$this->load->view('template/body', $this->load_data("resources/current_promotions")) ;
	}
	
	public function brain_power()
	{
		$this->load->view('template/body', $this->load_data("resources/brain_power")) ;
	}
	
	public function bone_and_braun()
	{
		$this->load->view('template/body', $this->load_data("resources/bone_and_braun")) ;
	}
	
	public function probiotics101()
	{
		$this->load->view('template/body', $this->load_data("resources/probiotics101")) ;
	}
	
	public function candida_questionnaire()
	{
		$this->load->view('template/body', $this->load_data("resources/candida_questionnaire")) ;
	}
	
	public function healthy_journal()
	{
		$this->load->view('template/body', $this->load_data("resources/healthy_journal")) ;
	}
	
	public function research_and_articles()
	{
		$this->load->view('template/body', $this->load_data("resources/research_and_articles")) ;
	}
	
	public function recipes()
	{
		$this->load->view('template/body', $this->load_data("resources/recipes")) ;
	}
	
	public function coupons()
	{
		$this->load->view('template/body', $this->load_data("resources/coupons")) ;
	}
	
	private function load_data($view)
	{
		$data = array() ;
		$data["product_groups"] = $this->model1->get_all_orderby("product_groups", "sort_order", "ASC") ;
		$data["main_class"] = "wrap" ;
		$data["title"] = "Innovite Health Products - Resources" ;
		$data["google_code"] = $this->model1->get_one(array("id" => 1), "settings") ;
		$data["view"] = $view ;
		
		return $data ;
	}
}