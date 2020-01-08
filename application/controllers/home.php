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
		if(isset($_GET['StartCity']) && isset($_GET['EndCity']))
		{	$data=array();
			$data['StartCity']=$_GET['StartCity'];
			$data['EndCity']=$_GET['EndCity'];
			$data['testimonial']=$this->Login_model->gettestimoniallist();
			$data['about']=$this->About_model->getabout(); 	
			$data['result']=$this->Contact_model->getsitedetail(); 
			$data['services']=$this->Login_model->getcarbrandlist();	 	
			$data['cityData']=$this->Login_model->list_city();
			$data['endcityData']=$this->Login_model->end_city();
			//$data['endcityData']=$this->Login_model->ajax_end_city();
			$data['localcityData']=$this->Login_model->local_city();
		}
		else
		{	
			$data['testimonial']=$this->Login_model->gettestimoniallist();
			$data['about']=$this->About_model->getabout(); 	
			$data['result']=$this->Contact_model->getsitedetail(); 
			$data['services']=$this->Login_model->getcarbrandlist();	 	
			$data['cityData']=$this->Login_model->list_city();
			$data['endcityData']=$this->Login_model->end_city();
			//$data['endcityData']=$this->Login_model->ajax_end_city();
			$data['localcityData']=$this->Login_model->local_city();
		}
		
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
    	if(!check_user_authentication()){ 
			redirect(base_url());
		}
    	$data['ContactNumber']=$this->input->post('ContactNumber');
		$data['OTPNumber']=$this->input->post('OTPNumber');

		$data['TestimonialId']=$this->input->post('TestimonialId');
		$data['TestimonialDescription']=$this->input->post('TestimonialDescription');
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
    	$data['TestimonialId']=$this->input->post('TestimonialId');
    	$data['TestimonialDescription']=$this->input->post('TestimonialDescription');
    	if($_POST)
		{
			if($this->input->post('TestimonialId')!='' && $this->input->post('ContactNumber')!='')
			{
				$this->Login_model->testimonial_update();
				$this->session->set_flashdata('success', 'Your feedback has been updated Succesfully!');
				redirect('home/userprofile');
			}
			else
			{
				$this->Login_model->testimonial_add();
				$this->session->set_flashdata('success', 'Your feedback has been submitted Succesfully!');
				redirect('home/userprofile');
			}

		}
      	
    }


    function ajaxuserdata()
	{	
		$UserId=$this->input->post('UserId');
		$result=$this->Login_model->getajaxdata($UserId);
		echo json_encode($result);
		//die;
	}


	// function getdistance()
	// {

	//     $address = urlencode('Ahmadabad');
	//     $url = "http://maps.google.com/maps/api/geocode/json?address=$address&sensor=false&region=Anand";
	//     $ch = curl_init();
	//     curl_setopt($ch, CURLOPT_URL, $url);
	//     curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	//     curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
	//     curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	//     curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	//     $response = curl_exec($ch);
	//     curl_close($ch);
	//     $response_a = json_decode($response);
	//     $status = $response_a->status;

	//     if ( $status == 'ZERO_RESULTS' )
	//     {
	//         return FALSE;
	//     }
	//     else
	//     {
	//         $return = array('lat' => $response_a->results[0]->geometry->location->lat, 'long' => $long = $response_a->results[0]->geometry->location->lng);
	//         print_r($return);die;
	//         return $return;
	//     }

	// }


	// function getDistance()
	// {
	// 	// $addressFrom, $addressTo, $unit = ''
	// 	$addressFrom="Ahmadabad";
	// 	$addressTo="Anand";
	// 	$unit ='';
	//     // Google API key
	//     $apiKey = 'AIzaSyDAo78y6rMKrFS_7nyi_Fg69YCCDpmF6Ho';
	    
	//     // Change address format
	//     $formattedAddrFrom    = str_replace(' ', '+', $addressFrom);
	//     $formattedAddrTo     = str_replace(' ', '+', $addressTo);
	    
	//     // Geocoding API request with start address
	//     echo $geocodeFrom = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.$formattedAddrFrom.'&sensor=false&key='.$apiKey);
	//     die;
	//     $outputFrom = json_decode($geocodeFrom);
	//     if(!empty($outputFrom->error_message)){
	//         return $outputFrom->error_message;
	//     }
	    
	//     // Geocoding API request with end address
	//     $geocodeTo = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.$formattedAddrTo.'&sensor=false&key='.$apiKey);
	//     $outputTo = json_decode($geocodeTo);
	//     if(!empty($outputTo->error_message)){
	//         return $outputTo->error_message;
	//     }
	    
	//     // Get latitude and longitude from the geodata
	//     $latitudeFrom    = $outputFrom->results[0]->geometry->location->lat;
	//     $longitudeFrom    = $outputFrom->results[0]->geometry->location->lng;
	//     $latitudeTo        = $outputTo->results[0]->geometry->location->lat;
	//     $longitudeTo    = $outputTo->results[0]->geometry->location->lng;
	    
	//     // Calculate distance between latitude and longitude
	//     $theta    = $longitudeFrom - $longitudeTo;
	//     $dist    = sin(deg2rad($latitudeFrom)) * sin(deg2rad($latitudeTo)) +  cos(deg2rad($latitudeFrom)) * cos(deg2rad($latitudeTo)) * cos(deg2rad($theta));
	//     $dist    = acos($dist);
	//     $dist    = rad2deg($dist);
	//     $miles    = $dist * 60 * 1.1515;
	    
	//     // Convert unit and return distance
	//     $unit = strtoupper($unit);
	//     if($unit == "K"){
	//         return round($miles * 1.609344, 2).' km';
	//     }elseif($unit == "M"){
	//         echo round($miles * 1609.344, 2).' meters';
	//         die;
	//     }else{
	//         echo  round($miles, 2).' miles';
	//         die;
	//     }
	// }
	
	
}
