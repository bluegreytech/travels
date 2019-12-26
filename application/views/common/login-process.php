<?php 
	 $this->load->view('common/header');
?>


  	<!--Page Cover-->
  	<section class="row page-cover">
  		<div class="container">
  			<h2 class="h1 page-title">Login</h2>
  			<ol class="breadcrumb">
  				<li><a href="index.php">Home</a></li>
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
						<h2 class="top-text">At Winter</h2>
						<h5 class="bottom-text">From $59.69/day</h5>
					</div>
				</div>
				<div class="col-md-3 col-md-offset-6 col-sm-6 banner-limo  fold-banner">					
					<div class="row inner">
						<img src="<?php echo base_url();?>assets/images/fold3/2.jpg" alt="" class="img-responsive">
						<h2 class="top-text">Big Sale</h2>
						<h5 class="bottom-text">Sale 50%, 30%, 20%</h5>
					</div>
				</div>
			</div>
			<div class="row finder-form">
				<div class="col-md-6 col-md-offset-3 car-finder-form">
					<form class="row inner" action="booking.php" method="get">
						<div class="col-md-12">
							<h3 class="form-title">Enter OTP Number</h3>
						</div>
						<div class="col-md-12">
							<div class="input-group">
								<input type="text" class="form-control" placeholder="Enter 6 Digit OTP">
							</div>
						</div>
						<div class="col-md-12 text-center">
							<p class="otptext">Please enter 4 digit OTP number which you get by SMS.</p>
							<p class="otptext">4 Digit OTP will be sent via SMS.</p>
							<input type="submit" class="btn btn-primary" value="SUBMIT">
						</div>
						
					</form>
				</div>
			</div>
		</div>
	</section>
  	
<?php 
	 $this->load->view('common/footer');
?>