<div class="modal fade addInfo" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">

			<div class="modal-header">
				<h4 class="modal-title" id="myModalLabel">informasi</h4>
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">				
				<?php 
				$data=$this->db->get_where('msinfo',['showmodal'=>'1'])->row();
				?>
				<h2><?=isset($data->judul)?$data->judul:''?></h2>
				<p>
					<?=isset($data->isi)?$data->isi:''?>
				</p>
				<?php 
				echo "<p id='showmodal' data-id='".$data->showmodal."'></p>";
				?>
			</div>
			<div class="modal-footer">
				<button class="btn btn-danger" data-dismiss="modal">close</button>
			</div>
		</div>
	</div>
</div>
