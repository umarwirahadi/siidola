
<div class="modal fade addFormPerbaikanFile" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">

			<div class="modal-header">
				<h4 class="modal-title" id="myModalLabel">Perbaikan file </h4>
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">
				<!-- main form  -->
				<div class="x_content">
					<div class="form-horizontal form-label-left">
					<?php
					$attr = array('class' => 'form-horizontal form-label-left', 'id' => 'form-perbaikan-file','name'=>'form-perbaikan-file');
					echo form_open_multipart(null, $attr); ?>

					<div class="item form-group">
						<label class="col-form-label col-md-3 col-sm-3 label-align" for="kategori">ID Document </label>
						<div class="col-md-9 ">
							<input type="hidden" id="idfile" name="idfile" class="form-control" value="">
							<input type="text" id="id_document" name="id_document" class="form-control" readonly value="">
						</div>
					</div>
					<div class="item form-group">
						<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Nama file</label>
						<div class="col-md-9 col-sm-9 ">
							<input type="text" id="file_name" name="file_name" class="form-control" readonly value="">
						</div>
					</div>
					<div class="item form-group">
						<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Tipe file</label>
						<div class="col-md-9 col-sm-9 ">
							<input type="text" id="file_type" name="file_type" class="form-control" readonly value="">
						</div>
					</div>
					<div class="item form-group">
						<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Ukuran file</label>
						<div class="col-md-9 col-sm-9 ">
							<input type="text" id="file_size" name="file_size" class="form-control" readonly value="">
						</div>
					</div>
					<div class="item form-group">
						<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Catatan Dinas</label>
						<div class="col-md-9 col-sm-9 ">
							<input type="text" id="desc" name="desc" class="form-control" readonly value="">
						</div>
					</div>
											
					<div class="item form-group">
						<label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Keterangan <span class="text text-danger">(wajib diisi)</span></label>
						<div class="col-md-9 col-sm-9 ">
							<textarea class="form-control" rows="3" name="keterangan" id="keterangan"	required></textarea>
						</div>
					</div>
					<div id="data-file">
						<div class="item form-group" id="file1">
							<label for="file_source" class="col-form-label col-md-3 col-sm-3 label-align">Dokumen</label>
							<div class="col-md-9 col-sm-9 ">
								<input type="file" name="file_source" class="form-control" required>
								<p class="text text-primary">format : xls,xlsx.doc,docx,pdf,jpg,jpeg,png</p>
							</div>
						</div>
					</div>

					<div class="item form-group">
						<div class="col-md-12 col-sm-12">
							<button type="button" class="btn btn-round btn-danger pull-right" data-dismiss="modal">Close</button>
							<button type="submit" id="btn_update_file" class="btn btn-round btn-success pull-right">Update perbaikan</button>
						</div>
					</div>
				<?php echo form_close() ?>
				</div>
				</div>
			</div>
		</div>
	</div>
</div>
