<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed') ;

class Ecommunity extends CI_Controller
{
	public function __construct()
	{
		parent::__construct() ;
	}
	
	public function index()
	{
		$this->load->view('template/body', $this->load_data("ecommunity/innovite_your_life")) ;
	}
	
	public function innovite_your_life()
	{
		$this->load->view('template/body', $this->load_data("ecommunity/innovite_your_life")) ;
	}
	
	public function innovite_igniters()
	{
		$this->load->view('template/body', $this->load_data("ecommunity/innovite_igniters")) ;
	}
	
	public function ask_the_expert_blog()
	{
		$this->load->view('template/body', $this->load_data("ecommunity/ask_the_expert_blog")) ;
	}
	
	public function forum()
	{
		$this->load->view('template/body', $this->load_data("ecommunity/forum")) ;
	}
	
	public function upcoming_events()
	{
		$this->load->view('template/body', $this->load_data("ecommunity/upcoming_events")) ;
	}
	
	private function load_data($view)
	{
		$data = array() ;
		$data["product_groups"] = $this->model1->get_all_orderby("product_groups", "sort_order", "ASC") ;
		$data["main_class"] = "wrap" ;
		$data["title"] = "Innovite Health Products - E-Community" ;
		$data["view"] = $view ;
		
		return $data ;
	}
}