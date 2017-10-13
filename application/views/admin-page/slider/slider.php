<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Daftar Slider</h3>
          <button type="button" class="btn btn-sm btn-primary pull-right" onclick="addSlider()"><span class="fa fa-plus"></span> Tambah</button>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive">
          <table id="table" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>No</th>
              <th>Link Foto</th>
              <th>Deskripsi 1</th>
              <th>Deskripsi 2</th>
              <th>Data Slide</th>
              <th>Coding</th>
              <th>Class</th>
              <th>Status Slide</th>
              <th style="width:120px">Action</th>
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
        <h4 class="modal-title">Slider</h4>
      </div>
      <div class="modal-body">

        <form id="form" class="form-horizontal" action="#">
          <div class="box-body">
            <input type="text" name="id" hidden>
            <div class="form-group">
              <label for="sss" class="col-sm-2 control-label">Link Foto</label>
              <div class="col-sm-10">
                <input type="text" name="nama_foto" class="form-control" id="sss" placeholder="Link Foto" required>
              </div>
            </div>

            <div class="form-group">
              <label for="a" class="col-sm-2 control-label">Deskripsi 1</label>
              <div class="col-sm-10">
                <input type="text" name="deskripsi1" class="form-control" id="a" placeholder="Deskripsi 1" required>
              </div>
            </div>

            <div class="form-group">
              <label for="b" class="col-sm-2 control-label">Deskripsi 2</label>
              <div class="col-sm-10">
                <input type="text" name="deskripsi2" class="form-control" id="b" placeholder="Deskripsi 2" required>
              </div>
            </div>

            <div class="form-group">
              <label for="c" class="col-sm-2 control-label">Telepon</label>
              <div class="col-sm-10">
                <input type="text" name="telp" class="form-control" id="c" placeholder="Telepon" required>
              </div>
            </div>

            <div class="form-group">
              <label for="d" class="col-sm-2 control-label">Data Slide</label>
              <div class="col-sm-10">
                <input type="number" name="data_slide" class="form-control" id="d" placeholder="Data Slide" required>
              </div>
            </div>

            <div class="form-group">
              <label for="e" class="col-sm-2 control-label">Coding</label>
              <div class="col-sm-10">
                <textarea name="coding" class="form-control" id="e" placeholder="Coding"></textarea>
              </div>
            </div>

            <div class="form-group">
              <label for="f" class="col-sm-2 control-label">Class</label>
              <div class="col-sm-10">
                <select name="class" class="form-control" id="f">
                  <option value="" selected></option>
                  <option value="active">Active</option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label for="g" class="col-sm-2 control-label">Status Slider</label>
              <div class="col-sm-10">
                <select name="status_slide" class="form-control" id="g">
                  <option value="on">On</option>
                  <option value="off">Off</option>
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
        <h4 class="modal-title"><b>Detail Slider</b></h4>
      </div>
      <div class="modal-body">
        <table class="table table-condensed">
          <tr>
            <td>Link Foto</td>
            <td class="p1"></td>
          </tr>
          <tr>
            <td>Deskripsi 1</td>
            <td class="p2"></td>
          </tr>
          <tr>
            <td>Deskripsi 1</td>
            <td class="p3"></td>
          </tr>
          <tr>
            <td>Data Slide</td>
            <td class="p4"></td>
          </tr>
          <tr>
            <td>Coding</td>
            <td class="p5"></td>
          </tr>
          <tr>
            <td>Class</td>
            <td class="p6"></td>
          </tr>
          <tr>
            <td>Status Slider</td>
            <td class="p7"></td>
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
