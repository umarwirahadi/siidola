<?php
$this->load->view('include/Header');
?>

<div class="clearfix"></div>

<div class="row">
  <div class="col-md-12 col-sm-12 ">
    <div class="x_panel">

      <div class="x_title">
        <h2><?=isset($title)?$title:null?></h2>
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
                  tes
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
