<?php
$this->load->view('include/Header');
?>
<div class="x_panel">
	<div class="x_title">
		<h2>Detail Dokumen</h2>
		<ul class="nav navbar-right panel_toolbox">
			<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
			</li>
			<li><a class="close-link"><i class="fa fa-close"></i></a>
			</li>
		</ul>
		<div class="clearfix"></div>
	</div>
	<div class="x_content">
		<?php if (isset($detail_data)) {
			$bln=['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];			
		?>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group row">
						<label class="col-form-label col-md-3 col-sm-3">Nama Dokumen</label>
						<div class="col-md-9 col-sm-9">
							<input type="text" class="form-control input-sm" name="document_name" value="<?= $detail_data->jenis ?>" disabled>
							<input type="hidden" class="form-control input-sm" name="id_laporan" id="id_laporan" value="<?= $detail_data->id ?>">
							<input type="hidden" class="form-control input-sm" name="id_dokumen" id="id_dokumen" value="<?= $detail_data->id_document ?>">
						</div>
					</div>				
					<div class="form-group row">
						<label class="col-form-label col-md-3 col-sm-3 ">Periode</label>
						<div class="col-md-9 col-sm-9">
							<input class="form-control" name="bulan" type="text" value="<?= $bln[$detail_data->bulan-1] . ' ' . $detail_data->tahun ?>" disabled>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-form-label col-md-3 col-sm-3">Bidang</label>
						<div class="col-md-9 col-sm-9">
							<input class="form-control" name="nama_puskesmas" type="text" value="<?= $detail_data->nama_intansi ?>" disabled>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-form-label col-md-3 col-sm-3 ">Status document</label>
						<div class="col-md-9 col-sm-9">
							<input class="form-control" name="status_dokumen" type="text" value="<?= $detail_data->nama_status === 'Baru' ? 'Dokumen belum diperiksa' : $detail_data->nama_status ?>" disabled>
						</div>
					</div>

				</div>
				<div class="col-md-6">
					<div class="form-group row">
						<label class="col-form-label col-md-3 col-sm-3 ">Tanggal. Upload</label>
						<div class="col-md-9 col-sm-9">
							<input class="form-control" name="tgl_upload" type="text" value="<?= $detail_data->created ?>" disabled>
						</div>
					</div>
					
					<div class="form-group row">
						<label class="col-form-label col-md-3 col-sm-3 ">Keterangan</label>
						<div class="col-md-9 col-sm-9">
							<?php
							if ($detail_data->status_dokumen == 6) {
							?>
								<input class="form-control" name="keterangan1" id="keterangan1" required="required" type="text" value="<?= $detail_data->keterangan ?>">
							<?php
							} else {
							?>
								<input class="form-control" name="keterangan" required="required" type="text" value="<?= $detail_data->keterangan ?>" disabled>
							<?php
							}
							?>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-form-label col-md-3 col-sm-3 ">Tanggapan Dinas</label>
						<div class="col-md-9 col-sm-9">
							<?php echo '<textarea name="message" cols="30" rows="3" id="message"	disabled class="form-control">' . $detail_data->tanggapan . '</textarea>' ?>
						</div>
					</div>
				</div>
			</div>
			<hr>
			<p class="text text-primary">File lampiran</p>
			<div class="table table-responsive">
				<table class="table table-bordered table-hover jambo_table" id="tableLampiran">
					<thead>
						<tr>
							<th style="width: 3%;">NO</th>
							<th>NAMA FILE</th>
							<th>KETERANGAN</th>
							<th>CATATAN DINAS</th>
							<th style="width:15%">AKSI</th>
						</tr>
					</thead>
					<tbody id="tbfiles">
						<?php
						if (isset($data_files['data2'])) {
							if (count($data_files['data2']) >= 1) {
								$no = 1;
								foreach ($data_files['data2'] as $key) {
						?>
									<tr>
										<th><?= $no ?></th>
										<td><?= $key->file_name ?></td>
										<td><?= $key->catatan_perbaikan ?></td>
										<td><?= $key->deskripsi ?></td>
										<td>
											<a href="<?= site_url('uploadbidang/download/' . $key->file_name) ?>" title="Download dokumen" class="btn btn-sm btn-round btn-primary"><span class="fa fa-cloud-download"></span> download</a>
											<?php
											if ($detail_data->status_dokumen == '6') {
											?>
												<a href="javascript:void(0)" class="btn btn-sm btn-round btn-danger show-perbaikan" data-idfile="<?= $key->id ?>" id="perbaikan_file" title="Perbaiki dokument"><span class="fa fa-pencil"></span> ubah</a>
											<?php
											}
											?>
											<!-- <a href="javascript:void(0)" class="btn btn-sm btn-round btn-success" title="Tanggapan"><span class="fa fa-pencil"></span></a> -->
										</td>
									</tr>
								<?php
									$no++;
								}
							} else {
								?>
								<tr>
									<td colspan="6" class="alert alert-danger">tidak ada file lampiran</td>
								</tr>
							<?php
							}
						} else {
							?>
							<tr>
								<td colspan="6" class="alert alert-danger">tidak ada file lampiran</td>
							</tr>
						<?php
						}
						?>

					</tbody>
				</table>
			</div>
				<div class="form-group">
				<div class="col-md-12">
					<div class="actionBar">
						<?php
						if ($detail_data->status_dokumen == 6) {
						?>
							<button type="button" id="update_perbaikan_form" class="btn btn-success"><i class="fa fa-send"></i> Kirim perbaikan</button>
						<?php
						}
						?>
						<button type="button" onclick="window.history.back()" class="btn btn-warning"><i class="fa fa-close"></i> Back</button>
					</div>
				</div>
			</div>
			
		<?php } ?>

	
		<?php
		$this->load->view('uploads/Perbaikan');
		?>
		</div>
		</div>

		<?php
		$this->load->view('include/js_Home');
		?>
	
		<?php
		$this->load->view('include/Footer');
		?>
