<li class="dropdown-holder <?php if($menu=='pages'){ ?>active<?php } ?>"><a href="#">Tentang Kami <i class="fa fa-caret-down" aria-hidden="true"></i></a>
	<ul class="sub-menu">
	<?php foreach($pages as $p){?>
		<li><a href="<?php echo site_url(); ?>pages/id/<?php echo $p->id; ?>"><?php echo $p->title; ?></a></li>
	<?php } ?>
	</ul>
</li>
<li class="dropdown-holder <?php if($menu=='product' OR $menu=='course'){ ?>active<?php } ?>"><a href="<?php echo site_url(); ?>product">Produk  <i class="fa fa-caret-down" aria-hidden="true"></i></a>
	<ul class="sub-menu">
		<li><a href="<?php echo site_url(); ?>course">Kursus</a></li>
		
	
	<li class="dropdown-holder"><a href="<?php echo site_url(); ?>product">Produk <i class="fa fa-caret-right" aria-hidden="true"></i></a>
													<ul class="second-sub-menu">
														<?php foreach($kategori_produk as $pk){?>
		<li><a href="<?php echo site_url(); ?>product/kategori/<?php echo $pk->id; ?>"><?php echo $pk->nama; ?></a></li>
	<?php } ?>
													</ul>
	</ul>
</li>

<li class="dropdown-holder <?php if($menu=='blog'){ ?>active<?php } ?>"><a href="<?php echo site_url(); ?>blog">Blog <i class="fa fa-caret-down" aria-hidden="true"></i></a>
<ul class="sub-menu">
		<?php //foreach($kategori_blog as $kb){?>
		<li><a href="<?php echo site_url(); ?>blog/kategori/2">EVENT</a></li>
	<?php //} ?>
	</ul>

</li>
<li <?php if($menu=='hubungi-kami'){ ?>class="active"<?php } ?>"><a href="<?php echo site_url(); ?>index/hubungi_kami">Hubungi Kami</a>
</li>




<?php if($this->session->userdata('logged_in')){ ?>
<li class="join-us dropdown-holder" ><a href="#" class="theme-solid-button">Profil</a>
<ul class="sub-menu" >
		<?php if($this->session->userdata('akses')==9 OR $this->session->userdata('akses')==8){ ?>
		<li><a href="<?php echo site_url(); ?>admin">Halaman Admin</a></li>
		<?php } ?>
		<?php if($this->session->userdata('akses')==1){ ?>
		<li><a href="<?php echo site_url(); ?>index/halaman_profil">Halaman Profil</a></li>
		<li><a href="<?php echo site_url(); ?>index/daftar_pembelian">Daftar Pemesanan</a></li>
		<li><a href="<?php echo site_url(); ?>index/daftar_course">Course Telah Dibeli</a></li>
		<?php } ?>
		
		<li><a href="<?php echo site_url(); ?>index/logout" >Logout</a></li>
	</ul>
		</li>
<?php 
}else{
?>
<li class="join-us"><a href="<?php echo site_url(); ?>index/login" class="theme-solid-button">Masuk</a></li>
<?php } ?>
<li class="join-us"><a href="<?php echo site_url(); ?>cart" class="theme-solid-button" style="padding:10px;color:#593c22;font-size:11px;"><i class="fa fa-shopping-cart fa-lg" aria-hidden="true"></i></a></li>
