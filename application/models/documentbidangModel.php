<?php
defined('BASEPATH') or exit('No direct script access allowed');
class DocumentbidangModel extends CI_Model
{

	private $_document_upload = 'document_upload_bidang';
	private $_v_document_upload = 'v_document_bidang';
	private $_document_table = 'document_table_bidang';
	private $t4 = 'dk_kategori';
	private $t5 = 'tb_indikator_penilaian';

	var $_t1_select_column = array("id","id_document",	"id_jenis","jenis",	"bulan",	"tahun",	"status_dokumen",	"nama_status",	"keterangan",	"id_intansi",	"nama_intansi", "jenis_intansi", "user_id", "created", "updated");
	var $_t1_order_column = array("id","id_document",	"id_jenis","jenis",	"bulan",	"tahun",	"status_dokumen",	"nama_status",	"keterangan",	"id_intansi",	"nama_intansi", "jenis_intansi", "user_id", "created", "updated");
	

	function getIndikatorPenilaian($id_document){
		$sql="select * from ia_document_review where id_document=? order by id_review";
		$result=$this->db->query($sql,array($id_document));
		if($result->num_rows()>=1){
			return $arrayName = array('pesan' => 'review ditemukan', 'status' => 1,'data'=>$result->result());
		}else{
			return $arrayName = array('pesan' => 'review tidak ditemukan', 'status' => 0,'data'=>null);
		}
	}


	public function mGetLogActivity($id_dokumen)
	{
		$resultLog=$this->db->query("SELECT * FROM v_log_activity WHERE id_dokument=? ORDER BY date DESC",array($id_dokumen));
		if($resultLog){
			return $arrayName = array('pesan' => 'dokumen ditemukan', 'status' => 1,'data'=>$resultLog->result());
		}else{
			return $arrayName = array('pesan' => 'dokumen tidak ditemukan', 'status' => 0,'data'=>null);
		}	
	}

	public function detail($data=null)
	{		
		$this->db->where('id', $data['id']);		
		$data=$this->db->get($this->_v_document_upload,1);
		if($data->num_rows()===1){
			return $dataArray=array('data'=>$data->row(),'pesan'=>'data detail dokument ditemukan','status'=>1);		
		}else{
			return false;
		}
	}

	public function getFiles($id_document=null)
	{
		$query='select * from document_table_bidang where id_document=?';
		$data_file=$this->db->query($query,array('id_document'=>$id_document));
		if($data_file->num_rows()!=0){
			return $arrayName = array('pesan' => 'dokumen ditemukan', 'status' => 1,'data'=>$data_file->result());
		}else{
			return $arrayName = array('pesan' => 'dokumen tidak ditemukan', 'status' => 0,'data'=>null);
		}		
	}

	public function getFilesByID($id='')
	{
		$query='select * from document_table_bidang where id=?';
		$data_file=$this->db->query($query,array('id'=>$id));
		if($data_file->num_rows()!=0){
			return $arrayName = array('pesan' => 'dokumen ditemukan', 'status' => 1,'data'=>$data_file->row());
		}else{
			return $arrayName = array('pesan' => 'dokumen tidak ditemukan', 'status' => 0,'data'=>null);
		}		
	}

	public function show($iduser = '')
	{
		$data = $this->db->get_where($this->_t1, ['status_dokumen' => 1, 'id_user' => '111']);
		if ($data->num_rows() >= 1) {
			return $data->result();
		} else {
			return false;
		}
	}



	public function showAjuan($data = null)
	{
		$data = $this->db->get_where($this->_t1, ['status_dokumen' => 2, 'id_user' => '111']);
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
			$hasil = $this->db->update($this->_document_upload, $aData);
			if ($hasil) {
				return $arrayName = array('pesan' => 'Proses pengiriman berkas ke Dinas kesehatan berhasil', 'status' => 1);
			} else {
				return $arrayName = array('pesan' => 'Proses pengiriman berkas ke Dinas kesehatan gagal', 'status' => 0);
			}
		}else{
			return $arrayName = array('pesan' => 'tidak ada file yang akan dilaporkan, periksa kembali draft ajuan'.$cekdata->num_rows(), 'status' => 0);
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
		$result = $this->db->get_where($this->_document_upload, ['id' => $id]);
		if ($result->num_rows() === 1) {
			return $ares = array('status' => 1, 'data' => $result->row(), 'pesan' => 'data ditemukan');
		} else {
			return $ares = array('status' => 0, 'pesan' => 'data tidak ditemukan');
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

	public function getDetailDocument($id =null)
	{
		$result = $this->db->get_where($this->_v_document_upload, ['id' => $id['id']], 1);
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
		$check_where = array('id_kategori' => $data['id_kategori'], 'bulan' => $data['bulan'], 'tahun' => $data['tahun'], 'id_user' => $data['id_user']);
		$cek_data = $this->db->get_where($this->_document_upload, $check_where);
		if ($cek_data) {
			if ($cek_data->num_rows() >= 1) {
				return $arrayName = array('message' => 'Dokumen sudah pernah diupload, periksa kembali dokumen', 'status' => 0, 'data' => $data);
			} else {
				$data_dokumen = array(
					'id_document' => $data['id_document'], 'document_name' => $data['dokument_name'],
					'id_kategori' => $data['id_kategori'], 'duedate' => $data['duedate'], 'bulan' => $data['bulan'],
					'tahun' => $data['tahun'], 'status_dokumen' => $data['status_dokumen'], 'keterangan' => $data['keterangan'],
					'id_user' => $data['id_user'],'id_puskesmas'=>$data['id_puskesmas']);
				$hasil = $this->db->insert($this->_document_upload, $data_dokumen);
				return $arrayName = array('message' => 'Data dokumen berhasil disimpan', 'status' => 1);
			}
		} else {
			return $arrayName = array('message' => 'Proses Upload gagal dilakukan, periksa kembali dokumen', 'status' => 0);
		}
	}

	public function updateDocument($data = null)
	{
		$aWhere = array('id' => $data['id']);
		$aData = array('keterangan' => $data['keterangan'],'updatedby'=>$data['updatedby']);
		$this->db->where($aWhere);
		$hasil = $this->db->update($this->_document_upload, $aData);
		if ($hasil) {
			return $arrayName = array('pesan' => 'Data dokumen berhasil diupdate', 'status' => 1);
		} else {
			return $arrayName = array('pesan' => 'Proses Upload gagal dilakukan, periksa kembali dokumen', 'status' => 0);
		}
	}

	public function update_tanggapan($data=null)
	{
		$hasil = $this->db->query('UPDATE document_upload_bidang SET status_dokumen=?, tanggapan=?,updatedby=? WHERE id=?',array($data['status_dokumen'],$data['tanggapan'],$data['updatedby'],$data['id']));
		if ($hasil) {
			return $arrayName = array('pesan' => 'Data dokumen berhasil diupdate', 'status' => 1);
		} else {
			return $arrayName = array('pesan' => 'Proses update gagal dilakukan, periksa inputan data', 'status' => 0);
		}
	}

	public function logact($id='')
	{
		$hasil = $this->db->query('SELECT * FROM v_log_aktivity WHERE id_dokumen=? ORDER BY date DESC',array($id));
		if ($hasil) {
			return $arrayName = array('pesan' => 'Data log dokumen berhasil diambil', 'status' => 1);
		} else {
			return $arrayName = array('pesan' => 'Data log dokumen berhasil diambil', 'status' => 0);
		}
	}

	public function update_tanggapan_file($data=null)
	{
		$hasil = $this->db->query("UPDATE document_table_bidang SET deskripsi=?,updatedby=? WHERE id=?",array($data['catatan_perbaikan'],$data['updatedby'],$data['id_dokumenya']));
		if ($hasil) {
			return $arrayName = array('pesan' => 'Tanggapan file berhasil disimpan', 'status' => 1);
		} else {
			return $arrayName = array('pesan' => 'Tanggapan file gagal disimpan', 'status' => 0);
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


	public function deleteDocument($id = '')
	{
		$keyWhere = array('id_document' => $id);		
		$result = $this->db->delete($this->_document_upload, $keyWhere);
		if ($result) {
			return $arrayName = array('pesan' => 'Dokumen berhasil dihapus', 'status' => 1);
		} else {
			return $arrayName = array('pesan' => 'Proses hapus gagal dilakukan, periksa parameter', 'status' => 0);
		}
	}

	public function deleteFileById($id = '')
	{
		$aWhere = array('id' => $id);
		$check = $this->db->get_where($this->_document_table, $aWhere);
		if ($check->num_rows() >= 1) {
			$data_delete = $check->row();
			$path = FCPATH . 'dokumentbidang/' . $data_delete->file_name;
			unlink($path);
			$result = $this->db->delete($this->_document_table, $aWhere);
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
		$check = $this->db->get_where($this->_document_table, $aWhere);
		if ($check->num_rows() >= 1) {
			$data_delete = $check->result();
			foreach ($data_delete as $key) {
				$aWhere2 = array('id' => $key->id);
				$path = FCPATH . 'dokumentbidang/' . $key->file_name;
				unlink($path);
				$result = $this->db->delete($this->_document_table, $aWhere2);
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

	public function insertReview($data=null)
	{
		$result=$this->db->insert_batch('ia_document_review',$data);
		if ($result) {
			return $arrayName = array('pesan' => 'proses review dokumen berhasil disimpan', 'status' => 1);
		} else {
			return $arrayName = array('pesan' => 'proses review dokumen gagal disimpan', 'status' => 0);
		}		
	}

	public function updateReview($data=null,$id_doc)
	{
		$this->db->where('id_document',$id_doc);
		$result=$this->db->update_batch('ia_document_review',$data,'indikator_penilaian');
		if ($result) {
			return $arrayName = array('pesan' => 'proses update review dokumen berhasil disimpan', 'status' => 1);
		} else {
			return $arrayName = array('pesan' => 'proses update review dokumen gagal disimpan', 'status' => 0);
		}
	}

	public function deleteReview($id = '')
	{
		$hasil=$this->db->query('delete from ia_document_review where id_document=?',array($id));
		if ($hasil) {
			return $arrayName = array('pesan' => 'Dokumen review berhasil dihapus', 'status' => 1);
		} else {
			return $arrayName = array('pesan' => 'Proses hapus gagal dilakukan, periksa parameter', 'status' => 0);
		}
	}

	public function getLog($id_dok='')
	{
		$resultLog=$this->db->query('SELECT * FROM v_log_aktivity WHERE id_dokumen=? ORDER BY id_log_dok',array($id_dok));
		if ($resultLog) {
			return $arrayName = array('pesan' => 'list log dokumen', 'status' => 1,'data'=>$resultLog->result());
		} else {
			return $arrayName = array('pesan' => 'Proses hapus gagal dilakukan, periksa parameter', 'status' => 0);
		}
	}

	// load for datatable 
	public function make_query_ajuan()
	{
		$this->db->select($this->_t1_select_column);
		$this->db->from($this->_v_document_upload);				
		if (isset($_POST['search']['value'])) {
			$this->db->where('status_dokumen!=',1);
			$this->db->group_start();
			$this->db->like('jenis', $_POST['search']['value']);
			$this->db->or_like('nama_status', $_POST['search']['value']);
			$this->db->or_like('nama_intansi', $_POST['search']['value']);
			$this->db->or_like('bulan', $_POST['search']['value']);
			$this->db->or_like('tahun', $_POST['search']['value']);
			$this->db->or_like('keterangan', $_POST['search']['value']);
			$this->db->group_end();
		}
		
  		if (isset($_POST['filter_tahun'], $_POST['filter_bulan'], $_POST['filter_dokumen'],$_POST['filter_status_dokumen'],$_POST['filter_puskesmas'])) {
            if ($_POST['filter_tahun'] != null && $_POST['filter_bulan'] == null && $_POST['filter_dokumen'] == null && $_POST['filter_status_dokumen'] == null && $_POST['filter_puskesmas']==null) {
                $this->db->where('tahun', $_POST['filter_tahun']);
            } elseif ($_POST['filter_tahun'] != null && $_POST['filter_bulan'] != null && $_POST['filter_dokumen'] == null && $_POST['filter_status_dokumen'] == null && $_POST['filter_puskesmas']==null) {
				$this->db->where('tahun', $_POST['filter_tahun']);
				$this->db->where('bulan', $_POST['filter_bulan']);
            } elseif ($_POST['filter_tahun'] != null && $_POST['filter_bulan'] != null && $_POST['filter_dokumen'] != null && $_POST['filter_status_dokumen'] == null && $_POST['filter_puskesmas']==null) {
                $this->db->where('tahun', $_POST['filter_tahun']);
				$this->db->where('bulan', $_POST['filter_bulan']);
				$this->db->where('id_jenis', $_POST['filter_dokumen']);
            }elseif ($_POST['filter_tahun'] != null && $_POST['filter_bulan'] != null && $_POST['filter_dokumen'] != null && $_POST['filter_status_dokumen'] != null && $_POST['filter_puskesmas']==null) {
                $this->db->where('tahun', $_POST['filter_tahun']);
				$this->db->where('bulan', $_POST['filter_bulan']);
				$this->db->where('id_jenis', $_POST['filter_dokumen']);
				$this->db->where('status_dokumen', $_POST['filter_status_dokumen']);
            }elseif ($_POST['filter_tahun'] != null && $_POST['filter_bulan'] != null && $_POST['filter_dokumen'] != null && $_POST['filter_status_dokumen'] != null && $_POST['filter_puskesmas']!=null) {
                $this->db->where('tahun', $_POST['filter_tahun']);
				$this->db->where('bulan', $_POST['filter_bulan']);
				$this->db->where('id_jenis', $_POST['filter_dokumen']);
				$this->db->where('status_dokumen', $_POST['filter_status_dokumen']);
				$this->db->where('id_puskesmas', $_POST['filter_puskesmas']);
            }
        }


		if (isset($_POST['filter_tahun'], $_POST['filter_bulan'], $_POST['filter_dokumen'],$_POST['filter_status_dokumen'],$_POST['filter_puskesmas'])) {            
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
                $this->db->where('status_dokumen', $_POST['filter_status_dokumen']);
            }if ($_POST['filter_puskesmas'] != null) {
                $this->db->where('id_intansi', $_POST['filter_puskesmas']);
            }
        }


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
		$this->db->where('status_dokumen!=', 1);		
		return $this->db->get($this->_v_document_upload)->num_rows();
	}
}
