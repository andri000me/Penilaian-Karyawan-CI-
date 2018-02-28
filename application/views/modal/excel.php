<?php
header("Content-type: application/vnd.ms-word");
header("Content-Disposition: attachment;Filename=".$karyawan->nama.".doc");
?>
<html>
    <head>
        <meta http-equiv=\"Content-Type\" content=\"text/html; charset=Windows-1252\">
        <style>
            h2{
                text-align: center
            }
            .mytable{
                border:1px solid black; 
                border-collapse: collapse;
                width: 100%;
            }
            .mytable tr th, .mytable tr td{
                border:1px solid black; 
                padding: 5px 10px;
            }
        </style>
    </head>
    <body>
        <h2>Daftar Penilaian <?php echo $karyawan->nama."  ".$karyawan->divisi;?></h2>
        <table class="mytable">
            <tr>
               <th align="left">Tanggal</th>
               <th align="left">Nilai</th>
               <th align="left">Keterangan</th>
            </tr>
            <?php foreach($nilai as $key) { ?>
            <tr>
               <td><?php echo date('d F Y', strtotime($key->tgl));?></td>
               <td><?php if($key->sub_id == 0) {
				   echo "Ok";
			   } else {
				   foreach ($sub as $keysub) {
					   if($keysub->id_sub == $key->sub_id) {
						   echo $keysub->sub;
					   }
				   }
			   } ?></td>
               <td><?php echo $key->ket;?></td>
            </tr>
            <?php } ?>
        </table>
		<h4 align="right">Nilai Anda : <b><font color="<?php echo $warna;?>"><?php echo $skor;?></font></b></h4>
		<h4 align="right">Catatan : <b><?php echo $catatan;?></b></h4>
    </body>
</html>