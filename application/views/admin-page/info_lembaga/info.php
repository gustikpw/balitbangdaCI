<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <!-- <div class="box-header"> -->
          <!-- <h3 class="box-title">Info Lembaga</h3> -->
          <!-- <button type="button" class="btn btn-sm btn-primary pull-right" onclick="add_info_lembaga()"><span class="fa fa-plus"></span> Tambah</button> -->
        <!-- </div> -->
        <!-- /.box-header -->
        <div class="box-body table-responsive">
          <table id="table" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>No</th>
              <th>Nama Lembaga</th>
              <th class="hide-xs hide-sm">Alias</th>
              <th>Alamat</th>
              <th>Telepon</th>
              <th class="hide-xs hide-sm">Kode Pos</th>
              <th class="hide-xs hide-sm">Email</th>
              <th class="hide-xs hide-sm">Facebook</th>
              <th class="hide-xs hide-sm">Youtube</th>
              <th class="hide-xs hide-sm">Twitter</th>
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
        <h4 class="modal-title">Info Lembaga</h4>
      </div>
      <div class="modal-body">

        <form id="form" class="form-horizontal" action="#">
          <div class="box-body">
            <input type="text" name="id" hidden>
            <div class="form-group">
              <label for="sss" class="col-sm-2 control-label">Nama Lembaga</label>
              <div class="col-sm-10">
                <input type="text" name="nama_lembaga" class="form-control" id="sss" placeholder="Nama Lembaga" required>
              </div>
            </div>

            <div class="form-group">
              <label for="a" class="col-sm-2 control-label">Alias</label>
              <div class="col-sm-10">
                <input type="text" name="alias" class="form-control" id="a" placeholder="Alias" required>
              </div>
            </div>

            <div class="form-group">
              <label for="b" class="col-sm-2 control-label">Alamat</label>
              <div class="col-sm-10">
                <input type="text" name="alamat" class="form-control" id="b" placeholder="Alamat" required>
              </div>
            </div>

            <div class="form-group">
              <label for="c" class="col-sm-2 control-label">Telepon</label>
              <div class="col-sm-10">
                <input type="text" name="telp" class="form-control" id="c" placeholder="Telepon" required>
              </div>
            </div>

            <div class="form-group">
              <label for="d" class="col-sm-2 control-label">Kode Pos</label>
              <div class="col-sm-10">
                <input type="text" name="kodepos" class="form-control" id="d" placeholder="Kode Pos" required>
              </div>
            </div>

            <div class="form-group">
              <label for="e" class="col-sm-2 control-label">Email</label>
              <div class="col-sm-10">
                <input type="text" name="email" class="form-control" id="e" placeholder="Email" required>
              </div>
            </div>

            <div class="form-group">
              <label for="f" class="col-sm-2 control-label">Facebook</label>
              <div class="col-sm-10">
                <input type="text" name="sosmed1" class="form-control" id="f" placeholder="Masukan Link Facebook Lembaga" required>
              </div>
            </div>

            <div class="form-group">
              <label for="g" class="col-sm-2 control-label">YouTube</label>
              <div class="col-sm-10">
                <input type="text" name="sosmed2" class="form-control" id="g" placeholder="Masukan Link YouTube Lembaga" required>
              </div>
            </div>

            <div class="form-group">
              <label for="h" class="col-sm-2 control-label">Twitter</label>
              <div class="col-sm-10">
                <input type="text" name="sosmed3" class="form-control" id="h" placeholder="Masukan Link Twitter Lembaga" required>
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
        <h4 class="modal-title"><b>Detail Info Lembaga</b></h4>
      </div>
      <div class="modal-body">
        <table class="table table-condensed">
          <tr>
            <td>Nama Lembaga</td>
            <td class="p1"></td>
          </tr>
          <tr>
            <td>Alias</td>
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
            <td>Kode Pos</td>
            <td class="p5"></td>
          </tr>
          <tr>
            <td>Email</td>
            <td class="p6"></td>
          </tr>
          <tr>
            <td>Facebook</td>
            <td class="p7"></td>
          </tr>
          <tr>
            <td>YouTube</td>
            <td class="p8"></td>
          </tr>
          <tr>
            <td>Twitter</td>
            <td class="p9"></td>
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
