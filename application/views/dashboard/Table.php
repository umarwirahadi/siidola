<!-- ------------------- -->
	<div class="col-md-8">
		<div class="x_panel">
			<div class=" row x_title">
				<div class="col-md-4 col-sm-4">
					<h2><small>PROGRES LAPORAN PUSKESMAS</small></h2>
				</div>
				<div class="col-md-7 col-sm-8">
					<form action="<?=site_url()?>welcome/periode" method="POST" id="form_dashboard">
					<div class="form-inline">
						<div class="item form-group">
							<label class="col-form-label col-md-3 col-sm-3 label-align" for="tahun">Tahun
							</label>
							<div class="col-md-9 col-sm-9 ">
							<select name="tahun" id="tahun" class="form-control">
								<?php getTahunPelaporan($pilih_tahun) ?>
							</select>
							</div>
						</div>
						<div class="item form-group">
							<label class="col-form-label col-md-3 col-sm-3 label-align" for="bulan">Bulan
							</label>
							<div class="col-md-9 col-sm-9 ">
							<select name="bulan" id="bulan" class="form-control" >
								<?php getBulanPelaporan($pilih_bulan) ?>
							</select>
							</div>
						</div>
						<div class="item form-group">
							</label>
							<div class="col-md-9 col-sm-9 ">
								<button type="submit" class="btn btn-sm btn-primary">Show</button>							
							</div>
						</div>
					</div>
					</form>					
				</div>
				<div class="col-md-1 col-sm-1">
					<ul class="nav navbar-right panel_toolbox">
						<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
						</li>
						<li><a class="close-link"><i class="fa fa-close"></i></a>
						</li>
					</ul>
				</div>

				<div class="clearfix"></div>
			</div>
			<div class="x_content">
			<div class="col-md-12 col-sm-12">
			<?php 
			// echo date('n');
			// echo '<br>';
			// echo date('Y');
			?>
					<!-- pkm cimsel-->
				<div class="widget_summary">
					<div class="w_left w_25">
						<span>1. PKM. CIMAHI SELATAN</span>
					</div>
					<div class="w_center w_55">
						<div class="progress">
							<div class="<?=isset($cimsel->presentase)?warnadashboardelite($cimsel->presentase):'progress-bar bg-red'?>" role="progressbar" aria-valuenow="<?=isset($cimsel->presentase)?number_format($cimsel->presentase,1):'0'?>" aria-valuemin="0" aria-valuemax="100" style="width: <?=isset($cimsel->presentase)?$cimsel->presentase:'4'?>%;">
								<?=isset($cimsel->presentase)?number_format($cimsel->presentase,1):'0'?>%
							</div>
						</div>
					</div>
					<div class="w_right w_20">
						<span><?=isset($cimsel->dokumen_disetujui)?$cimsel->dokumen_disetujui:'0/0 dokumen'?></span>
					</div>
					<div class="clearfix"></div>
				</div>

				<!-- pkm CIBEUREUM-->
				<div class="widget_summary">
					<div class="w_left w_25">
						<span>2. PKM. CIBEUREUM</span>
					</div>
					<div class="w_center w_55">
						<div class="progress">
							<div class="<?=isset($cibeu->presentase)?warnadashboardelite($cibeu->presentase):'progress-bar bg-red'?>" role="progressbar" aria-valuenow="<?=isset($cibeu->presentase)?number_format($cibeu->presentase,1):'0'?>" aria-valuemin="0" aria-valuemax="100" style="width: <?=isset($cibeu->presentase)?$cibeu->presentase:'4'?>%;">
								<?=isset($cibeu->presentase)?number_format($cibeu->presentase,1):'0'?>%
							</div>
						</div>
					</div>
					<div class="w_right w_20">
						<span><?=isset($cibeu->dokumen_disetujui)?$cibeu->dokumen_disetujui:'0/0 dokumen'?></span>
					</div>
					<div class="clearfix"></div>
				</div>
				<!-- pkm CIBEUREUM-->
				<div class="widget_summary">
					<div class="w_left w_25">
						<span>3. PKM. MELONG ASIH</span>
					</div>
					<div class="w_center w_55">
						<div class="progress">
							<div class="<?=isset($melas->presentase)?warnadashboardelite($melas->presentase):'progress-bar bg-red'?>" role="progressbar" aria-valuenow="<?=isset($melas->presentase)?number_format($melas->presentase,1):'0'?>" aria-valuemin="0" aria-valuemax="100" style="width: <?=isset($melas->presentase)?$melas->presentase:'4'?>%;">
								<?=isset($melas->presentase)?number_format($melas->presentase,1):'0'?>%
							</div>
						</div>
					</div>
					<div class="w_right w_20">
						<span><?=isset($melas->dokumen_disetujui)?$melas->dokumen_disetujui:'0/0 dokumen'?></span>
					</div>
					<div class="clearfix"></div>
				</div>
				<!-- pkm PASIRKALIKI-->
				<div class="widget_summary">
					<div class="w_left w_25">
						<span>4. PKM. PASIRKALIKI</span>
					</div>
					<div class="w_center w_55">
						<div class="progress">
							<div class="<?=isset($paskal->presentase)?warnadashboardelite($paskal->presentase):'progress-bar bg-red'?>" role="progressbar" aria-valuenow="<?=isset($paskal->presentase)?number_format($paskal->presentase,1):'0'?>" aria-valuemin="0" aria-valuemax="100" style="width: <?=isset($paskal->presentase)?$paskal->presentase:'4'?>%;">
								<?=isset($paskal->presentase)?number_format($paskal->presentase,1):'0'?>%
							</div>
						</div>
					</div>
					<div class="w_right w_20">
						<span><?=isset($paskal->dokumen_disetujui)?$paskal->dokumen_disetujui:'0/0 dokumen'?></span>
					</div>
					<div class="clearfix"></div>
				</div>
				<!-- pkm CIBEBER-->
				<div class="widget_summary">
					<div class="w_left w_25">
						<span>5. PKM. CIBEBER</span>
					</div>
					<div class="w_center w_55">
						<div class="progress">
							<div class="<?=isset($cbr->presentase)?warnadashboardelite($cbr->presentase):'progress-bar bg-red'?>" role="progressbar" aria-valuenow="<?=isset($cbr->presentase)?number_format($cbr->presentase,1):'0'?>" aria-valuemin="0" aria-valuemax="100" style="width: <?=isset($cbr->presentase)?$cbr->presentase:'4'?>%;">
								<?=isset($cbr->presentase)?number_format($cbr->presentase,1):'0'?>%
							</div>
						</div>
					</div>
					<div class="w_right w_20">
						<span><?=isset($cbr->dokumen_disetujui)?$cbr->dokumen_disetujui:'0/0 dokumen'?></span>
					</div>
					<div class="clearfix"></div>
				</div>
				<!-- pkm LEUWIGAJAH-->
				<div class="widget_summary">
					<div class="w_left w_25">
						<span>6. PKM. LEUWIGAJAH</span>
					</div>
					<div class="w_center w_55">
						<div class="progress">
							<div class="<?=isset($lwg->presentase)?warnadashboardelite($lwg->presentase):'progress-bar bg-red'?>" role="progressbar" aria-valuenow="<?=isset($lwg->presentase)?number_format($lwg->presentase,1):'0'?>" aria-valuemin="0" aria-valuemax="100" style="width: <?=isset($lwg->presentase)?$lwg->presentase:'4'?>%;">
								<?=isset($lwg->presentase)?number_format($lwg->presentase,1):'0'?>%
							</div>
						</div>
					</div>
					<div class="w_right w_20">
						<span><?=isset($lwg->dokumen_disetujui)?$lwg->dokumen_disetujui:'0/0 dokumen'?></span>
					</div>
					<div class="clearfix"></div>
				</div>
				<!-- pkm MELONG TENGAH-->
				<div class="widget_summary">
					<div class="w_left w_25">
						<span>7. PKM. MELONG TENGAH</span>
					</div>
					<div class="w_center w_55">
						<div class="progress">
							<div class="<?=isset($meteng->presentase)?warnadashboardelite($meteng->presentase):'progress-bar bg-red'?>" role="progressbar" aria-valuenow="<?=isset($meteng->presentase)?number_format($meteng->presentase,1):'0'?>" aria-valuemin="0" aria-valuemax="100" style="width: <?=isset($meteng->presentase)?$meteng->presentase:'4'?>%;">
								<?=isset($meteng->presentase)?number_format($meteng->presentase,1):'0'?>%
							</div>
						</div>
					</div>
					<div class="w_right w_20">
						<span><?=isset($meteng->dokumen_disetujui)?$meteng->dokumen_disetujui:'0/0 dokumen'?></span>
					</div>
					<div class="clearfix"></div>
				</div>
				<!-- pkm CIMAHI TENGAH-->
				<div class="widget_summary">
					<div class="w_left w_25">
						<span>8. PKM. CIMAHI TENGAH</span>
					</div>
					<div class="w_center w_55">
						<div class="progress">
							<div class="<?=isset($cimteng->presentase)?warnadashboardelite($cimteng->presentase):'progress-bar bg-red'?>" role="progressbar" aria-valuenow="<?=isset($cimteng->presentase)?number_format($cimteng->presentase,1):'0'?>" aria-valuemin="0" aria-valuemax="100" style="width: <?=isset($cimteng->presentase)?$cimteng->presentase:'4'?>%;">
								<?=isset($cimteng->presentase)?number_format($cimteng->presentase,1):'0'?>%
							</div>
						</div>
					</div>
					<div class="w_right w_20">
						<span><?=isset($cimteng->dokumen_disetujui)?$cimteng->dokumen_disetujui:'0/0 dokumen'?></span>
					</div>
					<div class="clearfix"></div>
				</div>
				<!-- pkm CIGUGUR TENGAH-->
				<div class="widget_summary">
					<div class="w_left w_25">
						<span>9. PKM. CIGUGUR TENGAH</span>
					</div>
					<div class="w_center w_55">
						<div class="progress">
							<div class="<?=isset($cgr->presentase)?warnadashboardelite($cgr->presentase):'progress-bar bg-red'?>" role="progressbar" aria-valuenow="<?=isset($cgr->presentase)?number_format($cgr->presentase,1):'0'?>" aria-valuemin="0" aria-valuemax="100" style="width: <?=isset($cgr->presentase)?$cgr->presentase:'4'?>%;">
								<?=isset($cgr->presentase)?number_format($cgr->presentase,1):'0'?>%
							</div>
						</div>
					</div>
					<div class="w_right w_20">
						<span><?=isset($cgr->dokumen_disetujui)?$cgr->dokumen_disetujui:'0/0 dokumen'?></span>
					</div>
					<div class="clearfix"></div>
				</div>
				<!-- pkm CIGUGUR PADASUKA-->
				<div class="widget_summary">
					<div class="w_left w_25">
						<span>10. PKM. PADASUKA</span>
					</div>
					<div class="w_center w_55">
						<div class="progress">
							<div class="<?=isset($pdsk->presentase)?warnadashboardelite($pdsk->presentase):'progress-bar bg-red'?>" role="progressbar" aria-valuenow="<?=isset($pdsk->presentase)?number_format($pdsk->presentase,1):'0'?>" aria-valuemin="0" aria-valuemax="100" style="width: <?=isset($pdsk->presentase)?$pdsk->presentase:'4'?>%;">
								<?=isset($pdsk->presentase)?number_format($pdsk->presentase,1):'0'?>%
							</div>
						</div>
					</div>
					<div class="w_right w_20">
						<span><?=isset($pdsk->dokumen_disetujui)?$pdsk->dokumen_disetujui:'0/0 dokumen'?></span>
					</div>
					<div class="clearfix"></div>
				</div>
				<!-- pkm CIMAHI UTARA-->
				<div class="widget_summary">
					<div class="w_left w_25">
						<span>11. PKM. CIMAHI UTARA</span>
					</div>
					<div class="w_center w_55">
						<div class="progress">
							<div class="<?=isset($cimut->presentase)?warnadashboardelite($cimut->presentase):'progress-bar bg-red'?>" role="progressbar" aria-valuenow="<?=isset($cimut->presentase)?number_format($cimut->presentase,1):'0'?>" aria-valuemin="0" aria-valuemax="100" style="width: <?=isset($cimut->presentase)?$cimut->presentase:'4'?>%;">
								<?=isset($cimut->presentase)?number_format($cimut->presentase,1):'0'?>%
							</div>
						</div>
					</div>
					<div class="w_right w_20">
						<span><?=isset($cimut->dokumen_disetujui)?$cimut->dokumen_disetujui:'0/0 dokumen'?></span>
					</div>
					<div class="clearfix"></div>
				</div>
				<!-- pkm CIPAGERAN-->
				<div class="widget_summary">
					<div class="w_left w_25">
						<span>12. PKM. CIPAGERAN</span>
					</div>
					<div class="w_center w_55">
						<div class="progress">
							<div class="<?=isset($cpgr->presentase)?warnadashboardelite($cpgr->presentase):'progress-bar bg-red'?>" role="progressbar" aria-valuenow="<?=isset($cpgr->presentase)?number_format($cpgr->presentase,1):'0'?>" aria-valuemin="0" aria-valuemax="100" style="width: <?=isset($cpgr->presentase)?$cpgr->presentase:'4'?>%;">
								<?=isset($cpgr->presentase)?number_format($cpgr->presentase,1):'0'?>%
							</div>
						</div>
					</div>
					<div class="w_right w_20">
						<span><?=isset($cpgr->dokumen_disetujui)?$cpgr->dokumen_disetujui:'0/0 dokumen'?></span>
					</div>
					<div class="clearfix"></div>
				</div>
				<!-- pkm CITEUREUP-->
				<div class="widget_summary">
					<div class="w_left w_25">
						<span>13. PKM. CITEUREUP</span>
					</div>
					<div class="w_center w_55">
						<div class="progress">
							<div class="<?=isset($ctrp->presentase)?warnadashboardelite($ctrp->presentase):'progress-bar bg-red'?>" role="progressbar" aria-valuenow="<?=isset($ctrp->presentase)?number_format($ctrp->presentase,1):'0'?>" aria-valuemin="0" aria-valuemax="100" style="width: <?=isset($ctrp->presentase)?$ctrp->presentase:'4'?>%;">
								<?=isset($ctrp->presentase)?number_format($ctrp->presentase,1):'0'?>%
							</div>
						</div>
					</div>
					<div class="w_right w_20">
						<span><?=isset($ctrp->dokumen_disetujui)?$ctrp->dokumen_disetujui:'0/0 dokumen'?></span>
					</div>
					<div class="clearfix"></div>
				</div>
				<div>
				<p class="text text-danger">Keterangan : Grafik diatas adalah hasil laporan dokumen yang telah dikirim ke Dinas Kesehatan (bukan dokumen draft)</p> 
				</div>
			</div>
			</div>
		</div>
	</div>

	<div class="col-md-4">

<?php
$this->load->view('dashboard/PieTepatWaktu');
?>
	</div>


	<!-- <div class="col-md-4">
		<div class="x_panel">
			<div class="x_title">
				<h2><small>TOP PUSKESMAS</small></h2>
				<ul class="nav navbar-right panel_toolbox">
					<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
					</li>
					<li class="pull-right"><a class="close-link"><i class="fa fa-close"></i></a>
					</li>
				</ul>
				<div class="clearfix"></div>
			</div>
			<ul class="list-unstyled top_profiles scroll-view">
				<li class="media event">
					<a class="pull-left border-aero profile_thumb">
						<i class="fa fa-user aero"></i>
					</a>
					<div class="media-body">
						<a class="title" href="#">PUSKESMAS. CIPAGERAN</a>
						<p><strong>30 </strong> Dokumen dilaporan </p>
						<p> <small>30 dokumen diterima</small>
						</p>
					</div>
				</li>
				<li class="media event">
					<a class="pull-left border-aero profile_thumb">
						<i class="fa fa-user aero"></i>
					</a>
					<div class="media-body">
						<a class="title" href="#">PUSKESMAS. CIGUGUR</a>
						<p><strong>29 </strong> Dokumen dilaporan </p>
						<p> <small>27 dokumen diterima</small>
						</p>
					</div>
				</li>
				<li class="media event">
					<a class="pull-left border-aero profile_thumb">
						<i class="fa fa-user aero"></i>
					</a>
					<div class="media-body">
						<a class="title" href="#">PUSKESMAS. MELONG ASIH</a>
						<p><strong>25 </strong> Dokumen dilaporan </p>
						<p> <small>25 dokumen diterima</small>
						</p>
					</div>
				</li>
				<li class="media event">
					<a class="pull-left border-aero profile_thumb">
						<i class="fa fa-user aero"></i>
					</a>
					<div class="media-body">
						<a class="title" href="#">PUSKESMAS. CIMAHI TENGAH</a>
						<p><strong>23 </strong> Dokumen dilaporan </p>
						<p> <small>20 dokumen diterima</small>
						</p>
					</div>
				</li>
				<li class="media event">
					<a class="pull-left border-aero profile_thumb">
						<i class="fa fa-user aero"></i>
					</a>
					<div class="media-body">
						<a class="title" href="#">PUSKESMAS. PADASUKA</a>
						<p><strong>17 </strong> Dokumen dilaporan </p>
						<p> <small>16 dokumen diterima</small>
						</p>
					</div>
				</li>
			</ul>
		</div>

		
	</div> -->
