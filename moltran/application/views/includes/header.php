<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/favicon_1.ico">

        <title>FRONT LINK - <?= !empty($title)?$title:'admin';?></title>
		
		 <!-- DataTables -->
        <link href="<?php echo base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/plugins/datatables/buttons.bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/plugins/datatables/fixedHeader.bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/plugins/datatables/responsive.bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/plugins/datatables/scroller.bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/plugins/sweetalert/dist/sweetalert.css" rel="stylesheet" type="text/css">
			
		<link href="<?php echo base_url(); ?>assets/plugins/select2/dist/css/select2.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/plugins/select2/dist/css/select2-bootstrap.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/css/core.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/css/icons.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/css/components.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/css/pages.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/css/menu.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/css/responsive.css" rel="stylesheet" type="text/css">

        <script src="<?php echo base_url(); ?>assets/js/modernizr.min.js"></script>
<script>
 /* (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','../../www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-65046120-1', 'auto');
  ga('send', 'pageview');*/

</script>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
        
    </head>

	<?php 
	$current_page = $this->router->class; 
	
	?>
    <body class="fixed-left">
        
        <!-- Begin page -->
        <div id="wrapper">
        
            <!-- Top Bar Start -->
            <div class="topbar">
                <!-- LOGO -->
                <div class="topbar-left">
                    <div class="text-center">
                        <a href="index-2.html" class="logo"><i class="md md-terrain"></i> <span>FRONT LINK </span></a>
                    </div>
                </div>
                <!-- Button mobile view to collapse sidebar menu -->
                <div class="navbar navbar-default" role="navigation">
                    <div class="container">
                        <div class="">
                            <div class="pull-left">
                                <button class="button-menu-mobile open-left">
                                    <i class="fa fa-bars"></i>
                                </button>
                                <span class="clearfix"></span>
                            </div>
                            <form class="navbar-form pull-left" role="search">
                                <div class="form-group">
                                    <input type="text" class="form-control search-bar" placeholder="Type here for search...">
                                </div>
                                <button type="submit" class="btn btn-search"><i class="fa fa-search"></i></button>
                            </form>

                            <ul class="nav navbar-nav navbar-right pull-right">
                                
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle profile" data-toggle="dropdown" aria-expanded="true"><img src="<?php echo base_url(); ?>assets/images/users/avatar-1.jpg" alt="user-img" class="img-circle"> </a>
                                    <ul class="dropdown-menu">                                        
                                        <li><a href="<?php echo base_url('admin/admin/logout')?>"><i class="md md-settings-power"></i> Logout</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <!--/.nav-collapse -->
                    </div>
                </div>
            </div>
            <!-- Top Bar End -->
			<!-- ========== Left Sidebar Start ========== -->
			
            <div class="left side-menu">
                <div class="sidebar-inner slimscrollleft">
                    <div class="user-details">
                        <div class="pull-left">
                            <img src="<?php echo base_url(); ?>assets/images/users/avatar-1.jpg" alt="" class="thumb-md img-circle">
                        </div>
                        <div class="user-info">
                            <div class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><?php echo $this->session->userdata('username');?> <span class="caret"></span></a>
                                <ul class="dropdown-menu">

                                    <li><a href="<?php echo base_url('admin/admin/logout')?>"><i class="md md-settings-power"></i> Logout</a></li>
                                </ul>
                            </div>
                            
                            <p class="text-muted m-0">Administrator</p>
                        </div>
                    </div>
                    <!--- Divider -->
                    <div id="sidebar-menu">
                        <ul>
                            <li>
                                <a href="<?php echo base_url('admin/dashboard')?>" class="waves-effect waves-light <?php echo ($current_page =='dashboard') ? 'active': ''; ?>"><i class="md md-home"></i><span> Dashboard </span></a>
                            </li>

                            <li>
                                <a href="<?php echo base_url('admin/account')?>" class="waves-effect waves-light <?php echo ($current_page =='account') ? 'active': ''; ?>"><i class="md md-account-box"></i><span> Account </span></a>
                                
                            </li>

                            <li>
                                <a href="<?php echo base_url('admin/ads')?>" class="waves-effect waves-light <?php echo ($current_page =='ads') ? 'active': ''; ?>"><i class="md md-chat"></i> <span> Ads Type </span></a>
                                
                            </li>
							
                            <li>
                                <a href="<?php echo base_url('admin/store')?>" class="waves-effect waves-light <?php echo ($current_page =='store') ? 'active': ''; ?>"><i class="md md-poll"></i><span> Store </span></a>                                
                            </li>
							<li>
                                <a href="<?php echo base_url('admin/service')?>" class="waves-effect waves-light <?php echo ($current_page =='service') ? 'active': ''; ?>"><i class="md md-domain"></i> <span> Service </span> </a>
                                
                            </li>
							<li>
                                <a href="<?php echo base_url('admin/serviceads')?>" class="waves-effect waves-light <?php echo ($current_page =='serviceads') ? 'active': ''; ?>"><i class="md md-redeem"></i> <span> Service Ads Details </span> </a>
                                
                            </li>
                            <li>
                                <a href="<?php echo base_url('admin/display')?>" class="waves-effect waves-light <?php echo ($current_page =='display') ? 'active': ''; ?>"><i class="md md-apps"></i> <span> Display Type </span> </a>
                                
                            </li>
 
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <!-- Left Sidebar End --> 
<div class="content-page">
    <!-- Start content -->
                <div class="content">
                    <div class="container">
