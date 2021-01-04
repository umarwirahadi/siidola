<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Error extends CI_Controller {

	public function index()
	{
	$this->output->set_status_header('404'); 
	$this->load->view('Er404');
		
	}
}
/* End of file Error.php */
