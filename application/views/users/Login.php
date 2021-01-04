<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<style>
body{
	margin:0;
	color:#6a6f8c;
	background:#c8c8c8;
	background-image:url('<?=base_url("assets/image/bg2.jpg")?>');
	/* background-image:linear-gradient(red, yellow); ; */
	background-repeat:no-repeat,repeat ;
	background-size:cover ;
	font:600 16px/18px 'Open Sans',sans-serif;
}
*,:after,:before{box-sizing:border-box}
.clearfix:after,.clearfix:before{content:'';display:table}
.clearfix:after{clear:both;display:block}
a{color:inherit;text-decoration:none}

.login-header{
	color: blue;
	text-align: left;
	width:100%;
	padding: 1em;
	margin:auto;
	margin-bottom: 10px;
	max-width:600px;
	min-height:100px;
	position:relative;
	margin-top: 50px;
	box-shadow:0 12px 15px 0 rgba(0,0,0,.24),0 17px 50px 0 rgba(0,0,0,.19);	
	background-color:greenyellow;
	background-image: linear-gradient(green, azure);
	/* font-size:5vw; */
}
.login-wrap{
	width:100%;
	margin:auto;
	max-width:600px;
	min-height:670px;
	position:relative;
	margin-top: 10px;
	background:url('<?=base_url("assets/image/bg.jpg")?>') no-repeat center;
	box-shadow:0 12px 15px 0 rgba(0,0,0,.24),0 17px 50px 0 rgba(0,0,0,.19);
}
.login-html{
	width:100%;
	height:100%;
	position:absolute;
	padding:90px 70px 50px 70px;
	background:rgba(40,57,101,.9);
}
.login-html .sign-in-htm,
.login-html .sign-up-htm{
	top:0;
	left:0;
	right:0;
	bottom:0;
	position:absolute;
	transform:rotateY(180deg);
	backface-visibility:hidden;
	transition:all .4s linear;
}
.login-html .sign-in,
.login-html .sign-up,
.login-form .group .check{
	display:none;
}
.login-html .tab,
.login-form .group .label,
.login-form .group .button{
	text-transform:uppercase;
}
.login-html .tab{
	font-size:22px;
	margin-right:15px;
	padding-bottom:5px;
	margin:0 15px 10px 0;
	display:inline-block;
	border-bottom:2px solid transparent;
}
.login-html .sign-in:checked + .tab,
.login-html .sign-up:checked + .tab{
	color:#fff;
	border-color:#1161ee;
}
.login-form{
	min-height:345px;
	position:relative;
	perspective:1000px;
	transform-style:preserve-3d;
}
.login-form .group{
	margin-bottom:15px;
}
.login-form .group .label,
.login-form .group .input,
.login-form .group .button{
	width:100%;
	color:#fff;
	display:block;
}
.login-form .group .input,
.login-form .group .button{
	border:none;
	padding:15px 20px;
	border-radius:25px;
	background:rgba(255,255,255,.1);
}
.login-form .group input[data-type="password"]{
	text-security:circle;
	-webkit-text-security:circle;
}
.login-form .group .label{
	color:#aaa;
	font-size:12px;
}
.login-form .group .button{
	background:#1161ee;
}
.login-form .group label .icon{
	width:15px;
	height:15px;
	border-radius:2px;
	position:relative;
	display:inline-block;
	background:rgba(255,255,255,.1);
}
.login-form .group label .icon:before,
.login-form .group label .icon:after{
	content:'';
	width:10px;
	height:2px;
	background:#fff;
	position:absolute;
	transition:all .2s ease-in-out 0s;
}
.login-form .group label .icon:before{
	left:3px;
	width:5px;
	bottom:6px;
	transform:scale(0) rotate(0);
}
.login-form .group label .icon:after{
	top:6px;
	right:0;
	transform:scale(0) rotate(0);
}
.login-form .group .check:checked + label{
	color:#fff;
}
.login-form .group .check:checked + label .icon{
	background:#1161ee;
}
.login-form .group .check:checked + label .icon:before{
	transform:scale(1) rotate(45deg);
}
.login-form .group .check:checked + label .icon:after{
	transform:scale(1) rotate(-45deg);
}
.login-html .sign-in:checked + .tab + .sign-up + .tab + .login-form .sign-in-htm{
	transform:rotate(0);
}
.login-html .sign-up:checked + .tab + .login-form .sign-up-htm{
	transform:rotate(0);
}

.hr{
	height:2px;
	margin:60px 0 50px 0;
	background:rgba(255,255,255,.2);
}
.foot-lnk{
	text-align:center;
}

	</style>
	<title>Login</title>
</head>
<body data-url="<?=site_url()?>">
	<div class="login-header">
		<h2>DINAS KESEHATAN KOTA CIMAHI</h2>
		<h3>Si IDOLA</h3>
		<P>Sistem Informasi Dokumen Laporan Online</P>
	</div>
	
<div class="login-wrap">
	<div class="login-html">
		<input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Log In</label>
		<input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab"></label>
		<div class="login-form">
			<div class="sign-in-htm">
				<?php 
				echo form_open(null,array('method'=>'post','id'=>'form-login'));
				?>
				<div class="group">
					<label for="user" class="label">Username or email</label>
					<input id="username" name="username" type="text" class="input">
				</div>
				<div class="group">
					<label for="pass" class="label">Password</label>
					<input id="pass" name="pass" type="password" class="input" data-type="password">
				</div>
				<div class="group">
					<input type="submit" class="button" value="Login" name="login">
				</div>
				<?=form_close() ?>
				<div class="group">					
					<p>Si-IDOLA v.2.0</p>
					<p>Download panduan</p>
				</div>
			</div>
		</div>
	</div>
</div>
<script src="<?=base_url()?>assets/vendors/jquery/dist/jquery.min.js"></script>
<script src="<?=base_url()?>assets/vendors/sweetalert210.js"></script>
<script>
	
	$(document).ready(function(){
		var url = $("body").attr('data-url');	
		$("#form-login").on("submit", function (e) {
			e.preventDefault();
			$.ajax({
			url: url + 'users/act_login',
			type: 'POST',
			dataType: 'json',
			data: $(this).serialize(),
			success: function (data) {
				console.log(data);
				if (data[0].status === 1) {
					Swal.fire({
					title: 'Login sukses !',
					text: 'Selamat datang di aplikasi SiIDOLA',
					icon: 'success',
					confirmButtonText: 'OK'
					}).then(function(){
						window.location=url;
					})
					
				} else {
					Swal.fire({
					title: 'Login Gagal !',
					text: 'periksa kembali username dan password',
					icon: 'error',
					confirmButtonText: 'OK'
					}).then(function(){
						window.location=url+'users/login';
					})
				}
			}
		});						
		});
	})	
</script>
	</body>
</html>
