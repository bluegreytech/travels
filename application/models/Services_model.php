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
      $where=array("city.StartCity"=>$StartCity,"city.EndCity"=>$EndCity);
      $this->db->select('city.CityId,city.CarBrandId,city.StartCity,city.EndCity,brand.*');
      $this->db->from("tblcity as city");
      $this->db->join('tblcarbrand as brand', 'city.CarBrandId = brand.CarBrandId', 'LEFT');
      $this->db->where($where);
      //$this->db->order_by('CarBrandId','desc');
      $query=$this->db->get();
      //echo $this->db->last_query();die;
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

  function add_luxuryquotes()
  {
      $data = array(
        'FullName'=>trim($this->input->post('FullName')),
        'ContactNumber'=>trim($this->input->post('ContactNumber')),
        'StartCity'=>trim($this->input->post('StartCity')),
        'Subject'=>trim($this->input->post('Subject')),
        'QueryDescription'=>trim($this->input->post('QueryDescription')),
        'CreatedOn'=>date('Y-m-d')    
      );
        //echo "<pre>";print_r($data);die; 
        $this->db->insert('tblluxuryquotes',$data); 
        //return $res;
        $insert_id = $this->db->insert_id();  
        if($insert_id!=''){
        
          $FullName = $this->input->post('FullName');
          $ContactNumber = $this->input->post('ContactNumber');
          $StartCity = $this->input->post('StartCity');
          $Subject = $this->input->post('Subject');
          $QueryDescription = $this->input->post('QueryDescription');
            
          $email_template=$this->db->query("select * from ".$this->db->dbprefix('tblemail_template')." where task='Luxury Segmentation Inquiry'");
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
          $email_message=str_replace('{FullName}',$FullName,$email_message);
          $email_message=str_replace('{ContactNumber}',$ContactNumber,$email_message);
          $email_message=str_replace('{StartCity}',$StartCity,$email_message);
          $email_message=str_replace('{Subject}',$Subject,$email_message);
          $email_message=str_replace('{QueryDescription}',$QueryDescription,$email_message);
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
          $this->email->subject('Luxury Segmentation Inquiry');
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



}
