<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from mvcsoftonline.com/html/sunshine/index-one.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 26 Jul 2017 01:24:00 GMT -->
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="<?php echo base_url('assets/images/palu-icon.png')?>">
    <link rel="shortcut icon" type="image/png" href="<?php echo base_url('assets/images/favicon.png')?>">

    <title><?php echo $title; ?></title>
    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">

    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/style.css'); ?>">

    <!-- Responsive stylesheet  -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/responsive.css'); ?>">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Preloader -->
    <div id="preloader">
        <div id="status"></div>
    </div>

    <!-- Main Header Start -->
    <header class="main-herader">
        <!-- Header top start -->
        <!-- <div class="header-topbar">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2 col-md-4 col-sm-4 col-xs-4 full-wd-600">
                        <div class="header-topbar-col center767">
                            <p><i class="fa fa-phone" aria-hidden="true"></i> <?php //echo $info->telp; ?></p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-4 full-wd-600">
                        <div class="header-topbar-col center767">
                            <p class="res-mb-10"><i class="fa fa-envelope-o" aria-hidden="true"></i> <a href="mailto:<?php //echo $info->email; ?>"><?php //echo $info->email; ?></a>
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-2 col-lg-offset-5 col-md-4 col-sm-4 col-xs-4 full-wd-600">
                        <div class="header-topbar-col center767">
                            <!-o- <form>
                                <div class="input-group">
                                    <input placeholder="Cari..." class="form-control" name="search-field" type="text">
                                    <span class="input-group-btn">
                                        <button type="submit" class="btn"><i class="fa fa-search"></i></button>
                                    </span>
                                </div>
                            </form> -p->
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- Header top end -->

        <!-- Header navbar start -->
        <div class="header-navbar" id="navbar-main">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <nav class="navbar navbar-default">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <a class="navbar-brand" href="<?php echo site_url(); ?>"><img src="<?php echo base_url('assets/images/logo/logo.png')?>" alt="">
                                </a>
                            </div>
                            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" data-hover="dropdown" data-animations="fadeInUp">
                                <ul class="nav navbar-nav navbar-right">
                                    <li><a href="<?php echo site_url(); ?>">Home</a>
                                    </li>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Profil <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="<?php echo site_url('/index.php/news/get/landasan-hukum')?>">Landasan Hukum</a></li>
                                            <li><a href="<?php echo site_url('/index.php/news/get/visi-dan-misi')?>">Visi dan Misi</a></li>
                                            <li><a href="<?php echo site_url('/index.php/news/get/tugas-pokok-dan-fungsi')?>">Tugas Pokok dan Fungsi</a></li>
                                            <li><a href="<?php echo site_url('/index.php/news/get/struktur-organisasi')?>">Struktur Organisasi</a></li>
                                            <li><a href="<?php echo site_url('/index.php/news/get/program-kegiatan')?>">Program Kegiatan</a></li>
                                            <li><a href="<?php echo site_url('/index.php/news/get/sejarah-balitbangda-palu')?>">Sejarah BALITBANGDA</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Unit Kerja <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="<?php echo site_url('/index.php/news/unitkerja/pemerintahan-daerah')?>">Pemerintahan Daerah</a></li>
                                            <li><a href="<?php echo site_url('/index.php/news/unitkerja/inovasi-pembangunan')?>">Inovasi dan Pembangunan</a></li>
                                            <li><a href="<?php echo site_url('/index.php/news/unitkerja/sosial-budaya')?>">Sosial Budaya</a></li>
                                            <li><a href="<?php echo site_url('/index.php/news/unitkerja/bidang-lainnya')?>">Bidang Lainnya</a></li>
                                            <!-- <li><a href="<?php //echo site_url('/index.php/news/unitkerja/kepegawaian-umum')?>">Kepegawaian dan Umum</a></li>
                                            <li><a href="<?php //echo site_url('/index.php/news/unitkerja/sumberdaya-inovasi-daerah')?>">Sumber Daya Inovasi Daerah</a></li>
                                            <li><a href="<?php //echo site_url('/index.php/news/unitkerja/pemanfaatan-ekonomi-inovasi-daerah')?>">Pemanfaatan Ekonomi dan Inovasi Daerah</a></li>
                                            <li><a href="<?php //echo site_url('/index.php/news/unitkerja/perencanaan-keuangan')?>">Perencanaan dan Keuangan</a></li>
                                            <li><a href="<?php //echo site_url('/index.php/news/unitkerja/kelembagaan')?>">Kelembagaan</a></li>
                                            <li><a href="<?php //echo site_url('/index.php/news/unitkerja/potensi-sosial-budaya')?>">Potensi Sosial Budaya</a></li>
                                            <li><a href="<?php //echo site_url('/index.php/news/unitkerja/aparatur')?>">Aparatur</a></li>
                                            <li><a href="<?php //echo site_url('/index.php/news/unitkerja/pengembangan-pembangunan-iptek')?>">Pengembangan dan Pembangunan IPTEK</a></li>
                                            <li><a href="<?php //echo site_url('/index.php/news/unitkerja/pengembangan-potensi-daerah')?>">Pengembangan dan Potensi Daerah</a></li>
                                            <li><a href="<?php //echo site_url('/index.php/news/unitkerja/kemasyarakatan')?>">Kemasyarakatan</a></li>
                                             -->
                                        </ul>
                                    </li>
                                    <li><a href="#">Hasil Penelitian</a>
                                    <!-- <li><a href="#">Contact</a> -->
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>
