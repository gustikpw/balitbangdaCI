<!-- Slider Start -->
<?php
  $linkg = base_url('assets/adminlte/bower_components/kcfinder-3.12/upload/images/slider/');
?>
<section class="main-slider-area">
    <div class="main-container">
        <div id="carousel-example-generic" class="carousel slide carousel-fade">
            <!-- Indicators -->
            <ol class="carousel-indicators">
              <?php foreach ($slider as $sld): ?>
                <li data-target="#carousel-example-generic" data-slide-to="<?php echo $sld->data_slide ?>" class="<?php echo $sld->class ?>"></li>
              <?php endforeach; ?>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
              <?php foreach ($slider as $sld2): ?>
                <!-- First slide -->
                <div class="item <?php echo $sld2->class ?>"
                  style="background: url('<?php echo $linkg.$sld2->nama_foto ?>');
                    background-repeat: no-repeat;
                    background-size: cover;
                    background-position: center;
                    position: relative;">
                    <div class="carousel-caption">
                        <p data-animation="animated fadeInDown">
                            <?php echo $sld2->deskripsi1 ?>
                        </p>
                        <h3 data-animation="animated fadeInUp">
                            <?php echo $sld2->deskripsi2 ?>
                        </h3>
                    </div>
                </div>
                <!-- /.item -->
              <?php endforeach; ?>
            </div>
            <!-- /.carousel-inner -->

            <!-- Controls -->
            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <!-- /.carousel -->
    </div>
</section>
