<?php $this->load->view('templates/slider') ?>
<section class="blog-section blog-single-section">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-sm-8">
              <h2><a href="<?php echo site_url('index.php/news/get/').$berita->slug ?>"><?php echo $berita->judul; ?></a></h2>
              <h5 class="text-disable">Diposting oleh :<a href="<?php echo $berita->situs_web; ?>" target="_blank"><?php echo $berita->poster; ?></a> | <?php echo $berita->tgl_posting; ?></h5>
              <div class="blog-col blog-single-col">
                  <div class="blog-img">
                    <?php
                      $gambar = ($berita->link_gambar=='') ? 'assets/images/404/no-image.jpg' : $berita->link_gambar ;
                     ?>
                      <!-- <img src="<?php //echo base_url().$gambar; ?>" alt="" height="95px"> -->
                      <div class="post-date">
                        <img src="<?php echo base_url('assets/images/palu-icon_64x64.png'); ?>" style="width:50px;height:50px;">
                      </div>
                  </div>

                      <?php echo $berita->berita; ?>
                      <br>
                      <br>
                      <br>
                      <br>
                <?php if ($berita->comment_mode=='On'): ?>
                  <hr>
                  <div class="blog-form-area">
                      <h3><a href="#">COMMENT</a></h3>
                      <?php foreach ($komentar as $komen): ?>
                        <div class="blog-commment-item text-left">
                          <!-- <img src="<?php //echo base_url('assets/images/blog/comment-1.jpg')?>" alt="" > -->
                          <h4><?php echo $komen->nama_tamu ?> <a href="#"><i class="fa fa-reply pull-right" aria-hidden="true"></i></a> <small><?php echo $komen->tanggal ?></small></h4>
                          <p><?php echo $komen->komentar ?></p>
                        </div>
                      <?php endforeach; ?>
                  </div>
                  <hr>
                  <div class="form-field">
                      <form action="<?php echo site_url('index.php/news/komentar_save/').$berita->slug; ?>" method="post">
                        <input type="text" name="id_komentar" hidden>
                        <input type="number" name="id_berita" value="<?php echo $berita->id_berita; ?>" hidden>
                          <div class="col-md-6">
                              <input type="text" name="nama_tamu" class="form-control" placeholder="Nama Lengkap" required>
                          </div>
                          <div class="col-md-6">
                              <input type="email" name="email" class="form-control" placeholder="Email" required>
                          </div>
                          <div class="col-md-12">
                              <div class="contact-textarea">
                                  <textarea name="komentar" class="form-control" rows="6" placeholder="Tulis Komentar" required></textarea>
                                  <button class="btn btn-default" type="submit" value="Submit Form">Submit</button>
                              </div>
                          </div>
                      </form>
                  </div>
                <?php endif; ?>

              </div>
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="blog-col blog-sidebar-col">
                    <!-- <div class="sidebar-search-box">
                        <form>
                            <div class="input-group">
                                <input placeholder="Search..." class="form-control" name="search-field" type="text">
                                <span class="input-group-btn">
                                    <button type="submit" class="btn"><i class="fa fa-search"></i></button>
                                </span>
                            </div>
                        </form>
                    </div> -->
                    <div class="categories">
                        <div class="sidebar-title">
                            <h3>Unit Kerja</h3>
                        </div>
                        <ul class="clearfix">
                          <?php echo $unitKerja; ?>
                        </ul>
                    </div>
                    <div class="sidebar-post">
                        <div class="sidebar-title">
                            <h3>Berita Terbaru</h3>
                        </div>
                        <?php foreach ($recentPost as $rp){
                          $gambar = ($rp->link_gambar==NULL) ? 'assets/images/404/no-image.jpg' : $rp->link_gambar;
                          echo "<ul class=\"text-left\">
                    				<li>
                    					<img src=\"".base_url().$gambar."\">
                    					<h4><a href=\"".site_url('index.php/news/get/').$rp->slug."\">$rp->judul</a></h4>
                    					<p>$rp->bidang</p>
                    				</li>
                    			</ul>";
                        } ?>
                    </div>
                    <!-- <div class="sidebar-tags">
                        <div class="sidebar-title">
                            <h3>Tags</h3>
                        </div>
                        <ul>
                            <li>
                                <a href="#">Design</a>
                            </li>
                            <li>
                                <a href="#">Development</a>
                            </li>
                            <li>
                                <a href="#">PHP</a>
                            </li>
                            <li>
                                <a href="#">photoshop</a>
                            </li>
                            <li>
                                <a href="#">wordpress</a>
                            </li>
                            <li>
                                <a href="#">graphic</a>
                            </li>
                            <li>
                                <a href="#">css</a>
                            </li>
                            <li>
                                <a href="#">Responsive</a>
                            </li>
                            <li>
                                <a href="#">youtuber</a>
                            </li>
                        </ul>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</section>
