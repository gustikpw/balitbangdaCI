<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Daftar Penulis</h3>
          <button type="button" class="btn btn-sm btn-primary pull-right" onclick="add_penulis()"><span class="fa fa-plus"></span> Tambah</button>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive">
          <table id="table" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>No</th>
              <th>Nama Penulis</th>
              <th class="hide-xs hide-sm">Alamat</th>
              <th>Telepon</th>
              <th>Alamat Web</th>
              <th class="hide-xs hide-sm">Bio</th>
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

<div class="modal fade" id="modal_form">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Tambah Penulis Berita</h4>
      </div>
      <div class="modal-body">

        <form id="form" class="form-horizontal" action="#">
          <div class="box-body">
            <input type="text" name="id_penulis" hidden>
            <div class="form-group">
              <label for="sss" class="col-sm-2 control-label">Nama Penulis</label>
              <div class="col-sm-10">
                <input type="text" name="nama_penulis" class="form-control" id="sss" placeholder="Nama Penulis" required>
              </div>
            </div>

            <div class="form-group">
              <label for="a" class="col-sm-2 control-label">Alamat</label>
              <div class="col-sm-10">
                <input type="text" name="alamat" class="form-control" id="a" placeholder="Alamat" required>
              </div>
            </div>

            <div class="form-group">
              <label for="aa" class="col-sm-2 control-label">Telepon</label>
              <div class="col-sm-10">
                <input type="text" name="telp" class="form-control" id="aa" placeholder="Telepon" required>
              </div>
            </div>

            <div class="form-group">
              <label for="aaa" class="col-sm-2 control-label">Alamat Web</label>
              <div class="col-sm-10">
                <input type="text" name="situs_web" class="form-control" id="aaa" placeholder="Alamat Web" required>
              </div>
            </div>

            <div class="form-group">
              <label for="aaaa" class="col-sm-2 control-label">Bio</label>
              <div class="col-sm-10">
                <input type="text" name="bio" class="form-control" id="aaaa" placeholder="Bio" required>
              </div>
            </div>

          </div>
        </form>

      </div>
      <div class="modal-footer">
        <button type="button" id="btnSave" onclick="save()" class="btn btn-info pull-right">Save</button>
        <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Cancel</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- Modals -->
<div class="modal fade" id="modal_detail">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><b>Detail Penulis</b></h4>
      </div>
      <div class="modal-body">
        <table class="table table-condensed">
          <tr>
            <td>Nama Penulis</td>
            <td class="p1"></td>
          </tr>
          <tr>
            <td>Alamat</td>
            <td class="p2"></td>
          </tr>
          <tr>
            <td>Telepon</td>
            <td class="p3"></td>
          </tr>
          <tr>
            <td>Alamat Web</td>
            <td class="p4"></td>
          </tr>
          <tr>
            <td>Bio</td>
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
