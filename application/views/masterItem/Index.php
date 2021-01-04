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
						<button class="btn btn-round btn-success" id="addItem">
							<i class="fa fa-plus"></i> Tambah Item
						</button>
						<hr>
						<div class="card-box table-responsive">
							<div class="x_content">
								<div class="table-responsive">
									<table class="table table-striped jambo_table bulk_action" id="master-item">
										<thead>
											<tr>
												<th>NO</th>
												<th>NAMA ITEM</th>
												<th>KATEGORI</th>
												<th>KETERANGAN</th>
												<th>TGL. BERLAKU</th>
												<th>STATUS</th>
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

<!-- modal add  -->

<div class="modal fade addformitem" role="dialog" aria-hidden="true">

	<div class="modal-dialog modal-lg">
		<div class="modal-content">

			<div class="modal-header">
				<h4 class="modal-title" id="myModalLabel">Tambah Data Item</h4>
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">
				<div id="content_form">
					<?php 
					$this->load->view('masteritem/add');					
					?>
				</div>
			</div>
			</div>			
		</div>
	</div>
</div>

<div class="modal fade updateformitem" role="dialog" aria-hidden="true">

	<div class="modal-dialog modal-lg">
		<div class="modal-content">

			<div class="modal-header">
				<h4 class="modal-title" id="myModalLabel">Update Data Item</h4>
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">
				<div id="content_form">
					<?php 
					$this->load->view('masteritem/Update');					
					?>
				</div>
			</div>
			</div>			
		</div>
	</div>
</div>

<?php
$this->load->view('include/js_Home');
?>



<?php
$this->load->view('include/Footer');
?>
