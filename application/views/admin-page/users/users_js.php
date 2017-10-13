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
          "url": "<?php echo site_url('index.php/users/ajax_list')?>",
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

function deleteUsr(id)
{
  if(confirm('Are you sure delete this data?'))
  {
    $.ajax({
      url : "<?php echo site_url('index.php/users/delete_users')?>/"+id,
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

function viewUsr(id) {
  $.ajax({
    url : "<?php echo site_url('index.php/users/viewDetail')?>/"+id,
    type: "POST",
    dataType: "JSON",
    success: function(data) {
      $('.p1').html('<b>'+data.username+'</b>');
      $('.p2').html('*USR'+data.password);
      $('.p3').html(data.alias);
      $('.p4').html(data.level);
      $('.p5').html(data.aktif);
      $('#modal_detail').modal('show');
    },
    error: function (jqXHR, textStatus, errorThrown) {
        notif(title='Gagal',pesan='Gagal mengambil data!',tipe='error');
    }
  });
}

function add_users()
{
    save_method = 'add';
    $('#form')[0].reset(); // reset form on modals
    $('[name="id_users"]').val('');
    $('#modal_form').modal('show'); // show bootstrap modal
    $('.modal-title').text('Add Users'); // Set Title to Bootstrap modal title
}

function save()
{
  $('#btnSave').text('Saving...'); //change button text
  $('#btnSave').attr('disabled',true); //set button disable
  var url;
  if(save_method == 'add') {
  url = "<?php echo site_url('index.php/users/save_users')?>";
  } else {
  url = "<?php echo site_url('index.php/users/update_users')?>";
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

function editUsr(id)
{
  save_method = 'update';
  $('#form')[0].reset(); // reset form on modals
  $.ajax({
      url : "<?php echo site_url('index.php/users/getUser/')?>" + id,
      type: "GET",
      dataType: "JSON",
      success: function(data) {
        $('[name="id_users"]').val(data.id_users);
        $('[name="username"]').val(data.username);
        $('[name="password"]').val('');
        $('[name="penulis"]').val(data.penulis);
        $('[name="level"]').val(data.level);
        $('[name="aktif"]').val(data.aktif);
        $('#modal_form').modal('show');
        $('.modal-title').text('Edit Users');
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
