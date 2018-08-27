<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<!-- For IE -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<!-- For Resposive Device -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<title>Course | <?php echo $title; ?></title>

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
										<?php $this->load->view('frontendmenu/menu'); ?>
									</ul>
							   </div><!-- /.navbar-collapse -->
							</nav> <!-- /.theme-main-menu -->
						</div> <!-- /.main-content-wrapper -->
					</div> <!-- /.container -->
				</div> <!-- /.header-wrapper -->
			</header>


		

		


<div class="theme-inner-banner" style="background-color:#593c22;text-align: left;background:#593c22;">
				<div class="opacity"  style="padding: 10px 0 10px 0;">
					<ul>
							<li><a href="<?php echo site_url(); ?>" style="font-size:14px;color:#fff;">Beranda</a> /</li>
						<li><h3 style="font-size:18px;color:#fff;">Kursus</h3></li>
					</ul>
				</div> <!-- /.opacity -->
			</div> <!-- /.theme-inner-banner -->
		

		<div style="padding-top:25px;float:right;padding-right:90px;" class="shop-sidebar">
							<?php echo form_open('course/search', array(
    'autocomplete' => 'off',
    'class' => 'search',
    'style' => 'border: 1px solid #e7e7e7;',
)); ?>
								<input type="text" name="search" placeholder="Cari Kursus" required>
								<button class="tran3s" style="background:#ddb496;background-color:#ddb496;color:black;"><i class="fa fa-search fa-lg" aria-hidden="true"></i></button>
							<?php echo form_close(); ?>
							
				</div> <!-- /.shop-sidebar -->
		
		
		
		<div class="our-courses section-margin-top section-margin-bottom">
				<div class="container">
				    
					<div class="mixitUp-menu">
	        			<ul>
	        				<li class="filter active" data-filter="all">All</li>
							<?php foreach ($kategori_course as $kc) {?>
								<li class="filter" data-filter=".<?php echo $kc->id; ?>"><?php echo $kc->nama; ?></li>
							<?php } ?>
						
	        			</ul>
	        		</div> <!-- End of .mixitUp-menu -->

					<div class="row" id="mixitUp-item">
					
					<?php foreach ($results as $rc) {
						$s = $this->Index_model->getUserEmail($rc->author)->result();
						?>
						
						
						<div class="col-md-3 col-sm-12 col-xs-12 mix <?php echo $rc->id_kategori; ?>" style="display: inline-block;" data-bound="">
							<div class="single-course-block" style="border: 1px solid #e7e7e7;">
								<div><a href="<?php echo site_url()."course/id/".$rc->id; ?>"><img src="<?php echo site_url(); ?>/upload/images/<?php echo $rc->gambar; ?>" alt="" style="min-width:250px;height:250px;"></a></div>
								<div class="text-box" style="padding:10px;text-align:left;padding-bottom:20px;">
									<h5 ><a href="<?php echo site_url()."course/id/".$rc->id; ?>"><?php echo $rc->title; ?></a></h5>
										<p style="height: 100px;padding-top:10px;padding-bottom:10px;"><?php echo substr(strip_tags($rc->description), 0, 50);?>... </p>
										<strong style="font-size:20px;">Rp.<?php echo number_format($rc->harga , 0, ',', '.'); ?></strong>
										<a style="float:right;" href="<?php echo site_url()."course/id/".$rc->id; ?>" class="wow fadeInUp animated theme-line-button" data-wow-delay="0.1s" >Beli</a>
									
									
									
								</div> <!-- /.text-box -->
								</div>
							</div> <!-- /.single-course-block -->
						<?php } ?>
						
						
					</div> <!-- /.row -->
					<?php if(isset($links)){ ?>
<ul class="shop-pagination">
<?php foreach ($links as $link) {
echo "<li>". $link."</li>";
} ?>
							
							</ul>			

<?php  } ?>		
					</div> <!-- /.container -->
			</div>
			

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
		<script type="text/javascript" src="<?php echo site_url(); ?>/assets/vendor/jquery.mixitup.min.js"></script>

		<!-- Theme js -->
		<script type="text/javascript" src="<?php echo site_url(); ?>/assets/js/theme.js"></script>
		
		

		</div> <!-- /.main-page-wrapper -->
	</body>
</html>