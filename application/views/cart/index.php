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
					if(count($carts)==0){
				echo "<h4>Keranjang Kosong</h4><br>";
				echo "<a href='".base_url()."product' class='theme-solid-button theme-button ' style='visibility: visible;background:#ddb496;color:black;font-weight:600;'>Lihat Produk</a>  ";
				echo "<a href='".base_url()."course' class='theme-solid-button theme-button ' style='visibility: visible;background:#ddb496;color:black;font-weight:600;'>Lihat Kursus</a>";

					}else{
					
					?>
<h4>Daftar Belanja</h4><br>
<table class="table">
<tr id= "main_heading">
<td width="2%">No</td>
<td width="10%">Foto Produk</td>
<td width="40%">Item</td>
<td width="15%">Harga</td>
<td width="5%">Qty</td>
<td width="20%">Tipe</td>
<td width="20%">Jumlah</td>
<td width="100%"></td>
<td width="100%"></td>
</tr>
<?php
// Create form and send all values in "shopping/update_cart" function.
$grand_total = 0;
$i = 1;

foreach($carts as $item){
$grand_total = $grand_total + ($item->harga * $item->quantity);
echo form_open_multipart('cart/perbarui', array(
    'enctype' => 'multipart/form-data'
)); 
?>


<input type="hidden" name="id" value="<?php echo $item->id;?>" />
<tr>
<td><?php echo $i++; ?></td>
<td><img class="img-responsive" src="<?php echo site_url(); ?>/upload/images/<?php echo $item->gambar; ?>"/></td>
<td><?php echo $item->nama; ?></td>
<td><?php echo number_format($item->harga, 0,",","."); ?></td>
<td><input type="text" class="form-control input-sm" name="quantity" value="<?php echo $item->quantity;?>" <?php if($item->tipe==2){echo "disabled";} ?> /></td>
<td><?php if($item->tipe==1){echo "Produk Fisik";}else{echo "Produk Virtual";} ?></td>
<td><?php echo number_format($item->harga*$item->quantity, 0,",",".") ?></td>
<td>
<a href="<?php echo base_url()?>cart/hapus/<?php echo $item->id;?>"><i class="fa fa-trash" aria-hidden="true"></i> Hapus</a>
</td>
<td>
<?php if($item->tipe==1){?>
<button class="theme-solid-button theme-button " style="visibility: visible;background:#ddb496;color:black;font-weight:600;" type="submit">Perbarui</button></td>
<?php } ?>
</tr>
<?php 
echo form_close();
}?>

<tr>
<td colspan="3"><h6><b>Total Harga (Belum hitung ongkir): Rp <?php echo number_format($grand_total, 0,",","."); ?></b></h6></td>
<td colspan="6" align="right">
<a href="<?php echo base_url()?>cart/alamat_pengiriman" class="theme-solid-button theme-button " style="visibility: visible;background:#ddb496;color:black;font-weight:600;">Lanjut Ke Metode Pengiriman</a><br>
<br>
<a href="<?php echo base_url()?>product" class="theme-solid-button theme-button " style="visibility: visible;background:#ddb496;color:black;font-weight:600;">Lanjut Belanja</a><br>

</td>
</tr>

</table>



  <!-- Modal Penilai -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-md">
      <!-- Modal content-->
      <div class="modal-content">
      	<form method="post" action="<?php echo base_url()?>shopping/hapus/all">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Konfirmasi</h4>
        </div>
        <div class="modal-body">
			Anda yakin mau mengosongkan Shopping Cart?
            
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Tidak</button>
          <button type="submit" class="btn btn-sm btn-default">Ya</button>
        </div>
        
        </form>
      </div>
      
    </div>
  </div>
  <!--End Modal-->
					
					
					
			<?php } ?>
					</div> <!-- /.container -->
			</div>
			

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