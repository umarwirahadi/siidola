<?php
defined('BASEPATH') or exit('No direct script access allowed');
class LaporanbidangModel extends CI_Model
{

	private $t1 = 'document_upload_bidang';
	private $_t1 = 'v_document_bidang';
	private $t2 = 'document_table_bidang';
	
	var $_t1_select_column = array("id","id_document",	"id_jenis","jenis",	"bulan","nama_bulan",	"tahun",	"status_dokumen",	"nama_status",	"keterangan",	"id_intansi",	"nama_intansi", "jenis_intansi", "user_id", "created", "updated");
	var $_t1_order_column = array("id","id_document",	"id_jenis","jenis",	"bulan","nama_bulan",	"tahun",	"status_dokumen",	"nama_status",	"keterangan",	"id_intansi",	"nama_intansi", "jenis_intansi", "user_id", "created", "updated");
	
	
	public function getDetailBerkas($arData)
	{
		$result = $this->db->get_where($this->t2, array('id_document' => $arData));
		if ($result) {
			return $ares = array('status' => 1, 'data' => $result->result(), 'pesan' => 'data file ditemukan');			
		} else {
			return $ares = array('status' => 0, 'pesan' => 'data file tidak ditemukan','data'=>null);
		}
	}


	// load for datatable 
	public function make_query_laporan_disetujui()
	{
		// $user_id	=$this->session->userdata('user_id');
		$jenis_user 	=$this->session->userdata('jenis');

		if($jenis_user=='PUSKESMAS'){
			$id_pkm 	=$this->session->userdata('id_puskesmas');
			$this->db->select($this->_t1_select_column);
			$this->db->from($this->_t1);				
			if (isset($_POST['search']['value'])) {
				$this->db->where('id_puskesmas',$id_pkm);
				$this->db->where('status_dokumen',3);
				$this->db->group_start();
				$this->db->like('jenis', $_POST['search']['value']);
				$this->db->or_like('bulan', $_POST['search']['value']);
				$this->db->or_like('nama_bulan', $_POST['search']['value']);
				$this->db->or_like('tahun', $_POST['search']['value']);
				$this->db->or_like('keterangan', $_POST['search']['value']);
				$this->db->or_like('nama_intansi', $_POST['search']['value']);
				$this->db->or_like('nama_status', $_POST['search']['value']);
				$this->db->group_end();
			}
		}elseif($jenis_user=='DINAS KESEHATAN'){
			$this->db->select($this->_t1_select_column);
			$this->db->from($this->_t1);				
			if (isset($_POST['search']['value'])) {
				$this->db->where('status_dokumen',3);
				$this->db->group_start();
				$this->db->like('jenis', $_POST['search']['value']);
				$this->db->or_like('nama_bulan', $_POST['search']['value']);
				$this->db->or_like('tahun', $_POST['search']['value']);
				$this->db->or_like('keterangan', $_POST['search']['value']);
				$this->db->or_like('nama_intansi', $_POST['search']['value']);
				$this->db->or_like('nama_status', $_POST['search']['value']);
				$this->db->group_end();
			}

				// Jika mau menggunakan filter untuk dinas
				if (isset($_POST['filter_tahun'], $_POST['filter_bulan'], $_POST['filter_dokumen'],$_POST['filter_status_dokumen'])) {
					if ($_POST['filter_tahun'] != null && $_POST['filter_bulan'] == null && $_POST['filter_dokumen'] == null && $_POST['filter_status_dokumen'] == null) {
						$this->db->where('tahun', $_POST['filter_tahun']);
					} elseif ($_POST['filter_tahun'] != null && $_POST['filter_bulan'] != null && $_POST['filter_dokumen'] == null && $_POST['filter_status_dokumen'] == null) {
						$this->db->where('tahun', $_POST['filter_tahun']);
						$this->db->where('bulan', $_POST['filter_bulan']);
					} elseif ($_POST['filter_tahun'] != null && $_POST['filter_bulan'] != null && $_POST['filter_dokumen'] != null && $_POST['filter_status_dokumen'] == null) {
						$this->db->where('tahun', $_POST['filter_tahun']);
						$this->db->where('bulan', $_POST['filter_bulan']);
						$this->db->where('jenis', $_POST['filter_dokumen']);
					}elseif ($_POST['filter_tahun'] != null && $_POST['filter_bulan'] != null && $_POST['filter_dokumen'] != null && $_POST['filter_status_dokumen'] != null) {
						$this->db->where('tahun', $_POST['filter_tahun']);
						$this->db->where('bulan', $_POST['filter_bulan']);
						$this->db->where('jenis', $_POST['filter_dokumen']);
						$this->db->where('id_intansi', $_POST['filter_status_dokumen']);
					}
				}
				
				if (isset($_POST['filter_tahun'], $_POST['filter_bulan'], $_POST['filter_dokumen'],$_POST['filter_status_dokumen'])) {            
					if ($_POST['filter_tahun'] != null) {
						$this->db->where('tahun', $_POST['filter_tahun']);
					}
					if ($_POST['filter_bulan'] != null) {
						$this->db->where('bulan', $_POST['filter_bulan']);
					}
					if ($_POST['filter_dokumen'] != null) {
						$this->db->where('id_jenis', $_POST['filter_dokumen']);
					}
					if ($_POST['filter_status_dokumen'] != null) {
						$this->db->where('id_intansi', $_POST['filter_status_dokumen']);
					}
				}

		}
				

		if (isset($_POST['order'])) {
			$this->db->order_by($this->_t1_order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else {
			$this->db->order_by('updated', 'Desc');
		}
	}

	public function make_datatable_laporan()
	{
		$this->make_query_laporan_disetujui();
		if ($_POST['length'] != -1) {
			$this->db->limit($_POST['length'], $_POST['start']);
		}
		$query = $this->db->get();
		return $query->result();
	}

	public function get_filtered_data()
	{
		$this->make_query_laporan_disetujui();

		$query = $this->db->get();
		return $query->num_rows();
	}

	public function getallcount()
	{
		$jenis_user 	=$this->session->userdata('jenis');
		if($jenis_user=='PUSKESMAS'){
			$id_pkm 	=$this->session->userdata('id_puskesmas');
			$this->db->where('id_puskesmas', $id_pkm);		
			$this->db->where('status_dokumen', 3);		
		}elseif($jenis_user=='DINAS KESEHATAN'){
			$this->db->where('status_dokumen', 3);		
		}
		return $this->db->get($this->_t1)->num_rows();
	}

}
