<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed') ;

class Resources extends CI_Controller
{
	public function __construct()
	{
		parent::__construct() ;
	}
	
	public function index()
	{
		$data["meta_data"] = array("seo_page_title" => "", "seo_page_description" => "", "seo_page_title_french" => "", "seo_page_description_french" => "") ;
		$this->load->view('template/body', array_merge($data, $this->load_data("resources/heart_to_heart"))) ;
	}
	
	public function heart_to_heart()
	{
		$data["meta_data"] = array("seo_page_title" => "", "seo_page_description" => "", "seo_page_title_french" => "", "seo_page_description_french" => "") ;
		$this->load->view('template/body', array_merge($data, $this->load_data("resources/heart_to_heart"))) ;
	}
	
	public function current_promotions()
	{
		$data["meta_data"] = array("seo_page_title" => "Latest Campaign | Cardiovascular Health | Most Devoted Body Part", "seo_page_description" => "This year, heart disease will affect more women in Canada than any other disease. Share with us how you take care of your  #MostDevotedBodyPart.", "seo_page_title_french" => "", "seo_page_description_french" => "") ;
		$this->load->view('template/body', array_merge($data, $this->load_data("resources/current_promotions"))) ;
	}
	
	public function brain_power()
	{
		$data["meta_data"] = array("seo_page_title" => "", "seo_page_description" => "", "seo_page_title_french" => "", "seo_page_description_french" => "") ;
		$this->load->view('template/body', array_merge($data, $this->load_data("resources/brain_power"))) ;
	}
	
	public function bone_and_braun()
	{
		$data["meta_data"] = array("seo_page_title" => "", "seo_page_description" => "", "seo_page_title_french" => "", "seo_page_description_french" => "") ;
		$this->load->view('template/body', array_merge($data, $this->load_data("resources/bone_and_braun"))) ;
	}
	
	public function estores()
	{
		$data["estores"] = $this->model1->get_all("estores") ;
		$data["meta_data"] = array("seo_page_title" => "", "seo_page_description" => "", "seo_page_title_french" => "", "seo_page_description_french" => "") ;
		$this->load->view('template/body', array_merge($data, $this->load_data("stores/estores"))) ;
	}
	
	public function probiotics101()
	{
		$data["meta_data"] = array("seo_page_title" => "", "seo_page_description" => "", "seo_page_title_french" => "", "seo_page_description_french" => "") ;
		$this->load->view('template/body', array_merge($data, $this->load_data("resources/probiotics101"))) ;
	}
	
	public function candida_questionnaire()
	{
		$data["meta_data"] = array("seo_page_title" => "Candida Questionnaire | Yeast Buster | natural candida detox ", "seo_page_description" => "Determine if Candida is impacting your health.  Fill out the simple questionnaire. A high score may indicate the need to take Yeast Buster  candida detox program.", "seo_page_title_french" => "", "seo_page_description_french" => "") ;
		$data["error"] = 0 ;
		$this->load->view('template/body', array_merge($data, $this->load_data("resources/candida_questionnaire"))) ;
	}
	
	public function candida_results()
	{
		if($_POST)
		{
			$data["meta_data"] = array("seo_page_title" => "Candida Questionnaire | Yeast Buster | natural candida detox ",
									   "seo_page_description" => "Determine if Candida is impacting your health.  Fill out the simple questionnaire. A high score may indicate the need to take Yeast Buster  candida detox program.",
									   "seo_page_title_french" => "", "seo_page_description_french" => "") ;
			$validation_parameters = $this->make_array() ;
			if(form_validation_function($validation_parameters) == FALSE)
			{
				$data["error"] = 1 ;
				$this->load->view('template/body', array_merge($data, $this->load_data("resources/candida_questionnaire"))) ;
			}
			else
			{
				$data["attributes"] = array() ;
				for($i = 1 ; $i < 55 ; $i++)
				{
					$data["q".$i] = $this->input->post("q".$i) ;
					if($data["q".$i] == "") $flag = true ; 
				}
				$this->load->view("template/body", array_merge($data, $this->load_data("resources/candida_results"))) ;
			}
		}
		else
		{
			redirect(base_url()."home") ;
		}
	}
	
	public function healthy_journal()
	{
		$data["meta_data"] = array("seo_page_title" => "", "seo_page_description" => "", "seo_page_title_french" => "", "seo_page_description_french" => "") ;
		$this->load->view('template/body', array_merge($data, $this->load_data("resources/healthy_journal"))) ;
	}
	
	public function research_and_articles()
	{
		$data["meta_data"] = array("seo_page_title" => "", "seo_page_description" => "", "seo_page_title_french" => "", "seo_page_description_french" => "") ;
		$this->load->view('template/body', array_merge($data, $this->load_data("resources/research_and_articles"))) ;
	}
	
	public function recipes()
	{
		$data["meta_data"] = array("seo_page_title" => "", "seo_page_description" => "", "seo_page_title_french" => "", "seo_page_description_french" => "") ;
		$this->load->view('template/body', array_merge($data, $this->load_data("resources/recipes"))) ;
	}
	
	public function coupons()
	{
		$data["meta_data"] = array("seo_page_title" => "", "seo_page_description" => "", "seo_page_title_french" => "", "seo_page_description_french" => "") ;
		$data["coupon_recs"] = $this->model2->get_all_product_coupons("ASC") ;
		$this->load->view('template/body', array_merge($data, $this->load_data("resources/coupons"))) ;
	}
	
	private function load_data($view)
	{
		$data = array() ;
		$data["product_groups"] = $this->model1->get_all_orderby("product_groups", "sort_order", "ASC") ;
		$data["sliders"] = $this->model1->get_all_orderby("sliders", "sort_order", "ASC") ;
		$data["main_class"] = "wrap" ;
		$data["title"] = "Innovite Health Products - Resources" ;
		$data["google_code"] = $this->model1->get_one(array("id" => 1), "settings") ;
		$data["view"] = $view ;
		
		return $data ;
	}
	
	private function make_array()
	{
	  	$headings = array("Abdominal Pain", "Anxiety or tearfulness", "Bad breath", "Burning/tearing of eyes", "Chronic sore throat", "Confusion", "Cough or recurrent bronchitis", "Cravings for alcohol", "Cravings for bread", "Cravings for sweets", "Diarrhea", "Difficulty with decision making", "endometriosis or infertility", "Fatigue", "Frequent colds and flues", "Frequent indigestion", "Headaches", "Heartburn", "Hives", "Impotence", "Inability to concentrate", "Insomnia", "Itchy ears/nose", "Jitteriness/irritability", "Loss of balance", "Low libido", "Menstrual irregularities", "Mood swings", "Mucus in stools", "Multiple food sensitivities", "Muscle aches", "Muscle weakness", "Nasal/sinus congestion", "Numbness, burning pain or tightness in chest", "PMS", "Poor coordination", "Poor memory", "Poor sense of direction", "Post nasal drip", "Prostatitis", "Rashes or psoriasis", "Rectal itching", "Recurrent ear infections", "Sensitivity to foods leavened with yeast", "Sensitivity to mould", "Sensitivity to perfume, paints chemicals", "Sensitivity to tobacco smoke", "Shaking or irritable", "Spacey feeling", "Strong body odour", "Swollen or painful joints", "Thrush in mouth", "Vaginal infections", "White coating on tongue") ;
		
		$validation_array = array() ;
		
		$main_counter = 1 ;
		
		foreach($headings as $rec) :
			$validation_array["q".$main_counter] = $rec."&required" ;  
			$main_counter = $main_counter + 1 ;
      	endforeach ;
		//print_r($validation_array) ; exit ;
		return $validation_array ;
	}
}