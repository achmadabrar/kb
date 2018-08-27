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
      <title>Invoice Pembelian | Kitong Bisa</title>
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
        
          
         <!-- Right Side Content Start -->
         <section id="content" class="seipkon-content-wrapper" style="width:100%;padding-top:0px;">
            <div class="page-content" style="padding:5px;">
               <div class="container-fluid">
                  
                 
                  <!-- End Breadcromb Row -->
                   
                   
              <!-- Invoice Row Start -->
                  <div class="row">
				  
				   
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
            <footer class="seipkon-footer-area noprint">
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
	  
	  
	  
      <!-- Custom Select JS -->
      <script src="<?php echo site_url(); ?>/assetsbackend/plugins/bootstrap-select/js/custom-select.js"></script>
      <!-- Custom JS -->
      <script src="<?php echo site_url(); ?>/assetsbackend/js/seipkon.js"></script>
   </body>
</html>