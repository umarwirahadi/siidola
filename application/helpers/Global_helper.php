<?php 
if(!defined('BASEPATH')) exit('No Direct Script access allowed');

function dashboardelite($nama_pkm='')
{	
	$ci=&get_instance();
	$a=$nama_pkm;
	$bln2=date('n');
	$thn2=date('Y');	
	
	$result1=$ci->db->query('SELECT document_upload.id_puskesmas,document_upload.user_id,
	if(master_intansi.jenis="PUSKESMAS",CONCAT("PUSKESMAS ",master_intansi.nama_intansi),master_intansi.nama_intansi) AS nama_intansi,
	master_intansi.jenis,concat(count(document_upload.id_document),"/",(select count(*) from  dk_kategori where STATUS="active")," dokumen") as dokumen_disetujui,((COUNT(document_upload.id_document)/(select count(*) from  dk_kategori where STATUS="active"))*100) as presentase
	FROM document_upload inner JOIN master_intansi ON document_upload.id_puskesmas = master_intansi.id_intansi WHERE document_upload.status_dokumen<>"1" 
	and master_intansi.nama_intansi=? and  document_upload.tahun=? and  document_upload.bulan=? GROUP BY document_upload.id_puskesmas',array($a,$thn2,$bln2))->row();
	return $result1;	
}

function dashboardeliteWithDate($nama_pkm='',$thn='',$bln='')
{	
	$ci=&get_instance();
	$a=$nama_pkm;
	if($thn==''){
		$thn1=date('Y');
	}else{
		$thn1=$thn;
	}

	if($bln==''){
		$bln1=date('n');
	}else{
		$bln1=$bln;
	}

	$result=$ci->db->query('SELECT document_upload.id_puskesmas,document_upload.user_id,
	if(master_intansi.jenis="PUSKESMAS",CONCAT("PUSKESMAS ",master_intansi.nama_intansi),master_intansi.nama_intansi) AS nama_intansi,
	master_intansi.jenis,concat(count(document_upload.id_document),"/",(select count(*) from  dk_kategori where STATUS="active")," dokumen") as dokumen_disetujui,((COUNT(document_upload.id_document)/(select count(*) from  dk_kategori where STATUS="active"))*100) as presentase
	FROM document_upload inner JOIN master_intansi ON document_upload.id_puskesmas = master_intansi.id_intansi WHERE document_upload.status_dokumen<>"1" 
	and master_intansi.nama_intansi=? and  document_upload.tahun=? and  document_upload.bulan=? GROUP BY document_upload.id_puskesmas',array($a,$thn1,$bln1))->row();
	return $result;	
}



function warnadashboardelite($angka=''){
	if(isset($angka)){
		$var=$angka;
	}else{
		$var='0';
	}

	if($var>=75 && $var<=100){
		return 'progress-bar bg-success';
	}elseif ($var>=50 && $var<=74) {
		return 'progress-bar bg-primary';		
	}elseif ($var>=25 && $var<=49) {
		return 'progress-bar bg-orange';		
	}elseif ($var>=0 && $var<=24) {
		return 'progress-bar bg-red';		
	}else{
		return 'progress-bar bg-red';
	}

}

function getStatusTepatWaktu($namaDokumen,$thn,$bln){	
	$ci=&get_instance();

		if($thn==''){
			$thn1=date('Y');
		}else{
			$thn1=$thn;
		}

		if($bln==''){
			$bln1=date('n');
		}else{
			$bln1=$bln;
		}

		if($namaDokumen==''){
			$doc='Laporan Capaian SPM';
		}else{
			$doc=$namaDokumen;
		}

	$result=$ci->db->query("SELECT document_name, format((count(if(status_duedate='Terlambat',1,null))/13)*100,1) as terlambat, 
							format((count(if(status_duedate='Tepat waktu',1,null))/13)*100,1) as tepat_waktu,
							format(((13-count(status_duedate))/13)*100,1) as belum_mengirim from v_document_upload 
							WHERE status_dokumen<>1 and document_name=? AND tahun=? and bulan=?",array($doc,$thn1,$bln1))->row();
	return $result;
}

function getTahunPelaporan($pilih_tahun='')
{
	$ci=& get_instance();
	$result=$ci->db->query('SELECT * FROM ms_tahun_laporan WHERE status="1" ORDER BY id DESC')->result();
	foreach($result as $row){
		if(isset($pilih_tahun)){
			if($row->tahun==$pilih_tahun){
				echo '<option value="'.$row->tahun.'" selected="selected">'.$row->tahun.'</option>';
			}else{
				echo '<option value="'.$row->tahun.'" >'.$row->tahun.'</option>';
			}		
		}else{
			if($row->isselected=='1'){
				echo '<option value="'.$row->tahun.'" selected="selected">'.$row->tahun.'</option>';
			}else{
				echo '<option value="'.$row->tahun.'" >'.$row->tahun.'</option>';
			}
		}
	}
}



function getBulanPelaporan($pilih_bulan='')
{
	$ci=& get_instance();
	$result=$ci->db->query('SELECT * FROM ms_bulan_laporan WHERE status="1" ORDER BY id LIMIT 12')->result();
	foreach($result as $row){
		if(isset($pilih_bulan)){
			if($row->id==$pilih_bulan){
				echo '<option value="'.$row->id.'" selected="selected">'.$row->bulan.'</option>';
			}else{
				echo '<option value="'.$row->id.'" >'.$row->bulan.'</option>';
			}		
		}else{
			if($row->isselected=='1'){
				echo '<option value="'.$row->id.'" selected="selected">'.$row->bulan.'</option>';
			}else{
				echo '<option value="'.$row->id.'" >'.$row->bulan.'</option>';
			}
		}			
	}	
}

function getStatusdokumen()
{
	$ci=& get_instance();
	$result=$ci->db->query('SELECT status_id,nama_status FROM ia_status WHERE status="Aktif" ORDER BY status_id DESC')->result();
	foreach($result as $row){
		echo '<option value="'.$row->status_id.'">'.$row->nama_status.'</option>';
	}
}

function getJabatan()
{
	$ci=& get_instance();
	$result=$ci->db->query('SELECT id_jabatan,nama_jabatan FROM dk_jabatan WHERE status="Aktif" ORDER BY id_jabatan DESC')->result();
	foreach($result as $row){
		echo '<option value="'.$row->id_jabatan.'">'.$row->nama_jabatan.'</option>';
	}
}

function getItem($kategori='')
{
	$ci=& get_instance();
	$result=$ci->db->query('SELECT namaitem,nama_kategori FROM master_item WHERE nama_kategori=? AND  status="active" ORDER BY ID',array($kategori))->result();
	foreach($result as $row){
		echo '<option value="'.$row->namaitem.'">'.$row->namaitem.'</option>';
	}
}

function getItemByid($kategori='')
{
	$ci=& get_instance();
	$result=$ci->db->query('SELECT ID,namaitem,nama_kategori FROM master_item WHERE nama_kategori=? AND  status="active" ORDER BY ID',array($kategori))->result();
	foreach($result as $row){
		echo '<option value="'.$row->ID.'">'.$row->namaitem.'</option>';
	}
}

function getKategori()
{
	$ci=& get_instance();
	$result=$ci->db->query('SELECT nama_kategori FROM master_item GROUP BY nama_kategori')->result();
	foreach($result as $row){
		echo '<option value="'.$row->nama_kategori.'">'.$row->nama_kategori.'</option>';
	}
}

function getPuskesmas()
{
	$ci=& get_instance();
	// $result=$ci->db->query('SELECT id_puskesmas,nama_puskesmas FROM dk_puskesmas ORDER BY nama_puskesmas')->result();
	$result=$ci->db->query("SELECT id_intansi,nama_intansi,jenis FROM master_intansi WHERE status='Active' ORDER BY jenis,nama_intansi")->result();
	foreach($result as $row){
		if($row->jenis=='PUSKESMAS'){
			echo '<option value="'.$row->id_intansi.'">PUSKESMAS '.$row->nama_intansi.'</option>';
		}else{
			echo '<option value="'.$row->id_intansi.'">'.$row->nama_intansi.'</option>';
		}
	}
}

function getPuskesmasOnly()
{
	$ci=& get_instance();
	$result=$ci->db->query("SELECT id_intansi,nama_intansi,jenis FROM master_intansi WHERE jenis='PUSKESMAS' ORDER BY jenis,nama_intansi")->result();
	foreach($result as $row){
		echo '<option value="'.$row->id_intansi.'">PUSKESMAS '.$row->nama_intansi.'</option>';		
	}
}


function getBidang()
{
	$ci=& get_instance();
	$result=$ci->db->query("SELECT id_intansi,nama_intansi,jenis FROM master_intansi WHERE jenis<>'PUSKESMAS' AND status='Active' ORDER BY jenis,nama_intansi")->result();
	foreach($result as $row){
		echo '<option value="'.$row->id_intansi.'">'.$row->nama_intansi.'</option>';		
	}
}

function showIndikatorPenilaian()
{
	$ci=& get_instance();
	$result=$ci->db->query('SELECT * FROM tb_indikator_penilaian WHERE status="1" ORDER BY id_indikator DESC')->result();
	return $result;	
}

function showDocument(){

	$ci=& get_instance();
	$result=$ci->db->query("SELECT NAMA_KATEGORI from dk_kategori WHERE STATUS='active'")->result();
	foreach($result as $row){
		echo '<option value="'.$row->NAMA_KATEGORI.'" >'.$row->NAMA_KATEGORI.'</option>';
	}	
}

function showDocumentBidang(){

	$ci=& get_instance();
	$result=$ci->db->query("SELECT * from jenis_dok_bidang WHERE STATUS='active'")->result();
	foreach($result as $row){
		echo '<option value="'.$row->id_jenis.'" >'.$row->jenis.'</option>';
	}	
}
