<?php
$this->load->view('include/Header');
?>
<div class="clearfix"></div>
<div class="row">
	<div class="col-md-12 col-sm-12 ">
		<div class="x_panel">
			<div class="x_title">
				<h2><?= isset($title) ? $title : null ?></h2>
				<ul class="nav navbar-right panel_toolbox">
					<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
					</li>

					<li><a class="close-link"><i class="fa fa-close"></i></a>
					</li>
				</ul>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">

				<form id="change-pass" class="form-horizontal form-label-left" method="POST">
					<div class="item form-group">
						<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Password <span class="required">*</span>
						</label>
						<div class="col-md-6 col-sm-6 ">
							<input type="hidden" id="user_id" name="user_id" required="required" value="<?=$this->session->userdata('user_id')?>">
							<input type="password" id="password1" name="password1" required="required" class="form-control" autocomplete="off" >
						</div>
					</div>
					<div class="item form-group">
						<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Confirm Password <span class="required">*</span>
						</label>
						<div class="col-md-6 col-sm-6 ">
							<input type="password" id="password2" name="password2" required="required" class="form-control" autocomplete="off">
						</div>
					</div>				
					<div class="ln_solid"></div>
					<div class="item form-group">
						<div class="col-md-6 col-sm-6 offset-md-3">
							<button type="submit" class="btn btn-success">Update</button>
							<button class="btn btn-primary" type="reset">Reset</button>
						</div>
					</div>
				</form>

			</div>
		</div>
	</div>
</div>
<?php
$this->load->view('include/js_Home');
$this->load->view('include/Footer');
?>
