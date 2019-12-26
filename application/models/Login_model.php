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
}
