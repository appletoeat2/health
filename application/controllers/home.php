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
	
	private function load_view($view)
	{
		$data = array() ;
		$data["main_class"] = "wrap" ;
		$data["title"] = "InnoviteHealth - Your Trusted Companion for Leading Natural Health Products" ;
		$data["view"] = $view ;
		
		return $data ;
	}
}