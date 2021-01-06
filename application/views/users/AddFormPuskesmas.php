<div class="modal fade addPuskesmasDinas" role="dialog" aria-hidden="true">

	<div class="modal-dialog modal-lg">
		<div class="modal-content">

			<div class="modal-header">
				<h4 class="modal-title" id="myModalLabel">Tambah Data Instansi</h4>
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">
				<!-- main form  -->
				<div class="x_content">
					<?php
					$attr = array('class' => 'form-horizontal form-label-left', 'id' => 'form-addintansi','autocomplete'=>'off');
					echo form_open_multipart('', $attr); ?>
					<div class="item form-group">
						<label class="col-form-label col-md-3 col-sm-3 label-align" for="jenis">Jenis instansi<span class="required">*</span>
						</label>
						<div class="col-md-9 ">
							<select class="form-control bulan" name="jenis" required id="jenis">
								<option selected disabled>Pilih</option>
								<option value="PUSKESMAS" >PUSKESMAS</option>
								<option value="DINAS KESEHATAN" >DINAS KESEHATAN</option>
							</select>
						</div>
					</div>
					<div class="item form-group">
						<label class="col-form-label col-md-3 col-sm-3 label-align" for="nama_intansi">Puskesmas/Bidang/Seksi <span class="required">*</span>
						</label>
						<div class="col-md-9 ">
							<input id="nama_intansi" class="form-control" type="text" name="nama_intansi" required>
						</div>
					</div>
					<div class="item form-group">
						<label class="col-form-label col-md-3 col-sm-3 label-align" for="alamat">Alamat <span class="required">*</span>
						</label>
						<div class="col-md-9 ">
							<textarea name="alamat" id="alamat" cols="30" rows="3" class="form-control">
								
							</textarea>							
						</div>
					</div>
					<div class="item form-group">
						<label class="col-form-label col-md-3 col-sm-3 label-align" for="email">email <span class="required">*</span>
						</label>
						<div class="col-md-9 ">
							<input id="email" class="form-control" type="email" name="email" required placeholder="contoh : wowo.trianto@cimahikota.go.id">
						</div>
					</div>
					<div class="item form-group">
						<label class="col-form-label col-md-3 col-sm-3 label-align" for="telp">No. Telp (plus kode area) <span class="required">*</span>
						</label>
						<div class="col-md-9 ">
							<input id="telp" class="form-control" type="text" name="telp">
						</div>
					</div>
					<div class="item form-group">
						<label class="col-form-label col-md-3 col-sm-3 label-align" for="hp">No. Handphone (WA) <span class="required">*</span>
						</label>
						<div class="col-md-9 ">
							<input id="hp" class="form-control" type="text" name="hp">
						</div>
					</div>
					<div class="item form-group">
						<label class="col-form-label col-md-3 col-sm-3 label-align" for="fax">Fax <span class="required">*</span>
						</label>
						<div class="col-md-9 ">
							<input id="fax" class="form-control" type="text" name="fax">
						</div>
					</div>
					<div class="item form-group">
						<label class="col-form-label col-md-3 col-sm-3 label-align" for="website">Website <span class="required">*</span>
						</label>
						<div class="col-md-9 ">
							<input id="website" class="form-control" type="text" name="website">
						</div>
					</div>							
					<div class="item form-group">
						<label class="col-form-label col-md-3 col-sm-3 label-align" for="status">Status<span class="required">*</span>
						</label>
						<div class="col-md-9 ">
							<select class="form-control bulan" name="status" required id="status">
								<option selected disabled>Pilih</option>
								<option value="Active" >Active</option>
								<option value="Inactive" >Inactive</option>
							</select>
						</div>
					</div>
					<hr>
					<div class="col-md-12 col-sm-12">
							<button type="button" class="btn btn-round btn-danger pull-right" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-round btn-success pull-right" id="save-users">Save</button>
					</div>								
					<?= form_close() ?>
				</div>
			</div>			
		</div>
	</div>
</div>
