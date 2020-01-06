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

		$data['endcityData']=$this->Login_model->end_city();
		//$data['endcityData']=$this->Login_model->ajax_end_city();
		$data['localcityData']=$this->Login_model->local_city();
		//print_r($data['endcityData']);die;
		$this->load->view('home/index',$data);			
	}


	public function getendcity()
	{
		$data=array();
		$endcityData=$this->Login_model->ajax_end_city($this->input->post('StartCity'));	
		//print_r($endcityData);die;
		echo json_encode($endcityData);
	}

	public function getendcityround()
	{
		$data=array();
		$endcityData=$this->Login_model->ajax_end_cityround($this->input->post('StartCity'));	
		//echo "<pre>";print_r($endcityData);die;
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

   

    public function userlogin()
	{
		$data['about']=$this->About_model->getabout(); 	
		$data['result']=$this->Contact_model->getsitedetail();
		$this->load->view('common/userlogin',$data);
	}

	public function loginprocess()
	{
		$data['ContactNumber']=$this->input->post('ContactNumber');
		$ContactNumber=$data['ContactNumber']=$this->input->post('ContactNumber');
		$data['OTPNumber']=$this->input->post('OTPNumber');
		if($_POST)
		{
			if($this->input->post('ContactNumber')!='')
			{
				$session= array(
						'ContactNumber'=> $data['ContactNumber'],	
					);
				//print_r($session);die;
				$this->session->set_userdata($session);	
				$login =$this->Login_model->check_number();
				if($login == '1')
				{
		         	$this->session->set_flashdata('success', 'You have to send OTP on your contact number,Please submit!');
				}
				elseif($login == '2')
				{        
		          	$this->session->set_flashdata('wrong','Your mobile number not registered');
					redirect('home/userlogin');
				}
			}	
		}  

		$data['about']=$this->About_model->getabout(); 	
		$data['result']=$this->Contact_model->getsitedetail();
		$this->load->view('common/logincomplete',$data);
	}

	public function userprofile()
    {
    	$data['ContactNumber']=$this->input->post('ContactNumber');
		$data['OTPNumber']=$this->input->post('OTPNumber');

		$data['FeedbackId']=$this->input->post('FeedbackId');
		$data['FeedbackDescription']=$this->input->post('FeedbackDescription');
    	if($_POST)
		{
			if($this->input->post('ContactNumber')!='')
			{
				$login =$this->Login_model->check_login();
				if($login == '1')
				{
					$ContactNumber = $this->input->post('ContactNumber');
					$where = array(
					"ContactNumber"=>$ContactNumber,
					);
					$log = $this->Login_model->login_where('tbluser',$where);
					if($log)
					{
						
							$session= array(
								'FirstName'=> $log->FirstName,
								'LastName'=> $log->LastName,
								'EmailAddress'=> $log->EmailAddress,
								'ContactNumber'=>$log->ContactNumber,		
							);
							//print_r($session);die;
							$this->session->set_userdata($session);
							$this->session->set_flashdata('success','You are Login successfully!');
						
						
					}

				
				}
				else if($login == '2')
				{        
		  			$this->session->set_flashdata('wrong','Your entered wrong OTP');
					redirect('home/loginprocess');
				}
				
			}

		}

		$ContactNumberid=$this->session->userdata('ContactNumber');
		$data['feedbackhistory']=$this->Login_model->get_feedback($ContactNumberid); 
		$data['cabhistory']=$this->Login_model->get_history($ContactNumberid); 
    	$data['about']=$this->About_model->getabout(); 	
		$data['result']=$this->Contact_model->getsitedetail();
		//print_r($data['feedbackhistory']);die;	
      	$this->load->view('common/user-profile',$data);
    }

    public function logout()
	{	
		$this->session->sess_destroy();
		redirect('home');
	}


	public function userfeedback()
    {
    	$data['ContactNumber']=$this->input->post('ContactNumber');
    	if($_POST)
		{
			if($this->input->post('FeedbackId')!='' && $this->input->post('ContactNumber')!='')
			{
				$this->Login_model->feedback_update();
				$this->session->set_flashdata('success', 'Your feedback has been updated Succesfully!');
				redirect('home/userprofile');
			}
			else
			{
				$this->Login_model->feedback_add();
				$this->session->set_flashdata('success', 'Your feedback has been submitted Succesfully!');
				redirect('home/userprofile');
			}

		}
      	
    }

	
}
