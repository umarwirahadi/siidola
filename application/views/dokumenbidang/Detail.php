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
			$bln=array('','Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');		
		?>			
			<div class="row">
				<div class="col-md-6">
					<div class="form-group row">
						<label class="col-form-label col-md-3 col-sm-3">Nama Dokumen</label>
						<div class="col-md-9 col-sm-9">
							<input type="text" class="form-control input-sm" name="nama_dokumen" id="nama_dokumen" value="<?= $detail_data->jenis ?>" disabled>
						</div>
					</div>
				
					<div class="form-group row">
						<label class="col-form-label col-md-3 col-sm-3 ">Periode</label>
						<div class="col-md-9 col-sm-9">
							<input class="form-control" name="periode" id="periode" type="text" value="<?= $bln[$detail_data->bulan] . ' ' . $detail_data->tahun ?>" disabled>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-form-label col-md-3 col-sm-3 ">Bidang</label>
						<div class="col-md-9 col-sm-9">
							<input class="form-control" name="pkm" id="pkm" type="text" value="<?= $detail_data->nama_intansi ?>" disabled>
						</div>
					</div>

				</div>
				<div class="col-md-6">
					<div class="form-group row">
						<label class="col-form-label col-md-3 col-sm-3 ">Tanggal. Upload</label>
						<div class="col-md-9 col-sm-9">
							<input class="form-control" name="tgl_upload" id="tgl_upload" type="text" value="<?= $detail_data->created ?>" disabled>
						</div>
					</div>								
					<div class="form-group row">
						<label class="col-form-label col-md-3 col-sm-3 ">Keterangan</label>
						<div class="col-md-9 col-sm-9">
						<?php 
						echo '<textarea name="" id="" cols="30" rows="3" class="form-control" disabled>';
						echo $detail_data->keterangan;
						echo '</textarea>'
						?>
						</div>
					</div>
				</div>
			</div>
			<hr>

			<div class="table table-responsive">
				<table class="table table-bordered table-hover jambo_table">
					<thead>
						<tr>
							<th style="width: 2%;">No</th>
							<th>File name</th>
							<th>Keterangan</th>
							<th>Catatan dinas</th>
							<th style="width: 20%;">Aksi</th>
						</tr>
					</thead>
					<tbody id="ttanggapan">
						<?php
						if (count($data_file['data']) >= 1) {
							$no = 1;
							foreach ($data_file['data'] as $key) {
						?>
								<tr>
									<th><?= $no ?></th>
									<td><?= $key->file_name ?></td>
									<td><?= $key->catatan_perbaikan ?></td>
									<td><?= $key->deskripsi ?></td>
									<td>
										<a href="<?= site_url('documentbidang/download/' . $key->file_name) ?>" title="Download dokumen" class="btn btn-sm btn-round btn-primary"><span class="fa fa-cloud-download"></span> Download</a>
										<a href="javascript:void(0)" class="btn btn-sm btn-round btn-success" title="Tanggapan" data-iddok="<?= $key->id ?>" id="tanggapan_file"><span class="fa fa-pencil"></span> Tanggapan</a>
									</td>
								</tr>
							<?php
								$no++;
							}
						} else {
							?>
							<tr>
								<td colspan="6" class="alert alert-warning">tidak ada file lampiran</td>
							</tr>
						<?php
						}
						?>

					</tbody>
				</table>
			</div>
			<?= form_open() ?>
			<input type="hidden" name="_id" id="_id" value="<?= $detail_data->id ?>">
			<div class="row">
				<div class="col-md-12">
					<div class="col-md-6 col-sm-6 bg-blue" style="padding-top: 10px;height:250px">
						<div class="form-group row">
							<label class="col-form-label col-md-3 col-sm-3">Update status dokumen</label>
							<div class="col-md-9 col-sm-9">
								<select name="status_dokumen" id="status_dokumen" class="form-control status_dokumen" required>
									<?php echo "<option selected readonly value='" . $detail_data->status_dokumen . "'>" . $detail_data->nama_status . "</option>" ?>
									<?php
									getStatusdokumen();
									?>
								</select>
							</div>

						</div>

						<div class="form-group row">
							<label class="col-form-label col-md-3 col-sm-3">Catatan</label>
							<div class="col-md-9 col-sm-9">
								<?php echo '<textarea name="editor1" id="editor1" class="form-control" rows="6">' . $detail_data->tanggapan . '</textarea>' ?>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-sm-6 alert-danger" style="padding-top:10px;;height:250px">
							<h4><b>Catatan :</b></h4>
							<ol class="">
								<?php
								$data = $this->db->query("select * from ia_status where status='aktif' order by status_id")->result();
								$no = 1;
								foreach ($data as $key) {
								?>
									<li>
										<?= '<b class="text text-green bg-blue">'.$key->nama_status.'</b>-'.$key->desc ?>
									</li>
								<?php
								}
								?>
							</ol>					
					</div>
				</div>		
			</div>
<hr>
				<div class="form-group">
					<div class="col-md-12 col-sm-12">
						<button type="button" class="btn btn-round btn-primary" id="btn_update"><i class="fa fa-save"></i> Update</button>
						<button type="button" onclick="window.history.back()" class="btn btn-round btn-warning"><i class="fa fa-arrow-left"></i> Back</button>
						<!-- 	<button type="button" class="btn btn-round btn-success" id="btn_review" data-id-document="<?= $detail_data->id ?>"><i class="fa fa-thumbs-o-up"></i> Review Dokumen</button> -->
						<button type="button" class="btn btn-round btn-danger pull-right" id="hapus-dokumen" data-id-document="<?= $detail_data->id ?>"><i class="fa fa-trash"></i> Hapus dokumen</button>
						<button type="button" class="btn btn-round bg-blue pull-right" id="loging" data-id-document="<?= $detail_data->id ?>"><i class="fa fa-user"></i> Log user</button>
					</div>
				</div>
			<?= form_close(); ?>
		<?php } ?>
	</div>
</div>

<!-- load modal data tanggapan -->

<div class="modal fade-in tanggapan" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">

			<div class="modal-header">
				<h4 class="modal-title" id="myModalLabel">Tanggapan File Lampiran</h4>
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body" id="tanggapan-files">
				<!-- main form  -->


			</div>
			<div class="modal-footer">
				<div class="col-md-9 col-sm-9">
					<span class="badge badge-danger">Keterangan: Form ini khusus untuk catatan file lampiran (bukan jenis dokumen) </span>
				</div>
				<div class="col-md-3 col-sm-3">
					<button type="button" class="btn btn-round btn-success" id="apdet">Update</button>
					<button type="button" class="btn btn-round btn-danger" data-dismiss="modal">Close</button>
				</div>
			</div>
			<?= form_close() ?>
		</div>
	</div>
</div>


<!-- end load modal data tanggapan -->

<?php
// $this->load->view('dokumen/Review');
$this->load->view('dokumenbidang/Log');
$this->load->view('include/js_Home');
?>

<?php
$this->load->view('include/Footer');
?>
