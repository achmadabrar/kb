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

		foreach ($carts as $item)
			{
				$grand_total = $grand_total + ($item->harga * $item->quantity);
			}	
?>

							
							
									<h3>Konfirmasi Pembayaran</h3>
									
	

	<section class="section">
		<div class="container">
			<div class="columns">
				<div class="column is-8 is-offset-2">
					
						
						<div class="table-responsive">
							<table class="table is-fullwidth is-striped is-bordered">
								<thead>
									<tr>
										<th colspan="4" class="has-text-centered">Pembayaran</th>
									</tr>
									<tr>
										<th width="1%">No.</th>
										<th width="35%">Produk</th>
										<th width="10%">Harga</th>
										<th width="5%">Qty</th>
										<th width="10%">Tipe</th>
										<th width="20%">Jumlah</th>
									</tr>
								</thead>
								<tbody>
									
									
									<?php
$grand_totals = 0;
$i = 1;

foreach($carts as $item){
$grand_totals = $grand_totals + ($item->harga * $item->quantity);
?>
<tr>
<td><?php echo $i++; ?></td>
<td><?php echo $item->nama; ?></td>
<td><?php echo number_format($item->harga, 0,",","."); ?></td>
<td><?php echo $item->quantity;?></td>
<td><?php if($item->tipe==1){echo "Produk Fisik";}else{echo "Produk Virtual";} ?></td>
<td><b>Rp.<?php echo number_format($item->harga*$item->quantity, 0,",","."); ?></b></td>
</tr>
<?php 
}
$total_keseluruhan = $grand_totals+preg_replace('/[^0-9]/', '', $cart_pengiriman);

?>

<tr>
<td colspan="3"></td>
<td colspan="2" align="right"><b>Ongkos Kirim :</b></td>
<td colspan="1" ><b>Rp.<?php echo number_format(preg_replace('/[^0-9]/', '', $cart_pengiriman), 0,",",".") ?> <?php if($cart_pengiriman!=''){ echo "(".preg_replace('/[^a-zA-Z]+/', '', $cart_pengiriman).")";} ?></b></td>
</tr>
<tr>
<td colspan="3"></td>
<td colspan="2" align="right"><b>Total Yang Harus Dibayar :</b></td>
<td colspan="1" ><b>Rp.<?php echo number_format($total_keseluruhan, 0,",",".") ?> </b></td>
</tr>

<tr>
<td colspan="9" align="right"><button id="pay-button" class="theme-solid-button theme-button float-right" style="color:black;font-weight:600;">Bayar</button>
</td>
</tr>
								</tbody>
							</table>
						</div>
					

					

					<hr>

					<a class="theme-solid-button theme-button " style="visibility: visible;background:red;color:white;" href="<?= base_url('cart/alamat_pengiriman') ?>"><i class="fa fa-arrow-left"></i>&nbsp; Cek Kembali</a>
						
						<?php echo form_open_multipart('cart/finish', array(
    'enctype' => 'multipart/form-data',
    'id' => 'payment-form',
    'method' => 'post',
)); ?>
						<input  type="hidden" name="tujuan_pengiriman" id="tujuan_pengiriman" value="<?php echo $cart_pengiriman; ?>">
						<input  type="hidden" name="tujuan_provinsi" id="tujuan_provinsi" value="<?php echo $cart_provinsi; ?>">
						<input  type="hidden" name="tujuan_kota" id="tujuan_kota" value="<?php echo $cart_kota; ?>">
						<input  type="hidden" name="tujuan_alamat" id="tujuan_alamat" value="<?php echo $cart_alamat; ?>">
						<input  type="hidden" name="tujuan_kodepos" id="tujuan_kodepos" value="<?php echo $cart_kodepos; ?>">
						    <input type="hidden" name="result_type" id="result-type" value=""></div>
      <input type="hidden" name="result_data" id="result-data" value=""></div>
    <?php echo form_close(); ?>
    
						
				
	</section>
								</div> <!-- /.theme-form-style-one -->
							</div> <!-- /.col- -->
							
						</div>
						
						
						
						
					
					</div> <!-- /.container -->
			</div>
			

<?php $this->load->view('index/footer'); ?>


	  
	        <!-- Scroll Top Button -->
			<button class="scroll-top tran3s">
				<i class="fa fa-angle-up" aria-hidden="true"></i>
			</button>

			
			


		<!-- Js File_________________________________ -->
<script type="text/javascript"
            src="https://app.sandbox.midtrans.com/snap/snap.js"
            data-client-key="SB-Mid-client-dnHKTLo9xBmh1t3-"></script>
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
		
	<script type="text/javascript">
  
    $('#pay-button').click(function (event) {
      event.preventDefault();
      $(this).attr("disabled", "disabled");
    
    $.ajax({
      url: '<?=site_url()?>cart/token',
      cache: false,

      success: function(data) {
        //location = data;

        console.log('token = '+data);
        
        var resultType = document.getElementById('result-type');
        var resultData = document.getElementById('result-data');

        function changeResult(type,data){
          $("#result-type").val(type);
          $("#result-data").val(JSON.stringify(data));
          //resultType.innerHTML = type;
          //resultData.innerHTML = JSON.stringify(data);
        }

        snap.pay(data, {
          
          onSuccess: function(result){
            changeResult('success', result);
            console.log(result.status_message);
            console.log(result);
            $("#payment-form").submit();
          },
          onPending: function(result){
            changeResult('pending', result);
            console.log(result.status_message);
            $("#payment-form").submit();
          },
          onError: function(result){
            changeResult('error', result);
            console.log(result.status_message);
            $("#payment-form").submit();
          }
        });
      }
    });
  });

  </script>
		</div> <!-- /.main-page-wrapper -->
	</body>
</html>