<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="description" content="Penilaian">
      <meta name="author" content="yaha">
      <!-- App favicon -->
      <link rel="shortcut icon" href="<?php echo base_url();?>assets/images/logo_sm.png">
      <!-- App title -->
      <title>Penilaian</title>
      <!-- App css -->
      <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
      <link href="<?php echo base_url();?>assets/css/core.css" rel="stylesheet" type="text/css" />
      <link href="<?php echo base_url();?>assets/css/components.css" rel="stylesheet" type="text/css" />
      <link href="<?php echo base_url();?>assets/css/icons.css" rel="stylesheet" type="text/css" />
      <link href="<?php echo base_url();?>assets/css/pages.css" rel="stylesheet" type="text/css" />
      <link href="<?php echo base_url();?>assets/css/menu.css" rel="stylesheet" type="text/css" />
      <link href="<?php echo base_url();?>assets/css/responsive.css" rel="stylesheet" type="text/css" />
      <!-- Sweet Alert -->
      <link href="<?php echo base_url();?>assets/plugins/bootstrap-sweetalert/sweet-alert.css" rel="stylesheet" type="text/css">
      <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
      <![endif]-->
      <!-- Sweet-Alert  -->
      <script src="<?php echo base_url();?>assets/plugins/bootstrap-sweetalert/sweet-alert.min.js"></script>
      <!--<script src="<?php echo base_url();?>assets/pages/jquery.sweet-alert.init.js"></script>-->
      <script src="<?php echo base_url();?>assets/js/modernizr.min.js"></script>
   </head>
   <body class="bg-transparent">
      <!-- HOME -->
      <section>
         <div class="container-alt">
            <div class="row">
               <div class="col-sm-12">
                  <div class="wrapper-page">
                     <div class="m-t-40 account-pages" style="height: 320px;">
                        <div class="text-center account-logo-box">
                           <h2 class="text-uppercase">
                              <a href="<?php echo base_url();?>" class="text-success">
                              Logo
                              </a>
                           </h2>
                           <!--<h4 class="text-uppercase font-bold m-b-0">Sign In</h4>-->
                        </div>
                        <div class="account-content">
                           <form class="form-horizontal" action="" method="post">
                              <div class="form-group ">
                                 <div class="col-xs-12">
                                    <input class="form-control" type="text" required="" name="username" placeholder="Username">
                                 </div>
                              </div>
                              <div class="form-group">
                                 <div class="col-xs-12">
                                    <input class="form-control" type="password" name="password" required="" placeholder="Password">
                                 </div>
                              </div>
                              <div class="form-group ">
                                 <div class="col-xs-12">
                                    <div class="checkbox checkbox-success">
                                       <input id="checkbox-signup" type="checkbox" checked>
                                       <label for="checkbox-signup">
                                       Remember me
                                       </label>
                                    </div>
                                 </div>
                              </div>
                              <div class="form-group account-btn text-center m-t-10">
                                 <div class="col-xs-12">
                                    <button class="btn w-md btn-bordered btn-danger waves-effect waves-light" type="submit">Masuk</button>
                                 </div>
                              </div>
                           </form>
                           <div class="clearfix"></div>
                        </div>
                     </div>
                     <!-- end card-box-->
                  </div>
                  <!-- end wrapper -->
               </div>
            </div>
         </div>
      </section>
      <!-- END HOME -->
      <script>
         var resizefunc = [];
      </script>
      <!-- jQuery  -->
      <script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
      <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
      <script src="<?php echo base_url();?>assets/js/detect.js"></script>
      <script src="<?php echo base_url();?>assets/js/fastclick.js"></script>
      <script src="<?php echo base_url();?>assets/js/jquery.blockUI.js"></script>
      <script src="<?php echo base_url();?>assets/js/waves.js"></script>
      <script src="<?php echo base_url();?>assets/js/jquery.slimscroll.js"></script>
      <script src="<?php echo base_url();?>assets/js/jquery.scrollTo.min.js"></script>
      <!-- App js -->
      <script src="<?php echo base_url();?>assets/js/jquery.core.js"></script>
      <script src="<?php echo base_url();?>assets/js/jquery.app.js"></script>
   </body>
</html>