<div class="modal fade uploadFormupload" role="dialog" aria-hidden="true">

	<div class="modal-dialog modal-lg">
		<div class="modal-content">

			<div class="modal-header">
				<h4 class="modal-title" id="myModalLabel">Update Dokumen</h4>
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">
				<!-- main form  -->
				<div class="x_content">
					<?php
					$attr = array('class' => 'form-horizontal form-label-left', 'id' => 'form-upload-update');
					echo form_open_multipart('uploads/do_upload', $attr); ?>
					<input type="hidden" name="id_document" id="id_document" value="">
					<input type="hidden" name="iddok" id="iddok" value="">
					<div class="item form-group">
						<label class="col-form-label col-md-3 col-sm-3 label-align" for="edit_kategori">Nama Dokumen <span class="required">*</span>
						</label>
						<div class="col-md-9 ">
							<input type="text" id="edit_kategori" name="edit_kategori" class="form-control" value="" readonly>
						</div>
					</div>
					<div class="item form-group">
						<label class="col-form-label col-md-3 col-sm-3 label-align" for="edit_kelompok">Kelompok <span class="required">*</span>
						</label>
						<div class="col-md-9 col-sm-9 ">
							<input type="text" id="edit_kelompok" name="edit_kelompok" class="form-control" value="" readonly>
							<input type="hidden" id="edit_duedate" name="edit_duedate" readonly>
						</div>
					</div>
					<div class="item form-group">
						<label for="edit_tahun" class="col-form-label col-md-3 col-sm-3 label-align">Tahun</label>
						<div class="col-md-9 col-sm-9 ">
							<input type="text" name="edit_tahun" id="edit_tahun" value="" readonly class="form-control">
						</div>
					</div>
					<div class="item form-group">
						<label for="edit_bulan" class="col-form-label col-md-3 col-sm-3 label-align">Bulan</label>
						<div class="col-md-9 col-sm-9 ">
							<input type="text" name="edit_bulan" id="edit_bulan" value="" readonly class="form-control">
						</div>
					</div>
					
					<div class="item form-group">
						<label for="edit_jtuhtempo" class="col-form-label col-md-3 col-sm-3 label-align">Tgl. Jatuh tempo</label>
						<div class="col-md-9 col-sm-9 ">
							<input id="edit_jtuhtempo" class="form-control" type="text" name="edit_jtuhtempo" readonly="readonly">
						</div>
					</div>
					<div class="item form-group">
						<label for="status_dudate2" class="col-form-label col-md-3 col-sm-3 label-align">Status jatuh tempo</label>
						<div class="col-md-9 col-sm-9 ">
							<input id="status_dudate2" class="form-control" type="text" name="status_dudate2" readonly="readonly">
						</div>
					</div>
					<div class="item form-group">
						<label for="edit_keterangan" class="col-form-label col-md-3 col-sm-3 label-align">Keterangan</label>
						<div class="col-md-9 col-sm-9 ">
							<textarea class="form-control" rows="3" name="edit_keterangan" id="edit_keterangan"></textarea>
						</div>
					</div>
					<hr>
					<button type="button" name="tambahDokumen_update" id="tambahDokumen_update" class="btn btn-sm btn-primary"><i class="fa fa-plus-square"></i> Tambah dokumen</button>
					<div class="table-responsive" id="data-file">
						<table class="table table-striped jambo_table table-bordered">
							<thead>
								<tr class="headings">
									<th class="column-title" style="width: 20px;">No. </th>
									<th class="column-title" style="width: 200px;">File </th>
									<th class="column-title" style="width: 50px;">Action</th>
								</tr>
							</thead>
							<tbody id="content-file">
							
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-primary btn-round">Update</button>
				<button type="button" class="btn btn-warning btn-round" data-dismiss="modal">Close</button>
			</div>
			<?= form_close() ?>
		</div>
	</div>
</div>
