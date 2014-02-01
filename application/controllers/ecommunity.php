<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed') ;

class Ecommunity extends CI_Controller
{
	public function __construct()
	{
		parent::__construct() ;
	}
	
	public function index()
	{
		$data["meta_data"] = array("seo_page_title" => "", "seo_page_description" => "", "seo_page_title_french" => "", "seo_page_description_french" => "") ;
		$this->load->view('template/body', array_merge($data, $this->load_data("ecommunity/innovite_your_life"))) ;
	}
	
	public function innovite_your_life()
	{
		$data["meta_data"] = array("seo_page_title" => "", "seo_page_description" => "", "seo_page_title_french" => "", "seo_page_description_french" => "") ;
		$this->load->view('template/body', array_merge($data, $this->load_data("ecommunity/innovite_your_life"))) ;
	}
	
	public function innovite_igniters()
	{
		$data["meta_data"] = array("seo_page_title" => "", "seo_page_description" => "", "seo_page_title_french" => "", "seo_page_description_french" => "") ;
		$this->load->view('template/body', array_merge($data, $this->load_data("ecommunity/innovite_igniters"))) ;
	}
	
	public function ask_the_expert_blog()
	{
		$data["meta_data"] = array("seo_page_title" => "", "seo_page_description" => "", "seo_page_title_french" => "", "seo_page_description_french" => "") ;
		$this->load->view('template/body', array_merge($data, $this->load_data("ecommunity/ask_the_expert_blog"))) ;
	}
	
	public function forum()
	{
		$data["meta_data"] = array("seo_page_title" => "", "seo_page_description" => "", "seo_page_title_french" => "", "seo_page_description_french" => "") ;
		$this->load->view('template/body', array_merge($data, $this->load_data("ecommunity/forum"))) ;
	}
	
	public function upcoming_events()
	{
		$data["meta_data"] = array("seo_page_title" => "", "seo_page_description" => "", "seo_page_title_french" => "", "seo_page_description_french" => "") ;
		$this->load->view('template/body', array_merge($data, $this->load_data("ecommunity/upcoming_events"))) ;
	}
	
	private function load_data($view)
	{
		$data = array() ;
		$data["product_groups"] = $this->model1->get_all_orderby("product_groups", "sort_order", "ASC") ;
		$data["main_class"] = "wrap" ;
		$data["title"] = "Innovite Health Products - E-Community" ;
		$data["google_code"] = $this->model1->get_one(array("id" => 1), "settings") ;
		$data["view"] = $view ;
		
		return $data ;
	}
}