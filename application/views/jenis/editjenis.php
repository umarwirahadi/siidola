	<form method="POST" id="frmeditjenis" name="frmeditjenis">
	<div class="item form-group">
		<label class="col-form-label col-md-3 col-sm-3 label-align" for="edit_id_jenis">Jenis dokumen <span class="required">*</span>
		</label>
		<div class="col-md-9 col-sm-9 ">
			<input type="text" id="edit_jenis" required="required" class="form-control" name="edit_jenis" value="">
			<input type="hidden" id="edit_id_jenis" required="required" class="form-control" name="edit_id_jenis" value="">
		</div>
	</div>
	<div class="item form-group">
		<label class="col-form-label col-md-3 col-sm-3 label-align" for="edit_status">Status <span class="required">*</span>
		</label>
		<div class="col-md-9 col-sm-9 ">
			<select class="form-control" name="edit_status" id="edit_status">
				<option value="active">active</option>
				<option value="inactive">inactive</option>
			</select>
		</div>
	</div>
	<button type="button" class="btn btn-round btn-danger pull-right" data-dismiss="modal">Close</button>
	<button type="submit" class="btn btn-round btn-primary pull-right" id="saveBidang">Update</button>
	</form>
