<div class="form-horizontal form-label-left">
	<form action="" id="formdokumen" method="POST">
		<div class="item form-group">
			<label class="col-form-label col-md-3 col-sm-3 label-align" for="kode">Kode <span class="required">*</span>
			</label>
			<div class="col-md-9 col-sm-9 ">
				<input type="text" id="kode" required="required" class="form-control" name="kode">
			</div>
		</div>
		<div class="item form-group">
			<label class="col-form-label col-md-3 col-sm-3 label-align" for="kode_idx">Kode IDX <span class="required">*</span>
			</label>
			<div class="col-md-9 col-sm-9 ">
				<input type="text" id="kode_idx" name="kode_idx" required="required" class="form-control ">
			</div>
		</div>
		<div class="item form-group">
			<label class="col-form-label col-md-3 col-sm-3 label-align" for="nama_dokumen">Nama Dokumen <span class="required">*</span>
			</label>
			<div class="col-md-9 col-sm-9 ">
				<input type="text" id="nama_dokumen" required="required" class="form-control" name="nama_dokumen">
			</div>
		</div>
		<div class="item form-group">
			<label class="col-form-label col-md-3 col-sm-3 label-align" for="jatuh_tempo">Jatuh tempo setiap Tgl.  <span class="required">*</span>
			</label>
			<div class="col-md-4 col-sm-4 ">
				<input type="number" id="jatuh_tempo" required="required" class="form-control" name="jatuh_tempo">
			</div>
			<label class="col-form-label col-md-5 col-sm-5" for="jatuh_tempo">Setiap bulannya</label>
		</div>
		<div class="item form-group">
			<label class="col-form-label col-md-3 col-sm-3 label-align" for="id_kelompok">Kelompok <span class="required">*</span>
			</label>
			<div class="col-md-9 col-sm-9 ">
				<select class="form-control" name="id_kelompok" id="id_kelompok">
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
			<label class="col-form-label col-md-3 col-sm-3 label-align" for="status">Status <span class="required">*</span>
			</label>
			<div class="col-md-9 col-sm-9 ">
				<select class="form-control" name="status" id="status">
					<option value="active">Active</option>
					<option value="inactive">Inctive</option>
				</select>
			</div>
		</div>
		<hr>
		<button type="button" class="btn btn-round btn-danger pull-right" data-dismiss="modal">Close</button>
		<button type="submit" class="btn btn-round btn-primary pull-right" id="savedocument">Save</button>
	</form>
</div>
