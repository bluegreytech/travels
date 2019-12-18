<?php

class Contact_model extends CI_Model
 {
	function inquiry_insert()
	{	
		$data = array(
		'FullName'=>trim($this->input->post('FullName')),	
		'EmailAddress'=>trim($this->input->post('EmailAddress')),			
		'ContactNumber'=>trim($this->input->post('ContactNumber')),
		'City'=>trim($this->input->post('City')),			
		'MessageDescription' =>trim($this->input->post('MessageDescription')),			
		'CreatedOn'=>date('Y-m-d')		
		);
		//echo "<pre>";print_r($data);die;	     
		$res=$this->db->insert('tblcontactus',$data);	
		return $res;
	}

	function getsitedetail()
	{	
		$this->db->select('*');
		$this->db->from('tblsitesetting');
		$query=$this->db->get();
		$res = $query->result();
		return $res;
	}


}
