<?php if($cek == 0) { ?>
	<div class="form-group">
		<label class="col-md-2 control-label">Divisi</label>
		<div class="col-md-10">
			<input class="form-control" name="divisi" type="text" placeholder="Nama Divisi" required>
		</div>
	</div>
<?php } else { ?>
	<input type="hidden" name="id_divisi" value="<?php echo $divisi->id_divisi;?>">
	<div class="form-group">
		<label class="col-md-2 control-label">Divisi</label>
		<div class="col-md-10">
			<input value="<?php echo $divisi->divisi;?>" class="form-control" name="divisi" type="text" placeholder="Nama Divisi" required>
		</div>
	</div>
<?php } ?>
