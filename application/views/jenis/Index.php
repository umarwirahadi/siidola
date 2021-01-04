<?php
$this->load->view('include/Header');
?>

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
					<div class="col-md-12 col-sm-6">
						<div class="card-box table-responsive">
							<div class="x_content">
							<div class="tab-content" id="myTabContent">
									<div class="tab-pane fade show active" id="tab1" role="tabpanel" aria-labelledby="draft-tab">
										<a class="btn btn-app" id="addBidang" data-toggle="modal" data-target=".addBidang">
											<i class="fa fa-save"></i> Tambah
										</a>
										<div class="table-responsive">
											<table class="table table-striped jambo_table bulk_action" id="datadokumenbidang">
												<thead>
													<tr>
														<th>NO</th>
														<th>KODE JENIS</th>
														<th>NAMA JENIS DOKUMEN</th>
														<th>STATUS</th>
														<th>CREATED</th>
														<th>UPDATED</th>
														<th>ACTION</th>
													</tr>
												</thead>
												<tbody>
													<?php
													$no = 1;
													foreach ($jenis as $jns) {
													?>
														<tr>
															<td><?= $no ?></td>
															<td><?= $jns->id_jenis ?></td>
															<td><?= $jns->jenis ?></td>
															<td><?= $jns->status ?></td>
															<td><?= $jns->created ?></td>
															<td><?= $jns->updated ?></td>
															<td>
																<a href="javascript:void(0)" class="btn btn-sm btn-primary updatedokumen" title="edit bidang" data-iddokumen="<?= $jns->id_jenis ?>"><i class="fa fa-eye"></i></a>
																<a href="javascript:void(0)" class="btn btn-sm btn-danger delete-record" title="Hapus dokumen" data-iddokumen="<?= $jns->id_jenis ?>"><i class="fa fa-trash"></i></a>
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
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>








<!-- modal form add dokumen  -->
<div class="modal fade addBidang" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">

			<div class="modal-header">
				<h4 class="modal-title" id="myModalLabel">Tambah data</h4>
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">
				<!-- main form  -->
				<div class="x_content">
					<?php
					$this->load->view('jenis/addjenis');
					?>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- modal form edit document  -->
<div class="modal fade updatedokumens" tabindex="-1" role="dialog" aria-hidden="true">
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
					$this->load->view('jenis/editjenis');
					?>
				</div>
			</div>
		</div>
	</div>
</div>


<?php
// $this->load->view('kategori/AddBidang');
?>

<?php
$this->load->view('include/js_Home');
?>
<?php
$this->load->view('include/Footer');
?>
