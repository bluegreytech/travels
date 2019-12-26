<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class home extends CI_Controller 
{
	public function __construct()
	{
      	parent::__construct();
		$this->load->model('Login_model');
		$this->load->model('Contact_model');
		$this->load->model('About_model');
	}

	public function login()
	{   
		$data['about']=$this->About_model->getabout(); 	  
		$data['result']=$this->Contact_model->getsitedetail();   	
		$this->load->view('common/login',$data);			
	}

	public function index()
	{    
		$data['about']=$this->About_model->getabout(); 	
		$data['result']=$this->Contact_model->getsitedetail();  	
		$this->load->view('home/index',$data);			
	}

	public function booking()
	{      	
		$this->load->view('booking/booking');			
	}
	
	// public function loginprocess()
	// {      	
	// 	$this->load->view('common/login-process');			
	// }
	
}
