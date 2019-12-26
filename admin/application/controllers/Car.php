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
		$data['CarRate']=$this->input->post('CarRate');
		$data['DriveAllowance']=$this->input->post('DriveAllowance');
		$data['ExtraKMS']=$this->input->post('ExtraKMS');
		$data['NumberOfSeat']=$this->input->post('NumberOfSeat');
		$data['NoOfBaggage']=$this->input->post('NoOfBaggage');
		
		$data['StartPointCityId']=$this->input->post('StartPointCityId');
		$data['StartPointCityId']=$this->input->post('StartPointCityId');
		$data['StateTax']=$this->input->post('StateTax');
		$data['AirCondition']=$this->input->post('AirCondition');
		$data['CarNumber']=$this->input->post('CarNumber');
		$data['CarImage']=$this->input->post('CarImage');
		$data['CarDescription']=$this->input->post('CarDescription');
		$data['IsActive']=$this->input->post('IsActive');
		$data["car_image"] = $this->input->post('CarImage');

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
			$data['cityData']=$this->Car_model->list_city();
			//print_r($data['cityData']);die;	
			$this->load->view('car/caradd',$data);
				
	}
	
	function Editcar($CarId){
		if(!check_admin_authentication()){ 
			redirect(base_url());
		}
			$data=array();
			$result=$this->Car_model->getdata($CarId);
			//echo "<pre>";print_r($result);die;		
			$data['CarId']=$result['CarId'];
			$data['CarName']=$result['CarName'];
			$data['CarRate']=$result['CarRate'];
			$data['DriveAllowance']=$result['DriveAllowance'];
			$data['ExtraKMS']=$result['ExtraKMS'];
			$data['NumberOfSeat']=$result['NumberOfSeat'];
			$data['NoOfBaggage']=$result['NoOfBaggage'];	
			
			$data['StartPointCityId']=$result['StartPointCityId'];
			$data['EndPointCityId']=$result['EndPointCityId'];
			$data['StateTax']=$result['StateTax'];
			$data['AirCondition']=$result['AirCondition'];
			$data['CarNumber']=$result['CarNumber'];
			$data['CarImage']=$result['CarImage'];
			$data['CarDescription']=$result['CarDescription'];		
			$data['IsActive']=$result['IsActive'];

			echo $data['CityStart']=$result['CityStart'];
			echo $data['CityEnd']=$result['CityEnd'];
			//echo "<pre>";print_r($data);die;	
			$data['activeTab']="caradd";
			$data['cityData']=$this->Car_model->list_city();	
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
