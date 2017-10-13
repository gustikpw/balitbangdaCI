<script>
var table;
var save_method;
$(document).ready(function() {
  //datatables
  table = $('#table').DataTable({
      "processing": true, //Feature control the processing indicator.
      "serverSide": true, //Feature control DataTables' server-side processing mode.
      "order": [], //Initial no order.
      // Load data for the table's content from an Ajax source
      "ajax": {
          "url": "<?php echo site_url('index.php/buku_tamu/ajax_list')?>",
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

function deleteBKT(id)
{
  if(confirm('Are you sure delete this data?'))
  {
    $.ajax({
      url : "<?php echo site_url('index.php/buku_tamu/delete_buku_tamu')?>/"+id,
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

function viewBKT(id) {
  $.ajax({
    url : "<?php echo site_url('index.php/buku_tamu/getTamu')?>/"+id,
    type: "POST",
    dataType: "JSON",
    success: function(data) {
      $('.p1').html('<b>'+data.nama+'</b>');
      $('.p2').html(data.email);
      $('.p3').html(data.alamat);
      $('.p4').html(data.telp);
      $('.p5').html(data.perihal);
      $('.p6').html(data.pesan);
      $('.p7').html(data.tgl_kunjungan);
      $('.p8').html(data.ip_address);
      $('#modal_detail').modal('show');
    },
    error: function (jqXHR, textStatus, errorThrown) {
        notif(title='Gagal',pesan='Gagal mengambil data!',tipe='error');
    }
  });
}

// SETUP BUKU TAMU
function setUpdate()
{
  $('#btnSave2').text('Updating...'); //change button text
  $('#btnSave2').attr('disabled',true); //set button disable

  // ajax adding data to database
  $.ajax({
    url : "<?php echo site_url('index.php/buku_tamu/setupUpdate')?>",
    type: "POST",
    data: $('#form2').serialize(),
    dataType: "JSON",
    success: function(data)
    {
      if(data.status) //if success close modal and reload ajax table
      {
          $('#modal_form2').modal('hide');
          notif(title='Success',pesan='Success updating data',tipe='success');
      }
      $('#btnSave2').text('save'); //change button text
      $('#btnSave2').attr('disabled',false); //set button enable
    },
    error: function (jqXHR, textStatus, errorThrown)
    {
      notif(title='Gagal',pesan='Error update data',tipe='error');
      $('#btnSave2').text('Update'); //change button text
      $('#btnSave2').attr('disabled',false); //set button enable
    }
  });
}


function reload_table(){
  table.ajax.reload(null,false); //reload datatable ajax
}

</script>
</body>
</html>
