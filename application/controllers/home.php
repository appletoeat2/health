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
	
	public function terms_and_conditions()
	{
		$this->load->view('template/body', $this->load_view("home/terms_and_conditions"));
	}
	
	public function privacy_policy()
	{
		$this->load->view('template/body', $this->load_view("home/privacy_policy"));
	}
	
	private function load_view($view)
	{
		$data = array() ;
		$data["main_class"] = "wrap" ;
		$data["title"] = "InnoviteHealth - Your Trusted Companion for Leading Natural Health Products" ;
		$data["product_groups"] = $this->model1->get_all_orderby("product_groups", "sort_order", "ASC") ;
		$data["view"] = $view ;
		
		return $data ;
	}
}