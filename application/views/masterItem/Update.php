<div class="x_content">
	<div class="form-horizontal form-label-left">
		<form action="#" id="form-updateitem" method="POST">
		<div class="item form-group">
			<label class="col-form-label col-md-3 col-sm-3 label-align" for="edit_jenis">Kategori<span class="required">*</span>
			</label>
			<div class="col-md-9 ">
				<select class="form-control bulan" name="edit_jenis" required id="edit_jenis">
					<option selected disabled>Pilih</option>
					<?php
					getKategori();
					?>
				</select>
			</div>
		</div>
		<div class="item form-group">
			<label class="col-form-label col-md-3 col-sm-3 label-align" for="edit_namaitem">Nama item <span class="required">*</span>
			</label>
			<div class="col-md-9 ">
				<input id="edit_ID" type="hidden" name="edit_ID" required value="">
				<input id="edit_namaitem" class="form-control" type="text" name="edit_namaitem" required>
			</div>
		</div>
		<div class="item form-group">
			<label class="col-form-label col-md-3 col-sm-3 label-align" for="edit_keterangan">Keterangan <span class="required">*</span>
			</label>
			<div class="col-md-9 ">
				<textarea name="edit_keterangan" id="edit_keterangan" cols="30" rows="3" class="form-control"></textarea>
			</div>
		</div>
		<div class="item form-group">
			<label class="col-form-label col-md-3 col-sm-3 label-align" for="edit_TglBerlaku">Tgl. Berlaku <span class="required">*</span>
			</label>
			<div class="col-md-9 ">
				<input id="edit_TglBerlaku" class="form-control" type="date" name="edit_TglBerlaku" required>
			</div>
		</div>
		<div class="item form-group">
			<label class="col-form-label col-md-3 col-sm-3 label-align" for="edit_status">Status<span class="required">*</span>
			</label>
			<div class="col-md-9 ">
				<select class="form-control bulan" name="edit_status" required id="edit_status">
					<option selected disabled>Pilih</option>
					<option value="Active">Active</option>
					<option value="Inactive">Inactive</option>
				</select>
			</div>
		</div>
		<hr>
		<div class="col-md-12 col-sm-12">
			<button type="button" class="btn btn-round btn-danger pull-right" data-dismiss="modal">Close</button>
			<button type="submit" class="btn btn-round btn-success pull-right" id="save-users">Update</button>
		</div>
		</form>
	</div>
</div>
