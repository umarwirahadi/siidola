	  </div>

  <footer>
  	<div class="pull-right">
  		<!-- Dinas Kesehatan Kota Cimahi, Theme : <a href="https://colorlib.com">Colorlib</a> -->
  		Dinas Kesehatan Kota Cimahi, &copy; 2020 - <?=date('Y')!='2020'?date('Y'):null?>
  	</div>
  	<div class="clearfix"></div>
  </footer>
  
  <script src="<?= base_url() ?>assets/vendors/jquery/dist/jquery.min.js"></script>
  <!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> -->
  <script src="<?= base_url() ?>assets/vendors/sweetalert.min.js"></script>
  <script src="<?= base_url() ?>assets/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url() ?>assets/vendors/fastclick/lib/fastclick.js"></script>
  <script src="<?= base_url() ?>assets/vendors/nprogress/nprogress.js"></script>
  <script src="<?= base_url() ?>assets/vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
  <script src="<?= base_url() ?>assets/vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
  <script src="<?= base_url() ?>assets/vendors/google-code-prettify/src/prettify.js"></script>
	<script src="<?= base_url() ?>assets/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    
  <script src="<?= base_url() ?>assets/vendors/notify.min.js"></script>
  <script src="<?= base_url() ?>assets/custom/Custom_user.js"></script>

  <?php
	if (isset($isDatatable)) {
		if ($isDatatable) {
	?>
  		<!-- Datatables -->
  		<script src="<?= base_url() ?>assets/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
  		<script src="<?= base_url() ?>assets/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
  		<script src="<?= base_url() ?>assets/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
  		<script src="<?= base_url() ?>assets/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
  		<script src="<?= base_url() ?>assets/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
  		<script src="<?= base_url() ?>assets/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
  		<script src="<?= base_url() ?>assets/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
  		<script src="<?= base_url() ?>assets/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
  		<script src="<?= base_url() ?>assets/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
  		<script src="<?= base_url() ?>assets/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
  		<script src="<?= base_url() ?>assets/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
  		<script src="<?= base_url() ?>assets/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
  		<script src="<?= base_url() ?>assets/vendors/jszip/dist/jszip.min.js"></script>
  		<script src="<?= base_url() ?>assets/vendors/pdfmake/build/pdfmake.min.js"></script>
  		<script src="<?= base_url() ?>assets/vendors/pdfmake/build/vfs_fonts.js"></script>
  <?php
		}
	}
	?>

  <?php
	if (isset($isSelect2)) {
		if ($isSelect2) {
	?>
  		<!-- loading select2 -->
  		<script src="<?= base_url() ?>assets/vendors/select2/dist/js/select2.min.js"></script>
  <?php
		}
	}
	?>


<?php
	if (isset($tiny)) {
		echo '<script src="'. $tiny .'"></script>';
	}
	?>
  <script src="<?= base_url() ?>assets/vendors/pnotify/dist/pnotify.js"></script>
  <script src="<?= base_url() ?>assets/vendors/pnotify/dist/pnotify.buttons.js"></script>
  <script src="<?= base_url() ?>assets/vendors/pnotify/dist/pnotify.nonblock.js"></script>
  <script src="<?= base_url() ?>assets/build/js/custom.min.js"></script>
  <?php
	if (isset($js)) {
		echo '<script src="'. $js .'"></script>';
	}
	?>
  
	
  
	
	
	<?php
	if (isset($isChart)) {
		if ($isChart) {
	?>
			<!-- Chart -->
			   
    <!-- FastClick -->
    <!-- NProgress -->
    <!-- Chart.js -->
    <script src="<?= base_url() ?>assets/vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- jQuery Sparklines -->
    <script src="<?= base_url() ?>assets/vendors/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
    <!-- morris.js -->
    <script src="<?= base_url() ?>assets/vendors/raphael/raphael.min.js"></script>
    <script src="<?= base_url() ?>assets/vendors/morris.js/morris.min.js"></script>
    <!-- gauge.js -->
    <script src="<?= base_url() ?>assets/vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- Skycons -->
    <script src="<?= base_url() ?>assets/vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="<?= base_url() ?>assets/vendors/Flot/jquery.flot.js"></script>
    <script src="<?= base_url() ?>assets/vendors/Flot/jquery.flot.pie.js"></script>
    <script src="<?= base_url() ?>assets/vendors/Flot/jquery.flot.time.js"></script>
    <script src="<?= base_url() ?>assets/vendors/Flot/jquery.flot.stack.js"></script>
    <script src="<?= base_url() ?>assets/vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="<?= base_url() ?>assets/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="<?= base_url() ?>assets/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="<?= base_url() ?>assets/vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="<?= base_url() ?>assets/vendors/DateJS/build/date.js"></script>
    <!-- bootstrap-daterangepicker -->
    <!-- <script src="<?= base_url() ?>assets/vendors/moment/min/moment.min.js"></script> -->
    <script src="<?= base_url() ?>assets/vendors/moment/moment-with-locales.js"></script>

    <script src="<?= base_url() ?>assets/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
	<?php
	if (isset($ch)) {
		echo '<script src="'. $ch .'"></script>';
	}
	
		}
	}
	?>
