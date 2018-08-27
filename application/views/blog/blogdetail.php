<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<!-- For IE -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<!-- For Resposive Device -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<title><?php echo $blog[0]->title; ?> | <?php echo $title; ?></title>

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
  	
  	<style>
#snackbar {
    visibility: hidden;
    min-width: 250px;
    margin-left: -125px;
    background-color: #333;
    color: #fff;
    text-align: center;
    border-radius: 2px;
    padding: 16px;
    position: fixed;
    z-index: 1;
    left: 50%;
    bottom: 30px;
    font-size: 17px;
}

#snackbar.show {
    visibility: visible;
    -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
    animation: fadein 0.5s, fadeout 0.5s 2.5s;
}

@-webkit-keyframes fadein {
    from {bottom: 0; opacity: 0;} 
    to {bottom: 30px; opacity: 1;}
}

@keyframes fadein {
    from {bottom: 0; opacity: 0;}
    to {bottom: 30px; opacity: 1;}
}

@-webkit-keyframes fadeout {
    from {bottom: 30px; opacity: 1;} 
    to {bottom: 0; opacity: 0;}
}

@keyframes fadeout {
    from {bottom: 30px; opacity: 1;}
    to {bottom: 0; opacity: 0;}
}
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
				<div class="opacity"   style="padding: 10px 0 10px 0;">
					<ul>
<li><a href="<?php echo site_url(); ?>" style="font-size:14px;color:#fff;">Beranda</a> /</li>
						<li><h3 style="font-size:18px;color:#fff;">Blog</h3></li>
						
					</ul>
				</div> <!-- /.opacity -->
			</div> <!-- /.theme-inner-banner -->
		
<!-- 
			=============================================
				Blog Details
			============================================== 
			-->
			<div class="blog-list section-margin-top section-margin-bottom">
				<div class="container">
					<div class="row">
						<div class="col-md-offset-1 col-xs-10 blog-details-content">
							<div class="single-blog-list">
							    <?php if($blog[0]->gambar!=null){ ?>
								<div class="image"><img src="<?php echo site_url(); ?>upload/images/<?php echo $blog[0]->gambar; ?>" alt="" style="max-width:870px;max-height:395px;"></div>
								<?php } ?>
								<ul class="post-info">
									<li><?php echo date('d F Y', strtotime($blog[0]->timestamp)); ?></li>
									<li>Oleh <?php echo $blog[0]->author_email; ?></li>
								</ul>
								<h3><?php echo $blog[0]->title; ?></h3>
								<p><?php echo $blog[0]->content; ?></p>
								
								</div> <!-- /.single-blog-list -->
							<div class="share-content">
								<ul class="clearfix">
									<li></li>
									<li>
										<ul class="social-icon">
											<li><a href="<?php echo $facebook; ?>" class="tran3s"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
											<li><a href="<?php echo $twitter; ?>" class="tran3s"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
											<li><a href="<?php echo $instagram; ?>" class="tran3s"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
										</ul>
									</li>
									<li></li>
								</ul>
							</div> <!-- /.share-content -->
							<div class="author-text" align="center" style="padding-top:50px;">
								<h5 class="sub-heading" style="float:none;padding:0;">Tentang Penulis</h5>
								<div class="clearfix author-data">
									<img style="float:none;" src="<?php echo site_url(); ?>upload/images/<?php echo $penulis[0]->foto; ?>" alt="" class="float-left">
									<div class="name" style="float:none;padding-left:0;">
										<h6><?php echo $penulis[0]->nama_lengkap; ?></h6>
										<p><?php echo $penulis[0]->email; ?></p>
									</div> <!-- /.name -->
								</div> <!-- /.author-data -->
							</div> <!-- /.author-text -->
							<div class="comment-form">
								<h5 class="sub-heading">Tambahkan Komentar Anda</h5>
								<?php echo form_open('blog/comment', array(
    'autocomplete' => 'off'
)); ?>
									<div class="row">
										<div class="col-sm-6 col-xs-12">
											<textarea name="isi" placeholder="Isi Komentar Anda" style="margin: 0px 0px 25px; height: 100%; width: 100%;"></textarea>
											<input type="hidden" name="id" value="<?php echo $blog[0]->id; ?>">
										</div>
										<div class="col-sm-4 col-xs-12">
											<button class="theme-solid-button" style="color:black;font-weight:900;">Submit</button>
										</div>
									</div>
									<?php echo form_close(); ?>
							</div> <!-- /.comment-form -->
                                <div class="user-comment-data">
								    <h5 class="sub-heading">Komentar <?php echo count($blog_comments); ?></h5>
								<?php foreach($blog_comments as $pc){
									$uss = $this->Index_model->getUserEmail($pc->email)->result();
								?>
								
								<div class="single-comment clearfix">
									<div class="comment float-left">
										<h6><?php echo $uss[0]->nama_lengkap; ?></h6>
										<p><?php echo $pc->isi; ?></p>
										<?php if($this->session->userdata('logged_in')){ if($this->session->userdata('akses')==9){ ?>
										<a href='<?php echo site_url();?>blog/hapus/<?php echo $pc->id; ?>/<?php echo $pc->id_blog; ?>'><button>Hapus</button></a>
										<?php } } ?>
									</div> <!-- /.comment -->
								</div> <!-- /.single-commnet -->
								<?php } ?>
							</div> <!-- /.user-comment-data -->
							
						</div> <!-- /.blog-list-content -->

						
					</div> <!-- /.row -->
				</div> <!-- /.container -->
			</div> <!-- /.blog-list -->
	
			
	

<div id="snackbar"><?php 
if($error==1){echo "Komentar Berhasil Ditambahkan!";} ?></div>

<?php if($error!=''){?>
<script>
window.onload=function(){
     var x = document.getElementById('snackbar');
    x.className = 'show';
    setTimeout(function(){ x.className = x.className.replace('show', ''); }, 3000);
    
}
</script>
<?php } ?>


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