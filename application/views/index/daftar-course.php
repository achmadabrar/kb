<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<!-- For IE -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<!-- For Resposive Device -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<title>Daftar Course | <?php echo $title; ?></title>

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
						 <div class="datatables-example-heading">
                             <h3>Daftar Akses Course</h3>
                           </div>
                            <div class="table-responsive advance-table">
                              <table id="button_datatables_example" class="table display table-striped table-bordered">
                                 <thead>
                                    <tr>
                                       <th>No</th>
                                       <th>Foto</th>
                                       <th>Course</th>
                                       <th>Aksi</th>
                                    </tr>
                                 </thead>
                                 <tbody>
								 <?php 
								 $x=1;
								 foreach($course as $a){
									$c = $this->Course_model->getCourseID($a->id_produk)->result();
								 ?>
                                    <tr>
										<td><?php echo $x++; ?></td>
										<td width="20%"><img src="<?php echo site_url()."upload/images/".$c[0]->gambar; ?>" alt="" style="width:100%;height:15%;"></td>
										<td><?php echo $c[0]->title; ?></td>
                                       <td>
									   <a href="<?php echo site_url()."course/id/".$a->id_produk; ?>" >Lihat Course</a>
									   </td>
                                    </tr>
                                 <?php } ?>
                                
                                 </tbody>
                              </table>
                           </div>
                        </div>
							
							
						</div> <!-- /.blog-list-content -->

					</div> <!-- /.row -->
				</div> <!-- /.container -->
			</div> <!-- /.blog-list -->
		


 

		

		

			

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