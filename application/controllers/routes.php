<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class routes extends CI_Controller 
{
	public function __construct()
	{
      	parent::__construct();
		$this->load->model('Login_model');
		$this->load->model('Contact_model');
		$this->load->model('About_model');
		$this->load->model('Routes_model');
	}

	public function index()
	{   
		$data['brandcar']=$this->Routes_model->getcarbrandlist();
		$data['about']=$this->About_model->getabout(); 	
		$data['result']=$this->Contact_model->getsitedetail(); 
		//print_r($data['brandcar']);die;	   	
		$this->load->view('routes/routes',$data);			
	}

	
}
