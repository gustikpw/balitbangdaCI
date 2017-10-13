<script src="<?php echo base_url('assets/adminlte/bower_components/select2/dist/js/select2.full.min.js') ?>"></script>
<script src="<?php echo base_url('assets/adminlte/plugins/iCheck/icheck.min.js') ?>"></script>
<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.

    CKEDITOR.replace('editor1',{width: '820px',height: '500px',})

  })
</script>

<script>
$(document).ready(function(){
//Initialize Select2 Elements
$('.select2').select2()

//Flat red color scheme for iCheck
$('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
  checkboxClass: 'icheckbox_flat-green',
  radioClass   : 'iradio_flat-green'
})

$('input[name="publish"]').on('ifChecked', function(event){
  $('.info-publish').html('<span class="text-primary"> Berita akan ditampilkan pada web</span>')
  // alert($(this).val()); // alert value
});

$('input[name="publish"]').on('ifUnchecked', function(event){
  // alert($(this).val()); // alert value
  $('.info-publish').html('<span class="text-warning"> Berita tidak akan ditampilkan pada web</span>')
});

$('input[name="comment_mode"]').on('ifChecked', function(event){
  $('.info-komentar').html('<span class="text-primary"> Berita ini dapat dikomentar tamu</span>')// alert($(this).val()); // alert value
});

$('input[name="comment_mode"]').on('ifUnchecked', function(event){ // alert($(this).val()); // alert value
  $('.info-komentar').html('<span class="text-warning"> Komentar non-aktif</span>')
});

$('input[name="judul"]').keyup(function(){
    var isi = $('input[name="judul"]').val().toLowerCase();
    $('input[name="slug"]').val(isi.replace(/ /g,"-"));
})

// ifClicked - user clicked on a customized input or an assigned label
// ifChanged - input's checked, disabled or indeterminate state is changed
// ifChecked - input's state is changed to checked
// ifUnchecked - checked state is removed
// ifToggled - input's checked state is changed
// ifDisabled -input's state is changed to disabled
// ifEnabled - disabled state is removed
// ifIndeterminate - input's state is changed to indeterminate
// ifDeterminate - indeterminate state is removed
// ifCreatedinput - is just customized
// ifDestroyed - customization is just removed
})
</script>
</body>
</html>
