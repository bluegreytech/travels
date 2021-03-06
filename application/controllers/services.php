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
		$data['StartCity']=$this->input->post('StartCity');
		$data['EndCity']=$this->input->post('EndCity');
		$data['PickupDate']=$this->input->post('PickupDate');
		$data['PickupTime']=$this->input->post('PickupTime');
		$data['DropofDate']=$this->input->post('DropofDate');
		$data['PickupTime']=$this->input->post('PickupTime');
		$data['PickupTime']=$this->input->post('PickupTime');
		$data['DropofTime']=$this->input->post('DropofTime');
		$data['PerHoureFare']=$this->input->post('PerHoureFare');

		$data['LocalTripId']=$this->input->post('LocalTripId');
	
	
		if($_POST)
		{	
			$PickupTime=$this->input->post('PickupTime');

			$session= array(
				'StartCity'=> $data['StartCity'],
				'EndCity'=> $data['EndCity'],
				'PickupDate'=> $data['PickupDate'],
				'DropofDate'=> $data['DropofDate'],
				'PickupTime'=> $data['PickupTime'],
				'DropofTime'=> $data['DropofTime'],
				'LocalTripId'=> $data['LocalTripId'],
			 );
			$this->session->set_userdata($session);
			$data['services']=$this->Services_model->search();
			//print_r($data['services']);die;
			if($data['services'])
			{
				//echo $services[0]->BrandName;die;
			}
			else
			{
				//echo "byeee";die;
			}
			
		}
		$data['services']=$this->Services_model->getcarbrandlist();	
		$data['about']=$this->About_model->getabout(); 	
		$data['result']=$this->Contact_model->getsitedetail(); 
		//echo $data['services'][0]->CarBrandId;die;
		//echo "<pre>";print_r($data['services']);die;
		$this->load->view('services/services',$data);			
	}


	public function search()
	{   
		$data['StartCity']=$this->input->post('StartCity');
		$data['EndCity']=$this->input->post('EndCity');
		$data['PickupDate']=$this->input->post('PickupDate');
		$data['PickupTime']=$this->input->post('PickupTime');
		$data['DropofDate']=$this->input->post('DropofDate');
		$data['PickupTime']=$this->input->post('PickupTime');
		$data['DropofTime']=$this->input->post('DropofTime');
		$data['PerHoureFare']=$this->input->post('PerHoureFare');
		
		$data['LocalTripId']=$this->input->post('LocalTripId');
		if($_POST)
		{	

			$session= array(
				'StartCity'=> $data['StartCity'],
				'EndCity'=> $data['EndCity'],
				'PickupDate'=> $data['PickupDate'],
				'DropofDate'=> $data['DropofDate'],
				'PickupTime'=> $data['PickupTime'],
				'DropofTime'=> $data['DropofTime'],
				'LocalTripId'=> $data['LocalTripId'],
			 );
			$this->session->set_userdata($session);
			if($this->input->post('LocalTripId')!='')
			{
				$data['services']=$this->Services_model->search_local();
				//echo "<pre>";print_r($data['services']);die;
			}
			else
			{
				$data['services']=$this->Services_model->search();
			}
			
			
			
		}
		$data['about']=$this->About_model->getabout(); 	
		$data['result']=$this->Contact_model->getsitedetail(); 
		$this->load->view('services/services',$data);			
	}


	public function addquotes()
	{   	
		if($_POST)
		{
			$result=$this->Services_model->add_luxuryquotes();
			if($result==1)
			{
				$this->session->set_flashdata('success', 'Your inquiry has been submitted Successfully!');
				redirect('home');	
			}
			else if($result==2)
			{
				$this->session->set_flashdata('warning', 'Your inquiry has been submitted Successfully but Email function was not work!');
				redirect('home');	
			}
			
		}		
	}

	
}
