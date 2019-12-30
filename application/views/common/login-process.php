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
					<form class="row inner" method="post" enctype="multipart/form-data" 
				        				action="<?php echo base_url();?>home/booking" id="form_valid">
						<div class="col-md-12">
							<h3 class="form-title">Enter OTP Number</h3>
						</div>
						<div class="col-md-12">
							<div class="input-group">
								<input type="text" name="CarBrandId" value="<?php echo $CarBrandId;?>">
								<input type="text" name="BrandName" value="<?php echo $BrandName;?>">
								<input type="text" name="StartPointCity" value="<?php echo $StartPointCity;?>">
								<input type="text" name="EndPointCity" value="<?php echo $EndPointCity;?>">
								<input type="text" name="PickupDate" value="<?php echo $PickupDate;?>">
								<input type="text" name="DropofDate" value="<?php echo $DropofDate;?>">
								<input type="text" name="PickupTime" value="<?php echo $PickupTime;?>">
								<input type="text" name="ContactNumber" value="<?php echo $ContactNumber;?>">
								<input type="text" name="OTPNumber" value="<?php echo $OTPNumber;?>">
								<input type="text" class="form-control" name="OTPNumber" id="OTPNumber" placeholder="Enter 6 Digit OTP" minlength="5" maxlength="6" value="<?php echo $OTPNumber;?>">
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

<script type="text/javascript">
		$("#OTPNumber").on("input", function(evt) {
		var self = $(this);
		self.val(self.val().replace(/[^\d].+/, ""));
		if ((evt.which < 48 || evt.which > 57)) 
		{
			evt.preventDefault();
		}});

		$(document).ready(function()
		{

	       $('#form_valid').validate({
				rules: {
					OTPNumber:{              
						required: true,                
					},
						
				 },
		    });
		});
</script>