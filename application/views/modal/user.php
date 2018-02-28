<?php if($cek == 0) { ?>
<div class="form-group">
   <label class="col-md-2 control-label">Username</label>
   <div class="col-md-10">
      <input class="form-control" name="username" type="text" placeholder="Username" required>
   </div>
</div>
<div class="form-group">
   <label class="col-md-2 control-label">Password</label>
   <div class="col-md-10">
      <input class="form-control" name="password" type="password" placeholder="Password" required>
   </div>
</div>
<div class="form-group">
   <label class="col-md-2 control-label">Akses</label>
   <div class="col-md-10">
      <?php foreach ($akses as $key) {?>
      <div class="checkbox checkbox-info checkbox-circle">
         <input type="checkbox" name="akses_id[]" value="<?php echo $key->id_akses;?>" id="<?php echo $key->akses;?>">
         <label for="<?php echo $key->akses;?>"><?php echo $key->akses;?>
         </label>
      </div>
      <?php } ?>
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
<div class="form-group">
   <label class="col-md-2 control-label">Chat Id</label>
   <div class="col-md-10">
      <input class="form-control" name="chat_id" type="text" placeholder="ID Telegram" required>
   </div>
</div>
<?php } else { ?>
<input type="hidden" name="id_user" value="<?php echo $user->id_user;?>">
<div class="form-group">
   <label class="col-md-2 control-label">Username</label>
   <div class="col-md-10">
      <input class="form-control" value="<?php echo $user->username;?>" name="username" type="text" placeholder="Username" required>
   </div>
</div>
<div class="form-group">
   <label class="col-md-2 control-label">Password</label>
   <div class="col-md-10">
      <input class="form-control" name="password" type="password" placeholder="Password">
   </div>
</div>
<div class="form-group">
   <label class="col-md-2 control-label">Akses</label>
   <div class="col-md-10">
      <?php $res = $user->akses_id;
         $res1 = explode(',',$res);
         foreach ($akses as $key) {?>
      <div class="checkbox checkbox-info checkbox-circle ">
         <input type="checkbox" <?php foreach ($res1 as $key1 => $value1) {  if ($value1 == $key->id_akses) echo 'checked = "checked"'; }?> name="akses_id[]" id="<?php echo $key->akses;?>" value="<?php echo $key->id_akses;?>">
         <label for="<?php echo $key->akses;?>">  <?php echo $key->akses;?>
         </label>
      </div>
      <?php } ?>
   </div>
</div>
<div class="form-group">
   <label class="col-md-2 control-label">Divisi</label>
   <div class="col-md-10">
      <?php $resd = $user->divisi_id;
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
<div class="form-group">
   <label class="col-md-2 control-label">Chat Id</label>
   <div class="col-md-10">
      <input class="form-control" value="<?php echo $user->chat_id;?>" name="chat_id" type="text" placeholder="ID Telegram" required>
   </div>
</div>
<?php } ?>