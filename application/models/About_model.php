<?php

class About_model extends CI_Model
 {
	function about_insert()
	{	
            $data = array(
			'AboutTitle'=>trim($this->input->post('AboutTitle')),			
			'AboutDescription'=>trim($this->input->post('AboutDescription')),		
			'IsActive' =>$this->input->post('IsActive'),			
			'CreatedOn'=>date('Y-m-d')		
			);
		  // echo "<pre>";print_r($data);die;	
                    
            $res=$this->db->insert('tblaboutus',$data);	
			return $res;
	}

	function getabout(){
		$this->db->select('*');
		$this->db->from('tblaboutus');
		$this->db->where('IsDelete','0');
		$this->db->order_by('AboutusId','desc');
		$query=$this->db->get();
		$res = $query->result();
		return $res;

	}
	

	function getdata($id){
		$this->db->select("*");
		$this->db->from("tblaboutus");
		$this->db->where("IsDelete",'0');
		$this->db->where("AboutusId",$id);
	    $this->db->order_by('AboutusId','desc');
		$query=$this->db->get();
		return $query->row_array();
	}

	function about_update(){
		
		  $AboutusId=$this->input->post('AboutusId');
    
            $data = array(
			'AboutTitle' =>trim($this->input->post('AboutTitle')),			
			'AboutDescription' => trim($this->input->post('AboutDescription')),	
			'IsActive' => $this->input->post('IsActive'),			
			'CreatedOn'=>date('Y-m-d')		
			); 
			//print_r($data);die;
			$this->db->where("AboutusId",$AboutusId);
			$res=$this->db->update('tblaboutus',$data);		
			return $res;
	}

	
}
