	<form method="POST" id="frmjenis" name="frmjenis">
	<div class="item form-group">
		<label class="col-form-label col-md-3 col-sm-3 label-align" for="jenis">Jenis dokumen <span class="required">*</span>
		</label>
		<div class="col-md-9 col-sm-9 ">
			<input type="text" id="jenis" required="required" class="form-control" name="jenis">
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
	</form>
