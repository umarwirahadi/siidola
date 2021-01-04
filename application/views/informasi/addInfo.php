<div class="modal fade addInfo" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">

			<div class="modal-header">
				<h4 class="modal-title" id="myModalLabel">Tambah informasi</h4>
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">
				<!-- main form  -->
				<div class="x_content">
					<?php
					$attr = array('class' => 'form-horizontal form-label-left', 'id' => 'form-upload');
					echo form_open(null, $attr); ?>
					<div class="item form-group">
						<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Judul <span class="required">*</span>
						</label>
						<div class="col-md-9 col-sm-9 ">
							<input type="text" id="judul" name="judul" class="form-control" >
						</div>
					</div>											
					<div class="item form-group">
						<label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">isi</label>
						<div class="col-md-9 col-sm-9 ">
							<textarea class="form-control" rows="3" name="isi" id="isi"></textarea>
						</div>
					</div>				
					<div class="item form-group">
						<label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Status</label>
						<div class="col-md-9 col-sm-9 ">
							<select name="status" id="status" class="form-control">
								<option value="active">Active</option>
								<option value="inactive">inactive</option>
							</select>
						</div>
					</div>				
					<div class="item form-group">
						<label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">tampil di halaman depan ?</label>
						<div class="col-md-9 col-sm-9 ">
							<select name="showmodal" id="showmodal" class="form-control">
								<option value="1">Ya</option>
								<option value="0">Tidak</option>
							</select>
						</div>
					</div>				
					<div class="item form-group">
						<div class="col-md-12 col-sm-12">
							<button type="button" class="btn btn-round btn-warning pull-right" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-round btn-primary pull-right">Save</button>
						</div>
					</div>
				<?php echo form_close() ?>
				</div>
			</div>
		</div>
	</div>
</div>
