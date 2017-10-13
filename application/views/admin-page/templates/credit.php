<!-- Modals -->
<div class="modal fade" id="modal_credit">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><b>Team KKLP Tematik STMIK Adhi Guna 2017</b></h4>
      </div>
      <div class="modal-body">
        <table class="table table-condensed table-hover" id="table2">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>NIM</th>
              <th>Jurusan</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td onclick="alert('Junior WEB DEVELOPER : CodeIgniter & Database Analyst')">GUSTI KETUT PUTRA WIJAYA</td>
              <td>5720114026</td>
              <td>Sistem Informasi</td>
            </tr>
            <tr>
              <td>2</td>
              <td>GHINA SURYANI</td>
              <td>5720114025</td>
              <td>Sistem Informasi</td>
            </tr>
            <tr>
              <td>3</td>
              <td>HASMAWATI ALMA</td>
              <td>5720114028</td>
              <td>Sistem Informasi</td>
            </tr>
            <tr>
              <td>4</td>
              <td>MIMI EFRIANTI</td>
              <td>5720114046</td>
              <td>Sistem Informasi</td>
            </tr>
            <tr>
              <td>5</td>
              <td>NUR'AINI RAHMAN</td>
              <td>5720114060</td>
              <td>Sistem Informasi</td>
            </tr>
            <tr>
              <td>6</td>
              <td>ILMIYATI</td>
              <td>5520114045</td>
              <td>Teknik Informatika</td>
            </tr>
            <tr>
              <td>7</td>
              <td>ORLAN I.D MAAL</td>
              <td>5720114064</td>
              <td>Sistem Informasi</td>
            </tr>
            <tr>
              <td>8</td>
              <td>MOH IMAN RACHMAWAN</td>
              <td>5520114062</td>
              <td>Teknik Informatika</td>
            </tr>
            <tr>
              <td>9</td>
              <td>KHAIRIL ANWAR</td>
              <td>5520114050</td>
              <td>Teknik Informatika</td>
            </tr>
            <tr>
              <td>10</td>
              <td>MELDA</td>
              <td>5520114056</td>
              <td>Teknik Informatika</td>
            </tr>
            <tr>
              <td>11</td>
              <td>NUR FATMI</td>
              <td>5720114061</td>
              <td>Sistem Informasi</td>
            </tr>
            <tr>
              <td>12</td>
              <td>KURNIAWAN</td>
              <td>5520114051</td>
              <td>Teknik Informatika</td>
            </tr>
            <tr>
              <td>13</td>
              <td>RIZALDI SALIM</td>
              <td>5720114068</td>
              <td>Sistem Informasi</td>
            </tr>
            <tr>
              <td>14</td>
              <td>WAHYU RAMADHAN</td>
              <td>5720114071</td>
              <td>Sistem Informasi</td>
            </tr>
            <tr>
              <td>15</td>
              <td>RIFKY TAUA</td>
              <td>5520114089</td>
              <td>Teknik Informatika</td>
            </tr>
            <tr>
              <td>16</td>
              <td>OVEN MICHAEL TOHURA</td>
              <td>5720114065</td>
              <td>Sistem Informasi</td>
            </tr>
            <tr>
              <td>17</td>
              <td>I KADEK SUWITRA YASA</td>
              <td>5720114079</td>
              <td>Sistem Informasi</td>
            </tr>
            <tr>
              <td>18</td>
              <td>SETIAWAN</td>
              <td>5520114094</td>
              <td>Teknik Informatika</td>
            </tr>
            <tr>
              <td>19</td>
              <td>MERYANA EKA FAJARWATI</td>
              <td>5520114057</td>
              <td>Teknik Informatika</td>
            </tr>
            <tr>
              <td>20</td>
              <td>MIMI HASMIDAR</td>
              <td>5520114058</td>
              <td>Teknik Informatika</td>
            </tr>
            <tr>
              <td>21</td>
              <td>MASRUDDIN</td>
              <td>5520114055</td>
              <td>Teknik Informatika</td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <span class="pull-left">Copyright © 2017 BALITBANGDA PALU. All rights reserved.</span>
        <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Close</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<script>
$(function () {
  $('#table2').DataTable({
    'paging'      : true,
    'lengthChange': false,
    'searching'   : false,
    'ordering'    : true,
    'info'        : true,
    'autoWidth'   : false
  })
})
</script>
