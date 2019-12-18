<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class routes extends CI_Controller 
{
	// public function __construct()
	// {
    //   	parent::__construct();
	// 	//$this->load->model('Login_model');

	// }

	public function index()
	{      	
		$this->load->view('routes/routes');			
	}

	
}
