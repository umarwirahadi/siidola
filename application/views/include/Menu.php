<div class="menu_section">	
	<h3>
		<!-- <a href="<?=base_url('users/profile')?>"><span><?=$this->session->userdata('nama_lengkap');?></span></a> -->
		
	</h3>
	<hr>
<h3>
	<p><span><?=$this->session->userdata('nama_lengkap');?></span></p>
	<?php 
	$jenis=$this->session->userdata('jenis');
	if($jenis=='PUSKESMAS'){
		echo 'PKM - '.$this->session->userdata('nama_puskesmas');
	}elseif($jenis=='DINAS KESEHATAN'){
		echo 'DINKES - '.$this->session->userdata('nama_puskesmas');		
	}
	?>
</h3>
	<ul class="nav side-menu">	
	<li><a href="<?=site_url()?>welcome"><i class="fa fa-dashboard"></i> Dashboard</a></li>
	<li><a><i class="fa fa-edit"></i> Transaksi <span class="fa fa-chevron-down"></span></a>
		<ul class="nav child_menu">
			<?php menuLevel('<li><a href="'.site_url().'uploads">Upload dokumen</a></li>',['ADMIN','PUSKESMAS']) ?>
			<?php menuLevel('<li><a href="'.site_url().'uploadbidang">Upload dokumen bidang</a></li>',['ADMIN','DINAS']) ?>
			<?php menuLevel('<li><a href="'.site_url().'upload-sewaktu">Dokumen sewaktu</a></li>') ?>
			<?php menuLevel('<li><a href="'.site_url().'document">Validasi dokumen</a></li>',['ADMIN']) ?>
			<?php menuLevel('<li><a href="'.site_url().'documentbidang">Validasi dokumen bidang</a></li>',['ADMIN']) ?>
			<?php menuLevel('<li><a href="'.site_url().'document">Validasi dokumen sewaktu</a></li>') ?>
		</ul>
	</li>	
	<?php 
	menuLevel('<li><a href="'.site_url().'laporan"><i class="fa fa-file-pdf-o"></i> Laporan Puskesmas</a></li>',['ADMIN','PUSKESMAS']);
	menuLevel('<li><a href="'.site_url().'laporanbidang"><i class="fa fa-laptop"></i> Laporan Bidang</a></li>',['ADMIN','DINAS']);
	?>	
	<li>
	<?php
		menuLevel('<a><i class="fa fa-cog"></i> Setting <span class="fa fa-chevron-down"></span></a>','ADMIN')
	?>
		<ul class="nav child_menu">
			<li><a href="<?=site_url()?>kategori">Dokumen untuk PKM</a></li>
			<li><a href="<?=site_url()?>jenis">Dokumen untuk bidang</a></li>
			<li><a href="<?=site_url()?>items">Master item</a></li>
			<!-- <li><a href="#">Setting mail server</a></li> -->
			<li><a href="<?=site_url()?>periode">Tahun laporan</a></li>			
			<li><a href="<?=site_url()?>users">Data User</a></li>			
		</ul>
	</li>

	<li><a href="<?=site_url()?>informasi"><i class="fa fa-book"></i> informasi</a></li>
	<li><a href="<?=site_url()?>about"><i class="fa fa-info"></i> tentang siidola</a></li>
</ul>
</div>
