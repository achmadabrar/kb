<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<!-- For IE -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<!-- For Resposive Device -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<title>Produk | <?php echo $title; ?></title>

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
						<li><h3 style="font-size:18px;color:#fff;">Produk</h3></li>
					</ul>
					 
				</div> <!-- /.opacity -->
				 
			</div> <!-- /.theme-inner-banner -->
		

<div style="padding-top:25px;float:right;padding-right:90px;" class="shop-sidebar">
							<?php echo form_open('product/search', array(
    'autocomplete' => 'off',
    'class' => 'search',
    'style' => 'border: 1px solid #e7e7e7;',
)); ?>
								<input type="text" name="search" placeholder="Cari Produk">
								<input type="hidden" name="kategori" value="<?php echo $kategori_id; ?>">
								<button class="tran3s" style="background:#ddb496;background-color:#ddb496;color:black;"><i class="fa fa-search fa-lg" aria-hidden="true"></i></button>
							<?php echo form_close(); ?>
							
				</div> <!-- /.shop-sidebar -->
		
		<!-- 
			=============================================
				Shop Page
			============================================== 
			-->
			<div class="our-courses section-margin-top">
				<div class="container">
				     
					<div class="row">
						<div class="col-lg-12 col-md-8 col-xs-12 shop-product float-right">
							<div class="row">
							
							<?php 
							if(count($results)==0){
									echo "<h4 style='text-align:center;'>Tidak ada Produk pada Kategori ini.</h4>";
							}
							foreach ($results as $post) {?>
								
								
								
								<div class="col-md-3 col-sm-12 col-xs-12" style="display: inline-block;padding-bottom:20px;" data-bound="" >
							<div class="single-course-block" style="border: 1px solid #e7e7e7;">
								<div ><a href="<?php echo site_url()."product/id/".$post->id; ?>"><img src="<?php echo site_url(); ?>/upload/images/<?php echo $post->gambar; ?>" alt="" style="min-width:250px;height:250px;"></a></div>
								<div class="text-box" style="padding:10px;text-align:left;padding-bottom:50px;">
									<h5 style="height:50px;"><a href="<?php echo site_url()."product/id/".$post->id; ?>"><?php echo substr(strip_tags($post->title), 0, 25);?></a></h5>
										<p style="height: 100px;padding-top:10px;padding-bottom:10px;"><?php echo substr(strip_tags($post->description), 0, 50);?>... </p>
										<strong style="height:100px;font-size:20px;">Rp.<?php echo number_format($post->harga , 0, ',', '.'); ?></strong>
										<a style="float:right;" href="<?php echo site_url()."product/id/".$post->id; ?>" class="wow fadeInUp animated theme-line-button" data-wow-delay="0.1s" >Beli</a>
									
									
									
								</div> <!-- /.text-box -->
								</div>
							</div> <!-- /.single-course-block -->
								<?php
								} 
								?>
								
								
							</div> <!-- /.row -->
							<?php if(isset($links)){ ?>
<ul class="shop-pagination">
<?php foreach ($links as $link) {
echo "<li>". $link."</li>";
} ?>
							
							</ul>			

<?php  } ?>				
						</div> <!-- /.shop-product -->
						
<?php
if(count($results_populer)!=0){
								
?>
						<div class="col-lg-12 col-md-8 col-xs-12 shop-product float-right" style="margin-top:50px;">
    <div class="related-product shop-product">
								<h4>Produk Populer</h4>
								
								<div class="row" style="margin-top:20px;">
									<div class="related-product-slider">
									
									<?php 
									
									
									foreach ($results_populer as $posts) {?>
								
									  
								
								<div class="col-md-12 col-sm-12 col-xs-12" style="padding-bottom:0px;">
							<div class="single-course-block" style="border: 1px solid #e7e7e7;">
								<div ><img src="<?php echo site_url(); ?>/upload/images/<?php echo $posts->gambar; ?>" alt="" style="width:370px;height:370px;"></div>
								<div class="text-box" style="padding:10px;text-align:left;padding-bottom:20px;">
									<h5 ><a href="<?php echo site_url()."product/id/".$posts->id; ?>"><?php echo substr(strip_tags($posts->title), 0, 25);?></a></h5>
										<p style="padding-top:10px;padding-bottom:10px;"><?php echo substr(strip_tags($posts->description), 0, 50);?>... </p>
										<strong style="font-size:20px;">Rp.<?php echo number_format($posts->harga , 0, ',', '.'); ?></strong>
										<a style="float:right;" href="<?php echo site_url()."product/id/".$posts->id; ?>" class="wow fadeInUp animated theme-line-button" data-wow-delay="0.1s" >Beli</a>
									
									
									
								</div> <!-- /.text-box -->
								</div>
							</div> <!-- /.single-course-block -->
								<?php
								} 
								?>
									</div>
								</div> <!-- /.row -->
							</div> <!-- /.related-product -->
    
    </div>
	<?php 
}
	?>
					</div> <!-- /.row -->
				</div> <!-- /.container -->
			</div> <!-- /.shop-page -->
		

			

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