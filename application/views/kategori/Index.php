<?php
$this->load->view('include/Header');
?>

<div class="clearfix"></div>

<div class="row">
	<div class="col-md-12 col-sm-12 ">
		<div class="x_panel">

			<div class="x_title">
				<h2><?= isset($maintitle) ? $maintitle : null ?></h2>
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
										<a class="nav-link active" id="home-tab" data-toggle="tab" href="#tab1" role="tab" aria-controls="draft" aria-selected="true"><?= isset($title) ? $title : 'tab 1' ?></a>
									</li>
									<li class="nav-item">
										<a class="nav-link" id="profile-tab" data-toggle="tab" href="#tab2" role="tab" aria-controls="diusulkan" aria-selected="false"><?= isset($title2) ? $title2 : 'tab 2' ?></a>
									</li>
									<li class="nav-item">
										<a class="nav-link" id="contact-tab" data-toggle="tab" href="#tab3" role="tab" aria-controls="contact" aria-selected="false"><?= isset($title3) ? $title3 : 'tab 3' ?></a>
									</li>
								</ul>
								<div class="tab-content" id="myTabContent">
									<div class="tab-pane fade show active" id="tab1" role="tabpanel" aria-labelledby="draft-tab">
										<a class="btn btn-app" id="addBidang" data-toggle="modal" data-target=".addBidang">
											<i class="fa fa-save"></i> Tambah
										</a>
										<hr>
										<div class="table-responsive">
											<table class="table table-striped jambo_table bulk_action" id="data-bidang">
												<thead>
													<tr>
														<th>NO</th>
														<th>ID SEKSI</th>
														<th>NAMA SEKSI</th>
														<th>NAMA BIDANG</th>
														<th>ID KEL</th>
														<th>STATUS</th>
														<th>ACTION</th>
													</tr>
												</thead>
												<tbody>
													<?php
													$no = 1;
													foreach ($bidang as $bid) {
													?>
														<tr>
															<th><?= $no ?></th>
															<td><?= $bid->ID_SEKSI ?></td>
															<td><?= $bid->NAMA_SEKSI ?></td>
															<td><?= $bid->NAMA_BIDANG ?></td>
															<td><?= $bid->id_kelompok ?></td>
															<td><?= $bid->STATUS ?></td>
															<td>
																<a href="#" class="btn btn-sm btn-primary" title="edit bidang" data-toggle="modal" data-target=".addBidang"><i class="fa fa-eye"></i></a>
																<a href="#" class="btn btn-sm btn-danger delete-record" title="Hapus bidang" data-idbidang="<?= $bid->ID_SEKSI ?>"><i class="fa fa-trash"></i></a>
															</td>
														</tr>

													<?php
														$no++;
													}
													?>
												</tbody>
											</table>
										</div>

									</div>
									<div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="profile-tab">
										<a class="btn btn-app" id="add_jabatan" data-toggle="modal" data-target=".addKelompok">
											<!-- <a class="btn btn-app" id="addDokumen"> -->
											<i class="fa fa-save"></i> Tambah
										</a>
										<hr>
										<div class="table-responsive">
											<table class="table table-striped jambo_table bulk_action" id="dataKelompok">
												<thead>
													<tr>
														<th>No</th>
														<th>ID KELOMPOK</th>
														<th>NAMA KELOMPOK</th>
														<th>STATUS</th>
														<th>CREATED</th>
														<th>ACTION</th>
													</tr>
												</thead>
												<tbody>
													<?php
													$no = 1;
													foreach ($kelompok as $kel) {
													?>
														<tr>
															<th><?= $no ?></th>
															<td><?= $kel->ID_KELOMPOK ?></td>
															<td><?= $kel->NAMA_KELOMPOK ?></td>
															<td><?= $kel->STATUS ?></td>
															<td><?= $kel->date_added ?></td>
															<td>
																<a href="#" class="btn btn-sm btn-primary" title="Edit"><i class="fa fa-eye"></i></a>
																<a href="#" class="btn btn-sm btn-danger" title="Hapus dokumen"><i class="fa fa-trash"></i></a>
															</td>
														</tr>

													<?php
														$no++;
													}
													?>

												</tbody>
											</table>
										</div>
									</div>
									<div class="tab-pane fade" id="tab3" role="tabpanel" aria-labelledby="contact-tab">
										<!-- <a class="btn btn-app" id="add_jabatan" data-toggle="modal" data-target=".addjabatan"> -->
										<a class="btn btn-app" id="addDokumen">
											<i class="fa fa-save"></i> Tambah
										</a>
										<hr>
										<div class="table-responsive">
											<table class="table table-striped jambo_table table-bordered bulk_action" id="dataKategori">
												<thead>
													<tr>
														<th>NO</th>
														<th>KODE</th>
														<th>NAMA DOKUMEN</th>
														<th>KELOMPOK</th>
														<th>STATUS</th>
														<th>TGL. DIBUAT</th>
														<th>JATUH TEMPO TIAP TGL</th>
														<th>ACTION</th>
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
</div>



<!-- modal form add document  -->
<div class="modal fade addDokumenModal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">

			<div class="modal-header">
				<h4 class="modal-title" id="myModalLabel">Tambah Dokumen</h4>
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">
				<!-- main form  -->
				<div class="x_content">
					<?php
					$this->load->view('kategori/AddKelompok', $kelompok);
					?>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- modal form edit document  -->
<div class="modal fade editDokumenModal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">

			<div class="modal-header">
				<h4 class="modal-title" id="myModalLabel">Edit Dokumen</h4>
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">
				<!-- main form  -->
				<div class="x_content">
					<?php
					$this->load->view('kategori/editKategori', $kelompok);
					?>
				</div>
			</div>
		</div>
	</div>
</div>



<!-- modal form add bidang  -->
<div class="modal fade addBidang" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">

			<div class="modal-header">
				<h4 class="modal-title" id="myModalLabel">Tambah data bidang</h4>
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">
				<!-- main form  -->
				<div class="x_content">
					<?php
					$this->load->view('kategori/AddBidang', $kelompok);
					?>
				</div>
			</div>
		</div>
	</div>
</div>


<div id="add_item">

</div>

<?php
// $this->load->view('kategori/AddBidang');
?>

<?php
$this->load->view('include/js_Home');
?>

<script type="text/javascript">
	$(document).ready(function() {
		var url = $("body").attr('data-url');

		$('.delete-record').on("click", function() {
			const idBidang = $(this).attr('data-idbidang');
			swal({
					title: `Yakin akan dihapus ${idBidang} ?`,
					text: "periksa terlebih dahulu data yang akan dihapus",
					icon: "warning",
					buttons: true,
					dangerMode: true,
				})
				.then((willDelete) => {
					if (willDelete) {
						$.post(url + 'kategori/deleteBidang', {
							idbid: idBidang
						}).done(function(data) {
							location.reload(true);
						})
					}
				})
		});

		// $.notify("Access granted", "success",{position:"left"});


		$("#simpan").click(function() {
			$.post(url + 'kategori/savebidang', function(data) {
				console.log(data);
			})
		});

		$("#dataKelompok").DataTable({
			// "dom": "<'row'<'col-sm-2'li><'col-sm-5'B><'col-sm-4'f>>  <'row'<'col-sm-12'tr>>   <'row'<'col-sm-12'p>>",
			"dom": "<'row '<'col-sm-3'li> <'col-sm-6'f>  <'col-sm-3'B>>    <'row'<'col-sm-12'tr>>    <'row'<'col-sm-12'p>>",
			buttons: {
				buttons: [{
						extend: 'excel',
						className: 'btn btn-sm btn-primary',
						text: '<span class="glyphicon glyphicon-download-alt"></span> Excel',
						title: 'Data Kelompok'
					},
					{
						extend: 'pdf',
						className: 'btn btn-sm btn-success',
						text: '<span class="glyphicon glyphicon-cloud-download"></span> PDF',
						title: 'Data Kelompok'
					},
					{
						extend: 'print',
						className: 'btn btn-sm btn-danger',
						text: '<span class="glyphicon glyphicon-print"></span> Print',
						title: 'Data Kelompok'
					}
				]
			}
		});
		$("#data-bidang").DataTable({
			"dom": "<'row '<'col-sm-3'li> <'col-sm-6'f>  <'col-sm-3'B>>    <'row'<'col-sm-12'tr>>    <'row'<'col-sm-12'p>>",
			buttons: {
				buttons: [{
						extend: 'excel',
						className: 'btn btn-sm btn-primary',
						text: '<span class="glyphicon glyphicon-download-alt"></span> Excel',
						title: 'Data Bidang'
					},
					{
						extend: 'pdf',
						className: 'btn btn-sm btn-success',
						text: '<span class="glyphicon glyphicon-cloud-download"></span> PDF',
						title: 'Data Bidang'
					},
					{
						extend: 'print',
						className: 'btn btn-sm btn-danger',
						text: '<span class="glyphicon glyphicon-print"></span> Print',
						title: 'Data Bidang'
					}
				]
			}
		});

		var tkelas = $("#").DataTable({
			"processing": true,
			"serverSide": true,
			"searching": true,
			"autoWidth": false,
			"order": [],
			// "scrollY":'300px',
			"ajax": {
				url: '<?= site_url() ?>Kategori/fetch',
				type: 'POST',
				data: {
					// filter_tahun: filter_tahun,
					// filter_prodi: filter_prodi,
					// filter_program: filter_program,
					// filter_kelas: filter_kelas
				}
			},
			// "dom": "<'row'<'col-sm-2'li><'col-sm-5'B><'col-sm-4'f>><'row'<'col-sm-12'tr>><'row'<'col-sm-12'p>>",
			"dom": "<'row '<'col-sm-3'li> <'col-sm-6'f>  <'col-sm-3'B>>    <'row'<'col-sm-12'tr>>    <'row'<'col-sm-12'p>>",
			buttons: {
				buttons: [{
						extend: 'excel',
						className: 'btn btn-sm btn-primary',
						text: '<span class="glyphicon glyphicon-download-alt"></span> Excel',
						title: 'Data Kategori'
					},
					{
						extend: 'pdf',
						className: 'btn btn-sm btn-success',
						text: '<span class="glyphicon glyphicon-cloud-download"></span> PDF',
						title: 'Data Kategori'
					},
					{
						extend: 'print',
						className: 'btn btn-sm btn-danger',
						text: '<span class="glyphicon glyphicon-print"></span> Print',
						title: 'Data Kategori'
					}
				]
			},
			"columnDefs": [{
				"targets": [1, 2, 3, 4, 5, 6],
				"orderable": true,
				"searchable": true
			}],
		});


	})
</script>
<?php
$this->load->view('include/Footer');
?>
