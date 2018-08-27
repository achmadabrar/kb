<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<!-- For IE -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<!-- For Resposive Device -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<title>Hubungi Kami | <?php echo $title; ?></title>

		<!-- Favicon -->
		<link rel="icon" type="image/png" sizes="56x56" href="<?php echo site_url(); ?>/assets/images/fav-icon/icon.png">


		<!-- Main style sheet -->
		<link rel="stylesheet" type="text/css" href="<?php echo site_url(); ?>/assets/css/style.css">
		<!-- responsive style sheet -->
		<link rel="stylesheet" type="text/css" href="<?php echo site_url(); ?>/assets/css/responsive.css">


		<!-- Fix Internet Explorer ______________________________________-->

		<!--[if lt IE 9]>
			<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
			<script src="<?php echo site_url(); ?>/assets/vendor/html5shiv.js"></script>
			<script src="<?php echo site_url(); ?>/assets/vendor/respond.js"></script>
		<![endif]-->

			
	</head>
	
	<body>
		<div class="main-page-wrapper">

			<!-- ===================================================
				Loading Transition
			==================================================== -->
			<div id="loader-wrapper">
				<div id="loader"></div>
			</div>



			<!-- 
			=============================================
				Theme Header
			============================================== 
			-->
			<header class="header-wrapper">
				<div class="top-header bg-one">
					<div class="container">
						
					</div> <!-- /.container -->
				</div> <!-- /.top-header -->

				<div class="theme-menu-wrapper">
					<div class="container">
						<div class="main-content-wrapper clearfix">
							<!-- Logo -->
							<div class="logo float-left"><a href="<?php echo site_url(); ?>"><img src="<?php echo site_url(); ?>/upload/images/<?php echo $logo; ?>" alt="Logo"></a></div>

							<!-- ============================ Theme Menu ========================= -->
							<nav class="theme-main-menu navbar float-right" id="mega-menu-wrapper">
								<!-- Brand and toggle get grouped for better mobile display -->
							   <div class="navbar-header">
							     <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1" aria-expanded="false">
							       <span class="sr-only">Toggle navigation</span>
							       <span class="icon-bar"></span>
							       <span class="icon-bar"></span>
							       <span class="icon-bar"></span>
							     </button>
							   </div>
							   <!-- Collect the nav links, forms, and other content for toggling -->
							   <div class="collapse navbar-collapse" id="navbar-collapse-1">
									<ul class="nav">
										<?php $this->load->view('frontendmenu/menu-index'); ?>
									</ul>
							   </div><!-- /.navbar-collapse -->
							</nav> <!-- /.theme-main-menu -->
						</div> <!-- /.main-content-wrapper -->
					</div> <!-- /.container -->
				</div> <!-- /.header-wrapper -->
			</header> <!-- /.theme-menu-wrapper -->


		

		


	<!-- 
			=============================================
				Contact Us Page
			============================================== 
			-->
			<div class="contact-page">
			
				<div class="container">
					
					<div class="contact-form-wrapper">
					
						<div class="row">
							<div class="col-md-6 col-xs-12">
								<div class="theme-form-style-one" style="padding-top:0px;">
									<iframe src="//lightwidget.com/widgets/34a46ef885fb52f4b636ca42f0f03452.html" scrolling="no" allowtransparency="true" class="lightwidget-widget" style="width:100%;border:0;overflow:hidden;"></iframe>
								</div> <!-- /.theme-form-style-one -->
							</div> <!-- /.col- -->
							<div class="col-md-6 col-xs-12">
							<div class="mapouter"><div class="gmap_canvas"><iframe width="500" height="300" id="gmap_canvas" src="https://maps.google.com/maps?q=-6.3273688%2C106.705145&t=&z=15&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://www.pureblack.de">pureblack.de</a></div><style>.mapouter{text-align:right;height:300px;width:500px;}.gmap_canvas {overflow:hidden;background:none!important;height:300px;width:500px;}</style></div>
								
								<div class="contact-address" style="margin-top: 10px;">
								
									<ul class="address">
										<li><i class="flaticon-map-bold"></i> <?php echo $alamat; ?></li>
										<li><i class="flaticon-email"></i> <?php echo $email; ?></li>
										<li><i class="flaticon-call"></i> <?php echo $telepon; ?></li>
									</ul>
									<ul class="social-icon">
										<li><a href="<?php echo $facebook; ?>" class="tran3s"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
										<li><a href="<?php echo $twitter; ?>" class="tran3s"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
										<li><a href="<?php echo $instagram; ?>" class="tran3s"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
										
										
						
						
									</ul>
								</div> <!-- /.contact-address -->
							</div> <!-- /.col- -->
						</div> <!-- /.row -->
					</div> <!-- /.contact-form-wrapper -->
				</div> <!-- /.container -->

				<div class="contact-validation-markup">
					<!--Contact Form Validation Markup -->
					<!-- Contact alert -->
					<div class="alert-wrapper" id="alert-success">
						<div id="success">
							<button class="closeAlert"><i class="fa fa-times" aria-hidden="true"></i></button>
							<div class="wrapper">
				               	<p>Your message was sent successfully.</p>
				             </div>
				        </div>
				    </div> <!-- End of .alert-wrapper -->
				    <div class="alert-wrapper" id="alert-error">
				        <div id="error">
				           	<button class="closeAlert"><i class="fa fa-times" aria-hidden="true"></i></button>
				           	<div class="wrapper">
				               	<p>Sorry!Something Went Wrong.</p>
				            </div>
				        </div>
				    </div> <!-- End of .alert-wrapper -->
				</div> <!-- /.contact-validation-markup -->
			</div> <!-- /.contact-page -->
		

		

			

<?php $this->load->view('index/footer'); ?>

	  
	        <!-- Scroll Top Button -->
			<button class="scroll-top tran3s">
				<i class="fa fa-angle-up" aria-hidden="true"></i>
			</button>

			
			


		<!-- Js File_________________________________ -->

		<!-- j Query -->
		<script src="<?php echo site_url(); ?>/assets/vendor/jquery.2.2.3.min.js"></script>
		<!-- Bootstrap JS -->
		<script src="<?php echo site_url(); ?>/assets/vendor/bootstrap/bootstrap.min.js"></script>
		<!-- Bootstrap Select JS -->
		<script type="text/javascript" src="<?php echo site_url(); ?>/assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
		<!-- Camera Slider -->
		<script type='text/javascript' src='<?php echo site_url(); ?>/assets/vendor/Camera-master/scripts/jquery.mobile.customized.min.js'></script>
	    <script type='text/javascript' src='<?php echo site_url(); ?>/assets/vendor/Camera-master/scripts/jquery.easing.1.3.js'></script> 
	    <script type='text/javascript' src='<?php echo site_url(); ?>/assets/vendor/Camera-master/scripts/camera.min.js'></script>
	    <!-- Mega menu  -->
		<script type="text/javascript" src="<?php echo site_url(); ?>/assets/vendor/bootstrap-mega-menu/js/menu.js"></script>
		<!-- WOW js -->
		<script src="<?php echo site_url(); ?>/assets/vendor/WOW-master/dist/wow.min.js"></script>
		<!-- owl.carousel -->
		<script src="<?php echo site_url(); ?>/assets/vendor/owl-carousel/owl.carousel.min.js"></script>
		<!-- Fancybox -->
		<script type="text/javascript" src="<?php echo site_url(); ?>/assets/vendor/fancybox/dist/jquery.fancybox.min.js"></script>
		<!-- Google map js -->
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjQLCCbRKFhsr8BY78g2PQ0_bTyrm_YXU" type="text/javascript"></script>
		<script src="<?php echo site_url(); ?>/assets/vendor/sanzzy-map/dist/snazzy-info-window.min.js"></script>
		


		
		<!-- Theme js -->
		<script type="text/javascript" src="<?php echo site_url(); ?>/assets/js/theme.js"></script>

		</div> <!-- /.main-page-wrapper -->
	</body>
</html>