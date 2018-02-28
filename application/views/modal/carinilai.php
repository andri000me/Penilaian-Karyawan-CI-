<table id="datatable" class="display table table-striped table-bordered">
   <thead>
      <tr>
         <th>Tanggal</th>
         <th>Kesalahan</th>
         <th>Keterangan</th>
         <th>Admin</th>
      </tr>
   </thead>
   <tbody>
      <?php foreach($nilai as $key) { ?>
      <tr>
         <td><?php echo date("d F Y", strtotime($key->tgl));?></td>
         <td><?php echo $key->sub;?></td>
         <td><?php echo $key->ket;?></td>
         <td><?php echo $key->username;?></td>
      </tr>
      <?php } ?>
   </tbody>
</table>
<script>
   $(document).ready(function() {
   	$('#datatable').DataTable();
   });
</script>