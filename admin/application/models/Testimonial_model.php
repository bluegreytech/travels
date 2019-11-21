<?php

class Testimonial_model extends CI_Model
 {
	function testimonial_insert()
	{	
            $data = array(
			'FirstName'=>trim($this->input->post('FirstName')),	
			'LastName'=>trim($this->input->post('LastName')),			
			'TetimonialDescription'=>trim($this->input->post('TetimonialDescription')),		
			'IsActive' =>$this->input->post('IsActive'),			
			'CreatedOn'=>date('Y-m-d')		
			);
		  // echo "<pre>";print_r($data);die;	
                    
            $res=$this->db->insert('tbltestimonial',$data);	
			return $res;
	}

	function gettestimoniallist(){
		$this->db->select('*');
		$this->db->from('tbltestimonial');
		$this->db->where('IsDelete','0');
		$this->db->order_by('TestimonialId','desc');
		$query=$this->db->get();
		$res = $query->result();
		return $res;

	}
	

	function getdata($TestimonialId){
		$this->db->select("*");
		$this->db->from("tbltestimonial");
		$this->db->where("IsDelete",'0');
		$this->db->where("TestimonialId",$TestimonialId);
	    $this->db->order_by('TestimonialId','desc');
		$query=$this->db->get();
		return $query->row_array();
	}

	function testimonial_update(){
		
		  $TestimonialId=$this->input->post('TestimonialId');
    
            $data = array(
			'FirstName' =>trim($this->input->post('FirstName')),
			'LastName' =>trim($this->input->post('LastName')),			
			'TetimonialDescription' => trim($this->input->post('TetimonialDescription')),	
			'IsActive' => $this->input->post('IsActive'),			
			'CreatedOn'=>date('Y-m-d')		
			); 
			//print_r($data);die;
			$this->db->where("TestimonialId",$TestimonialId);
			$res=$this->db->update('tbltestimonial',$data);		
			return $res;
	}

	
}
