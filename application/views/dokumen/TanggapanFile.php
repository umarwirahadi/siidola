<div class="x_content">
	<?php
	$attr = array('class' => 'form-horizontal form-label-left', 'id' => 'form-tanggapan-file');
	echo form_open(null, $attr); ?>
	<div class="item form-group">
		<label class="col-form-label col-md-3 col-sm-3 label-align" for="file_name">Nama file
		</label>
		<div class="col-md-9 col-sm-9 ">
			<input type="hidden" id="id_dok" name="id_dok" class="form-control" value="<?=$data_file['data']->id?>">
			<input type="hidden" id="id_document" name="id_document" class="form-control"  value="<?=$data_file['data']->id_document?>" readonly>
			<input type="text" id="file_name" name="file_name" class="form-control" readonly value="<?=$data_file['data']->file_name?>" >
		</div>
	</div>
	<div class="item form-group">
		<label class="col-form-label col-md-3 col-sm-3 label-align" for="createdat">Tanggal. dibuat
		</label>
		<div class="col-md-9 col-sm-9 ">
			<input type="text" id="createdat" name="createdat" class="form-control" value="<?=$data_file['data']->created?>" readonly>
		</div>
	</div>
	<div class="item form-group">
		<label class="col-form-label col-md-3 col-sm-3 label-align" for="updatedat">Tanggal. update
		</label>
		<div class="col-md-9 col-sm-9 ">
			<input type="text" id="updatedat" name="updatedat" class="form-control" value="<?=$data_file['data']->updated?>" readonly>
		</div>
	</div>
	<?php 
	if(!$data_file['data']->catatan_perbaikan==''){
	?>
	<div class="item form-group">
		<label for="desc" class="col-form-label col-md-3 col-sm-3 label-align">Catatan hasil perbaikan</label>
		<div class="col-md-9 col-sm-9 ">
			<?php 
			echo '<textarea class="form-control" rows="3" name="desc" id="desc" readonly>'.$data_file['data']->catatan_perbaikan.'</textarea>';
			?>
		</div>
	</div>
	
	<?php
	}
	?>
	<div class="item form-group">
		<label for="keterangan1" class="col-form-label col-md-3 col-sm-3 label-align">Catatan untuk file</label>
		<div class="col-md-9 col-sm-9 ">
			<?php 
			echo '<textarea class="form-control" rows="3" name="keterangan1" id="keterangan1">'.$data_file['data']->deskripsi.'</textarea>';
			?>
		</div>
	</div>
</div>
<!-- form close not in here, but in main form  -->
