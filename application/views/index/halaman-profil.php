<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<!-- For IE -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<!-- For Resposive Device -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<title>Halaman Profil | <?php echo $title; ?></title>

		<!-- Favicon -->
		<link rel="icon" type="image/png" sizes="56x56" href="<?php echo site_url(); ?>/assets/images/fav-icon/icon.png">


		<!-- Main style sheet -->
		<link rel="stylesheet" type="text/css" href="<?php echo site_url(); ?>/assets/css/style.css">
		
		<link rel="stylesheet" type="text/css" href="<?php echo site_url(); ?>/assets/css/responsive.css">


		<!-- Fix Internet Explorer ______________________________________-->

		<!--[if lt IE 9]>
			<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
			<script src="<?php echo site_url(); ?>/assets/vendor/html5shiv.js"></script>
			<script src="<?php echo site_url(); ?>/assets/vendor/respond.js"></script>
		<![endif]-->

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
				Blog Details
			============================================== 
			-->
			<div class="blog-list section-margin-top section-margin-bottom" style="margin-top: 100px;">
				<div class="container">
					<div class="row">
						<div class="col-md-offset-1 col-xs-10 blog-details-content">
							<div class="page-box">
                            
							<div class="theme-form-style-one">
									<h3>Halaman Profil</h3>
									<?php echo form_open('index/update_profil', array(
    'class' => 'form-validation',
    'autocomplete' => 'off',
)); ?>
									<form class="form-validation" autocomplete="off">
										<div class="single-input">
											<label>Nama Lengkap</label>
											<input type="text" placeholder="Masukan Nama Lengkap Anda" name="nama" value="<?php echo $user[0]->nama_lengkap; ?>" required>
										</div> <!-- /.single-input -->
										<div class="single-input">
											<label>Email Anda</label>
											<input type="email" placeholder="Masukan Email Anda" name="email" value="<?php echo $user[0]->email; ?>" disabled required>
										</div> <!-- /.single-input -->
										<div class="single-input">
											<label>No. Handphone</label>
											<input type="text" placeholder="Contoh: 082812312312" value="<?php echo $user[0]->nomor_handphone; ?>" name="telepon" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
										</div> <!-- /.single-input -->
										<div class="single-input">
											<label>Alamat</label>
											<input type="text" placeholder="Masukan Alamat Lengkap Anda" name="alamat" value="<?php echo $user[0]->alamat; ?>" required>
										</div> <!-- /.single-input -->
										<div class="single-input">
											<label>Kode POS</label>
											<input type="text" placeholder="Masukan Kode POS Anda" name="kode_pos" value="<?php echo $user[0]->kode_pos; ?>" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
										</div> <!-- /.single-input -->
										<div class="single-input">
											<label>Tempat Lahir</label>
											<input type="text" placeholder="Tempat Lahir" value="<?php echo $user[0]->tempat_lahir; ?>" name="tempat_lahir" required>
										</div> <!-- /.single-input -->
										<div class="single-input">
											<label>Tanggal Lahir</label>
											<input type="date" placeholder="Tanggal Lahir" value="<?php echo $user[0]->tanggal_lahir; ?>" name="tanggal_lahir" required>
										</div> <!-- /.single-input -->
									
									<input type="submit" value="Perbarui Data" class="theme-solid-button theme-button" style="color:black;font-weight:bold;">
									</form>
									<?php echo form_close(); ?><br>
									<a href="<?php echo site_url(); ?>index/ubah_password" class="theme-solid-button theme-button" style="color:black;font-weight:bold;">Ubah Password?</a>
							
								</div> <!-- /.theme-form-style-one -->
							
							
							
							
                        </div>
							
							
						</div> <!-- /.blog-list-content -->

					</div> <!-- /.row -->
				</div> <!-- /.container -->
			</div> <!-- /.blog-list -->
		


 

		

		

<div id="snackbar"><?php 
if($error==1){echo "Profil berhasil diperbarui!";}else if($error==33){echo "Password berhasil diubah!";}else if($error==11){ echo "Password Lama tidak sesuai!";}else if($error==22){ echo "Password baru tidak sama, silahkan ulangi!";}else if($error==44){ echo "Password tidak boleh sama dengan lama, silahkan ulangi!";} ?></div>

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