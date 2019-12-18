<?php 
	 $this->load->view('common/header');
?>

	<!--Home 1 Slide Banner-->
	<section class="slide-banner row">
		<img src="<?php echo base_url();?>assets/images/slidedemo2.jpg" alt="" class="this-bg hidden-xs">

		<div class="this-texts container">
			<h2 class="this-cursive">Hire Car <span>Professional</span></h2>
			<h2 class="this-h1">Now available at <img src="<?php echo base_url();?>assets/images/availablity.png" alt=""></h2>
			<h2 class="this-foot">Call us Now : +91 90990 42156</h2>
			<!-- <a href="#" class="btn btn-primary">Let’s check it out</a> -->
		</div>
	</section>
	<!--Find Quick-->
	<section class="row find-quick">
		<div class="container">
			<div class="row find-quick-form text-center">
				<h2 class="this-title">FIND a <img src="<?php echo base_url();?>assets/images/cabs-ride.gif" alt=""> <u>quickly</u>!</h2>
				<p class="this-p">You just do one step behind, we will delivery car to your door!</p>
				<div class="col-xs-12" style="padding:0">
			        <div id="tab" class="btn-group btn-group-justified custom-tab" data-toggle="buttons">
				        <a href="#one-way" class="btn btn-default active" data-toggle="tab">
				          <input type="radio" />One Way Trip
				        </a>
				        <a href="#round-way" class="btn btn-default" data-toggle="tab">
				          <input type="radio" />Round Way Trip
				        </a>
				        <a href="#local" class="btn btn-default" data-toggle="tab">
				          <input type="radio" />Local Trip
				        </a>
			        </div>
                </div>
                <div class="col-xs-12">
			      	<div class="tab-content">
				        <div class="tab-pane active" id="one-way">
				        	<form action="#" method="post">
				        		<div class="row fr-it">
			        				<div class="col-md-3">
			        					<div class="location-group">
											<div class="input-group">
												<input type="text" class="form-control" placeholder="Enter airport, city or postcode...">
												<span class="input-group-addon"><i class="ion-android-locate"></i></span>
											</div>
										</div>
									</div>
				        			<div class="col-md-2">
										<div class="input-group date-group">
											<input type="text" class="datedroper form-control" placeholder="Pick up date">
											<span class="input-group-addon"><i class="ion-calendar"></i></span>
										</div>
									</div>
									<div class="col-md-2">
										<div class="input-group time-group">
											<input type="text" class="timedroper form-control" placeholder="08:00 am">
											<span class="input-group-addon"><i class="ion-ios-alarm-outline"></i></span>
										</div>
									</div>
									<div class="col-md-3">
										<div class="input-group date-group">
											<input type="text" class="datedroper form-control" placeholder="Drop off date">
											<span class="input-group-addon"><i class="ion-calendar"></i></span>
										</div>
									</div>
									<div class="col-md-2">
										<div class="input-group time-group">
											<input type="text" class="timedroper form-control" placeholder="08:00 am">
											<span class="input-group-addon"><i class="ion-ios-alarm-outline"></i></span>
										</div>
									</div>
								</div>  				
								<div class="row m0">
									<div class="col-xs-12">
										<input type="submit" value="Book a cab" class="btn btn-primary">
									</div>
								</div>
							</form>
				        </div>
				        <div class="tab-pane" id="round-way">
				        	<form>
				        		<div class="row fr-it">
				        			<div class="col-md-3">
			        					<div class="location-group">
											<div class="input-group">
												<input type="text" class="form-control" placeholder="Enter airport, city or postcode...">
												<span class="input-group-addon"><i class="ion-android-locate"></i></span>
											</div>
										</div>
									</div>
				        			<div class="col-md-2">
										<div class="input-group date-group">
											<input type="text" class="datedroper form-control" placeholder="Pick up date">
											<span class="input-group-addon"><i class="ion-calendar"></i></span>
										</div>
									</div>
									<div class="col-md-2">
										<div class="input-group time-group">
											<input type="text" class="timedroper form-control" placeholder="08:00 am">
											<span class="input-group-addon"><i class="ion-ios-alarm-outline"></i></span>
										</div>
									</div>
									<div class="col-md-3">
										<div class="input-group date-group">
											<input type="text" class="datedroper form-control" placeholder="Drop off date">
											<span class="input-group-addon"><i class="ion-calendar"></i></span>
										</div>
									</div>
									<div class="col-md-2">
										<div class="input-group time-group">
											<input type="text" class="timedroper form-control" placeholder="08:00 am">
											<span class="input-group-addon"><i class="ion-ios-alarm-outline"></i></span>
										</div>
									</div>

								</div>  				
								
								
								<div class="row m0">
									<div class="col-xs-12">
										<input type="submit" value="Book a cab" class="btn btn-primary">
									</div>
								</div>
								
							</form>
				        </div>
				        <div class="tab-pane" id="local">
				        	<form>
				        		<div class="row fr-it">
				        			<div class="col-md-3">
			        					<div class="location-group">
											<div class="input-group">
												<input type="text" class="form-control" placeholder="Enter airport, city or postcode...">
												<span class="input-group-addon"><i class="ion-android-locate"></i></span>
											</div>
										</div>
									</div>
				        			<div class="col-md-2">
										<div class="input-group date-group">
											<input type="text" class="datedroper form-control" placeholder="Pick up date">
											<span class="input-group-addon"><i class="ion-calendar"></i></span>
										</div>
									</div>
									<div class="col-md-2">
										<div class="input-group time-group">
											<input type="text" class="timedroper form-control" placeholder="08:00 am">
											<span class="input-group-addon"><i class="ion-ios-alarm-outline"></i></span>
										</div>
									</div>
									<div class="col-md-3">
										<div class="input-group date-group">
											<input type="text" class="datedroper form-control" placeholder="Drop off date">
											<span class="input-group-addon"><i class="ion-calendar"></i></span>
										</div>
									</div>
									<div class="col-md-2">
										<div class="input-group time-group">
											<input type="text" class="timedroper form-control" placeholder="08:00 am">
											<span class="input-group-addon"><i class="ion-ios-alarm-outline"></i></span>
										</div>
									</div>
								</div>  				
								
								
								<div class="row m0">
									<div class="col-xs-12">
										<input type="submit" value="Book a cab" class="btn btn-primary">
									</div>
								</div>
								
							</form>
				        </div>
				    </div>
			    </div>
			</div>
		</div>
	</section>
	<!--Features-->
	<section class="row features">
		<div class="container">
			<div class="col-md-4 feature">
				<div class="media">
					<div class="media-left"><span><img src="<?php echo base_url();?>assets/images/icons/features/1.png" alt=""></span></div>
					<div class="media-body">
						<h4 class="this-title">FREE FULL FUEL</h4>
						<p>Never need to pay for Fuel. If you need extra fuel just fill up and keep the receipt, we will <strong>refund the amount.</strong></p>
					</div>
				</div>
				<div class="media">
					<div class="media-left"><span><img src="<?php echo base_url();?>assets/images/icons/features/2.png" alt=""></span></div>
					<div class="media-body">
						<h4 class="this-title">24/7 ROADSIDE ASSISTENCE</h4>
						<p>You drive to adventures, we get it. We and our roadside assistance partners are <strong>available</strong> around the clock.</p>
					</div>
				</div>
			</div>
			<div class="col-md-4 feature">
				<div class="media">
					<div class="media-left"><span><img src="<?php echo base_url();?>assets/images/icons/features/3.png" alt=""></span></div>
					<div class="media-body">
						<h4 class="this-title">TAX &amp; INSURANCE INCLUDED</h4>
						<p>The hourly price includes Taxes &amp; Insurance. <strong>No hidden charges!</strong> Dosis amet consectua.</p>
					</div>
				</div>
				<div class="media">
					<div class="media-left"><span><img src="<?php echo base_url();?>assets/images/icons/features/4.png" alt=""></span></div>
					<div class="media-body">
						<h4 class="this-title">BEST RATED DRIVERS</h4>
						<p>All our Drivers have commercial driving license which are specialized for highway driving.</p>
					</div>
				</div>
			</div>
			<div class="col-md-4 feature">
				<div class="media">
					<div class="media-left"><span><img src="<?php echo base_url();?>assets/images/icons/features/5.png" alt=""></span></div>
					<div class="media-body">
						<h4 class="this-title">REFUNDABLE DEPOSIT</h4>
						<p>We take a small refundable deposit of <strong>Rs5,000.</strong> It will take 5‐15 days before the refund reflects in your account.</p>
					</div>
				</div>
				<div class="media">
					<div class="media-left"><span><img src="<?php echo base_url();?>assets/images/icons/features/6.png" alt=""></span></div>
					<div class="media-body">
						<h4 class="this-title">DOORSTEP CAR DELIVERY</h4>
						<p>Get your car <strong>delivered</strong> to your doorstep as well as picked up once you are done lorem dolor.</p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--Fleet-->
	<section class="row fleets2">
		<div class="container">
			<div class="row section-title text-center white">
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
	

	<!--Service Offers-->
	<section class="row services-offer">
		<div class="container">
			<div class="row section-title text-center">
				<h6 class="this-top">Book Now</h6>
				<h2 class="h1 this-main">Easy Steps To Book</h2>
			</div>
			
			<div class="row">
				<!--Offer-->
				<div class="col-md-4 feature text-center">
					<div class="icon-box">
						<img src="<?php echo base_url();?>assets/images/book-car.png" alt="">
					</div>
					<h4 class="this-title">Book Your Car</h4>
					<p>The weather started getting rough the tiny ship was lost the min ting a maximum security stockade lost the minnow.</p>
				</div>
				<!--Offer-->
				<div class="col-md-4 feature text-center">
					<div class="icon-box">
						<img src="<?php echo base_url();?>assets/images/pay.png" alt="">
					</div>
					<h4 class="this-title">Pay the Fare</h4>
					<p>The weather started getting rough the tiny ship was lost the min ting a maximum security stockade lost the minnow.</p>
				</div>
				<!--Offer-->
				<div class="col-md-4 feature text-center">
					<div class="icon-box">
						<img src="<?php echo base_url();?>assets/images/ride.png" alt="">
					</div>
					<h4 class="this-title">Enjoy the ride</h4>
					<p>The weather started getting rough the tiny ship was lost the min ting a maximum security stockade lost the minnow.</p>
				</div>
						
			</div>   			
		</div>
	</section>	
	<!--Funfact-->
	<section class="row funfacts">
		<div class="container-fluid">
			<div class="row inner">
				<!--Fact-->
				<div class="col-md-3 col-xs-6 fact">
					<div class="inner-fact">
						<div class="this-icon"><i class="ionicons ion-model-s"></i></div>
						<div class="this-texts">
							<h2 class="this-counter"><span class="counter">100</span><sup>+</sup></h2>
							<h5 class="this-about">Cabs</h5>
						</div>
					</div>
				</div>
				<!--Fact-->
				<div class="col-md-3 col-xs-6 fact">
					<div class="inner-fact">
						<div class="this-icon"><i class="ionicons ion-ios-cog-outline"></i></div>
						<div class="this-texts">
							<h2 class="this-counter"><span class="counter">100</span><sup>+</sup></h2>
							<h5 class="this-about">Trips Daily</h5>
						</div>
					</div>
				</div>
				<!--Fact-->
				<div class="col-md-3 col-xs-6 fact">
					<div class="inner-fact">
						<div class="this-icon"><i class="ionicons ion-ios-people-outline"></i></div>
						<div class="this-texts">
							<h2 class="this-counter"><span class="counter">2200</span></h2>
							<h5 class="this-about">Happy Clients</h5>
						</div>
					</div>
				</div>
				<!--Fact-->
				<div class="col-md-3 col-xs-6 fact">
					<div class="inner-fact">
						<div class="this-icon"><i class="ion-ios-speedometer-outline"></i></div>
						<div class="this-texts">
							<h2 class="this-counter"><span class="counter">1000</span><sup>+</sup></h2>
							<h5 class="this-about">Kilometers Daily</h5>
						</div>
					</div>
				</div>
			</div>
		</div>   	
	</section>
	<!--Banner 01-->
	<section class="row features enivronment">
		<div class="container">
			<div class="row">
			    <div class="col-md-6 text-center">
			        <img src="images/save-water.png" class="img-fluid" alt="">
			    </div>
			    <div class="col-md-6 text-center">
			        <img src="images/car-trash.png" class="img-resposnive" alt="">
			    </div>
			</div>
		</div>
	</section>
		<!--Banner 3-->
		<section class="row banner3">
			<div class="container">
				<div class="media inner">
					<div class="media-body">
						<h2 class="h1 this-title">Many reasons to choose <u>Yashdeep Travels</u></h2>
						<p>Our fleet comprises quite the range of rides, whether you need a small hybrid for efficient bursts across town.</p>
					</div>
					<div class="media-right">
						<a href="#" class="btn btn-primary dark">read more</a>
					</div>
				</div>
			</div>
		</section>
		<!--Testimonial-->
		<section class="row testimonial-row">
			<div class="container">   			
				<div class="row section-title text-center">
					<h6 class="this-top">SO MANY CHOICE</h6>
					<h2 class="h1 this-main">Testimonials</h2>
				</div>

				<div class="row">
					<div class="testimonial-carousel">
						<div class="item testimonial">
							<div class="inner row m0">
								<p>“PUKDG is my favorite booking car company ever! Cool drivers , amazing cars, top notch services! You won't believe it, but they actually didn't took any tip :) Reading more at link”</p>
								<h5 class="client">Diego Furlan</h5>
								<a href="#" class="client-img"><img src="<?php echo base_url();?>assets/images/testimonial/1.jpg" alt="" class="img-circle"></a>
							</div>
						</div>
						<div class="item testimonial">
							<div class="inner row m0">
								<p>“PUKDG is my favorite booking car company ever! Cool drivers , amazing cars, top notch services! You won't believe it, but they actually didn't took any tip :) Reading more at link”</p>
								<h5 class="client">Diego Furlan</h5>
								<a href="#" class="client-img"><img src="<?php echo base_url();?>assets/images/testimonial/2.jpg" alt="" class="img-circle"></a>
							</div>
						</div>
						<div class="item testimonial">
							<div class="inner row m0">
								<p>“PUKDG is my favorite booking car company ever! Cool drivers , amazing cars, top notch services! You won't believe it, but they actually didn't took any tip :) Reading more at link”</p>
								<h5 class="client">Diego Furla</h5>
								<a href="#" class="client-img"><img src="<?php echo base_url();?>assets/images/testimonial/1.jpg" alt="" class="img-circle"></a>
							</div>
						</div>
						<div class="item testimonial">
							<div class="inner row m0">
								<p>“PUKDG is my favorite booking car company ever! Cool drivers , amazing cars, top notch services! You won't believe it, but they actually didn't took any tip :) Reading more at link”</p>
								<h5 class="client">Diego Furlan</h5>
								<a href="#" class="client-img"><img src="<?php echo base_url();?>assets/images/testimonial/2.jpg" alt="" class="img-circle"></a>
							</div>
						</div>
						<div class="item testimonial">
							<div class="inner row m0">
								<p>“PUKDG is my favorite booking car company ever! Cool drivers , amazing cars, top notch services! You won't believe it, but they actually didn't took any tip :) Reading more at link”</p>
								<h5 class="client">Diego Furlan</h5>
								<a href="#" class="client-img"><img src="<?php echo base_url();?>assets/images/testimonial/1.jpg" alt="" class="img-circle"></a>
							</div>
						</div>
						<div class="item testimonial">
							<div class="inner row m0">
								<p>“PUKDG is my favorite booking car company ever! Cool drivers , amazing cars, top notch services! You won't believe it, but they actually didn't took any tip :) Reading more at link”</p>
								<h5 class="client">Diego Furlan</h5>
								<a href="#" class="client-img"><img src="<?php echo base_url();?>assets/images/testimonial/2.jpg" alt="" class="img-circle"></a>
							</div>
						</div>
					</div>   				
				</div>

			</div>
		</section>
		<section class="row banner2-prefolder">
			<div class="container-fluid">
				<div class="row inner">
					<div class="col-md-6 this-left">
						<div class="this-texts">
							<h2 class="this-title">Weekend Offer</h2>
							<h2 class="this-title2 h1">Get 20% Discount</h2>
							<p>Book cab at your destination at discount prices.</p>
							<a href="#" class="read-more">read more<i class="ion-arrow-right-b"></i></a>
						</div>
					</div>
					<div class="col-md-6 this-right">
						<div class="this-texts">
							<h2 class="this-title">Online Booking</h2>
							<h2 class="this-title2 h1">Get a Taxi</h2>
							<p>We offer you a long distance taxi service to anywhere.</p>
							<a href="#" class="read-more">read more<i class="ion-arrow-right-b"></i></a>
						</div>
					</div>
				</div>
			</div>
		</section>

		<?php 
	 $this->load->view('common/footer');
?>