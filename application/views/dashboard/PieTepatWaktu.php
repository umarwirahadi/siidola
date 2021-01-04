                <div class="x_panel tile fixed_height_320" style="height: 500px;">
                	<div class="x_title">
                		<h2><small>KETEPATAN WAKTU PENGIRIMAN</small></h2>
                		<ul class="nav navbar-right panel_toolbox">
                			<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                			</li>
                			<li><a class="close-link"><i class="fa fa-close"></i></a>
                			</li>
                		</ul>
                		<div class="clearfix"></div>
                	</div>
                	<div class="x_content">
                		<table class="" style="width:100%">
                			<tbody>
                				<tr>
                					<th style="width:37%;">
                						<p>Grafik</p>
                					</th>
                					<th>
                						<div class="col-lg-7 col-md-7 col-sm-7 ">
                							<p class="">Status</p>
                						</div>
                						<div class="col-lg-5 col-md-5 col-sm-5 ">
                							<p class="">Progress</p>
                						</div>
                					</th>
                				</tr>
                				<tr>
                					<td><iframe class="chartjs-hidden-iframe" style="width: 100%; display: block; border: 0px none; height: 0px; margin: 0px; position: absolute; inset: 0px;" __idm_frm__="40802189313"></iframe>
                						<!-- <canvas class="canvasDoughnut" height="140" width="140" style="margin: 15px 10px 10px 0px; width: 140px; height: 140px;"></canvas> -->
                						<canvas class="pieketepatan" id="pieketepatan" height="140" width="140" style="margin: 15px 10px 10px 0px; width: 140px; height: 140px;"></canvas>
                					</td>
                					<td>
                						<table class="tile_info">
                							<tbody>
                								<tr>
                									<td>
                										<p><i class="fa fa-square green"></i>Tepat waktu </p>
                									</td>
													<td><?=$chartTepat->tepat_waktu?>%
													<input type="hidden" value="<?=$chartTepat->tepat_waktu?>" id="datatepatwaktu">
													</td>
                								</tr>
                								<tr>
                									<td>
                										<p><i class="fa fa-square blue"></i>Terlambat </p>
                									</td>
													<td><?=$chartTepat->terlambat?>%
													<input type="hidden" value="<?=$chartTepat->terlambat?>" id="dataterlambat">
													</td>
                								</tr>
                								<tr>
                									<td>
                										<p><i class="fa fa-square red"></i>Belum Mengirim </p>
                									</td>
													<td>
													<?=$chartTepat->belum_mengirim?>%
													<input type="hidden" value="<?=$chartTepat->belum_mengirim?>" id="databelummengirim">
													</td>                									
                								</tr>
                							</tbody>
                						</table>
                					</td>
                				</tr>
								<tr>
								<td colspan="3">
								<p class="text text-primary">LAPORAN CAPAIAN SPM</p>
								<h6 class="text text-danger">
									Keterangan :  update  <?=date('d M Y')  ?>
								</h6>
								</td>
								</tr>								                			
                			</tbody>
                		</table>
                	</div>
                </div>
