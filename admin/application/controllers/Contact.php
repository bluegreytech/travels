<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {

	public function __construct()
	{
      	parent::__construct();
		$this->load->model('Contact_model');
      
    }

	function Contactlist()
	{	
		if(!check_admin_authentication()){ 
			redirect(base_url());
		}else{	
			$data['activeTab']="contactlist";		
			$data['result']=$this->Contact_model->getcontact();
			$this->load->view('contact/contactlist',$data);
		}
	}
	

	function contact_delete(){
		if(!check_admin_authentication()){ 
			redirect(base_url());
		}
			$data= array('IsDelete' =>'1');
			$ContactId=$this->input->post('ContactId');
			$this->db->where("ContactId",$ContactId);			
			$res=$this->db->update('tblcontactus',$data);
			//echo $this->db->last_query();die;
			echo json_encode($res);
			die;
		
	}
	
	
}
