<div class="modal fade-in form-review-lap" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">			
		<form method="POST" name="form_review" id="form_review">							
			<div class="modal-header">
				<h4 class="modal-title" id="myModalLabel">Review Dokumen</h4>
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="x_content">
					<?php 
					$data=showIndikatorPenilaian();
					$jumlah=count($data);
					?>
				<input type="hidden" value="<?=$jumlah?>" name="count_item">
				<input type="hidden" value="" name="id_dokumen_for_review" id="id_dokumen_for_review">
				<input type="hidden" value="0" name="id_jenis_proses" id="id_jenis_proses">
					<table class="table table-hover jambo_table">
						<thead>
							<tr>
								<td>INDIKATOR PENILAIAN</td>
								<td>STATUS PENILAIAN</td>
								<td>CATATAN</td>
							</tr>						
						</thead>
						<tbody id="data_item_review">
								<?php 
								foreach ($data as $key) {
									?>
									<tr>
									<td>
										<span class="label label-primary"><?=$key->indikator_penilaian?></span>
										<input class="form-control" type="hidden" id="<?=$key->id_indikator?>" name="item<?=$key->id_indikator?>" value="<?=$key->indikator_penilaian?>" readonly>
									</td>
									<td>
										<input type="radio" name="status<?=$key->id_indikator?>" id="status" value="ya" checked><label for="ya" class="text text-primary">Ya</label>
										<input type="radio" name="status<?=$key->id_indikator?>" id="status" value="tidak" <?=$key->id_indikator?> ><label for="tidak" class="text text-danger">Tidak</label>
									</td>
									<td>
										<textarea name="comment<?=$key->id_indikator?>"  cols="20" rows="1" class="form-control"></textarea>
									</td>
									</tr>
									<?php
								}
								?>							
						</tbody>
					</table>			
				</div>
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-round btn-success" id="btn_proses_review">Save</button>
				<button type="button" class="btn btn-round btn-warning" data-dismiss="modal">Close</button>
			</div>
			</form>
		</div>
	</div>
</div>
