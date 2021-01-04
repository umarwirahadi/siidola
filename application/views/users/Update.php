<div class="modal fade update-user" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">

			<div class="modal-header">
				<h4 class="modal-title" id="myModalLabel">Data User</h4>
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">
				<!-- main form  -->
				<div class="x_content">
					<br>
					<?php
					$attr = array('class' => 'form-horizontal form-label-left', 'name' => 'formUpdateUser');
					echo form_open('kategori/savebidang', $attr);
					?>
					<div class="item form-group">
						<label class="col-form-label col-md-3 col-sm-3 label-align" for="fullName">Nama Seksi <span class="required">*</span>
						</label>
						<div class="col-md-9 col-sm-9 ">
							<input type="text" id="fullName" required="required" class="form-control" name="fullName">
						</div>
					</div>
					<div class="item form-group">
						<label class="col-form-label col-md-3 col-sm-3 label-align" for="nama_bidang">Email <span class="required">*</span>
						</label>
						<div class="col-md-9 col-sm-9 ">
							<input type="email" id="email" name="email" required="required" class="form-control ">
						</div>
					</div>
					<div class="item form-group">
						<label class="col-form-label col-md-3 col-sm-3 label-align" for="id_kelompok1">Kelompok <span class="required">*</span>
						</label>
						<div class="col-md-9 col-sm-9 ">
							<select class="form-control" name="id_kelompok1" id="id_kelompok1">
								<option selected readonly disabled>Pilih</option>
								
							</select>
						</div>
					</div>
					<div class="item form-group">
						<label class="col-form-label col-md-3 col-sm-3 label-align" for="status">Status <span class="required">*</span>
						</label>
						<div class="col-md-9 col-sm-9 ">
							<select class="form-control" name="status" id="status">
								<option value="Aktif">Aktif</option>
								<option value="Tidak aktif">Tidak aktif</option>
							</select>
							<!-- <input type="text" id="last-name" name="last-name" required="required" class="form-control"> -->
						</div>
					</div>

					<!-- </form> -->
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Update</button>
			</div>
			<?= form_close(); ?>
		</div>
	</div>
</div>
