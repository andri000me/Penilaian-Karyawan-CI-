<?php if($cek == 0) { ?>
<div class="form-group">
   <label class="col-md-2 control-label">Sub</label>
   <div class="col-md-10">
      <input class="form-control" name="sub" type="text" placeholder="Nama" required>
   </div>
</div>
<div class="form-group">
   <label class="col-md-2 control-label">Kategori</label>
   <div class="col-md-10">
      <select class="form-control" name="kategori_id">
         <?php 
            foreach ($kategori as $key) { ?>
         <option value="<?php echo $key->id_kategori;?>"><?php echo $key->nama;?></option>
         <?php } ?>
      </select>
   </div>
</div>
<div class="form-group">
   <label class="col-md-2 control-label">Nilai</label>
   <div class="col-md-10">
      <input class="form-control" onkeypress="return hanyaAngka(event)" name="jumlah" type="text" placeholder="Nilai" required>
   </div>
</div>
<div class="form-group">
   <label class="col-md-2 control-label">Divisi</label>
   <div class="col-md-10">
      <?php foreach ($divisi as $keyd) {?>
      <div class="checkbox checkbox-info checkbox-circle">
         <input type="checkbox" name="divisi_id[]" id="<?php echo $keyd->divisi;?>" value="<?php echo $keyd->id_divisi;?>">
         <label for="<?php echo $keyd->divisi;?>"><?php echo $keyd->divisi;?>
         </label>
      </div>
      <?php } ?>
   </div>
</div>
<?php } else { ?>
<input type="hidden" name="id_sub" value="<?php echo $sub->id_sub;?>">
<div class="form-group">
   <label class="col-md-2 control-label">Sub</label>
   <div class="col-md-10">
      <input class="form-control" value="<?php echo $sub->sub;?>" name="sub" type="text" placeholder="Nama" required>
   </div>
</div>
<div class="form-group">
   <label class="col-md-2 control-label">Kategori</label>
   <div class="col-md-10">
      <select class="form-control" name="kategori_id">
         <?php 
            foreach ($kategori as $key) {  ?>
         <option <?php if ($key->id_kategori == $sub->kategori_id) echo 'selected = "selected"'; ?> value="<?php echo $key->id_kategori;?>"><?php echo $key->nama;?></option>
         <?php } ?>
      </select>
   </div>
</div>
<div class="form-group">
   <label class="col-md-2 control-label">Nilai</label>
   <div class="col-md-10">
      <input class="form-control" value="<?php echo $sub->jumlah;?>" onkeypress="return hanyaAngka(event)" name="jumlah" type="text" placeholder="Nilai" required>
   </div>
</div>
<div class="form-group">
   <label class="col-md-2 control-label">Divisi</label>
   <div class="col-md-10">
      <?php $resd = $sub->divisi_id;
         $resd1 = explode(',',$resd);
         foreach ($divisi as $keyd) {?>
      <div class="checkbox checkbox-info checkbox-circle">
         <input type="checkbox" <?php foreach ($resd1 as $keyd1 => $valued1) { if ($valued1 == $keyd->id_divisi) echo 'checked = "checked"'; }?> name="divisi_id[]" id="<?php echo $keyd->divisi;?>" value="<?php echo $keyd->id_divisi;?>">
         <label for="<?php echo $keyd->divisi;?>"><?php echo $keyd->divisi;?>
         </label>
      </div>
      <?php } ?>
   </div>
</div>
<?php } ?>