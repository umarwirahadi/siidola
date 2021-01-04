<?php
$this->load->view('include/Header');
?>
<div class="">
	<div class="clearfix"></div>
	<div class="row">
		<div class="col-md-12 col-sm-12 ">
			<div class="x_panel">				
				<div class="x_title">
					<h2><?= isset($maintitle) ? $maintitle : null ?></h2>				
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<div class="row">
						<?php 
						
						echo $this->session->userdata('user_type');
						?>
						<div class="col-sm-12">
							<div class="card-box table-responsive">

								<div class="x_content">
									<ul class="nav nav-tabs bar_tabs" id="myTab" role="tablist">
										<li class="nav-item">
											<a class="nav-link active" id="home-tab" data-toggle="tab" href="#draft" role="tab" aria-controls="draft" aria-selected="true">Draft <span class="badge badge-primary" id="jml1">0</span></a>
										</li>
										<li class="nav-item">
											<a class="nav-link" id="profile-tab" data-toggle="tab" href="#diusulkan" role="tab" aria-controls="diusulkan" aria-selected="false">Ajuan <span class="badge badge-primary" id="jml2">0</span></a>
										</li>										
										<li class="nav-item">
											<a class="nav-link" id="profile-tab" data-toggle="tab" href="#disetujui" role="tab" aria-controls="disetujui" aria-selected="false">Disetujui <span class="badge badge-primary" id="jml3">0</span></a>
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
												<ol>
													<li class="text text-danger">
														Dokumen draft, merupakan dokumen yang belum dikirim, sehingga dokumen ini memungkinkan untuk diubah/ditambah/dihapus pada <a href="javascript:void(0)" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i></a> kolom <b>AKSI</b>
													</li>
													<li class="text text-primary">
														<p>Dokumen ajuan, merupakan dokumen FINAL yang akan divaldasi/diperiksa oleh PROGSI, dokumen ajuan tidak bisa diubah/dihapus, klik <a href="javascript:void(0)" class="btn btn-sm btn-primary"><i class="fa fa-paper-plane"></i></a> untuk mengirim dokumen</p>
													</li>
												</ol>
											</div>
											<div class="table-responsive">
												<table class="table table-striped table-bordered jambo_table bulk_action display" id="draftTable">
													<thead>
														<tr>
															<th>NO</th>
															<th>NAMA DOKUMEN</th>
															<th>PERIODE</th>
															<th>TGL. UPLOAD</th>
															<th>STATUS</th>
															<th>KET.</th>
															<th>AKSI</th>
														</tr>
													</thead>

													<tbody id="tbdraft">
										
													</tbody>
												</table>
											</div>

										</div>
										<div class="tab-pane fade" id="diusulkan" role="tabpanel" aria-labelledby="profile-tab">
											<br>
											<div class="table-responsive">
												<table class="table table-striped table-bordered jambo_table bulk_action" id="tb_ajuan" style="width:100%">
													<thead>
														<tr>
															<th>NO</th>
															<th>NAMA DOKUMEN</th>
															<th>PERIODE</th>
															<th>TGL. UPLOAD</th>
															<th>STATUS</th>
															<th>TANGGAPAN</th>
															<th>AKSI</th>
														</tr>
													</thead>
													<tbody id="tbajuan">									
													</tbody>
												</table>
											</div>
										</div>						
										<div class="tab-pane fade" id="disetujui" role="tabpanel" aria-labelledby="profile-tab">
											<br>
											<div class="table-responsive">
												<table class="table table-striped table-bordered jambo_table bulk_action" id="tb_disetujui" style="width:100%">
													<thead>
														<tr>
															<th>NO</th>
															<th>NAMA DOKUMEN</th>
															<th>PERIODE</th>
															<th>TGL. UPLOAD</th>
															<th>TANGGAPAN</th>
															<th>AKSI</th>
														</tr>
													</thead>
													<tbody id="tbdisetujui">									
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
$this->load->view('uploadbidang/AddUploadModal');
$this->load->view('uploadbidang/UpdateUploadModal');
// $this->load->view('uploads/PenilaianModal');
$this->load->view('include/js_Home');
?>

<script type="text/javascript">

</script>
<?php
$this->load->view('include/Footer');
?>
