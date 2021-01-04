<div class="modal fade addFormupload" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">

			<div class="modal-header">
				<h4 class="modal-title" id="myModalLabel">Upload Dokumen sewaktu</h4>
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">
				<!-- main form  -->
				<div class="x_content">
					<?php
					$attr = array('class' => 'form-horizontal form-label-left', 'id' => 'form-upload-sewaktu');
					echo form_open_multipart('upload-sewaktu/do_upload', $attr); ?>
													
					<div class="item form-group">
						<label for="namadokumen" class="col-form-label col-md-3 col-sm-3 label-align">Nama dokumen </label>
						<div class="col-md-9 col-sm-9 ">
							<input id="namadokumen" class="form-control" type="text" name="namadokumen" >
						</div>
					</div>

					<div class="item form-group">
						<label for="keterangan" class="col-form-label col-md-3 col-sm-3 label-align">Keterangan</label>
						<div class="col-md-9 col-sm-9 ">
							<textarea class="form-control" rows="3" name="keterangan" id="keterangan"></textarea>
						</div>
					</div>
					<div id="data-file">
						<div class="item form-group" id="file1">
							<label for="file_source" class="col-form-label col-md-3 col-sm-3 label-align">Upload file</label>
							<div class="col-md-9 col-sm-9 ">
								<input type="file" name="file_source[]" class="form-control">
								<p class="text text-primary">format : xls,xlsx.doc,docx,pdf,jpg,jpeg,png</p>
							</div>
						</div>
					</div>

					<hr>
					<button type="button" name="tambahDokumen" id="tambahDokumen" class="btn btn-sm btn-primary"><i class="fa fa-plus-square"></i> Tambah file</button>
					<hr>
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
