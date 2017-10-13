<aside class="main-sidebar">

  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">

    <!-- Sidebar user panel (optional) -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?php echo base_url('assets/images/icon/admin-icon.png')?>" class="img-circle" alt="User Image">
        <!-- <i class="fa fa-user fa-3x"></i> -->
      </div>
      <div class="pull-left info">
        <p><?php echo $_SESSION['alias']; ?></p>
        <!-- Status -->
        <a href="#"><i class="fa fa-circle text-success"></i> <?php echo ucfirst($_SESSION['level']) ?></a>
      </div>
    </div>

    <!-- search form (Optional) -->
    <!-- <form action="#" method="get" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Search...">
        <span class="input-group-btn">
            <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
            </button>
          </span>
      </div>
    </form> -->
    <!-- /.search form -->

    <!-- Sidebar Menu -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">BLOG</li>
      <!-- Optionally, you can add icons to the links -->
      <?php $xxc = ($active == "berita" || $active == "create" ) ? 'active' : '' ?>
      <li class="treeview <?php echo $xxc; ?>">
        <a href="#"><i class="fa fa-newspaper-o"></i> <span>Berita</span>
          <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a><?php $xxd = ($active == "create") ? 'active' : '' ?><?php $xxe = ($active == "berita") ? 'active' : '' ?>
        <ul class="treeview-menu">
          <li class="<?php echo $xxd ?>"><a href="<?php echo site_url('index.php/dashboard/openurl/create')?>"><i class="fa fa-circle-o"></i> <span>Buat Berita Baru</span></a></li>
          <li class="<?php echo $xxe ?>"><a href="<?php echo site_url('index.php/dashboard/openurl/berita')?>"><i class="fa fa-circle-o"></i> <span>Semua Berita</span></a></li>
        </ul>
      </li>



      <?php $xxg = ($active == "komentar") ? 'active' : '' ?>
      <li class="treeview <?php echo $xxg ?>">
        <a href="#"><i class="fa fa-comments"></i> <span>Komentar</span>
          <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="<?php echo $xxg ?>"><a href="<?php echo site_url('index.php/dashboard/openurl/komentar')?>"><i class="fa fa-circle-o"></i> <span>Komentar</span></a></li>
        </ul>
      </li>

      <?php if ($this->session->level == 'administrator'): ?>

        <?php $xxf = ($active == "bidang") ? 'active' : '' ?>
        <li class="treeview <?php echo $xxf ?>">
          <a href="#"><i class="fa fa-link"></i> <span>Bidang Kerja</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php echo $xxf ?>"><a href="<?php echo site_url('index.php/dashboard/openurl/bidang')?>"><i class="fa fa-circle-o"></i> <span>Bidang</span></a></li>
          </ul>
        </li>

      <?php $xxh = ($active == "penulis") ? 'active' : '' ?>
      <li class="treeview <?php echo $xxh ?>">
        <a href="#"><i class="fa fa-edit"></i> <span>Penulis</span>
          <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="<?php echo $xxh ?>"><a href="<?php echo site_url('index.php/dashboard/openurl/penulis')?>"><i class="fa fa-circle-o"></i> <span>Penulis</span></a></li>
        </ul>
      </li>

      <?php $xxi = ($active == "users") ? 'active' : '' ?>
        <li class="treeview <?php echo $xxi ?>">
          <a href="#"><i class="fa fa-users"></i> <span>Users</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php echo $xxi ?>"><a href="<?php echo site_url('index.php/dashboard/openurl/users')?>"><i class="fa fa-circle-o"></i> <span>Users</span></a></li>
          </ul>
        </li>

        <?php $xxj = ($active == "info") ? 'active' : '' ?>
          <li class="treeview <?php echo $xxj ?>">
            <a href="#"><i class="fa fa-info"></i> <span>Info</span>
              <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="<?php echo $xxj ?>"><a href="<?php echo site_url('index.php/dashboard/openurl/info')?>"><i class="fa fa-circle-o"></i> <span>Info Lembaga</span></a></li>
            </ul>
          </li>

          <?php $xxk = ($active == "slider") ? 'active' : '' ?>
          <li class="treeview <?php echo $xxk ?>">
            <a href="#"><i class="glyphicon glyphicon-picture"></i> <span>Slider</span>
              <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="<?php echo $xxk ?>"><a href="<?php echo site_url('index.php/dashboard/openurl/slider')?>"><i class="fa fa-circle-o"></i> <span>Slider</span></a></li>
            </ul>
          </li>

          <?php $xxl = ($active == "upload") ? 'active' : '' ?>
          <li class="treeview <?php echo $xxl ?>">
            <a href="#"><i class="glyphicon glyphicon-upload"></i> <span>Upload</span>
              <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="<?php echo $xxl ?>"><a href="<?php echo site_url('index.php/dashboard/openurl/upload')?>"><i class="fa fa-circle-o"></i> <span>Upload Images</span></a></li>
            </ul>
          </li>

        </ul>

        <ul class="sidebar-menu" data-widget="tree">
          <li class="header">PROFIL</li>

          <?php $xxm = ($active == "buku_tamu") ? 'active' : '' ?>
          <li class="treeview <?php echo $xxm ?>">
            <a href="#"><i class="glyphicon glyphicon-book"></i> <span>Pengunjung</span>
              <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="<?php echo $xxm ?>"><a href="<?php echo site_url('index.php/dashboard/openurl/buku_tamu')?>"><i class="fa fa-circle-o"></i> <span>Buku Tamu</span></a></li>
            </ul>
          </li>

          <?php $xxn = ($active == "profil") ? 'active' : '' ?>
          <li class="treeview <?php echo $xxn ?>">
            <a href="#"><i class="glyphicon glyphicon-book"></i> <span>Profil <i>(Coming soon)</i></span>
              <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="<?php echo $xxn ?>"><a href="<?php echo site_url('index.php/dashboard/openurl/landasanhukum')?>"><i class="fa fa-circle-o"></i> <span>Landasan Hukum</span></a></li>
              <li class="<?php echo $xxn ?>"><a href="<?php echo site_url('index.php/dashboard/openurl/visimisi')?>"><i class="fa fa-circle-o"></i> <span>Visi dan Misi</span></a></li>
              <li class="<?php echo $xxn ?>"><a href="<?php echo site_url('index.php/dashboard/openurl/tungsi')?>"><i class="fa fa-circle-o"></i> <span>Tugas Pokok dan Fungsi</span></a></li>
              <li class="<?php echo $xxn ?>"><a href="<?php echo site_url('index.php/dashboard/openurl/struktur')?>"><i class="fa fa-circle-o"></i> <span>Struktur Organisasi</span></a></li>
              <li class="<?php echo $xxn ?>"><a href="<?php echo site_url('index.php/dashboard/openurl/proker')?>"><i class="fa fa-circle-o"></i> <span>Program Kegiatan</span></a></li>
              <li class="<?php echo $xxn ?>"><a href="<?php echo site_url('index.php/dashboard/openurl/sejarah')?>"><i class="fa fa-circle-o"></i> <span>Sejarah</span></a></li>
            </ul>
          </li>
      <?php endif; ?>


    </ul>
    <!-- /.sidebar-menu -->
  </section>
  <!-- /.sidebar -->
</aside>
