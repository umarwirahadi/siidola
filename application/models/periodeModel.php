<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PeriodeModel extends CI_Model{

	private $ms_tahun_laporan = "ms_tahun_laporan";
	var $select_column = array("id","tahun",	"isselected","status",	"created",	"updated");
	var $order_column = array("id","tahun",	"isselected","status",	"created",	"updated");
	
	public function save($data=null)
	{
		$dataitem=array('tahun'=>$data['tahun'],'status'=>$data['status'],'isselected'=>$data['isselected']);	
		$result=$this->db->insert($this->ms_tahun_laporan,$dataitem);
		if($result){
			return $ares = array('status' =>1,'pesan'=>'data tahun dokumen untuk bidang berhasil ditambahkan');
		}else{			
			return $ares = array('status' =>0,'pesan'=>'data tahun dokumen untuk bidang gagal ditambahkan');
		}
	}


	public function getAll()
	{
		$this->db->order_by('id','desc');
		$data=$this->db->get($this->ms_tahun_laporan);
		return $data->result();		
	}

	public function get($id='')
	{
		$data=$this->db->get_where($this->ms_tahun_laporan,['id'=>$id],1);
		if($data){
				return $ares = array('status' => 1, 'pesan' => 'data periode laporan  dokumen untuk bidang ditemukan','data'=>$data->row());
		}else{
			return $ares = array('status' => 0, 'pesan' => 'data periode laporan dokumen untuk bidang tidak ditemukan','data'=>null);
		}
	}

	public function update($data=null)
	{
		$dataUpdate=array('tahun'=>$data['edit_tahun'],'status'=>$data['edit_status'],'isselected'=>$data['edit_isselected']);
		$this->db->where('id',$data['edit_id']);
		$result=$this->db->update($this->ms_tahun_laporan, $dataUpdate);
		if($result) {
				return $ares = array('status' => 1, 'pesan' => 'data tahun laporan dokumen untuk bidang berhasil diupdate');
		} else {
				return $ares = array('status' => 0, 'pesan' => 'data tahun laporan dokumen untuk bidang gagal diupdate');
		}
	}

	public function delete($id='')
	{
		$this->db->where('id', $id);
		$result=$this->db->delete($this->ms_tahun_laporan);
		if($result) {
			return $ares = array('status' => 1, 'pesan' => 'data tahun laporan dokumen untuk bidang berhasil dihapus');
		} else {
			return $ares = array('status' => 0, 'pesan' => 'data tahun laporan dokumen untuk bidang gagal dihapus');
		}		
	}

	public function getJenis()
	{
		return $this->db->get_where($this->ms_tahun_laporan,['status'=>'active'])->result();
	}

}
