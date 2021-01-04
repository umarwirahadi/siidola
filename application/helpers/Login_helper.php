<?php 
if(!defined('BASEPATH')) exit('No Direct Script access allowed');

function isLogin()
{
	$ci = &get_instance();
	if(!$ci->session->userdata('ia_users_id')){
		redirect('users/login');
	}
}

function isAdmin()
{
	$ci = &get_instance();
	$user_type=$ci->session->userdata('user_type');
	if($user_type!='ADMIN'){
		redirect('/');
	}
}

function isBidang(){
	$ci = &get_instance();
	$user_type=$ci->session->userdata('user_type');
	if($user_type!='ADMIN'){
		if($user_type!='DINAS'){
		redirect('/');
		}
		// redirect('/');
	}
	// if($user_type!='ADMIN'){
	// 	redirect('/');
	// }
}

function isDinas()
{
	$ci = &get_instance();
	$user_type=$ci->session->userdata('user_type');
	if($user_type!='DINAS'){
		redirect('/');
	}
}

function menuLevel($li='',$peran=null){
	// level bidang di lingkungan dinas seperti kesmas,SDK, dll
	$ci = &get_instance();
	$user_type=$ci->session->userdata('user_type');

	if(isset($peran)){
			if(is_array($peran)){
		if(count($peran)==1){
			if($user_type===$peran[0]){
				echo $li;
			}		
		}
		if(count($peran)==2){
			if($user_type===$peran[0]){
				echo $li;
			}elseif($user_type===$peran[1]){
				echo $li;
			}
		}
		if(count($peran)==3){
			if($user_type===$peran[0]){
				echo $li;
			}elseif($user_type===$peran[1]){
				echo $li;
			}elseif($user_type===$peran[2]){
				echo $li;
			}
		}
	}else{
		if($user_type==$peran){
			echo $li;
		}
	}

	}
	
}


