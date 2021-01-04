<div class="modal fade addUsers" role="dialog" aria-hidden="true">

	<div class="modal-dialog modal-lg">
		<div class="modal-content">

			<div class="modal-header">
				<h4 class="modal-title" id="myModalLabel">tambah user</h4>
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">
				<!-- main form  -->
				<div class="x_content">
					<?php
					$attr = array('class' => 'form-horizontal form-label-left', 'id' => 'form-adduser','autocomplete'=>'off');
					echo form_open_multipart('', $attr); ?>
					<div class="item form-group">
						<label class="col-form-label col-md-3 col-sm-3 label-align" for="var_key">N.I.P <span class="required">*</span>
						</label>
						<div class="col-md-9 ">
							<input id="var_key" class="form-control" type="text" name="var_key" placeholder="N.I.P">
						</div>
					</div>
					<div class="item form-group">
						<label class="col-form-label col-md-3 col-sm-3 label-align" for="nama_lengkap">Nama lengkap <span class="required">*</span>
						</label>
						<div class="col-md-9 ">
							<input id="nama_lengkap" class="form-control" type="text" name="nama_lengkap" placeholder="nama lengkap">
						</div>
					</div>
					<div class="item form-group">
						<label class="col-form-label col-md-3 col-sm-3 label-align" for="email">Email <span class="required">*</span>
						</label>
						<div class="col-md-9 ">
							<input id="email" class="form-control" type="email" name="email" placeholder="user@cimahikota.go.id">
						</div>
					</div>
					<div class="item form-group">
						<label class="col-form-label col-md-3 col-sm-3 label-align" for="id_puskesmas">Nama Instansi <span class="required">*</span>
						</label>
						<div class="col-md-9 ">
							<select class="form-control bulan" name="instansi" required id="instansi">
								<option selected disabled>Pilih</option>
								<?= getPuskesmas() ?>
							</select>
						</div>
					</div>
					<div class="item form-group">
						<label class="col-form-label col-md-3 col-sm-3 label-align" for="jabatan">Jabatan <span class="required">*</span>
						</label>
						<div class="col-md-9 ">
							<select class="form-control bulan" name="jabatan" required id="jabatan">
								<option selected disabled>Pilih</option>
								<?php getItemByid('JABATAN') ?>
							</select>
						</div>
					</div>
					<div class="item form-group">
						<label class="col-form-label col-md-3 col-sm-3 label-align" for="tipe">Tipe <span class="required">*</span>
						</label>
						<div class="col-md-9 ">
							<select class="form-control bulan" name="tipe" required id="tipe">
								<option selected disabled>Pilih</option>
								<?php getItem('TYPE-USER') ?>
							</select>
						</div>
					</div>
					<hr>
					<div class="item form-group">
						<label class="col-form-label col-md-3 col-sm-3 label-align" for="username">Username <span class="required">*</span>
						</label>
						<div class="col-md-9 ">
							<input id="username" class="form-control" type="text" name="username" placeholder="username" autocomplete="off" required>
						</div>
					</div>
					<div class="item form-group">
						<label class="col-form-label col-md-3 col-sm-3 label-align" for="password">Password <span class="required">*</span>
						</label>
						<div class="col-md-9 ">
							<input id="password" class="form-control" type="password" name="password" placeholder="password" autocomplete="off" required>
						</div>
					</div>
					<hr>
					<div class="item form-group" id="file1">
						<label for="file_source" class="col-form-label col-md-3 col-sm-3 label-align">Foto</label>
						<div class="col-md-9 col-sm-9 ">
							<input type="file" name="file_profile" id="file_profile" class="form-control" accept="image/x-png,image/gif,image/jpeg">
						</div>
					</div>
					<div class="item form-group" id="file1">
						<div class="col-md-12 col-sm-12">
							<button type="submit" class="btn btn-round btn-success pull-right" id="save-users">Save</button>
							<button type="button" class="btn btn-round btn-danger pull-right" data-dismiss="modal">Close</button>
						</div>
					</div>
					<?= form_close() ?>
				</div>
			</div>			
		</div>
	</div>
</div>
