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
          "url": "<?php echo site_url('index.php/info_lembaga/ajax_list')?>",
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

function viewLem(id) {
  $.ajax({
    url : "<?php echo site_url('index.php/info_lembaga/get')?>/"+id,
    type: "POST",
    dataType: "JSON",
    success: function(data) {
      $('.p1').html('<b>'+data.nama_lembaga+'</b>');
      $('.p2').html(data.alias);
      $('.p3').html(data.alamat);
      $('.p4').html(data.telp);
      $('.p5').html(data.kodepos);
      $('.p6').html(data.email);
      $('.p7').html(data.sosmed1);
      $('.p8').html(data.sosmed2);
      $('.p9').html(data.sosmed3);
      $('#modal_detail').modal('show');
    },
    error: function (jqXHR, textStatus, errorThrown) {
      notif(title='Gagal',pesan='Gagal mengambil data!',tipe='error');
    }
  });
}

function save()
{
  $('#btnSave').text('Saving...'); //change button text
  $('#btnSave').attr('disabled',true); //set button disable
  var url;
  if(save_method == 'add') {
  url = "<?php echo site_url('index.php/info_lembaga/save_info_lembaga')?>";
  } else {
  url = "<?php echo site_url('index.php/info_lembaga/update_info_lembaga')?>";
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

function editLem(id)
{
  save_method = 'update';
  $('#form')[0].reset(); // reset form on modals
  $.ajax({
      url : "<?php echo site_url('index.php/info_lembaga/get/')?>" + id,
      type: "GET",
      dataType: "JSON",
      success: function(data) {
        $('[name="id"]').val(data.id);
        $('[name="nama_lembaga"]').val(data.nama_lembaga);
        $('[name="alias"]').val(data.alias);
        $('[name="alamat"]').val(data.alamat);
        $('[name="telp"]').val(data.telp);
        $('[name="kodepos"]').val(data.kodepos);
        $('[name="email"]').val(data.email);
        $('[name="sosmed1"]').val(data.sosmed1);
        $('[name="sosmed2"]').val(data.sosmed2);
        $('[name="sosmed3"]').val(data.sosmed3);
        $('#modal_form').modal('show');
        $('.modal-title').text('Edit Info Lembaga');
    },
    error: function (jqXHR, textStatus, errorThrown) {
      alert('Error get data from ajax');
    }
  });
}

function reload_table(){
  table.ajax.reload(null,false); //reload datatable ajax
}

</script>
</body>
</html>
