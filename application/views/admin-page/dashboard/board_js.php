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
          "url": "<?php echo site_url('index.php/bidang/ajax_list')?>",
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

  $('input[name="bidang"]').keyup(function(){
      var isi = $('input[name="bidang"]').val().toLowerCase();
      $('input[name="slug"]').val(isi.replace(/ /g,"-"));
  });

});

function deletebd(id)
{
  if(confirm('Are you sure delete this data?'))
  {
    // ajax delete data to database
    $.ajax({
      url : "<?php echo site_url('index.php/bidang/delete_bidang')?>/"+id,
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

function reload_table(){
  table.ajax.reload(null,false); //reload datatable ajax
}

function add_bidang()
{
    save_method = 'add';
    $('#form')[0].reset(); // reset form on modals
    $('[name="id_bidang"]').val('');
    $('#modal_form').modal('show'); // show bootstrap modal
    $('.modal-title').text('Add Bidang Kerja'); // Set Title to Bootstrap modal title
}

function save()
{
  $('#btnSave').text('Saving...'); //change button text
  $('#btnSave').attr('disabled',true); //set button disable
  var url;
  if(save_method == 'add') {
  url = "<?php echo site_url('index.php/bidang/save_bidang')?>";
  } else {
  url = "<?php echo site_url('index.php/bidang/update_bidang')?>";
  }

  // ajax adding data to database
  $.ajax({
    url : url,
    type: "POST",
    data: $('#form').serialize(),
    dataType: "JSON",
    success: function(data)
    {
      if(data.status) //if success close modal and reload ajax table
      {
          $('#modal_form').modal('hide');
          notif(title='Success',pesan='Success adding / update data',tipe='success');
          reload_table();
      }
      $('#btnSave').text('save'); //change button text
      $('#btnSave').attr('disabled',false); //set button enable
    },
    error: function (jqXHR, textStatus, errorThrown)
    {
      notif(title='Gagal',pesan='Error adding / update data',tipe='error');
      $('#btnSave').text('Save'); //change button text
      $('#btnSave').attr('disabled',false); //set button enable
    }
  });
}

function editbd(id)
{
  save_method = 'update';
  $('#form')[0].reset(); // reset form on modals
  $.ajax({
      url : "<?php echo site_url('index.php/bidang/get_edit/')?>" + id,
      type: "GET",
      dataType: "JSON",
      success: function(data) {
        $('[name="id_bidang"]').val(data.id_bidang);
        $('[name="bidang"]').val(data.bidang);
        $('[name="slug"]').val(data.slug);
        $('#modal_form').modal('show');
        $('.modal-title').text('Edit Bidang Kerja');
    },
    error: function (jqXHR, textStatus, errorThrown) {
      notif(title='Gagal',pesan='Gagal mengambil data!',tipe='error');
    }
  });
}
</script>
</body>
</html>
