<?php if($cek == 0) { ?>
<div class="form-group">
   <label class="col-md-2 control-label">Keterangan</label>
   <div class="col-md-10">
      <input class="form-control" name="ket" type="text" placeholder="Keterangan" required>
   </div>
</div>
<div class="form-group">
   <label class="col-md-2 control-label">Warna</label>
   <div class="col-md-10">
      <input class="form-control" name="warna" type="text" placeholder="Warna" required>
   </div>
</div>
<div class="form-group">
   <label class="col-md-2 control-label">Nilai</label>
   <div class="col-md-5">
      <input class="form-control" onkeypress="return hanyaAngka(event)" max="100" name="dari" type="text" placeholder="0-100" required>
   </div>
   <div class="col-md-5">
      <input class="form-control" onkeypress="return hanyaAngka(event)" max="100" name="sampai" type="text" placeholder="0-100" required>
   </div>
</div>

<div class="form-group">
   <label class="col-md-2 control-label">Catatan</label>
   <div class="col-md-10">
      <input class="form-control" name="note" type="text" placeholder="Catatan" required>
   </div>
</div>

<?php } else { ?>

<input type="hidden" name="id_rule" value="<?php echo $rule->id_rule;?>">
<div class="form-group">
   <label class="col-md-2 control-label">Keterangan</label>
   <div class="col-md-10">
      <input class="form-control" value="<?php echo $rule->ket;?>" name="ket" type="text" placeholder="Keterangan" required>
   </div>
</div>
<div class="form-group">
   <label class="col-md-2 control-label">Warna</label>
   <div class="col-md-10">
      <input class="form-control" value="<?php echo $rule->warna;?>" name="warna" type="text" placeholder="Warna" required>
   </div>
</div>
<div class="form-group">
   <label class="col-md-2 control-label">Nilai</label>
   <div class="col-md-5">
      <input class="form-control" onkeypress="return hanyaAngka(event)" max="100" value="<?php echo $rule->dari;?>" name="dari" type="text" placeholder="0-100" required>
   </div>
   <div class="col-md-5">
      <input class="form-control" onkeypress="return hanyaAngka(event)" max="100" name="sampai" type="text" value="<?php echo $rule->sampai;?>" placeholder="0-100" required>
   </div>
</div>
<div class="form-group">
   <label class="col-md-2 control-label">Catatan</label>
   <div class="col-md-10">
      <input class="form-control" value="<?php echo $rule->note;?>" name="note" type="text" placeholder="Catatan" required>
   </div>
</div>
<?php } ?>