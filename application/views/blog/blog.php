<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<!-- For IE -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<!-- For Resposive Device -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<title>Blog | <?php echo $title; ?></title>

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
			</header> <!-- /.theme-menu-wrapper -->


		

		


<div class="theme-inner-banner" style="background-color:#593c22;text-align: left;background:#593c22;">
				<div class="opacity"  style="padding: 10px 0 10px 0;">
					<ul>
						<li><a href="<?php echo site_url(); ?>" style="font-size:14px;color:#fff;">Beranda</a> /</li>
						<li><h3 style="font-size:18px;color:#fff;">Blog</h3></li>
					</ul>
				</div> <!-- /.opacity -->
			</div> <!-- /.theme-inner-banner -->
		

		<!-- 
			=============================================
				Blog List
			============================================== 
			-->
			<div class="blog-list section-margin-top section-margin-bottom">
				<div class="container">
					<div class="row">
						<div class="col-lg-9 col-md-8 col-xs-12" id="post-data">
						
							 <?php foreach ($results as $post) {?>
							<div class="single-blog-list">
							    <?php if($post->gambar!=null){ ?>
								<div class="image"><img src="<?php echo site_url()."upload/images/".$post->gambar; ?>" alt="" style="max-width:870px;max-height:395px;"></div>
								<?php } ?>
								<ul class="post-info">
									<li><?php echo date('d F Y', strtotime($post->timestamp)); ?></li>
									<li>Oleh <?php echo $post->author_email; ?></li>
								</ul>
								<h3><a href="<?php echo site_url()."blog/id/".$post->id; ?>"><?php echo $post->title; ?> </a></h3>
								<p><?php echo substr(strip_tags($post->content), 0, 200);?>...</p>
								<a href="<?php echo site_url()."blog/id/".$post->id; ?>" class="read-more">Selengkapnya <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
</div>
							 <?php } ?>
			
<?php if(isset($links)){ ?>
<ul class="shop-pagination">
<?php foreach ($links as $link) {
echo "<li>". $link."</li>";
} ?>
							
							</ul>			

<?php  } ?>						

						</div> <!-- /.blog-list-content -->
								



							
							
							

										
						

						<!-- ************************ Theme Sidebar *************************** -->
						<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 theme-sidebar">
						    <div class="sidebar-widget sidebar-search">
								<h5>Pencarian Blog</h5>
								<?php echo form_open('blog/search', array(
    'autocomplete' => 'off'
)); ?>
								
									<input type="text" name="search" placeholder="Masukan Kata Kunci" required>
									<input type="hidden" name="kategori" value="<?php echo $kategori_id; ?>">
									<button><i class="fa fa-search" aria-hidden="true"></i></button>
							
								<?php echo form_close(); ?>
							</div> <!-- /.sidebar-search -->
							<div class="sidebar-widget sidebar-list">
								<h5>Kategori Blog</h5>
								<ul>
								<li><a href="<?php echo site_url()."blog";?>">Semua Kategori</a></li>
								<?php foreach($kategori as $k){ ?>
									<li><a href="<?php echo site_url()."blog/kategori/".$k->id; ?>"><?php echo $k->nama; ?></a></li>
								<?php } ?>
								</ul>
							</div> <!-- /.sidebar-list -->
							
							
							
							
						</div> <!-- /.theme-sidebar -->
					</div> <!-- /.row -->
				</div> <!-- /.container -->
			</div> <!-- /.blog-list -->
			

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