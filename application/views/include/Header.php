<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Si Idola| <?= isset($title) ? $title : null ?> </title>

	<!-- Bootstrap -->
	<link href="<?= base_url() ?>assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
	<!-- Font Awesome -->
	<link href="<?= base_url() ?>assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<!-- NProgress -->
	<link href="<?= base_url() ?>assets/vendors/nprogress/nprogress.css" rel="stylesheet">
	<!-- bootstrap-wysiwyg -->
	<link href="<?= base_url() ?>assets/vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">


	<?php
	if (isset($isDatatable)) {
		if ($isDatatable) {
	?>
			<!-- Datatables -->
			<link href="<?= base_url() ?>assets/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
			<link href="<?= base_url() ?>assets/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
			<link href="<?= base_url() ?>assets/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
			<link href="<?= base_url() ?>assets/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
			<link href="<?= base_url() ?>assets/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
	<?php
		}
	}
	?>

	<?php
	if (isset($isSelect2)) {
		if ($isSelect2) {
	?>
			<!-- Select2 -->
			<link href="<?= base_url() ?>assets/vendors/select2/dist/css/select2.min.css" rel="stylesheet">
			<!-- <link href="<?= base_url() ?>assets/vendors/select2/dist/css/select2-bootstrap.min.css" rel="stylesheet"> -->
	<?php
		}
	}
	?>

	<?php 
	if(isset($css_profile)){
		?>
		<link href="<?=$css_profile?>" rel="stylesheet">
		<?php
	}
	
	?>
	<link href="<?= base_url() ?>assets/vendors/pnotify/dist/pnotify.css" rel="stylesheet">
	<link href="<?= base_url() ?>assets/vendors/pnotify/dist/pnotify.buttons.css" rel="stylesheet">
	<link href="<?= base_url() ?>assets/vendors/pnotify/dist/pnotify.nonblock.css" rel="stylesheet">

	<!-- Custom styling plus plugins -->
	<link href="<?= base_url() ?>assets/build/css/custom.min.css" rel="stylesheet">
	<style>
		.select2-container {
			width: 100% !important;
			padding: 0;
		}
	</style>
</head>

<body class="nav-md" data-url="<?= site_url() ?>">
	<div class="container body">
		<div class="main_container">
			<div class="col-md-3 col-sm-6 left_col">
				<div class="left_col scroll-view">
					<div class="navbar nav_title" style="border: 0;">
						<a href="<?=site_url()?>" class="site_title"><i class="fa fa-home"></i> <span>SI-IDOLA</span></a>
					</div>

					<div class="clearfix"></div>

					<!-- menu profile quick info -->
					<div class="profile clearfix">
						<div class="profile_pic">
							<img src="<?= base_url('foto_profil/').$this->session->userdata('profile_pic')?>" alt="..." class="img-circle profile_img">
						</div>
						<div class="profile_info">
							<span>Selamat datang,</span>
							<!-- <a href="<?=base_url('users/profile')?>"><span><?=$this->session->userdata('nama_lengkap');?></span></a> -->
						</div>
					</div>					
					<!-- sidebar menu -->
					<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

						<?php
						$this->load->view('include/Menu');
						?>

					</div>
					<!-- /sidebar menu -->
				</div>
			</div>

			<!-- top navigation -->
			<div class="top_nav">
				<div class="nav_menu">
					<div class="nav toggle">
						<a id="menu_toggle"><i class="fa fa-bars"></i></a>
					</div>
					<nav class="nav navbar-nav">
						<ul class=" navbar-right">
							<li class="nav-item dropdown open" style="padding-left: 15px;">
								<a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
									<img src="<?= base_url() ?>assets/image/user.png" alt="data user"><?=$this->session->userdata('nama_lengkap');?>
								</a>
								<div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
									<a class="dropdown-item" href="<?=base_url('users/profile')?>"><i class="fa fa-user pull-right"></i> Profile</a>
									<a class="dropdown-item" href="<?=base_url('users/changepassword')?>"><i class="fa fa-eye pull-right"></i> Ganti Password</a>
									<a class="dropdown-item" href="<?=base_url('users/logout')?>"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
								</div>
							</li>
						</ul>
					</nav>
				</div>
			</div>
			<div class="right_col" role="main">
