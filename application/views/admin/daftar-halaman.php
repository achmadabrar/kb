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
                                    <h3>Daftar Halaman</h3>
                                 </div>
                              </div>
                              <div class="col-md-6 col-sm-6">
                                 <div class="seipkon-breadcromb-right">
                                    <ul>
                                       <li><a href="<?php echo site_url(); ?>admin">home</a></li>
                                       <li>daftar halaman</li>
                                    </ul>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- End Breadcromb Row -->
                   
                   
                  <!-- Advance Table Row Start -->
                  <div class="row">
				 
                     <div class="col-md-12">
                        <div class="page-box">
						 <div class="datatables-example-heading">
                               <a href="<?php echo site_url()."admin/tambah_halaman/";?>" class="btn btn-warning btn-rounded">Tambah Halaman</a>
                           </div>
                            <div class="table-responsive advance-table">
                              <table id="button_datatables_example" class="table display table-striped table-bordered">
                                 <thead>
                                    <tr>
                                       <th>No</th>
                                       <th>ID Halaman</th>
                                       <th>Judul Halaman</th>
                                       <th>Penulis</th>
                                       <th>Tanggal Terbit</th>
                                       <th>Aksi</th>
                                    </tr>
                                 </thead>
                                 <tbody>
								 <?php 
								 $x=1;
								 foreach($halaman as $a){ ?>
                                    <tr>
										<td><?php echo $x++; ?></td>
										<td><?php echo $a->id; ?></td>
										<td><?php echo $a->title; ?></td>
                                       <td style="text-transform: lowercase;"><?php echo $a->author_email; ?></td>
                                       <td><?php echo $a->timestamp; ?></td>
                                       <td>
									   <a href="<?php echo site_url()."admin/edit_halaman/".$a->id; ?>" class="btn btn-warning btn-rounded">Edit</a>
									   <a href="<?php echo site_url()."admin/hapus_halaman/".$a->id; ?>" class="btn btn-danger btn-rounded">Hapus</a>
									   
									   </td>
                                    </tr>
                                 <?php } ?>
                                
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- End Advance Table Row -->
                   
                 
                   
                   
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
      <!-- Perfect Scrollbar JS -->
      <script src="<?php echo site_url(); ?>/assetsbackend/plugins/perfect-scrollbar/jquery-perfect-scrollbar.min.js"></script>
      <!-- Vue JS -->
      <script src="<?php echo site_url(); ?>/assetsbackend/plugins/vue/vue.min.js"></script>
      <!-- Summernote JS -->
      <script src="<?php echo site_url(); ?>/assetsbackend/plugins/summernote/js/summernote.js"></script>
      <script src="<?php echo site_url(); ?>/assetsbackend/plugins/summernote/js/custom-summernote.js"></script>
     <script src="<?php echo site_url(); ?>/assetsbackend/js/advance_table_custom.js"></script>
      <!-- Custom JS -->
      <script src="<?php echo site_url(); ?>/assetsbackend/js/seipkon.js"></script>
   </body>
</html>