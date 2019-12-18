<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class contact extends CI_Controller 
{
	public function __construct()
	{
      	parent::__construct();
		$this->load->model('Contact_model');
	}

	public function index()
	{      
		if($_POST)
		{			
			$this->Contact_model->inquiry_insert();
			$this->session->set_flashdata('success', 'Your message has been send Succesfully!');
			redirect('contact');		
		}
		$data['result']=$this->Contact_model->getsitedetail();
		//print_r($data['result']);die;		
		$this->load->view('contact/contact-us',$data);			
	}



	
}
