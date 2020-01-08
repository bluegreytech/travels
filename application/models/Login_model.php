<?php

class Login_model extends CI_Model
{
    function gettestimoniallist()
    {
      $where=array('IsDelete'=>'0','IsActive'=>'Active','ApproveStatus'=>'Active');
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
    $where=array('IsActive'=>'Active','IsDelete'=>'0');
    $this->db->select('*');
    $this->db->from('tblcity');
    $this->db->where($where);
    $this->db->order_by('StartCity','ACE');
    $this->db->group_by('StartCity');
    $query=$this->db->get();
    $res = $query->result();
    return $res;
  }

  function end_city()
  {
    $where=array('IsActive'=>'Active','IsDelete'=>'0');
    $this->db->select('*');
    $this->db->from('tblcity');
    $this->db->where($where);
    $this->db->order_by('EndCity','ACE');
    $this->db->group_by('EndCity');
    $query=$this->db->get();
    $res = $query->result();
    return $res;
  }

  
  function ajax_end_city($StartCity)
  {
    $where=array('IsActive'=>'Active','IsDelete'=>'0',"EndCity!="=>$StartCity);
    $this->db->select('*');
    $this->db->from('tblcity');
    $this->db->where($where);
    $this->db->order_by('EndCity','ACE');
    $this->db->group_by('EndCity');
    $query=$this->db->get();
    $res = $query->result();
    return $res;
  }

  function ajax_end_cityround($StartCity)
  {
    $where=array('IsActive'=>'Active','IsDelete'=>'0',"EndCity!="=>$StartCity);
    $this->db->select('*');
    $this->db->from('tblcity');
    $this->db->where($where);
    $this->db->order_by('EndCity','ACE');
    $this->db->group_by('EndCity');
    $query=$this->db->get();
    $res = $query->result();
    return $res;
  }

  function local_city()
  {
    $where=array('IsActive'=>'Active','IsDelete'=>'0',"LocalCity"=>'Active');
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
    $where= array('IsActive'=>'Active','IsDelete'=>'0');
    $this->db->select('*');
    $this->db->from("tblcartype");
    $this->db->where($where);
    $this->db->order_by('CarId','desc');
    $query=$this->db->get();
    $res = $query->result();
    return $res;
  }

  function get_brandcartype($CarBrandId)
  {
    $where = array('CarBrandId'=>$CarBrandId,'IsActive'=>'Active');
    $this->db->select('*');
    $this->db->from('tblcarbrand');
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
        'CarBrandId'=>trim($this->input->post('CarBrandId')),
        'BrandName'=>trim($this->input->post('BrandName')), 
        'PickupDate'=>trim($PickupDate),
        'DropofDate'=>trim($DropofDate),
        'PickupTime'=>trim($this->input->post('PickupTime')), 
        'DropofTime'=>trim($this->input->post('DropofTime')), 
        'StartCity'=>trim($this->input->post('StartCity')), 
        'EndCity'=>trim($this->input->post('EndCity')), 
        'PerKmRate'=>trim($this->input->post('PerKmRate')),
        'KMS'=>trim($this->input->post('KMS')), 
        'TotalFareAmount'=>trim($this->input->post('TotalFareAmount')),  
        'ExtraKMS'=>trim($this->input->post('ExtraKMS')), 
        'StateTax'=>trim($this->input->post('StateTax')),    
        'TotalAmount'=>trim($this->input->post('TotalAmount')), 
        'TaxAdded'=>trim($this->input->post('TaxAdded')),     
        'FinalAmount' =>$this->input->post('FinalAmount'),
        'transaction_id' => $this->input->post('razorpay_payment_id'),
        'payment_status' =>'Pending',
        'OTPNumber' =>'', 
        'Status' =>'Verify',    
        'UpdatedOn'=>date('Y-m-d')    
      );
        //echo "<pre>";print_r($data);die; 
        $this->db->where("ContactNumber",$ContactNumber);
        $res=$this->db->update('tbluser',$data); 
        return $res;

  }


  function user_bookcar_online()
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
        'CarBrandId'=>trim($this->input->post('CarBrandId')),
        'BrandName'=>trim($this->input->post('BrandName')), 
        'PickupDate'=>trim($PickupDate),
        'DropofDate'=>trim($DropofDate),
        'PickupTime'=>trim($this->input->post('PickupTime')), 
        'DropofTime'=>trim($this->input->post('DropofTime')), 
        'StartCity'=>trim($this->input->post('StartCity')), 
        'EndCity'=>trim($this->input->post('EndCity')), 
        'PerKmRate'=>trim($this->input->post('PerKmRate')),
        'KMS'=>trim($this->input->post('KMS')), 
        'TotalFareAmount'=>trim($this->input->post('TotalFareAmount')),  
        'ExtraKMS'=>trim($this->input->post('ExtraKMS')), 
        'StateTax'=>trim($this->input->post('StateTax')),    
        'TotalAmount'=>trim($this->input->post('TotalAmount')), 
        'TaxAdded'=>trim($this->input->post('TaxAdded')),     
        'FinalAmount' =>$this->input->post('FinalAmount'),
        'transaction_id' =>$this->input->post('razorpay_payment_id'),
        'payment_status' =>'Success',
        'OTPNumber' =>'', 
        'Status' =>'Verify',    
        'UpdatedOn'=>date('Y-m-d')    
      );
        //echo "<pre>";print_r($data);die; 
        $this->db->where("ContactNumber",$ContactNumber);
        $res=$this->db->update('tbluser',$data); 
        return $res;

  }


    function check_number()
    { 
        $ContactNumber = trim($this->input->post('ContactNumber'));
        $LoginOTP = $this->input->post('LoginOTP');       
        $query = $this->db->get_where('tbluser',array('ContactNumber'=>$ContactNumber));
        // echo $this->db->last_query();
        // die; 
       
        $user = $query->row_array();
        //xecho "<pre>";print_r($admin);die;
        if($query->num_rows()>0)
        {
            $ContactNumber=$user['ContactNumber'];
            if($ContactNumber!='')
            {
                $LoginOTP=rand(12,123456);
                $data = array(
                'LoginOTP' =>$LoginOTP, 
                'Status' =>'Verify',    
                'UpdatedOn'=>date('Y-m-d')    
                  );
                //print_r($data);die; 
                $this->db->where("ContactNumber",$ContactNumber);
                $res=$this->db->update('tbluser',$data); 
                return 1;

            }
        }
        else
        {
            return 2;
        }
    }

    function check_login()
    { 
        $ContactNumber = trim($this->input->post('ContactNumber'));
        $LoginOTP = $this->input->post('LoginOTP');       
        $query = $this->db->get_where('tbluser',array('ContactNumber'=>$ContactNumber,'LoginOTP'=>$LoginOTP));
        //echo $this->db->last_query();
        //die; 
       
        $user = $query->row_array();
        //xecho "<pre>";print_r($admin);die;
        if($query->num_rows()>0)
        {
            $ContactNumber=$user['ContactNumber'];
            if($ContactNumber!='')
            {
                $data = array(
                'LoginOTP' =>'', 
                'Status' =>'Verify',    
                'UpdatedOn'=>date('Y-m-d')    
                  );
                //print_r($data);die; 
                $this->db->where("ContactNumber",$ContactNumber);
                $res=$this->db->update('tbluser',$data); 
                return 1;

            }
        }
        else
        {
            return 2;
        }
    }

    function login_where($table,$where)
    {
      $r = $this->db->get_where($table,$where);
      $res = $r->row();
      return $res;
    }

    
    function get_history($ContactNumberid)
    {
      $where= array('ContactNumber'=>$ContactNumberid);
      $this->db->select('*');
      $this->db->from("tbluser");
      $this->db->where($where);
      $query=$this->db->get();
      $res = $query->result();
      return $res;
    }

    function get_feedback($ContactNumberid)
    {
      $where= array('ContactNumber'=>$ContactNumberid);
      $this->db->select('*');
      $this->db->from("tbltestimonial");
      $this->db->where($where);
      $query=$this->db->get();
      $res = $query->result();
      return $res;
    }


    

    function testimonial_add()
    {
        $data = array(
        'FirstName'=>trim($this->input->post('FirstName')),
        'LastName'=>trim($this->input->post('LastName')),
        'ContactNumber'=>trim($this->input->post('ContactNumber')),
        'TestimonialDescription'=>trim($this->input->post('TestimonialDescription')),
        'CreatedOn'=>date('Y-m-d')    
      );
        //echo "<pre>";print_r($data);die; 
       // $this->db->where("ContactNumber",$ContactNumber);
        $res=$this->db->insert('tbltestimonial',$data); 
        return $res;
    }


    function testimonial_update()
    {
      $TestimonialId=$this->input->post('TestimonialId');
      $data = array(
        'FirstName'=>trim($this->input->post('FirstName')),
        'LastName'=>trim($this->input->post('LastName')),
        'ContactNumber'=>trim($this->input->post('ContactNumber')),
        'TestimonialDescription'=>trim($this->input->post('TestimonialDescription')),
        'UpdatedOn'=>date('Y-m-d')    
      );
        //echo "<pre>";print_r($data);die; 
        $this->db->where("TestimonialId",$TestimonialId);
        $res=$this->db->update('tbltestimonial',$data); 
        return $res;
    }

    function getajaxdata($UserId){
    // $this->db->select('*');
    // $this->db->from('tbluser');
    // $this->db->where("UserId",$UserId);
    // $query=$this->db->get();
    // $res = $query->result();
    // return $res;

    $this->db->select("*");
    $this->db->from("tbluser");
    $this->db->where("UserId",$UserId);
    $query=$this->db->get();  
    return $query->row_array();
  }
}
