<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class UsersModel extends CI_Model {
private $t1 = 'ia_users';
private $_t1 = 'v_ia_users';
private $vlog = 'v_log';

// private $tb_puskesmas='dk_puskesmas';
private $tb_puskesmas='master_intansi';

public function show()
{
	return $this->db->get($this->_t1)->result();	
}


public function showpuskesmasdinas()
{
	$this->db->order_by('created','desc');
	return $this->db->get($this->tb_puskesmas)->result();
}

public function saveinstansi($data=null)
{
	$datapkm=array('nama_intansi'=>$data['nama_intansi'],'jenis'=>$data['jenis'],'alamat'=>$data['alamat'],
					'email'=>$data['email'],'telp'=>$data['telp'],'hp'=>$data['hp'],'fax'=>$data['fax'],'website'=>$data['website'],'status'=>$data['status']);
	$result=$this->db->insert($this->tb_puskesmas,$datapkm);
	if($result){
		return $ares = array('status' =>1,'pesan'=>'intansi berhasil ditambahkan');
	}else{			
		return $ares = array('status' =>0,'pesan'=>'intansi gagal ditambahkan');
	}
}

public function getIntansi($id='')
{
	$aWhere=array('id_intansi'=>$id);
	$result=$this->db->get_where($this->tb_puskesmas,$aWhere);
	if($result){
		return $ares = array('status' =>1,'pesan'=>'Data intansi','data'=>$result->row() );
	}else{			
		return $ares = array('status' =>0,'pesan'=>'Data intansi not found','data'=>null);
	}
}

public function updateIntansiModel($data=null,$id='')
{
	$data_ins=array('jenis'=>$data['edit_jenis'],'nama_intansi'=>$data['edit_nama_intansi'],'alamat'=>$data['edit_alamat'],'email'=>$data['edit_email'],'telp'=>$data['edit_telp'],'hp'=>$data['edit_hp'],'fax'=>$data['edit_fax'],'website'=>$data['edit_website'],'status'=>$data['edit_status']);
	$this->db->where('id_intansi',$id);
	$result=$this->db->update($this->tb_puskesmas, $data_ins);
	if($result) {
			return $ares = array('status' => 1, 'pesan' => 'data intansi berhasil diupdate');
	} else {
			return $ares = array('status' => 0, 'pesan' => 'data intansi gagal diupdate');
	}
		
}
public function deleteinstansi($id_intansi='')
{
	$aWhere=array('id_intansi'=>$id_intansi);
	$result=$this->db->delete($this->tb_puskesmas,$aWhere);
	if($result){
		return $ares = array('status' =>1,'pesan'=>'Data intansi berhasil dihapus' );
	}else{			
		return $ares = array('status' =>0,'pesan'=>'data intansi gagal dihapus' );
	}
}

public function save($data=null)
{
	$datauser=array('nama_lengkap'=>$data['nama_lengkap'],'jabatan_id'=>$data['jabatan_id'],'id_puskesmas'=>$data['id_puskesmas'],'profile_pic'=>$data['profile_pic'],'var_key'=>$data['var_key'],'status'=>'active','is_deleted'=>'0',
					'email'=>$data['email'],'name'=>$data['usrname'],'password'=>password_hash($data['password'],PASSWORD_DEFAULT),'user_type'=>$data['user_type'],'create_date'=>date('Y-m-d'));
	$result=$this->db->insert($this->t1,$datauser);
	if($result){
		return $ares = array('status' =>1,'pesan'=>'user berhasil ditambahkan' );
	}else{			
		return $ares = array('status' =>0,'pesan'=>'user gagal ditambahkan','data'=>null);
	}
}
public function delete($iduser='')
{
	$aWhere=array('ia_users_id'=>$iduser);
	$result=$this->db->delete($this->t1,$aWhere);
	if($result){
		return $ares = array('status' =>1,'pesan'=>'Data user berhasil dihapus' );
	}else{			
		return $ares = array('status' =>0,'pesan'=>'data user gagal dihapus' );
	}
}

public function actLogin($username,$password)
{
	$sql="SELECT * FROM v_ia_users WHERE name=? OR email=? LIMIT 1";
	$data=$this->db->query($sql,array($username,$username));
	if($data->num_rows()===1){
		$data_user=$data->row();		
		$isLogin=password_verify($password,$data_user->password);
		if($isLogin){
			$id_user=$data_user->ia_users_id;
			$sql_get_user="SELECT * FROM v_ia_users WHERE ia_users_id=? LIMIT 1";
			$user_active=$this->db->query($sql_get_user,array($id_user));
			$data_user_dipilih=$user_active->row();
			$user_active2=array('ia_users_id'=>$data_user_dipilih->ia_users_id,'user_id'=>$data_user_dipilih->user_id,'var_key'=>$data_user_dipilih->var_key,
								'status'=>$data_user_dipilih->status_user,'is_deleted'=>$data_user_dipilih->is_deleted,'name'=>$data_user_dipilih->name,'email'=>$data_user_dipilih->email,
								'profile_pic'=>$data_user_dipilih->profile_pic,'user_type'=>$data_user_dipilih->user_type,'create_date'=>$data_user_dipilih->create_date,
								'nama_lengkap'=>$data_user_dipilih->nama_lengkap,'jabatan_id'=>$data_user_dipilih->jabatan_id,'nama_jabatan'=>$data_user_dipilih->nama_jabatan,
								'id_puskesmas'=>$data_user_dipilih->id_puskesmas,'nama_puskesmas'=>$data_user_dipilih->nama_intansi,'jenis'=>$data_user_dipilih->jenis);
			$this->session->set_userdata($user_active2);
			// return true;
			return $ares = array('status' =>1,'pesan'=>'Login berhasil','data'=>$user_active->row());
		}else{
			return $ares = array('status' =>0,'pesan'=>'Login gagal','data'=>null);			
		}
	}else{
		return $ares = array('status' =>0,'pesan'=>'Login gagal, periksa username dan password','data'=>null );
	}
}

public function getProfile($id='')
{
	$aWhere=array('user_id'=>$id);
	$result=$this->db->get_where($this->_t1,$aWhere);
	if($result){
		return $ares = array('status' =>1,'pesan'=>'Success','data'=>$result->row() );
	}else{			
		return $ares = array('status' =>0,'pesan'=>'failed','data'=>null);
	}
}

public function updateProfile($data=null)
{	
	$this->db->set('email',$data['email']);
	$this->db->set('nama_lengkap',$data['nama_lengkap']);
	$this->db->where('user_id',$data['user_id']);
	$hasil_ubah=$this->db->update($this->t1);
	if($hasil_ubah){
		return $ares = array('status' =>1,'pesan'=>'Profil user berhasil diubah','data'=>null);
	}else{
		return $ares = array('status' =>0,'pesan'=>'Profil user gagal diubah','data'=>null);
	}
}

public function getDetailPKM($id='')
{
	$aWhere=array('ID_PUSKESMAS'=>$id);
	$result=$this->db->get_where('dk_puskesmas',$aWhere);
	if($result){
		return $ares = array('status' =>1,'pesan'=>'Data Puskesmas','data'=>$result->row() );
	}else{			
		return $ares = array('status' =>0,'pesan'=>'Data puskesmas not found','data'=>null);
	}
}

public function viewLogUser($user_id='')
{
	$aWhere=array('user_id'=>$user_id);
	$this->db->order_by('tanggal','desc');
	$result=$this->db->get_where($this->vlog,$aWhere,20);
	if($result){
		return $ares = array('status' =>1,'pesan'=>'Data log user ','data'=>$result->result() );
	}else{			
		return $ares = array('status' =>0,'pesan'=>'Data puskesmas not found','data'=>null);
	}
}

public function changepass($data=null)
{
	if($data['password1']==$data['password2']){
		$this->db->set('password',password_hash($data['password2'],PASSWORD_DEFAULT));
		$this->db->where('user_id',$data['user_id']);
		$hasil_ubah=$this->db->update($this->t1);
		if($hasil_ubah){
			return $ares = array('status' =>1,'pesan'=>'Password berhasil diubah','data'=>null);
		}else{
			return $ares = array('status' =>0,'pesan'=>'Password gagal diubah','data'=>null);
		}
	}else{
		return $ares = array('status' =>0,'pesan'=>'konfirmasi password tidak cocok','data'=>null);
	}
}
	
}
/* End of file UsersModel.php */
