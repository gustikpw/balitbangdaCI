<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Daftar Komentar</h3>
          <!-- <div class="form-group">
            <label for="aaa" class="col-sm-2 control-label">Pilih Berita</label>
            <div class="col-sm-10">
              <select class="form-control select2" name="judul">
                <?php
                // foreach ($berita as $br){
                //   echo "<option value=\"$br->id_berita\">$br->judul</option>";
                // }
                ?>
              </select>
            </div>
          </div> -->
          <!-- <button type="button" class="btn btn-sm btn-primary" onclick="setComment()"><span class="fa fa-search"></span> Cari</button> -->
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive">
          <table id="table" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>No</th>
              <th>Nama Tamu</th>
              <th class="hide-xs hide-sm">Email</th>
              <th>Komentar</th>
              <th>Judul Berita</th>
              <th class="hide-xs hide-sm">Waktu</th>
              <th>Action</th>
            </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>
<!-- /.content -->
<!-- Modals -->
<div class="modal fade" id="modal_form">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><b>Detail Komentar</b></h4>
      </div>
      <div class="modal-body">
        <table class="table table-condensed">
          <tr>
            <td>Nama Tamu</td>
            <td class="p1"></td>
          </tr>
          <tr>
            <td>Email</td>
            <td class="p2"></td>
          </tr>
          <tr>
            <td>Komentar</td>
            <td class="p3"></td>
          </tr>
          <tr>
            <td>Judul</td>
            <td class="p4"></td>
          </tr>
          <tr>
            <td>Tanggal</td>
            <td class="p5"></td>
          </tr>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Close</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
