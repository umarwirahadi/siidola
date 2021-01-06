<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class UploadBidang extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Jenismodel','mjenis');
		$this->load->model('Uploadbidangmodel','upl');		
		isLogin();
		isBidang();		
	}


	public function index()
	{
		$data['isDatatable']=true;
		$data['isSelect2']=true;
		$data['title']='upload bidang';
		$data['maintitle']='UPLOAD DOKUMEN BIDANG/SEKSI';
		$data['js']=base_url('assets/assetbidang.js');
		$data['jenisDokumen']=$this->mjenis->getJenis();
		$data['dokumen_upload_draft']=$this->upl->show();
		$data['dokumen_upload_ajuan']=$this->upl->showAjuan();
		$data['max_file']=ini_get('upload_max_filesize');
		$this->load->view('uploadBidang/Index',$data);
	}

	public function showDraft()
	{
		if($this->session->userdata()){
			$id_user=$this->session->userdata('id_puskesmas');
			$data=$this->upl->show($id_user);
			echo json_encode($data);
		}else{
			redirect('/uploadbidang');
		}
	}


public function showajuan()
 {
   if($this->session->userdata()){
		// $id_user=$this->session->userdata('user_id');
		$id_puskesmas=$this->session->userdata('id_puskesmas');
		$data=$this->upl->showAjuan($id_puskesmas);
		echo json_encode($data);
	}else{
		redirect('/uploadbidang');
	}
 }

 public function showdisetujui()
 {
 	if($this->session->userdata()){
		$id_puskesmas=$this->session->userdata('id_puskesmas');
		$data=$this->upl->showdisetujuimodel($id_puskesmas);
		echo json_encode($data);
	}else{
		redirect('/uploadbidang');
	}
 }




	public function do_upload()
	{
			$temparr=[];
			//catch data form input
			$data_dok 		=$this->input->post();
			$id_document  	=abs( crc32( uniqid() ) );
			$id_user 		=$this->session->userdata('user_id');
			$id_intansi 	=$this->session->userdata('id_puskesmas');								
			$jenis			=$data_dok['jenis'];
			$bulan			=$data_dok['bulan'];
			$tahun			=$data_dok['tahun'];
			$jenis			=$data_dok['jenis'];
			$keterangan		=$data_dok['keterangan'];

				$data_dokumen 	= array('id_document' =>$id_document,'id_jenis'=>$jenis,'bulan'=>$bulan,
								'tahun'=>$tahun,'status_dokumen'=>1,'keterangan'=>$keterangan,'user_id'=>$id_user,'id_intansi'=>$id_intansi,'updatedby'=>$id_user);
				$result=$this->upl->saveDocument($data_dokumen);				
				if($result['status']===1){
					$pesan = array('status' =>$result['status'] ,'pesan'=>$result['message']);
					$temparr[]=$pesan;

					$config['upload_path']          = './dokumentbidang/';
					$config['remove_spaces']        = TRUE;
					$config['allowed_types']        = 'jpg|png|xls|xlsx|doc|docx|pdf';
					$config['max_size']             = '0';
					$config['overwrite']            = TRUE;
					$this->load->library('upload', $config);
					$this->upload->initialize($config);

				
					$jumlah_berkas=count($_FILES['file_source']['name']);

						$hit=0;

						for ($i=0; $i < $jumlah_berkas; $i++) {

							if($_FILES['file_source']['name'][$i]){
								$hit=$hit+1;
								$_FILES['file']['name']=$id_document.'_'.$_FILES['file_source']['name'][$i];
								$_FILES['file']['type']=$_FILES['file_source']['type'][$i];
								$_FILES['file']['tmp_name']=$_FILES['file_source']['tmp_name'][$i];
								$_FILES['file']['error']=$_FILES['file_source']['error'][$i];
								$_FILES['file']['size']=$_FILES['file_source']['size'][$i];
								if($this->upload->do_upload('file')){

									$data=$this->upload->data();

									$arrData = array('id_document' =>$id_document,'file_name'=>$data['file_name'],'file_type'=>$data['file_ext'],
													'file_size'=>$data['file_size'],'id_user'=>$id_user,'status'=>1 );
									$resultSaveFile=$this->upl->saveFile($arrData);
									if($resultSaveFile){
										$pesan = array('status' =>1 ,'pesan'=>'Upload berkas ke '.$hit.' berhasil');
										$temparr[]=$pesan;
									}
								}else{
									$pesan=array('status'=>0,'pesan'=>$this->upload->display_errors());
									$temparr[]=$pesan;
								}
							}
						}
				}else{
					$pesan = array('status' =>$result['status'] ,'pesan'=>$result['message']);
					$temparr[]=$pesan;
				}
			echo json_encode($temparr);
	}


	public function do_upload_update()
	{
		$temparr=[];
				$id_user 			=$this->session->userdata('user_id');
				$data_dok			=$this->input->post();
				$uniqueid 			=$data_dok['edit_id_document'];
				$id_document_upload =$data_dok['edit_iddok'];
				$ket				=$data_dok['edit_keterangan'];

				$data_dokumen 		= array('id' =>$id_document_upload,'keterangan'=>$ket);
				$result 			=$this->upl->updateDocument($data_dokumen);
				$temparr[]			=$result;

				$config['upload_path']          = './dokumentbidang/';
				$config['remove_spaces']        = TRUE;
				$config['allowed_types']        = 'jpg|png|xls|xlsx|doc|docx|pdf';
				$config['max_size']             = '0';
				$config['overwrite']            = false;
				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				// format multiple file
				if(isset($_FILES['file_update']['name'])){
				$jumlah_berkas=count($_FILES['file_update']['name']);
				$hit=0;
				for ($i=0; $i < $jumlah_berkas; $i++) {

					if($_FILES['file_update']['name'][$i]){
						$hit=$hit+1;
						$_FILES['file']['name']=$uniqueid.'_'.$_FILES['file_update']['name'][$i];
						$_FILES['file']['type']=$_FILES['file_update']['type'][$i];
						$_FILES['file']['tmp_name']=$_FILES['file_update']['tmp_name'][$i];
						$_FILES['file']['error']=$_FILES['file_update']['error'][$i];
						$_FILES['file']['size']=$_FILES['file_update']['size'][$i];
						if($this->upload->do_upload('file')){
							$data=$this->upload->data();
							$arrData = array('id_document' =>$uniqueid,'file_name'=>$data['file_name'],'file_type'=>$data['file_ext'],
											'file_size'=>$data['file_size'],'id_user'=>$id_user,'status'=>1 );
							$resultSaveFile=$this->upl->saveFile($arrData);
							if($resultSaveFile){
								$pesan = array('status' =>1 ,'pesan'=>'Upload berkas ke '.$hit.' berhasil');
								$temparr[]=$pesan;
							}
						}else{
							$pesan=array('status'=>0,'pesan'=>$this->upload->display_errors());
							$temparr[]=$pesan;
						}
					}
				}
				}else{
					$pesan = array('status' =>1 ,'pesan'=>'tidak ada file yang diupload');
					$temparr[]=$pesan;
				}
			echo json_encode($temparr);
	}

public function ajukan()
{
	$temp=[];
	$data_id=$this->input->post('id',true);
	$id_document=$this->input->post('id_document',true);
	$arr_id=array('id_document'=>$id_document,'id'=>$data_id);
	$hasil=$this->upl->do_ajukan($arr_id);
	$temp[]=$hasil;
	echo json_encode($temp);
}

	public function delete()
	{
		$temp=[];
		$id=$this->input->post('iddok');
		$data_dokumen=$this->upl->getbyID($id);
		if($data_dokumen['status']===1){
			$id_dokumen=$data_dokumen['data']->id_document;
			$data=$this->upl->deleteFileByIdDocument($id_dokumen);
			$temp[]=$data;
			$data1=$this->upl->deleteDocument($id_dokumen);
			$temp[]=$data1;
		}else{
			$temp[]=$data_dokumen;
		}
		echo json_encode($temp);
	}


	public function deletedocument()
	{
		$temp=[];
		$id=$this->input->post('iddok');
		$data_dokumen=$this->upl->deleteFileById($id);
		$temp[]=$data_dokumen;
		echo json_encode($temp);
	}

	public function getDetail()
	{
		$arr=[];
		$id=$this->input->post('id',true);
		$data=$this->upl->getDetailDocument($id);
		$arr[]=$data;
		if($data['status']===1){
			$id_dokumen=$data['data']->id_document;
			$arWhere=array('id_document'=>$id_dokumen);
			$data2=$this->upl->getDetailBerkas($arWhere);
			$arr[]=$data2;
		}
		echo json_encode($arr);
	}

	public function detailajuan()
	{
		$id=$this->uri->segment(3);
		$data=array('id'=>$id);
		$result=$this->upl->getDetailDocument($id);
		if(count($result['data'])==1){
			$id_doc=$result['data']->id_document;
			$data_doc=array('id_document'=>$id_doc);
			$data['data_files']=$this->upl->getDetailBerkas($data_doc);			
		}else{
			redirect('/uploadbidang');
		}


		$data['detail_data']=$result['data'];
		$data['title'] = 'Detail dokumen';
		$data['isSelect2']=true;
		$data['isDatatable']=true;
		$data['js'] = base_url('assets/assetbidang.js');
		$data['tiny'] = base_url('assets/vendors/ckeditor/ckeditor.js');
		$this->load->view('uploadbidang/Detail',$data);
	}

	public function download()
	{
		// $file_name = $this->uri->segment(3);
		// force_download('dokumentbidang/' . $file_name, null);

		$file_name = $this->uri->segment(3);
		if($file_name){
			force_download('dokumentbidang/'.$file_name, null);
		}else{
			redirect('/uploadbidang');
		}
	
	}

	public function perbaikan_file()
	{
		$arr=[];
		$id_file =$this->input->post('idfile',true);
		if($id_file){
			$data_file=$this->upl->getFilebyID($id_file);
			$arr[]=$data_file;
			echo json_encode($arr);
		}else{
			redirect('/uploads');
		}
	}

	public function upload_perbaikan_file()
	{
		$temparr=[];
				$data_dok			=$this->input->post();				
				$id_document 		=$data_dok['id_document'];
				$id 				=$data_dok['idfile'];
				$id_user 			=$this->session->userdata('user_id');
				$file_lama 			=$data_dok['file_name'];
				$catatan 			=$data_dok['keterangan'];
			
				$config['upload_path']          = './dokumentbidang/';
				$config['remove_spaces']        = TRUE;
				$config['allowed_types']        = 'jpeg|jpg|png|xls|xlsx|doc|docx|pdf';
				$config['max_size']             = '0';
				$config['overwrite']            = true;
				// $config['file_name']            = $id_document.'_'.$_FILES['file_source']['name'];

				$this->load->library('upload', $config);
				$this->upload->initialize($config);
				
				if(isset($_FILES['file_source']['name'])){					
					$_FILES['file_source']['name']=$id_document.'_'.$_FILES['file_source']['name'];
					$_FILES['file_source']['type']=$_FILES['file_source']['type'];
					$_FILES['file_source']['tmp_name']=$_FILES['file_source']['tmp_name'];
					$_FILES['file_source']['error']=$_FILES['file_source']['error'];
					$_FILES['file_source']['size']=$_FILES['file_source']['size'];
						
					if($this->upload->do_upload('file_source')){
							$data=$this->upload->data();
							$arrData = array('id'=>$id,'id_document' =>$id_document,'file_name'=>$data['file_name'],'file_type'=>$data['file_ext'],
											'file_size'=>$data['file_size'],'id_user'=>$id_user,'status'=>1,'file_lama'=>$file_lama,'catatan_perbaikan'=>$catatan );
							$resultSaveFile=$this->upl->saveFilePerbaikan($arrData);
							$temparr[]=$resultSaveFile;							
						}else{
							$pesan=array('status'=>0,'pesan'=>$this->upload->display_errors());
							$temparr[]=$pesan;
						}
				}else{
					$pesan = array('status' =>1 ,'pesan'=>'tidak ada file yang diupload');
					$temparr[]=$pesan;
				}

			echo json_encode($temparr);
	}

	public function update_status_perbaikan()
	{
		$arr=[];
		$a=$this->input->post();
		if($a){
			$data=array('id'=>$a['idlaporan'],'keterangan'=>$a['ket'],'status_dokumen'=>55);
			$result=$this->upl->changeStatusDocument($data);
			$arr[]=$result;
			echo json_encode($arr);
		}else{
			redirect('/uploadbidang');
		}		
	}
}

/* End of file Uploads.php */
