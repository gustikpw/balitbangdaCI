<?php $this->load->view('templates/slider') ?>
<section class="blog-section">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-sm-8">
                 <div class="row">

                   <?php foreach ($berita as $isi_berita): ?>
                     <?php if ($isi_berita==NULL): ?>
                       <?php echo "Tidak ada berita..." ?>
                     <?php endif; ?>
                     <div class="col-md-6">
                       <div class="blog-col">
                         <div class="blog-img">
                           <?php $gambar = ($isi_berita->link_gambar==NULL) ? 'assets/images/404/no-image.jpg' : $isi_berita->link_gambar; ?>
                           <img src="<?php echo base_url().$gambar ?>" alt="">
                           <div class="post-date">
                             <img src="<?php echo base_url('assets/images/palu-icon_64x64.png'); ?>" style="width:50px;height:50px;">
                           </div>
                         </div>
                         <h4><a href="<?php echo site_url('index.php/news/get/').$isi_berita->slug; ?>"><?php echo $isi_berita->judul; ?></a></h4>
                         <?php $preview = ($isi_berita->preview=='') ? substr($isi_berita->berita,0,100) : $isi_berita->preview ; ?>
                         <p><?php echo $preview.'...<br><a href="'.site_url('index.php/news/get/').$isi_berita->slug.'" class="btn btn-sm btn-warning">Read more</a><br>'; ?></p>
                         <!-- <div class="info-bar clearfix">
                           <ul>
                             <li><i class="fa fa-comments-o" aria-hidden="true"></i> <a href="#">10 Comments</a></li>
                             <li><i class="fa fa-pencil" aria-hidden="true"></i> <a href="#">Admin</a></li>
                           </ul>
                         </div> -->
                       </div>
                     </div>

                   <?php endforeach; ?>





                     <!-- <div class="col-md-12">
                         <div class="blog-col">
                            <div class="embed-responsive embed-responsive-16by9">
                                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/1uyOc85OY-U"></iframe>
                            </div>
                             <h4><a href="blog-single.html">Fully responsive layout</a></h4>
                             <div class="info-bar clearfix">
                                 <ul>
                                     <li><i class="fa fa-comments-o" aria-hidden="true"></i> <a href="#">10 Comments</a></li>
                                     <li><i class="fa fa-pencil" aria-hidden="true"></i> <a href="#">Admin</a></li>
                                 </ul>
                             </div>
                             <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. </p>
                         </div>
                     </div> -->
                 </div>
                 <!-- Pagination -->
                 <div class="page-pagination page-pagination-right">
                   <?php echo $halaman; ?>
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
                          $gambar = ($rp->link_gambar==NULL) ? 'assets/images/palu-icon_64x64.png' : $rp->link_gambar;
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
        <!-- Pagination -->
        <!-- <div class="page-pagination page-pagination-right"> -->
          <?php //echo $halaman; ?>
        <!-- </div> -->
    </div>
</section>
