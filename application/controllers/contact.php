<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class contact extends CI_Controller 
{
	public function __construct()
	{
      	parent::__construct();
		$this->load->model('Contact_model');
		$this->load->model('About_model');
	}

	public function index()
	{      
		if($_POST)
		{			
			$result=$this->Contact_model->inquiry_insert();
			if($result==1)
			{
				$this->session->set_flashdata('success', 'Your inquiry has been submitted Successfully!');
				redirect('contact');	
			}
			else if($result==2)
			{
				$this->session->set_flashdata('warning', 'Your inquiry has been submitted Successfully but Email function was not work!');
				redirect('contact');	
			}
				
		}
		$data['about']=$this->About_model->getabout(); 	
		$data['result']=$this->Contact_model->getsitedetail();
		//print_r($data['result']);die;		
		$this->load->view('contact/contact-us',$data);			
	}



	
}
