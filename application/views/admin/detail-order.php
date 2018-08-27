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
	   <style>
@media print{
   .noprint{
       display:none;
   }
}
				  </style>
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
                  <div class="row noprint">
                     <div class="col-md-12">
                        <div class="breadcromb-area">
                           <div class="row">
                              <div class="col-md-6  col-sm-6">
                                 <div class="seipkon-breadcromb-left">
                                    <h3>Detail Order</h3>
                                 </div>
                              </div>
                              <div class="col-md-6 col-sm-6">
                                 <div class="seipkon-breadcromb-right">
                                    <ul>
                                       <li><a href="<?php echo site_url(); ?>admin">home</a></li>
                                       <li>Detail Order</li>
                                    </ul>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- End Breadcromb Row -->
                   
                   
              <!-- Invoice Row Start -->
                  <div class="row">
				  
				 
				  <div class="col-md-4 noprint">
                                    <div class="panel panel-warning">
                                       <div class="panel-heading">Perbarui Order</div>
                                       <div class="panel-body">
                                           <?php echo form_open_multipart('admin/update_order', array(
    'enctype' => 'multipart/form-data'
)); ?>
					<form method="POST" autocomplete="off" id="nameform" enctype="multipart/form-data">
									    <div class="row">
                                          <div class="col-md-6">
                                             
                                                <label>Status Order</label>
                                                <select class="selectpicker-product select-pro" name="status_order" >
												<option value="Pending" <?php if($order[0]->status_order=='Pending'){echo "selected";} ?>>Pending</option>
												<option value="Diproses" <?php if($order[0]->status_order=='Diproses'){echo "selected";} ?>>Diproses</option>
												<option value="Selesai" <?php if($order[0]->status_order=='Selesai'){echo "selected";} ?>>Selesai</option>
												<option value="Dibatalkan" <?php if($order[0]->status_order=='Dibatalkan'){echo "selected";} ?>>Dibatalkan</option>
												
                                                </select>
                                             
                                          </div>
										  
                                       </div>
									   <br>
									    <div class="page-editor-box">
                                          <label>Nomor Resi</label>
                                          <input type="text" placeholder="Masukan Nomor Resi Pengiriman" name="nomor_resi" value="<?php echo $order[0]->nomor_resi; ?>" >
                                       </div>
									  
									   <br>
									   <div class="page-editor-box">
                                          <label>Note</label>
                                          <input type="text" placeholder="Masukan Note" name="note" value="<?php echo $order[0]->note; ?>" >
                                          <input type="hidden" name="id" value="<?php echo $order[0]->id; ?>" required>
                                       </div>
									  
									   <br>
									   
                                       <p>
										   <input type="submit" value="perbarui status" class="btn btn-warning" style="color:white;">
                                                <a href="<?php echo site_url(); ?>admin/daftar_order" class="btn btn-danger" >
                                                <i class="fa fa-times"></i>
                                                Kembali
                                                </a>
                                       </p>
									   </form>
					<?php echo form_close(); ?>
									   </div>
                                    </div>
                                 </div>
				   
                     <div class="col-md-12">
                        <div class="page-box">
                           <div class="invoice-box">
                              <h4 class="invoice-status"><?php echo $order[0]->status_order; ?></h4>
                              <div class="invoice-head">
                                 <h2>Order ID: #<?php echo $order[0]->id; ?></h2>
                              </div>
                              <div class="invoice-address">
                                 <div class="row">
                                    <div class="col-md-6 col-sm-6">
                                       <div class="invoice-company-address">
                                          <h3>Informasi Pembeli :</h3>
                                          <p>Nama : <?php echo $order[0]->id; ?></p>
                                          <p>Telepon : <?php echo $order[0]->id; ?></p>
                                          <p>Email : <?php echo $order[0]->email; ?></p>
                                          <p>Alamat : <?php echo $order[0]->alamat; ?></p>
                                          <p>Provinsi : <?php echo $order[0]->provinsi; ?></p>
                                          <p>Kota : <?php echo $order[0]->kota; ?></p>
                                          <p>Kode Pos : <?php echo $order[0]->kodepos; ?></p>
                                       </div>
                                    </div>
									<div class="col-md-6 col-sm-6">
                                       <div class="billed-to-address">
                                          <h3>Informasi Order</h3>
                                          <p>ID Transaksi Midtrans : <?php echo $order[0]->midtrans_id; ?></p>
                                          <p>Status Pembayaran Midtrans : <?php echo $order[0]->status_pembayaran; ?></p>
                                          <p>Tanggal Order : <?php echo $order[0]->tanggal_order; ?></p>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="invoice-table">
                                 <div class="table-responsive">
                                    <table class="table table-bordered">
                                       <thead>
                                          <tr>
                                             <th>No</th>
                                             <th>Produk</th>
                                             <th>Tipe Produk</th>
                                             <th>quantity</th>
                                             <th>Harga Satuan</th>
                                             <th>Harga</th>
                                          </tr>
                                       </thead>
                                       <tbody>
									   <?php 
									   $i=1;
									   $grand_totals=0;
									   foreach($order_details as $x){ 
									   $grand_totals = $grand_totals + ($x->harga * $x->quantity);
									   ?>
									   
									   <?php if($x->tipe==1){ 
											$produk = $this->Admin_model->getProductID($x->id_produk)->result();
											$nama_produk = $produk[0]->title;
									   
									   ?>
									    <tr>
                                             <td><?php echo $i++; ?></td>
                                             <td><?php echo $nama_produk; ?></td>
                                             <td><?php if($x->tipe==1){echo "Produk Fisik";}else{ echo "Produk Virtual";} ?></td>
                                             <td><?php echo $x->quantity; ?></td>
                                             <td>Rp.<?php echo number_format($x->harga, 0,",","."); ?></td>
                                            <td>Rp.<?php echo number_format($x->quantity*$x->harga, 0,",","."); ?></td>
                                          </tr>
									   <?php } else if($x->tipe==2){ 
											$produk = $this->Admin_model->getCourseID($x->id_produk)->result();
											$nama_produk = $produk[0]->title;
									   
									   ?>
									    <tr>
                                             <td><?php echo $i++; ?></td>
                                             <td><?php echo $nama_produk; ?></td>
											 <td><?php if($x->tipe==1){echo "Produk Fisik";}else{ echo "Produk Virtual";} ?></td>
                                             <td><?php echo $x->quantity; ?></td>
                                             <td>Rp.<?php echo number_format($x->harga, 0,",","."); ?></td>
                                             <td>Rp.<?php echo number_format($x->quantity*$x->harga, 0,",","."); ?></td>
                                          </tr>
									   <?php } ?>
                                         
										  <?php
											}
											$total_keseluruhan = $grand_totals+preg_replace('/[^0-9]/', '', $order[0]->pengiriman);
										  ?>
                                          
                                       </tbody>
                                    </table>
                                 </div>
                              </div>
                              <div class="invoice-footer-note">
                                 <div class="row">
                                    <div class="col-md-8 col-sm-8">
                                       <div class="invoice-note">
                                          <h4>Note :</h4>
                                          <p><?php echo $order[0]->note; ?></p>
                                       </div>
                                    </div>
									<div class="col-md-8 col-sm-8">
                                       <div class="invoice-note">
                                          <h4>Nomor Resi Pengiriman :</h4>
                                          <p><?php echo $order[0]->nomor_resi; ?></p>
                                       </div>
                                    </div>
                                    <div class="col-md-4 col-sm-4">
                                       <div class="invoice-subtotal">
                                          <p><span>Sub-Total:</span> Rp.<?php echo number_format($grand_totals, 0,",","."); ?></p>
                                          <p><span>Ongkos Kirim:</span> Rp.<?php echo number_format(preg_replace('/[^0-9]/', '', $order[0]->pengiriman), 0,",","."); ?> (<?php echo preg_replace('/[^a-zA-Z]+/', '', $order[0]->pengiriman); ?>)</p>
                                          <h3>Rp.<?php echo number_format($total_keseluruhan, 0,",",".") ?></h3>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="invoice-action noprint">
                                 <div class="row">
                                    <div class="col-md-12">
                                       <ul>
                                          <li><a href="#" onclick="window.print();" data-toggle="tooltip" title="Print"><i class="fa fa-print"></i></a></li>
                                       </ul>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                   
                   
                 
                   
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