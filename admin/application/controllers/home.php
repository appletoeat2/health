<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed') ;

class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct() ;
	}
	
	public function index()
	{
		$this->load->view("login/login", $this->load_view("")) ;
	}
	
	public function login()
	{
		$this->load->view('template/body', $this->load_view("dashboard/dashboard"));
	}
	
	private function load_view($view)
	{
		$data = array() ;
		
		$data["title"] = "InnoviteHealth - Admin: Login" ;
		$data["current_page"] = "dashboard" ;
		$data["side_menu"] = true ;
		$data["view"] = $view ;
		
		return $data ;
	}
}