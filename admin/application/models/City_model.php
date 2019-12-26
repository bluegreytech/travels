<?php

class City_model extends CI_Model
 {
	function city_insert()
	{	

        $data = array(
			'CityName'=>trim($this->input->post('CityName')),
			'IsActive' =>$this->input->post('IsActive'),			
			'CreatedOn'=>date('Y-m-d')		
		);
	    //echo "<pre>";print_r($data);die;	         
        $res=$this->db->insert('tblcity',$data);	
		return $res;
	}

	function list_city()
	{
		$this->db->select('*');
		$this->db->from('tblcity');
		$this->db->where('IsDelete','0');
		$this->db->order_by('CityId','desc');
		$query=$this->db->get();
		$res = $query->result();
		return $res;

	}

	function getcitydata($CityId)
	{
		$this->db->select("*");
		$this->db->from("tblcity");
		$this->db->where("CityId",$CityId);
	    $this->db->order_by('CityId','desc');
		$query=$this->db->get();
		return $query->row_array();
	}


	function city_update()
	{
	   	$CityId=$this->input->post('CityId');
        $data = array(
		'CityName'=>trim($this->input->post('CityName')),
		'IsActive' =>$this->input->post('IsActive'),					
		'UpdatedOn'=>date('Y-m-d')		
		); 
		//print_r($data);die;
		$this->db->where("CityId",$CityId);
		$res=$this->db->update('tblcity',$data);		
		return $res;
	}
	
}
