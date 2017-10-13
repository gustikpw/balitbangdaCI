<!-- Main content -->
<section class="content">

  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Pengaturan Buku Tamu</h3>
          <button type="button" class="btn btn-sm btn-primary pull-right" data-toggle="modal" data-target="#modal_form2"><span class="fa fa-gear"></span> Settings</button>
        </div>
        <div class="box-body">
          <dl class="dl-horizontal">
            <dt>Judul</dt>
            <dd><?php echo $infoBukuTamu->judul?></dd>
            <dt>Deskripsi</dt>
            <dd><?php echo $infoBukuTamu->deskripsi?></dd>
            <dt>Keterangan</dt>
            <dd><?php echo $infoBukuTamu->other?></dd>
          </dl>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Daftar Buku Tamu</h3>
          <!-- <button type="button" class="btn btn-sm btn-primary pull-right" onclick="add_tamu()"><span class="fa fa-plus"></span> Tambah</button> -->
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive">
          <table id="table" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>Email</th>
              <th class="hide-xs hide-sm">Alamat</th>
              <th>Telepon</th>
              <th>Perihal</th>
              <th class="hide-xs hide-sm">Pesan</th>
              <th>Tgl Kunjungan</th>
              <th>Alamat IP/Gadget</th>
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
<div class="modal fade" id="modal_detail">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><b>Detail Tamu</b></h4>
      </div>
      <div class="modal-body">
        <table class="table table-condensed">
          <tr>
            <td>Nama</td>
            <td class="p1"></td>
          </tr>
          <tr>
            <td>Email</td>
            <td class="p2"></td>
          </tr>
          <tr>
            <td>Alamat</td>
            <td class="p3"></td>
          </tr>
          <tr>
            <td>Telepon</td>
            <td class="p4"></td>
          </tr>
          <tr>
            <td>Perihal</td>
            <td class="p5"></td>
          </tr>
          <tr>
            <td>Pesan</td>
            <td class="p6"></td>
          </tr>
          <tr>
            <td>Waktu Kunjungan</td>
            <td class="p7"></td>
          </tr>
          <tr>
            <td>Alamat IP/Gadget</td>
            <td class="p8"></td>
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

<!-- SETUP BUKU TAMU -->
<div class="modal fade" id="modal_form2">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Informasi Buku Tamu</h4>
      </div>
      <div class="modal-body">

        <form id="form2" class="form-horizontal" action="#">
          <div class="box-body">
            <input type="text" name="id_setup" value="<?php echo $infoBukuTamu->id_setup ?>" hidden>
            <div class="form-group">
              <label for="sss" class="col-sm-2 control-label">Judul</label>
              <div class="col-sm-10">
                <input type="text" name="judul" class="form-control" id="sss" placeholder="Judul" value="<?php echo $infoBukuTamu->judul ?>" required>
              </div>
            </div>

            <div class="form-group">
              <label for="a" class="col-sm-2 control-label">Deskripsi</label>
              <div class="col-sm-10">
                <textarea type="text" name="deskripsi" class="form-control" id="a" placeholder="Deskripsi/Informasi pengisian Buku Tamu" rows="8" cols="80" required><?php echo $infoBukuTamu->deskripsi ?></textarea>
              </div>
            </div>

            <div class="form-group">
              <label for="sssx" class="col-sm-2 control-label">Lainnya</label>
              <div class="col-sm-10">
                <input type="text" name="other" class="form-control" id="sssx" placeholder="Keterangan Lainnya" value="<?php echo $infoBukuTamu->other ?>" required>
              </div>
            </div>

          </div>
        </form>

      </div>
      <div class="modal-footer">
        <button type="button" id="btnSave2" onclick="setUpdate()" class="btn btn-info pull-right">Update</button>
        <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Cancel</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
