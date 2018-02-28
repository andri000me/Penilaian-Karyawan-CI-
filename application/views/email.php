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
                  <h4 class="page-title">Email </h4>
                  <ol class="breadcrumb p-0 m-0">
                     <li>
                        <a href="#">Beranda</a>
                     </li>
                     <li class="active">
                        Email
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
                  <h4 class="m-t-0 header-title">
                     
                  </h4>
                  <table id="datatable" class="display table table-striped table-bordered">
                     <thead>
                        <tr>
                           <th>Email</th>
                           <th>Aksi</th>
                        </tr>
                     </thead>
                     <tbody>
						 <tr>
							<td><?php echo $email->email;?></td>
							<td><a href="#" onclick="ganti(<?php echo $email->id_email;?>)" class="table-action-btn h3"><i class="mdi mdi-pencil-box-outline text-success"></i></a></td>
						 </tr>
                     </tbody>
                  </table>
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
<!-- ============================================================== -->
<!-- End Right content here -->
<!-- ============================================================== -->
<!-- sample modal content -->
<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">Form</h4>
         </div>
         <form class="form-horizontal" role="form" id="form">
            <div class="modal-body" id="modalbody">
            </div>
            <div class="modal-footer" id="loading">
               <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
               <button type="submit" class="btn btn-primary waves-effect waves-light">Simpan</button>
            </div>
         </form>
      </div>
      <!-- /.modal-content -->
   </div>
   <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<script type="text/javascript">
var table;var simpan;$(document).ready(function(){$('#datatable').DataTable()});function ganti(id){simpan='update';$('#form')[0].reset();$('#myModal').modal({backdrop:'static',keyboard:!1},'show');$("#modalbody").load("<?php echo base_url();?>editemail/"+id,function(data){$("#modalbody").html(data)})}
$("#form").on('submit',(function(e){e.preventDefault();$.ajax({url:"<?php echo base_url();?>updateemail",type:"POST",data:new FormData(this),contentType:!1,cache:!1,processData:!1,success:function(data){$('#myModal').modal('hide');swal({title:"Sukses",text:"Berhasil",type:"success"},function(){$.get("<?php echo base_url();?>email",function(data,status){$("#pindah").html(data)})})},error:function(jqXHR,textStatus,errorThrown){swal("Error","","error")}});return!1}))
</script>