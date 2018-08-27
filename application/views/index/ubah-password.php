<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<!-- For IE -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<!-- For Resposive Device -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<title>Ubah Password | <?php echo $title; ?></title>

		<!-- Favicon -->
		<link rel="icon" type="image/png" sizes="56x56" href="<?php echo site_url(); ?>/assets/images/fav-icon/icon.png">


		<!-- Main style sheet -->
		<link rel="stylesheet" type="text/css" href="<?php echo site_url(); ?>/assets/css/style.css">
		
		 <!-- DataTables CSS -->
      <link rel="stylesheet" href="<?php echo site_url(); ?>/assetsbackend/plugins/datatables/css/dataTables.bootstrap.min.css" >
      <link rel="stylesheet" href="<?php echo site_url(); ?>/assetsbackend/plugins/datatables/css/buttons.bootstrap.min.css" >
      <link rel="stylesheet" href="<?php echo site_url(); ?>/assetsbackend/plugins/datatables/css/responsive.bootstrap.min.css" >
		<!-- responsive style sheet -->
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
									<h3>Ubah Password</h3>
									<?php echo form_open('index/update_password', array(
    'class' => 'form-validation',
    'autocomplete' => 'off',
)); ?>
									<form class="form-validation" autocomplete="off">
										<div class="single-input">
											<label>Password Lama</label>
											<input type="password" placeholder="Masukan Password Lama" name="password" required>
										</div> <!-- /.single-input -->
										<div class="single-input">
											<label>Password Baru</label>
											<input type="password" placeholder="Masukan Password Baru" name="password1" required>
										</div> <!-- /.single-input -->
										<div class="single-input">
											<label>Ulangi Password</label>
											<input type="password" placeholder="Ulangi Password Baru" name="password2" required>
										</div> <!-- /.single-input -->
									<input type="submit" value="Simpan Password" class="theme-solid-button theme-button" style="color:black;font-weight:bold;">
									</form>
									<?php echo form_close(); ?>
									<br>
									<a href="<?php echo site_url(); ?>index/halaman_profil" style="all:unset;"><button class="theme-solid-button theme-button" style="color:black;font-weight:bold;">Kembali</button></a>
							
									</div> <!-- /.theme-form-style-one -->
							
							
							
							
                        </div>
							
							
						</div> <!-- /.blog-list-content -->

					</div> <!-- /.row -->
				</div> <!-- /.container -->
			</div> <!-- /.blog-list -->
		


 

		

		
<div id="snackbar"><?php 
if($error==3){echo "Password berhasil diubah!";}else if($error==1){ echo "Password Lama tidak sesuai!";}else if($error==2){ echo "Password baru tidak sama, silahkan ulangi!";}else if($error==4){ echo "Password tidak boleh sama dengan lama, silahkan ulangi!";} ?></div>

<?php if($error!=''){?>
<script>
window.onload=function(){
     var x = document.getElementById('snackbar');
    x.className = 'show';
    setTimeout(function(){ x.className = x.className.replace('show', ''); }, 3000);
    //window.location="halaman_profil";
    
}
</script>
<?php } ?>

<?php 
if($error==3){
$toastemail = $this->session->userdata('email');

require './PHPMailer/Exception.php';
require './PHPMailer/PHPMailer.php';
require './PHPMailer/SMTP.php';    
date_default_timezone_set('Asia/Jakarta');	
//Create a new PHPMailer instance
$mail = new PHPMailer;
//Tell PHPMailer to use SMTP
$mail->isSMTP();
//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 0;
//Set the hostname of the mail server
$mail->Host = 'mail.visitmuseum.org';
// use
// $mail->Host = gethostbyname('smtp.gmail.com');
// if your network does not support SMTP over IPv6
//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 587;
//Set the encryption system to use - ssl (deprecated) or tls
$mail->SMTPSecure = 'tls';
//Whether to use SMTP authentication
$mail->SMTPAuth = true;
//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = "support@visitmuseum.org";
//Password to use for SMTP authentication
$mail->Password = "Nasiudukayambakar";
//Set who the message is to be sent from
$mail->setFrom('support@visitmuseum.org', 'Kitong Bisa Shop');
//Set an alternative reply-to address
$mail->addReplyTo('datakitong@gmail.com', 'Kitong Bisa Shop');
//Set who the message is to be sent to
$mail->addAddress($toastemail);
//Set the subject line
$mail->Subject = 'Password Diperbarui |  Kitong Bisa Shop';
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
$bodyhtml = file_get_contents('./PHPMailer/html/passwordbaru.html');
$bodyhtml = str_replace('%email%', $toastemail, $bodyhtml); 
$mail->msgHTML($bodyhtml);
//Replace the plain text body with one created manually
$mail->AltBody = 'This is a plain-text message body';
$mail->Send();
}

?>
			

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
		<!-- Datatables -->
      <script src="<?php echo site_url(); ?>/assetsbackend/plugins/datatables/js/jquery.dataTables.min.js"></script>
      <script src="<?php echo site_url(); ?>/assetsbackend/plugins/datatables/js/dataTables.bootstrap.min.js"></script>
      <script src="<?php echo site_url(); ?>/assetsbackend/plugins/datatables/js/dataTables.buttons.min.js"></script>
      <script src="<?php echo site_url(); ?>/assetsbackend/plugins/datatables/js/buttons.bootstrap.min.js"></script>
      <script src="<?php echo site_url(); ?>/assetsbackend/plugins/datatables/js/buttons.flash.min.js"></script>
      <script src="<?php echo site_url(); ?>/assetsbackend/plugins/datatables/js/buttons.html5.min.js"></script>
      <script src="<?php echo site_url(); ?>/assetsbackend/plugins/datatables/js/buttons.print.min.js"></script>
      <script src="<?php echo site_url(); ?>/assetsbackend/plugins/datatables/js/dataTables.responsive.min.js"></script>
      <script src="<?php echo site_url(); ?>/assetsbackend/plugins/datatables/js/responsive.bootstrap.min.js"></script>
      <script src="<?php echo site_url(); ?>/assetsbackend/plugins/datatables/js/jszip.min.js"></script>
      <script src="<?php echo site_url(); ?>/assetsbackend/plugins/datatables/js/pdfmake.min.js"></script>
      <script src="<?php echo site_url(); ?>/assetsbackend/plugins/datatables/js/vfs_fonts.js"></script>
	  <script src="<?php echo site_url(); ?>/assetsbackend/js/advance_table_custom.js"></script>

		<!-- Theme js -->
		<script type="text/javascript" src="<?php echo site_url(); ?>/assets/js/theme.js"></script>

		</div> <!-- /.main-page-wrapper -->
	</body>
</html>