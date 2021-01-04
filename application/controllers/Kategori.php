<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('KategoriModel','kat');
    //Codeigniter : Write Less Do More
  }

  function index()
  {
    $data['isDatatable']=true;
    $data['isSelect2']=true;
    $data['maintitle']='Data Bidang, Kelompok dan Kategori';
    $data['title']='Data Bidang';
    $data['title2']='Data Kelompok';
		$data['title3']='Jenis Laporan';
		$data['js']=base_url('assets/custom/customKategori.js');
    $data['kelompok']=$this->kat->getKelompok();
    $data['bidang']=$this->kat->getBidang();

    $this->load->view('kategori/Index',$data);
  }

  /*data bidang*/
  public function savebidang()
  {
    $data=$this->input->post();
    $hasil=$this->kat->saveBidang($data);
    redirect('kategori');
  }

  public function deleteBidang()
  {
    $id_bidang=$this->input->post('idbid',true);
    $result=$this->kat->deleteBidang($id_bidang);
    echo json_encode($result);
  }

  public function showfrm()
  {
    $data['isDatatable']=false;
    $this->load->view('kategori/AddBidang2',$data);
  }

  /* load for datatable*/
 public function fetch()
 {
   $fetch_data = $this->kat->make_datatable();
   $data = array();
   $no=1;
   foreach ($fetch_data as $a) {
     $sub_array= array();
     $sub_array[] = $no;
     $sub_array[] = $a->kode;
     $sub_array[] = $a->NAMA_KATEGORI;
     $sub_array[] = $a->NAMA_KELOMPOK;
     $sub_array[] = $a->STATUS;
     $sub_array[] = $a->dateadded;
     $sub_array[] = 'Tgl. '.$a->title.' setiap bulanya';
     $sub_array[] = '
     <a href="#" class="btn btn-sm btn-primary edit-dokumen" title="Detail dokumen" data-id-dokumen="'.$a->ID_KATEGORI.'"><i class="fa fa-eye"></i></a>
     <a href="#" class="btn btn-sm btn-danger hapus-dokumen" title="Hapus dokumen" data-id-dokumen="'.$a->ID_KATEGORI.'"><i class="fa fa-trash"></i></a>';
     $no++;
     $data[] = $sub_array;
   }

   $output=array(
         "draw"            =>intval($_POST['draw']),
         "recordsTotal"    => $this->kat->getallcount(),
         "recordsFiltered" => $this->kat->get_filtered_data(),
         "data"            =>$data
   );
   echo json_encode($output);
 }

 public function savedocument()
 {
	$arr=[];
	$data=$this->input->post();
	$data_dok=array('NAMA_KATEGORI'=>$data['nama_dokumen'],'kode'=>$data['kode'],'kode_idx'=>$data['kode_idx'],'STATUS'=>$data['status'],'ID_KELOMPOK'=>$data['id_kelompok'],'title'=>$data['jatuh_tempo']);
	$res=$this->kat->savedoc($data_dok);
	$arr[]=$res;
	echo json_encode($arr);
 }

 public function getDetailKategori()
 {
	
	$arr=[];
	$id=$this->input->post('idKategori',true);
	$res=$this->kat->getKat($id);
	$arr[]=$res;
	echo json_encode($arr);	
 }

 public function updatedocument()
 {
	$arr=[];
	$data=$this->input->post();
	$id=$data['ID_KATEGORI'];
	$data_dok=array('NAMA_KATEGORI'=>$data['edit_nama_dokumen'],'kode'=>$data['edit_kode'],'kode_idx'=>$data['edit_kode_idx'],'STATUS'=>$data['edit_status'],'ID_KELOMPOK'=>$data['edit_id_kelompok'],'title'=>$data['edit_jatuh_tempo']);
	$res=$this->kat->updatedoc($data_dok,$id);
	$arr[]=$res;
	echo json_encode($arr);
 }

 public function deletedocument()
 {
	 	$arr=[];
		$id=$this->input->post('idKategori',true);
		$res=$this->kat->deletedoc($id);
		$arr[]=$res;
		echo json_encode($arr);
 }

}
