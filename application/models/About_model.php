<?php

class About_model extends CI_Model
 {
	
	function getabout(){
		$this->db->select('*');
		$this->db->from('tblaboutus');
		$this->db->where('IsDelete','0');
		$this->db->order_by('AboutusId','desc');
		$query=$this->db->get();
		$res = $query->result();
		return $res;

	}
	

		
}
