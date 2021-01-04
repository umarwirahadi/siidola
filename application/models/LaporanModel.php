<?php
defined('BASEPATH') or exit('No direct script access allowed');
class LaporanModel extends CI_Model
{

	private $t1 = 'document_upload';
	private $_t1 = 'v_document_upload';
	private $t2 = 'document_table';
	private $t4 = 'dk_kategori';

	var $_t1_select_column = array("id","id_document",	"document_name",	"id_kategori",	"nama_kategori",	"nama_kelompok",	"duedate",	"status_duedate",	"status_dudate2",	"bulan", "tahun", "status_dokumen", "keterangan", "user_id", "tgl_upload", "created", "updated","status_dokumen2","id_puskesmas","nama_puskesmas","tanggapan","nama_bulan");
	var $_t1_order_column = array("document_name",	"nama_kategori",	"nama_kelompok",	"duedate",	"status_duedate",	"status_dudate2",	"bulan", "tahun", "status_dokumen", "keterangan", "tgl_upload","status_dokumen2");


	public function show($iduser = '')
	{
		$data = $this->db->get_where($this->_t1, ['status_dokumen' => 1, 'user_id' => $iduser]);
		if ($data->num_rows() >= 1) {
			return $data->result();
		} else {
			return false;
		}
	}



	public function showAjuan($iduser='')
	{
		$sql="SELECT * FROM v_document_upload WHERE status_dokumen !=? and user_id=? ORDER BY updated desc LIMIT 30";
		$data=$this->db->query($sql,array(1,$iduser));
		if ($data->num_rows() >= 1) {
			return $data->result();
		} else {
			return false;
		}
	}

	public function do_ajukan($id=null)
	{
		$aWhere1=array('id_document'=>$id['id_document']);
		$cekdata=$this->db->get_where($this->t2,$aWhere1);
		if($cekdata->num_rows()!=0){
			$aWhere2 = array('id' => $id['id']);
			$aData = array('status_dokumen' => 2);
			$this->db->where($aWhere2);
			$hasil = $this->db->update($this->t1, $aData);
			if ($hasil) {
				return $arrayName = array('pesan' => 'Proses pengiriman berkas ke Dinas kesehatan berhasil', 'status' => 1);
			} else {
				return $arrayName = array('pesan' => 'Proses pengiriman berkas ke Dinas kesehatan gagal', 'status' => 0);
			}
		}else{
			return $arrayName = array('pesan' => 'tidak ada file yang akan dilaporkan, periksa kembali draft ajuan', 'status' => 0);
		}		
	}

	public function getKat($id)
	{
		$sql = "SELECT dk_kategori.ID_KATEGORI,dk_kategori.NAMA_KATEGORI,dk_kategori.title,
    dk_kelompok.NAMA_KELOMPOK FROM dk_kategori INNER JOIN dk_kelompok ON
    dk_kategori.id_kelompok = dk_kelompok.ID_KELOMPOK WHERE dk_kategori.ID_KATEGORI=? LIMIT 1";
		return $this->db->query($sql, array($id))->row();
	}

	public function getDocName($id = '')
	{
		$sql = "SELECT dk_kategori.ID_KATEGORI,dk_kategori.NAMA_KATEGORI,dk_kelompok.NAMA_KELOMPOK FROM dk_kategori
    			INNER JOIN dk_kelompok ON dk_kategori.id_kelompok = dk_kelompok.ID_KELOMPOK WHERE dk_kategori.ID_KATEGORI=? LIMIT 1";
		return $this->db->query($sql, array($id))->row();
	}

	public function getbyID($id = '')
	{
		$result = $this->db->get_where($this->t1, ['id' => $id]);
		if ($result->num_rows() === 1) {
			return $ares = array('status' => 1, 'data' => $result->row(), 'pesan' => 'data ditemukan');
		} else {
			return $ares = array('status' => 0, 'pesan' => 'data tidak ditemukan');
		}
	}

	public function getFilebyID($id = '')
	{
		$result = $this->db->get_where($this->t2, ['id' => $id]);
		if ($result->num_rows() === 1) {
			return $ares = array('status' => 1, 'data' => $result->row(), 'pesan' => 'data file ditemukan');
		} else {
			return $ares = array('status' => 0, 'pesan' => 'data file tidak ditemukan');
		}
	}

	public function getlastID()
	{
		$sql = "SELECT MAX(id) as id from document_upload LIMIT 1";
		$last = $this->db->query($sql)->row();
		if ($last->id === 1) {
			return 1;
		} else {
			return $last->id + 1;
		}
	}

	public function getDetailDocument($id = '')
	{
		$result = $this->db->get_where($this->_t1, ['id' => $id], 1);
		if ($result->num_rows() === 1) {
			return $ares = array('status' => 1, 'data' => $result->row(), 'pesan' => 'data ditemukan');
		} else {
			return $ares = array('status' => 0, 'pesan' => 'data tidak ditemukan','data'=>null);
		}
	}

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
				$this->db->like('document_name', $_POST['search']['value']);
				$this->db->or_like('NAMA_KELOMPOK', $_POST['search']['value']);
				$this->db->or_like('duedate', $_POST['search']['value']);
				$this->db->or_like('bulan', $_POST['search']['value']);
				$this->db->or_like('nama_bulan', $_POST['search']['value']);
				$this->db->or_like('tahun', $_POST['search']['value']);
				$this->db->or_like('keterangan', $_POST['search']['value']);
				$this->db->or_like('nama_puskesmas', $_POST['search']['value']);
				$this->db->or_like('status_dokumen2', $_POST['search']['value']);
				$this->db->group_end();
			}
		}elseif($jenis_user=='DINAS KESEHATAN'){
			$this->db->select($this->_t1_select_column);
			$this->db->from($this->_t1);				
			if (isset($_POST['search']['value'])) {
				$this->db->where('status_dokumen',3);
				$this->db->group_start();
				$this->db->like('document_name', $_POST['search']['value']);
				$this->db->or_like('NAMA_KELOMPOK', $_POST['search']['value']);
				$this->db->or_like('duedate', $_POST['search']['value']);
				$this->db->or_like('bulan', $_POST['search']['value']);
				$this->db->or_like('nama_bulan', $_POST['search']['value']);
				$this->db->or_like('tahun', $_POST['search']['value']);
				$this->db->or_like('keterangan', $_POST['search']['value']);
				$this->db->or_like('nama_puskesmas', $_POST['search']['value']);
				$this->db->or_like('status_dokumen2', $_POST['search']['value']);
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
						$this->db->where('document_name', $_POST['filter_dokumen']);
					}elseif ($_POST['filter_tahun'] != null && $_POST['filter_bulan'] != null && $_POST['filter_dokumen'] != null && $_POST['filter_status_dokumen'] != null) {
						$this->db->where('tahun', $_POST['filter_tahun']);
						$this->db->where('bulan', $_POST['filter_bulan']);
						$this->db->where('document_name', $_POST['filter_dokumen']);
						$this->db->where('id_puskesmas', $_POST['filter_status_dokumen']);
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
						$this->db->where('document_name', $_POST['filter_dokumen']);
					}
					if ($_POST['filter_status_dokumen'] != null) {
						$this->db->where('id_puskesmas', $_POST['filter_status_dokumen']);
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
		return $this->db->get($this->t1)->num_rows();
	}

}
