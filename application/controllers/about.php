<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class about extends CI_Controller 
{
	public function __construct()
	{
      	parent::__construct();
      	$this->load->model('About_model');
		$this->load->model('Login_model');
		$this->load->model('Contact_model');
	}

	public function index()
	{    
		$data['about']=$this->About_model->getabout(); 	
		$data['result']=$this->Contact_model->getsitedetail(); 	
		$this->load->view('about/about-us',$data);			
	}

	
}
