<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed') ;

class About_us extends CI_Controller
{
	public function __construct()
	{
		parent::__construct() ;
	}
	
	public function index()
	{
		$data["meta_data"] = array("seo_page_title" => "", "seo_page_description" => "", "seo_page_title_french" => "", "seo_page_description_french" => "") ;
		$this->load->view('template/body', array_merge($data, $this->load_data("about_us/our_story"))) ;
	}
	
	public function our_story()
	{
		$data["meta_data"] = array("seo_page_title" => "", "seo_page_description" => "", "seo_page_title_french" => "", "seo_page_description_french" => "") ;
		$this->load->view('template/body', array_merge($data, $this->load_data("about_us/our_story"))) ;
	}
	
	public function innovite_in_the_community()
	{
		$data["meta_data"] = array("seo_page_title" => "", "seo_page_description" => "", "seo_page_title_french" => "", "seo_page_description_french" => "") ;
		$this->load->view('template/body', array_merge($data, $this->load_data("about_us/innovite_in_the_community"))) ;
	}
	
	public function news_and_press()
	{
		$data["meta_data"] = array("seo_page_title" => "", "seo_page_description" => "", "seo_page_title_french" => "", "seo_page_description_french" => "") ;
		$this->load->view('template/body', array_merge($data, $this->load_data("about_us/news_and_press"))) ;
	}
	
	public function innovite_igniters()
	{
		$data["meta_data"] = array("seo_page_title" => "", "seo_page_description" => "", "seo_page_title_french" => "", "seo_page_description_french" => "") ;
		$this->load->view('template/body', array_merge($data, $this->load_data("about_us/innovite_igniters"))) ;
	}
	
	public function staff_picks()
	{
		$data["meta_data"] = array("seo_page_title" => "", "seo_page_description" => "", "seo_page_title_french" => "", "seo_page_description_french" => "") ;
		$this->load->view('template/body', array_merge($data, $this->load_data("about_us/staff_picks"))) ;
	}
	
	public function careers()
	{
		$data["meta_data"] = array("seo_page_title" => "", "seo_page_description" => "", "seo_page_title_french" => "", "seo_page_description_french" => "") ;
		$this->load->view('template/body', array_merge($data, $this->load_data("about_us/careers"))) ;
	}
	
	public function contact_us()
	{
		$data["meta_data"] = array("seo_page_title" => "", "seo_page_description" => "", "seo_page_title_french" => "", "seo_page_description_french" => "") ;
		$this->load->view('template/body', array_merge($data, $this->load_data("about_us/contact_us"))) ;
	}
	
	private function load_data($view)
	{
		$data = array() ;
		$data["product_groups"] = $this->model1->get_all_orderby("product_groups", "sort_order", "ASC") ;
		$data["main_class"] = "wrap" ;
		$data["title"] = "Innovite Health Products - About Us" ;
		$data["google_code"] = $this->model1->get_one(array("id" => 1), "settings") ;
		$data["view"] = $view ;
		
		return $data ;
	}
}