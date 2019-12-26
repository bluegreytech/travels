<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class City extends CI_Controller 
{

	public function __construct()
	{
      	parent::__construct();
		$this->load->model('City_model');  
    }

	public function cityadd()
	{      
		if(!check_admin_authentication()){ 
			redirect(base_url());
		}   
			
		$data=array();	
		$data['CityId']=$this->input->post('CityId');
		$data['CityName']=$this->input->post('CityName');
		$data['IsActive']=$this->input->post('IsActive');
	
		if($_POST)
		{	
				if($this->input->post("CityId")!="")
				{
					$this->City_model->city_update();
					$this->session->set_flashdata('success', 'Record has been Updated Succesfully!');
					redirect('city');
					
				}
				else
				{ 
					$this->City_model->city_insert();
					$this->session->set_flashdata('success', 'Record has been Inserted Succesfully!');
					redirect('city');
				
				}
		}	
			
			$data['activeTab']="cityadd";
			//$data['cityData']=$this->City_model->list_city();
			//print_r($data['cityData']);die;	
			$this->load->view('city/cityadd',$data);
				
	}


	function index()
	{	
		if(!check_admin_authentication()){ 
			redirect(base_url());
		}else{	
			$data['activeTab']="citylist";		
			$data['result']=$this->City_model->list_city();
			//echo "<pre>";print_r($data['result']);die;
			$this->load->view('city/citylist',$data);
		}
	}

	function editcity($CityId){
		if(!check_admin_authentication()){ 
			redirect(base_url());
		}
			$data=array();
			$result=$this->City_model->getcitydata($CityId);
			//echo "<pre>";print_r($result);die;		
			$data['CityId']=$result['CityId'];
			$data['CityName']=$result['CityName'];	
			$data['IsActive']=$result['IsActive'];
			//echo "<pre>";print_r($data);die;	
			$data['activeTab']="cityadd";	
			$this->load->view('city/cityadd',$data);	
		
	}

	function city_delete(){
		if(!check_admin_authentication()){ 
			redirect(base_url());
		}
			$data= array('IsActive' =>'Inactive','IsDelete' =>'1');
			$CityId=$this->input->post('CityId');
			$this->db->where("CityId",$CityId);			
			$res=$this->db->update('tblcity',$data);
			//echo $this->db->last_query();die;
			echo json_encode($res);
			die;
		}

	
}
