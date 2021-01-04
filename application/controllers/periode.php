<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Periode extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('periodeModel', 'pm');
		isLogin();
	}

	public function index()
	{
		$data['isDatatable'] = true;
		$data['isSelect2'] = true;
		$data['title'] = 'jenis dokumen';
		$data['maintitle'] = 'Data tahun laporan';
		$data['jenis'] = $this->pm->getAll();
		$data['js'] = base_url('assets/custom/periode.js');

		$this->load->view('periode/index', $data);
	}

	public function save()
	{
		$temparr = [];
		$data = $this->input->post();
		$resultSaveFile = $this->pm->save($data);
		$temparr[] = $resultSaveFile;
		echo json_encode($temparr);
	}

	public function showModalUpdate()
	{
		$arr = [];
		$id = $this->input->post('iddok', true);
		$res = $this->pm->get($id);
		$arr[] = $res;
		echo json_encode($arr);
	}

	public function update()
	{
		$temparr = [];
		$data = $this->input->post();
		$resultSaveFile = $this->pm->update($data);
		$temparr[] = $resultSaveFile;
		echo json_encode($temparr);
	}

	public function delete()
	{
		$arr = [];
		$id = $this->input->post('iditem', true);
		$res = $this->pm->delete($id);
		$arr[] = $res;
		echo json_encode($arr);
	}

}
/* End of file Controllername.php */
