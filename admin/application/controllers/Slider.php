<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slider extends CI_Controller {

	public function __construct()
	{
      	parent::__construct();
		$this->load->model('Slider_model');
    }

	function sliderlist()
	{	
		if(!check_admin_authentication()){ 
			redirect(base_url());
		}else{	
			$data['activeTab']="sliderlist";		
			$data['result']=$this->Slider_model->getsliderlist();
			//echo "<pre>";print_r($data['result']);die;
			$this->load->view('slider/sliderlist',$data);
		}
	}
	
	public function slideradd()
	{      
		if(!check_admin_authentication()){ 
			redirect(base_url());
		}   
			
		$data=array();	
		$data['SliderId']=$this->input->post('SliderId');
		$data['SliderTitle']=$this->input->post('SliderTitle');
		$data['SliderImage']=$this->input->post('SliderImage');
		$data['IsActive']=$this->input->post('IsActive');
		if($_POST)
		{	
				if($this->input->post("SliderId")!="")
				{
					$this->Slider_model->slider_update();
					$this->session->set_flashdata('success', 'Record has been Updated Succesfully!');
					redirect('slider/sliderlist');
					
				}
				else
				{ 
					$this->Slider_model->slider_insert();
					$this->session->set_flashdata('success', 'Record has been Inserted Succesfully!');
					redirect('slider/sliderlist');
				
				}
		}	
			
		    $data['activeTab']="slideradd";	
			$this->load->view('slider/slideradd',$data);
				
	}
	
	function editslider($SliderId){
		if(!check_admin_authentication()){ 
			redirect(base_url());
		}
			$data=array();
			$result=$this->Slider_model->getdata($SliderId);	
			$data['SliderId']=$result['SliderId'];
			$data['SliderTitle']=$result['SliderTitle'];
			$data['SliderImage']=$result['SliderImage'];			
			$data['IsActive']=$result['IsActive'];	
			//echo "<pre>";print_r($data);die;	
			$data['activeTab']="slideradd";	
			$this->load->view('slider/slideradd',$data);	
		
	}


	function slider_delete(){
		if(!check_admin_authentication()){ 
			redirect(base_url());
		}
			$data= array('IsDelete' =>'1','IsActive' =>'Inactive');
			$SliderId=$this->input->post('SliderId');
			$this->db->where("SliderId",$SliderId);			
			$res=$this->db->update('tblslider',$data);
			//echo $this->db->last_query();die;
			echo json_encode($res);
			die;
		
	}

	
}
