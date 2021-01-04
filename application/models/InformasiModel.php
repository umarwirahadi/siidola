<?php
defined('BASEPATH') or exit('No direct script access allowed');
class informasiModel extends CI_Model
{
	private $table='msinfo';
	var $selectColumn = array("id","judul",	"isi",	"status",	"created",	"updated",	"showmodal");
	var $orderColumn = array("judul",	"isi",	"status",	"created",	"showmodal");
	

	public function saveInformasi($data)
	{
		$datainfo=array('judul'=>$data['judul'],'isi'=>$data['isi'],'status'=>$data['status'],'showmodal'=>$data['showmodal']);	
		$result=$this->db->insert($this->table,$datainfo);
		if($result){
			return $ares = array('status' =>1,'pesan'=>'informasi berhasil ditambahkan');
		}else{			
			return $ares = array('status' =>0,'pesan'=>'informasi gagal ditambahkan');
		}
	}

	public function getbyID($id='')
	{
	$data=$this->db->get_where($this->table,['id'=>$id]);
	if($data){
		return $ares = array('status' => 1, 'pesan' => 'data item ditemukan','data'=>$data->row());
	}else{
		return $ares = array('status' => 0, 'pesan' => 'data item tidak ditemukan','data'=>null);
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
		return $this->db->get($this->table)->num_rows();
	}
	
	public function make_query()
	{
		$this->db->select($this->selectColumn);
		$this->db->from($this->table);
		if (isset($_POST['search']['value'])) {
			$this->db->like('judul', $_POST['search']['value']);
			$this->db->or_like('status', $_POST['search']['value']);
		}
		
		if (isset($_POST['order'])) {
			$this->db->order_by($this->orderColumn[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else {
			$this->db->order_by('id', 'Desc');
		}
	}
}
/* End of file informasiModel.php */
