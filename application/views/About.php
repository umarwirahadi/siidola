<?php
$this->load->view('include/Header');
?>
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
						<div class="col-sm-12">
							<div class="card-box table-responsive">

								<div class="x_content">
									<ul class="nav nav-tabs bar_tabs" id="myTab" role="tablist">
										<li class="nav-item">
											<a class="nav-link active" id="home-tab" data-toggle="tab" href="#draft" role="tab" aria-controls="draft" aria-selected="true">siidola</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" id="profile-tab" data-toggle="tab" href="#diusulkan" role="tab" aria-controls="diusulkan" aria-selected="false">change log</a>
										</li>										
									</ul>
									<div class="tab-content" id="myTabContent">
										<div class="tab-pane fade show active" id="draft" role="tabpanel" aria-labelledby="draft-tab">									
												<div class="table-responsive">
												<table class="table table-striped table-bordered jambo_table bulk_action" id="tb_ajuan" style="width:100%">
													<thead>
														<tr>
															<th>
																<p>
																	SIIDOLA (Sistem Informasi Dokumen Laporan) online, adalah aplikasi berbasis web untuk pengelolaan 
																	laporan dokumen secara berkala dari puskesmas atau seksi dengan memanfaatkan teknologi informasi, sehingga dalam proses pengiriman laporan bisa terukur dan dinilai dari berbagai aspek,
																</p>
																<h4>Tujuan</h4>
																<ul>
																	<li>Efektivitas dan efisiensi dalam  penyerahan laporan dari Puskesmas ke Dinas Kesehatan</li>
																	<li>Integrasi sistem pelaporan Dokumen untuk mencapai manajemen arsip yang baik</li>
																	<li>Kemudahan dalam proses Monitoring semua jenis laporan </li>
																	<li>Menghindari kontak fisik pada masa pandemi (COVID-19)</li>
																</ul>
															</th>
														</tr>
													</thead>
													<tbody id="tbajuan">									
													</tbody>
												</table>
											</div>

										</div>
										<div class="tab-pane fade" id="diusulkan" role="tabpanel" aria-labelledby="profile-tab">
											<div class="table-responsive">
												<table class="table table-striped table-bordered jambo_table bulk_action" id="tb_ajuan" style="width:100%">
													<thead>
														<tr>
															<th style="width: 2%;">NO</th>
															<th>LOG SISTEM</th>
															<th>TANGGAL</th>
															<th>KET</th>
														</tr>														
													</thead>
													<tbody>									
														<tr>
															<td>1</td>
															<td>SiIdola dibuat</td>
															<td>Senin, 7 September 2020</td>
															<td></td>
														</tr>
														<tr>
															<td>2</td>
															<td>
																<p>Penambahan fitur aplikasi :</p>
																<ol>
																	<li>Penambahan fitur dashboard sistem
																	<li>Penambahan fitur filter dokumen pada menu validasi dokumen dinas</li>
																	<li>Penambahan fitur log user pada menu validasi dokumen dinas</li>
																	<li>Penambahan fitur review dokumen pada menu validasi dokumen dinas</li>
																	<li>Penambahan fitur delete dokumen pada menu validasi dokumen dinas</li>
																	<li>Penambahan fitur managemen user dan intansi (dinas dan puskesmas)</li>
																</ol>

																<br>
																<br>
																<p>Update log 5 November 2020</p>
																<ol>
																	<li>perbaikan bug dashboard pie</li>
																	<li>penambahan fitur filter puskesmas pada validasi dokumen</li>
																</ol>
															</td>
															<td>Selasa, 3 November 2020</td>
															<td></td>
														</tr>
														<tr>
															<td>3</td>
															<td>
																<p>Penambahan fitur aplikasi :</p>
																<ol>
																	<li>Pemisahan tab dokumen diajukan dengan disetujui
																	<li>perbaikan bug sistem</li>
																	<li>fitur akses bidang/program upload dokumen</li>
																</ol>
															</td>
															<td>Selasa, xx November 2020</td>
															<td></td>
														</tr>
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
	</div>
</div>

<?php
$this->load->view('uploads/AddUploadModal');
$this->load->view('uploads/UpdateUploadModal');
// $this->load->view('uploads/PenilaianModal');
$this->load->view('include/js_Home');
?>

<script type="text/javascript">

</script>
<?php
$this->load->view('include/Footer');
?>
