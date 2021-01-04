<div class="form-horizontal form-label-left">
	<form action="" id="formupdatedokumen" method="POST">
		<div class="item form-group">
			<label class="col-form-label col-md-3 col-sm-3 label-align" for="edit_kode">Kode <span class="required">*</span>
			</label>
			<div class="col-md-9 col-sm-9 ">
				<input type="hidden" id="ID_KATEGORI" required="required" class="form-control" name="ID_KATEGORI" value="">
				<input type="text" id="edit_kode" required="required" class="form-control" name="edit_kode" value="">
			</div>
		</div>
		<div class="item form-group">
			<label class="col-form-label col-md-3 col-sm-3 label-align" for="edit_kode_idx">Kode IDX <span class="required">*</span>
			</label>
			<div class="col-md-9 col-sm-9 ">
				<input type="text" id="edit_kode_idx" name="edit_kode_idx" required="required" class="form-control ">
			</div>
		</div>
		<div class="item form-group">
			<label class="col-form-label col-md-3 col-sm-3 label-align" for="edit_nama_dokumen">Nama Dokumen <span class="required">*</span>
			</label>
			<div class="col-md-9 col-sm-9 ">
				<input type="text" id="edit_nama_dokumen" required="required" class="form-control" name="edit_nama_dokumen">
			</div>
		</div>
			<div class="item form-group">
			<label class="col-form-label col-md-3 col-sm-3 label-align" for="edit_jatuh_tempo">Jatuh tempo setiap Tgl.  <span class="required">*</span>
			</label>
			<div class="col-md-4 col-sm-4 ">
				<input type="number" id="edit_jatuh_tempo" required="required" class="form-control" name="edit_jatuh_tempo">
			</div>
			<label class="col-form-label col-md-5 col-sm-5" for="jatuh_tempo">Setiap bulannya</label>
		</div>
		<div class="item form-group">
			<label class="col-form-label col-md-3 col-sm-3 label-align" for="edit_id_kelompok">Kelompok <span class="required">*</span>
			</label>
			<div class="col-md-9 col-sm-9 ">
				<select class="form-control" name="edit_id_kelompok" id="edit_id_kelompok">
					<option selected readonly disabled>Pilih</option>
					<?php
					foreach ($kelompok as $kel) {
					?>
						<option value="<?= $kel->ID_KELOMPOK ?>"><?= $kel->NAMA_KELOMPOK ?></option>
					<?php
					}
					?>
				</select>
			</div>
		</div>
		<div class="item form-group">
			<label class="col-form-label col-md-3 col-sm-3 label-align" for="edit_status">Status <span class="required">*</span>
			</label>
			<div class="col-md-9 col-sm-9 ">
				<select class="form-control" name="edit_status" id="edit_status">
					<option value="active">Active</option>
					<option value="inactive">Inctive</option>
				</select>
			</div>
		</div>
		<hr>
		<button type="button" class="btn btn-round btn-danger pull-right" data-dismiss="modal">Close</button>
		<button type="submit" class="btn btn-round btn-primary pull-right" id="updatedokumen">Update</button>
	</form>
</div>
