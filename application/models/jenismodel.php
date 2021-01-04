<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jenismodel extends CI_Model{

	private $jenis = "jenis_dok_bidang";
	var $select_column = array("id_jenis","jenis",	"status",	"created",	"updated");
	var $order_column = array("id_jenis","jenis",	"status",	"created",	"updated");
	
	public function save($data=null)
	{
		$dataitem=array('jenis'=>$data['jenis'],'status'=>$data['status']);	
		$result=$this->db->insert($this->jenis,$dataitem);
		if($result){
			return $ares = array('status' =>1,'pesan'=>'data jenis dokumen untuk bidang berhasil ditambahkan');
		}else{			
			return $ares = array('status' =>0,'pesan'=>'data jenis dokumen untuk bidang gagal ditambahkan');
		}
	}


	public function getAll()
	{
		$this->db->order_by('id_jenis','desc');
		$data=$this->db->get($this->jenis);
		return $data->result();		
	}

	public function get($id='')
	{
		$data=$this->db->get_where($this->jenis,['id_jenis'=>$id],1);
		if($data){
				return $ares = array('status' => 1, 'pesan' => 'data jenis dokumen untuk bidang ditemukan','data'=>$data->row());
		}else{
			return $ares = array('status' => 0, 'pesan' => 'data jenis dokumen untuk bidang tidak ditemukan','data'=>null);
		}
	}

	public function update($data=null)
	{
		$dataUpdate=array('jenis'=>$data['edit_jenis'],'status'=>$data['edit_status']);
		$this->db->where('id_jenis',$data['edit_id_jenis']);
		$result=$this->db->update($this->jenis, $dataUpdate);
		if($result) {
				return $ares = array('status' => 1, 'pesan' => 'data jenis dokumen untuk bidang berhasil diupdate');
		} else {
				return $ares = array('status' => 0, 'pesan' => 'data jenis dokumen untuk bidang gagal diupdate');
		}
	}

	public function delete($id='')
	{
		$this->db->where('id_jenis', $id);
		$result=$this->db->delete($this->jenis);
		if($result) {
			return $ares = array('status' => 1, 'pesan' => 'data jenis dokumen untuk bidang berhasil dihapus');
		} else {
			return $ares = array('status' => 0, 'pesan' => 'data jenis dokumen untuk bidang gagal dihapus');
		}		
	}

	public function getJenis()
	{
		return $this->db->get_where($this->jenis,['status'=>'active'])->result();
	}

}
