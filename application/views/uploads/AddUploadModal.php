<div class="modal fade addFormupload" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">

			<div class="modal-header">
				<h4 class="modal-title" id="myModalLabel">Upload Dokumen</h4>
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">
				<!-- main form  -->
				<div class="x_content">
					<?php
					$attr = array('class' => 'form-horizontal form-label-left', 'id' => 'form-upload');
					echo form_open_multipart('uploads/do_upload', $attr); ?>
					<div class="item form-group">
						<label class="col-form-label col-md-3 col-sm-3 label-align" for="kategori">Nama Dokumen <span class="required">*</span>
						</label>
						<div class="col-md-9 ">
							<select class="form-control kategori" name="kategori" id="kategori" required>
								<option></option>
								<?php
								foreach ($dokumen as $dok) {
								?>
									<option value="<?= $dok->ID_KATEGORI ?>"><?= $dok->kode . '-' . $dok->NAMA_KATEGORI ?></option>
								<?php
								}
								?>
							</select>
						</div>
					</div>
					<div class="item form-group">
						<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Kelompok <span class="required">*</span>
						</label>
						<div class="col-md-9 col-sm-9 ">
							<input type="text" id="kelompok" name="kelompok" class="form-control" readonly>
							<input type="hidden" id="duedate" name="duedate" class="form-control" readonly>
						</div>
					</div>
					<div class="item form-group">
						<label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Tahun</label>
						<div class="col-md-9 col-sm-9 ">
							<select class="form-control tahun" name="tahun" required id="tahun">
								<option></option>
								<?php getTahunPelaporan() ?>
							</select>
						</div>
					</div>
					<div class="item form-group">
						<label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Bulan</label>
						<div class="col-md-9 col-sm-9 ">
							<select class="form-control bulan" name="bulan" required id="bulan">
								<option></option>
								<option value="0">Januari</option>
								<option value="1">Februari</option>
								<option value="2">Maret</option>
								<option value="3">April</option>
								<option value="4">Mei</option>
								<option value="5">Juni</option>
								<option value="6">Juli</option>
								<option value="7">Agustus</option>
								<option value="8">September</option>
								<option value="9">Oktober</option>
								<option value="10">November</option>
								<option value="11">Desember</option>
							</select>
						</div>
					</div>
					<div class="item form-group">
						<label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Tgl. jatuh tempo </label>
						<div class="col-md-9 col-sm-9 ">
							<input id="jtuhtempo" class="form-control" type="text" name="jtuhtempo" readonly="readonly">
							<input id="originalduedate" class="form-control" type="hidden" name="originalduedate" readonly="readonly">
						</div>
					</div>

					<div class="item form-group">
						<label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Keterangan</label>
						<div class="col-md-9 col-sm-9 ">
							<textarea class="form-control" rows="3" name="keterangan"></textarea>
						</div>
					</div>
					<div id="data-file">
						<div class="item form-group" id="file1">
							<label for="file_source" class="col-form-label col-md-3 col-sm-3 label-align">Dokumen</label>
							<div class="col-md-9 col-sm-9 ">
								<input type="file" name="file_source[]" class="form-control">
								<p class="text text-primary">format : xls,xlsx.doc,docx,pdf,jpg,jpeg,png</p>
							</div>
						</div>
					</div>

					<hr>
					<button type="button" name="tambahDokumen" id="tambahDokumen" class="btn btn-sm btn-primary"><i class="fa fa-plus-square"></i> Tambah dokumen</button>
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