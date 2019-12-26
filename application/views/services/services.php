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
			<?php
                $i=1;
                if($services){                             
                foreach($services as $row)
                {
            ?>

				<div class="media fleet fleet-list">
					<div class="row">
						<div class="col-md-5  col-sm-12 col-xs-12">
							<!-- <div class="media-left"><img src="<?php //echo base_url();?>assets/images/sedan-hover.png" alt=""></div> -->
							<div class="media-left"><img src="<?php echo base_url();?>admin/upload/carimages/<?php echo $row->BrandCarImage; ?>" alt="" height="200px" width="500px"></div>
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
										<h2 class="rent"><?php echo $row->BrandName; ?></h2>						
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

			<?php
            	$i++;
                } 
            }
            ?>   
			

			

		</div>
	</section>
   
	<?php 
	 $this->load->view('common/footer');
	 ?>