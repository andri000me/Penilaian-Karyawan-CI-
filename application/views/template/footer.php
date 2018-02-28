</div>

</div>
<!-- END wrapper -->
<!-- sample modal content -->
<div id="modalpass" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalpassLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalpassLabel">Form</h4>
         </div>
         <form class="form-horizontal" role="form" id="formpass">
            <div class="modal-body" id="modalbody">
               <div class="form-group">
                  <label class="col-md-2 control-label">Password Lama</label>
                  <div class="col-md-10">
                     <input class="form-control" name="lama" type="password" placeholder="******" required>
                  </div>
               </div>
               <div class="form-group">
                  <label class="col-md-2 control-label">Password Baru</label>
                  <div class="col-md-10">
                     <input class="form-control" id="baru1" name="password" type="password" placeholder="******" required>
                  </div>
               </div>
               <div class="form-group">
                  <label class="col-md-2 control-label">Ulangi Password Baru</label>
                  <div class="col-md-10">
                     <input class="form-control" id="baru2" name="baru" type="password" placeholder="******" required>
                  </div>
               </div>
            </div>
            <div class="modal-footer" id="loading">
               <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Batal</button>
               <button type="submit" class="btn btn-primary waves-effect waves-light">Simpan</button>
            </div>
         </form>
      </div>
      <!-- /.modal-content -->
   </div>
   <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!-- sample modal content -->
<div id="modalloading" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalpassLabel" aria-hidden="true">
   <div class="modal-dialog modal-sm">
      <div class="modal-content">
         <div class="modal-body" id="modalbody">
            <div class="text-center">Loading<br>
               <span class="fa fa-3x fa-spin fa-spinner"></span>
            </div>
         </div>
      </div>
      <!-- /.modal-content -->
   </div>
   <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<script>
   var resizefunc = [];
</script>
<!-- jQuery  -->
<script src="<?php echo base_url();?>assets/js/detect.js"></script>
<script src="<?php echo base_url();?>assets/js/fastclick.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery.blockUI.js"></script>
<script src="<?php echo base_url();?>assets/js/waves.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery.slimscroll.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery.scrollTo.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/switchery/switchery.min.js"></script>
<!-- Counter js  -->
<script src="<?php echo base_url();?>assets/plugins/waypoints/jquery.waypoints.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/counterup/jquery.counterup.min.js"></script>
<!-- App js -->
<script src="<?php echo base_url();?>assets/js/jquery.core.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery.app.js"></script>
<script>
   function gantipass(){$("#formpass")[0].reset();$("#modalpass").modal("show");$("#formpass").on("submit",(function(a){a.preventDefault();$.ajax({url:"<?php echo base_url();?>cekpass",type:"POST",data:$("#formpass").serialize(),success:function(b){if(b>0){if($("#baru1").val()==$("#baru2").val()){$.ajax({url:"<?php echo base_url();?>updatepass",type:"POST",data:$("#formpass").serialize(),success:function(c){swal("Sukses!","","success");$("#modalpass").modal("hide")},error:function(c,e,d){}})}else{swal("Password baru tidak sama","","error")}}else{swal("Password Salah","","error")}},error:function(b,d,c){}})}))};
</script>
<script>
   function pindah(a){$.get("<?php echo base_url();?>"+a,function(c,b){$("#pindah").html(c);if(/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)){$("#navigasi").trigger("click")}})}function rincian(a){$.get("<?php echo base_url();?>rincian/"+a,function(c,b){$("#pindah").html(c)})}function masalah(a){$.get("<?php echo base_url();?>masalah/"+a,function(c,b){$("#pindah").html(c)})};
</script>
</body>
</html>
