<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ItemModel extends CI_Model{

	private $master_item = "master_item";
	var $select_column = array("ID","namaitem",	"nama_kategori",	"keterangan",	"tglberlaku",	"status");
	var $order_column = array("namaitem",	"nama_kategori",	"keterangan",	"tglberlaku",	"status");

	public function saveItemModel($data=null)
	{
		$dataitem=array('namaitem'=>$data['namaitem'],'nama_kategori'=>$data['jenis'],'keterangan'=>$data['keterangan'],'TglBerlaku'=>$data['TglBerlaku'],'status'=>$data['status']);	
		$result=$this->db->insert($this->master_item,$dataitem);
		if($result){
			return $ares = array('status' =>1,'pesan'=>'data item berhasil ditambahkan');
		}else{			
			return $ares = array('status' =>0,'pesan'=>'data item gagal ditambahkan');
		}
	}

	public function getItemModel($id='')
	{
	$data=$this->db->get_where($this->master_item,['ID'=>$id],1);
	if($data){
			return $ares = array('status' => 1, 'pesan' => 'data item ditemukan','data'=>$data->row());
	}else{
		return $ares = array('status' => 0, 'pesan' => 'data item tidak ditemukan','data'=>null);
	}
	}

	public function UpdateItemModel($data=null)
	{
		$dataUpdate=array('nama_kategori'=>$data['edit_jenis'],'namaitem'=>$data['edit_namaitem'],'keterangan'=>$data['edit_keterangan'],'status'=>$data['edit_status'],'TglBerlaku'=>$data['edit_TglBerlaku']);
		$this->db->where('ID',$data['edit_ID']);
		$result=$this->db->update($this->master_item, $dataUpdate);
		if($result) {
				return $ares = array('status' => 1, 'pesan' => 'data item berhasil diupdate');
		} else {
				return $ares = array('status' => 0, 'pesan' => 'data item gagal diupdate');
		}
	}

	public function deleteItemModel($id='')
	{
		$this->db->where('ID', $id);
		$result=$this->db->delete($this->master_item);
		if($result) {
			return $ares = array('status' => 1, 'pesan' => 'data item berhasil dihapus');
		} else {
			return $ares = array('status' => 0, 'pesan' => 'data item gagal dihapus');
		}		
	}

	public function make_query()
	{
		$this->db->select($this->select_column);
		$this->db->from($this->master_item);
		if (isset($_POST['search']['value'])) {
			$this->db->like('namaitem', $_POST['search']['value']);
			$this->db->or_like('nama_kategori', $_POST['search']['value']);
		}
			if (isset($_POST['order'])) {
			$this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else {
			$this->db->order_by('id', 'Desc');
		}
	}
	

	public function make_datatable()
	{
		$this->make_query();
		if ($_POST['length'] != -1) {
			$this->db->limit($_POST['length'], $_POST['start']);
		}	
		$query = $this->db->get();
		return $query->result();
	}

	public function get_filtered_data()
	{
		$this->make_query();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function getallcount()
	{
		return $this->db->get($this->master_item)->num_rows();
	}

}
