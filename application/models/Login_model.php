<?php

class Login_model extends CI_Model
{
    function gettestimoniallist()
    {
      $where=array('IsDelete'=>'0','IsActive'=>'Active');
      $this->db->select('*');
      $this->db->from('tbltestimonial');
      $this->db->where($where);
      $this->db->order_by('TestimonialId','desc');
      $query=$this->db->get();
      $res = $query->result();
      return $res;
    }

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

  function list_city()
  {
    $where= array('IsActive' =>'Active','IsDelete' =>'0');
    $this->db->select('*');
    $this->db->from('tblcity');
    $this->db->where($where);
    $this->db->order_by('CityName','ACE');
    $query=$this->db->get();
    $res = $query->result();
    return $res;
  }

  function getsubcar($CarBrandId)
  {
    $where= array('IsActive' =>'Active','IsDelete' =>'0','CarBrandId'=>$CarBrandId);
    $this->db->select('*');
    $this->db->from("tblcartype");
    $this->db->where($where);
    $this->db->order_by('CarId','desc');
    $query=$this->db->get();
    $res = $query->result();
    return $res;
  }

  function getsubcarall()
  {
    $where= array('IsActive' =>'Active','IsDelete' =>'0');
    $this->db->select('*');
    $this->db->from("tblcartype");
    $this->db->where($where);
    $this->db->order_by('CarId','desc');
    $query=$this->db->get();
    $res = $query->result();
    return $res;
  }

  function get_cartype($carid)
  {
    $where = array('CarId' =>$carid, 'IsActive' =>'Active');
    $this->db->select('*');
    $this->db->from('tblcartype');
    $this->db->where($where);
    $query=$this->db->get();
    return $query->row_array();
  }

}
