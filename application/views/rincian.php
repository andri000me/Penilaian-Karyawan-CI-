<style>
.ui-datepicker-calendar{display:none}.ui-datepicker .ui-datepicker-title{margin:0 2.3em;line-height:1.8em;text-align:center;font-size:.7em}.ui-datepicker .ui-datepicker-title select{font-size:1em;margin:1px 0;color:#000!important}
</style>
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
                  <h4 class="page-title">Rincian</h4>
                  <ol class="breadcrumb p-0 m-0">
                     <li>
                        Beranda
                     </li>
                     <li class="active">
                        Rincian
                     </li>
                  </ol>
                  <div class="clearfix"></div>
               </div>
            </div>
         </div>
         <!-- end row -->
         <div class="row">
            <div class="col-sm-12">
               <div class="table-responsive">
                  <div class="card-box">
                     <h4 class="header-title m-t-0 m-b-30"><?php echo $karyawan->nama;?></h4>
                     <ul class="nav nav-tabs navtab-bg nav-justified">
                        <li class="active">
                           <a href="#home1" data-toggle="tab" aria-expanded="false">
                           <span class="visible-xs"><i class="fa fa-user"></i></span>
                           <span class="hidden-xs">Rincian</span>
                           </a>
                        </li>
                        <li class="">
                           <a href="#profile1" data-toggle="tab" aria-expanded="true">
                           <span class="visible-xs"><i class="fa fa-server"></i></span>
                           <span class="hidden-xs">Nilai</span>
                           </a>
                        </li>
                        <li class="">
                           <a href="#history" data-toggle="tab" aria-expanded="true">
                           <span class="visible-xs"><i class="fa fa-th-large"></i></span>
                           <span class="hidden-xs">History</span>
                           </a>
                        </li>
                     </ul>
                     <div class="tab-content">
                        <div class="tab-pane active" id="home1">
                           <div class="panel panel-color panel-primary">
                              <!-- Table -->
                              <table class="table">
                                 <thead>
                                    <tr>
                                       <th>
                                          <h4>Nama :</h4>
                                       </th>
                                       <th>
                                          <h4><?php echo $karyawan->nama;?></h4>
                                       </th>
                                    </tr>
                                 </thead>
                                 <tbody>
									<tr>
                                       <td>
                                          <h4>No KTP :</h4>
                                       </td>
                                       <td>
                                          <h4><?php echo $karyawan->no_ktp;?></h4>
                                       </td>
                                    </tr>
									<tr>
                                       <td>
                                          <h4>Tempat, Tgl Lahir :</h4>
                                       </td>
                                       <td>
                                          <h4><?php echo $karyawan->ttl;?></h4>
                                       </td>
                                    </tr>
									<tr>
                                       <td>
                                          <h4>Alamat :</h4>
                                       </td>
                                       <td>
                                          <h4><?php echo $karyawan->alamat;?></h4>
                                       </td>
                                    </tr>
									<tr>
                                       <td>
                                          <h4>No Hp :</h4>
                                       </td>
                                       <td>
                                          <h4><?php echo $karyawan->telp;?></h4>
                                       </td>
                                    </tr>
                                    <tr>
                                       <td>
                                          <h4>Email :</h4>
                                       </td>
                                       <td>
                                          <h4><?php echo $karyawan->email;?></h4>
                                       </td>
                                    </tr>
                                    <tr>
                                       <td>
                                          <h4>Divisi :</h4>
                                       </td>
                                       <td>
                                          <h4><?php echo $karyawan->divisi;?></h4>
                                       </td>
                                    </tr>
									<tr>
                                       <td>
                                          <h4>Tgl Masuk :</h4>
                                       </td>
                                       <td>
                                          <h4><?php echo date("d F Y", strtotime($karyawan->masuk));?></h4>
                                       </td>
                                    </tr>
                                 </tbody>
                              </table>
                           </div>
                           <br>
                           <br>
                        </div>
                        <div class="tab-pane" id="profile1">
                           <form id="carinilai">
                              <input type="hidden" value="<?php echo $karyawan->id_karyawan;?>" name="karyawan_id">
                              <div class="col-md-2">
                                 <input readonly="true" id="dari" name="dari" class="form-control" type="text" required>
                              </div>
                              <div class="col-md-2">
                                 <input readonly="true" class="form-control" name="sampai" id="sampai" type="text">
                              </div>
                              <input type="submit" value="Lihat" class="btn btn-primary" required>
                              <a class="btn btn-info" onclick="cetak();">Cetak Pdf</a>
                           </form>
                           <br>
                           <div id="hasilcari"></div>
                        </div>
                        <div class="tab-pane" id="history">
                           <form id="carihis">
                              <input type="hidden" value="<?php echo $karyawan->id_karyawan;?>" name="karyawan_id">
                              <div class="col-md-2">
                                 <input readonly="true" id="dari1" name="dari" class="form-control" type="text" required>
                              </div>
                              <div class="col-md-2">
                                 <input readonly="true" class="form-control" name="sampai" id="sampai1" type="text">
                              </div>
                              <input type="submit" value="Lihat" class="btn btn-primary" required>
                              <a class="btn btn-info" onclick="cetakhis();">Cetak Pdf</a>
                           </form>
                           <br>
                           <div id="hasilhis"></div>
                        </div>
                     </div>
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
<!-- Init js -->
<script>
var currentTime=new Date();$(function(){$('#dari').datepicker({changeMonth:!0,changeYear:!0,showButtonPanel:!0,dateFormat:'yy-mm',minDate:new Date('2018-01'),onClose:function(dateText,inst){$(this).datepicker('setDate',new Date(inst.selectedYear,inst.selectedMonth,1))}}).datepicker("setDate",currentTime);var x=document.getElementById("dari").value;x=new Date(x);x.setDate(x.getDate());$('#sampai').datepicker({changeMonth:!0,changeYear:!0,showButtonPanel:!0,dateFormat:'yy-mm',minDate:x,onClose:function(dateText,inst){$(this).datepicker('setDate',new Date(inst.selectedYear,inst.selectedMonth,1))}}).datepicker("setDate",currentTime);$('#dari1').datepicker({changeMonth:!0,changeYear:!0,showButtonPanel:!0,dateFormat:'yy-mm',minDate:new Date('2018-01'),onClose:function(dateText,inst){$(this).datepicker('setDate',new Date(inst.selectedYear,inst.selectedMonth,1))}}).datepicker("setDate",currentTime);var x=document.getElementById("dari").value;x=new Date(x);x.setDate(x.getDate());$('#sampai1').datepicker({changeMonth:!0,changeYear:!0,showButtonPanel:!0,dateFormat:'yy-mm',minDate:x,onClose:function(dateText,inst){$(this).datepicker('setDate',new Date(inst.selectedYear,inst.selectedMonth,1))}}).datepicker("setDate",currentTime)})
</script>
<script>
$("#carinilai").on('submit',(function(e){e.preventDefault();$.ajax({url:"<?php echo base_url();?>carinilai",type:"POST",data:$('#carinilai').serialize(),success:function(data)
{$("#hasilcari").html(data)},error:function(jqXHR,textStatus,errorThrown)
{swal("Error!","","error")}})}));function cetak(){var dari=$("#dari").val();var sampai=$("#sampai").val();$("#modalloading").modal('show');$.ajax({url:"<?php echo base_url()."cetakpdf/".$karyawan->id_karyawan.".";?>"+dari+"."+sampai,type:"POST",data:$('#carinilai').serialize(),success:function(data)
{$(".modal").modal('hide');window.location="<?php echo base_url()."cetakpdf/".$karyawan->id_karyawan.".";?>"+dari+"."+sampai},error:function(jqXHR,textStatus,errorThrown)
{swal("Error!","","error")}})}
$("#carihis").on('submit',(function(e){e.preventDefault();$.ajax({url:"<?php echo base_url();?>carihis",type:"POST",data:$('#carihis').serialize(),success:function(data)
{$("#hasilhis").html(data)},error:function(jqXHR,textStatus,errorThrown)
{swal("Error!","","error")}})}));function cetakhis(){var dari1=$("#dari1").val();var sampai1=$("#sampai1").val();$("#modalloading").modal('show');$.ajax({url:"<?php echo base_url()."cetakhis/".$karyawan->id_karyawan.".";?>"+dari1+"."+sampai1,type:"POST",data:$('#carihis').serialize(),success:function(data)
{$(".modal").modal('hide');window.location="<?php echo base_url()."cetakhis/".$karyawan->id_karyawan.".";?>"+dari1+"."+sampai1},error:function(jqXHR,textStatus,errorThrown)
{swal("Error!","","error")}})}
</script>