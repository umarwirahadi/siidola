<?php
$this->load->view('include/Header');
?>

<div class="">
	<div class="clearfix"></div>
	<div class="row">
		<div class="col-md-12 col-sm-12 ">
			<div class="x_panel">

				<div class="x_title">
					<h2>Status Upload berkas bidang/seksi</h2>
					<ul class="nav navbar-right panel_toolbox">
						<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
						</li>

						<li><a class="close-link"><i class="fa fa-close"></i></a>
						</li>
					</ul>
					<div class="clearfix"></div>
				</div>

				<div class="x_content">
					<div class="row">
						<div class="col-sm-12">
							<div class="row" style="display: inline-block;width: 100%;">
								<div class="tile_count">
									<div class="col-md-2  tile_stats_count">
										<span class="count_top"><i class="fa fa-pencil"></i> Dokumen draft</span>
										<div class="count red"><?= $jumlah_draft->jumlah_draft ?></div>
										<span class="count_bottom">draft masih di bidang</span>
									</div>
									<div class="col-md-2  tile_stats_count">
										<span class="count_top"><i class="fa fa-file-pdf-o"></i> Dokumen baru</span>
										<div class="count blue"><?= $jumlah_baru->jumlah_baru ?></div>
										<span class="count_bottom"><?= $jumlah_baru->jumlah_baru == 0 ? 'belum ada dokumen yang dikirim' : 'belum divalidasi dinas' ?></span>
									</div>
									<div class="col-md-2  tile_stats_count">
										<span class="count_top"><i class="fa fa-check-square"></i> Dokumen disetujui</span>
										<div class="count green"><?= $jumlah_disetujui->jumlah_disetujui ?></div>
										<span class="count_bottom">telah divalidasi</span>
									</div>
									<div class="col-md-2  tile_stats_count">
										<span class="count_top"><i class="fa fa-user"></i> Dokumen diperbaiki</span>
										<div class="count red"><?= $jumlah_diperbaiki->jumlah_diperbaiki ?></div>
										<span class="count_bottom"> </span>
									</div>
									<div class="col-md-2  tile_stats_count">
										<span class="count_top"><i class="fa fa-user"></i> Dokumen tunda</span>
										<div class="count red">0</div>
										<span class="count_bottom"></span>
									</div>
									<div class="col-md-2  tile_stats_count">
										<span class="count_top"><i class="fa fa-user"></i> Total Dokumen</span>
										<div class="count"><?= $jumlah_total->jumlah_total ?></div>
										<span class="count_bottom"> Total keseluruhan dokumen</span>
									</div>
								</div>
							</div>

						</div>
					</div>

				</div>
			</div>

		</div>
	</div>


	<div class="">
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
								<div class="col-sm-1">
									<label for="filter_status_dokumen">Status</label>
									<select name="filter_status_dokumen" id="filter_status_dokumen" class="form-control">
									<option value="" disabled selected>Pilih</option>
									<?php 
									getStatusdokumen();
									?>
										<!-- <option value="Terlambat">Terlambat</option>
										<option value="Tepat waktu">Tepat waktu</option> -->
									</select>
								</div>
								<div class="col-sm-2">
									<label for="filter_puskesmas">Bidang/Seksi</label>
									<select name="filter_puskesmas" id="filter_puskesmas" class="form-control">
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
						<hr>
						<div class="row">
							<div class="col-12">
								<div class="table-responsive">
									<div class="form form-inline">

									</div>
									<table class="table table-striped table-bordered jambo_table bulk_action" id="tb_ajuan">
										<thead>
											<tr class="headings">
												<th>NO</th>
												<th>NAMA DOKUMEN</th>
												<th>PERIODE </th>
												<th>TGL. UPLOAD </th>
												<th>BIDANG/SEKSI</th>
												<th>STATUS DOKUMEN</th>
												<th>KET</th>
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

				</div>
			</div>


		</div>

	</div>
</div>
</div>

<?php
// $this->load->view('dokumenbidang/Review');
?>



<?php
$this->load->view('include/js_Home');
?>

<?php
$this->load->view('include/Footer');
?>
