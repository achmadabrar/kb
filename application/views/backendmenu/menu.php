<ul class="list-unstyled components">
                     <li class="active">
                        <a href="<?php echo site_url(); ?>admin">
                        <i class="fa fa-dashboard"></i>
                        Dashboard
                        </a>
                     </li>
					  <li class="active">
                        <a href="<?php echo site_url(); ?>index">
                        <i class="fa fa-dashboard"></i>
                        Beranda Utama
                        </a>
                     </li>
					 
					 <?php if($this->session->userdata('akses')==8){ ?>
					  <li>
                        <a href="#createblog" data-toggle="collapse" aria-expanded="false">
                        <i class="fa fa-newspaper-o"></i>
                        blog
                        </a>
                        <ul class="collapse list-unstyled" id="createblog">
                           <li><a href="<?php echo site_url(); ?>admin/daftar_blog">Semua Blog</a></li>
                           <li><a href="<?php echo site_url(); ?>admin/tambah_blog">Buat Blog Baru</a></li>
                           <li><a href="<?php echo site_url(); ?>admin/daftar_kategori_blog">Kategori Blog</a></li>
                           <li><a href="<?php echo site_url(); ?>admin/daftar_komentar_blog">Komentar Blog</a></li>
                        </ul>
                     </li>
					 
					 <?php } else if($this->session->userdata('akses')==9){?>
					   <li>
                        <a href="#createpage" data-toggle="collapse" aria-expanded="false">
                        <i class="fa fa-file"></i>
                        pages
                        </a>
                        <ul class="collapse list-unstyled" id="createpage">
                           <li><a href="<?php echo site_url(); ?>admin/daftar_halaman">Semua Halaman</a></li>
                        </ul>
                     </li>
					   <li>
                        <a href="#createblog" data-toggle="collapse" aria-expanded="false">
                        <i class="fa fa-newspaper-o"></i>
                        blog
                        </a>
                        <ul class="collapse list-unstyled" id="createblog">
                           <li><a href="<?php echo site_url(); ?>admin/daftar_blog">Semua Blog</a></li>
                           <li><a href="<?php echo site_url(); ?>admin/tambah_blog">Buat Blog Baru</a></li>
                           <li><a href="<?php echo site_url(); ?>admin/daftar_kategori_blog">Kategori Blog</a></li>
                           <li><a href="<?php echo site_url(); ?>admin/daftar_komentar_blog">Komentar Blog</a></li>
                        </ul>
                     </li>
					 
					 
					 
                     <li>
                        <a href="#ecommerce" data-toggle="collapse" aria-expanded="false">
                        <i class="fa fa-shopping-cart"></i>
                        e-Commerce
                        </a>
                        <ul class="collapse list-unstyled" id="ecommerce">
                           <li><a href="<?php echo site_url(); ?>admin/daftar_product">semua produk</a></li>
                           <li><a href="<?php echo site_url(); ?>admin/tambah_product">tambah produk baru</a></li>
                           <li><a href="<?php echo site_url(); ?>admin/daftar_kategori_product">kategori produk</a></li>
                           <li><a href="<?php echo site_url(); ?>admin/daftar_komentar_product">Komentar produk</a></li>
                        </ul>
                     </li>
					  <li>
                        <a href="#elearning" data-toggle="collapse" aria-expanded="false">
                        <i class="fa fa-book"></i>
                        e-Learning
                        </a>
                        <ul class="collapse list-unstyled" id="elearning">
                           <li><a href="<?php echo site_url(); ?>admin/daftar_course">semua course</a></li>
                           <li><a href="<?php echo site_url(); ?>admin/tambah_course">tambah course baru</a></li>
                           <li><a href="<?php echo site_url(); ?>admin/daftar_kategori_course">kategori course</a></li>
                           <li><a href="<?php echo site_url(); ?>admin/daftar_komentar_course">Komentar Course</a></li>
                        </ul>
                     </li>
					  <li>
                        <a href="<?php echo site_url(); ?>admin/daftar_order">
                        <i class="fa fa-shopping-bag"></i>
                        Order / Pesanan Masuk
                        </a>
                     </li>
                   <li>
                        <a href="#masterdata" data-toggle="collapse" aria-expanded="false">
                        <i class="fa fa-users"></i>
                        Master Data
                        </a>
                        <ul class="collapse list-unstyled" id="masterdata">
                           <li><a href="<?php echo site_url(); ?>admin/daftar_anggota">Data User/Anggota</a></li>
                        </ul>
                     </li>
					  <li>
                        <a href="<?php echo site_url(); ?>admin/daftar_slider">
                        <i class="fa fa-photo"></i>
                        Slider
                        </a>
                     </li>
                     <li>
                        <a href="<?php echo site_url(); ?>admin/konfigurasi">
                        <i class="fa fa-gear"></i>
                        Konfigurasi Sistem
                        </a>
                     </li>
                  </ul>
					 <?php } ?>