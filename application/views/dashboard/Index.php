<?php
$this->load->view('include/Header');
?>
<div class="col-md-12" >
<div class="row">
		<div class="col-md-12 col-sm-12 ">
			<div class="x_panel">
				<div class="x_title">
					<h2>DASHBOARD SIIDOLA</h2>
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
										<div class="count red"><?=$jumlah_draft->jumlah_draft?></div>
										<span class="count_bottom">selama 1 bulan</span>
									</div>
									<div class="col-md-2  tile_stats_count">
										<span class="count_top"><i class="fa fa-file-pdf-o"></i> Dokumen baru</span>
										<div class="count blue"><?=$jumlah_baru->jumlah_baru?></div>
										<span class="count_bottom">selama 1 bulan</span>
									</div>
									<div class="col-md-2  tile_stats_count">
										<span class="count_top"><i class="fa fa-check-square"></i> Dokumen disetujui</span>
										<div class="count green"><?=$jumlah_disetujui->jumlah_disetujui?></div>
										<span class="count_bottom">selama 1 bulan</span>
									</div>										
									<div class="col-md-2  tile_stats_count">
										<span class="count_top"><i class="fa fa-user"></i> Dokumen tidak sesuai</span>
										<div class="count red"><?=$jumlah_diperbaiki->jumlah_diperbaiki?></div>
										<span class="count_bottom"> From last Week</span>
									</div>
									<div class="col-md-2  tile_stats_count">
										<span class="count_top"><i class="fa fa-user"></i> Dokumen tunda</span>
										<div class="count red">0</div>
										<span class="count_bottom"> selama 1 bulan</span>
									</div>
									<div class="col-md-2  tile_stats_count">
										<span class="count_top"><i class="fa fa-user"></i> Total Dokumen</span>
										<div class="count"><?=$jumlah_total->jumlah_total?></div>
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

</div>

<?php 
$this->load->view('dashboard/Table');
$this->load->view('dashboard/modal');
?>




<?php

$this->load->view('include/js_Home');
?>

<script type="text/javascript">
  $(document).ready(function(){
    //alert('test');
  })
</script>
<?php
$this->load->view('include/Footer');
?>
