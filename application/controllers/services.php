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
		$data['StartPointCity']=$this->input->post('StartPointCity');
		$data['EndPointCity']=$this->input->post('EndPointCity');
		$data['PickupDate']=$this->input->post('PickupDate');
		$data['PickupTime']=$this->input->post('PickupTime');
		$data['DropofDate']=$this->input->post('DropofDate');
		$data['PickupTime']=$this->input->post('PickupTime');
		if($_POST)
		{	
			//print_r($_POST);die;
			$StartPointCity=$this->input->post('StartPointCity');
		  	$EndPointCity=$this->input->post('EndPointCity');
		  	$PickupDate=$this->input->post('PickupDate');
		  	$PickupTime=$this->input->post('PickupTime');
		  	$DropofDate=$this->input->post('DropofDate');
		  	$PickupTime=$this->input->post('PickupTime');
		}

		$data['about']=$this->About_model->getabout(); 	
		$data['result']=$this->Contact_model->getsitedetail(); 
		$data['services']=$this->Services_model->getcarbrandlist();	
		//echo $data['services'][0]->CarBrandId;die;
		//echo "<pre>";print_r($data['services']);die;
		$this->load->view('services/services',$data);			
	}

	
}
