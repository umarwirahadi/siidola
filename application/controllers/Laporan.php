<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Laporan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('KategoriModel', 'katMod');
		$this->load->model('LaporanModel', 'lap');
		isLogin();
	}

	public function index()
	{
		$data['title'] = 'Data dokumen yang sudah dilaporkan dan disetujui';
		$data['isDatatable']=true;
		$data['js']=base_url('assets/custom/custom_laporan.js');
		$this->load->view('laporan/Index', $data);
	}

	public function show()	
	{
		$jenis_user 	=$this->session->userdata('jenis');

		if($jenis_user=='PUSKESMAS'){
			$fetch_data = $this->lap->make_datatable_laporan();
			$data = array();
			$no = 1;
			foreach ($fetch_data as $a) {
				$tgl_jatuhtempo = DateTime::createFromFormat('Y-m-d', $a->duedate);
				$sub_array = array();
				$sub_array[] = $no;
				$sub_array[] = $a->document_name;
				$sub_array[] = $a->NAMA_KELOMPOK;
				$sub_array[] = $a->nama_bulan . ' ' . $a->tahun;
				$sub_array[] = $a->tgl_upload;
				$sub_array[] = $a->status_dokumen==3?'<span class="badge badge-success">valid</span>':'<span class="badge badge-danger">invalid</span>';
				$sub_array[] = '
				<a href="javascript:void(0)" class="btn btn-sm btn-primary detail-lap"  title="lihat dokumen" data-iddok="'.$a->id_document.'" ><i class="fa fa-cloud-download"></i> download</a>';
				$no++;
				$data[] = $sub_array;
			}

			$output = array(
				"draw"            => intval($_POST['draw']),
				"recordsTotal"    => $this->lap->getallcount(),
				"recordsFiltered" => $this->lap->get_filtered_data(),
				"data"            => $data
			);
			echo json_encode($output);
		}elseif($jenis_user=='DINAS KESEHATAN'){

			$fetch_data = $this->lap->make_datatable_laporan();
			$data = array();
			$no = 1;
			foreach ($fetch_data as $a) {
				$tgl_jatuhtempo = DateTime::createFromFormat('Y-m-d', $a->duedate);
				$sub_array = array();
				$sub_array[] = $no;
				$sub_array[] = $a->nama_puskesmas;
				$sub_array[] = $a->document_name;
				$sub_array[] = $a->NAMA_KELOMPOK;
				$sub_array[] = $a->nama_bulan . ' ' . $a->tahun;
				$sub_array[] = $a->tgl_upload;
				$sub_array[] = $a->status_dokumen==3?'<span class="badge badge-success">valid</span>':'<span class="badge badge-danger">invalid</span>';
				$sub_array[] = '
				<a href="javascript:void(0)" class="btn btn-sm btn-primary detail-lap"  title="lihat dokumen" data-iddok="'.$a->id_document.'" ><i class="fa fa-cloud-download"></i> download</a>';
				$no++;
				$data[] = $sub_array;
			}

			$output = array(
				"draw"            => intval($_POST['draw']),
				"recordsTotal"    => $this->lap->getallcount(),
				"recordsFiltered" => $this->lap->get_filtered_data(),
				"data"            => $data
			);
			echo json_encode($output);
		}
		

	}
	public function getDetail()
	{
		$id_document=$this->input->post('id_document',true);		
		$result=$this->lap->getDetailBerkas($id_document);
		echo json_encode($result);
	}

	public function download()
	{
		$file_name = $this->uri->segment(3);
		if($file_name){
			force_download('dokuments/' . $file_name, null);
		}else{
			redirect('/document');
		}
	}
}

/* End of file Laporan.php */
