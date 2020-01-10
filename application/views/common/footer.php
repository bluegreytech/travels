		<footer class="row site-footer">
			<div class="top-footer row m0">
				<div class="container">
					<div class="row ft">
						<!--Widget-->
						<div class="col-sm-12 col-md-4 widget footer-widget widget-about">
							<h4 class="widget-title">About Us</h4>
							<p>
								<?php
									$rr=$about[0]->AboutDescription;
                             		echo $str = substr($rr, 0, 220) . '...';		
								?>
							</p>
							<a href="<?php echo base_url();?>about">Read More <i class="fa fa-angle-double-right"></i></a>
						</div>
						<!--Widget-->
						<div class="col-sm-12 col-md-5 widget footer-widget widget-links">
							<h4 class="widget-title">Usefull link</h4>
							<ul class="nav foot-nav style2">
								<li><i class="fa fa-angle-double-right"></i><a href="<?php echo base_url();?>about">About Us</a></li>
								<li><i class="fa fa-angle-double-right"></i><a href="<?php echo base_url();?>services">Services</a></li>
								<li><i class="fa fa-angle-double-right"></i><a href="<?php echo base_url();?>routes">Routes</a></li>
								<li><i class="fa fa-angle-double-right"></i><a href="<?php echo base_url();?>contact">Contact Us</a></li>
								<li><i class="fa fa-angle-double-right"></i><a href="<?php echo base_url();?>home/userlogin">Login</a></li>
							</ul>
						</div>
						<div class="col-sm-12 col-md-3 widget footer-widget widget-contact-info">
							<h4 class="widget-title">CONTACT INFO</h4>
							<ul class="nav foot-nav">
								<li><i class="ion-location"></i> 
									<?php
										echo $result[0]->OfficeAddress;
									?>
								</li>
								<li><i class="ion-ios-telephone"></i><a href="tel:+91 90990 42156"> 
									<?php
										echo $result[0]->SiteContactNumber;
									?>	
								</a></li>
								<li><i class="ion-ios-telephone"></i><a href="tel:+91 98258 72134">
									<?php
										echo $result[0]->OtherContactNumber;
									?>
								</a></li>
								<li><i class="ion-email-unread"></i><a href="mailto:bookmycabs@ydcabs.com">
								 	<?php
										echo $result[0]->SiteEmail;
									?>	
								</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="bottom-footer row m0">
				<div class="container">
					<div class="row">
						<div class="col-md-6">
							<p style="float: left;margin-bottom:0;">Copyright © 2019 by Yashdeep Travels. All rights reserved.</p>
						</div>
						<div class="col-md-6">
							<p  style="float: right;margin-bottom:0;">Designed & Developed By: <a href="https://bluegreytech.com/" target="_blank" style="color: #fff;">Bluegrey Technologies</a></p>
						</div>
					</div>
				</div>
			</div>
		</footer>    
		<script src="<?php echo base_url();?>assets/js/jquery-2.1.4.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
		<!--Google Map-->
		<script src="https://maps.googleapis.com/maps/api/js"></script>
		<script src="<?php echo base_url();?>assets/js/gmaps.min.js"></script>
		<!--Contact-->    
		<script src="<?php echo base_url();?>assets/js/jquery.form.js"></script>
		<script src="<?php echo base_url();?>assets/js/jquery.validate.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/contact.js"></script>
		<!--Owl Carousel-->
		<script src="<?php echo base_url();?>assets/vendors/owl.carousel/owl.carousel.min.js"></script>
		<!--CounterUp-->
		<script src="<?php echo base_url();?>assets/vendors/couterup/jquery.counterup.min.js"></script>
		<!--WayPoints-->
		<script src="<?php echo base_url();?>assets/vendors/waypoint/waypoints.min.js"></script>
		<!--Select-->
		<script src="<?php echo base_url();?>assets/vendors/bootstrap-select/js/bootstrap-select.min.js"></script>
		<!--Instafeed-->
		<script src="<?php echo base_url();?>assets/vendors/instafeed/instafeed.min.js"></script>
		<!-- Isotope -->
		<script src="<?php echo base_url();?>assets/vendors/imagesloaded/imagesloaded.pkgd.min.js"></script>
		<script src="<?php echo base_url();?>assets/vendors/isotope/isotope.min.js"></script>
		<!-- Timedroper -->
		<script src="<?php echo base_url();?>assets/vendors/timedroper/timedropper.min.js"></script>
		<!-- Datedroper -->
		<script src="<?php echo base_url();?>assets/vendors/datedroper/datedropper.min.js"></script>
		<!--Theme Script-->    
		<script src="<?php echo base_url();?>assets/js/theme.js"></script>
	</body>
	</html>