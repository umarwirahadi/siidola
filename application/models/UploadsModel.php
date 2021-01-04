<?php
defined('BASEPATH') or exit('No direct script access allowed');
class UploadsModel extends CI_Model
{

	private $t1 = 'document_upload';
	private $_t1 = 'v_document_upload';
	private $t2 = 'document_table';
	private $t4 = 'dk_kategori';

	var $_t1_select_column = array("id","id_document",	"document_name",	"id_kategori",	"nama_kategori",	"nama_kelompok",	"duedate",	"status_duedate",	"status_dudate2",	"bulan", "tahun", "status_dokumen", "keterangan", "user_id", "tgl_upload", "created", "updated","status_dokumen2","id_puskesmas","nama_puskesmas","tanggapan");
	var $_t1_order_column = array("document_name",	"nama_kategori",	"nama_kelompok",	"duedate",	"status_duedate",	"status_dudate2",	"bulan", "tahun", "status_dokumen", "keterangan", "tgl_upload","status_dokumen2");


	public function show($iduser = '')
	{
		$data = $this->db->get_where($this->_t1, ['status_dokumen' => 1, 'id_puskesmas' => $iduser]);
		if ($data->num_rows() >= 1) {
			return $data->result();
		} else {
			return false;
		}
	}



	public function showAjuan($iduser='')
	{
		$sql="SELECT * FROM v_document_upload WHERE (status_dokumen !=? and status_dokumen !=?) and id_puskesmas=? ORDER BY updated desc LIMIT 30";
		$data=$this->db->query($sql,array(1,3,$iduser));
		if ($data->num_rows() >= 1) {
			return $data->result();
		} else {
			return false;
		}
	}

	public function showdisetujuimodel($iduser = null)
	{
		$sql="SELECT * FROM v_document_upload WHERE status_dokumen =? and id_puskesmas=? ORDER BY updated desc LIMIT 30";
		$data=$this->db->query($sql,array(3,$iduser));
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
		$result = $this->db->get_where($this->t2, ['id_document' => $arData['id_document']]);
		if ($result->num_rows() > 0) {
			return $ares = array('status' => 1, 'data2' => $result->result(), 'pesan' => 'data ditemukan');
		} else {
			return $ares = array('status' => 0, 'pesan' => 'data tidak ditemukan');
		}
	}

	public function saveDocument($data = null)
	{
		$check_where = array('id_kategori' => $data['id_kategori'], 'bulan' => $data['bulan'], 'tahun' => $data['tahun'], 'user_id' => $data['user_id']);
		$cek_data = $this->db->get_where($this->t1, $check_where);
		if ($cek_data) {
			if ($cek_data->num_rows() >= 1) {
				return $arrayName = array('message' => 'Dokumen sudah pernah diupload, periksa kembali dokumen', 'status' => 0, 'data' => $data);
			} else {
				$data_dokumen = array(
					'id_document' => $data['id_document'], 'document_name' => $data['dokument_name'],
					'id_kategori' => $data['id_kategori'], 'duedate' => $data['duedate'], 'bulan' => $data['bulan'],
					'tahun' => $data['tahun'], 'status_dokumen' => $data['status_dokumen'], 'keterangan' => $data['keterangan'],
					'user_id' => $data['user_id'],'id_puskesmas'=>$data['id_puskesmas'],'updatedby'=>$this->session->userdata('user_id'));
				$hasil = $this->db->insert($this->t1, $data_dokumen);
				return $arrayName = array('message' => 'Data dokumen berhasil disimpan', 'status' => 1);
			}
		} else {
			return $arrayName = array('message' => 'Proses Upload gagal dilakukan, periksa kembali dokumen', 'status' => 0);
		}
	}

	public function updateDocument($data = null)
	{
		$aWhere = array('id' => $data['id']);
		$aData = array('keterangan' => $data['keterangan'],'updatedby'=>$this->session->userdata('user_id'));
		$this->db->where($aWhere);
		$hasil = $this->db->update($this->t1, $aData);
		if ($hasil) {
			return $arrayName = array('pesan' => 'Data dokumen berhasil diupdate', 'status' => 1);
		} else {
			return $arrayName = array('pesan' => 'Proses Upload gagal dilakukan, periksa kembali dokumen', 'status' => 0);
		}
	}

	public function saveFile($data = null)
	{
		$data_file = array(
			'id_document' => $data['id_document'], 'file_name' => $data['file_name'],
			'file_type' => $data['file_type'], 'file_size' => $data['file_size'],
			'id_user' => $data['id_user'], 'status' => $data['status'], 'upload_date' => date("Y-m-d")
		);
		return $this->db->insert($this->t2, $data_file);
	}


	public function saveFilePerbaikan($data = null)
	{
		$data_file = array(
			'file_name' => $data['file_name'],
			'file_type' => $data['file_type'], 'file_size' => $data['file_size'],
			'id_user' => $data['id_user'], 'status' => $data['status'], 'catatan_perbaikan' => $data['catatan_perbaikan']
		);

		$this->db->where('id', $data['id']);		
		$this->db->where('id_document', $data['id_document']);
		$hasil = $this->db->update($this->t2, $data_file);		 
		if ($hasil) {
			/*proses hapus file */
				$path = FCPATH . 'dokuments/' . $data['file_lama'];
				if(file_exists($path)){
					unlink($path);
					return $arrayName = array('pesan' => 'file berhasil diupdate, klik tombol KIRIM PERBAIKAN ke dinas untuk kirim perbaikanya', 'status' => 1);
				}
				else{
					return $arrayName = array('pesan' => 'file berhasil diupdate, klik tombol KIRIM PERBAIKAN untuk kirim perbaikanya', 'status' => 1);
				}
		} else {
			return $arrayName = array('pesan' => 'file gagal diperbaharui', 'status' => 0);
		}
	}

	public function changeStatusDocument($data=null)
	{
		$sql="UPDATE document_upload SET keterangan=?,status_dokumen=? WHERE id=? LIMIT 1";
		$data_perbaikan=$this->db->query($sql,array($data['keterangan'],$data['status_dokumen'],$data['id']));
		if ($data_perbaikan) {
			return $arrayName = array('pesan' => 'Dokumen berhasil diupdate', 'status' => 1);
		} else {
			return $arrayName = array('pesan' => 'Dokumen gagal diupdate, periksa kembali inputan data, pastikan sudah benar', 'status' => 0);
		}
	}


	public function deleteDocument($id = '')
	{
		$keyWhere = array('id_document' => $id);
		$result = $this->db->delete($this->t1, $keyWhere);
		if ($result) {
			return $arrayName = array('pesan' => 'Dokumen berhasil dihapus', 'status' => 1);
		} else {
			return $arrayName = array('pesan' => 'Proses hapus gagal dilakukan, periksa parameter', 'status' => 0);
		}
	}

	public function deleteFileById($id = '')
	{
		$aWhere = array('id' => $id);
		$check = $this->db->get_where($this->t2, $aWhere);
		if ($check->num_rows() >= 1) {
			$data_delete = $check->row();
			$path = FCPATH . 'dokuments/' . $data_delete->file_name;
			unlink($path);
			$result = $this->db->delete($this->t2, $aWhere);
			if ($result) {
				return $arrayName = array('pesan' => 'data berkas berhasil dihapus', 'status' => 1);
			} else {
				return $arrayName = array('pesan' => 'Proses hapus gagal dilakukan, periksa parameter', 'status' => 0);
			}
		} else {
			return $arrayName = array('pesan' => 'Proses hapus gagal dilakukan, periksa parameter', 'status' => 0);
		}
	}

	public function deleteFileByIdDocument($id = '')
	{
		$aWhere = array('id_document' => $id);
		$check = $this->db->get_where($this->t2, $aWhere);
		if ($check->num_rows() >= 1) {
			$data_delete = $check->result();
			foreach ($data_delete as $key) {
				$aWhere2 = array('id' => $key->id);
				$path = FCPATH . 'dokuments/' . $key->file_name;
				unlink($path);
				$result = $this->db->delete($this->t2, $aWhere2);
			}

			if ($result) {
				return $arrayName = array('pesan' => 'semua berkas telah dihapus', 'status' => 1);
			} else {
				return $arrayName = array('pesan' => 'Proses hapus gagal dilakukan, periksa parameter', 'status' => 0);
			}
		} else {
			return $arrayName = array('pesan' => 'Belum ada berkas yang diupload', 'status' => 0);
		}
	}

	// load for datatable 
	public function make_query_ajuan()
	{
		$user_id	=$this->session->userdata('user_id');
		$id_pkm 	=$this->session->userdata('id_puskesmas');
		$this->db->select($this->_t1_select_column);
		$this->db->from($this->_t1);				
		if (isset($_POST['search']['value'])) {
			$this->db->where('user_id',$user_id);
			$this->db->where('id_puskesmas',$id_pkm);
			$this->db->where('status_dokumen!=',1);
			$this->db->group_start();
			$this->db->like('document_name', $_POST['search']['value']);
			$this->db->or_like('id_document', $_POST['search']['value']);
			$this->db->or_like('NAMA_KELOMPOK', $_POST['search']['value']);
			$this->db->or_like('duedate', $_POST['search']['value']);
			$this->db->or_like('bulan', $_POST['search']['value']);
			$this->db->or_like('tahun', $_POST['search']['value']);
			$this->db->or_like('keterangan', $_POST['search']['value']);
			$this->db->or_like('nama_puskesmas', $_POST['search']['value']);
			$this->db->or_like('status_dokumen2', $_POST['search']['value']);
			$this->db->group_end();
		}
		
		// Jika mau menggunakan filter
		// if (isset($_POST['filter_tahun'], $_POST['filter_prodi'], $_POST['filter_program'])) {
		//     if ($_POST['filter_tahun'] != null && $_POST['filter_prodi'] == null && $_POST['filter_program'] == null) {
		//         $this->db->where('tahun_akademik', $_POST['filter_tahun']);
		//     } elseif ($_POST['filter_tahun'] != null && $_POST['filter_prodi'] != null && $_POST['filter_program'] == null) {
		//         $this->db->where('tahun_akademik', $_POST['filter_tahun']);
		//         $this->db->where('id_prodi', $_POST['filter_prodi']);
		//     } elseif ($_POST['filter_tahun'] != null && $_POST['filter_prodi'] != null && $_POST['filter_program'] != null) {
		//         $this->db->where('tahun_akademik', $_POST['filter_tahun']);
		//         $this->db->where('id_prodi', $_POST['filter_prodi']);
		//         $this->db->where('program', $_POST['filter_program']);
		//     }
		// }


		if (isset($_POST['order'])) {
			$this->db->order_by($this->_t1_order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else {
			$this->db->order_by('id', 'Desc');
		}
	}

	public function make_datatable_ajuan()
	{
		$this->make_query_ajuan();
		if ($_POST['length'] != -1) {
			$this->db->limit($_POST['length'], $_POST['start']);
		}
		$query = $this->db->get();
		return $query->result();
	}

	public function get_filtered_data()
	{
		$this->make_query_ajuan();

		$query = $this->db->get();
		return $query->num_rows();
	}

	public function getallcount()
	{
		$this->db->where('status_dokumen', 2);		
		return $this->db->get($this->t1)->num_rows();
	}


	
}
