<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<!-- For IE -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<!-- For Resposive Device -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<title><?php echo $product[0]->title; ?> | <?php echo $title; ?></title>

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

			
  	</style>
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
				<div class="opacity" style="padding: 10px 0 10px 0;">
					<ul>
<li><a href="<?php echo site_url(); ?>" style="font-size:14px;color:#fff;">Beranda</a> /</li>
						<li><h3 style="font-size:18px;color:#fff;">Produk</h3></li>
					</ul>
				</div> <!-- /.opacity -->
			</div> <!-- /.theme-inner-banner -->
		
<!-- 
			=============================================
				Blog Details
			============================================== 
			-->
			<div class="shop-page section-margin-bottom section-margin-top">
				<div class="container">
					<div class="row">
						<div class="col-lg-9 col-md-8 col-xs-12 shop-details float-right">
							<div class="our-gallery single-product-details clearfix">
								<div class="col-md-6 col-xs-6">
								   
								<div class="gallery-image-wrapper">
								    
								<div class="image"  style="border: 1px solid #e7e7e7;">
									<img src="<?php echo site_url()."upload/images/".$product[0]->gambar; ?>" alt="" class="float-left" style="height:100%;width:100%;">
							
								 
										<div class="opacity"><a data-fancybox="produk" href="<?php echo site_url()."upload/images/".$product[0]->gambar; ?>" class="zoom-view" title="<?php echo $product[0]->title; ?>"><i class="fa fa-search" aria-hidden="true"></i></a></div>
								
									</div>
								
							</div> <!-- /.gallery-image-wrapper -->
							</div> <!-- /.gallery-image-wrapper -->
								<?php if($product[0]->gambar2!=null){ ?> 
									<div class="opacity"><a data-fancybox="produk" href="<?php echo site_url()."upload/images/".$product[0]->gambar2; ?>" class="zoom-view" title="<?php echo $product[0]->title; ?>"><i class="fa fa-search" aria-hidden="true"></i></a></div>
									<?php } ?>
										<?php if($product[0]->gambar3!=null){ ?> 
									<div class="opacity"><a data-fancybox="produk" href="<?php echo site_url()."upload/images/".$product[0]->gambar3; ?>" class="zoom-view" title="<?php echo $product[0]->title; ?>"><i class="fa fa-search" aria-hidden="true"></i></a></div>
									<?php } ?> 
								<div class="product-order-details float-left">
									<h3><?php echo substr(strip_tags($product[0]->title), 0, 25);?></h3>
									
									<ul class="price">
										<li>Rp.<?php echo number_format($product[0]->harga , 0, ',', '.'); ?></li>
										<li></li>
										<li>Stock Tersedia</li>
									</ul>
									
									
									<p><?php echo $product[0]->description; ?></p>
									 <?php echo form_open_multipart('cart/tambah', array(
    'enctype' => 'multipart/form-data'
)); ?>
<input type="hidden" name="id" value="<?php echo $product[0]->id; ?>" />
									<input type="hidden" name="nama" value="<?php echo $product[0]->title; ?>" />
									<input type="hidden" name="harga" value="<?php echo $product[0]->harga; ?>" />
									<input type="hidden" name="gambar" value="<?php echo $product[0]->gambar; ?>" />
									<input type="hidden" name="berat" value="<?php echo $product[0]->berat; ?>" />
									<input type="hidden" name="type" value="1" />
									<div class="clearfix">
										<ul class="order-box float-left">
											<li>Qty</li>
											<li><input type="number" name="qty" min="1" value="1" class="val" id="product-value"></li>
											<li><button style="width:250px;height:50px;" id="value-increase"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Tambahkan Ke Keranjang</button></li>
										</ul>
										
										
									
									<?php echo form_close(); ?>
									</div>
																		
									
								</div> <!-- /.product-order-details -->
							</div> <!-- /.single-product-details -->

							<div class="review-tab" style="margin-top:10px;">
								<ul class="nav nav-tabs">
									<li class="active"><a data-toggle="tab" href="#deskripsi">Deskripsi Tambahan</a></li>
									<li><a data-toggle="tab" href="#comment">Komentar <?php echo "(".count($produk_comments).")"; ?></a></li>
								</ul>
								<div class="tab-content">
									<div id="deskripsi" class="tab-pane fade in active">
								    	<p><?php echo $product[0]->additional_description; ?></p> <br>
								    </div>
										<div id="comment" class="tab-pane fade">
								    	
										<div class="row">
						<div class="col-lg-9 col-md-8 col-xs-12 blog-details-content">
								    	<div class="comment-form">
								<h5 class="sub-heading" style="padding:0px;padding-bottom:10px;">Tambahkan Komentar Anda</h5>
								<?php echo form_open('product/comment', array(
    'autocomplete' => 'off'
)); ?>
									<div class="row">
										<div class="col-sm-6 col-xs-12">
											<textarea name="isi" placeholder="Isi Komentar Anda" style="margin: 0px 0px 25px; height: 93px; width: 331px;"></textarea>
											<input type="hidden" name="id" value="<?php echo $product[0]->id; ?>">
										</div>
										<div class="col-sm-4 col-xs-12">
											<button class="theme-solid-button">Submit</button>
										</div>
									</div>
									<?php echo form_close(); ?>
							</div> <!-- /.comment-form -->
							
							<div class="user-comment-data">
								<?php foreach($produk_comments as $pc){
									$uss = $this->Index_model->getUserEmail($pc->email)->result();
								?>
								<div class="single-comment clearfix">
									<div class="comment float-left">
										<h6><?php echo $uss[0]->nama_lengkap; ?></h6>
										<p><?php echo $pc->isi; ?></p>
										<?php if($this->session->userdata('logged_in')){ if($this->session->userdata('akses')==9){ ?>
										<a href='<?php echo site_url();?>product/hapus/<?php echo $pc->id; ?>/<?php echo $pc->id_product; ?>'><button>Hapus</button></a>
										<?php } } ?>
									</div> <!-- /.comment -->
								</div> <!-- /.single-commnet -->
								<?php } ?>
							</div> <!-- /.user-comment-data -->
							
							</div> 
							</div> 
								  	</div>
								  	
								</div>
							</div> <!-- /.review-tab -->
							<?php if(count($results_kategori)!=0){ ?>
							<div class="related-product shop-product">
								<h4>Related Products</h4>

								<div class="row">
									<div class="related-product-slider">
									<?php foreach($results_kategori as $rk){ ?>
									
										<div class="item">
											<div class="single-product">
												<div class="image"><img src="<?php echo site_url()."upload/images/".$rk->gambar; ?>" alt="" style="width:270px;height:255px;"></div> <!-- /.image -->
												<div class="info">
													<h6><a href="<?php echo site_url()."product/id/".$rk->id; ?>" class="tran3s"><?php echo substr(strip_tags($rk->title), 0, 25);?></a></h6>
													<strong>Rp.<?php echo number_format($rk->harga , 0, ',', '.'); ?></strong>
													<a href="<?php echo site_url()."product/id/".$rk->id; ?>" class="tran3s p-bg-color hvr-float-shadow">Lihat Produk</a>
												</div> <!-- /.info -->
											</div> <!-- /.single-product -->
										</div> <!-- /.col- -->
										
									<?php } ?>	
									</div>
								</div> <!-- /.row -->
							</div> <!-- /.related-product -->
							<?php } ?>
							
						</div> <!-- /.shop-details -->
						<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 shop-sidebar">
							<div class="sidebar-shop-categories">
								<h4>Kategori Produk :</h4>
								<ul>
									<?php foreach($kategori_produk as $pk){?>
									<li><a href="<?php echo site_url(); ?>product/kategori/<?php echo $pk->id; ?>" class="tran3s"><?php echo strtoupper($pk->nama); ?></a></li>
									<?php } ?>
								</ul>
							</div> <!-- /.sidebar-shop-categories -->
							
							<div class="shop-popular-product">
								<h4>Produk Populer</h4>
								<ul>
								<?php 
								$i = 0;
								foreach($results_populer as $pk){?>
									<li class="clearfix">
										<img src="<?php echo site_url()."upload/images/".$pk->gambar; ?>" alt="" class="float-left" style="width:100px;height:75px;">
										<div class="name float-left">
											<h6><a href="<?php echo site_url()."product/id/".$pk->id; ?>" class="tran3s"><?php echo substr(strip_tags($pk->title), 0, 25);?></a></h6>
											<strong>Rp.<?php echo number_format($pk->harga , 0, ',', '.'); ?></strong>
										</div>
									</li>
									
									
								
									<?php 
									
									if (++$i == 4) break;
									} ?>
									
									
								</ul>
							</div> <!-- /.shop-popular-product -->
							
							
						</div> <!-- /.shop-sidebar -->
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