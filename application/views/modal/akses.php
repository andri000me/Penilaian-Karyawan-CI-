<?php if($cek == 0) { ?>
	<div class="form-group">
		<label class="col-md-2 control-label">Akses</label>
		<div class="col-md-10">
			<input class="form-control" name="akses" type="text" placeholder="Nama Akses" required>
		</div>
	</div>
<?php } else { ?>
	<input type="hidden" name="id_akses" value="<?php echo $akses->id_akses;?>">
	<div class="form-group">
		<label class="col-md-2 control-label">Akses</label>
		<div class="col-md-10">
			<input value="<?php echo $akses->akses;?>" class="form-control" name="akses" type="text" placeholder="Nama Akses" required>
		</div>
	</div>
<?php } ?>
