<?php

class Slider_model extends CI_Model
 {
	function slider_insert()
	{	
		$slider_image='';
		if(isset($_FILES['SliderImage']) &&  $_FILES['SliderImage']['name']!='')
		{
			$this->load->library('upload');
			$rand=rand(0,100000); 
			 
		   $_FILES['userfile']['name']     =   $_FILES['SliderImage']['name'];
		   $_FILES['userfile']['type']     =   $_FILES['SliderImage']['type'];
		   $_FILES['userfile']['tmp_name'] =   $_FILES['SliderImage']['tmp_name'];
		   $_FILES['userfile']['error']    =   $_FILES['SliderImage']['error'];
		   $_FILES['userfile']['size']     =   $_FILES['SliderImage']['size'];
  
		   $config['file_name'] = $rand.'Slider';			
		   $config['upload_path'] = base_path().'upload/slider_orig/';		
		   $config['allowed_types'] = 'jpg|jpeg|gif|png|bmp';  

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
			   'source_image' => base_path().'upload/slider_orig/'.$picture['file_name'],
			   'new_image' => base_path().'upload/sliderimages/'.$picture['file_name'],
			   'maintain_ratio' => FALSE,
			   'quality' => '100%',
			   'width' => 1350,
			   'height' => 550
			));
		   
		   
		   if(!$this->image_lib->resize())
		   {
			   $error = $this->image_lib->display_errors();
		   }
		   
		   $slider_image=$picture['file_name'];
			   if($this->input->post('pre_slider')!='')
			   {
					   if(file_exists(base_path().'upload/sliderimages/'.$this->input->post('pre_slider')))
					   {
						   $link=base_path().'upload/sliderimages/'.$this->input->post('pre_slider');
						   unlink($link);
					   }
					   
					   if(file_exists(base_path().'upload/slider_orig/'.$this->input->post('pre_slider')))
					   {
						   $link2=base_path().'upload/slider_orig/'.$this->input->post('pre_slider');
						   unlink($link2);
					   }
				}
		   } else {
			   if($this->input->post('pre_slider')!='')
			   {
				   $slider_image=$this->input->post('pre_slider');
			   }
		   }

            $data = array(
			'SliderTitle'=>trim($this->input->post('SliderTitle')),	
			'SliderImage'=>$slider_image,			
			'IsActive' =>$this->input->post('IsActive'),			
			'CreatedOn'=>date('Y-m-d')		
			);
		    //echo "<pre>";print_r($data);die;	
                    
            $res=$this->db->insert('tblslider',$data);	
			return $res;
	}

	function getsliderlist(){
		$this->db->select('*');
		$this->db->from('tblslider');
		$this->db->where('IsDelete','0');
		$this->db->order_by('SliderId','desc');
		$query=$this->db->get();
		$res = $query->result();
		return $res;

	}
	

	function getdata($SliderId){
		$this->db->select("*");
		$this->db->from("tblslider");
		$this->db->where("IsDelete",'0');
		$this->db->where("SliderId",$SliderId);
	    $this->db->order_by('SliderId','desc');
		$query=$this->db->get();
		return $query->row_array();
	}

	function slider_update(){
		
		  	$SliderId=$this->input->post('SliderId');
			$slider_image='';
		if(isset($_FILES['SliderImage']) &&  $_FILES['SliderImage']['name']!='')
		{
			$this->load->library('upload');
			$rand=rand(0,100000); 
			 
		   $_FILES['userfile']['name']     =   $_FILES['SliderImage']['name'];
		   $_FILES['userfile']['type']     =   $_FILES['SliderImage']['type'];
		   $_FILES['userfile']['tmp_name'] =   $_FILES['SliderImage']['tmp_name'];
		   $_FILES['userfile']['error']    =   $_FILES['SliderImage']['error'];
		   $_FILES['userfile']['size']     =   $_FILES['SliderImage']['size'];
  
		   $config['file_name'] = $rand.'Slider';			
		   $config['upload_path'] = base_path().'upload/slider_orig/';		
		   $config['allowed_types'] = 'jpg|jpeg|gif|png|bmp';  

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
			   'source_image' => base_path().'upload/slider_orig/'.$picture['file_name'],
			   'new_image' => base_path().'upload/sliderimages/'.$picture['file_name'],
			   'maintain_ratio' => FALSE,
			   'quality' => '100%',
			   'width' => 1350,
			   'height' => 550
			));
		   
		   
		   if(!$this->image_lib->resize())
		   {
			   $error = $this->image_lib->display_errors();
		   }
		   
		   $slider_image=$picture['file_name'];
			   if($this->input->post('pre_slider')!='')
			   {
					   if(file_exists(base_path().'upload/sliderimages/'.$this->input->post('pre_slider')))
					   {
						   $link=base_path().'upload/sliderimages/'.$this->input->post('pre_slider');
						   unlink($link);
					   }
					   
					   if(file_exists(base_path().'upload/slider_orig/'.$this->input->post('pre_slider')))
					   {
						   $link2=base_path().'upload/slider_orig/'.$this->input->post('pre_slider');
						   unlink($link2);
					   }
				}
		   } else {
			   if($this->input->post('pre_slider')!='')
			   {
				   $slider_image=$this->input->post('pre_slider');
			   }
		    }
		  	
            $data = array(
			'SliderTitle' =>trim($this->input->post('SliderTitle')),	
			'SliderImage'=>$slider_image,		
			'IsActive' => $this->input->post('IsActive'),		
			'UpdatedOn'=>date('Y-m-d')		
			); 
			//print_r($data);die;
			$this->db->where("SliderId",$SliderId);
			$res=$this->db->update('tblslider',$data);		
			return $res;
	}

	
}
