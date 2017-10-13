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

<!-- jQuery -->
<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.min.js') ?>"></script>

<!-- Bootstrap Core JavaScript -->
<script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>

<!-- all plugins and JavaScript -->
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

<!-- Main Custom JS -->
<script type="text/javascript" src="<?php echo base_url('assets/js/custom.js') ?>"></script>


</html>
