<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-8 col-xs-12">
      <dt>BLOGGING</dt>
      <a href="<?php echo site_url('/index.php/dashboard/openurl/create') ?>" class="btn btn-app">
        <i class="fa fa-plus"></i> Buat Artikel
      </a>
      <a href="<?php echo site_url('/index.php/dashboard/openurl/berita') ?>" class="btn btn-app">
        <i class="fa fa-newspaper-o"></i> Artikel Manager
      </a>
      <?php if ($_SESSION['level'] === 'administrator'): ?>
        <a href="<?php echo site_url('/index.php/dashboard/openurl/bidang') ?>" class="btn btn-app">
          <i class="fa fa-sitemap"></i> Bidang
        </a>
      <?php endif; ?>
      <dt>MANAGER</dt>
      <?php if ($_SESSION['level'] === 'administrator'): ?>
        <a href="<?php echo site_url('/index.php/dashboard/openurl/penulis') ?>" class="btn btn-app">
          <i class="fa fa-pencil-square-o"></i> Penulis
        </a>
        <a href="<?php echo site_url('/index.php/dashboard/openurl/users') ?>" class="btn btn-app">
          <i class="fa fa-users"></i> Users Manager
        </a>
        <a href="<?php echo site_url('#/index.php/dashboard/openurl/upload') ?>" class="btn btn-app">
          <i class="fa fa-picture-o"></i> Images Manager
        </a>
        <dt>SITES</dt>
        <a href="<?php echo site_url('/index.php/dashboard/openurl/info') ?>" class="btn btn-app">
          <i class="fa fa-info"></i> Info Lembaga
        </a>
        <a href="<?php echo site_url('/index.php/dashboard/openurl/slider') ?>" class="btn btn-app">
          <i class="fa fa-square"></i> Banners
        </a>
      <?php endif; ?>
      <?php if ($_SESSION['level'] === 'penulis'): ?>
        <a href="<?php echo site_url('/index.php/dashboard/openurl/upload') ?>" class="btn btn-app">
          <i class="fa fa-picture-o"></i> Images Manager
        </a>
      <?php endif; ?>
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>
<!-- /.content -->
