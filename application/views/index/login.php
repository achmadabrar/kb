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

		<title>Log In | <?php echo $title; ?></title>

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
    left: 45%;
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
			


		

		
<div class="course-search-form">
				<div class="container">
					<div class="title" style="margin-bottom:20px;">
					
<a href="<?php echo site_url(); ?>"><img src="<?php echo site_url(); ?>/upload/images/<?php echo $logo; ?>" alt="Logo" style="margin-bottom:10px;"></a>
						<h2>Masuk ke Akun Anda </h2>
						<p>Jika sudah memiliki akun Kitong Bisa, silahkan masuk ke akun anda. </p>
					</div> <!-- /.title -->
					
					<?php echo form_open('index/login_masuk', array(
    'class' => 'course-form',
    'autocomplete' => 'on',
    'style' => 'width:40%; padding:0;'
)); ?>
					<form method="POST" class="course-form" autocomplete="on" style="width:40%; padding:0;">
										<div class="single-input">
											<label style=" color:white;">Email</label>
											<input type="email" placeholder="Email Anda" name="email" required>
										</div> <!-- /.single-input -->
										<div class="single-input" style="padding-top:10px;">
											<label style=" color:white;">Password</label>
											<input type="password" placeholder="Password" name="password" required>
										</div> <!-- /.single-input -->
										<input type="submit" value="Masuk" style="font-size: 20px;font-weight: 900;color: #000;background: #fff;border-radius: 10px;padding:0px;margin-top:10px;">
										
					</form>
					
					<?php echo form_close(); ?>
					<a href="<?php echo site_url(); ?>index/registrasi" style="all:unset;"><button class="course-form" style="width:40%;height:60px;font-size: 18px;font-weight: 900;color: #301F0F;background: #fff;border-radius: 10px;padding:0px;margin-top:10px;">Belum memiliki akun Kitong Bisa? Daftar<button></a>
					<a href="<?php echo site_url(); ?>index/lupa_password" style="all:unset;"><button class="course-form" style="width:40%;height:60px;font-size: 18px;font-weight: 900;color: #301F0F;background: #fff;border-radius: 10px;padding:0px;margin-top:10px;">Lupa Password?<button></a>
					<a href="<?php echo site_url(); ?>" style="all:unset;"><button class="course-form" style="width:40%;height:60px;font-size: 18px;font-weight: 900;color: #301F0F;background: #fff;border-radius: 10px;padding:0px;margin-top:10px;">Kembali ke Beranda<button></a>
					</div> <!-- /.container -->
			</div>

		

		

			

<div id="snackbar"><?php 
if($toast=='error'){echo "Email atau Password Salah, Silahkan Ulangi Kembali";}else if($toast=='berhasilregistrasi'){ echo "Berhasil Registrasi, cek email anda untuk melakukan konfirmasi!";}else if($toast=='belumdikonfirmasi'){ echo "Belum melakukan konfirmasi, silahkan cek email anda!";}else if($toast=='dikonfirmasi'){ echo "Konfirmasi Berhasil, silahkan masuk!";}else if($toast=='berhasilreset'){ echo "Link reset password dikirim, silahkan cek email!";}else if($toast=='berhasilreset2'){ echo "Reset Password berhasil, silahkan cek email!";}else if($toast=='emailterdaftar'){ echo "Email yang Anda masukkan sudah terdaftar!";} ?></div>

<?php if($toast!=''){?>
<script>
window.onload=function(){
     var x = document.getElementById('snackbar');
    x.className = 'show';
    setTimeout(function(){ x.className = x.className.replace('show', ''); }, 3000);
    
}
</script>
<?php } ?>


<?php
if($toast=='berhasilregistrasi'){
$toastemail = $error;

require './PHPMailer/Exception.php';
require './PHPMailer/PHPMailer.php';
require './PHPMailer/SMTP.php';    
$encrypted = my_simple_crypt($toastemail, 'e' );
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
$mail->Subject = 'Konfirmasi Pendaftaran Kitong Bisa Shop';
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
$bodyhtml = file_get_contents('./PHPMailer/html/aktivasi.html');
$bodyhtml = str_replace('%email%', $toastemail, $bodyhtml); 
$bodyhtml = str_replace('%encrypted%', $encrypted, $bodyhtml); 
$mail->msgHTML($bodyhtml);
//Replace the plain text body with one created manually
$mail->AltBody = 'This is a plain-text message body';
$mail->Send();
}

if($toast=='berhasilreset'){
$toastemail = $error;

require './PHPMailer/Exception.php';
require './PHPMailer/PHPMailer.php';
require './PHPMailer/SMTP.php';    
$encrypted = my_simple_crypt($toastemail, 'e' );
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
$mail->Subject = 'Link Reset Passowrd Kitong Bisa Shop';
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
$bodyhtml = file_get_contents('./PHPMailer/html/resetpassword.html');
$bodyhtml = str_replace('%email%', $toastemail, $bodyhtml); 
$bodyhtml = str_replace('%encrypted%', $encrypted, $bodyhtml); 
$mail->msgHTML($bodyhtml);
//Replace the plain text body with one created manually
$mail->AltBody = 'This is a plain-text message body';
$mail->Send();
}

if($toast=='berhasilreset2'){
$toastemail = $error;
$password = $newpassword;

require './PHPMailer/Exception.php';
require './PHPMailer/PHPMailer.php';
require './PHPMailer/SMTP.php';    
//$encrypted = my_simple_crypt($toastemail, 'e' );
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
$mail->Subject = 'Password Baru Anda Kitong Bisa Shop';
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
$bodyhtml = file_get_contents('./PHPMailer/html/newpassword.html');
$bodyhtml = str_replace('%email%', $toastemail, $bodyhtml); 
$bodyhtml = str_replace('%password%', $password, $bodyhtml); 
$mail->msgHTML($bodyhtml);
//Replace the plain text body with one created manually
$mail->AltBody = 'This is a plain-text message body';
$mail->Send();
}

function my_simple_crypt( $string, $action = 'e' ) {
    // you may change these values to your own
    $secret_key = 'kitongbisasecret';
    $secret_iv = 'dimasnurpanca';
 
    $output = false;
    $encrypt_method = "AES-256-CBC";
    $key = hash( 'sha256', $secret_key );
    $iv = substr( hash( 'sha256', $secret_iv ), 0, 16 );
 
    if( $action == 'e' ) {
        $output = base64_encode( openssl_encrypt( $string, $encrypt_method, $key, 0, $iv ) );
    }
    else if( $action == 'd' ){
        $output = openssl_decrypt( base64_decode( $string ), $encrypt_method, $key, 0, $iv );
    }
 
    return $output;
}

?>


	  
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