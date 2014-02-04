<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed') ;

class About_us extends CI_Controller
{
	public function __construct()
	{
		parent::__construct() ;
	}
	
	public function index()
	{
		$data["meta_data"] = array("seo_page_title" => "About us | Innovite Health", "seo_page_description", "seo_page_description" => "Innovite Health inspires nutritional wellness to nourish and repair from the inside out. Choose all-natural supplements with clinically proven ingredients for every stage of life.", "seo_page_title_french" => "", "seo_page_description_french" => "") ;
		$this->load->view('template/body', array_merge($data, $this->load_data("about_us/our_story"))) ;
	}
	
	public function our_story()
	{
		$data["meta_data"] = array("seo_page_title" => "About us | Innovite Health", "seo_page_description" => "Innovite Health inspires nutritional wellness to nourish and repair from the inside out. Choose all-natural supplements with clinically proven ingredients for every stage of life.", "seo_page_title_french" => "", "seo_page_description_french" => "") ;
		$this->load->view('template/body', array_merge($data, $this->load_data("about_us/our_story"))) ;
	}
	
	public function innovite_in_the_community()
	{
		$data["meta_data"] = array("seo_page_title" => "Innovite in the community | Corporate Social Responsibility", "seo_page_description" => "Start change in your community.  Support Cardiac Health Foundation of Canada and Mito Canada.", "seo_page_title_french" => "", "seo_page_description_french" => "") ;
		$this->load->view('template/body', array_merge($data, $this->load_data("about_us/innovite_in_the_community"))) ;
	}
	
	public function news_and_press()
	{
		$data["meta_data"] = array("seo_page_title" => "News Centre | Innovite Health", "seo_page_description" => "Click here to see the latest in product releases, news and information relating to Innovite Health.", "seo_page_title_french" => "", "seo_page_description_french" => "") ;
		$this->load->view('template/body', array_merge($data, $this->load_data("about_us/news_and_press"))) ;
	}
	
	public function innovite_igniters()
	{
		$data["meta_data"] = array("seo_page_title" => "Innovite Igniters | Corporate Social Responsibility | Innovite Health", "seo_page_description" => "Join our group and start change in your community. We are always looking for ambassadors to carry the essence of healthy living.", "seo_page_title_french" => "", "seo_page_description_french" => "") ;
		$this->load->view('template/body', array_merge($data, $this->load_data("about_us/innovite_igniters"))) ;
	}
	
	public function staff_picks()
	{
		$data["meta_data"] = array("seo_page_title" =>"Staff Picks | Gluten and soy-free all-natural supplements | Innovite Health", "seo_page_description" => "Innovite Health staff are firm believers that a strong nutritional foundation creates the core of strong health.  Supercharge your brain with:  PQQ and CoQ10.", "seo_page_title_french" => "", "seo_page_description_french" => "") ;
		$this->load->view('template/body', array_merge($data, $this->load_data("about_us/staff_picks"))) ;
	}
	
	public function careers()
	{
		$data["meta_data"] = array("seo_page_title" => "Careers | Innovite Health", "seo_page_description" => "We invite you to work on a team where at the end of the day you know you made a difference.", "seo_page_title_french" => "", "seo_page_description_french" => "") ;
		$this->load->view('template/body', array_merge($data, $this->load_data("about_us/careers"))) ;
	}
	
	public function contact_us()
	{
		$data["meta_data"] = array("seo_page_title" => "Contact Information | Innovite Health | Customer Service", "seo_page_description" => "Send us your feedback by email, phone or mail.  Hours of operation are listed. Note that Innovite Health sells only to retailers and healthcare professionals.", "seo_page_title_french" => "", "seo_page_description_french" => "") ;
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