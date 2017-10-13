    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Editor Berita <?php echo ucfirst($_SESSION['username']); ?>
                <small>BALITBANGDA PALU</small>
              </h3>
              <!-- tools box -->
              <div class="pull-right box-tools">
                <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                  <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip"
                        title="Remove">
                  <i class="fa fa-times"></i></button>
              </div>
              <!-- /. tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body pad form">
              <form action="<?php echo site_url('index.php/dashboard/update_berita') ?>" id="form" class="form-horizontal" method="post">
                <div class="box-body">
                  <div class="row">
                    <div class="col-md-6 col-xs-12">

                      <input name="id_berita" type="text" value="<?php echo $isi->id_berita ?>" hidden>

                      <div class="form-group">
                        <label class="control-label col-xs-3">Judul</label>
                        <div class="col-xs-9">
                          <input name="judul" placeholder="Judul Berita" class="form-control" type="text" value="<?php echo $isi->judul ?>">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-xs-3">Bidang Kerja</label>
                        <div class="col-xs-9">
                          <select name="bidang" class="form-control select2">
                            <option value="">-- Pilih Bidang --</option>
                            <?php foreach ($listbidang as $bd){
                              $pilih = ($isi->bidang==$bd->id_bidang) ? "selected" : "";
                              echo "<option value=\"$bd->id_bidang\" $pilih>$bd->bidang</option>";
                            } ?>
                          </select>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-xs-3">Tag</label>
                        <div class="col-xs-9">
                          <input name="tag" placeholder="Tag" class="form-control" type="text" value="<?php echo $isi->tag ?>">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-xs-3">Link Gambar</label>
                        <div class="col-xs-9">
                          <input name="link_gambar" placeholder="Gambar" class="form-control" type="text" value="<?php echo $isi->link_gambar ?>">
                        </div>
                      </div>

                    </div>
                    <div class="col-md-6 col-xs-12">

                      <div class="form-group">
                        <label class="control-label col-xs-3">Publish</label>
                        <div class="col-xs-9">
                          <label>
                            <input name="publish" type="checkbox" class="flat-red" <?php if($isi->publish=='1'){echo "checked";} ?>>
                            <span class="text-primary info-publish">Berita akan ditampilkan pada web</span>
                          </label>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-xs-3">Komentar</label>
                        <div class="col-xs-9">
                            <label>
                              <input name="comment_mode" type="checkbox" class="flat-red" <?php if($isi->comment_mode=='On'){echo "checked";} ?>>
                              <span class="text-primary info-komentar"> Berita ini dapat dikomentar tamu</span>
                            </label>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-xs-3">Slug</label>
                        <div class="col-xs-9">
                          <input name="slug" placeholder="Contoh : sejarah-balitbangda-palu" class="form-control" type="text" value="<?php echo $isi->slug ?>">
                        </div>
                      </div>

                    </div>
                  </div>


                  <div class="form-body">
                    <textarea id="editor1" name="berita" rows="50" cols="80">
                      <?php echo $isi->berita ?>
                    </textarea>
                  </div>
                  <hr>
                  <div class="form-body">
                    <label class="control-label">Ulasan singkat berita (max 255 karakter)</label>
                    <textarea class="form-control" name="preview" rows="10" cols="80" maxlength="255"><?php echo $isi->preview ?></textarea>
                  </div>

                </div>
                <div class="box-footer">
                  <!-- <div class="form-group"> -->
                    <button type="submit" name="simpan" class="btn btn-primary pull-right" onclick="return confirm('Simpan Posting?')">
                      <span class="fa fa-save"></span> Update
                    </button>
                  <!-- </div> -->
                </div>

              </form>

            </div>
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col-->
      </div>
      <!-- ./row -->
    </section>
    <!-- /.content -->
