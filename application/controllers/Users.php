<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Users extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('UsersModel', 'um');
	}


	public function index()
	{
		if (!$this->session->userdata('ia_users_id')) {
			redirect('users/login');
		}
		$data['isDatatable'] = true;
		$data['isSelect2'] = true;
		$data['title'] = 'MANAJEMEN USER';
		$data['title3'] = 'MASTER PUSKESMAS DAN DINAS';
		$data['users'] = $this->um->show();
		$data['puskesmasdinas'] = $this->um->showpuskesmasdinas();

		$this->load->view('users/Index', $data);
	}

	public function login()
	{
		$data['title'] = 'Login';
		$this->load->view('users/Login', $data);
	}

	public function act_login()
	{
		$arr = [];
		$username = $this->input->post('username', true);
		$password = $this->input->post('pass', true);
		$hasil = $this->um->actLogin($username, $password);
		if ($hasil['status'] === 1) {
			$arr[] = $hasil;
			echo json_encode($arr);			
		} else {
			$arr[] = $hasil;
			echo json_encode($arr);
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('users/login');
	}

	public function delete()
	{
		$arr = [];
		$idUser = $this->input->post('id', true);
		$data = $this->um->delete($idUser);
		$arr[] = $data;
		echo json_encode($arr);
	}

	public function edit()
	{
		$this->load->view('users/Update');
	}
	public function profile()
	{
		$id_user						= $this->session->userdata('user_id');
		$id_puskesmas					= $this->session->userdata('id_puskesmas');
		$data['isDatatable']			= true;
		$data['isSelect2']				= true;
		$data['title']					= 'Data user';
		// $data['css_profile']=base_url('assets/custom/customuser.css');
		$data['profile']				= $this->um->getProfile($id_user);
		$data['dat_puskesmas']			= $this->um->getDetailPKM($id_puskesmas);
		$data['log_user']				= $this->um->viewLogUser($id_user);
		$this->load->view('users/profile', $data);
	}

	public function updateprofile()
	{
		$arr = [];
		$data = $this->input->post();
		if ($data) {
			$arrData = array('user_id' => $data['user_id'], 'nama_lengkap' => $data['nama_lengkap'], 'email' => $data['email']);
			$result = $this->um->updateProfile($arrData);
			$arr[] = $result;
			echo json_encode($arr);
		} else {
			redirect('/users/profile');
		}
	}

	public function add()
	{
		// $data['title']='Tambah User';
		// $data_user=$this->load->view('users/add', $data,true);
		// echo json_encode($data_user);
		$this->load->view('users/add');
	}

	public function save()
	{
		$temparr = [];
		$dataUserPost = $this->input->post();		
		$config['upload_path']          = './foto_profil/';
		$config['remove_spaces']        = TRUE;
		$config['allowed_types']        = 'jpg|png|jpeg';
		$config['max_size']             = '0';
		$config['overwrite']            = TRUE;
		$config['file_name']            = uniqid();
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		if ($this->upload->do_upload('file_profile')) {
			$data = $this->upload->data();
			$datauser = array('var_key'=>$dataUserPost['var_key'],'nama_lengkap' => $dataUserPost['nama_lengkap'], 'jabatan_id' => $dataUserPost['jabatan'], 'id_puskesmas' => $dataUserPost['instansi'], 
							'email' => $dataUserPost['email'], 'usrname' => $dataUserPost['username'], 'password' => $dataUserPost['password'], 'user_type' => $dataUserPost['tipe'],'profile_pic'=>$data['file_name']);
			$resultSaveFile = $this->um->save($datauser);
			$temparr[] = $resultSaveFile;
		} else {
			$pesan = array('status' => 0, 'pesan' => $this->upload->display_errors());
			$temparr[] = $pesan;
		}	
		echo json_encode($temparr);
	}


	public function changepassword()
	{
		if (!$this->session->userdata('ia_users_id')) {
			redirect('users/login');
		}
		$data['isDatatable'] = true;
		$data['isSelect2'] = true;
		$data['title'] = 'Ganti Password';
		$data['users'] = $this->um->show();
		$this->load->view('users/ChangePassword', $data);
	}

	public function updatePass()
	{
		$arr = [];
		$data = $this->input->post();
		if ($data) {
			$arrData = array('user_id' => $data['user_id'], 'password1' => $data['password1'], 'password2' => $data['password2']);
			$result = $this->um->changepass($arrData);
			$arr[] = $result;
			echo json_encode($arr);
		} else {
			redirect('/users/changepassword');
		}
	}

	public function addFormPkmDinas()
	{
		$this->load->view('users/AddFormPuskesmas', false);
	}

	public function saveintansi()
	{
		$temparr = [];
		$data = $this->input->post();
		$datauser = array('jenis' => $data['jenis'], 'nama_intansi' => $data['nama_intansi'], 'alamat' => $data['alamat'], 'email' => $data['email'], 'telp' => $data['telp'], 'hp' => $data['hp'], 'fax' => $data['fax'], 'website' => $data['website'], 'status' => $data['status']);
		$resultSaveFile = $this->um->saveinstansi($datauser);
		$temparr[] = $resultSaveFile;
		echo json_encode($temparr);
	}
	public function getDetailIntansi()
	{
		$arr = [];
		$id_intansi = $this->input->post('id_intansi', true);
		$res = $this->um->getIntansi($id_intansi);
		$arr[] = $res;
		echo json_encode($arr);
	}

	public function updateintansi()
	{
		$arr = [];
		$data = $this->input->post();
		$id = $data['edit_id_intansi'];
		$res = $this->um->updateIntansiModel($data, $id);
		$arr[] = $res;
		echo json_encode($arr);
	}

	public function deleteintansi()
	{
		$arr = [];
		$id = $this->input->post('id_intansi', true);
		$res = $this->um->deleteinstansi($id);
		$arr[] = $res;
		echo json_encode($arr);
	}
}
/* End of file Users.php */
