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

  function search()
  {

      $StartCity=$this->input->post('StartCity');
      $EndCity=$this->input->post('EndCity');
      //die;
      $where=array("StartCity"=>$StartCity,"EndCity"=>$EndCity);
      $this->db->select('city.CityId,city.CarBrandId,city.StartCity,city.EndCity,brand.*');
      $this->db->from("tblcity as city");
      $this->db->join('tblcarbrand as brand', 'city.CarBrandId = brand.CarBrandId', 'LEFT');
      $this->db->where($where);
      //$this->db->order_by('CarBrandId','desc');
      $query=$this->db->get();
      $res = $query->result();
      if($res)
      {
          return $res;
      }
      else
      {
          return 0;
      }
      
  }


  function search_local()
  {
      $StartCity=$this->input->post('StartCity');
      //die;
      $where=array("StartCity"=>$StartCity,"LocalCity"=>'Active');
      $this->db->select('city.CityId,city.CarBrandId,city.StartCity,city.LocalCity,brand.*');
      $this->db->from("tblcity as city");
      $this->db->join('tblcarbrand as brand', 'city.CarBrandId = brand.CarBrandId', 'LEFT');
      $this->db->where($where);
      //$this->db->order_by('CarBrandId','desc');
      $query=$this->db->get();
      $res = $query->result();
      if($res)
      {
          return $res;
      }
      else
      {
          return 0;
      }
      
  }



}
