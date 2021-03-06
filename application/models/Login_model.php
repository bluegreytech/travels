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

    
    function slider_list()
    {
      $where=array('IsDelete'=>'0','IsActive'=>'Active');
      $this->db->select('*');
      $this->db->from('tblslider');
      $this->db->where($where);
      $this->db->order_by('SliderId','desc');
      $query=$this->db->get();
      $res = $query->result();
      return $res;
    }

  function getcarbrandlist()
  {
    $where=array('IsDelete'=>'0','IsActive'=>'Active');
    $this->db->select('*');
    $this->db->from('tblcarbrand');
    $this->db->where($where);
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

  function local_pack()
  {
    $where=array('local.IsActive'=>'Active','local.IsDelete'=>'0');
    $this->db->select('local.*,brand.BrandName');
    //$this->db->from('tbllocaltripprice');
    $this->db->from("tbllocaltripprice as local");
    $this->db->join('tblcarbrand as brand','local.CarBrandId = brand.CarBrandId', 'LEFT');
    $this->db->where($where);
    $query=$this->db->get();
    $res = $query->result();
    return $res;
  }

  function getlocal_pack()
  {
      $LocalTripId=3;
      $where=array('local.IsActive'=>'Active','local.IsDelete'=>'0','LocalTripId'=>$LocalTripId);
      $this->db->select('local.*');
      $this->db->from("tbllocaltripprice as local");
      $this->db->where($where);
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
      $ContactNumber=$this->input->post('ContactNumber');
      //$query=$this->db->get_where('tbluser',array('ContactNumber'=>$ContactNumber,'FirstName='=>'IS NULL'));
      $select = "SELECT * FROM tbluser WHERE ContactNumber=$ContactNumber and FirstName IS NULL";
      $query = $this->db->query($select);
      $count = $query->num_rows();
      if($count != 0)
      {
          $data = array(  
            'OTPNumber' =>$this->input->post('OTPNumber')        
          );
          $this->db->where("ContactNumber",$ContactNumber);
          $this->db->where("FirstName IS NULL");
          $res=$this->db->update('tbluser',$data); 
          return $res;    
        }
        else
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
  }

  function getuser()
  {
    $ContactNumber=$this->input->post('ContactNumber');
    $where=array("ContactNumber"=>$ContactNumber,"OTPNumber!="=>'',"Status"=>'Pending');
    $this->db->select("*");
    $this->db->from("tbluser");
    $this->db->where($where);
    $query=$this->db->get();
    // echo $this->db->last_query();
    // die;
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
        'PickupDate'=>trim($PickupDate),
        'DropofDate'=>trim($DropofDate),
        'PickupTime'=>trim($this->input->post('PickupTime')), 
        'DropofTime'=>trim($this->input->post('DropofTime')), 
        'StartCity'=>trim($this->input->post('StartCity')), 
        'EndCity'=>trim($this->input->post('EndCity')), 

        'LocalTripId'=>trim($this->input->post('LocalTripId')), 
        'PerHourKMS'=>trim($this->input->post('PerHourKMS')), 
        'Hours'=>trim($this->input->post('Hours')),

        'PerHoureFare'=>trim($this->input->post('PerHoureFare')), 
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
        $this->db->where("Status",'Pending');
        $this->db->update('tbluser',$data); 
        //return $res;
        if($this->input->post('BrandName')!='')
        {  
          $FullName = $this->input->post('FirstName');
          $LastName = $this->input->post('LastName');
          $EmailAddress = $this->input->post('EmailAddress');
          $ContactNumber = $this->input->post('ContactNumber');
          $BrandName = $this->input->post('BrandName');
          $PickupTime = $this->input->post('PickupTime');
          $DropofTime = $this->input->post('DropofTime');
          $StartCity = $this->input->post('StartCity');
          $EndCity = $this->input->post('EndCity');
          $PerHoureFare = $this->input->post('PerHoureFare');
          $PerKmRate = $this->input->post('PerKmRate');
          $KMS = $this->input->post('KMS');
          $TotalFareAmount = $this->input->post('TotalFareAmount');
          $ExtraKMS = $this->input->post('ExtraKMS');
          $StateTax = $this->input->post('StateTax');
          $TotalAmount = $this->input->post('TotalAmount');
          $TaxAdded = $this->input->post('TaxAdded');
          $FinalAmount = $this->input->post('FinalAmount');
          $BookingDate = date('d-m-Y');

          $email_template=$this->db->query("select * from ".$this->db->dbprefix('tblemail_template')." where task='Cab Booking'");
          $email_temp=$email_template->row();
          $email_address_from=$email_temp->from_address;
          $email_address_reply=$email_temp->reply_address;
          $email_subject=$email_temp->subject;        
          $email_message=$email_temp->message;
          
          $base_url=base_url();
          $currentyear=date('Y');
          $email_message=str_replace('{break}','<br/>',$email_message);
          $email_message=str_replace('{base_url}',$base_url,$email_message);
          $email_message=str_replace('{year}',$currentyear,$email_message);
          $email_message=str_replace('{FirstName}',$FirstName,$email_message);
          $email_message=str_replace('{LastName}',$LastName,$email_message);
          $email_message=str_replace('{EmailAddress}',$EmailAddress,$email_message);
          $email_message=str_replace('{ContactNumber}',$ContactNumber,$email_message);
          $email_message=str_replace('{BrandName}',$BrandName,$email_message);
          $email_message=str_replace('{PickupDate}',$pdate,$email_message);
          $email_message=str_replace('{DropofDate}',$ddate,$email_message);
          $email_message=str_replace('{PickupTime}',$PickupTime,$email_message);
          $email_message=str_replace('{DropofTime}',$DropofTime,$email_message);
          $email_message=str_replace('{StartCity}',$StartCity,$email_message);
          $email_message=str_replace('{EndCity}',$EndCity,$email_message);  
          $email_message=str_replace('{PerHoureFare}',$PerHoureFare,$email_message);
          $email_message=str_replace('{PerKmRate}',$PerKmRate,$email_message);
          $email_message=str_replace('{KMS}',$KMS,$email_message);
          $email_message=str_replace('{TotalFareAmount}',$TotalFareAmount,$email_message);
          $email_message=str_replace('{ExtraKMS}',$ExtraKMS,$email_message);
          $email_message=str_replace('{StateTax}',$StateTax,$email_message);
          $email_message=str_replace('{TotalAmount}',$TotalAmount,$email_message);
          $email_message=str_replace('{TaxAdded}',$TaxAdded,$email_message);
          $email_message=str_replace('{FinalAmount}',$FinalAmount,$email_message);
          $email_message=str_replace('{BookingDate}',$BookingDate,$email_message);
          $str=$email_message; //die;

          $config['protocol']='smtp';
          $config['smtp_host']='ssl://smtp.googlemail.com';
          $config['smtp_port']='465';
          $config['smtp_user']='bluegreyindia@gmail.com';
          $config['smtp_pass']='Test@123';
          $config['charset']='utf-8';
          $config['newline']="\r\n";
          $config['mailtype'] = 'html';               
          $this->email->initialize($config);
          $body =$str;
          $this->email->from('bluegreyindia@gmail.com');
          $this->email->to('bluegreyindia@gmail.com');    
          $this->email->subject('Cab Booking Successfully');
          $this->email->message($body); 
          if($this->email->send())
          {
            return 1;
          }else
          {
            return 2;
          }
      }
      else
      {
        return 2;
      }
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
        'BrandName'=>trim($this->input->post('BrandName')), 
        'PickupDate'=>trim($PickupDate),
        'DropofDate'=>trim($DropofDate),
        'PickupTime'=>trim($this->input->post('PickupTime')), 
        'DropofTime'=>trim($this->input->post('DropofTime')), 
        'StartCity'=>trim($this->input->post('StartCity')), 
        'EndCity'=>trim($this->input->post('EndCity')), 
        'PerHoureFare'=>trim($this->input->post('PerHoureFare')), 
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
        $this->db->where("Status",'Pending');
        // $res=$this->db->update('tbluser',$data); 
        // return $res;
        $this->db->update('tbluser',$data); 
        //return $res;
        if($this->input->post('BrandName')!='')
        {  
          $FirstName = $this->input->post('FirstName');
          $LastName = $this->input->post('LastName');
          $EmailAddress = $this->input->post('EmailAddress');
          $ContactNumber = $this->input->post('ContactNumber');
          $BrandName = $this->input->post('BrandName');
          $PickupTime = $this->input->post('PickupTime');
          $DropofTime = $this->input->post('DropofTime');
          $StartCity = $this->input->post('StartCity');
          $EndCity = $this->input->post('EndCity');
          $PerHoureFare = $this->input->post('PerHoureFare');
          $PerKmRate = $this->input->post('PerKmRate');
          $KMS = $this->input->post('KMS');
          $TotalFareAmount = $this->input->post('TotalFareAmount');
          $ExtraKMS = $this->input->post('ExtraKMS');
          $StateTax = $this->input->post('StateTax');
          $TotalAmount = $this->input->post('TotalAmount');
          $TaxAdded = $this->input->post('TaxAdded');
          $FinalAmount = $this->input->post('FinalAmount');
          $BookingDate = date('d-m-Y');

          $email_template=$this->db->query("select * from ".$this->db->dbprefix('tblemail_template')." where task='Cab Booking'");
          $email_temp=$email_template->row();
          $email_address_from=$email_temp->from_address;
          $email_address_reply=$email_temp->reply_address;
          $email_subject=$email_temp->subject;        
          $email_message=$email_temp->message;
          
          $base_url=base_url();
          $currentyear=date('Y');
          $email_message=str_replace('{break}','<br/>',$email_message);
          $email_message=str_replace('{base_url}',$base_url,$email_message);
          $email_message=str_replace('{year}',$currentyear,$email_message);
          $email_message=str_replace('{FirstName}',$FirstName,$email_message);
          $email_message=str_replace('{LastName}',$LastName,$email_message);
          $email_message=str_replace('{EmailAddress}',$EmailAddress,$email_message);
          $email_message=str_replace('{ContactNumber}',$ContactNumber,$email_message);
          $email_message=str_replace('{BrandName}',$BrandName,$email_message);
          $email_message=str_replace('{PickupDate}',$pdate,$email_message);
          $email_message=str_replace('{DropofDate}',$ddate,$email_message);
          $email_message=str_replace('{PickupTime}',$PickupTime,$email_message);
          $email_message=str_replace('{DropofTime}',$DropofTime,$email_message);
          $email_message=str_replace('{StartCity}',$StartCity,$email_message);
          $email_message=str_replace('{EndCity}',$EndCity,$email_message);  
          $email_message=str_replace('{PerHoureFare}',$PerHoureFare,$email_message);
          $email_message=str_replace('{PerKmRate}',$PerKmRate,$email_message);
          $email_message=str_replace('{KMS}',$KMS,$email_message);
          $email_message=str_replace('{TotalFareAmount}',$TotalFareAmount,$email_message);
          $email_message=str_replace('{ExtraKMS}',$ExtraKMS,$email_message);
          $email_message=str_replace('{StateTax}',$StateTax,$email_message);
          $email_message=str_replace('{TotalAmount}',$TotalAmount,$email_message);
          $email_message=str_replace('{TaxAdded}',$TaxAdded,$email_message);
          $email_message=str_replace('{FinalAmount}',$FinalAmount,$email_message);
          $email_message=str_replace('{BookingDate}',$BookingDate,$email_message);
          $str=$email_message; //die;

          $config['protocol']='smtp';
          $config['smtp_host']='ssl://smtp.googlemail.com';
          $config['smtp_port']='465';
          $config['smtp_user']='bluegreyindia@gmail.com';
          $config['smtp_pass']='Test@123';
          $config['charset']='utf-8';
          $config['newline']="\r\n";
          $config['mailtype'] = 'html';               
          $this->email->initialize($config);
          $body =$str;
          $this->email->from('bluegreyindia@gmail.com');
          $this->email->to('bluegreyindia@gmail.com');    
          $this->email->subject('Cab Booking Successfully');
          $this->email->message($body); 
          if($this->email->send())
          {
            return 1;
          }else
          {
            return 2;
          }
      }
      else
      {
        return 2;
      }

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
                //$LoginOTP=rand(2000, 999999);
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
