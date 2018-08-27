<!DOCTYPE html>
<html lang="en">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="description" content="Backend Kitong Bisa" />
      <meta name="keywords" content="" />
      <meta name="author" content="Hugaf">
      <!-- Title -->
      <title>Backend | Kitong Bisa</title>
      <!-- Favicon -->
      <link rel="icon" type="image/png" sizes="32x32" href="<?php echo site_url(); ?>/assetsbackend/img/favicon/favicon-32x32.png">
      <!-- Animate CSS -->
      <link rel="stylesheet" href="<?php echo site_url(); ?>/assetsbackend/css/animate.min.css">
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="<?php echo site_url(); ?>/assetsbackend/plugins/bootstrap/bootstrap.min.css">
      <!-- Font awesome CSS -->
      <link rel="stylesheet" href="<?php echo site_url(); ?>/assetsbackend/plugins/font-awesome/font-awesome.min.css">
      <!-- Themify Icon CSS -->
      <link rel="stylesheet" href="<?php echo site_url(); ?>/assetsbackend/plugins/themify-icons/themify-icons.css">
      <!-- Perfect Scrollbar CSS -->
      <link rel="stylesheet" href="<?php echo site_url(); ?>/assetsbackend/plugins/perfect-scrollbar/perfect-scrollbar.min.css">
      <!-- Jvector CSS -->
      <link rel="stylesheet" href="<?php echo site_url(); ?>/assetsbackend/plugins/jvector/css/jquery-jvectormap.css">
      <!-- Daterange CSS -->
      <link rel="stylesheet" href="<?php echo site_url(); ?>/assetsbackend/plugins/daterangepicker/css/daterangepicker.css">
      <!-- Bootstrap-select CSS -->
      <link rel="stylesheet" href="<?php echo site_url(); ?>/assetsbackend/plugins/bootstrap-select/css/bootstrap-select.min.css">
      <!-- Summernote CSS -->
      <link rel="stylesheet" href="<?php echo site_url(); ?>/assetsbackend/plugins/summernote/css/summernote.css">
	  <!-- DataTables CSS -->
      <link rel="stylesheet" href="<?php echo site_url(); ?>/assetsbackend/plugins/datatables/css/dataTables.bootstrap.min.css" >
      <link rel="stylesheet" href="<?php echo site_url(); ?>/assetsbackend/plugins/datatables/css/buttons.bootstrap.min.css" >
      <link rel="stylesheet" href="<?php echo site_url(); ?>/assetsbackend/plugins/datatables/css/responsive.bootstrap.min.css" >
      <!-- Main CSS -->
      <link rel="stylesheet" href="<?php echo site_url(); ?>/assetsbackend/css/seipkon.css">
      <!-- Responsive CSS -->
      <link rel="stylesheet" href="<?php echo site_url(); ?>/assetsbackend/css/responsive.css">
   </head>
   <body>
       
      <!-- Start Page Loading -->
      <div id="loader-wrapper">
         <div id="loader"></div>
         <div class="loader-section section-left"></div>
         <div class="loader-section section-right"></div>
      </div>
      <!-- End Page Loading -->
       
      <!-- Wrapper Start -->
      <div class="wrapper">
         <!-- Main Header Start -->
         <header class="main-header">
             
            <!-- Logo Start -->
            <div class="seipkon-logo">
               <a href="<?php echo site_url(); ?>admin">
               <img src="<?php echo site_url(); ?>/assetsbackend/img/logo.png" alt="logo">
               </a>
            </div>
            <!-- Logo End -->
             
            <!-- Header Top Start -->
            <nav class="navbar navbar-default">
               <div class="container-fluid">
                  <div class="header-top-section">
                     <div class="pull-left">
                         
                        <!-- Collapse Menu Btn Start -->
                        <button type="button" id="sidebarCollapse" class=" navbar-btn">
                        <i class="fa fa-bars"></i>
                        </button>
                        <!-- Collapse Menu Btn End -->
                         
                       
                         
                     </div>
                     <div class="header-top-right-section pull-right">
                        <ul class="nav nav-pills nav-top navbar-right">
                            
                           <!-- Full Screen Btn Start -->
                           <li>
                              <a href="#"  id="fullscreen-button">
                              <i class="fa fa-arrows-alt"></i>
                              </a>
                           </li>
                           <!-- Full Screen Btn End -->
                            
                           <!-- Notification Toggle Start --><!--
                           <li class="dropdown">
                              <a class="dropdown-toggle cart-icon" href="#" data-toggle="dropdown">
                              <i class="fa fa-bell-o"></i>
                              <span>1</span>
                              </a>
                              <div class="notification-box dropdown-menu animated bounceIn">
                                 <div class="notification-header">
                                    <h4>1 new notification</h4>
                                    <a href="#">clear all</a>
                                 </div>
                                 <div class="notification-body">
                                    <ul>
                                    
                                       </li>
                                       <li>
                                          <a href="#" class="single-notification">
                                             <div class="notification-img bg_green">
                                                <i class="fa fa-check"></i>
                                             </div>
                                             <div class="notification-txt">
                                                <h4>Successful transaction of $210</h4>
                                                <span>1 minutes ago</span>
                                             </div>
                                          </a>
                                       </li>
                                      
                                     
                                     
                                   
                                    </ul>
                                 </div>
                                 <div class="notification-footer">
                                    <a href="#"><i class="fa fa-angle-down"></i>see all notification</a>
                                 </div>
                              </div>
                           </li>
                           <!-- Notification Toggle End --> -->
                            
                           <!-- Profile Toggle Start -->
                           <li class="dropdown">
                              <a class="dropdown-toggle profile-toggle" href="#" data-toggle="dropdown">
                                 <img src="<?php echo site_url(); ?>/upload/images/<?php echo $this->session->userdata('foto'); ?>" class="profile-avator" alt="admin profile" />
                                 <div class="profile-avatar-txt">
                                    <p><?php echo $this->session->userdata('nama_lengkap'); ?></p>
                                    <i class="fa fa-angle-down"></i>
                                 </div>
                              </a>
                              <div class="profile-box dropdown-menu animated bounceIn">
                                 <ul>
                                    <li><a href="<?php echo site_url(); ?>admin/konfigurasi"><i class="fa fa-wrench"></i> Konfigurasi Website</a></li>
                                    <li><a href="<?php echo site_url(); ?>index/logout"><i class="fa fa-power-off"></i> Log Out</a></li>
                                 </ul>
                              </div>
                           </li>
                           <!-- Profile Toggle End -->
                            
                        </ul>
                     </div>
                  </div>
               </div>
            </nav>
            <!-- Header Top End -->
             
         </header>
         <!-- Main Header End -->
          
         <!-- Sidebar Start -->
         <aside class="seipkon-main-sidebar">
            <nav id="sidebar">
               <!-- Sidebar Profile Start -->
               <div class="sidebar-profile clearfix">
                  <div class="profile-avatar">
                     <img src="<?php echo site_url(); ?>/upload/images/<?php echo $this->session->userdata('foto'); ?>" alt="profile" />
                  </div>
                  <div class="profile-info">
                     <h6><?php echo $this->session->userdata('email'); ?></h6>
                     <p>Welcome Admin !</p>
                  </div>
               </div>
               <!-- Sidebar Profile End -->
                
               <!-- Menu Section Start -->
               <div class="menu-section">
                <?php $this->load->view('backendmenu/menu'); ?>
               </div>
               <!-- Menu Section End -->
                
              
                
             
                
            </nav>
         </aside>
         <!-- End Sidebar -->
          
         <!-- Right Side Content Start -->
         <section id="content" class="seipkon-content-wrapper">
            <div class="page-content">
               <div class="container-fluid">
                  
                  <!-- Breadcromb Row Start -->
                  <div class="row">
                     <div class="col-md-12">
                        <div class="breadcromb-area">
                           <div class="row">
                              <div class="col-md-6  col-sm-6">
                                 <div class="seipkon-breadcromb-left">
                                    <h3>Tambah Produk</h3>
                                 </div>
                              </div>
                              <div class="col-md-6 col-sm-6">
                                 <div class="seipkon-breadcromb-right">
                                    <ul>
                                       <li><a href="<?php echo site_url(); ?>admin">home</a></li>
                                       <li>Tambah Produk</li>
                                    </ul>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- End Breadcromb Row -->
                   
                   
               <!-- Create Page Row Start -->
                  <div class="row">
                     <div class="col-md-12">
                        <div class="page-box">
                           <div class="row">
                              <div class="col-md-9">
                                 <div class="create-page-left">
                                     <?php echo form_open_multipart('admin/insert_product', array(
    'enctype' => 'multipart/form-data'
)); ?>
					<form method="POST" autocomplete="off" id="nameform" enctype="multipart/form-data">
                                       <p>
                                          <label>Nama Produk</label>
                                          <input type="text" placeholder="Masukan Nama Produk" name="title" maxlength="20" required>
                                       </p>
									    <div class="row">
                                          <div class="col-md-6">
                                             <p>
                                                <label>Kategori Produk</label>
                                                <select class="selectpicker-product select-pro" name="kategori" >
												<?php 
												foreach($kategori as $k){
												?>
												<option value="<?php echo $k->id; ?>"><?php echo $k->nama; ?></option>
												<?php
												}
												?>
                                                </select>
                                             </p>
                                          </div>
										  
                                       </div>
									   <br>
                                       <div class="page-editor-box">
                                          <label>Deskripsi</label>
										   <input type="text" placeholder="Masukan Deskripsi" name="deskripsi" maxlength="150" required>
                                       </div>
									   <br>
									    <div class="page-editor-box">
                                          <label>Deskripsi Tambahan</label>
                                          <textarea id="page-editor" name="deskripsi_tambahan" class="note-codable"></textarea>
                                       </div>
									   <div class="row">
                                          <div class="col-md-6">
                                             <p>
                                               <label>Foto Produk</label>
                                                 <div class="product-upload btn btn-info">
                                             <i class="fa fa-upload"></i>
                                             Upload Image Minimal Ukuran (Width 470px - Height 417px)
                                             <input type="file" name="foto" accept="image/*" required>
                                          </div>
                                             </p>
                                          </div>
										  
                                       </div>
									   
									   <br>
									   
									   <div class="row">
                                          <div class="col-md-6">
                                             <p>
                                               <label>Foto Produk 2</label>
                                                 <div class="product-upload btn btn-info">
                                             <i class="fa fa-upload"></i>
                                             Upload Image Minimal Ukuran (Width 470px - Height 417px)
                                             <input type="file" name="foto2" accept="image/*" required>
                                          </div>
                                             </p>
                                          </div>
										  
                                       </div>
									   
									   <br>
									   
									   <div class="row">
                                          <div class="col-md-6">
                                             <p>
                                               <label>Foto Produk 3</label>
                                                 <div class="product-upload btn btn-info">
                                             <i class="fa fa-upload"></i>
                                             Upload Image Minimal Ukuran (Width 470px - Height 417px)
                                             <input type="file" name="foto3" accept="image/*" required>
                                          </div>
                                             </p>
                                          </div>
										  
                                       </div>
									   
									   <br>
									    <div class="page-editor-box">
                                          <label>Harga (tanpa titik)</label>
                                          <input type="text" placeholder="Masukan Harga (tanpa titik)" name="harga" required>
                                       </div>
									   <br>
									    <div class="page-editor-box">
                                          <label>Berat (gram)</label>
                                          <input type="text" placeholder="Masukan Berat (dalam Gram) contoh : 900" name="berat" required>
                                       </div>
									   
									   <br>
									   <div class="row">
                                          <div class="col-md-6">
                                             <p>
                                                <label>Stock</label>
                                                <select class="selectpicker-product select-pro" name="stock" >
												<option value="tersedia">Tersedia</option>
												<option value="tidak-tersedia">Tidak Tersedia</option>
                                                </select>
                                             </p>
                                          </div>
										  
                                       </div>
									   <br>
									   <div class="row">
                                          <div class="col-md-6">
                                             <p>
                                                <label>Produk Populer</label>
                                                <select class="selectpicker-product select-pro" name="populer" >
												<option value="1">Ya</option>
												<option value="0">Tidak</option>
                                                </select>
                                             </p>
                                          </div>
										  
                                       </div>
									   
									   
									   <br>
                                       <p>
										   <input type="submit" value="tambahkan produk" class="btn btn-warning" style="color:white;">
                                                <a href="<?php echo site_url(); ?>admin/daftar_produk" class="btn btn-danger" >
                                                <i class="fa fa-times"></i>
                                                Kembali
                                                </a>
                                       </p>
                                 </div>
                              </div>
                              
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- End Create Page Row -->
                   
                   
                 
                   
                   </form>
					<?php echo form_close(); ?>
               </div>
            </div>
             
            <!-- Footer Area Start -->
            <footer class="seipkon-footer-area">
               <p>Copyright <a href="https://kitongbisa.com">Kitong Bisa</a></p>
            </footer>
            <!-- End Footer Area -->
             
         </section>
         <!-- End Right Side Content -->
          
      </div>
      <!-- End Wrapper -->
       
       
      <!-- jQuery -->
      <script src="<?php echo site_url(); ?>/assetsbackend/js/jquery-3.1.0.min.js"></script>
      <!-- Bootstrap JS -->
      <script src="<?php echo site_url(); ?>/assetsbackend/plugins/bootstrap/bootstrap.min.js"></script>
      <!-- Bootstrap-select JS -->
      <script src="<?php echo site_url(); ?>/assetsbackend/plugins/bootstrap-select/js/bootstrap-select.min.js"></script>
      <!-- Daterange JS -->
      <script src="<?php echo site_url(); ?>/assetsbackend/plugins/daterangepicker/js/moment.min.js"></script>
      <script src="<?php echo site_url(); ?>/assetsbackend/plugins/daterangepicker/js/daterangepicker.js"></script>
      <!-- Jvector JS -->
      <script src="<?php echo site_url(); ?>/assetsbackend/plugins/jvector/js/jquery-jvectormap-1.2.2.min.js"></script>
      <script src="<?php echo site_url(); ?>/assetsbackend/plugins/jvector/js/jquery-jvectormap-world-mill-en.js"></script>
      <script src="<?php echo site_url(); ?>/assetsbackend/plugins/jvector/js/jvector-init.js"></script>
      <!-- Raphael JS -->
      <script src="<?php echo site_url(); ?>/assetsbackend/plugins/raphael/js/raphael.min.js"></script>
      <!-- Morris JS -->
      <script src="<?php echo site_url(); ?>/assetsbackend/plugins/morris/js/morris.min.js"></script>
      <!-- Sparkline JS -->
      <script src="<?php echo site_url(); ?>/assetsbackend/plugins/sparkline/js/jquery.sparkline.js"></script>
      <!-- Chart JS -->
      <script src="<?php echo site_url(); ?>/assetsbackend/plugins/charts/js/Chart.js"></script>
      <!-- Perfect Scrollbar JS -->
      <script src="<?php echo site_url(); ?>/assetsbackend/plugins/perfect-scrollbar/jquery-perfect-scrollbar.min.js"></script>
      <!-- Vue JS -->
      <script src="<?php echo site_url(); ?>/assetsbackend/plugins/vue/vue.min.js"></script>
      <!-- Summernote JS -->
      <script src="<?php echo site_url(); ?>/assetsbackend/plugins/summernote/js/summernote.js"></script>
	  
	  <script type="text/javascript">
	  $('#page-editor').summernote({
            callbacks: {
                    onImageUpload: function(files) {
                        uploadFile(files[0]);
                    }
                }
		});
		
		function uploadFile(file) {
            data = new FormData();
            data.append("file", file);

            $.ajax({
                data: data,
                type: "POST",
                url: "<?php echo site_url();?>upload/summer.php",
                cache: false,
                contentType: false,
                processData: false,
                success: function(url) {                                 
                 console.log(url);                                        
                 $('#page-editor').summernote("insertImage", url);
                }
            });
        }
	  </script>
	  
      <!-- Custom Select JS -->
      <script src="<?php echo site_url(); ?>/assetsbackend/plugins/bootstrap-select/js/custom-select.js"></script>
      <!-- Custom JS -->
      <script src="<?php echo site_url(); ?>/assetsbackend/js/seipkon.js"></script>
   </body>
</html>