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
        $res=$this->db->insert('tblcarrierinquiry',$data);	
		return $res;
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
