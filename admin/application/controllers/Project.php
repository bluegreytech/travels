<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Project extends CI_Controller {

	public function __construct()
	{
      	parent::__construct();
		$this->load->model('project_model');
      
    }

	function Projectlist()
	{	
		if(!check_admin_authentication()){ 
			redirect(base_url());
		}else{	
			$data['activeTab']="Projectlist";		
			$data['result']=$this->project_model->getproject();
			$this->load->view('Project/ProjectList',$data);
		}
	}

	public function Projectadd()
	{      
		if(!check_admin_authentication()){ 
			redirect(base_url());
		}   
			
			$data=array();	
			$this->load->library("form_validation");
			$this->form_validation->set_rules('ProjectTitle', 'project title', 'required');			
			$this->form_validation->set_rules('Projectsdesc', 'Project Short Description', 'required');
			$this->form_validation->set_rules('IsActive', 'IsActive', 'required');
		
			if($this->form_validation->run() == FALSE){			
			if(validation_errors())
			{
				$data["error"] = validation_errors();
				//echo "<pre>";print_r($data["error"]);die;
			}else{
				$data["error"] = "";
			}
         		$data['redirect_page']='projectlist';
				$data['ProjectId']=$this->input->post('ProjectId');
				$data['ProjectTitle']=$this->input->post('ProjectTitle');
				$data['Projectsdesc']=$this->input->post('Projectsdesc');
				$data['Projectldesc']=$this->input->post('Projectldesc');
				$data['Project_lat']=$this->input->post('project_lat');
				$data['Project_long']=$this->input->post('project_long');				
				$data['ProjectImage']=$this->input->post('ProjectImage');
				$data['Projectlogo']=$this->input->post('Projectlogo');
				$data['ProjectStatus']=$this->input->post('ProjectStatus');
				$data['Project_brochure']=$this->input->post('Project_brochure');				
				$data['IsActive']=$this->input->post('IsActive');
			
			}
			else
			{
				if($this->input->post("ProjectId")!="")
			{
			//echo "fddgfd";die;	
				$this->project_model->project_update();
				$this->session->set_flashdata('success', 'Record has been Updated Succesfully!');
				redirect('project/projectList');
				
			}
			else
			{  //echo "<pre>";print_r($_FILES);die;
				$this->project_model->project_insert();
				$this->session->set_flashdata('success', 'Record has been Inserted Succesfully!');
				redirect('project/projectList');
			
			}
				
			}
			$data['activeTab']="Projectadd";	
			$this->load->view('Project/ProjectAdd',$data);
				
	}
	
	function Editproject($ProjectId){
		if(!check_admin_authentication()){ 
			redirect(base_url());
		}
			$data=array();
			$result=$this->project_model->getdata($ProjectId);	
			$data['redirect_page']='projectlist';
			$data['ProjectId']=$result['ProjectId'];
			$data['ProjectTitle']=$result['ProjectTitle'];	
			$data['Projectsdesc']=$result['Projectsdesc'];
			$data['Projectldesc']=$result['Projectldesc'];		
	      	$data['Project_lat']=$result['Project_lat'];
			$data['Project_long']=$result['Project_long'];
			$data['ProjectImage']=$result['ProjectImage'];	
			$data['Projectlogo']=$result['Projectlogo'];
			$data['Project_brochure']=$result['Project_brochure'];	
			$data['ProjectStatus']=$result['ProjectStatus'];
			$data['IsActive']=$result['IsActive'];
			$data['activeTab']="Editproject";	
			//echo "<pre>";print_r($data);die;		
			$this->load->view('Project/ProjectAdd',$data);	
		
	}

	function updatedata($ProjectId){
		if(!check_admin_authentication()){ 
			redirect(base_url());
		}else{
		$result=$this->Project_model->updatedata($ProjectId);	
    	if($result=='1'){
		  $this->session->set_flashdata('success', 'Record has been updated Succesfully!');
		 	redirect('Project/Projectlist');	
			}
			redirect('Project/Projectlist');
		}
	}

	function project_delete(){
		//echo "gfgfd" ;die;
		//echo $id=$this->input->post('id'); die;
		if(!check_admin_authentication()){ 
			redirect(base_url());
		}
			$data= array('Is_deleted' =>'1');
			$id=$this->input->post('id');
			$this->db->where("ProjectId",$id);			
			$res=$this->db->update('tblprojects',$data);
			//echo $this->db->last_query();die;
			echo json_encode($res);
			die;
		
	}

	function add_gallery(){
		if(!check_admin_authentication()){ 
			redirect(base_url());
		}   
			
			$data=array();	
			$this->load->library("form_validation");
			$this->form_validation->set_rules('project_id','project title','required');
			$this->form_validation->set_rules('IsActive', 'IsActive', 'required');
		
		if($this->form_validation->run() == FALSE){			
			if(validation_errors())
			{
				$data["error"] = validation_errors();
				//echo "<pre>";print_r($data["error"]);die;
			}else{
				$data["error"] = "";
			}
         		$data['redirect_page']='list_gallery';
				$data['project_id']=$this->input->post('project_id');
				$data['GalleryId']=$this->input->post('GalleryId');							
				$data['GalleryImage']=$this->input->post('GalleryImage');
				$data['IsActive']=$this->input->post('IsActive');
			
			}
			else
			{
				if($this->input->post("GalleryId")!="")
				{
							
					$this->project_model->gallery_update();
					$this->session->set_flashdata('success', 'Record has been Updated Succesfully!');
					redirect('project/list_gallery');
					
				}
				else
				{  //echo "<pre>";print_r($_FILES);die;
					$this->project_model->gallery_insert();
					$this->session->set_flashdata('success', 'Record has been Inserted Succesfully!');
					redirect('project/list_gallery');
				
				}
				
			}
			$data['activeTab']="add_gallery";	
			$data['projectlist']=$this->project_model->getproject();
			$this->load->view('Project/Add_gallery',$data);

	}

	function edit_gallery($gallery_id){
		if(!check_admin_authentication()){ 
			redirect(base_url());
		}
			$data=array();
			$result=$this->project_model->getgallerydata($gallery_id);
			$data['projectlist']=$this->project_model->getproject();
			//echo "<pre>";print_r($result);die;	
			$data['redirect_page']='list_gallery';
			$data['project_id']=$result['project_id'];
			$data['GalleryId']=$result['gallery_id'];

			$data['GalleryImage']=$result['gallery_image'];
			$data['IsActive']=$result['IsActive'];	
			$data['activeTab']="edit_gallery";	
			//echo "<pre>";print_r($data);die;		
			$this->load->view('Project/Add_gallery',$data);	

	}
	function gallery_delete(){
	
		if(!check_admin_authentication()){ 
			redirect(base_url());
		}
			if($this->input->post('gallery_image')!='')
			{
					if(file_exists(base_path().'upload/galleryimage/'.$this->input->post('gallery_image')))
					{
						$link=base_path().'upload/galleryimage/'.$this->input->post('gallery_image');
						unlink($link);
					}
			}
			$data= array('Is_deleted' =>'1');
			$id=$this->input->post('id');
			$this->db->where("gallery_id",$id);			
			$res=$this->db->update('tblgallery',$data);
			//echo $this->db->last_query();die;
			echo json_encode($res);
			die;
		
	}


	function list_gallery(){
		if(!check_admin_authentication()){ 
			redirect(base_url());
		}else{	
			$data['activeTab']="list_gallery";			
			$data['result']=$this->project_model->getgallery();
			$data['projectlist']=$this->project_model->getproject();
			$this->load->view('Project/List_gallery',$data);
		}
		
	}

	//Start plan & layout functions //
	function add_planlayout(){
		if(!check_admin_authentication()){ 
			redirect(base_url());
		}   
			
			$data=array();	
			$this->load->library("form_validation");
			$this->form_validation->set_rules('project_id','project title','required');
			$this->form_validation->set_rules('IsActive', 'IsActive', 'required');
		
		if($this->form_validation->run() == FALSE){			
			if(validation_errors())
			{
				$data["error"] = validation_errors();
				//echo "<pre>";print_r($data["error"]);die;
			}else{
				$data["error"] = "";
			}
         		$data['redirect_page']='list_planlayout';
				$data['project_id']=$this->input->post('project_id');
				$data['PlanlayoutId']=$this->input->post('PlanlayoutId');							
				$data['PlanlayoutImage']=$this->input->post('PlanlayoutImage');
				$data['IsActive']=$this->input->post('IsActive');
			
			}
			else
			{
				if($this->input->post("PlanlayoutId")!="")
				{
							
					$this->project_model->planlayout_update();
					$this->session->set_flashdata('success', 'Record has been Updated Succesfully!');
					redirect('project/list_planlayout');
					
				}
				else
				{  //echo "<pre>";print_r($_FILES);die;
					$this->project_model->planlayout_insert();
					$this->session->set_flashdata('success', 'Record has been Inserted Succesfully!');
					redirect('project/list_planlayout');
				
				}
				
			}
			$data['activeTab']="add_planlayout";	
			$data['projectlist']=$this->project_model->getproject();
			$this->load->view('Project/Add_planlayout',$data);

	}

	function edit_planlayout($planlayout_id){
		if(!check_admin_authentication()){ 
			redirect(base_url());
		}
			$data=array();
			$result=$this->project_model->getplanlayoutdata($planlayout_id);
			$data['projectlist']=$this->project_model->getproject();
			//echo "<pre>";print_r($result);die;	
			$data['redirect_page']='list_planlayout';
			$data['project_id']=$result['project_id'];
			$data['PlanlayoutId']=$result['planlayout_id'];
			$data['PlanlayoutImage']=$result['planlayout_image'];
			$data['IsActive']=$result['IsActive'];	
			$data['activeTab']="edit_planlayout";	
			//echo "<pre>";print_r($data);die;		
			$this->load->view('Project/Add_planlayout',$data);	

	}

	function planlayout_delete(){
	
		if(!check_admin_authentication()){ 
			redirect(base_url());
		}
			if($this->input->post('planlayout_image')!='')
			{
					if(file_exists(base_path().'upload/planlayoutimage/'.$this->input->post('planlayout_image')))
					{
						$link=base_path().'upload/planlayoutimage/'.$this->input->post('planlayout_image');
						unlink($link);
					}
			}
			$data= array('Is_deleted' =>'1');
			$id=$this->input->post('id');
			$this->db->where("planlayout_id",$id);			
			$res=$this->db->update('tblplanlayout',$data);
			//echo $this->db->last_query();die;
			echo json_encode($res);
			die;
		
	}


	function list_planlayout(){
		if(!check_admin_authentication()){ 
			redirect(base_url());
		}else{	
			$data['activeTab']="list_planlayout";		
			$data['result']=$this->project_model->getplanlayout();
			$data['projectlist']=$this->project_model->getproject();
			$this->load->view('Project/List_planlayout',$data);
		}
		
	}

	//End plan & layout functions // 
    //Start project amenities function //
	function add_amenities(){
		if(!check_admin_authentication()){ 
			redirect(base_url());
		}   
			
			$data=array();	
			$this->load->library("form_validation");
			$this->form_validation->set_rules('project_id','project title','required');
			$this->form_validation->set_rules('IsActive', 'IsActive', 'required');
		
		if($this->form_validation->run() == FALSE){			
			if(validation_errors())
			{
				$data["error"] = validation_errors();
				//echo "<pre>";print_r($data["error"]);die;
			}else{
				$data["error"] = "";
			}
         		$data['redirect_page']='list_amenities';
				$data['project_id']=$this->input->post('project_id');
				$data['AmenitiesId']=$this->input->post('AmenitiesId');
				$data['AmenitiesTitle']=$this->input->post('amenitiestitle');
				$data['AmenitiesDesc']=$this->input->post('amenitiesdesc');
				$data['LogoImages']=$this->input->post('LogoImages');
				$data['IsActive']=$this->input->post('IsActive');
			
			}
			else
			{
				if($this->input->post("AmenitiesId")!="")
				{		
					$this->project_model->amenities_update();
					$this->session->set_flashdata('success', 'Record has been Updated Succesfully!');
					redirect('project/list_amenities');
				}
				else
				{  
					//echo "<pre>";print_r($_FILES);die;
					$this->project_model->amenities_insert();
					$this->session->set_flashdata('success', 'Record has been Inserted Succesfully!');
					redirect('project/list_amenities');
				}
				
			}
			$data['activeTab']="add_amenities";	
			$data['projectlist']=$this->project_model->getproject();
			$this->load->view('Project/Add_amenities',$data);

	}

	function edit_amenities($amenities_id){
		if(!check_admin_authentication()){ 
			redirect(base_url());
		}
			$data=array();
			$data['activeTab']="edit_amenities";
			$result=$this->project_model->getamenitiesdata($amenities_id);
			$data['projectlist']=$this->project_model->getproject();
			//echo "<pre>";print_r($result);die;	
			$data['redirect_page']='list_amenities';
			$data['project_id']=$result['project_id'];
			$data['AmenitiesId']=$result['amenities_id'];
			$data['AmenitiesTitle']=$result['amenitiestitle'];
			$data['AmenitiesDesc']=$result['amenitiesdesc'];
			$data['LogoImages']=$result['logo_image'];
			$data['IsActive']=$result['IsActive'];	
			//echo "<pre>";print_r($data);die;		
			$this->load->view('Project/Add_amenities',$data);	

	}

	function amenities_delete(){
	
		if(!check_admin_authentication()){ 
			redirect(base_url());
		}
			if($this->input->post('logo_image')!='')
			{
				if(file_exists(base_path().'upload/projectlogo/'.$this->input->post('logo_image')))
				{
					$link=base_path().'upload/projectlogo/'.$this->input->post('logo_image');
					unlink($link);
				}
			}
			$data= array('Is_deleted' =>'1');
			$id=$this->input->post('id');
			$this->db->where("specification_id",$id);			
			$res=$this->db->update('tblspecification',$data);
			echo $this->db->last_query();die;
			echo json_encode($res);
			die;
		
	}

	function list_amenities(){
		if(!check_admin_authentication()){ 
			redirect(base_url());
		}else{
			$data['activeTab']="list_amenities";		
			$data['result']=$this->project_model->getamenities();
			$data['projectlist']=$this->project_model->getproject();
			$this->load->view('Project/List_amenities',$data);
		}
		
	}
   //End project specification function //

   //Start project specification function //
	function add_specification(){
		if(!check_admin_authentication()){ 
			redirect(base_url());
		}   
			
			$data=array();	
			$this->load->library("form_validation");
			$this->form_validation->set_rules('project_id','project title','required');
			$this->form_validation->set_rules('IsActive', 'IsActive', 'required');
		
		if($this->form_validation->run() == FALSE){			
			if(validation_errors())
			{
				$data["error"] = validation_errors();
				//echo "<pre>";print_r($data["error"]);die;
			}else{
				$data["error"] = "";
			}
         		$data['redirect_page']='list_specification';
				$data['project_id']=$this->input->post('project_id');
				$data['SpecificationId']=$this->input->post('SpecificationId');
				$data['SpecificationTitle']=$this->input->post('spectitle');
				$data['SpecificationDesc']=$this->input->post('specdesc');
				$data['LogoImages']=$this->input->post('LogoImages');
				$data['IsActive']=$this->input->post('IsActive');
			
			}
			else
			{
				if($this->input->post("SpecificationId")!="")
				{		
					$this->project_model->specification_update();
					$this->session->set_flashdata('success', 'Record has been Updated Succesfully!');
					redirect('project/list_specification');
				}
				else
				{  
					//echo "<pre>";print_r($_FILES);die;
					$this->project_model->specification_insert();
					$this->session->set_flashdata('success', 'Record has been Inserted Succesfully!');
					redirect('project/list_specification');
				}
				
			}
			$data['activeTab']="add_specification";	
			$data['projectlist']=$this->project_model->getproject();
			$this->load->view('Project/Add_specification',$data);

	}

	function edit_specification($specification_id){
		if(!check_admin_authentication()){ 
			redirect(base_url());
		}
			$data=array();
			$data['activeTab']="edit_specification";
			$result=$this->project_model->getspecificationdata($specification_id);
			$data['projectlist']=$this->project_model->getproject();
			//echo "<pre>";print_r($result);die;	
			$data['redirect_page']='list_gallery';
			$data['project_id']=$result['project_id'];
			$data['SpecificationId']=$result['specification_id'];
			$data['SpecificationTitle']=$result['spectitle'];
			$data['SpecificationDesc']=$result['specdesc'];
			$data['LogoImages']=$result['logo_image'];
			$data['IsActive']=$result['IsActive'];	
			//echo "<pre>";print_r($data);die;		
			$this->load->view('Project/Add_specification',$data);	

	}

	function specification_delete(){
	
		if(!check_admin_authentication()){ 
			redirect(base_url());
		}
			if($this->input->post('logo_image')!='')
			{
				if(file_exists(base_path().'upload/projectlogo/'.$this->input->post('logo_image')))
				{
					$link=base_path().'upload/projectlogo/'.$this->input->post('logo_image');
					unlink($link);
				}
			}
			$data= array('Is_deleted' =>'1');
			$id=$this->input->post('id');
			$this->db->where("specification_id",$id);			
			$res=$this->db->update('tblspecification',$data);
			echo $this->db->last_query();die;
			echo json_encode($res);
			die;
		
	}

	function list_specification(){
		if(!check_admin_authentication()){ 
			redirect(base_url());
		}else{
			$data['activeTab']="list_specification";		
			$data['result']=$this->project_model->getspecification();
			$data['projectlist']=$this->project_model->getproject();
			$this->load->view('Project/List_specification',$data);
		}
		
	}
   //End project specification function //     


  ///Start Project slider image///

	function add_projectslider(){
		if(!check_admin_authentication()){ 
			redirect(base_url());
		}   
			
			$data=array();	
			$data['activeTab']="add_projectslider";
			$this->load->library("form_validation");
			$this->form_validation->set_rules('project_id','project title','required');
			$this->form_validation->set_rules('IsActive', 'IsActive', 'required');
		
		if($this->form_validation->run() == FALSE){			
			if(validation_errors())
			{
				$data["error"] = validation_errors();
				//echo "<pre>";print_r($data["error"]);die;
			}else{
				$data["error"] = "";
			}
         		$data['redirect_page']='list_projectslider';
				$data['project_id']=$this->input->post('project_id');
				$data['projectslider_id']=$this->input->post('projectslider_id');				
				$data['projectslider_img']=$this->input->post('projectslider_img');
				$data['IsActive']=$this->input->post('IsActive');
			
			}
			else
			{
				if($this->input->post("projectslider_id")!="")
				{
					//echo "jhjhg";die;		
					$this->project_model->projectslider_update();
					$this->session->set_flashdata('success', 'Record has been Updated Succesfully!');
					redirect('project/list_projectslider');
					
				}
				else
				{  //echo "<pre>";print_r($_FILES);die;
					$this->project_model->projectslider_insert();
					$this->session->set_flashdata('success', 'Record has been Inserted Succesfully!');
					redirect('project/list_projectslider');
				
				}
				
			}
			$data['projectlist']=$this->project_model->getproject();
			$this->load->view('Project/Add_projectslider',$data);

	}

	function edit_projectslider($projectslider_id){
		if(!check_admin_authentication()){ 
			redirect(base_url());
		}
			$data=array();
			$data['activeTab']="edit_projectslider";
			$result=$this->project_model->getprojectsliderdata($projectslider_id);
			$data['projectlist']=$this->project_model->getproject();
			//echo "<pre>";print_r($result);die;	
			$data['redirect_page']='list_projectslider';
			$data['projectslider_id']=$result['projectslider_id'];
			$data['project_id']=$result['project_id'];

			$data['projectslider_img']=$result['projectslider_img'];
			$data['IsActive']=$result['IsActive'];	
			//echo "<pre>";print_r($data);die;		
			$this->load->view('Project/Add_projectslider',$data);	

	}
	function projectslider_delete(){
	
		if(!check_admin_authentication()){ 
			redirect(base_url());
		}
			if($this->input->post('projectslider_image')!='')
			{
					if(file_exists(base_path().'upload/projectimage/'.$this->input->post('projectslider_image')))
					{
						$link=base_path().'upload/projectimage/'.$this->input->post('projectslider_image');
						unlink($link);
					}
			}
			$data= array('Is_deleted' =>'1');
			$id=$this->input->post('id');
			$this->db->where("projectslider_id",$id);			
			$res=$this->db->update(' tblproject_slider',$data);
			//echo $this->db->last_query();die;
			echo json_encode($res);
			die;
		
	}


	function list_projectslider(){
		if(!check_admin_authentication()){ 
			redirect(base_url());
		}else{	
			$data['activeTab']="list_projectslider";
			$data['result']=$this->project_model->getprojectslider();
			$data['projectlist']=$this->project_model->getproject();
			$this->load->view('Project/List_projectslider',$data);
		}
		
	}
}
