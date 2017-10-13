<script src="<?php echo base_url('assets/adminlte/bower_components/select2/dist/js/select2.min.js')?>"></script>
<script>
var table;
var save_method;
$(document).ready(function() {
  $('.select2').select2()
  //datatables
  table = $('#table').DataTable({
      "processing": true, //Feature control the processing indicator.
      "serverSide": true, //Feature control DataTables' server-side processing mode.
      "order": [], //Initial no order.
      // Load data for the table's content from an Ajax source
      "ajax": {
          "url": "<?php echo site_url('index.php/komentar/ajax_list')?>",
          "type": "POST"
      },
      //Set column definition initialisation properties.
      "columnDefs": [
      {
          "targets": [ -1 ], //last column
          "orderable": false, //set not orderable
      },
      ],

  });

});

function deletekm(id)
{
  if(confirm('Are you sure delete this data?'))
  {
    $.ajax({
      url : "<?php echo site_url('index.php/komentar/delete_komentar')?>/"+id,
      type: "POST",
      dataType: "JSON",
      success: function(data) {
        notif(title='Success',pesan='Berhasil menghapus data!',tipe='success');
        reload_table();
      },
      error: function (jqXHR, textStatus, errorThrown) {
        notif(title='Gagal',pesan='Gagal menghapus data!',tipe='error');
      }
    });

  }
}

function viewkm(id) {
  $.ajax({
    url : "<?php echo site_url('index.php/komentar/viewDetail')?>/"+id,
    type: "POST",
    dataType: "JSON",
    success: function(data) {
      $('.p1').html('<b>'+data.nama_tamu+'</b>');
      $('.p2').html(data.email);
      $('.p3').html(data.komentar);
      $('.p4').html(data.judul);
      $('.p5').html(data.tanggal);
      $('#modal_form').modal('show');
      // $('.modal-title').text('Detail Komentar');
    },
    error: function (jqXHR, textStatus, errorThrown) {
      notif(title='Gagal',pesan='Gagal mengambil data!',tipe='error');
    }
  });
}

function reload_table(){
  table.ajax.reload(null,false); //reload datatable ajax
}
</script>
</body>
</html>
