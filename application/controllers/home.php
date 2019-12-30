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

	

	public function index()
	{    	
	
		$data['testimonial']=$this->Login_model->gettestimoniallist();
		$data['about']=$this->About_model->getabout(); 	
		$data['result']=$this->Contact_model->getsitedetail(); 
		$data['services']=$this->Login_model->getcarbrandlist();	 	
		$data['cityData']=$this->Login_model->list_city();
		$this->load->view('home/index',$data);			
	}

	public function getcartype()
	{
		$data=array();
		$result=$this->Login_model->get_cartype($this->input->post('carid'));	
		//print_r($result);die;
		$data['CarId']=$result['CarId'];
		$data['CarName']=$result['CarName'];	
		$data['CarRate']=$result['CarRate'];
		$data['StateTax']=$result['StateTax'];
		echo json_encode($data);
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
		$data['OTPNumber']=$this->input->post('OTPNumber');

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
			$code=rand(12,1234567);
			$OTPNumber=$this->input->post($code);
			
		}

		$data['about']=$this->About_model->getabout(); 	  
		$data['result']=$this->Contact_model->getsitedetail();   	
		$this->load->view('common/login',$data);			
	}
	
	public function process()
	{  
		$data['StartPointCity']=$this->input->post('StartPointCity');
		$data['EndPointCity']=$this->input->post('EndPointCity');
		$data['PickupDate']=$this->input->post('PickupDate');
		$data['DropofDate']=$this->input->post('DropofDate');
		$data['PickupTime']=$this->input->post('PickupTime');
		$data['CarBrandId']=$this->input->post('CarBrandId');
		$data['BrandName']=$this->input->post('BrandName');
		$data['ContactNumber']=$this->input->post('ContactNumber');
		$data['OTPNumber']=$this->input->post('OTPNumber');
		if($_POST)
		{
			//print_r($_POST);die;
			// $StartPointCity=$this->input->post('StartPointCity');
			// $EndPointCity=$this->input->post('EndPointCity');
			// $PickupDate=$this->input->post('PickupDate');
			// $PickupTime=$this->input->post('PickupTime');
			// $CarBrandId=$this->input->post('CarBrandId');
			// $BrandName=$this->input->post('BrandName');
			// $ContactNumber=$this->input->post('ContactNumber');
			// $DropofDate=$this->input->post('DropofDate');
			// $OTPNumber=$this->input->post('OTPNumber');

			$session= array(
				'StartPointCity'=> $data['StartPointCity'],
				'EndPointCity'=> $data['EndPointCity'],
				'PickupDate'=> $data['PickupDate'],
				'DropofDate'=> $data['DropofDate'],
				'PickupTime'=> $data['PickupTime'],
				'CarBrandId'=> $data['CarBrandId'],
				'BrandName'=>$data['BrandName'],
				'ContactNumber'=> $data['ContactNumber'],
				'OTPNumber'=>$data['OTPNumber'],		
			 );

			//print_r($session);die;
			$this->Login_model->login();
			$this->session->set_userdata($session);
			$this->session->set_flashdata('success', 'You have to send OTP on your contact number,Please submit!');
			redirect('home/process');	
		}  
		$data['about']=$this->About_model->getabout(); 	  
		$data['result']=$this->Contact_model->getsitedetail();  	
		$this->load->view('common/login-process',$data);			
	}


	public function booking()
	{  
		$data=array();
		$data['StartPointCity']=$this->input->post('StartPointCity');
		$data['EndPointCity']=$this->input->post('EndPointCity');
		$data['PickupDate']=$this->input->post('PickupDate');
		$data['PickupTime']=$this->input->post('PickupTime');
		$data['CarBrandId']=$this->input->post('CarBrandId');
		$CarBrandId=$this->input->post('CarBrandId');
		$data['BrandName']=$this->input->post('BrandName');
		$data['ContactNumber']=$this->input->post('ContactNumber');
		$data['OTPNumber']=$this->input->post('OTPNumber');
		$data['DropofDate']=$this->input->post('DropofDate');
		$data['CarRate']=$this->input->post('CarRate');
		$data['TaxAmount']=$this->input->post('TaxAmount');
		$data['Tax']=$this->input->post('Tax');
		$result=$this->Login_model->getuser($this->input->post('ContactNumber'));
		$AlreadyOTPNumber=$result['OTPNumber'];
		//print_r($result);die;
		if($this->input->post('OTPNumber')==$AlreadyOTPNumber)
		{
					//print_r($_POST);die;
					// $StartPointCity=$this->input->post('StartPointCity');
					// $EndPointCity=$this->input->post('EndPointCity');
					// $PickupDate=$this->input->post('PickupDate');
					// $PickupTime=$this->input->post('PickupTime');
					// $CarBrandId=$this->input->post('CarBrandId');
					// $BrandName=$this->input->post('BrandName');
					// $ContactNumber=$this->input->post('ContactNumber');
					// $OTPNumber=$this->input->post('OTPNumber');
					// $DropofDate=$this->input->post('DropofDate');


					$session= array(
						'StartPointCity'=> $data['StartPointCity'],
						'EndPointCity'=> $data['EndPointCity'],
						'PickupDate'=> $data['PickupDate'],
						'DropofDate'=> $data['DropofDate'],
						'PickupTime'=> $data['PickupTime'],
						'CarBrandId'=> $data['CarBrandId'],
						'BrandName'=>$data['BrandName'],
						'ContactNumber'=> $data['ContactNumber'],
						'OTPNumber'=>$data['OTPNumber'],		
					);
					//print_r($session);die;
					$this->session->set_userdata($session);		 
		}
		else if($this->input->post('OTPNumber')!=$AlreadyOTPNumber)
		{
			$this->session->set_flashdata('wrong', 'You are submitted wrong OTP!');
			redirect('home/process');
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

	public function book()
	{
		if($_POST)
		{
			if($this->input->post('ContactNumber')!='')
			{
				$this->Login_model->user_book_car();
				$this->session->set_flashdata('success', 'Record has been Inserted Succesfully!');
				redirect('home/booking');
			}	
		}
	}
	
}
