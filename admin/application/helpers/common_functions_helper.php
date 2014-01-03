<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('send_email_message'))
{
	function send_email_message($title, $to, $cc, $bcc, $subject, $message, $attachment)
	{
		$CI_1 =& get_instance() ;
		$CI_1->load->model('model1') ;
		
		$email_cond["id"] = 1 ;
		$email_rec = $CI_1->model1->get_one($email_cond, "email_configurations") ;
		
		$config = array() ;
		
		if($email_rec->protocol != "") $config['protocol'] = $email_rec->protocol ;
		if($email_rec->smtp_host != "") $config['smtp_host'] = $email_rec->smtp_host ;
		if($email_rec->smtp_port != "") $config['smtp_port'] = intval($email_rec->smtp_port) ;
		if($email_rec->smtp_user != "") $config['smtp_user'] = $email_rec->smtp_user ;
		
		if($email_rec->smtp_password != "") $config['smtp_pass'] = $email_rec->smtp_password ;
		if($email_rec->mailtype != "") $config['mailtype'] = $email_rec->mailtype ;
		
		$CI_2 =& get_instance() ;

		$CI_2->load->library('email', $config);
		$CI_2->email->set_newline("\r\n") ;
		
		$CI_2->email->from($config['smtp_user'], $title) ;
		$CI_2->email->to($to) ;
		
		if($cc) $CI_2->email->cc($cc) ;
		if($bcc) $CI_2->email->bcc($bcc) ;
		if($attachment) $CI_2->email->attach("./email_attachments/".$attachment) ;
		
		$CI_2->email->subject($subject) ;
		$CI_2->email->message($message) ;
		
		if($CI_2->email->send()) return true ;
		else return false ;
	}
}

if ( ! function_exists('get_random_string'))
{
	function get_random_string($length = 10)
	{
		$CI =& get_instance() ;
		$CI->load->helper('string') ;
		
		//$this->load->helper('string') ;
		return random_string('alnum', $length) ;
	}
}
if ( ! function_exists('form_validation_function'))
{
	function form_validation_function($form_elements)
	{
		$CI =& get_instance() ;
		$CI->load->library("form_validation") ;
		
		$CI->form_validation->set_error_delimiters("<li>", "</li>") ;
		
		foreach($form_elements as $rec => $val):
			$res = explode("&", $val);
			$CI->form_validation->set_rules($rec, $res[0], $res[1]) ;
		endforeach ;
		if ($CI->form_validation->run() == FALSE)
			return FALSE ;
		else
			return TRUE ;
	}
}

if ( ! function_exists('post_data'))
{
	function post_data($data) 
	{
		$CI =& get_instance() ;
		$CI->load->library("input") ;
		
		$post_data = array() ;
  		if($data)
		{
			foreach($data as $attri => $value):
				$post_data[$attri] = addslashes($CI->input->post($value)) ;
			endforeach ;
		}
		return $post_data ;
	}
}