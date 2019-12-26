<?php 
	 $this->load->view('common/header');
?>

  <!--Page Cover-->
  	<section class="row page-cover">
  		<div class="container">
  			<h2 class="h1 page-title">Our Services</h2>
  			<ol class="breadcrumb">
  				<li><a href="<?php echo base_url();?>">Home</a></li>
  				<li class="active">Services</li>
  			</ol>
  		</div>
  	</section> 	
  	<section class="missin-benefits">
		<div class="container">
			<div class="media fleet fleet-list">
				<div class="row">
					<div class="col-md-5  col-sm-12 col-xs-12">
						<div class="media-left"><img src="<?php echo base_url();?>assets/images/sedan-hover.png" alt=""></div>
						<div class="row specification eminities">
							<ul class="nav text-center">
								<li><span><img src="<?php echo base_url();?>assets/images/icons/fleet2/1.png" alt=""></span>03 Seats</li>
								<li><span><img src="<?php echo base_url();?>assets/images/icons/fleet2/2.png" alt=""></span>02 Luggage</li>
							</ul>
						</div>
					</div>
					<div class="col-md-7 col-sm-12 col-xs-12">
						<div class="media-body this-body">
							<div class="media this-header">
								<div class="media-body">
									<h2 class="rent">Sedan</h2>						
								</div>
							</div>
							<div class="summary row m0">
								We  offer  affordable  air  conditioner  sedan  cab  to the  customers  which guarantees comfort, space, and a great experience. If you are planning to travel for a vacation with your family and friends without any fibre of doubt go for the new AC Sedan cab. Because when it comes to traveling with your near and dear ones you want no compromise.
							</div>
							<form action="<?php echo base_url();?>home/login">
								<h4 class="avial-title">Available cars</h4>
								<div class="row specification car-type">
								    <label for="Honda Amaze">Honda Amaze</label>
									<label for="Maruti Suzuki Dzire">Maruti Suzuki Dzire</label>
									<label for="Hyundai Xcent">Hyundai Xcent</label>
									<label for="Toyota Etios">Toyota Etios</label>
								
								</div>
								<div class="row specification">
									<input type="submit" value="Book a cab" class="btn btn-primary">
								</div>
							</form>
						</div>
					</div>
				</div>				
			</div>

			<div class="media fleet fleet-list">
				<div class="row">
					<div class="col-md-5  col-sm-12 col-xs-12">
						<div class="media-left"><img src="<?php echo base_url();?>assets/images/suv-hover.png" alt=""></div>
						<div class="row specification eminities">
							<ul class="nav text-center">
								<li><span><img src="<?php echo base_url();?>assets/images/icons/fleet2/1.png" alt=""></span>06 Seats</li>
								<li><span><img src="<?php echo base_url();?>assets/images/icons/fleet2/2.png" alt=""></span>04 Luggage</li>
							</ul>
						</div>
					</div>
					<div class="col-md-7 col-sm-12 col-xs-12">
						<div class="media-body this-body">
							<div class="media this-header">
								<div class="media-body">
									<h2 class="rent">SUV</h2>						
								</div>
							</div>
							<div class="summary row m0">
								Be it a short journey or a long journey, it is always predominant to make your journeys less hectic. With enough leg space and 3 rows of seats, you make  journey  worth  remembering.  The  luggage  space  is abundant  and the rooftop carrier adds cherry to the cake. With powerful air conditioning and  stereo  systems,  you  transform  yourself  into  a  tailored  world  of convenience.

							</div>
							<form action="<?php echo base_url();?>home/login"> 
								<h4 class="avial-title">Available cars</h4>
								<div class="row specification car-type">
								    <label for="Mahindra Marazzo">Mahindra Marazzo</label>
									<label for="Toyota Innova">Toyota Innova</label>
									<label for="Maruti Suzuki Ertiga">Maruti Suzuki Ertiga</label>
									<label for="Mahindra Xylo">Mahindra Xylo</label>
								</div>
								<div class="row specification">
									<input type="submit" value="Book a cab" class="btn btn-primary">
								</div>
							</form>
						</div>
					</div>
				</div>				
			</div>

			<div class="media fleet fleet-list">
				<div class="row">
					<div class="col-md-5  col-sm-12 col-xs-12">
						<div class="media-left"><img src="<?php echo base_url();?>assets/images/luxury-hover.png" alt=""></div>
						<div class="row specification eminities">
							<ul class="nav text-center">
								<li><span><img src="<?php echo base_url();?>assets/images/icons/fleet2/1.png" alt=""></span>03 Seats</li>
								<li><span><img src="<?php echo base_url();?>assets/images/icons/fleet2/2.png" alt=""></span>02 Luggage</li>
							</ul>
						</div>
					</div>
					<div class="col-md-7 col-sm-12 col-xs-12">
						<div class="media-body this-body">
							<div class="media this-header">
								<div class="media-body">
									<h2 class="rent">Luxury Segmentation</h2>						
								</div>
							</div>
							<div class="summary row m0">
								Yashdeep  Travels  offer  luxury  cars  that  cater  your  needs  like  marriage events and premium leisure travels. The luxury cars include BMW, Audi, Jaguar, Land Rover, Sedan, SUV, and several other Vintage cars too.

							</div>
							<form action="<?php echo base_url();?>contact">
								<h4 class="avial-title">Available cars</h4>
								<div class="row specification car-type">
								    <label for="Mahindra Marazzo">BMW</label>
									<label for="Audi">Audi</label>
									<label for="Jaguar">Jaguar</label>
									<label for="Land Rover">Land Rover</label>
									<label for="Sedan">Sedan</label>
									<label for="SUV">SUV</label>
								</div>
								<div class="row specification">
									<input type="submit" value="Get A Quote" class="btn btn-primary">
								</div>
							</form>
						</div>
					</div>
				</div>				
			</div>

		</div>
	</section>
   
	<?php 
	 $this->load->view('common/footer');
	 ?>