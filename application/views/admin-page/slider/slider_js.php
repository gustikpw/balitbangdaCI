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
          "url": "<?php echo site_url('index.php/slider/ajax_list')?>",
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

function viewSld(id) {
  $.ajax({
    url : "<?php echo site_url('index.php/slider/get')?>/"+id,
    type: "POST",
    dataType: "JSON",
    success: function(data) {
      $('.p1').html('<b>'+data.nama_foto+'</b>');
      $('.p2').html(data.deskripsi1);
      $('.p3').html(data.deskripsi2);
      $('.p4').html(data.data_slide);
      $('.p5').html(data.coding);
      $('.p6').html(data.class);
      $('.p7').html(data.status_slide);
      $('#modal_detail').modal('show');
    },
    error: function (jqXHR, textStatus, errorThrown) {
        notif(title='Gagal',pesan='Gagal mengambil data!',tipe='error');
    }
  });
}

function addSlider()
{
    save_method = 'add';
    $('#form')[0].reset(); // reset form on modals
    $('[name="id"]').val('');
    $('#modal_form').modal('show'); // show bootstrap modal
    $('.modal-title').text('Add Slider'); // Set Title to Bootstrap modal title
}

function save()
{
  $('#btnSave').text('Saving...'); //change button text
  $('#btnSave').attr('disabled',true); //set button disable
  var url;
  if(save_method == 'add') {
  url = "<?php echo site_url('index.php/slider/save_slider')?>";
  } else {
  url = "<?php echo site_url('index.php/slider/update_slider')?>";
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

function editSld(id)
{
  save_method = 'update';
  $('#form')[0].reset(); // reset form on modals
  $.ajax({
      url : "<?php echo site_url('index.php/slider/get/')?>" + id,
      type: "GET",
      dataType: "JSON",
      success: function(data) {
        $('[name="id"]').val(data.id);
        $('[name="nama_foto"]').val(data.nama_foto);
        $('[name="deskripsi1"]').val(data.deskripsi1);
        $('[name="deskripsi2"]').val(data.deskripsi2);
        $('[name="data_slide"]').val(data.data_slide);
        $('[name="coding"]').val(data.coding);
        $('[name="class"]').val(data.class);
        $('[name="status_slide"]').val(data.status_slide);
        $('#modal_form').modal('show');
        $('.modal-title').text('Edit Info Lembaga');
    },
    error: function (jqXHR, textStatus, errorThrown) {
      alert('Error get data from ajax');
    }
  });
}

function deleteSld(id)
{
  if(confirm('Are you sure delete this data?'))
  {
    $.ajax({
      url : "<?php echo site_url('index.php/slider/delete_slider')?>/"+id,
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
