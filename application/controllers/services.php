<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Services extends CI_Controller 
{
	public function __construct()
	{
      	parent::__construct();
		$this->load->model('Login_model');
		$this->load->model('Contact_model');
		$this->load->model('About_model');
		$this->load->model('Services_model');
		
	}

	public function index()
	{      
		$data['about']=$this->About_model->getabout(); 	
		$data['result']=$this->Contact_model->getsitedetail(); 
		$data['services']=$this->Services_model->getcarbrandlist();	
		//print_r($data['services']);die;
		$this->load->view('services/services',$data);			
	}

	
}
