<?php $this->load->view('templates/head_tag') ?>

<body>

    <!-- Preloader -->
    <div id="preloader">
        <div id="status"></div>
    </div>

    <!-- Error Start -->
    <section class="error-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="error-col">
                        <h1><span>oops!</span> page not found</h1>
                        <img src="<?php echo base_url('assets/images/error.png') ?>" alt="">
                        <h4><a href="<?php echo site_url() ?>">go back to home page</a></h4>
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
