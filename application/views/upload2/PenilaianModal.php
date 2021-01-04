<div class="modal fade form-review-doc"  role="dialog" aria-hidden="true">

<div class="modal-dialog modal-lg">
  <div class="modal-content">

    <div class="modal-header">
      <h4 class="modal-title" id="myModalLabel">Review Dokumen</h4>
      <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
      </button>
    </div>
    <div class="modal-body">
      <!-- main form  -->
      <div class="x_content">
                  <?php
                  $attr = array('class' =>'form-horizontal form-label-left','id'=>'form-upload' );
                  echo form_open_multipart('uploads/do_upload',$attr);?>
                  <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="kategori">Nama Dokumen <span class="required">*</span>
                    </label>
                    <div class="col-md-9 ">
                      <select class="form-control kategori" name="kategori" id="kategori" required>
                        <option></option>
                        <?php
                        foreach ($dokumen as $dok) {
                          ?>
                          <option value="<?=$dok->ID_KATEGORI?>"><?=$dok->kode.'-'.$dok->NAMA_KATEGORI?></option>
                          <?php
                        }
                         ?>
                      </select>
                    </div>
                  </div>
                  <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Kelompok <span class="required">*</span>
                    </label>
                    <div class="col-md-9 col-sm-9 ">
                      <input type="text" id="kelompok" name="kelompok"  class="form-control" readonly>
                      <input type="hidden" id="duedate" name="duedate"  class="form-control" readonly>
                    </div>
                  </div>
                  <div class="item form-group">
                    <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Tahun</label>
                    <div class="col-md-9 col-sm-9 ">
                      <select class="form-control tahun" name="tahun" required id="tahun">
                        <option></option>
                        <?php getTahunPelaporan()?>
                      </select>
                    </div>
                  </div>
                  <div class="item form-group">
                    <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Bulan</label>
                    <div class="col-md-9 col-sm-9 ">
                      <select class="form-control bulan" name="bulan" required id="bulan">
                        <option></option>
                        <option value="0">Januari</option>
                        <option value="1">Februari</option>
                        <option value="2">Maret</option>
                        <option value="3">April</option>
                        <option value="4">Mei</option>
                        <option value="5">Juni</option>
                        <option value="6">Juli</option>
                        <option value="7">Agustus</option>
                        <option value="8">September</option>
                        <option value="9">Oktober</option>
                        <option value="10">November</option>
                        <option value="11">Desember</option>
                      </select>
                    </div>
                  </div>
                  <div class="item form-group">
                    <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Jatuh tempo (yyyy-mm-dd)</label>
                    <div class="col-md-9 col-sm-9 ">
                      <input id="jtuhtempo" class="form-control" type="text" name="jtuhtempo" readonly="readonly">
                      <input id="originalduedate" class="form-control" type="hidden" name="originalduedate" readonly="readonly">
                    </div>
                  </div>

                  <div class="item form-group">
                    <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Keterangan</label>
                    <div class="col-md-9 col-sm-9 ">
                      <textarea class="form-control" rows="3" name="keterangan" ></textarea>
                    </div>
									</div>
									<div id="data-file">
										<hr>
										<div class="item form-group" id="file1">
											<label for="file_source" class="col-form-label col-md-3 col-sm-3 label-align">Dokumen</label>
											<div class="col-md-9 col-sm-9 ">
												<input type="file" name="file_source[]" class="form-control">
											</div>
										</div>										
									</div>
									
									<!-- <div class="item form-group" id="file1">
                    <label for="file_source" class="col-form-label col-md-3 col-sm-3 label-align">Dokumen ke-2</label>
                    <div class="col-md-9 col-sm-9 ">
                      <input type="file" name="file_source2" class="form-control">
                    </div>
                  </div> -->
                  <hr>
                  <button type="button" name="tambahDokumen" id="tambahDokumen" class="btn btn-sm btn-primary"><i class="fa fa-plus-square"></i> Tambah dokumen</button>


                  <!-- <div class="item form-group">
                    <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Dokumen</label>
                    <div class="col-md-9 col-sm-9 ">
                    <div style="position:relative;">
                      <a class='btn btn-primary' href='javascript:;'>
                        <i class="fa fa-upload"></i> Pilih file
                        <input type="file"  name="file_source"  >
                      </a>
                      &nbsp;
                      <br>
                      <span class='label label-info' id="upload-file-info"></span>
                    </div>
                  </div>
                  </div> -->

        </div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      <button type="reset" class="btn btn-secondary" id="resetform">Reset</button>
      <button type="submit" class="btn btn-primary">Save changes</button>
    </div>
<?=form_close() ?>
  </div>
</div>
</div>
