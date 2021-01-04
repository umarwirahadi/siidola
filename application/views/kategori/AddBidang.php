	<?php
	$attr = array('class' => 'form-horizontal form-label-left', 'name' => 'formBidang','id'=>'formBidang');
	echo form_open('kategori/savebidang', $attr);
	?>
	<div class="item form-group">
		<label class="col-form-label col-md-3 col-sm-3 label-align" for="nama_seksi">Nama Seksi <span class="required">*</span>
		</label>
		<div class="col-md-9 col-sm-9 ">
			<input type="text" id="nama_seksi" required="required" class="form-control" name="nama_seksi">
		</div>
	</div>
	<div class="item form-group">
		<label class="col-form-label col-md-3 col-sm-3 label-align" for="nama_bidang">Nama Bidang <span class="required">*</span>
		</label>
		<div class="col-md-9 col-sm-9 ">
			<input type="text" id="nama_bidang" name="nama_bidang" required="required" class="form-control ">
		</div>
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
				<option value="active">active</option>
				<option value="inactive">inactive</option>
			</select>
		</div>
	</div>
	<button type="button" class="btn btn-round btn-danger pull-right" data-dismiss="modal">Close</button>
	<button type="submit" class="btn btn-round btn-primary pull-right" id="saveBidang">Save</button>

	<?= form_close(); ?>
