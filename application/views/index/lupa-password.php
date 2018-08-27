<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<!-- For IE -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<!-- For Resposive Device -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<title>Lupa Password | <?php echo $title; ?></title>

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
	
	<body style="background-color:#ddb496;">
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
			


		

		


<div class="course-search-form">
				<div class="container">
					<div class="title" style="margin-bottom:20px;">
					<a href="<?php echo site_url(); ?>"><img src="<?php echo site_url(); ?>/upload/images/<?php echo $logo; ?>" alt="Logo" style="margin-bottom:10px;"></a>
						<h2>Lupa Password </h2>
					</div> <!-- /.title -->
					
					<?php echo form_open('index/lupa_password_masuk', array(
    'class' => 'course-form ',
    'autocomplete' => 'off',
    'style' => 'width:40%; padding:0;'
)); ?>
					<form method="POST" class="course-form" autocomplete="off"  style="width:40%; padding:0;">
										<div class="single-input">
											<label style=" color:white;">Email</label>
											<input type="email" placeholder="Masukan Email Anda" name="email" autocomplete="off" required>
										</div> <!-- /.single-input -->
											<div class="single-input">
											<label style=" color:white;">Link reset password akan di kirimkan ke email anda</label>
										</div> <!-- /.single-input -->
										
										<input type="submit" value="Reset Password" style="font-size: 20px;font-weight: 900;color: #151515;background: #fff;border-radius: 10px;padding:0px;margin-top:10px;">
										
					</form>
					<?php echo form_close(); ?>
					<a href="<?php echo site_url(); ?>index/login" style="all:unset;"><button class="course-form" style="width:40%;height:60px;font-size: 18px;font-weight: 900;color: #301F0F;background: #fff;border-radius: 10px;padding:0px;margin-top:10px;">Kembali<button></a>
					</div> <!-- /.container -->
			</div>

		

		

			

	  
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