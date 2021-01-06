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
										<a class="nav-link" id="contact-tab" data-toggle="tab" href="#tab3" role="tab" aria-controls="contact" aria-selected="false"><?= isset($title3) ? $title3 : 'tab 3' ?></a>
									</li>
								</ul>
								<div class="tab-content" id="myTabContent">
									<div class="tab-pane fade show active" id="tab1" role="tabpanel" aria-labelledby="draft-tab">
										<a class="btn btn-app add-user-modal" id="addUsers" data-toggle="modal" data-target=".addUsers">
											<i class="fa fa-user"></i> Tambah User
										</a>								
										<hr>
										<div class="table-responsive">
											<table class="table table-striped jambo_table bulk_action" id="data-users">
												<thead>
													<tr>
														<th>NO</th>
														<th>N.I.P</th>
														<th>NAMA LENGKAP</th>
														<th>EMAIL</th>
														<th>USERNAME</th>
														<th>PUSKESMAS/DINAS</th>
														<th>STATUS</th>
														<th>ACTION</th>
													</tr>
												</thead>
												<tbody>
													<?php
													$no = 1;
													foreach ($users as $usr) {
													?>
														<tr>
															<th><?= $no ?></th>
															<td><?= $usr->var_key ?></td>
															<td><?= $usr->nama_lengkap ?></td>
															<td><?= $usr->email ?></td>
															<td><?= $usr->name ?></td>
															<td><?= $usr->nama_intansi ?></td>
															<td><?= $usr->status_user ?></td>
															<td>
																<a href="javascript:void(0)" class="btn btn-sm btn-primary form-update-user" title="edit user"><i class="fa fa-pencil"></i></a>
																<a href="javascript:void(0)" class="btn btn-sm btn-danger delete-record" title="Hapus bidang" data-id="<?= $usr->ia_users_id ?>"><i class="fa fa-trash"></i></a>
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
										<a class="btn btn-app" id="addPkmDns" data-toggle="modal" data-target=".addPuskesmasDinas">
											<i class="fa fa-save"></i> Tambah
										</a>
										<hr>
										<div class="table-responsive">
											<table class="table table-striped jambo_table bulk_action" id="data-puskesmas">
												<thead>
													<tr>
														<th>NO</th>
														<th>NAMA INTANSI</th>
														<th>JENIS</th>
														<th width="300">ALAMAT</th>
														<th>EMAIL</th>
														<th>TELP</th>
														<th>HP</th>
														<th>FAX</th>
														<th>WEBSITE</th>
														<th>STATUS</th>
														<th>ACTION</th>
													</tr>
												</thead>
												<tbody>
													<?php
													$no = 1;
													foreach ($puskesmasdinas as $pkmdns) {
													?>
														<tr>
															<td><?= $no ?></td>
															<td><?= $pkmdns->nama_intansi ?></td>
															<td><?= $pkmdns->jenis ?></td>
															<td><?= $pkmdns->alamat ?></td>
															<td><?= $pkmdns->email ?></td>
															<td><?= $pkmdns->telp ?></td>
															<td><?= $pkmdns->hp ?></td>
															<td><?= $pkmdns->fax ?></td>
															<td><?= $pkmdns->website ?></td>
															<td><?= $pkmdns->status ?></td>
															<td>
																<a href="javascript:void(0)" class="btn btn-sm btn-primary update-record-pkm" data-idintansi="<?= $pkmdns->id_intansi ?>" title="edit puskesmas dan dinas"><i class="fa fa-pencil"></i></a>
																<a href="javascript:void(0)" class="btn btn-sm btn-danger delete-record-pkm" title="Hapus puskesmas dan dinas" data-idintansi="<?= $pkmdns->id_intansi ?>"><i class="fa fa-trash"></i></a>
															</td>
														</tr>

													<?php
														$no++;
													}
													?>
												</tbody>
											</table>
										</div>
										<!-- load data form  puskesmas dan dinas  -->
										<div id="content-pkm">
											<?php 
											$this->load->view('users/AddFormPuskesmas');
											$this->load->view('users/UpdateFormPuskesmas');
											?>
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
$this->load->view('users/Add');
$this->load->view('users/Update');
$this->load->view('include/js_Home');
?>

<script type="text/javascript">
	$(document).ready(function() {
		var url = $("body").attr('data-url');

		$('.delete-record').on("click", function() {
			const idUser = $(this).attr('data-id');
			const fullName = $(this).parent().parent().find('td:eq(1)').text();
			swal({
					title: `Yakin data user ${fullName} akan dihapus ?`,
					text: "periksa terlebih dahulu data yang akan dihapus",
					icon: "warning",
					buttons: true,
					dangerMode: true,
				})
				.then((willDelete) => {
					if (willDelete) {
						$.post(url + 'users/delete', {
							id: idUser
						}).done(function(data) {
							location.reload(true);
						})
					}
				})
		});

		// load controller for edit user 
		$(".form-update-user").on("click",function(){
			$.ajax({
				url:url+'users/edit',
				method:'post',
				success:function(dataa){
					$(".form-modal").html(dataa);
				}				
			}).done(function(){
				$(".update-user").modal("show");
			});			
		})

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
		$("#data-users").DataTable({
			"dom": "<'row '<'col-sm-3'li> <'col-sm-6'f>  <'col-sm-3'B>>    <'row'<'col-sm-12'tr>>    <'row'<'col-sm-12'p>>",
			buttons: {
				buttons: [{
						extend: 'excel',
						className: 'btn btn-sm btn-primary',
						text: '<span class="glyphicon glyphicon-download-alt"></span> Excel',
						title: 'Data User'
					},
					{
						extend: 'pdf',
						className: 'btn btn-sm btn-success',
						text: '<span class="glyphicon glyphicon-cloud-download"></span> PDF',
						title: 'Data User'
					},
					{
						extend: 'print',
						className: 'btn btn-sm btn-danger',
						text: '<span class="glyphicon glyphicon-print"></span> Print',
						title: 'Data User'
					}
				]
			}
		});



	})
</script>
<?php
$this->load->view('include/Footer');
?>
