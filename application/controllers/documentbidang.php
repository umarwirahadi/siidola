<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Documentbidang extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('DocumentbidangModel', 'dml');
		isLogin();
		// isBidang();
		isAdmin();
	}

	public function index()
	{
		$data['isDatatable'] = true;
		$data['isSelect2'] = true;
		$data['js'] = base_url('assets/custom/customdokumenbidang.js');
		$data['title'] = 'List Dokumen validasi bidang';
		$data['jumlah_draft'] = $this->db->query('SELECT COUNT(*) AS jumlah_draft FROM v_document_bidang WHERE status_dokumen=1 ')->row();
		$data['jumlah_baru'] = $this->db->query('SELECT COUNT(*) AS jumlah_baru FROM v_document_bidang WHERE status_dokumen=2 ')->row();
		$data['jumlah_disetujui'] = $this->db->query('SELECT COUNT(*) AS jumlah_disetujui FROM v_document_bidang WHERE status_dokumen=3 ')->row();
		$data['jumlah_diperbaiki'] = $this->db->query('SELECT COUNT(*) AS jumlah_diperbaiki FROM v_document_bidang WHERE status_dokumen=6 ')->row();
		$data['jumlah_total'] = $this->db->query('SELECT COUNT(*) AS jumlah_total FROM v_document_bidang')->row();
		$this->load->view('dokumenbidang/Index', $data);
	}

	public function showajuan()
	{		
		$bln=array('','Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
		$fetch_data = $this->dml->make_datatable_ajuan();
		$data = array();
		$no = 1;
		foreach ($fetch_data as $a) {
			// $tgl_jatuhtempo = DateTime::createFromFormat('Y-m-d', $a->duedate);
			$sub_array = array();
			$sub_array[] = $no;
			$sub_array[] = $a->jenis;
			$sub_array[] = $bln[$a->bulan] . ' ' . $a->tahun;			
			$sub_array[] = $a->created;
			$sub_array[] = $a->nama_intansi;			
			$sub_array[] = $a->keterangan;
			$sub_array[] = $a->nama_status;
			$sub_array[] = '
				<a href="' . site_url('documentbidang/detail/') . $a->id . '" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="left" title="Detail dokumen"><i class="fa fa-check"></i></a>
				<a href="javascript:void(0)" class="btn btn-sm btn-danger review-doc" id="hapus-dokumen2" data-id-document="'.$a->id.'" title="Hapus dokumen"><i class="fa fa-times"></i></a>';				
			$no++;
			$data[] = $sub_array;
		}
		$output = array(
			"draw"            => intval($_POST['draw']),
			"recordsTotal"    => $this->dml->getallcount(),
			"recordsFiltered" => $this->dml->get_filtered_data(),
			"data"            => $data
		);
		echo json_encode($output);
	}

	public function updatetanggapan()
	{
		$arr = [];
		$data = $this->input->post();
		$send_data = array('id' => $data['id'], 'status_dokumen' => $data['status_dokumen'], 'tanggapan' => $data['message'],'updatedby'=>$this->session->userdata('user_id'));
		$result = $this->dml->update_tanggapan($send_data);
		$arr[]=$result;
		echo json_encode($arr);
	}

	public function delete()
	{
		$temp=[];
		$id=$this->input->post('iddok');
		$data_dokumen=$this->dml->getbyID($id);
		if($data_dokumen['status']===1){
			$id_dokumen=$data_dokumen['data']->id_document;
			$data=$this->dml->deleteFileByIdDocument($id_dokumen);
			$temp[]=$data;
			$data1=$this->dml->deleteDocument($id_dokumen);
			$data2=$this->dml->deleteReview($id_dokumen);			
			$temp[]=$data2;
			$temp[]=$data1;
		}else{
			$temp[]=$data_dokumen;
		}
		echo json_encode($temp);
	}

	public function detail()
	{
		$id = $this->uri->segment(3);
		if($id){
			$data = array('id' => $id);
			$result = $this->dml->getDetailDocument($data);

			if ($result['status']!=0) {
				$id_doc = $result['data']->id_document;
				$data['idnya'] = $result;
				$data['data_file'] = $this->dml->getFiles($id_doc);
			} else {
				redirect('/documentbidang');
			}
			$data['detail_data'] = $result['data'];
			$data['title'] = 'Detail dokumen bidang';
			$data['isDatatable'] = true;
			$data['isSelect2'] = true;
			$data['js'] = base_url('assets/custom/customdokumenbidang.js');
			$data['tiny'] = base_url('assets/vendors/ckeditor/ckeditor.js');
			$this->load->view('dokumenbidang/Detail', $data);
		}else{
			redirect('/documentbidang');
		}
	}

	public function review()
	{		
		$iddok=$this->input->post('id_document');
		$data=$this->dml->getIndikatorPenilaian($iddok);
		echo json_encode($data);
	}

	public function proccessReview()
	{
		$arr=[];
		$arrayData=array();
		$id_dok=$this->input->post('id_dokumen_for_review',true);
		$jenis_proses=$this->input->post('id_jenis_proses',true);
		if(isset($jenis_proses)){
			if($jenis_proses==0){
				for ($i=1; $i <= $this->input->post('count_item',true); $i++) { 
						$arrayData[]=array('id_document'=>$id_dok,
						'indikator_penilaian'=>$item1=$this->input->post('item'.$i,true),
						'status_penilaian'=>$status1=$this->input->post('status'.$i,true),
						'nilai'=>0,
						'comment'=>$comment1=$this->input->post('comment'.$i,true),
						'id_user'=>$this->session->userdata('user_id'),
						'status'=>'active');
				}
				$hasil=$this->dml->insertReview($arrayData);
				$arr[]=$hasil;
				echo json_encode($arr);	
			}elseif($jenis_proses==1){
						for ($i=1; $i <= $this->input->post('count_item',true); $i++) { 
						$arrayData[]=array('id_document'=>$id_dok,
						'indikator_penilaian'=>$item1=$this->input->post('item'.$i,true),
						'status_penilaian'=>$status1=$this->input->post('status'.$i,true),
						'nilai'=>0,
						'comment'=>$comment1=$this->input->post('comment'.$i,true),
						'id_user'=>$this->session->userdata('user_id'),
						'status'=>'active');
				}
				$hasil=$this->dml->updateReview($arrayData,$id_dok);
				$arr[]=$hasil;
				echo json_encode($arr);	
			}

		}else{
			redirect('/documentbidang');				
		}
	
	}


	public function download()
	{
		$file_name = $this->uri->segment(3);
		if($file_name){
			force_download('dokumentbidang/'.$file_name, null);
		}else{
			redirect('/documentbidang');
		}
	}

	public function modalTanggapan()
	{
		$id=$this->input->post('id_dokument',true);
		if($id){
			$data['data_file']=$this->dml->getFilesByID($id);
			$result=$this->load->view('dokumenbidang/tanggapanFile',$data,true);
			echo json_encode($result);
		}else{
			redirect('/documentbidang');
		}	
		
		
	}



	public function act_tanggapanfile()
	{
		$arr = [];	
		$data = $this->input->post();
		$send_data = array('id_dokumenya' => $data['id_dokk'], 'catatan_perbaikan' => $data['ket'],'updatedby'=>$this->session->userdata('user_id'));
		$result = $this->dml->update_tanggapan_file($send_data);
		$arr[]=$result;
		echo json_encode($arr);
	}


	public function logactivity()
	{
		$iddok=$this->input->post('id_dok',true);
		$result=$this->dml->getLog($iddok);
		echo json_encode($result['data']);
	}
	


}
/* End of file Controllername.php */
