<?php

class Car_model extends CI_Model
 {
	function car_insert()
	{	
            $data = array(
			'CarName'=>trim($this->input->post('CarName')),	
			'NumberOfSeat'=>trim($this->input->post('NumberOfSeat')),			
			'CarType'=>trim($this->input->post('CarType')),
			'AirCondition'=>trim($this->input->post('AirCondition')),			
			'CarNumber'=>trim($this->input->post('CarNumber')),		
			'IsActive' =>$this->input->post('IsActive'),			
			'CreatedOn'=>date('Y-m-d')		
			);
		    //echo "<pre>";print_r($data);die;	         
            $res=$this->db->insert('tblcartype',$data);	
			return $res;
	}

	function getcarlist(){
		$this->db->select('*');
		$this->db->from('tblcartype');
		$this->db->where('IsDelete','0');
		$this->db->order_by('CarId','desc');
		$query=$this->db->get();
		$res = $query->result();
		return $res;

	}
	

	function getdata($CarId){
		$this->db->select("*");
		$this->db->from("tblcartype");
		$this->db->where("IsDelete",'0');
		$this->db->where("CarId",$CarId);
	    $this->db->order_by('CarId','desc');
		$query=$this->db->get();
		return $query->row_array();
	}

	function car_update()
	{
		   $CarId=$this->input->post('CarId');
            $data = array(
			'CarName' =>trim($this->input->post('CarName')),
			'NumberOfSeat' =>trim($this->input->post('NumberOfSeat')),			
			'CarType' => trim($this->input->post('CarType')),	
			'AirCondition' =>trim($this->input->post('AirCondition')),			
			'CarType' => trim($this->input->post('CarType')),	
			'IsActive' => $this->input->post('IsActive'),			
			'UpdatedOn'=>date('Y-m-d')		
			); 
			//print_r($data);die;
			$this->db->where("CarId",$CarId);
			$res=$this->db->update('tblcartype',$data);		
			return $res;
	}

	
}
