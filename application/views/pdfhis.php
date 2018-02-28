<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
      <meta name="author" content="Coderthemes">
      <link rel="shortcut icon" href="<?php echo base_url();?>assets/images/favicon.png">
      <title>Penilaian</title>
      <!--Morris Chart CSS -->
      <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/morris/morris.css">
      <!-- App css -->
      <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
      <link href="<?php echo base_url();?>assets/css/core.css" rel="stylesheet" type="text/css" />
      <link href="<?php echo base_url();?>assets/css/components.css" rel="stylesheet" type="text/css" />
      <link href="<?php echo base_url();?>assets/css/icons.css" rel="stylesheet" type="text/css" />
      <link href="<?php echo base_url();?>assets/css/pages.css" rel="stylesheet" type="text/css" />
      <link href="<?php echo base_url();?>assets/css/menu.css" rel="stylesheet" type="text/css" />
      <link href="<?php echo base_url();?>assets/css/responsive.css" rel="stylesheet" type="text/css" />
      <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/switchery/switchery.min.css">
      <link href="<?php echo base_url();?>assets/plugins/datatables/dataTables.colVis.css" rel="stylesheet" type="text/css"/>
      <link href="<?php echo base_url();?>assets/plugins/datatables/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css"/>
      <link href="<?php echo base_url();?>assets/plugins/datatables/fixedColumns.dataTables.min.css" rel="stylesheet" type="text/css"/>
      <link href="<?php echo base_url();?>assets/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
      <link href="<?php echo base_url();?>assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css" rel="stylesheet">
      <link href="<?php echo base_url();?>assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
      <link href="<?php echo base_url();?>assets/plugins/clockpicker/css/bootstrap-clockpicker.min.css" rel="stylesheet">
      <link href="<?php echo base_url();?>assets/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
      <!-- Summernote css -->
      <link href="<?php echo base_url();?>assets/plugins/summernote/summernote.css" rel="stylesheet" />
      <link href="<?php echo base_url();?>assets/plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet" />
      <!-- Sweet Alert -->
      <link href="<?php echo base_url();?>assets/plugins/bootstrap-sweetalert/sweet-alert.css" rel="stylesheet" type="text/css">
      <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
      <![endif]-->
      <script src="<?php echo base_url();?>assets/js/modernizr.min.js"></script>
      <script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
      <script src="<?php echo base_url();?>assets/plugins/jquery-ui/jquery-ui.min.js"></script>
      <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
      <script src="<?php echo base_url();?>assets/plugins/select2/js/select2.min.js" type="text/javascript"></script>
      <script src="<?php echo base_url();?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
      <script src="<?php echo base_url();?>assets/plugins/datatables/dataTables.bootstrap.js"></script>
      <script src="<?php echo base_url();?>assets/plugins/datatables/dataTables.buttons.min.js"></script>
      <script src="<?php echo base_url();?>assets/plugins/datatables/buttons.bootstrap.min.js"></script>
      <script src="<?php echo base_url();?>assets/plugins/datatables/jszip.min.js"></script>
      <script src="<?php echo base_url();?>assets/plugins/datatables/pdfmake.min.js"></script>
      <script src="<?php echo base_url();?>assets/plugins/datatables/vfs_fonts.js"></script>
      <script src="<?php echo base_url();?>assets/plugins/datatables/buttons.html5.min.js"></script>
      <script src="<?php echo base_url();?>assets/plugins/datatables/buttons.print.min.js"></script>
      <script src="<?php echo base_url();?>assets/plugins/datatables/dataTables.fixedHeader.min.js"></script>
      <script src="<?php echo base_url();?>assets/plugins/datatables/dataTables.keyTable.min.js"></script>
      <script src="<?php echo base_url();?>assets/plugins/datatables/dataTables.responsive.min.js"></script>
      <script src="<?php echo base_url();?>assets/plugins/datatables/responsive.bootstrap.min.js"></script>
      <script src="<?php echo base_url();?>assets/plugins/datatables/dataTables.scroller.min.js"></script>
      <script src="<?php echo base_url();?>assets/plugins/datatables/dataTables.colVis.js"></script>
      <script src="<?php echo base_url();?>assets/plugins/datatables/dataTables.fixedColumns.min.js"></script>
      <!-- Sweet-Alert  -->
      <script src="<?php echo base_url();?>assets/plugins/bootstrap-sweetalert/sweet-alert.min.js"></script>
      <script src="<?php echo base_url();?>assets/pages/jquery.sweet-alert.init.js"></script>
      <script src="<?php echo base_url();?>assets/js/modernizr.min.js"></script>
   </head>
   <body>
      <h3>Daftar Nilai <?php echo $karyawan->nama."  ".$karyawan->divisi;?></h3>
      <br><br>
      <table id="datatable" class="display table table-striped table-bordered">
         <thead>
            <tr>
               <th>Tanggal</th>
               <th>Nilai</th>
            </tr>
         </thead>
         <tbody>
            <?php foreach($nilai as $key) { ?>
            <tr>
               <td><?php echo date('F Y', strtotime($key->tgl));?></td>
               <td><?php echo $key->nilai;?></td>
            </tr>
            <?php } ?>
         </tbody>
      </table>
   </body>
</html>