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
											<a class="nav-link active" id="home-tab" data-toggle="tab" href="#draft" role="tab" aria-controls="draft" aria-selected="true">Informasi</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" id="profile-tab" data-toggle="tab" href="#diusulkan" role="tab" aria-controls="diusulkan" aria-selected="false">Format dokumen</a>
										</li>										
									</ul>
									<div class="tab-content" id="myTabContent">
										<div class="tab-pane fade show active" id="draft" role="tabpanel" aria-labelledby="draft-tab">
											<?php 
											$jenis_user 	= $this->session->userdata('nama_intansi');

											if($jenis_user=='PROGSI'){											
											?>
											<a class="btn btn-app" id="addInfo" data-toggle="modal" data-target=".addInfo">
												<i class="fa fa-plus"></i> Tambah
											</a>
											<?php } ?>
											<div class="table-responsive">
												<table class="table table-striped table-bordered jambo_table bulk_action display" id="tinfo" style="width:100%">
													<thead>
														<tr>
															<th style="width: 5% ;">NO</th>
															<th style="width: 15%;">JUDUL</th>
															<th style="width: 45%;">INFORMASI</th>
															<th style="width: 10%;">TANGGAL</th>
															<th style="width: 10%;">STATUS</th>
															<th style="width: 7%;">AKSI</th>
														</tr>
													</thead>

													<tbody id="tbinformasi">
										
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
															<th class="column-title">NO</th>
															<th class="column-title">NAMA DOKUMEN</th>
															<th class="column-title">TGL. BERLAKU</th>
															<th class="column-title">DOWNLOAD</th>
															<th class="column-title">STATUS</th>
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

$this->load->view('informasi/addInfo');
$this->load->view('informasi/update');
$this->load->view('include/js_Home');
?>

<script type="text/javascript">

</script>
<?php
$this->load->view('include/Footer');
?>
