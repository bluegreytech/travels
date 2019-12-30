<?php 
	 $this->load->view('common/header');
?>

	<!--Home 1 Slide Banner-->
	<section class="slide-banner row">
		<div id="jssor_1" style="position:relative;margin:0 auto;top:0px;left:0px;width:1349px;height:550px;overflow:hidden;visibility:hidden;">
        
        <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:1349px;height:550px;overflow:hidden;">
            <div>
                <img data-u="image" src="<?php echo base_url();?>assets/images/slidedemo2.jpg" />
                <div data-t="0" style="position:relative;top:250px;text-align:center;">
                    <h2 class="this-h1">May it be Airport pickup and drop</h2>
                </div>
            </div>
            <div>
                <img data-u="image" src="<?php echo base_url();?>assets/images/wedding-car.jpg" />
                <div data-t="0" style="position:relative;top:250px;text-align:center;">
                    <h2 class="this-h1">May it be Wedding pickup and drop</h2>
                </div>
            </div>
            <div>
                <img data-u="image" src="<?php echo base_url();?>assets/images/beach-car.jpg" />
                <div data-t="0" style="position:relative;top:250px;text-align:center;">
                    <h2 class="this-h1">May it be Beach pickup and drop</h2>
                </div>
            </div>
        </div>
        <!-- Bullet Navigator -->
        <div data-u="navigator" class="jssorb032" style="position:absolute;bottom:12px;right:12px;" data-autocenter="1" data-scale="0.5" data-scale-bottom="0.75">
            <div data-u="prototype" class="i" style="width:16px;height:16px;">
                <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                    <circle class="b" cx="8000" cy="8000" r="5800"></circle>
                </svg>
            </div>
        </div>
        <!-- Arrow Navigator -->
        <div data-u="arrowleft" class="jssora051" style="width:65px;height:65px;top:0px;left:25px;" data-autocenter="2" data-scale="0.75" data-scale-left="0.75">
            <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                <polyline class="a" points="11040,1920 4960,8000 11040,14080 "></polyline>
            </svg>
        </div>
        <div data-u="arrowright" class="jssora051" style="width:65px;height:65px;top:0px;right:25px;" data-autocenter="2" data-scale="0.75" data-scale-right="0.75">
            <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                <polyline class="a" points="4960,1920 11040,8000 4960,14080 "></polyline>
            </svg>
        </div>
	    </div>
	    <script type="text/javascript">jssor_1_slider_init();</script>
	</section>
	<!--Find Quick-->
	<section class="row find-quick">
		<div class="container">
			<div class="row find-quick-form text-center">
				<h2 class="this-title">FIND a <img src="<?php echo base_url();?>assets/images/cabs-ride.gif" alt=""> <u>quickly</u>!</h2>
				<p class="this-p">You just do one step behind, we will delivery cab to your door!</p>
				<div class="col-xs-12" style="padding:0">
			        <div id="tab" class="btn-group btn-group-justified custom-tab" data-toggle="buttons">
				        <a href="#one-way" class="btn btn-default active" data-toggle="tab">
				          <input type="radio" />One Way Trip
				        </a>
				        <a href="#round-way" class="btn btn-default" data-toggle="tab">
				          <input type="radio" />Round Trip
				        </a>
				        <a href="#local" class="btn btn-default" data-toggle="tab">
				          <input type="radio" />Local/ Rental Trip
				        </a>
			        </div>
                </div>
                <div class="col-xs-12">
			      	<div class="tab-content">
				        <div class="tab-pane active" id="one-way">
				        	<form class="form" method="post" enctype="multipart/form-data" 
				        				action="<?php echo base_url();?>Services" id="form_valid_one">
				        		<div class="row fr-it">
			        				<div class="col-md-4">
			        					<div class="location-group">
											<div class="input-group">
												<!-- <input type="text" class="form-control" placeholder="Enter Pickup Location">
												<span class="input-group-addon"><i class="ion-android-locate"></i></span> -->
												<select name="StartPointCity" class="form-control" required>
													<option desabled value="">Please select start point city</option>
													<?php
													if($cityData)
													{
														foreach($cityData as $cData)
														{
													?>
											
														<option value="<?php echo $cData->CityName; ?>"><?php echo $cData->CityName;?></option>
													<?php
													}}
													?>
												</select>
												<span class="input-group-addon"><i class="ion-android-locate"></i></span>
											</div>
										</div>
									</div>
									<div class="col-md-4">
			        					<div class="location-group">
											<div class="input-group">
												<!-- <input type="text" class="form-control" placeholder="Enter Drop Location">
												<span class="input-group-addon"><i class="ion-android-locate"></i></span> -->
												<select name="EndPointCity" class="form-control" required>
													<option desabled value="">Please select start point city</option>
													<?php
													if($cityData)
													{
														foreach($cityData as $cData)
														{
													?>
														<option value="<?php echo $cData->CityName; ?>"><?php echo $cData->CityName;?></option>
													<?php
													}}
													?>
												</select>
												<span class="input-group-addon"><i class="ion-android-locate"></i></span>
											</div>
										</div>
									</div>
				        			<div class="col-md-2">
										<div class="input-group date-group">
											<input type="text" class="datedroper form-control" name="PickupDate" id="PickupDate" placeholder="Pick up date" required>
											<span class="input-group-addon"><i class="ion-calendar"></i></span>
										</div>
									</div>
									<div class="col-md-2">
										<div class="input-group time-group">
											<input type="text" class="timedroper form-control" name="PickupTime" placeholder="08:00 am" required>
											<span class="input-group-addon"><i class="ion-ios-alarm-outline"></i></span>
										</div>
									</div>
									<!-- <div class="col-md-2">
										<div class="input-group time-group">
											<input type="text" class="timedroper form-control" placeholder="08:00 am">
											<span class="input-group-addon"><i class="ion-ios-alarm-outline"></i></span>
										</div>
									</div> -->
								</div>  				
								<div class="row m0">
									<div class="col-xs-12">
										<button class="btn btn-primary" type="submit">Book a cab</button>
									</div>
								</div>
							</form>
				        </div>
				        <div class="tab-pane" id="round-way">
				        	<form class="form" method="post" enctype="multipart/form-data" 
				        				action="<?php echo base_url();?>Services" id="form_valid_one">
				        		<div class="row fr-it">
				        			<div class="col-md-3">
			        					<div class="location-group">
											<div class="input-group">
												<!-- <input type="text" class="form-control" placeholder="Enter Pickup Location">
												<span class="input-group-addon"><i class="ion-android-locate"></i></span> -->
												<select name="StartPointCity" class="form-control" required>
													<option desabled value="">Please select start point city</option>
													<?php
													if($cityData)
													{
														foreach($cityData as $cData)
														{
													?>
											
														<option value="<?php echo $cData->CityName; ?>"><?php echo $cData->CityName;?></option>
													<?php
													}}
													?>
												</select>
											</div>
										</div>
									</div>
									<div class="col-md-3">
			        					<div class="location-group">
											<div class="input-group">
												<!-- <input type="text" class="form-control" placeholder="Enter Drop Location">
												<span class="input-group-addon"><i class="ion-android-locate"></i></span> -->
												<select name="EndPointCity" class="form-control" required>
													<option desabled value="">Please select start point city</option>
													<?php
													if($cityData)
													{
														foreach($cityData as $cData)
														{
													?>
														<option value="<?php echo $cData->CityName; ?>"><?php echo $cData->CityName;?></option>
													<?php
													}}
													?>
												</select>
											</div>
										</div>
									</div>
				        			<div class="col-md-2">
										<div class="input-group date-group">
											<input type="text" class="datedroper form-control" name="PickupDate"  placeholder="Pickup date" required>
											<span class="input-group-addon"><i class="ion-calendar"></i></span>
										</div>
									</div>
									<div class="col-md-2">
										<div class="input-group date-group">
											<input type="text" class="datedroper form-control" name="DropofDate"  placeholder="Drop date" required>
											<span class="input-group-addon"><i class="ion-calendar"></i></span>
										</div>
									</div>
									<div class="col-md-2">
										<div class="input-group time-group">
											<input type="text" class="timedroper form-control" name="PickupTime" placeholder="08:00 am" required>
											<span class="input-group-addon"><i class="ion-ios-alarm-outline"></i></span>
										</div>
									</div>
								</div>  					
								<div class="row m0">
									<div class="col-xs-12">
										<button class="btn btn-primary" type="submit">Book a cab</button>
									</div>
								</div>
							</form>
				        </div>
				        <div class="tab-pane" id="local">
				        	<form>
				        		<div class="row fr-it">
				        			<div class="col-md-4">
			        					<div class="location-group">
											<div class="input-group">
												<input type="text" class="form-control" placeholder="Enter Pickup Location">
												<span class="input-group-addon"><i class="ion-android-locate"></i></span>
											</div>
										</div>
									</div>
				        			<div class="col-md-4">
										<div class="input-group date-group">
											<input type="text" class="datedroper form-control" placeholder="Pickup date">
											<span class="input-group-addon"><i class="ion-calendar"></i></span>
										</div>
									</div>
									<div class="col-md-2">
										<div class="input-group time-group">
											<input type="text" class="timedroper form-control" placeholder="08:00 am">
											<span class="input-group-addon"><i class="ion-ios-alarm-outline"></i></span>
										</div>
									</div>
									<div class="col-md-2">
										<div class="input-group time-group">
											<input type="text" class="timedroper form-control" placeholder="Duration">
											<span class="input-group-addon"><i class="ion-ios-alarm-outline"></i></span>
										</div>
									</div>
								</div>  				
								<div class="row m0">
									<div class="col-xs-12">
										<input type="" value="Book a cab" class="btn btn-primary">
									</div>
								</div>	
							</form>
				        </div>
				    </div>
			    </div>
			</div>
		</div>
	</section>
<br><br> <br> <br> <br>
	<!--Features-->
	<section class="row features">
		<div class="container">
			<div class="row section-title text-center">
				<h6 class="this-top">Fact About Us</h6>
				<h2 class="h1 this-main">Why Choose Us</h2>
			</div>
			<div class="col-md-4 feature">
				<div class="media">
					<div class="media-left"><span><img src="<?php echo base_url();?>assets/images/icons/features/1.png" alt=""></span></div>
					<div class="media-body">
						<h4 class="this-title">CONVENIENCE</h4>
						<p>Yashdeep  Travels  has  effectually  proved  the  level  of  convenience  it provides to the customers with its quick and seamless service.</strong></p>
					</div>
				</div>
				<div class="media">
					<div class="media-left"><span><img src="<?php echo base_url();?>assets/images/icons/features/3.png" alt=""></span></div>
					<div class="media-body">
						<h4 class="this-title">COMFORT</h4>
						<p>When you are traveling in Yashdeep Travels, you are traveling in utmost comfort.</p>
					</div>
				</div>
				<div class="media">
					<div class="media-left"><span><img src="<?php echo base_url();?>assets/images/icons/features/2.png" alt=""></span></div>
					<div class="media-body">
						<h4 class="this-title">24*7 SERVICE</h4>
						<p>Be it a day, be it a night, we are always at your service. We are your convenience in the wee hours.</p>
					</div>
				</div>
			</div>
			<div class="col-md-4 feature">
				<div class="media">
					<div class="media-left"><span><img src="<?php echo base_url();?>assets/images/icons/features/7.png" alt=""></span></div>
					<div class="media-body">
						<h4 class="this-title">AFFORDABLE</h4>
						<p>Customers  will  be  experiencing  a  pocket-friendly  service  from  us. Now you can leave behind the headache of expense and travel stress-free with us.</p>
					</div>
				</div>
				<div class="media">
					<div class="media-left"><span><img src="<?php echo base_url();?>assets/images/icons/features/4.png" alt=""></span></div>
					<div class="media-body">
						<h4 class="this-title">MODERNIZED</h4>
						<p>Starting from booking to the payment our team has developed the entire structure with the help of modernized technology.</p>
					</div>
				</div>
				<div class="media">
					<div class="media-left"><span><img src="<?php echo base_url();?>assets/images/icons/features/8.png" alt=""></span></div>
					<div class="media-body">
						<h4 class="this-title">SAFE AND SECURE</h4>
						<p>We guarantee a safe, secure and timely ride when you are under ourservice.</p>
					</div>
				</div>
			</div>
			<div class="col-md-4 feature">
				<div class="media">
					<div class="media-left"><span><img src="<?php echo base_url();?>assets/images/icons/features/5.png" alt=""></span></div>
					<div class="media-body">
						<h4 class="this-title">REFUND</h4>
						<p>We book the requirement but on cancellation we refund entire advanced, if any <sup>*</sup>.</p>
					</div>
				</div>
				<div class="media">
					<div class="media-left"><span><img src="<?php echo base_url();?>assets/images/icons/features/6.png" alt=""></span></div>
					<div class="media-body">
						<h4 class="this-title">DOOR TO DOOR CAB SERVICES</h4>
						<p>Get your cab <strong>delivered</strong> to your door as well as picked up once you are done lorem dolor.</p>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!--Fleet-->
	<section class="row fleets2">
		<div class="container">
			<div class="row section-title text-center white">
				<h6 class="this-top">SO MANY CHOICES</h6>
				<h2 class="h1 this-main">Cab for Every Need!</h2>
			</div>
			<div class="row">
			<?php
                $i=1;
                if($services){                             
                foreach($services as $row)
                {  
            ?>

				<div class="col-md-4 fleet fleet2">
					<div class="inner row">
						<h2 class="rent text-center">Sedan</h2>
						<!--<h4 class="vehicle-title text-center">Swift Honda</h4>-->
						<div class="vehicle-img text-center">
							<!-- <img class="cab" src="<?php //echo base_url();?>assets/images/sedan.png" alt="">
							<img class="cab-hover" src="<?php //echo base_url();?>assets/images/sedan-hover.png" alt=""> -->
							<img class="cab" src="<?php echo base_url();?>admin/upload/carimages/<?php echo $row->BrandCarImage; ?>" alt="">
							<img class="cab-hover" src="<?php echo base_url();?>admin/upload/carimages/<?php echo $row->BrandCarImage; ?>" alt="">
						</div>
						<div class="row specification">
							<ul class="nav text-center">
								<li><span><img src="<?php echo base_url();?>assets/images/icons/fleet2/1.png" alt=""></span><?php echo $row->TotalSeat;?> Seats</li>
								<li><span><img src="<?php echo base_url();?>assets/images/icons/fleet2/2.png" alt=""></span><?php echo $row->TotalBaggage;?> Luggage</li>
							</ul>
							<a href="#" class="details-page">Book Now</a>
						</div>
					</div>
				</div>

			<?php
            	$i++;
                } 
            }
            ?>   	
				
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
				
				<div class="col-md-4 feature text-center">
					<div class="icon-box">
						<img src="<?php echo base_url();?>assets/images/book-car.png" alt="">
					</div>
					<h4 class="this-title">Book a Your Cab</h4>
					<p>Book a journey withus via <a href="#">ydcabs.com</a> or over a <br>call<a href="tel:+91 90990 42156"> +91 90990 42156</a>.</p>
				</div>
				
				<div class="col-md-4 feature text-center">
					<div class="icon-box">
						<img src="<?php echo base_url();?>assets/images/ride.png" alt="">
					</div>
					<h4 class="this-title">Enjoy your ride</h4>
					<p>Enjoy your ride with a best of our drivers without worries about your safety.</p>
				</div>
				
				<div class="col-md-4 feature text-center">
					<div class="icon-box">
						<img src="<?php echo base_url();?>assets/images/pay.png" alt="">
					</div>
					<h4 class="this-title">Pay the Fare</h4>
					<p>Pay your ride fare as per the commitment without being charge for extra miles and time, if any <sup>*</sup>.</p>
				</div>
				
			</div>   			
		</div>
	</section>	

	<!--Funfact-->
	<section class="row funfacts">
		<div class="container-fluid">
			<div class="row inner">
				
				<div class="col-md-3 col-xs-6 fact">
					<div class="inner-fact">
						<div class="this-icon"><i class="ionicons ion-model-s"></i></div>
						<div class="this-texts">
							<h2 class="this-counter"><span class="counter">100</span><sup>+</sup></h2>
							<h5 class="this-about">Cabs</h5>
						</div>
					</div>
				</div>
				
				<div class="col-md-3 col-xs-6 fact">
					<div class="inner-fact">
						<div class="this-icon"><i class="ionicons ion-ios-cog-outline"></i></div>
						<div class="this-texts">
							<h2 class="this-counter"><span class="counter">100</span><sup>+</sup></h2>
							<h5 class="this-about">Trips Daily</h5>
						</div>
					</div>
				</div>
				
				<div class="col-md-3 col-xs-6 fact">
					<div class="inner-fact">
						<div class="this-icon"><i class="ionicons ion-ios-people-outline"></i></div>
						<div class="this-texts">
							<h2 class="this-counter"><span class="counter">2200</span></h2>
							<h5 class="this-about">Happy Clients</h5>
						</div>
					</div>
				</div>
				
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
			    <!-- <div class="col-md-6 text-center">
			        <img src="<?php echo base_url();?>assets/images/save-water.png" class="img-fluid" alt="">
			    </div> -->
			    <div class="col-md-12 text-center">
			        <img src="<?php echo base_url();?>assets/images/environment.png" width="100%" alt="">
			    </div>
			</div>
		</div>
	</section>
		
		<!--Testimonial-->
		<section class="row testimonial-row">
			<div class="container">   			
				<div class="row section-title text-center">
					<h6 class="this-top">OUR VALUABLE CLIENT FEEDBACK</h6>
					<h2 class="h1 this-main">Testimonials</h2>
				</div>

				<div class="row">
					
					<div class="testimonial-carousel">
						<?php
	                        if($testimonial){                             
	                        foreach($testimonial as $testimorow)
	                        {
	                    ?>
						<div class="item testimonial">
							<div class="inner row m0">
								<p><?php echo $testimorow->TetimonialDescription;?></p>
								<h5 class="client"><?php echo $testimorow->FirstName.' '.$testimorow->LastName;?></h5>
								<a class="client-img"><img src="<?php echo base_url();?>admin/upload\testimonialimages/<?php echo $testimorow->TestimonialImage;?>" alt="" class="img-circle" height="80" width="80"></a>
							</div>
						</div>
							<?php
							}
						}
						?>  	
					</div> 

				</div>

			</div>
		</section>
		

<?php 
	 $this->load->view('common/footer');
?>


<script type="text/javascript">
$(document).ready(function()
{
	$('#PickupDate').datetimepicker({
	 defaultDate: new Date(),
  	 format: 'DD/MM/YYYY',
	 ignoreReadonly: true,	
	 maxDate: moment(),
	});

       $('#form_valid_one').validate({
			rules: {
				StartPointCity:{              
					required: true,                
				},
				EndPointCity:{              
					required: true,                
				},
				PickupDate:{              
					required: true,                
				},
				PickupTime:{              
					required: true,                
				},		
			 },
    });
});

            

</script>