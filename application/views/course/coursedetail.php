<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<!-- For IE -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<!-- For Resposive Device -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<title><?php echo $course[0]->title; ?> | <?php echo $title; ?></title>

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
				<div class="opacity"   style="padding: 10px 0 10px 0;">
					<ul>
						<li><a href="<?php echo site_url(); ?>" style="font-size:14px;color:#fff;">Beranda</a> /</li>
						<li><h3 style="font-size:18px;color:#fff;">Kursus</h3></li>
					</ul>
				</div> <!-- /.opacity -->
			</div> <!-- /.theme-inner-banner -->
		
<!-- 
			=============================================
				Course Details
			============================================== 
			-->
			<div class="course-details section-margin-top section-margin-bottom" style="margin-top:20px;">
				<div class="container">
					<div class="row">
						<div class="col-md-offset-1 col-xs-10 course-details-content">
						<div class="image" align="center">
							<img src="<?php echo site_url()."upload/images/".$course[0]->gambar; ?>" alt="" style="width:870px;height:472px;align:center;">
							</div>
							<div class="course-info-data">
								<div class="clearfix">
									<h2 class="float-left"> <?php echo $course[0]->title; ?></h2>
									<ul class="float-right course-value">
										<li style="width:188px;">Rp.<?php echo number_format($course[0]->harga , 0, ',', '.'); ?></li>
									</ul>
								</div>
								<?php 
									$s = $this->Index_model->getUserEmail($course[0]->author)->result();
								?>
								<div class="clearfix bottom-content">
									<ul class="course-schedule float-left">
										<li>Durasi Belajar : <?php echo $course[0]->durasi; ?> Jam</li>
										<li>Instruktur : <?php echo $s[0]->nama_lengkap; ?></li>
										<li>Email Instruktur : <?php echo $s[0]->email; ?></li>
										<li>Telepon Instruktur : <?php echo $s[0]->nomor_handphone; ?></li>
									</ul>
									<?php if(count($course_access)!=0) {?>
									<a class="btn float-right theme-line-button" data-toggle="collapse" href="#collapse1" data-target="#collapse1">Lihat Kurikulum</a>
									<?php }else{ ?>
									 <?php echo form_open_multipart('cart/tambah', array(
    'enctype' => 'multipart/form-data'
)); ?>
									<input type="hidden" name="id" value="<?php echo $course[0]->id; ?>" />
									<input type="hidden" name="nama" value="<?php echo $course[0]->title; ?>" />
									<input type="hidden" name="harga" value="<?php echo $course[0]->harga; ?>" />
									<input type="hidden" name="gambar" value="<?php echo $course[0]->gambar; ?>" />
									<input type="hidden" name="qty" value="1" />
									<input type="hidden" name="berat" value="0" />
									<input type="hidden" name="type" value="2" />
									<input class="btn float-right theme-line-button" type="submit" value="Beli Course Ini">
									<?php echo form_close(); ?>
									<?php } ?>
								</div>
								
							</div> <!-- /.course-info-data -->

							<div class="course-description">
								<h5>Deskripsi Course</h5>
								<p><?php echo $course[0]->description; ?></p>
								
							</div> <!-- /.course-description -->

							<div class="course-panel">
								<div class="panel-group theme-accordion" id="accordion">
								    <div class="panel">
									    <div class="panel-heading">
									      <h5 class="panel-title">
									        <a data-toggle="collapse" href="#collapse1" data-target="#collapse1">
									        Section / Kurikulum</a>
									      </h5>
									    </div>
									    <div id="collapse1" class="collapse">
										    <div class="panel-body">
										    	<div class="course-preview-text">
												<?php
													$no=1;
												foreach($course_section as $cs){ ?>
										    		<div class="course-figure">
													
										    			<h5><?php echo $no; ?>. <?php echo $cs->title; ?></h5>
														<?php if(count($course_access)!=0) {?>
										    			<p><?php echo $cs->konten; ?> </p>
										    			<div class="single-course">
										    				<ul>
										    					<li>Video Section <?php echo $no; ?></li>
										    					<li><a data-fancybox href="<?php echo $cs->video; ?>" class="play-button">Lihat Video</a></li>
										    					<li></li>
										    				</ul>
										    				</div> <!-- /.single-course -->
										    			<?php }else{ ?>
														<p>Anda tidak memiliki akses untuk melihat kurikulum ini, silahkan melakukan pembelian untuk course ini terlebih dahulu. </p>
														<?php } ?>
										    		</div> <!-- /.course-figure -->
												<?php $no++;} ?>	
										    	</div> <!-- /.course-preview-text -->
												
										    </div>
									    </div>
								  	</div> <!-- /panel 1 -->
								    <div class="panel">
									    <div class="panel-heading">
									      <h5 class="panel-title">
									        <a  data-toggle="collapse" href="#collapse2" data-target="#collapse2">
									         Instruktur</a>
									      </h5>
									    </div>
									    <div id="collapse2" class="collapse">
									      	<div class="panel-body">
											    <div class="instructor-panel">
											      	<div class="row">
											      		<div class="col-sm-3 col-xs-12 name">
											      			<img src="images/course/5.jpg" alt="">
											      		</div> <!-- /.name -->
											      		<div class="col-sm-5 col-xs-12">
											      			<div class="instructor-info">
															
											      				<h5>Hubungi Instruktur</h5>
											      				<p>If you have questions or wish to schedule </p>
																<h5><?php echo $s[0]->nama_lengkap; ?></h5>
											      				<a href="#"><?php echo $s[0]->email; ?></a>
											      				<a href="#"><?php echo $s[0]->nomor_handphone; ?></a>
											      			</div>
											      		</div> <!-- /.col- -->
											      		<div class="col-sm-4 col-xs-12 teachers">
											      			<ul>
											      			</ul>
											      		</div>
											      	</div> <!-- /.row -->
											      
											    </div> <!-- /.instructor-panel -->
									      	</div>
									    </div>
								    </div> <!-- /panel 2 -->
									 <div class="panel">
									    <div class="panel-heading">
									      <h5 class="panel-title">
									        <a  data-toggle="collapse" href="#collapse3" data-target="#collapse3">
									         Komentar</a>
									      </h5>
									    </div>
									    <div id="collapse3" class="collapse">
									      	<div class="panel-body">
											    <div class="row">
						<div class="col-lg-9 col-md-8 col-xs-12 blog-details-content">
								    	<div class="comment-form">
								<h5 class="sub-heading" style="padding:0px;padding-bottom:10px;">Tambahkan Komentar Anda</h5>
								<?php echo form_open('course/comment', array(
    'autocomplete' => 'off'
)); ?>
									<div class="row">
										<div class="col-sm-6 col-xs-12">
											<textarea name="isi" placeholder="Isi Komentar Anda" style="margin: 0px 0px 25px; height: 93px; width: 331px;"></textarea>
											<input type="hidden" name="id" value="<?php echo $course[0]->id; ?>">
										</div>
										<div class="col-sm-4 col-xs-12">
											<button class="theme-solid-button">Submit</button>
										</div>
									</div>
									<?php echo form_close(); ?>
							</div> <!-- /.comment-form -->
							
							<div class="user-comment-data">
								<?php foreach($course_comments as $pc){
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
								    </div> <!-- /panel 2 -->
									
									
									
									
								</div> <!-- end #accordion -->
							</div> <!-- End of .course-panel -->
						</div> <!-- /.course-details-content -->

						
					</div> <!-- /.row -->
				</div> <!-- /.container -->
			</div> <!-- /.course-details -->
	
			

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