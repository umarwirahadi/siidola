	<form method="POST" id="formeditperiode" name="formeditperiode">
	<div class="item form-group">
		<label class="col-form-label col-md-3 col-sm-3 label-align" for="edit_tahun">Tahun <span class="required">*</span>
		</label>
		<div class="col-md-9 col-sm-9 ">
			<input type="text" id="edit_tahun" required="required" class="form-control" name="edit_tahun" value="">
			<input type="hidden" id="edit_id" required="required" class="form-control" name="edit_id" value="">
		</div>
	</div>
	<div class="item form-group">
		<label class="col-form-label col-md-3 col-sm-3 label-align" for="edit_status">Status <span class="required">*</span>
		</label>
		<div class="col-md-9 col-sm-9 ">
			<select class="form-control" name="edit_status" id="edit_status">
				<option value="1">YA</option>
				<option value="0">TIDAK</option>
			</select>
		</div>
	</div>
	<div class="item form-group">
		<label class="col-form-label col-md-3 col-sm-3 label-align" for="edit_isselected">Dipilih ? <span class="required">*</span>
		</label>
		<div class="col-md-9 col-sm-9 ">
			<select class="form-control" name="edit_isselected" id="edit_isselected">
				<option value="1">YA</option>
				<option value="0">TIDAK</option>
			</select>
			<p class="text text-danger">pilih ya untuk tahun berjalan</p>
		</div>
	</div>
	<button type="button" class="btn btn-round btn-danger pull-right" data-dismiss="modal">Close</button>
	<button type="submit" class="btn btn-round btn-primary pull-right" id="btnupdate">Update</button>
	</form>
