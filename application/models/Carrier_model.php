<?php

class Carrier_model extends CI_Model
 {

 	function carrer_insert()
	{	
		$user_cv='';
		if(isset($_FILES['CarrierCv']) &&  $_FILES['CarrierCv']['name']!='')
        {
            $this->load->library('upload');
            $rand=rand(0,100000); 
			  
			$_FILES['userfile']['name']     =   $_FILES['CarrierCv']['name'];
			$_FILES['userfile']['type']     =   $_FILES['CarrierCv']['type'];
			$_FILES['userfile']['tmp_name'] =   $_FILES['CarrierCv']['tmp_name'];
			$_FILES['userfile']['error']    =   $_FILES['CarrierCv']['error'];
			$_FILES['userfile']['size']     =   $_FILES['CarrierCv']['size'];
   
			$config['file_name'] = $rand.'CV';			
			$config['upload_path'] = base_path().'admin/upload/carriercv/';		
			$config['allowed_types'] = 'doc|pdf|docx';  
 
             $this->upload->initialize($config);
 
              if (!$this->upload->do_upload())
			  {
				$error =  $this->upload->display_errors();
				echo "<pre>";print_r($error);
			  } 
           	  $picture = $this->upload->data();	   
              $this->load->library('image_lib');		   
              $this->image_lib->clear();
			  $gd_var='gd2';

              $this->image_lib->initialize(array(
				'image_library' => $gd_var,
				'source_image' => base_path().'admin/upload/carriercv_orig/'.$picture['file_name'],
				'new_image' => base_path().'admin/upload/carriercv/'.$picture['file_name'],
				'maintain_ratio' => FALSE,
				'quality' => '100%',
				'width' => 300,
				'height' => 300
			 ));
			
			
			if(!$this->image_lib->resize())
			{
				$error = $this->image_lib->display_errors();
			}
			
			$user_cv=$picture['file_name'];
		
			
		
			if($this->input->post('Pre_CarrierCv')!='')
				{
					if(file_exists(base_path().'admin/upload/carriercv/'.$this->input->post('Pre_CarrierCv')))
					{
						$link=base_path().'admin/upload/carriercv/'.$this->input->post('Pre_CarrierCv');
						unlink($link);
					}
					
					if(file_exists(base_path().'admin/upload/carriercv_orig/'.$this->input->post('Pre_CarrierCv')))
					{
						$link2=base_path().'admin/upload/carriercv_orig/'.$this->input->post('Pre_CarrierCv');
						unlink($link2);
					}
				}
			} else {
				if($this->input->post('Pre_CarrierCv')!='')
				{
					$user_cv=$this->input->post('Pre_CarrierCv');
				}
			}
        $data = array(	
			'FullName'=>trim($this->input->post('FullName')),
			'EmailAddress'=>trim($this->input->post('EmailAddress')),
			'ContactNumber'=>trim($this->input->post('ContactNumber')),
			'Subject'=>trim($this->input->post('Subject')),
			'RemarkDescription'=>trim($this->input->post('RemarkDescription')),
			'CarrierCv'=>$user_cv,			
			'CreatedOn'=>date('Y-m-d')		
		);
	    //echo "<pre>";print_r($data);die;	         
        $this->db->insert('tblcarrierinquiry',$data);	
		 //return $res;
        $insert_id = $this->db->insert_id();  
        if($insert_id!=''){
        
          $FullName = $this->input->post('FullName');
          $EmailAddress = $this->input->post('EmailAddress');
          $ContactNumber = $this->input->post('ContactNumber');
          $Subject = $this->input->post('Subject');
          $RemarkDescription = $this->input->post('RemarkDescription');
            
          $email_template=$this->db->query("select * from ".$this->db->dbprefix('tblemail_template')." where task='Carrier Inquiry'");
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
          $email_message=str_replace('{EmailAddress}',$EmailAddress,$email_message);
          $email_message=str_replace('{ContactNumber}',$ContactNumber,$email_message);
          $email_message=str_replace('{Subject}',$Subject,$email_message);
          $email_message=str_replace('{RemarkDescription}',$RemarkDescription,$email_message);
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
          $this->email->subject('Carrier Inquiry');
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

	
	
	function get_carrierlist()
	{	
		$where=array("IsActive"=>'Active',"IsDelete"=>'0');	
		$this->db->select("*");
		$this->db->from("tblcarrer");
		$this->db->where($where);
		$r=$this->db->get();
		//echo $this->db->last_query(); die;
		$res = $r->result();
		return $res;
	}
	

}
