<?php

class Contact_model extends CI_Model
 {
	function inquiry_insert()
	{	
		$data = array(
		'FullName'=>trim($this->input->post('FullName')),	
		'EmailAddress'=>trim($this->input->post('EmailAddress')),			
		'ContactNumber'=>trim($this->input->post('ContactNumber')),
		'City'=>trim($this->input->post('City')),			
		'MessageDescription' =>trim($this->input->post('MessageDescription')),			
		'CreatedOn'=>date('Y-m-d')		
		);
		//echo "<pre>";print_r($data);die;	     
		$this->db->insert('tblcontactus',$data);
		//return $res;
		$insert_id = $this->db->insert_id();	
			if($insert_id!=''){
				
	
					$FullName = $this->input->post('FullName');
					$EmailAddress = $this->input->post('EmailAddress');
					$ContactNumber = $this->input->post('ContactNumber');
					$City = $this->input->post('City');
					$MessageDescription = $this->input->post('MessageDescription');
						
					$email_template=$this->db->query("select * from ".$this->db->dbprefix('tblemail_template')." where task='Contact Inquiry'");
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
					$email_message=str_replace('{City}',$City,$email_message);
					$email_message=str_replace('{MessageDescription}',$MessageDescription,$email_message);
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
					$this->email->subject('User Inquiry');
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

	function getsitedetail()
	{	
		$this->db->select('*');
		$this->db->from('tblsitesetting');
		$query=$this->db->get();
		$res = $query->result();
		return $res;
	}


}
