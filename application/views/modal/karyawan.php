<?php if($cek == 0) { ?>
<div class="form-group">
   <label class="col-md-2 control-label">Nama</label>
   <div class="col-md-10">
      <input class="form-control" name="nama" type="text" placeholder="Nama" required>
   </div>
</div>
<div class="form-group">
   <label class="col-md-2 control-label">No KTP</label>
   <div class="col-md-10">
      <input class="form-control" name="no_ktp" type="text" placeholder="000000" required>
   </div>
</div>
<div class="form-group">
   <label class="col-md-2 control-label">Email</label>
   <div class="col-md-10">
      <input class="form-control" name="email" type="email" placeholder="Email" required>
   </div>
</div>
<div class="form-group">
   <label class="col-md-2 control-label">Tempat, Tgl Lahir</label>
   <div class="col-md-10">
      <input class="form-control" name="ttl" type="text" placeholder="Surabaya, 27 November 1996" required>
   </div>
</div>
<div class="form-group">
   <label class="col-md-2 control-label">Alamat</label>
   <div class="col-md-10">
      <input class="form-control" name="alamat" type="text" placeholder="Alamat" required>
   </div>
</div>
<div class="form-group">
   <label class="col-md-2 control-label">No Hp</label>
   <div class="col-md-10">
      <input class="form-control" name="telp" type="text" placeholder="081111111" required>
   </div>
</div>
<div class="form-group">
   <label class="col-md-2 control-label">Divisi</label>
   <div class="col-md-10">
      <?php foreach ($divisi as $keyd) {?>
      <div class="radio radio-info">
         <input type="radio" name="divisi_id" id="<?php echo $keyd->divisi;?>" value="<?php echo $keyd->id_divisi;?>">
         <label for="<?php echo $keyd->divisi;?>"><?php echo $keyd->divisi;?>
         </label>
      </div>
      <?php } ?>
   </div>
</div>
<div class="form-group">
   <label class="col-md-2 control-label">Tanggal Masuk</label>
   <div class="col-md-10">
      <input class="form-control" readonly="true" id="masuk" name="masuk" type="text" placeholder="Tanggal Masuk">
   </div>
</div>
<?php } else { ?>
<input type="hidden" name="id_karyawan" value="<?php echo $karyawan->id_karyawan;?>">
<div class="form-group">
   <label class="col-md-2 control-label">Nama</label>
   <div class="col-md-10">
      <input class="form-control" value="<?php echo $karyawan->nama;?>" name="nama" type="text" placeholder="Nama" required>
   </div>
</div>
<div class="form-group">
   <label class="col-md-2 control-label">No KTP</label>
   <div class="col-md-10">
      <input class="form-control" value="<?php echo $karyawan->no_ktp;?>" name="no_ktp" type="text" placeholder="000000" required>
   </div>
</div>
<div class="form-group">
   <label class="col-md-2 control-label">Email</label>
   <div class="col-md-10">
      <input class="form-control" name="email" value="<?php echo $karyawan->email;?>" type="email" placeholder="Email">
   </div>
</div>
<div class="form-group">
   <label class="col-md-2 control-label">Tempat, Tgl Lahir</label>
   <div class="col-md-10">
      <input class="form-control" value="<?php echo $karyawan->ttl;?>" name="ttl" type="text" placeholder="Surabaya, 27 November 1996" required>
   </div>
</div>
<div class="form-group">
   <label class="col-md-2 control-label">Alamat</label>
   <div class="col-md-10">
      <input class="form-control" value="<?php echo $karyawan->alamat;?>" name="alamat" type="text" placeholder="Alamat" required>
   </div>
</div>
<div class="form-group">
   <label class="col-md-2 control-label">No Hp</label>
   <div class="col-md-10">
      <input class="form-control" value="<?php echo $karyawan->telp;?>" name="telp" type="text" placeholder="081111111" required>
   </div>
</div>
<div class="form-group">
   <label class="col-md-2 control-label">Divisi</label>
   <div class="col-md-10">
      <?php $resd = $karyawan->divisi_id;
         $resd1 = explode(',',$resd);
         foreach ($divisi as $keyd) {?>
      <div class="radio radio-info">
         <input type="radio" <?php foreach ($resd1 as $keyd1 => $valued1) { if ($valued1 == $keyd->id_divisi) echo 'checked = "checked"'; }?> name="divisi_id" id="<?php echo $keyd->divisi;?>" value="<?php echo $keyd->id_divisi;?>">
         <label for="<?php echo $keyd->divisi;?>"><?php echo $keyd->divisi;?>
         </label>
      </div>
      <?php } ?>
   </div>
</div>
<div class="form-group">
   <label class="col-md-2 control-label">Tanggal Masuk</label>
   <div class="col-md-10">
      <input class="form-control" readonly="true" id="masuk" value="<?php echo $karyawan->masuk;?>" name="masuk" type="text" placeholder="Tanggal Masuk">
   </div>
</div>
<?php } ?>