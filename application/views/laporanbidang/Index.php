<?php
$this->load->view('include/Header');
?>

<div class="clearfix"></div>
<div class="">
<?php 
$jenis_user 	= $this->session->userdata('jenis');					
?>
	<div class="clearfix"></div>
	<div class="row">
		<div class="col-md-12 col-sm-12 ">
			<div class="x_panel">
				<div class="x_title">
					<h2><?= isset($title) ? $title : null ?></h2>
					<ul class="nav navbar-right panel_toolbox">
						<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
						</li>

						<li><a class="close-link"><i class="fa fa-close"></i></a>
						</li>
					</ul>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<?php
					if ($jenis_user == 'DINAS KESEHATAN') {
					?>
					<div class="row">
						<div class="col-md-12">
							<form action="" class="form-horizontal" id="filter_dokumen_form">
								<div class="col-md-1">
									<label for="filter_tahun">Tahun :</label>
									<select name="filter_tahun" id="filter_tahun" class="form-control">
										<option value="" disabled selected>Pilih</option>
										<?php
										getTahunPelaporan()
										?>
									</select>
								</div>
								<div class="col-sm-2">
									<label for="filter_bulan">Bulan :</label>
									<select name="filter_bulan" id="filter_bulan" class="form-control">
										<option value="" disabled selected>Pilih</option>
										<?php
										getBulanPelaporan()
										?>
									</select>
								</div>
								<div class="col-sm-4">
									<label for="filter_dokumen">Dokumen</label>
									<select name="filter_dokumen" id="filter_dokumen" class="form-control">
										<option value="" disabled selected>Pilih</option>
										<?php
										showDocumentBidang()
										?>
									</select>
								</div>
								<div class="col-sm-3">
									<label for="filter_status_dokumen">Bidang/Seksi</label>
									<select name="filter_status_dokumen" id="filter_status_dokumen" class="form-control">
										<option value="" disabled selected>Pilih</option>
										<?php getBidang() ?>
									</select>
								</div>
								<div class="col-sm-2">
									<button type="button" class="btn btn-primary form-control" id="btn-filter"><i class="fa fa-filter"></i> filter</button>
									<button type="button" class="btn btn-danger form-control" id="btn-reset"><i class="fa fa-history"></i> reset</button>
								</div>
							</form>
						</div>
					</div>
					<?php
					}
					if ($jenis_user == 'PUSKESMAS') {
					?>
						<div class="row">
							<div class="col-sm-12">
								<div class="card-box table-responsive">
									<div class="table-responsive">
										<table class="table table-striped table-bordered jambo_table bulk_action" id="tblaporandisetujui">
											<thead>
												<tr class="headings">
													<th>NO</th>
													<th>NAMA DOKUMEN</th>
													<th>KELOMPOK DOKUMEN</th>
													<th>PERIODE </th>
													<th>TGL. UPLOAD</th>
													<th>STATUS</th>
													<th>AKSI</th>
												</tr>
											</thead>
											<tbody>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					<?php
					} elseif ($jenis_user == 'DINAS KESEHATAN') {
					?>
						<div class="row">
							<div class="col-sm-12">
								<div class="card-box table-responsive">
									<div class="table-responsive">
										<table class="table table-striped table-bordered jambo_table bulk_action" id="tblaporandisetujui">
											<thead>
												<tr class="headings">
													<th>NO</th>
													<th>BIDANG/SEKSI</th>
													<th>NAMA DOKUMEN</th>
													<th>PERIODE </th>
													<th>TGL. UPLOAD</th>
													<th>STATUS</th>
													<th>AKSI</th>
												</tr>
											</thead>
											<tbody>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>

					<?php
					}
					?>
				</div>
			</div>
		</div>
	</div>
</div>
</div>


<?php
$this->load->view('laporan/DetailLaporan');
$this->load->view('include/js_Home');
?>

<?php
$this->load->view('include/Footer');
?>
