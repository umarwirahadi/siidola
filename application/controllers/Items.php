<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Items extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('ItemModel','im');
		isLogin();
	}

	public function index()
	{
		$data['isDatatable']=true;
		$data['isSelect2']=true;
		$data['title']='Master Item';
		$data['js']=base_url('assets/custom/CustomItem.js');
		$this->load->view('masterItem/Index',$data);
	}

public function ShowModalAdd()
{
	$data['title']='form add';
	// $data_form=$this->load->view('masteritem/Add',$data,true);
	$this->load->view('masteritem/Add',$data);
	// echo json_encode($data_form);
}

public function save()
{
	$temparr=[];		
	$data=$this->input->post();
	$resultSaveFile=$this->im->saveItemModel($data);
	$temparr[]=$resultSaveFile;									
	echo json_encode($temparr);	
}

public function showModalUpdate()
{
	$arr=[];
	$id=$this->input->post('iditem',true);
	$res=$this->im->getItemModel($id);
	$arr[]=$res;
	echo json_encode($arr);	
}

public function update()
{
	$temparr=[];		
	$data=$this->input->post();
	$resultSaveFile=$this->im->UpdateItemModel($data);
	$temparr[]=$resultSaveFile;									
	echo json_encode($temparr);
}

public function delete()
{
	$arr=[];
	$id=$this->input->post('iditem',true);
	$res=$this->im->deleteItemModel($id);
	$arr[]=$res;
	echo json_encode($arr);
}


	public function fetch()
	{
	$fetch_data = $this->im->make_datatable();
	$data = array();
	$no=1;
	foreach ($fetch_data as $a) {
		$sub_array= array();
		$sub_array[] = $no;
		$sub_array[] = $a->namaitem;
		$sub_array[] = $a->nama_kategori;
		$sub_array[] = $a->keterangan;
		$sub_array[] = $a->tglberlaku;
		$sub_array[] = $a->status;
		$sub_array[] = '
		<a href="#" class="btn btn-sm btn-primary edit-item" title="Detail item" data-id-item="'.$a->ID.'"><i class="fa fa-eye"></i></a>
		<a href="#" class="btn btn-sm btn-danger hapus-item" title="Hapus item" data-id-item="'.$a->ID.'"><i class="fa fa-trash"></i></a>';
		$no++;
		$data[] = $sub_array;
	}

	$output=array(
			"draw"            =>intval($_POST['draw']),
			"recordsTotal"    => $this->im->getallcount(),
			"recordsFiltered" => $this->im->get_filtered_data(),
			"data"            =>$data
	);
	echo json_encode($output);

	}
}
/* End of file Controllername.php */
