<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class DashboardModel extends CI_Model {
	private $_t_periode_pelaporan='a_periode_pelaporan';
	private $_t_document_upload='document_upload';
	public function getCountdraft()
	{
		$a_where=array('status_dokumen'=>1);
		$this->db->select('count(*) as jumlah_draft');
		$this->db->from($this->_t_document_upload);
		$this->db->where($a_where);
		$result=$this->db->get()->row();
		return $result;
	}
	
	

}

/* End of file WelcomeModel.php */
