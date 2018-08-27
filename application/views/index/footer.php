	<!-- 
			=============================================
				Footer
			============================================== 
			-->
			<footer class="theme-footer">
				<div class="container">
					<div class="top-footer row">
						<div class="col-sm-3 col-xs-12 footer-list" style="padding-top: 100px;">
							<h6>Company</h6>
							<div class="row">
								
								<div class="col-md-12 col-sm-12 col-xs-12">
									<ul>
										<?php foreach($pages as $p){?>
		<li><a href="<?php echo site_url(); ?>pages/id/<?php echo $p->id; ?>"><?php echo $p->title; ?></a></li>
	<?php } ?>
									</ul>
								</div>
							</div>
						</div> <!-- /.footer-list -->
						<div class="col-sm-6 col-xs-12 footer-logo-widget">
							<div class="wrapper">
								<div class="logo"><a href="index"><img src="<?php echo site_url(); ?>/upload/images/<?php echo $logo; ?>" alt=""></a></div>
								<p><?php echo $deskripsi; ?></p>
								<ul>
								<li  style="text-align:center;"><?php echo $alamat; ?> </li>
									<li  style="text-align:center;"><?php echo $telepon; ?> </li>
									
								</ul>
								<a href="<?php echo $facebook; ?>" class="tran3s" style="color:#593c22;margin-right:10px;"><i class="fa fa-facebook fa-lg" aria-hidden="true"></i></a>
						<a href="<?php echo $twitter; ?>" class="tran3s" style="color:#593c22;margin-right:10px;"><i class="fa fa-twitter fa-lg" aria-hidden="true"></i></a>
						<a href="<?php echo $instagram; ?>" class="tran3s" style="color:#593c22;margin-right:5px;"><i class="fa fa-instagram fa-lg" aria-hidden="true"></i></a>
							</div>
							
						</div> <!-- /.footer-logo-widget -->
						<div class="col-sm-3 col-xs-12 footer-news" style="padding-top: 100px;">
							<h6>Follow us in Instagram</h6>
							<script src="https://cdn.lightwidget.com/widgets/lightwidget.js"></script><iframe src="//lightwidget.com/widgets/5026d98f3105572dbe323bbd007f8e0c.html" scrolling="no" allowtransparency="true" class="lightwidget-widget" style="width:100%;border:0;overflow:hidden;"></iframe>

						</div> <!-- /.footer-news -->
					</div> <!-- /.top-footer -->
				</div> <!-- /.container -->

				<div class="bottom-footer">
					<div class="container">
						<p>Copyright &copy; 2018 <a href="index" class="tran3s" style="color:#593c22;"><?php echo $title; ?></a> </p>
						   
					</div> <!-- /.container -->
				</div> <!-- /.bottom-footer -->
			</footer>