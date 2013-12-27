<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed') ;

class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct() ;
	}
	
	public function index()
	{
		$data["view"] = "f1/index" ;
		$this->load->view('template/body', $data);
	}
	
	private function load_view()
	{
	}
}