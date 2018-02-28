<?php if($cek == 0) { ?>
<div class="form-group">
   <label class="col-md-2 control-label">Kategori</label>
   <div class="col-md-10">
      <input class="form-control" name="nama" type="text" placeholder="Nama Kategori" required>
   </div>
</div>
<div class="form-group">
   <label class="col-md-2 control-label">Warna</label>
   <div class="col-md-10">
      <input class="form-control" name="warna" type="text" placeholder="Green" required>
   </div>
</div>
<?php } else { ?>
<input type="hidden" name="id_kategori" value="<?php echo $kategori->id_kategori;?>">
<div class="form-group">
   <label class="col-md-2 control-label">Kategori</label>
   <div class="col-md-10">
      <input value="<?php echo $kategori->nama;?>" class="form-control" name="nama" type="text" placeholder="Nama Kategori" required>
   </div>
</div>
<div class="form-group">
   <label class="col-md-2 control-label">Warna</label>
   <div class="col-md-10">
      <input class="form-control" value="<?php echo $kategori->warna;?>" name="warna" type="text" placeholder="Green" required>
   </div>
</div>
<?php } ?>