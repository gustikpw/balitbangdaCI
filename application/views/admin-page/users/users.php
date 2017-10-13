<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Daftar User</h3>
          <button type="button" class="btn btn-sm btn-primary pull-right" onclick="add_users()"><span class="fa fa-plus"></span> Tambah</button>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive">
          <table id="table" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>No</th>
              <th>Username</th>
              <th class="hide-xs hide-sm">Password</th>
              <th>Penulis/Alias</th>
              <th>Level</th>
              <th class="hide-xs hide-sm">User Status</th>
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
        <h4 class="modal-title">Tambah Users</h4>
      </div>
      <div class="modal-body">

        <form id="form" class="form-horizontal" action="#">
          <div class="box-body">
            <input type="text" name="id_users" hidden>
            <div class="form-group">
              <label for="sss" class="col-sm-2 control-label">Username</label>
              <div class="col-sm-10">
                <input type="text" name="username" class="form-control" id="sss" placeholder="Username" required>
              </div>
            </div>

            <div class="form-group">
              <label for="a" class="col-sm-2 control-label">Password</label>
              <div class="col-sm-10">
                <input type="text" name="password" class="form-control" id="a" placeholder="* Masukan Password" required>
              </div>
            </div>

            <div class="form-group">
              <label for="aaaaa" class="col-sm-2 control-label">Penulis/Alias</label>
              <div class="col-sm-10">
                <select name="penulis" class="form-control select2" id="aaaaa">
                  <option value="">-- Pilih Penulis Berita --</option>
                  <?php foreach ($penulis as $pn): ?>
                    <option value="<?php echo $pn->id_penulis ?>"><?php echo $pn->nama_penulis ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label for="aaa" class="col-sm-2 control-label">Level</label>
              <div class="col-sm-10">
                <select class="form-control" name="level" id="aaa">
                  <option value="">-- Level User --</option>
                  <option value="administrator">Administrator</option>
                  <option value="penulis">Penulis</option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label for="aaaa" class="col-sm-2 control-label">Status User</label>
              <div class="col-sm-10">
                <select class="form-control" name="aktif" id="aaaa">
                  <option value="">-- Status User --</option>
                  <option value="aktif">Aktif</option>
                  <option value="nonaktif">Non-Aktif</option>
                </select>
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
        <h4 class="modal-title"><b>Detail Users</b></h4>
      </div>
      <div class="modal-body">
        <table class="table table-condensed">
          <tr>
            <td>Username</td>
            <td class="p1"></td>
          </tr>
          <tr>
            <td>Password</td>
            <td class="p2"></td>
          </tr>
          <tr>
            <td>Penulis/Alias</td>
            <td class="p3"></td>
          </tr>
          <tr>
            <td>Level</td>
            <td class="p4"></td>
          </tr>
          <tr>
            <td>Status Users</td>
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
