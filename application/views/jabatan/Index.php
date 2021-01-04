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
                    <a class="btn btn-app" id="add_jabatan" data-toggle="modal" data-target=".addjabatan">
                    <i class="fa fa-save"></i> Tambah data
                    </a>
                    <hr>
                      <div class="row" style="display: block;">
                        <div class="col-md-12">
                          <table class="table table-striped jambo_table bulk_action" id="data-jabatan">
                            <thead>
                              <tr>
                                <th>NO</th>
                                <th>ID JABATAN</th>
                                <th>NAMA JABATAN</th>
                                <th>STATUS</th>
                                <th>TGL. INPUT</th>
                                <th>ACTION</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php
                              $no=1;
                              foreach ($jabatan as $jab) {
                                ?>
                                <tr>
                                  <th><?=$no?></th>
                                  <td><?=$jab->ID_JABATAN?></td>
                                  <td><?=$jab->nama_jabatan?></td>
                                  <td><?=$jab->STATUS?></td>
                                  <td><?=$jab->dateadded?></td>
                                  <td>
                                    <a href="#" class="btn btn-sm btn-primary" title="Edit"><i class="fa fa-eye"></i></a>
                                    <a href="#" class="btn btn-sm btn-danger" title="Hapus dokumen"><i class="fa fa-trash"></i></a>
                                  </td>
                                </tr>

                                <?php
                                $no++;
                              }
                               ?>
                            </tbody>
                          </table>

                        </div>
                      </div>
                </div>
          </div>
          </div>
      </div>
</div>

<?php
$this->load->view('jabatan/AddJabatan');
?>

<?php
$this->load->view('include/js_Home');
?>

<script type="text/javascript">
  $(document).ready(function(){

    $("#data-jabatan").DataTable({
      "dom": "<'row '<'col-sm-3'li> <'col-sm-6'f>  <'col-sm-3'B>>    <'row'<'col-sm-12'tr>>    <'row'<'col-sm-12'p>>",
      buttons: {
          buttons: [
            {
                  extend: 'excel',
                  className: 'btn btn-sm btn-primary',
                  text: '<span class="glyphicon glyphicon-download-alt"></span> Excel',
                  title: 'Data Jabatan'
              },
              {
                  extend: 'pdf',
                  className: 'btn btn-sm btn-success',
                  text: '<span class="glyphicon glyphicon-cloud-download"></span> PDF',
                  title: 'Data Jabatan'
              },
              {
                  extend: 'print',
                  className: 'btn btn-sm btn-danger',
                  text: '<span class="glyphicon glyphicon-print"></span> Print',
                  title: 'Data Jabatan'
              }
          ]
      }
 });


// $("#add_jabatan").on("click",function(){
//   var url=$("body").attr("data-url");
//
//   //alert(url);
//
//   $.get(url+'jabatan/add',function(data){
//     $(".data-modal").html(data);
//   })
//
// })

  })
</script>
<?php
$this->load->view('include/Footer');
?>
