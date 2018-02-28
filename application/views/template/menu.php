<body class="fixed-left">
   <!-- Begin page -->
   <div id="wrapper">
   <!-- Top Bar Start -->
   <div class="topbar">
      <!-- LOGO -->
      <div class="topbar-left">
         <a style="cursor: pointer;" onclick="pindah('beranda');" class="logo"><span>Company<span>Name</span></span><i class="mdi mdi-layers"></i></a>
      </div>
      <!-- Button mobile view to collapse sidebar menu -->
      <div class="navbar navbar-default" role="navigation">
         <div class="container">
            <!-- Navbar-left -->
            <ul class="nav navbar-nav navbar-left">
               <li>
                  <button id="navigasi" class="button-menu-mobile open-left waves-effect">
                  <i class="mdi mdi-menu"></i>
                  </button>
               </li>
            </ul>
            <!-- Right(Notification) -->
            <ul class="nav navbar-nav navbar-right">
               <li class="dropdown user-box">
                  <a href="" class="dropdown-toggle waves-effect user-link" data-toggle="dropdown" aria-expanded="true">
                  <img src="<?php echo base_url();?>assets/images/user.png" alt="user-img" class="img-circle user-img">
                  </a>
                  <ul class="dropdown-menu dropdown-menu-right arrow-dropdown-menu arrow-menu-right user-list notify-list">
                     <li>
                        <h5>Hi, <?php echo $this->session->userdata('username');?></h5>
                     </li>
                     <!--<li><a href="#" onclick="gantipass()"><i class="ti-settings m-r-5"></i> Ganti password</a></li>-->
                     <li><a href="<?php echo base_url();?>logout"><i class="ti-power-off m-r-5"></i> Logout</a></li>
                  </ul>
               </li>
            </ul>
            <!-- end navbar-right -->
         </div>
         <!-- end container -->
      </div>
      <!-- end navbar -->
   </div>
   <!-- Top Bar End -->
   <!-- ========== Left Sidebar Start ========== -->
   <div class="left side-menu">
      <div class="sidebar-inner slimscrollleft">
         <!--- Sidemenu -->
         <div id="sidebar-menu">
            <ul>
               <li class="menu-title">Navigation</li>
               <li class="has_sub">
                  <a style="cursor: pointer;" onclick="pindah('beranda');" class="waves-effect"><i class="mdi mdi-view-dashboard"></i><span class="label label-success pull-right"></span> <span> Beranda </span> </a>
               </li>
               <li class="has_sub">
                  <a style="cursor: pointer;" onclick="pindah('hasil');" class="waves-effect"><i class="mdi mdi-google-pages"></i><span> Hasil </span></a>
               </li>
               <li class="has_sub">
                  <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-layers"></i><span> Pengaturan </span> <span class="menu-arrow"></span></a>
                  <ul class="list-unstyled">
                     <?php $akses_id = $this->session->userdata('akses_id');
                        $res1 = explode(',',$akses_id);
                        foreach ($akses as $key) {
                        	foreach ($res1 as $keya => $value) {
                        		if ($value == $key->id_akses) { ?>
                     <li class="has_sub">
                        <a style="cursor: pointer;" onclick="pindah('<?php echo strtolower($key->akses);?>');" class="waves-effect"><span> <?php echo ucfirst($key->akses);?> </span></a>
                     </li>
                     <?php } } } ?>
                  </ul>
               </li>
               <li class="has_sub">
                  <a style="cursor: pointer;" onclick="pindah('bantuan');" class="waves-effect"><i class="mdi mdi-help"></i><span class="label label-success pull-right"></span> <span> Bantuan </span> </a>
               </li>
            </ul>
         </div>
         <!-- Sidebar -->
         <div class="clearfix"></div>
      </div>
      <!-- Sidebar -left -->
   </div>
   <!-- Left Sidebar End -->
   <div id="pindah">
