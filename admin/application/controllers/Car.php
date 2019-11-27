<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Car extends CI_Controller {

	public function __construct()
	{
      	parent::__construct();
		$this->load->model('Car_model');
      
    }

	function Carlist()
	{	
		if(!check_admin_authentication()){ 
			redirect(base_url());
		}else{	
			$data['activeTab']="carlist";		
			$data['result']=$this->Car_model->getcarlist();
			$this->load->view('car/carlist',$data);
		}
	}
	
	public function Caradd()
	{      
		if(!check_admin_authentication()){ 
			redirect(base_url());
		}   
			
		$data=array();	
		//$data['redirect_page']='aboutlist';
		$data['CarId']=$this->input->post('CarId');
		$data['CarName']=$this->input->post('CarName');
		$data['NumberOfSeat']=$this->input->post('NumberOfSeat');
		$data['CarType']=$this->input->post('CarType');
		$data['AirCondition']=$this->input->post('AirCondition');
		$data['CarNumber']=$this->input->post('CarNumber');
		$data['IsActive']=$this->input->post('IsActive');

		if($_POST)
		{	
				if($this->input->post("CarId")!="")
				{
					$this->Car_model->car_update();
					$this->session->set_flashdata('success', 'Record has been Updated Succesfully!');
					redirect('car/carlist');
					
				}
				else
				{ 
					$this->Car_model->car_insert();
					$this->session->set_flashdata('success', 'Record has been Inserted Succesfully!');
					redirect('car/carlist');
				
				}
		}	
			
		    $data['activeTab']="caradd";	
			$this->load->view('car/caradd',$data);
				
	}
	
	function Editcar($CarId){
		if(!check_admin_authentication()){ 
			redirect(base_url());
		}
			$data=array();
			$result=$this->Car_model->getdata($CarId);	
			$data['CarId']=$result['CarId'];
			$data['CarName']=$result['CarName'];
			$data['NumberOfSeat']=$result['NumberOfSeat'];	
			$data['CarType']=$result['CarType'];
			$data['AirCondition']=$result['AirCondition'];
			$data['CarNumber']=$result['CarNumber'];	
			$data['IsActive']=$result['IsActive'];	
			//echo "<pre>";print_r($data);die;	
			$data['activeTab']="caradd";	
			$this->load->view('car/caradd',$data);	
		
	}

	function updatedata($ProjectId){
		if(!check_admin_authentication()){ 
			redirect(base_url());
		}else{
		$result=$this->Car_model->updatedata($ProjectId);	
    	if($result=='1'){
		  $this->session->set_flashdata('success', 'Record has been updated Succesfully!');
		 	redirect('Project/Projectlist');	
			}
			redirect('Project/Projectlist');
		}
	}

	function car_delete(){
		if(!check_admin_authentication()){ 
			redirect(base_url());
		}
			$data= array('IsDelete' =>'1','IsActive' =>'Inactive');
			$CarId=$this->input->post('CarId');
			$this->db->where("CarId",$CarId);			
			$res=$this->db->update('tblcartype',$data);
			//echo $this->db->last_query();die;
			echo json_encode($res);
			die;
		
	}

	
}
