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
                if($services>0){                             
                foreach($services as $row)
                {
                	$CarBrandId=$row->CarBrandId;
                	$BrandName=$row->BrandName;
                	$subcar=$this->Services_model->getsubcar($CarBrandId);
                
            ?>
            		<form method="post" action="<?php echo base_url();?>home/login">
						<div class="media fleet fleet-list">
						<div class="row">
							<div class="col-md-5  col-sm-12 col-xs-12">
								<!-- <div class="media-left"><img src="<?php //echo base_url();?>assets/images/sedan-hover.png" alt=""></div> -->
								<?php
					          	if($this->session->userdata('StartCity')!='')
					          	{

								 	$StartCity=$this->session->userdata('StartCity');
									$EndCity=$this->session->userdata('EndCity');
									$PickupDate=$this->session->userdata('PickupDate');
									$DropofDate=$this->session->userdata('DropofDate');
									$PickupTime=$this->session->userdata('PickupTime');
									$DropofTime=$this->session->userdata('DropofTime');
									// $CarBrandId=$this->session->userdata('CarBrandId');
									$LocalTripId=$this->session->userdata('LocalTripId');
								}
								?>

								<input type="hidden" name="CarBrandId" value="<?php echo $CarBrandId;?>">
								<input type="hidden" name="BrandName" value="<?php echo $BrandName; ?>">
								<input type="hidden" name="PerHoureFare" value="<?php echo $row->PerHoureFare; ?>">
								<input type="hidden" name="StartCity" value="<?php echo $StartCity;?>">
								<input type="hidden" name="EndCity" value="<?php echo $EndCity;?>">
								<input type="hidden" name="PickupDate" value="<?php echo $PickupDate;?>">
								<input type="hidden" name="DropofDate" value="<?php echo $DropofDate;?>">
								<input type="hidden" name="PickupTime" value="<?php echo $PickupTime;?>">
								<input type="hidden" name="DropofTime" value="<?php echo $DropofTime;?>">

								<input type="hidden" name="LocalTripId" value="<?php echo $LocalTripId;?>">

								<div class="media-left"><img src="<?php echo base_url();?>admin/upload/carimages/<?php echo $row->BrandCarImage; ?>" alt=""></div>
								<div class="row specification eminities">
									<ul class="nav text-center">
										<li><span><img src="<?php echo base_url();?>assets/images/icons/fleet2/1.png" alt=""></span><?php  echo $row->TotalSeat;?> Seats</li>
										<li><span><img src="<?php echo base_url();?>assets/images/icons/fleet2/2.png" alt=""></span><?php  echo $row->TotalBaggage;?> Luggage</li>
									</ul>
								</div>
							</div>
							<div class="col-md-7 col-sm-12 col-xs-12">
								<div class="media-body this-body">
									<div class="media this-header">
										<div class="media-body">
											<div class="row m0">
												<h2 class="rent"><?php echo $row->BrandName; ?></h2>		
											</div>	
											<h4 class="vehicle-title"><span>Cab Rate Per KMS: Rs <?php echo $row->PerKmRate; ?></span></h4>	

											<h4 class="vehicle-title"><span>Cab Per Hour Fare: Rs <?php echo $row->PerHoureFare; ?></span></h4>			
										</div>
									</div>
									<div class="summary row m0">
										<?php echo $row->BrandCarDescription; ?>
									</div>
									<form action="<?php echo base_url();?>home/login">
										<h4 class="avial-title">Available cars</h4>
										<div class="row specification car-type">
											<?php
											foreach($subcar as $car)
											{
												//print_r($car);
												?>
												<label for="Honda Amaze"><?php echo $car->CarName;?></label>
												<?php
											}
										    ?>
										</div>

										<?php
										if($StartCity!='')
										{
										?>
											<div class="row specification">
												<input type="submit" value="Book a cab" class="btn btn-primary">
											</div>
										<?php
										}
										?>
									</form>
								</div>
							</div>
						</div>				
						</div>
					</form>
			<?php
            	$i++;
                } 
            }
            else
            {
            	?>
            		<h4>This routes not found for any CABS</h4>
            	<?php
            }
            ?>   
			

			

		</div>
	</section>
   
	<?php 
	 $this->load->view('common/footer');
	 ?>