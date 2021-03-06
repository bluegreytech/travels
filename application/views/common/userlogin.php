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
					<form class="row inner" method="post" enctype="multipart/form-data" 
				        				action="<?php echo base_url();?>home/loginprocess" id="form_valid">
						<div class="col-md-12">
							<?php if(($this->session->flashdata('wrong'))){ ?>
							<div class="alert alert-danger" id="wrongMessage">
							<strong> <?php echo $this->session->flashdata('wrong'); ?></strong> 
							</div>
							<?php } ?>
							<?php if(($this->session->flashdata('success'))){ ?>
									<div class="alert alert-success" id="successMessage">
									<strong> <?php echo $this->session->flashdata('success'); ?></strong> 
									</div>
							<?php } ?>
							<?php if(($this->session->flashdata('warning'))){ ?>
							<div class="alert alert-warning" id="warningMessage">
							<strong> <?php echo $this->session->flashdata('warning'); ?></strong> 
							</div>
							<?php } ?>

							<h3 class="form-title">Login</h3>
						</div>
						<div class="col-md-2 col-xs-4">
							<div class="input-group">
								<input type="text" class="form-control" value="+91" readonly="">
							</div>
						</div>
						<div class="col-md-10 col-xs-8">
							<div class="input-group">

							<input type="hidden" name="LoginOTP" value="<?php echo $LoginOTP=rand(2000, 999999);?>">
								<input type="text" class="form-control" name="ContactNumber" id="ContactNumber" placeholder="Enter 10 Digit Mobile Number" minlength="10" maxlength="10">
							</div>

						</div>
						<div class="col-md-12 text-center">
							<p class="otptext">Indian Mobile Numbers Supported Only.</p>
							<p class="otptext">6 Digit OTP will be sent via SMS.</p>
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

	<script type="text/javascript">

		$(function() { 
	    setTimeout(function() {
		  $('#wrongMessage').fadeOut('fast');
		}, 10000);
		   
		});

		$(function() { 
	    setTimeout(function() {
		  $('#successMessage').fadeOut('fast');
		}, 10000);
		   
		});
		
		$("#ContactNumber").on("input", function(evt) {
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
					ContactNumber:{              
						required: true,                
					},
						
				 },
		    });
		});
</script>