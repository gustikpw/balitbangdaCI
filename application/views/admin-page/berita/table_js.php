<script>
var table;
$(document).ready(function() {
  //datatables
  table = $('#table').DataTable({

      "processing": true, //Feature control the processing indicator.
      "serverSide": true, //Feature control DataTables' server-side processing mode.
      "order": [], //Initial no order.

      // Load data for the table's content from an Ajax source
      "ajax": {
          "url": "<?php echo site_url('index.php/dashboard/ajax_list')?>",
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

function deletebr(id)
{
  if(confirm('Are you sure delete this data?'))
  {
    // ajax delete data to database
    $.ajax({
      url : "<?php echo site_url('index.php/dashboard/delete_berita')?>/"+id,
      type: "POST",
      dataType: "JSON",
      success: function(data) {
          reload_table();
          notif(title='Success',pesan='Berhasil menghapus data!',tipe='success');
      },
      error: function (jqXHR, textStatus, errorThrown) {
          notif(title='Gagal',pesan='Gagal menghapus data!',tipe='error');
      }
    });

  }
}

function reload_table(){
  table.ajax.reload(null,false); //reload datatable ajax
}
</script>
</body>
</html>
