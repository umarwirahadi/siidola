<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class informasi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('InformasiModel','im');		
		isLogin();
	}
	
	public function index()
	{
		$data['isDatatable']=true;
		$data['isSelect2']=true;
		$data['title']='informasi';
		$data['js']=base_url('assets/custom/Custominformasi.js');
		$this->load->view('informasi/index',$data);
	}

	public function save()
	{
		$temparr=[];		
		$data=$this->input->post();
		$resultSaveFile=$this->im->saveInformasi($data);
		$temparr[]=$resultSaveFile;									
		echo json_encode($temparr);	
	}

	public function get()
	{
		$id=$this->input->post('id_informasi');
		if(isset($id)){
			$arr=[];
			$data_info=$this->im->getbyID($id);
			$arr[]=$data_info;
			echo json_encode($arr);	
		}else{
			redirect(site_url('informasi'));
		}
	}

	public function show()
	{
		$fetch_data = $this->im->make_datatable();
		$data = array();
		$no = 1;
		foreach ($fetch_data as $a) {
			$sub_array = array();
			$sub_array[] = $no;
			$sub_array[] = $a->judul;
			$sub_array[] = $a->isi;
			$sub_array[] = $a->created;
			$sub_array[] = $a->status;
			$sub_array[] = '
			<a href="javascript:void(0)" class="btn btn-sm btn-primary detail-info"  title="lihat detail informasi" data-id="'.$a->id.'" ><i class="fa fa-pencil"></i></a>
			<a href="javascript:void(0)" class="btn btn-sm btn-danger delete-info"  title="Hapus informasi" data-iddok="'.$a->id.'" ><i class="fa fa-trash"></i></a>';
			$no++;
			$data[] = $sub_array;
		}

		$output = array(
			"draw"            => intval($_POST['draw']),
			"recordsTotal"    => $this->im->getallcount(),
			"recordsFiltered" => $this->im->get_filtered_data(),
			"data"            => $data
		);
		echo json_encode($output);
	}



}

/* End of file documentation.php */
