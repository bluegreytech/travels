<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Career extends CI_Controller 
{
	public function __construct()
	{
      	parent::__construct();
		$this->load->model('Contact_model');
		$this->load->model('About_model');	
	}

	public function index()
	{   	
		$data['about']=$this->About_model->getabout(); 	
		$data['result']=$this->Contact_model->getsitedetail(); 
		//echo $data['services'][0]->CarBrandId;die;
		//echo "<pre>";print_r($data['services']);die;
		$this->load->view('career/career',$data);			
	}

}
