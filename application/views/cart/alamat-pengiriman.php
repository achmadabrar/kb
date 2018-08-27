<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<!-- For IE -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<!-- For Resposive Device -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<title>Keranjang | <?php echo $title; ?></title>

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
						<li><h3 style="font-size:18px;color:#fff;">Keranjang</h3></li>
					</ul>
				</div> <!-- /.opacity -->
			</div> <!-- /.theme-inner-banner -->
		

		
		
		<div class="our-courses section-margin-top section-margin-bottom">
				<div class="container">
					
<?php
$grand_total = 0;
$xx=0;
$berat=0;

		foreach ($carts as $item)
			{
				$grand_total = $grand_total + ($item->harga * $item->quantity);
				if($item->tipe==1){	
						$xx++;
					}
				$berat = $berat + ($item->berat*$item->quantity);	
			}

		
?>

							
							<div class="row">
							<div class="col-md-6 col-xs-12">
								<div class="theme-form-style-one">
									<h3>Informasi Pengiriman</h3>
									<form action="#" autocomplete="off">
									<div class="single-input">
											<label>Email</label>
											<input type="text" disabled value="<?php echo $this->session->userdata('email'); ?>">
										</div> <!-- /.single-input -->
										<div class="single-input">
											<label>Penerima</label>
											<input type="text" disabled value="<?php echo $this->session->userdata('nama_lengkap'); ?>">
										</div> <!-- /.single-input -->
										<div class="single-input">
											<label>Nomor HP</label>
											<input type="text" disabled value="<?php echo $this->session->userdata('nomor_handphone'); ?>">
										</div> <!-- /.single-input -->
										</form>
										</div> <!-- /.theme-form-style-one -->
							</div> <!-- /.col- -->
							<div class="col-md-6 col-xs-12">
								<div class="theme-form-style-one">
									<h3>Konfirmasi Metode Pengiriman</h3>
									<?php echo form_open_multipart('cart/pembayaran1', array(
    'enctype' => 'multipart/form-data'
)); ?>
										<div class="single-input">
											<label>Alamat Anda</label>
											<input  type="text" placeholder="Masukan Alamat Lengkap Anda" name="alamat" value="<?php echo $user[0]->alamat; ?>">
											<input  type="hidden" value="152" name="origin" id="origin">
										</div> 
										
										<?php if($xx!=0){ ?>
										<div class="single-input">
										<label>Pilih Provinsi</label>
										<select class="form-control" name="propinsi_tujuan" id="propinsi_tujuan" style="font-size: 16px;" required>
						<option value="" selected="" disabled="">Pilih Provinsi</option>
						<?php $this->load->view('rajaongkir/getProvince'); ?>
					</select>
									</div> <!-- /.single-input -->
									
									<div class="single-input">
										<label>Pilih Kota</label>
					<select class="form-control" name="destination" id="destination" style="font-size: 16px;" required>
						<option value="" selected="" disabled="">Pilih Kota</option>
					</select>
									</div> <!-- /.single-input -->
									<?php } ?>
										
										<div class="single-input">
											<label>Kode POS</label>
											<input type="text" placeholder="Masukan Kode POS" name="kodepos" value="<?php echo $user[0]->kode_pos; ?>" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
										</div> 
										
										<?php if($xx!=0){ ?>
										<div class="single-input">
										<label>Pilih Dukungan Pengiriman</label>
					<select class="form-control" name="pengiriman" id="pengiriman" style="font-size: 16px;" required>
						<option value="" selected="" disabled="">Pilih Dukungan Pengiriman</option>
					</select>
									</div> <!-- /.single-input -->
										<?php } ?>
					
					
						<div class="single-input">
											<label>Catatan Pesanan</label>
											<input type="text" placeholder="Masukan Catatan Pesanan" name="catatan" >
										</div> 
					<input  type="hidden"name="tujuan_provinsi" id="tujuan_provinsi">
					<input  type="hidden"name="tujuan_kota" id="tujuan_kota">
					
					<input  type="hidden"name="tipe_cart" value="<?php echo $xx; ?>" id="tipe_cart">
					
					
						<a href="<?php echo site_url(); ?>cart" class="theme-solid-button theme-button float-left" style="background:red;">Kembali</a>
						<button class="theme-solid-button theme-button float-right" style="color:black;font-weight:600;" >Lanjut Ke Metode Pembayaran</button>
							<?php echo form_close(); ?>
								
								
								</div> <!-- /.theme-form-style-one -->
							</div> <!-- /.col- -->
							
							
						</div>
						
						
						
						
	

					
					</div> <!-- /.container -->
					
					<div class="container">
		

		<div class="row">
			

			
		</div>
	</div>
			</div>
			

<?php $this->load->view('index/footer'); ?>


	  
	        <!-- Scroll Top Button -->
			<button class="scroll-top tran3s">
				<i class="fa fa-angle-up" aria-hidden="true"></i>
			</button>

			
			


		<!-- Js File_________________________________ -->

		<!-- j Query -->
		<script src="<?php echo site_url(); ?>/assets/js/JQuery.min.js"></script>
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
		
		<script>
$(document).ready(function(){

	

	$("#propinsi_tujuan").click(function(){
		$.post("http://hugaf.com/project/ongkirkuy/index.php/rajaongkir/getCity/"+$('#propinsi_tujuan').val(),function(obj){
			$('#destination').html(obj);
			$('#pengiriman').html('');
		});
			
	});
	
	$("#propinsi_tujuan").on('change', function() {
		$.post("http://hugaf.com/project/ongkirkuy/index.php/rajaongkir/getCity/"+$('#propinsi_tujuan').val(),function(obj){
			$('#destination').html(obj);
			$('#pengiriman').html('');
		});
		
	})
	
	$("#destination").click(function(){
		
						 var w = '152';
					      var x = $('#destination').val();
					      var y = <?php echo $berat; ?>;
					      var z = 'jne';

						  if(x!=null){
					      $.ajax({
					          url: "<?php echo site_url(); ?>rajaongkir/getCost",
					          type: "GET",
					          data : {origin: w, destination: x, berat: y, courier: z},
					          success: function (ajaxData){
					              //$("#hasil").html(ajaxData);
								  $('#pengiriman').html(ajaxData);
					          }
					      });
						  
						  var t_p1 = $("#propinsi_tujuan option:selected").text();
							var t_k1 = $("#destination option:selected").text();
		 $('#tujuan_provinsi').val(t_p1);
		 $('#tujuan_kota').val(t_k1);
						  }
			
	});
	
	$("#destination").on('change', function() {
			 var w = '152';
					      var x = $('#destination').val();
					      var y = 100;
					      var z = 'jne';

						  if(x!=null){
					      $.ajax({
					          url: "<?php echo site_url(); ?>rajaongkir/getCost",
					          type: "GET",
					          data : {origin: w, destination: x, berat: y, courier: z},
					          success: function (ajaxData){
					              //$("#hasil").html(ajaxData);
								  $('#pengiriman').html(ajaxData);
					          }
					      });
						  
						  var t_p1 = $("#propinsi_tujuan option:selected").text();
							var t_k1 = $("#destination option:selected").text();
		 $('#tujuan_provinsi').val(t_p1);
		 $('#tujuan_kota').val(t_k1);
						  }
		
	})
	
	
	
	$("#pengiriman").on('change', function() {
		var t_p = $("#propinsi_tujuan option:selected").text();
		var t_k = $("#destination option:selected").text();
		 $('#tujuan_provinsi').val(t_p);
		 $('#tujuan_kota').val(t_k);
		
	})
			

	/*
	$("#cari").click(function(){
		$.post("http://localhost/ongkirkuy/index.php/rajaongkir/getCost/"+$('#origin').val()+'&dest='+$('#destination').val()+'&berat='+$('#berat').val()+'&courier='+$('#courier').val(),function(obj){
			$('#hasil').html(obj);
		});
	});

	*/

	
});
</script>
		</div> <!-- /.main-page-wrapper -->
	</body>
</html>