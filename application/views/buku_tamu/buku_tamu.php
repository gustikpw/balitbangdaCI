<?php $this->load->view('templates/head_tag') ?>
<?php $this->load->view('templates/header') ?>
    <!-- Page Title bar -->
    <!-- <section class="defult-page-title">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-title-box">
                        <h2>Kontak & Buku Tamu</h2>
                        <p><a href="#">Home</a> / <a href="#">Contact</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section> -->


    <!-- Contact Start -->
    <section class="contact-area">
        <div class="container">
          <?php if (isset($_SESSION['pesan'])): ?>
            <div class="alert alert-success alert-dismissable fade in">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>Berhasil!</strong> <?php echo $_SESSION['pesan'] ?>.
            </div>
          <?php endif; ?>
            <div class="row">
                <div class="col-md-4 col-sm-6">
                    <div class="contact-col contact-infobox">
                        <i class="fa fa-envelope-o" aria-hidden="true"></i>
                        <p><?php echo $info->email; ?></p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="contact-col contact-infobox">
                        <i class="fa fa-phone" aria-hidden="true"></i>
                        <p><?php echo $info->telp; ?></p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="contact-col contact-infobox">
                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                        <p><?php echo $info->alamat; ?></p>
                    </div>
                </div>
            </div>
            <hr>
            <div class="text-center">
              <h3 style="color: #8ECC0A">
                <i class="fa fa-book fa-2x"></i>
                BUKU <span>TAMU</span>
              </h3>
              <dt>Silahkan mengisi Buku Tamu dibawah untuk meninggalkan Pesan kepada kami.</dt>
            </div>
            <hr>
            <div class="row contact-form-row">
                <div class="col-md-7">
                    <div class="row">
                        <div class="contact-col">
                            <form action="<?php echo site_url('/index.php/buku_tamu/save_tamu') ?>" method="post">
                                <div class="col-md-6">
                                    <input type="text" name="nama" class="form-control" placeholder="* Nama Lengkap Anda" required>
                                </div>
                                <div class="col-md-6">
                                    <input type="email" name="email" class="form-control" placeholder="Isi Email jika ada!">
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="alamat" class="form-control" placeholder="*Masukan Alamat" required>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="telp" class="form-control" placeholder="*Masukan Nomor Telepon/HP" required>
                                </div>
                                <div class="col-md-12">
                                    <input type="text" name="perihal" class="form-control" placeholder="*Perihal/Judul Pesan" required>
                                </div>
                                <div class="col-md-12">
                                    <div class="contact-textarea">
                                        <textarea class="form-control" rows="6" placeholder="*Tulis Saran/Pesan Anda!" name="pesan" required></textarea>
                                        <dd><i>Pastikan data yang Anda masukan benar.</i></dd>
                                        <button class="btn btn-default my-btn text-center pull-right" type="submit" >Kirim Pesan</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="xxxcontact-col">
                        <h3 style="color: #8ECC0A">
                          <span class="fa fa-info fa-2x"> </span> <?php echo $infoBukuTamu->judul; ?>
                        </h3>
                        <dd><?php echo $infoBukuTamu->deskripsi; ?></dd>
                        <!-- <dd> -->
                          <small><cite title="Source Title"><?php echo $infoBukuTamu->other; ?></cite></small>
                        <!-- </dd> -->
                        <hr>

                    </div>
                </div>
            </div>
        </div>
    </section>
<hr>
<!-- Map -->
<div id="map" style="width:100%;height:400px;"></div>

    <!-- Footer Start -->
    <footer class="main-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="footer-col">
                        <h3>BALITBANGDA <span>KOTA PALU</span></h3>
                        <p class="top-para"></p>
                        <p></p>
                            <!-- Social Link  -->
                        <div class="social-group">
                            <ul>
                                <li><a href="<?php echo $info->sosmed1 ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="<?php echo $info->sosmed2 ?>"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
                                <li><a href="<?php echo $info->sosmed3 ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                <li><a href="javascript:void()" class="btn btn-disabled"><span class="fa fa-eye" aria-hidden="true"></span><strong> <?php echo $visitor ?></strong> Visitors</a></li>
                                <!-- <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li> -->
                                <!-- <li><a href="#"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li> -->
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 col-sm-6">
                    <div class="footer-col">
                        <h3>Quick Links</h3>
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Profil</a></li>
                            <li><a href="#">Unit Kerja</a></li>
                            <li><a href="#">Hasil Penelitian</a></li>
                            <li><a href="#">Kontak</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="footer-col">
                        <h3>KOMENTAR TERBARU</h3>
                        <?php foreach ($recentKomen as $rk): ?>
                        <div class="twitter-box">
                            <i class="fa fa-twitter" aria-hidden="true"></i>
                            <p><b><a href="#"><?php echo '#'.$rk->nama_tamu ?></a></b> <?php echo substr($rk->komentar,1,50)."... <b><a href=\"".site_url('index.php/news/get/')."$rk->slug\">$rk->judul</a></b>" ?></p>
                        </div>
                      <?php endforeach; ?>

                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="footer-col address-col">
                        <h3>KONTAK KAMI</h3>
                        <!-- <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p> -->
                        <ul>
                            <li><i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo $info->alamat.' - '.$info->kodepos; ?></li>
                            <li><i class="fa fa-envelope" aria-hidden="true"></i> <?php echo $info->email; ?></li>
                            <li><i class="fa fa-phone" aria-hidden="true"></i> <?php echo $info->telp; ?></li>
                            <li><a href="<?php echo $info->sosmed1 ?>" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i>@BALITBANGDA.KOTAPALU</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Copyright Start -->
    <section class="copyright-bar">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="copyright-col text-center">
                        <p>©2017-<?php echo date('Y') ?>. By <a href="#" target="_blank">BALITBANGDA KOTA PALU & Team KKLP TEMATIK STMIK ADHI GUNA PALU.</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <a href="#" class="scrollup">
        <i class="fa fa-long-arrow-up" aria-hidden="true"></i>
    </a>

    <script
      src="https://code.jquery.com/jquery-1.12.4.min.js"
      integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="
      crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/modernizr-custom.js') ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/css3-animate-it.js') ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap-dropdownhover.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/VideoPopUp.jquery.js') ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/jquery.counterup.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/jquery.waypoints.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/jquery.filterizr.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/owl.carousel.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/jarallax.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/jquery.fancybox.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/header-animation.js') ?>"></script>

    <!-- Map -->
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCV6nWEotsjBYreCJfvLMSwF3u0YPVtCEM&callback=init" type="text/javascript"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/map.js') ?>"></script>

    <!-- Main Custom JS -->
    <script type="text/javascript" src="<?php echo base_url('assets/js/custom.js') ?>"></script>

</html>
