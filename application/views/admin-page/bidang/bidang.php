<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Daftar Bidang Kerja</h3>
          <button type="button" class="btn btn-sm btn-primary pull-right" onclick="add_bidang()"><span class="fa fa-plus"></span> Tambah</button>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive">
          <table id="table" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>No</th>
              <th>Bidang</th>
              <th>Slug</th>
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
        <h4 class="modal-title">Tambah Bidang Kerja</h4>
      </div>
      <div class="modal-body">

        <form id="form" class="form-horizontal" action="#">
          <div class="box-body">
            <input type="text" name="id_bidang" hidden>
            <div class="form-group">
              <label for="sss" class="col-sm-2 control-label">Bidang Kerja</label>
              <div class="col-sm-10">
                <input type="text" name="bidang" class="form-control" id="sss" placeholder="Bidang Kerja" required>
              </div>
            </div>

            <div class="form-group">
              <label for="aaa" class="col-sm-2 control-label">Slug</label>
              <div class="col-sm-10">
                <input type="text" name="slug" class="form-control" id="aaa" placeholder="Slug" required>
              </div>
            </div>

          </div>
          <!-- /.box-body -->
          <!-- <div class="box-footer">
            <button type="button" id="btnSave" onclick="save()" class="btn btn-info pull-right">Save</button>
            <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Cancel</button>
          </div> -->
          <!-- /.box-footer -->
        </form>

      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button> -->
        <button type="button" id="btnSave" onclick="save()" class="btn btn-info pull-right">Save</button>
        <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Cancel</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
