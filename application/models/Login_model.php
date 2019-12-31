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
    $where=array('IsActive' =>'Active','IsDelete' =>'0');
    $this->db->select('*');
    $this->db->from('tblcity');
    $this->db->where($where);
    $this->db->order_by('StartCity','ACE');
    $this->db->group_by('StartCity');
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

  
  function login()
  {
       $data = array(
        'ContactNumber'=>trim($this->input->post('ContactNumber')),   
        'OTPNumber' =>$this->input->post('OTPNumber'),       
        'CreatedOn'=>date('Y-m-d')    
      );
        //echo "<pre>";print_r($data);die;  
        $res=$this->db->insert('tbluser',$data); 
        return $res;         
  }

  function getuser()
  {

    $ContactNumber=$this->input->post('ContactNumber');
    $where=array("ContactNumber"=>$ContactNumber,"OTPNumber!="=>'');
    $this->db->select("*");
    $this->db->from("tbluser");
    $this->db->where("ContactNumber",$ContactNumber);
    $query=$this->db->get();
    return $query->row_array();
  }


   function user_book_car()
  {
      $ContactNumber=$this->input->post('ContactNumber');
      $pdate=$this->input->post('PickupDate');
      $pidate = str_replace('/', '-', $pdate );
      $PickupDate = date("Y-m-d", strtotime($pidate));

      $ddate=$this->input->post('DropofDate');
      $prdate = str_replace('/', '-', $ddate );
      $DropofDate = date("Y-m-d", strtotime($prdate));

     $data = array(
        'FirstName'=>trim($this->input->post('FirstName')),
        'LastName'=>trim($this->input->post('LastName')),
        'EmailAddress'=>trim($this->input->post('EmailAddress')),
        'ContactNumber'=>trim($this->input->post('ContactNumber')),
        'BrandName'=>trim($this->input->post('BrandName')), 
        'CarId'=>trim($this->input->post('CarId')),
        'PickupDate'=>trim($PickupDate),
        'DropofDate'=>trim($DropofDate),
        'PickupTime'=>trim($this->input->post('PickupTime')), 
        'StartPointCity'=>trim($this->input->post('StartPointCity')), 
        'EndPointCity'=>trim($this->input->post('EndPointCity')), 
        'CarRate'=>trim($this->input->post('CarRate')), 
        'TaxAmount'=>trim($this->input->post('TaxAmount')),     
        'FinalAmount' =>$this->input->post('FinalAmount'),
        'Status' =>'Verify',    
        'UpdatedOn'=>date('Y-m-d')    
      );
        //echo "<pre>";print_r($data);die; 
        $this->db->where("ContactNumber",$ContactNumber);
        $res=$this->db->update('tbluser',$data); 
        return $res;

  }

 

}
