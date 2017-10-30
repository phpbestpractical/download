<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <link rel="shortcut icon" href="assets/images/favicon_1.ico">

        <title>Moltran - Responsive Admin Dashboard Template</title>

        <link href="<?= base_url()?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="<?= base_url()?>assets/css/core.css" rel="stylesheet" type="text/css">
        <link href="<?= base_url()?>assets/css/icons.css" rel="stylesheet" type="text/css">
        <link href="<?= base_url()?>assets/css/components.css" rel="stylesheet" type="text/css">
        <link href="<?= base_url()?>assets/css/pages.css" rel="stylesheet" type="text/css">
        <link href="<?= base_url()?>assets/css/menu.css" rel="stylesheet" type="text/css">
        <link href="<?= base_url()?>assets/css/responsive.css" rel="stylesheet" type="text/css">

        <script src="<?= base_url()?>assets/js/modernizr.min.js"></script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','../../www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-65046120-1', 'auto');
  ga('send', 'pageview');

</script>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        
    </head>
    <body>


        <div class="wrapper-page">
            <div class="panel panel-color panel-primary panel-pages">
                <div class="panel-heading bg-img"> 
                    <div class="bg-overlay"></div>
                    <h3 class="text-center m-t-10 text-white"> Sign In to <strong>Moltran</strong> </h3>
                </div> 

				<?php 
	
					if($this->session->flashdata('flash_errorlogin_msg')){
															
					echo  '<div class="alert alert-danger alert-dismissable">';
					echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
					echo $this->session->flashdata('flash_errorlogin_msg');
					echo '</div>';
					}
					?>
                <div class="panel-body">
                <form class="form-horizontal m-t-20" method="post" action="<?php echo base_url('admin/admin/validate_credentials');?>">
                    
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control input-lg"  type="text" name="email" required="" placeholder="Email">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control input-lg" type="password" name="password" required="" placeholder="Password">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-xs-12">
                            <div class="checkbox checkbox-primary">
                                <input id="checkbox-signup" type="checkbox">
                                <label for="checkbox-signup">
                                    Remember me
                                </label>
                            </div>
                            
                        </div>
                    </div>
                    
                    <div class="form-group text-center m-t-40">
                        <div class="col-xs-12">
                            <button class="btn btn-primary btn-lg w-lg waves-effect waves-light" type="submit">Log In</button>
                        </div>
                    </div>

                    <div class="form-group m-t-30">
                        
                        <div class="col-sm-5">
                            <a href="<?= base_url()?>admin/register/">Create an account?</a>
                        </div>
                    </div>
                </form> 
                </div>                                 
                
            </div>
        </div>

        
    	<script>
            var resizefunc = [];
        </script>

        <!-- Main  -->
        <script src="<?= base_url()?>/assets/admin/js/jquery.min.js"></script>
        <script src="<?= base_url()?>/assets/admin/js/bootstrap.min.js"></script>
        <script src="<?= base_url()?>/assets/admin/js/detect.js"></script>
        <script src="<?= base_url()?>/assets/admin/js/fastclick.js"></script>
        <script src="<?= base_url()?>/assets/admin/js/jquery.slimscroll.js"></script>
        <script src="<?= base_url()?>/assets/admin/js/jquery.blockUI.js"></script>
        <script src="<?= base_url()?>/assets/admin/js/waves.js"></script>
        <script src="<?= base_url()?>/assets/admin/js/wow.min.js"></script>
        <script src="<?= base_url()?>/assets/admin/js/jquery.nicescroll.js"></script>
        <script src="<?= base_url()?>/assets/admin/js/jquery.scrollTo.min.js"></script>

        <script src="<?= base_url()?>/assets/admin/js/jquery.app.js"></script>
	
	</body>
</html>	
