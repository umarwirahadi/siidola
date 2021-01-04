	<form method="POST" id="formperiode" name="formperiode">
	<div class="item form-group">
		<label class="col-form-label col-md-3 col-sm-3 label-align" for="tahun">Tahun <span class="required">*</span>
		</label>
		<div class="col-md-9 col-sm-9 ">
			<input type="number" id="tahun" required="required" class="form-control" name="tahun">
		</div>
	</div>
	<div class="item form-group">
		<label class="col-form-label col-md-3 col-sm-3 label-align" for="status">Status <span class="required">*</span>
		</label>
		<div class="col-md-9 col-sm-9 ">
			<select class="form-control" name="status" id="status">
				<option value="1">YA</option>
				<option value="0">TIDAK</option>
			</select>
		</div>
	</div>
	<div class="item form-group">
		<label class="col-form-label col-md-3 col-sm-3 label-align" for="isselected">Dipilih ? <span class="required">*</span>
		</label>
		<div class="col-md-9 col-sm-9 ">
			<select class="form-control" name="isselected" id="isselected">
				<option value="1">YA</option>
				<option value="0">TIDAK</option>
			</select>
			<p class="text text-danger">pilih ya untuk tahun berjalan</p>
		</div>
	</div>
	<button type="button" class="btn btn-round btn-danger pull-right" data-dismiss="modal">Close</button>
	<button type="submit" class="btn btn-round btn-primary pull-right" id="saveperiode">Save</button>
	</form>
