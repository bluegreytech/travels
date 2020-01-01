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
		
		//$data['CarBrandId']=$this->input->post('CarBrandId');
		//$data['BrandName']=$this->input->post('BrandName');
		if($_POST)
		{	
			//print_r($_POST);die;
			// $StartCity=$this->input->post('StartCity');
			//  	$EndCity=$this->input->post('EndCity');
			//  	$PickupDate=$this->input->post('PickupDate');
			//  	$PickupTime=$this->input->post('PickupTime');
			//  	$DropofDate=$this->input->post('DropofDate');
			//  	$PickupTime=$this->input->post('PickupTime');

			$session= array(
				'StartCity'=> $data['StartCity'],
				'EndCity'=> $data['EndCity'],
				'PickupDate'=> $data['PickupDate'],
				'DropofDate'=> $data['DropofDate'],
				'PickupTime'=> $data['PickupTime'],
				'DropofTime'=> $data['DropofTime'],
				//'CarBrandId'=> $data['CarBrandId'],
				//'BrandName'=> $data['BrandName'],
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
		//$data['CarBrandId']=$this->input->post('CarBrandId');
		//$data['BrandName']=$this->input->post('BrandName');
		if($_POST)
		{	

			$session= array(
				'StartCity'=> $data['StartCity'],
				'EndCity'=> $data['EndCity'],
				'PickupDate'=> $data['PickupDate'],
				'DropofDate'=> $data['DropofDate'],
				'PickupTime'=> $data['PickupTime'],
				'DropofTime'=> $data['DropofTime'],
				//'CarBrandId'=> $data['CarBrandId'],
				//'BrandName'=> $data['BrandName'],
			 );
			$this->session->set_userdata($session);
			if($this->input->post('DropofTime')!='')
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

	
}
