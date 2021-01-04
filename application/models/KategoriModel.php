<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KategoriModel extends CI_Model{

      private $t1 = "v_kategori";
      private $dk_kategori = "dk_kategori";
      private $t2 = "dk_kelompok";
      private $t3 = "dk_seksi";
      private $t4 = "dk_jabatan";



      var $select_column = array("ID_KATEGORI",	"NAMA_KATEGORI",	"JENIS",	"STATUS",	"dateadded",	"id_seksi",	"kode_idx",	"kode",	"title",	"id_kelompok","NAMA_KELOMPOK");
      var $order_column = array("ID_KATEGORI",	"NAMA_KATEGORI",	"JENIS",	"STATUS",	"dateadded",	"id_seksi",	"kode_idx",	"kode",	"title",	"id_kelompok","NAMA_KELOMPOK");

      public function getKategori()
      {
        return $this->db->get_where($this->t1,['STATUS'=>'active'])->result();
      }

      public function getKelompok()
      {
        return $this->db->get($this->t2)->result();
      }

      public function getBidang()
      {
        return $this->db->get($this->t3)->result();
      }

      public function saveBidang($data=null)
      {
        return $this->db->insert($this->t3,['NAMA_SEKSI'=>$data['nama_seksi'],'NAMA_BIDANG'=>$data['nama_bidang'],'id_kelompok'=>$data['id_kelompok'],'STATUS'=>$data['status']]);
      }

      public function deleteBidang($id=null)
      {
        return $this->db->delete($this->t3,"ID_SEKSI = $id");
      }

      public function getJabatan()
      {
        return $this->db->get($this->t4)->result();
			}
			
			public function savedoc($data=null)
			{
				$result=$this->db->insert($this->dk_kategori,$data);
				if($result) {
						return $ares = array('status' => 1, 'pesan' => 'data dokumen berhasil disimpan');
				} else {
						return $ares = array('status' => 0, 'pesan' => 'data dokumen gagal disimpan');
				}
			}

			public function deletedoc($id='')
			{
				$this->db->where('ID_KATEGORI', $id);
				$result=$this->db->delete($this->dk_kategori);
				if($result) {
						return $ares = array('status' => 1, 'pesan' => 'data dokumen berhasil dihapus');
				} else {
						return $ares = array('status' => 0, 'pesan' => 'data dokumen gagal dihapus');
				}				
			}

			public function getKat($id='')
			{
				$data=$this->db->get_where($this->t1,['ID_KATEGORI'=>$id],1);				
				if($data){
						return $ares = array('status' => 1, 'pesan' => 'data dokumen ditemukan','data'=>$data->row());
				}else{
					return $ares = array('status' => 0, 'pesan' => 'data dokumen tidak ditemukan','data'=>null);					
				}
			}

			public function updatedoc($data=null,$id='')
			{
				
				$dataUpdate=array('NAMA_KATEGORI'=>$data['NAMA_KATEGORI'],'kode'=>$data['kode'],'kode_idx'=>$data['kode_idx'],'STATUS'=>$data['STATUS'],'ID_KELOMPOK'=>$data['ID_KELOMPOK'],'title'=>$data['title']);				
				$this->db->where('ID_KATEGORI',$id);
				$result=$this->db->update($this->dk_kategori, $dataUpdate);
				if($result) {
						return $ares = array('status' => 1, 'pesan' => 'data dokumen berhasil diupdate');
				} else {
						return $ares = array('status' => 0, 'pesan' => 'data dokumen gagal diupdate');
				}					
			}



      public function make_query()
      {
          $this->db->select($this->select_column);
          $this->db->from($this->t1);

          if (isset($_POST['search']['value'])) {
              $this->db->like('NAMA_KATEGORI', $_POST['search']['value']);
              $this->db->or_like('kode', $_POST['search']['value']);
          }
             if (isset($_POST['order'])) {
              $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
          } else {
              $this->db->order_by('ID_KATEGORI', 'Desc');
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
          return $this->db->get($this->t1)->num_rows();
      }


}
