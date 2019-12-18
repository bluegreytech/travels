<?php 
	 $this->load->view('common/header');
?>

  	<!--Page Cover-->
  	<section class="row page-cover">
  		<div class="container">
  			<h2 class="h1 page-title">Our Services</h2>
  			<ol class="breadcrumb">
  				<li><a href="index.php">Home</a></li>
  				<li class="active">Services</li>
  			</ol>
  		</div>
  	</section> 	
  	<section class="wrapper-about">
		<div class="container">
			<div class="row section-title text-center">
				<h6 class="this-top">SO MANY CHOICE</h6>
				<h2 class="h1 this-main">Car for Every Need!</h2>
			</div>
			<div class="row">
				<div class="col-md-6 fleet fleet2">
					<div class="inner row">
						<h2 class="rent text-center">Sedan</h2>
						<!--<h4 class="vehicle-title text-center">Swift Honda</h4>-->
						<div class="vehicle-img text-center">
							<img class="cab" src="<?php echo base_url();?>assets/images/sedan.png" alt="">
							<img class="cab-hover" src="<?php echo base_url();?>assets/images/sedan-hover.png" alt="">
						</div>
						<div class="row specification">
							<ul class="nav">
								<li><span><img src="<?php echo base_url();?>assets/images/icons/fleet2/1.png" alt=""></span>Auto</li>
								<li><span><img src="<?php echo base_url();?>assets/images/icons/fleet2/2.png" alt=""></span>06L/100km</li>
								<li><span><img src="<?php echo base_url();?>assets/images/icons/fleet2/3.png" alt=""></span>02</li>
								<li><span><img src="<?php echo base_url();?>assets/images/icons/fleet2/4.png" alt=""></span>2016</li>
							</ul>
							<a href="#" class="details-page">Book Now</a>
						</div>
					</div>
				</div>
				<div class="col-md-6 fleet fleet2">
					<div class="inner row">
						<h2 class="rent text-center">SUV</h2>
						<!--<h4 class="vehicle-title text-center">Maruti Ciaz</h4>-->
						<div class="vehicle-img text-center">
							<img class="cab" src="<?php echo base_url();?>assets/images/suv.png" alt="">
							<img class="cab-hover" src="<?php echo base_url();?>assets/images/suv-hover.png" alt="">
						</div>
						<div class="row specification">
							<ul class="nav">
								<li><span><img src="<?php echo base_url();?>assets/images/icons/fleet2/1.png" alt=""></span>Auto</li>
								<li><span><img src="<?php echo base_url();?>assets/images/icons/fleet2/2.png" alt=""></span>06L/100km</li>
								<li><span><img src="<?php echo base_url();?>assets/images/icons/fleet2/3.png" alt=""></span>02</li>
								<li><span><img src="<?php echo base_url();?>assets/images/icons/fleet2/4.png" alt=""></span>2016</li>
							</ul>
							<a href="#" class="details-page">Book Now</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
  	
   
	<?php 
	 $this->load->view('common/footer');
	 ?>