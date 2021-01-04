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
											<a class="nav-link active" id="home-tab" data-toggle="tab" href="#draft" role="tab" aria-controls="draft" aria-selected="true">Draft</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" id="profile-tab" data-toggle="tab" href="#diusulkan" role="tab" aria-controls="diusulkan" aria-selected="false">Dokumen terkirim</a>
										</li>										
									</ul>
									<div class="tab-content" id="myTabContent">
										<div class="tab-pane fade show active" id="draft" role="tabpanel" aria-labelledby="draft-tab">
											<div class="col-md-1 col-sm-1">
												<a class="btn btn-app" id="addBidang" data-toggle="modal" data-target=".addFormupload">
													<i class="fa fa-cloud-upload"></i> Upload
												</a>											
											</div>
											<div class="col-md-11 col-sm-11">
												Catatan :
												<p class="text text-danger">Dokumen draft, merupakan dokumen yang belum dikirim ke Dinas,  dokumen ini memungkinkan untuk diubah/dihapus pada kolom <b>AKSI</b></p>												
											</div>
											<div class="table-responsive">
												<table class="table table-striped table-bordered jambo_table bulk_action display" id="draftTable" style="width:100%">
													<thead>
														<tr>
															<th style="width: 4%;">NO</th>
															<th>NAMA DOKUMEN</th>
															<th>TGL. UPLOAD</th>
															<th>STATUS</th>
															<th>KET.</th>
															<th style="width: 15%;">AKSI</th>
														</tr>
													</thead>

													<tbody id="tbdraft">
										
													</tbody>
												</table>
											</div>
											<p>
												keterangan : Form Upload dokumen sewaktu merupakan fasilitas pengiriman dokumen sewaktu/hanya jika diminta untuk mengirimkan ke dinas
											</p>
										</div>
										<div class="tab-pane fade" id="diusulkan" role="tabpanel" aria-labelledby="profile-tab">
											<br>
											<div class="table-responsive">
												<table class="table table-striped table-bordered jambo_table bulk_action" id="tb_ajuan" style="width:100%">
													<thead>
														<tr>
															<th>NO</th>
															<th>NAMA DOKUMEN</th>
															<th>TGL. UPLOAD</th>
															<th>STATUS</th>
															<th>KETERANGAN</th>
															<th>AKSI</th>
														</tr>
													</thead>
													<tbody id="tbajuan">									
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
$this->load->view('upload2/AddUploadModal');
$this->load->view('upload2/UpdateUploadModal');
$this->load->view('include/js_Home');
?>

<?php
$this->load->view('include/Footer');
?>
