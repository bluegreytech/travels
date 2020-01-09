<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Carrier extends CI_Controller 
{
	public function __construct()
	{
      	parent::__construct();
		$this->load->model('Contact_model');
		$this->load->model('About_model');	
		$this->load->model('Carrier_model');	
	}

	public function index()
	{   	
		$data['about']=$this->About_model->getabout(); 	
		$data['result']=$this->Contact_model->getsitedetail(); 
		$data['carrier']=$this->Carrier_model->get_carrierlist(); 
		//echo "<pre>";print_r($data['carrier']);die;
		$this->load->view('career/career',$data);			
	}

	public function carreradd()
	{   	
		if($_POST)
		{	
			$result=$this->Carrier_model->carrer_insert();
			if($result==1)
			{
				$this->session->set_flashdata('success', 'Your inquiry has been submitted Successfully!');
				redirect('carrier');	
			}
			else if($result==2)
			{
				$this->session->set_flashdata('warning', 'Your inquiry has been submitted Successfully but Email function was not work!');
				redirect('carrier');	
			}		
		}	
		
	}

}
