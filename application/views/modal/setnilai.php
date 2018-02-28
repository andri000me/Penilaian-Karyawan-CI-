<?php date_default_timezone_set('Asia/Jakarta');
$today = date("Y-m-d");?>
<b><?php echo $karyawan->nama." ~ ".$karyawan->divisi ;?></b>
<div class="table-responsive">
   <input type="hidden" name="karyawan" value="<?php echo $karyawan->id_karyawan;?>">
   <table class="table table-striped m-0">
      <thead>
         <tr>
            <th>#</th>
            <th>Lancar</th>
            <?php foreach($kategori as $key) { ?>
            <th><?php echo $key->nama;?></th>
            <?php } ?>
         </tr>
      </thead>
      <tbody>
		<tr>
			<td><?php echo date('d F Y', strtotime($hariini));?></td>
			<td><div class="radio radio-primary">
			   <?php $cikcek = 0; foreach ($nilai as $keyn) {
				   if($hariini == $keyn->tgl) {
					   foreach($sub as $keysub1) { 
							if(strtolower($keysub1->sub) == "ijin") {
								$sub1 = $keysub1->id_sub;
							} elseif(strtolower($keysub1->sub) == "bolos") {
								$sub1 = $keysub1->id_sub;
							}
					   }
					   if($keyn->sub_id == $sub1) {
                     		$cikcek = $cikcek + 1;
                     	} /*elseif(strtolower($keyn->sub_id) == "12") {
                     		$cikcek = $cikcek + 1;
                     	}*/ elseif ($keyn->sub_id != 0) {
							$cikcek = $cikcek + 1;
						}
				   }
			   } ?>
                  <input <?php if($karyawan->masuk > $hariini) { echo "disabled"; }?> <?php if($hariini > $today) { echo "disabled"; } ?> <?php if($cikcek > 0) { echo "disabled"; } ?> <?php if(date ("Y-m-d", strtotime("-1 day", strtotime($today))) > $hariini) { echo "disabled"; } ?> name="<?php echo $hariini; ?>" <?php foreach ($nilai as $keyn) { if ($hariini == $keyn->tgl && $keyn->sub_id == 0) { echo 'checked = "checked"'; echo 'title="'.$keyn->ket.'"'; } } ?> type="radio" id="<?php echo $hariini; ?>.ok" value="<?php echo $hariini.".0"; ?>" onclick="lancar(this.id)">
                  <label for="<?php echo $hariini; ?>.ok">Ok</label>
               </div>
			</td>
			
			<?php $absen = 0;
               foreach($kategori as $key) { ?>
            <td>
               <div class="radio radio-primary">
                  <?php 
                     foreach($sub as $keysub) { 
                     if($keysub->kategori_id == $key->id_kategori) {
                     $resd = $keysub->divisi_id;
                     $resd1 = explode(',',$resd); 
                     foreach ($resd1 as $keyd1 => $hariinid1) { 
                     if($hariinid1 == $karyawan->divisi_id) { 
					 if(strtolower($keysub->nama) == "tambahan") {
						 foreach ($tambahan as $keytam => $hariinitam) {
							 if($hariini == $hariinitam) { ?>
								 <input <?php if($hariini > $today) { echo "disabled"; } ?> <?php if($karyawan->masuk > $hariini) { echo "disabled"; }?> value="<?php echo $hariini.".".$keysub->id_sub.".".$karyawan->id_karyawan;?>" <?php foreach ($nilai as $keyn) { 
                     if ($hariini == $keyn->tgl && $keyn->sub_id == 0) { 
                     	echo 'disabled'; 
                     } elseif ($hariini == $keyn->tgl && $keysub->id_sub == $keyn->sub_id) { 
                     		echo 'checked = "checked"';
                     echo 'title="'.$keyn->ket.'"';
                     		if(strtolower($keysub->nama) == "absensi") {
                     			if(strtolower($keysub->sub) == "bolos") {
                     				$absen = $absen + 1;
                     			} elseif(strtolower($keysub->sub) == "ijin") {
                     				$absen = $absen + 1;
                     			}
                     		}
                     	} 
                     } if($absen > 0) {
                     	if(strtolower($keysub->nama) != "absensi") {
                     		echo 'disabled';
                     	}
                     } 
                     ?> <?php if(date ("Y-m-d", strtotime("-1 day", strtotime($today))) > $hariini) { echo "disabled"; } ?> type="radio" onclick="pencet(this.id)" id="<?php echo $hariini.".".$keysub->id_sub.".".$karyawan->id_karyawan;?>" name="<?php echo $hariini.$key->nama;?>">
                  <label <?php foreach ($nilai as $keyn) { if ($hariini == $keyn->tgl && $keysub->id_sub == $keyn->sub_id) { echo 'title="'.$keyn->ket.'"'; } } ?> for="<?php echo $hariini.".".$keysub->id_sub.".".$karyawan->id_karyawan;?>"><?php echo $keysub->sub;?></label>
                  <br>
							<?php }
						 }
					 } else { ?>
                  <input <?php if($hariini > $today) { echo "disabled"; } ?> <?php if($karyawan->masuk > $hariini) { echo "disabled"; }?> value="<?php echo $hariini.".".$keysub->id_sub.".".$karyawan->id_karyawan;?>" <?php foreach ($nilai as $keyn) { 
                     if ($hariini == $keyn->tgl && $keyn->sub_id == 0) { 
                     	echo 'disabled'; 
                     } elseif ($hariini == $keyn->tgl && $keysub->id_sub == $keyn->sub_id) { 
                     		echo 'checked = "checked"';
                     echo 'title="'.$keyn->ket.'"';
                     		if(strtolower($keysub->nama) == "absensi") {
                     			if(strtolower($keysub->sub) == "bolos") {
                     				$absen = $absen + 1;
                     			} elseif(strtolower($keysub->sub) == "ijin") {
                     				$absen = $absen + 1;
                     			}
                     		}
                     	} 
                     } if($absen > 0) {
                     	if(strtolower($keysub->nama) != "absensi") {
                     		echo 'disabled';
                     	}
                     } 
                     ?> <?php if(date ("Y-m-d", strtotime("-1 day", strtotime($today))) > $hariini) { echo "disabled"; } ?> type="radio" onclick="pencet(this.id)" id="<?php echo $hariini.".".$keysub->id_sub.".".$karyawan->id_karyawan;?>" name="<?php echo $hariini.$key->nama;?>">
                  <label <?php foreach ($nilai as $keyn) { if ($hariini == $keyn->tgl && $keysub->id_sub == $keyn->sub_id) { echo 'title="'.$keyn->ket.'"'; } } ?> for="<?php echo $hariini.".".$keysub->id_sub.".".$karyawan->id_karyawan;?>"><?php echo $keysub->sub;?></label>
                  <br>
					 <?php } } } } } ?>
               </div>
            </td>
            <?php } ?>
			
		</tr>
	  </tbody>
	</table>
</div>