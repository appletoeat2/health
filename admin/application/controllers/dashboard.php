<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed') ;

class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct() ;
	}
	
	public function index()
	{
		$this->load->view("template/body", $this->load_view("dashboard/dashboard")) ;
	}
	
	public function boxgrid()
	{
		$this->load->view("template/body", $this->load_view("dashboard/boxgrid")) ;
	}
	
	public function charts()
	{
		$this->load->view("template/body", $this->load_view("dashboard/charts")) ;
	}
	
	public function forms()
	{
		$this->load->view("template/body", $this->load_view("dashboard/forms")) ;
	}
	
	public function gallery()
	{
		$this->load->view("template/body", $this->load_view("dashboard/gallery")) ;
	}
	
	public function icons()
	{
		$this->load->view("template/body", $this->load_view("dashboard/icons")) ;
	}
	
	public function uielements()
	{
		$this->load->view("template/body", $this->load_view("dashboard/uielements")) ;
	}
	
	public function typography()
	{
		$this->load->view("template/body", $this->load_view("dashboard/typography")) ;
	}
	
	private function load_view($view)
	{
		$data = array() ;
		
		$data["title"] = "InnoviteHealth - Admin: Dashboard" ;
		$data["current_page"] = "dashboard" ;
		$data["side_menu"] = true ;
		$data["view"] = $view ;
		
		return $data ;
	}
}