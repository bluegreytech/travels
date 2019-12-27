<?php

class Services_model extends CI_Model
{
  function getcarbrandlist()
  {
    $this->db->select('*');
    $this->db->from('tblcarbrand');
    $this->db->where('IsDelete','0');
    $this->db->order_by('CarBrandId','desc');
    $query=$this->db->get();
    $res = $query->result();
    return $res;
  }

  function getsubcar($CarBrandId)
  {
    $this->db->select('*');
    $this->db->from("tblcartype");
    $this->db->where('CarBrandId',$CarBrandId);
    $this->db->order_by('CarId','desc');
    $query=$this->db->get();
    $res = $query->result();
    return $res;
  }


}
