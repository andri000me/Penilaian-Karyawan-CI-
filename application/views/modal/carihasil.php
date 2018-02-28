<table id="datatable" class="display table table-striped table-bordered">
   <thead>
      <tr>
         <th>Tanggal</th>
         <th>Nilai</th>
      </tr>
   </thead>
   <tbody>
      <?php foreach($nilai as $key) { ?>
      <tr>
         <td><?php echo date('F Y', strtotime($key->tgl));?></td>
         <td><?php echo $key->nilai;?></td>
      </tr>
      <?php } ?>
   </tbody>
</table>
<script>
   $(document).ready(function() {
                //datatables
   	$('#datatable').DataTable();
   });
</script>