<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class about extends CI_Controller {
	public function __construct()
	{
	parent::__construct();
	isLogin();	
	}

	public function index()
	{
	$data['isDatatable']=true;
	$data['isSelect2']=true;
	$data['title']='tentang siidola';
	$data['js']=base_url('assets/custom/Custominformasi.js');
	$this->load->view('About',$data);		
	}
}

/* End of file about.php */
