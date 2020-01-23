<?php

class Routes_model extends CI_Model
 {
	function getcarbrandlist()
	{
		$this->db->select('CarBrandId,BrandName');
		$this->db->from('tblcarbrand');
		$this->db->where('IsDelete','0');
		$this->db->order_by('CarBrandId','desc');
		$query=$this->db->get();
		$res = $query->result();
		return $res;
	}

	function getcarroutes($CarBrandId)
	{
		$where=array("IsActive"=>'Active',"IsDelete"=>'0',"CarBrandId"=>$CarBrandId);
		$this->db->select('*');
		$this->db->from('tblcity');
		$this->db->where($where);
		$this->db->order_by('StartCity','asc');
		$query=$this->db->get();
		$res = $query->result();
		return $res;
	}

}
