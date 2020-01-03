<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends CI_Controller 
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

		//$data['endcityData']=$this->Login_model->end_city();
		//$data['endcityData']=$this->Login_model->ajax_end_city();
		$data['localcityData']=$this->Login_model->local_city();
		//print_r($data['endcityData']);die;
		$this->load->view('home/index',$data);			
	}


	public function getendcity()
	{
		$data=array();
		$endcityData=$this->Login_model->ajax_end_city($this->input->post('StartCity'));	
		//print_r($result);die;
		echo json_encode($endcityData);
	}


	public function login()
	{   
		$data['StartCity']=$this->input->post('StartCity');
		$data['EndCity']=$this->input->post('EndCity');
		$data['PickupDate']=$this->input->post('PickupDate');
		$data['PickupTime']=$this->input->post('PickupTime');
		$data['DropofDate']=$this->input->post('DropofDate');
		$data['DropofTime']=$this->input->post('DropofTime');
		$data['CarBrandId']=$this->input->post('CarBrandId');
		$data['BrandName']=$this->input->post('BrandName');
		//$data['OTPNumber']=$this->input->post('OTPNumber');

		if($_POST)
		{
			//print_r($_POST);die;
			$session= array(
				'StartCity'=> $data['StartCity'],
				'EndCity'=> $data['EndCity'],
				'PickupDate'=> $data['PickupDate'],
				'DropofDate'=> $data['DropofDate'],
				'PickupTime'=> $data['PickupTime'],
				'DropofTime'=> $data['DropofTime'],
				'CarBrandId'=> $data['CarBrandId'],
				'BrandName'=>$data['BrandName'],
			 );
			$this->session->set_userdata($session);	
		}
		
		$data['about']=$this->About_model->getabout(); 	  
		$data['result']=$this->Contact_model->getsitedetail();   	
		$this->load->view('common/login',$data);			
	}
	
	public function process()
	{  
		$data['StartCity']=$this->input->post('StartCity');
		$data['EndCity']=$this->input->post('EndCity');
		$data['PickupDate']=$this->input->post('PickupDate');
		$data['DropofDate']=$this->input->post('DropofDate');
		$data['PickupTime']=$this->input->post('PickupTime');
		$data['DropofTime']=$this->input->post('DropofTime');
		$data['CarBrandId']=$this->input->post('CarBrandId');
		$data['BrandName']=$this->input->post('BrandName');
		$data['ContactNumber']=$this->input->post('ContactNumber');
		$data['OTPNumber']=$this->input->post('OTPNumber');
		if($_POST)
		{
			//print_r($_POST);die;
			$session= array(
				'StartCity'=> $data['StartCity'],
				'EndCity'=> $data['EndCity'],
				'PickupDate'=> $data['PickupDate'],
				'DropofDate'=> $data['DropofDate'],
				'PickupTime'=> $data['PickupTime'],
				'DropofTime'=> $data['DropofTime'],
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
		$data['StartCity']=$this->input->post('StartCity');
		$data['EndCity']=$this->input->post('EndCity');
		$data['PickupDate']=$this->input->post('PickupDate');
		$data['PickupTime']=$this->input->post('PickupTime');
		$data['DropofTime']=$this->input->post('DropofTime');
		$data['CarBrandId']=$this->input->post('CarBrandId');
		$CarBrandId=$this->input->post('CarBrandId');
		$data['BrandName']=$this->input->post('BrandName');
		$data['ContactNumber']=$this->input->post('ContactNumber');
		$data['OTPNumber']=$this->input->post('OTPNumber');
		$data['DropofDate']=$this->input->post('DropofDate');
		$data['PerKmRate']=$this->input->post('PerKmRate');
		$data['TaxAmount']=$this->input->post('TaxAmount');
		$data['Tax']=$this->input->post('Tax');
		$data['razorpay_payment_id']=$this->input->post('razorpay_payment_id');
		
		$result=$this->Login_model->getuser($this->input->post('ContactNumber'));
		$AlreadyOTPNumber=$result['OTPNumber'];
		if($this->input->post('OTPNumber')==$AlreadyOTPNumber)
		{
					//print_r($_POST);die;
					$session= array(
						'StartCity'=> $data['StartCity'],
						'EndCity'=> $data['EndCity'],
						'PickupDate'=> $data['PickupDate'],
						'DropofDate'=> $data['DropofDate'],
						'PickupTime'=> $data['PickupTime'],
						'DropofTime'=> $data['DropofTime'],
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
		
		
		$data['brandcar']=$this->Login_model->get_brandcartype($CarBrandId);
		//print_r($data['brandcar']);die;
		$data['about']=$this->About_model->getabout(); 	
		$data['result']=$this->Contact_model->getsitedetail();     	
		$this->load->view('booking/booking',$data);	
	}

	
	public function razorPaySuccess()
  	{ 
  		if($_POST)
		{
			if($this->input->post('ContactNumber')!='')
			{
				$result=$this->Login_model->user_bookcar_online();
				echo json_encode($result);
     		}	
		}
    }

    public function ThankYou()
    {
      	$this->load->view('booking/razorthankyou');
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
