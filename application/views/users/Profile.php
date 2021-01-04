<?php
$this->load->view('include/Header');
?>
<div class="clearfix"></div>
<div class="row">
	<div class="col-md-12 col-sm-12 ">
		<div class="x_panel">
			<div class="x_title">
				<h2><?= isset($title) ? $title : null ?></h2>
				<ul class="nav navbar-right panel_toolbox">
					<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
					</li>

					<li><a class="close-link"><i class="fa fa-close"></i></a>
					</li>
				</ul>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<?php
				if (isset($profile)) {
				?>
					<div class="x_content">
						<div class="col-md-3 col-sm-3  profile_left">
							<div class="profile_img">
								<div id="crop-avatar">
									<!-- Current avatar -->
									<img  src="<?= base_url('foto_profil/').$profile['data']->profile_pic ?>" alt="Avatar" title="Change the avatar" height="300" width="300" class="img-circle profile_img">
								</div>
								<!-- <input type="file" class="form-control load-image-baru" name="filepond" accept="image/png, image/jpeg, image/gif" /> -->
							</div>
							<h3><?= $profile['data']->nama_lengkap ?></h3>
							<ul class="list-unstyled user_data">
							<?php 
							if($profile['data']->user_type=='PUSKESMAS'){
								?>
								<li><i class="fa fa-map-marker user-profile-icon"></i> PUSKESMAS <?= $profile['data']->nama_intansi ?></li>
							<?php
							}else{
								?>
							<li><i class="fa fa-map-marker user-profile-icon"></i> DINAS <?= $profile['data']->nama_intansi ?></li>
								<?php

							}
							?>	


								<li>
									<i class="fa fa-at user-profile-icon"></i> <?= $profile['data']->email ?>
								</li>

								<li class="m-top-xs">
									<i class="fa fa-external-link user-profile-icon"></i>
									<a href="https://dinkes.cimahikota.go.id/" target="_blank">www.dinkes.cimahikota.go.id</a>
								</li>
							</ul>
						</div>
						<div class="col-md-9 col-sm-9 ">

							<div class="" role="tabpanel" data-example-id="togglable-tabs">
								<ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
									<li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Profile user</a>
									</li>
									<li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Log aktivitas user</a>
									</li>
								</ul>
								<div id="myTabContent" class="tab-content">
									<div role="tabpanel" class="tab-pane active " id="tab_content1" aria-labelledby="home-tab">
										<form class="form-label-left input_mask" id="form-profile" method="POST">
											<div class="form-group row">
												<label class="col-form-label col-md-3 col-sm-3 ">N.I.P</label>
												<div class="col-md-9 col-sm-9 ">
													<input type="hidden" name="user_id" value="<?= $profile['data']->user_id ?>">
													<input type="text" class="form-control" placeholder="NIP" name="nip" value="<?= $profile['data']->var_key ?>" disabled>
												</div>
											</div>
											<div class="form-group row">
												<label class="col-form-label col-md-3 col-sm-3 ">Nama Lengkap</label>
												<div class="col-md-9 col-sm-9 ">
													<input type="hidden" name="user_id" value="<?= $profile['data']->user_id ?>">
													<input type="text" class="form-control" placeholder="Nama lengkap" name="nama_lengkap" value="<?= $profile['data']->nama_lengkap ?>">
												</div>
											</div>
											<div class="form-group row">
												<label class="col-form-label col-md-3 col-sm-3 ">Jabatan</label>
												<div class="col-md-9 col-sm-9 ">
													<input type="text" class="form-control" placeholder="status user" value="<?= $profile['data']->nama_jabatan ?>" disabled>
												</div>
											</div>
											<div class="form-group row">
												<label class="col-form-label col-md-3 col-sm-3 ">Email</label>
												<div class="col-md-9 col-sm-9 ">
													<input type="text" class="form-control" placeholder="email" value="<?= $profile['data']->email ?>" required name="email">
												</div>
											</div>
											<div class="form-group row">
												<label class="col-form-label col-md-3 col-sm-3 ">Tipe user</label>
												<div class="col-md-9 col-sm-9 ">
													<input type="text" class="form-control" placeholder="tipe user" value="<?= $profile['data']->user_type ?>" disabled>
												</div>
											</div>
											<div class="form-group row">
												<label class="col-form-label col-md-3 col-sm-3">Nama Puskesmas/Intansi</label>
												<div class="col-md-9 col-sm-9 ">
													<input type="text" class="form-control" placeholder="nama puskesmas" value="<?= $profile['status']==1?$profile['data']->nama_intansi:null ?>" disabled>
												</div>
											</div>
											<div class="form-group row">
												<label class="col-form-label col-md-3 col-sm-3 ">No. Handphone</label>
												<div class="col-md-9 col-sm-9 ">
													<input type="text" class="form-control" name="telepon" value="<?= $profile['status']==1?$profile['data']->hp:null ?>" disabled>
												</div>
											</div>										
											<div class="form-group row">
												<label class="col-form-label col-md-3 col-sm-3 ">Posisi</label>
												<div class="col-md-9 col-sm-9 ">
													<input type="text" class="form-control" readonly="readonly" value="<?= $profile['status']==1?$profile['data']->jenis:null ?>">
												</div>
											</div>
											<div class="form-group row">
												<label class="col-form-label col-md-3 col-sm-3 ">Alamat intansi</label>
												<div class="col-md-9 col-sm-9 ">
													<?php
													echo '<textarea readonly class="form-control" name="alamat" id="alamat" cols="30" rows="5">' . trim($profile['status']==1?$profile['data']->alamat:null) . '</textarea>';
													?>
												</div>
											</div>

											<div class="ln_solid"></div>
											<div class="form-group row">
												<div class="col-md-9 col-sm-9  offset-md-3">
													<button type="submit" class="btn btn-success">Update</button>
												</div>
											</div>

										</form>

									</div>
									<div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">

										<!-- start user projects -->
										<table class="data table table-striped ">
											<thead>
												<tr>
													<th>No</th>
													<th>Nama</th>
													<th>keterangan</th>
													<th>Date</th>
												</tr>
											</thead>
											<tbody>
												<?php 
												$no=1;
												foreach ($log_user['data'] as $usr) {
													?>
												<tr>
													<td><?=$no?></td>
													<td><?=$usr->nama_lengkap?></td>
													<td><?=$usr->ket?></td>
													<td><?=$usr->tanggal?></td>													
												</tr>
													<?php
													$no++;
												}
												?>
																						
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
			</div>
		</div>
	</div>
</div>
<?php
}
$this->load->view('include/js_Home');
$this->load->view('include/Footer');
?>
