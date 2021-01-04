<div class="modal fade UpdatePuskesmasDinas" role="dialog" aria-hidden="true">

	<div class="modal-dialog modal-lg">
		<div class="modal-content">

			<div class="modal-header">
				<h4 class="modal-title" id="myModalLabel">Update Data Instansi</h4>
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">
				<!-- main form  -->
				<div class="x_content">
					<?php
					$attr = array('class' => 'form-horizontal form-label-left', 'id' => 'form-updateintansi','autocomplete'=>'off');
					echo form_open_multipart('', $attr); ?>
					<input type="hidden" id="edit_id_intansi" name="edit_id_intansi" value="">
					<div class="item form-group">
						<label class="col-form-label col-md-3 col-sm-3 label-align" for="edit_jenis">Jenis instansi<span class="required">*</span>
						</label>
						<div class="col-md-9 ">
							<select class="form-control bulan" name="edit_jenis" required id="edit_jenis">
								<option selected disabled>Pilih</option>
								<option value="PUSKESMAS" >PUSKESMAS</option>
								<option value="DINAS KESEHATAN" >DINAS KESEHATAN</option>
							</select>
						</div>
					</div>
					<div class="item form-group">
						<label class="col-form-label col-md-3 col-sm-3 label-align" for="edit_nama_intansi">Nama Instansi <span class="required">*</span>
						</label>
						<div class="col-md-9 ">
							<input id="edit_nama_intansi" class="form-control" type="text" name="edit_nama_intansi" required value="">
						</div>
					</div>
					<div class="item form-group">
						<label class="col-form-label col-md-3 col-sm-3 label-align" for="edit_alamat">Alamat instansi <span class="required">*</span>
						</label>
						<div class="col-md-9 ">
							<textarea name="edit_alamat" id="edit_alamat" cols="30" rows="3" class="form-control"></textarea>
						</div>
					</div>
					<div class="item form-group">
						<label class="col-form-label col-md-3 col-sm-3 label-align" for="edit_email">email <span class="required">*</span>
						</label>
						<div class="col-md-9 ">
							<input id="edit_email" class="form-control" type="email" name="edit_email" required placeholder="contoh : wowo.trianto@cimahikota.go.id">
						</div>
					</div>
					<div class="item form-group">
						<label class="col-form-label col-md-3 col-sm-3 label-align" for="edit_telp">No. Telp (plus kode area) <span class="required">*</span>
						</label>
						<div class="col-md-9 ">
							<input id="edit_telp" class="form-control" type="text" name="edit_telp">
						</div>
					</div>
					<div class="item form-group">
						<label class="col-form-label col-md-3 col-sm-3 label-align" for="edit_hp">No. Handphone (WA) <span class="required">*</span>
						</label>
						<div class="col-md-9 ">
							<input id="edit_hp" class="form-control" type="text" name="edit_hp">
						</div>
					</div>
					<div class="item form-group">
						<label class="col-form-label col-md-3 col-sm-3 label-align" for="edit_fax">Fax <span class="required">*</span>
						</label>
						<div class="col-md-9 ">
							<input id="edit_fax" class="form-control" type="text" name="edit_fax">
						</div>
					</div>
					<div class="item form-group">
						<label class="col-form-label col-md-3 col-sm-3 label-align" for="edit_website">Website <span class="required">*</span>
						</label>
						<div class="col-md-9 ">
							<input id="edit_website" class="form-control" type="text" name="edit_website">
						</div>
					</div>							
					<div class="item form-group">
						<label class="col-form-label col-md-3 col-sm-3 label-align" for="edit_status">Status<span class="required">*</span>
						</label>
						<div class="col-md-9 ">
							<select class="form-control bulan" name="edit_status" required id="edit_status">
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
