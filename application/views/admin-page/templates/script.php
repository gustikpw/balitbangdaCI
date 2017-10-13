<!-- utama -->
<script src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
<!-- untuk editor -->
<script src="<?php echo base_url('assets/adminlte/dist/js/adminlte.min.js') ?>"></script>
<script src="<?php echo base_url('assets/adminlte/bower_components/ckeditor/ckeditor.js')?>"></script>
<!-- untuk tabel -->
<script src="<?php echo base_url('assets/adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js')?>"></script>
<script src="<?php echo base_url('assets/adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')?>"></script>
<script src="<?php echo base_url('assets/adminlte/plugins/pnotify/dist/pnotify.js')?>"></script>
<script>
function notif(titlen,pesan,tipe)
{
  new PNotify({
                  title: title,
                  text: pesan,
                  type: tipe,
                  delay: 3000,
                  styling: 'bootstrap3'
              });
            }
</script>
