
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<!-- For IE -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<!-- For Resposive Device -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<title>Beranda | <?php echo $title; ?></title>

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
				Theme Main Banner
			============================================== 
			-->
			<div id="theme-main-banner" class="banner-one section-margin-bottom" style="display: block; margin-bottom:10px;">
			<?php foreach($slider as $slide){ ?>
				<div data-src="<?php echo site_url(); ?>/upload/images/<?php echo $slide->gambar; ?>">
					<div class="camera_caption text-center scrollLeft">
						<div class="container">
						<h4 class=""><?php echo $slide->title; ?></h4>
							<?php if($slide->nama_button!=''){ ?><a href="<?php echo $slide->link_button; ?>" class="scrollLeft theme-line-button" data-wow-delay="0.4s"><?php echo $slide->nama_button; ?></a><?php } ?>
						</div> <!-- /.container -->
					</div> <!-- /.camera_caption -->
				</div>
			<?php } ?>	
			</div> <!-- /#theme-main-banner -->

		
<div class="our-history section-margin-top"  style="margin-top:0px;margin-bottom:10px;">
				<div class="container">
				<div class="theme-title-one theme-title">
						<h2>Tentang Kami</h2>
				</div> <!-- /.theme-title-one -->
<div class="row our-goal" style="padding-top: 0px;">
						<div class="col-sm-6 col-xs-12" style="text-align:left;">
							<h5>Tentang Kitong Bisa</h5>
							<p>The Department of Education and Training is led by Director-General, Dr Jim Watterston. The portfolio ministers are Kate Jones, Minister for Education and Minister for Tourism, Major Events and the Commonwealth Games and Yvette D'Ath, Attorney-General and Minister for Justice and Minister for Training and Skills</p>
							<a href="#" class="read-more">Baca lebih lengkap <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
						</div>
						<div class="col-sm-6 col-xs-12" style="text-align:left;">
							<h5>Tentang Kitong Bisa Shop</h5>
							<p>The Department of Education and Training is led by Director-General, Dr Jim Watterston. The portfolio ministers are Kate Jones, Minister for Education and Minister for Tourism, Major Events and the Commonwealth Games and Yvette D'Ath, Attorney-General and Minister for Justice and Minister for Training and Skills</p>
							<a href="#" class="read-more">Baca lebih lengkap <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
						</div>
						
					</div>
					</div>

	<!-- 
			=============================================
				Shop Page
			============================================== 
			-->
			
			<div class="our-courses section-margin-top">
				<div class="container">
									<div class="theme-title-one theme-title" style="padding-bottom: 10px;">
						<h2>Produk</h2>
						<p style="padding-bottom:0px;">From concept through construction, to the finishing touches of each of your projects, you can rely on the our <br> team to deliver a personal environment tailored specifically for you</p>
					</div> <!-- /.theme-title-one -->
					
					<div class="row" >
							<?php 
							foreach($results as $p){ ?>
								
								<div class="col-md-3 col-sm-12 col-xs-12"">
							<div class="single-course-block" style="border: 1px solid #e7e7e7;">
								<div ><img src="<?php echo site_url(); ?>/upload/images/<?php echo $p->gambar; ?>" alt="" style="height:250px;min-width:250px;"></div>
								<div class="text-box" style="padding:10px;text-align:left;">
									<h5 ><a href="<?php echo site_url()."product/id/".$p->id; ?>"><?php echo $p->title; ?></a></h5>
										<p style="height: 100px;padding-top:10px;padding-bottom:10px;"><?php echo substr(strip_tags($p->description), 0, 50);?>... </p>
										<strong style="font-size:20px;">Rp.<?php echo number_format($p->harga , 0, ',', '.'); ?></strong>
										<a style="float:right;" href="<?php echo site_url()."product/id/".$p->id; ?>" class="wow fadeInUp animated theme-line-button" data-wow-delay="0.1s" >Beli</a>
									
									
									
								</div> <!-- /.text-box -->
								</div>
							</div> <!-- /.single-course-block -->
						
							<?php 
							}
							?>
							
						</div>
				</div> <!-- /.container -->
			</div> <!-- /.shop-page -->
			<!--
			=============================================
				Our Courses
			==============================================
			-->
			<div class="our-courses section-margin-top">
				<div class="container">
					<div class="theme-title-one theme-title" style="padding-bottom: 10px;">
						<h2>Kursus Online</h2>
						<p style="padding-bottom:0px;">From concept through construction, to the finishing touches of each of your projects, you can rely on the our <br> team to deliver a personal environment tailored specifically for you</p>
					</div> <!-- /.theme-title-one -->

					<div class="row">
					<?php 
							foreach($resultscourse as $c){
							$s = $this->Index_model->getUserEmail($c->author)->result();
							?>
								
							
						
						<div class="col-md-3 col-sm-12 col-xs-12"">
							<div class="single-course-block" style="border: 1px solid #e7e7e7;">
								<div ><img src="<?php echo site_url(); ?>/upload/images/<?php echo $c->gambar; ?>" alt="" style="min-width:250px;height:250px;"></div>
								<div class="text-box" style="padding:10px;text-align:left;">
									<h5 style="height: 50px;"><a href="<?php echo site_url()."course/id/".$c->id; ?>"><?php echo $c->title; ?></a></h5>
										<p style="height: 250px;padding-top:10px;padding-bottom:10px;"><?php echo substr(strip_tags($c->description), 0, 200);?>... </p>
										<strong style="font-size:20px;">Rp.<?php echo number_format($c->harga , 0, ',', '.'); ?></strong>
										<a style="float:right;" href="<?php echo site_url()."course/id/".$p->id; ?>" class="wow fadeInUp animated theme-line-button" data-wow-delay="0.1s" >Beli</a>
									
									
									
								</div> <!-- /.text-box -->
								</div>
							</div> <!-- /.single-course-block -->
						
							<?php 
							}
							?>
							
						</div>
				</div> <!-- /.container -->
			</div> <!-- /.shop-page -->
			


		

			<!-- 
			=============================================
				Blog Grid
			============================================== 
			-->
			<div class="blog-grid section-margin-top">
				<div class="container">
					<div class="theme-title-one theme-title">
						<h2>Blog</h2>
						<p>Change higher education financing your future, you can rely on the our team to deliver a personal <br> environment tailored specifically for you</p>
					</div> <!-- /.theme-title-one -->

					<div class="row">
					<?php 
							$i = 1;
							foreach($blog as $b){?>
							<div class="col-md-4 col-xs-6">
							<div class="single-blog-grid" style="border: 1px solid #e7e7e7;">
								<div class="image">
									<img src="<?php echo site_url()."upload/images/".$b->gambar; ?>" alt="" style="height:223px;;max-width:370px;max-height:223px;">
									
								</div> <!-- /.image -->
								<div class="text" style="padding: 10px;">
									<h6 style="font-weight:bold;padding: 5px;min-height:50px;"><a href="<?php echo site_url(); ?>blog/id/<?php echo $b->id; ?>"><?php echo $b->title; ?></a> </h6>
									<span><?php echo date('d F Y', strtotime($b->timestamp)); ?></span>
									<p style="padding: 5px;"><?php echo substr(strip_tags($b->content), 0, 80);?>...</p>
								</div> <!-- /.text -->
							</div> <!-- /.single-blog-grid -->
						</div> <!-- /.col- -->
							<?php 
							if (++$i == 4) break;
							} ?>
						
						
					</div> <!-- /.row -->
				</div> <!-- /.container -->
			</div> <!-- /.blog-grid -->


			

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
		

		<!-- Theme js -->
		<script type="text/javascript" src="<?php echo site_url(); ?>/assets/js/theme.js"></script>

		</div> <!-- /.main-page-wrapper -->
	</body>
</html>