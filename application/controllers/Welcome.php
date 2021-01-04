<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Welcome extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('DashboardModel','dm');		
		
		isLogin();
	}

	public function index()
	{
		$data['isDatatable']=true;
		$data['isChart']=true;
		$data['ch']=base_url('assets/custom/Charts.js');
		$data['js'] = base_url('assets/custom/customDashboard.js');			
		$data['jumlahdraft']=$this->dm->getCountdraft();
		$data['title']='Dashboard';		
		$data['pilih_tahun']=date('Y');
		$data['pilih_bulan']=date('m');
		$data['jumlah_draft'] = $this->db->query('SELECT COUNT(*) AS jumlah_draft FROM v_document_upload WHERE status_dokumen=1  AND MONTH(created)=MONTH(now())')->row();
		$data['jumlah_baru'] = $this->db->query('SELECT COUNT(*) AS jumlah_baru FROM v_document_upload WHERE status_dokumen=2  AND MONTH(created)=MONTH(now())')->row();
		$data['jumlah_disetujui'] = $this->db->query('SELECT COUNT(*) AS jumlah_disetujui FROM v_document_upload WHERE status_dokumen=3 AND MONTH(created)=MONTH(now())')->row();
		$data['jumlah_diperbaiki'] = $this->db->query('SELECT COUNT(*) AS jumlah_diperbaiki FROM v_document_upload WHERE status_dokumen=6 AND MONTH(created)=MONTH(now())')->row();
		$data['jumlah_total'] = $this->db->query('SELECT COUNT(*) AS jumlah_total FROM v_document_upload')->row();
		
		$data['cimsel'] = dashboardeliteWithDate('CIMAHI SELATAN',date('Y'),date('n')-1);
		$data['melas'] = dashboardeliteWithDate('MELONG ASIH',date('Y'),date('n')-1);
		$data['cibeu'] = dashboardeliteWithDate('CIBEUREUM',date('Y'),date('n')-1);
		$data['paskal'] = dashboardeliteWithDate('PASIRKALIKI',date('Y'),date('n')-1);
		$data['cbr'] = dashboardeliteWithDate('CIBEBER',date('Y'),date('n')-1);
		$data['lwg'] = dashboardeliteWithDate('LEUWIGAJAH',date('Y'),date('n')-1);
		$data['meteng'] = dashboardeliteWithDate('MELONG TENGAH',date('Y'),date('n')-1);
		$data['cimteng'] = dashboardeliteWithDate('CIMAHI TENGAH',date('Y'),date('n')-1);
		$data['cgr'] = dashboardeliteWithDate('CIGUGUR TENGAH',date('Y'),date('n')-1);
		$data['pdsk'] = dashboardeliteWithDate('PADASUKA',date('Y'),date('n')-1);
		$data['cimut'] = dashboardeliteWithDate('CIMAHI UTARA',date('Y'),date('n')-1);
		$data['cpgr'] = dashboardeliteWithDate('CIPAGERAN',date('Y'),date('n')-1);
		$data['ctrp'] = dashboardeliteWithDate('CITEUREUP',date('Y'),date('n')-1);
		
		$data['chartTepat'] = getStatusTepatWaktu('',date('Y'),date('n')-1);
		$this->load->view('dashboard/Index',$data);
	}

	public function periode()
	{
		$data_periode=$this->input->post();
		$data['isDatatable']=true;
		$data['isChart']=true;
		$data['ch']=base_url('assets/custom/Charts.js');
		$data['js'] = base_url('assets/custom/customDashboard.js');			
		$data['jumlahdraft']=$this->dm->getCountdraft();
		$data['title']='Dashboard';	
		$data['pilih_tahun']=$data_periode['tahun'];
		$data['pilih_bulan']=$data_periode['bulan'];
		$data['jumlah_draft'] = $this->db->query('SELECT COUNT(*) AS jumlah_draft FROM v_document_upload WHERE status_dokumen=1  AND MONTH(created)=MONTH(now())')->row();
		$data['jumlah_baru'] = $this->db->query('SELECT COUNT(*) AS jumlah_baru FROM v_document_upload WHERE status_dokumen=2  AND MONTH(created)=MONTH(now())')->row();
		$data['jumlah_disetujui'] = $this->db->query('SELECT COUNT(*) AS jumlah_disetujui FROM v_document_upload WHERE status_dokumen=3 AND MONTH(created)=MONTH(now())')->row();
		$data['jumlah_diperbaiki'] = $this->db->query('SELECT COUNT(*) AS jumlah_diperbaiki FROM v_document_upload WHERE status_dokumen=6 AND MONTH(created)=MONTH(now())')->row();
		$data['jumlah_total'] = $this->db->query('SELECT COUNT(*) AS jumlah_total FROM v_document_upload')->row();
		$data['cimsel'] = dashboardeliteWithDate('CIMAHI SELATAN',$data_periode['tahun'],$data_periode['bulan']);
		$data['melas'] = dashboardeliteWithDate('MELONG ASIH',$data_periode['tahun'],$data_periode['bulan']);
		$data['cibeu'] = dashboardeliteWithDate('CIBEUREUM',$data_periode['tahun'],$data_periode['bulan']);
		$data['paskal'] = dashboardeliteWithDate('PASIRKALIKI',$data_periode['tahun'],$data_periode['bulan']);
		$data['cbr'] = dashboardeliteWithDate('CIBEBER',$data_periode['tahun'],$data_periode['bulan']);
		$data['lwg'] = dashboardeliteWithDate('LEUWIGAJAH',$data_periode['tahun'],$data_periode['bulan']);
		$data['meteng'] = dashboardeliteWithDate('MELONG TENGAH',$data_periode['tahun'],$data_periode['bulan']);
		$data['cimteng'] = dashboardeliteWithDate('CIMAHI TENGAH',$data_periode['tahun'],$data_periode['bulan']);
		$data['cgr'] = dashboardeliteWithDate('CIGUGUR TENGAH',$data_periode['tahun'],$data_periode['bulan']);
		$data['pdsk'] = dashboardeliteWithDate('PADASUKA',$data_periode['tahun'],$data_periode['bulan']);
		$data['cimut'] = dashboardeliteWithDate('CIMAHI UTARA',$data_periode['tahun'],$data_periode['bulan']);
		$data['cpgr'] = dashboardeliteWithDate('CIPAGERAN',$data_periode['tahun'],$data_periode['bulan']);
		$data['ctrp'] = dashboardeliteWithDate('CITEUREUP',$data_periode['tahun'],$data_periode['bulan']);
		$data['chartTepat'] = getStatusTepatWaktu('',$data_periode['tahun'],$data_periode['bulan']);
		$this->load->view('dashboard/Index',$data);
	}

	

}
