<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="content-page">
   <!-- Start content -->
   <div class="content">
      <div class="container">
         <div class="row">
            <div class="col-xs-12">
               <div class="page-title-box">
                  <h4 class="page-title">Ubah Nilai</h4>
                  <ol class="breadcrumb p-0 m-0">
                     <li class="active">
                        Ubah Nilai
                     </li>
                  </ol>
                  <div class="clearfix"></div>
               </div>
            </div>
         </div>
         <!-- end row -->
         <div class="row">
            <div class="col-sm-12">
               <div class="card-box table-responsive">
                  <div class="m-t-0 header-title">
                     <form id="pilih">
					 <input type="hidden" name="cek" value="1">
                        <div class="col-md-5">
                           <select class="form-control select2" name="karyawan" id="karyawan" onchange="tgl(this.value)">
                              <option style="display:none" value="0">Nama Karyawan</option>
                              <optgroup label="Karyawan">
                                 <?php foreach ($karyawan as $key) { 
								 if($key->status_karyawan != 0) { ?>
                                 <option value="<?php echo $key->id_karyawan;?>"><?php echo $key->nama." ~ ".$key->divisi;?></option>
                                 <?php } } ?>
                              </optgroup>
                           </select>
                        </div>
                        <div class="col-md-5">
                           <select class="form-control" name="bulan" onchange="tgl(this.value)">
                              <option style="display:none">Select</option>
                              <optgroup label="Waktu">
                                 <?php date_default_timezone_set('Asia/Jakarta');
                                    $tgl = date("Y-m-d");
                                    $kurang = date ("Y-m-d", strtotime("-1 month", strtotime($tgl)));
                                    $satu = date ("Y-m-d", strtotime("+1 month", strtotime($tgl)));
                                    $dua = date ("Y-m-d", strtotime("+2 month", strtotime($tgl))); ?>
                                 <option value="<?php echo $kurang ;?>"><?php echo date('F Y', strtotime($kurang )) ;?></option>
                                 <option selected value="<?php echo $tgl;?>"><?php echo date('F Y', strtotime($tgl )) ;?></option>
                                 <option value="<?php echo $satu;?>"><?php echo date('F Y', strtotime($satu )) ;?></option>
                              </optgroup>
                           </select>
                        </div>
                     </form>
					 <div class="col-md-2">
						<button class="btn " onclick="tgl()"><i class="fa fa-refresh fa-spin"></i></button>
					</div>
                  </div>
                  <br/><br><br>
                  <div class="demo-box table-responsive" id="isi">
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- container -->
   </div>
   <!-- content -->
   <footer class="footer text-right">
      <?php echo date("Y");?> © Yaha.
   </footer>
</div>

<!-- sample modal content -->
<div id="modalket" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalpassLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalpassLabel">Form</h4>
         </div>
         <form class="form-horizontal" role="form" id="formket">
            <div class="modal-body" id="bodyket">
               
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

<!-- ============================================================== -->
<!-- End Right content here -->
<!-- ============================================================== -->
<script>
$(document).ready( function() {
	$(".select2").select2();
})
function pencet(id){swal({title:"Memberi Nilai?",text:"Anda akan memberi nilai",type:"warning",showCancelButton:!0,confirmButtonColor:"#DD6B55",confirmButtonText:"Ya",cancelButtonText:"Batal",closeOnConfirm:!1,closeOnCancel:!1},function(isConfirm){if(isConfirm){swal.close();$('#formket')[0].reset();$('#modalket').modal({backdrop:'static',keyboard:!1},'show');$("#bodyket").load("<?php echo base_url();?>modalket/"+id,function(data){$("#bodyket").html(data)});$("#formket").on('submit',(function(e){e.preventDefault();$.ajax({url:"<?php echo base_url();?>addnilai",type:"POST",data:$("#formket").serialize(),success:function(data){$(".modal").modal('hide');swal({title:"Sukses",text:"Berhasil",type:"success"},function(){location.reload()})},error:function(jqXHR,textStatus,errorThrown){swal("Error!","","error")}})}))}else{document.getElementById(id).checked=!1;$('#formket')[0].reset();swal.close()}})}
function lancar(id){swal({title:"Memberi Nilai?",text:"Anda akan memberi nilai",type:"warning",showCancelButton:!0,confirmButtonColor:"#DD6B55",confirmButtonText:"Ya",cancelButtonText:"Batal",closeOnConfirm:!1,closeOnCancel:!1},function(isConfirm){if(isConfirm){$.ajax({url:"<?php echo base_url();?>addlancar/"+id,data:$("#formnilai").serialize(),type:"POST",success:function(data){$(".modal").modal('hide');swal({title:"Sukses",text:"Berhasil",type:"success"},function(){location.reload()})},error:function(jqXHR,textStatus,errorThrown){swal("Error!","","error")}})}else{document.getElementById(id).checked=!1;swal.close()}})}
function tgl(){var x=document.getElementById("karyawan").value;if(x!=0){$.ajax({url:"<?php echo base_url();?>modalnilai",type:"POST",data:$('#pilih').serialize(),success:function(data){$("#isi").html(data)},error:function(jqXHR,textStatus,errorThrown){swal("Error!","","error")}})}} 
</script>