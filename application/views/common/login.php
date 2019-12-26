<?php 
	 $this->load->view('common/header');
?>

  	<!--Page Cover-->
  	<section class="row page-cover">
  		<div class="container">
  			<h2 class="h1 page-title">Login</h2>
  			<ol class="breadcrumb">
  				<li><a href="<?php echo base_url();?>">Home</a></li>
  				<li class="active">Login</li>
  			</ol>
  		</div>
  	</section> 	
  	<section class="row fold3">
		<div class="container">
			<div class="row fold-banners">
				<div class="col-md-3 col-sm-6 banner-vans fold-banner">
					<div class="row inner">
						<img src="<?php echo base_url();?>assets/images/fold3/1.jpg" alt="" class="img-responsive">
						<h2 class="top-text">Book Now</h2>
						<h5 class="bottom-text">From Anywhere</h5>
					</div>
				</div>
				<div class="col-md-3 col-md-offset-6 col-sm-6 banner-limo  fold-banner">					
					<div class="row inner">
						<img src="<?php echo base_url();?>assets/images/fold3/2.jpg" alt="" class="img-responsive">
						<h2 class="top-text">Want a Cab?</h2>
						<h5 class="bottom-text">Contact Us</h5>
					</div>
				</div>
			</div>
			<div class="row finder-form">
				<div class="col-md-6 col-md-offset-3 car-finder-form">
					<form class="row inner" action="#" method="get">
						<div class="col-md-12">
							<h3 class="form-title">Login</h3>
						</div>
						<div class="col-md-3">
							<div class="input-group">
								<input type="text" class="form-control" value="+91" readonly="">
							</div>
						</div>
						<div class="col-md-9">
							<div class="input-group">
								<input type="text" class="form-control" placeholder="Enter 10 Digit Mobile Number">
							</div>
						</div>
						<div class="col-md-12 text-center">
							<p class="otptext">Indian Mobile Numbers Supported Only.</p>
							<p class="otptext">4 Digit OTP will be sent via SMS.</p>
							<input type="submit" class="btn btn-primary" value="Next">
						</div>
						
					</form>
				</div>
			</div>
		</div>
	</section>
  	
 
	<?php 
	 $this->load->view('common/footer');
	 ?>