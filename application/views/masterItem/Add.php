<div class="x_content">
	<div class="form-horizontal form-label-left">
		<form action="#" id="form-addintansi" method="POST">
		<div class="item form-group">
			<label class="col-form-label col-md-3 col-sm-3 label-align" for="jenis">Kategori<span class="required">*</span>
			</label>
			<div class="col-md-9 ">
				<select class="form-control bulan" name="jenis" required id="jenis">
					<option selected disabled>Pilih</option>
					<?php
					getKategori();
					?>
				</select>
			</div>
		</div>
		<div class="item form-group">
			<label class="col-form-label col-md-3 col-sm-3 label-align" for="namaitem">Nama item <span class="required">*</span>
			</label>
			<div class="col-md-9 ">
				<input id="namaitem" class="form-control" type="text" name="namaitem" required>
			</div>
		</div>
		<div class="item form-group">
			<label class="col-form-label col-md-3 col-sm-3 label-align" for="keterangan">Keterangan <span class="required">*</span>
			</label>
			<div class="col-md-9 ">
				<textarea name="keterangan" id="keterangan" cols="30" rows="3" class="form-control"></textarea>
			</div>
		</div>
		<div class="item form-group">
			<label class="col-form-label col-md-3 col-sm-3 label-align" for="TglBerlaku">Tgl. Berlaku <span class="required">*</span>
			</label>
			<div class="col-md-9 ">
				<input id="TglBerlaku" class="form-control" type="date" name="TglBerlaku" required>
			</div>
		</div>
		<div class="item form-group">
			<label class="col-form-label col-md-3 col-sm-3 label-align" for="status">Status<span class="required">*</span>
			</label>
			<div class="col-md-9 ">
				<select class="form-control bulan" name="status" required id="status">
					<option selected disabled>Pilih</option>
					<option value="Active">Active</option>
					<option value="Inactive">Inactive</option>
				</select>
			</div>
		</div>
		<hr>
		<div class="col-md-12 col-sm-12">
			<button type="button" class="btn btn-round btn-danger pull-right" data-dismiss="modal">Close</button>
			<button type="submit" class="btn btn-round btn-success pull-right" id="save-users">Save</button>
		</div>
		</form>
	</div>
</div>
