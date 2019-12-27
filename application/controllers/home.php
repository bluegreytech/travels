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
		$data['StartPointCity']=$this->input->post('StartPointCity');
		$data['EndPointCity']=$this->input->post('EndPointCity');
		$data['PickupDate']=$this->input->post('PickupDate');
		$data['PickupTime']=$this->input->post('PickupTime');
		$data['CarBrandId']=$this->input->post('CarBrandId');
		$data['BrandName']=$this->input->post('BrandName');
		$data['DropofDate']=$this->input->post('DropofDate');
		if($_POST)
		{
			//print_r($_POST);die;
			$StartPointCity=$this->input->post('StartPointCity');
			$EndPointCity=$this->input->post('EndPointCity');
			$PickupDate=$this->input->post('PickupDate');
			$PickupTime=$this->input->post('PickupTime');
			$CarBrandId=$this->input->post('CarBrandId');
			$BrandName=$this->input->post('BrandName');
			$DropofDate=$this->input->post('DropofDate');

		}

		$data['about']=$this->About_model->getabout(); 	  
		$data['result']=$this->Contact_model->getsitedetail();   	
		$this->load->view('common/login',$data);			
	}

	public function index()
	{    	
	
		$data['testimonial']=$this->Login_model->gettestimoniallist();
		$data['about']=$this->About_model->getabout(); 	
		$data['result']=$this->Contact_model->getsitedetail(); 
		$data['services']=$this->Login_model->getcarbrandlist();	 	
		$data['cityData']=$this->Login_model->list_city();
		$this->load->view('home/index',$data);			
	}



	public function booking()
	{  
		$data['StartPointCity']=$this->input->post('StartPointCity');
		$data['EndPointCity']=$this->input->post('EndPointCity');
		$data['PickupDate']=$this->input->post('PickupDate');
		$data['PickupTime']=$this->input->post('PickupTime');
		$data['CarBrandId']=$this->input->post('CarBrandId');
		$data['BrandName']=$this->input->post('BrandName');
		$data['ContactNumber']=$this->input->post('ContactNumber');
		$data['OTPNumber']=$this->input->post('OTPNumber');
		$data['DropofDate']=$this->input->post('DropofDate');
		if($_POST)
		{
			//print_r($_POST);die;
			$StartPointCity=$this->input->post('StartPointCity');
			$EndPointCity=$this->input->post('EndPointCity');
			$PickupDate=$this->input->post('PickupDate');
			$PickupTime=$this->input->post('PickupTime');
			$CarBrandId=$this->input->post('CarBrandId');
			$BrandName=$this->input->post('BrandName');
			$ContactNumber=$this->input->post('ContactNumber');
			$OTPNumber=$this->input->post('OTPNumber');
			$DropofDate=$this->input->post('DropofDate');

		}  
		if($data['CarBrandId']=$this->input->post('CarBrandId')=='')
		{
			$data['subcar']=$this->Login_model->getsubcarall();
		}
		else
		{
			$data['subcar']=$this->Login_model->getsubcar($CarBrandId);
		}
	
		$data['about']=$this->About_model->getabout(); 	
		$data['result']=$this->Contact_model->getsitedetail();     	
		$this->load->view('booking/booking',$data);			
	}
	
	public function process()
	{  
		$data['StartPointCity']=$this->input->post('StartPointCity');
		$data['EndPointCity']=$this->input->post('EndPointCity');
		$data['PickupDate']=$this->input->post('PickupDate');
		$data['PickupTime']=$this->input->post('PickupTime');
		$data['CarBrandId']=$this->input->post('CarBrandId');
		$data['BrandName']=$this->input->post('BrandName');
		$data['ContactNumber']=$this->input->post('ContactNumber');
		$data['OTPNumber']=$this->input->post('OTPNumber');
		$data['DropofDate']=$this->input->post('DropofDate');
		if($_POST)
		{
			//print_r($_POST);die;
			$StartPointCity=$this->input->post('StartPointCity');
			$EndPointCity=$this->input->post('EndPointCity');
			$PickupDate=$this->input->post('PickupDate');
			$PickupTime=$this->input->post('PickupTime');
			$CarBrandId=$this->input->post('CarBrandId');
			$BrandName=$this->input->post('BrandName');
			$ContactNumber=$this->input->post('ContactNumber');
			$DropofDate=$this->input->post('DropofDate');
			$code=rand(12,1234567);
			$OTPNumber=$this->input->post($code);
			
		}  

		$data['about']=$this->About_model->getabout(); 	  
		$data['result']=$this->Contact_model->getsitedetail();  	
		$this->load->view('common/login-process',$data);			
	}
	
}
