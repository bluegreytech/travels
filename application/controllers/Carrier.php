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
				if($this->input->post("CarrierInquiryId")!="")
				{
					$this->Carrier_model->carrer_update();
					$this->session->set_flashdata('success', 'Record has been Updated Succesfully!');
					redirect('carrier');
					
				}
				else
				{ 
					$this->Carrier_model->carrer_insert();
					$this->session->set_flashdata('success', 'Your data has been inserted Succesfully!');
					redirect('carrier');
				
				}
		}	
		
	}

}
