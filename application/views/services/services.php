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
                	$CarBrandId=$row->CarBrandId;
                	$BrandName=$row->BrandName;
                	$subcar=$this->Services_model->getsubcar($CarBrandId);
                
            ?>
            		<form method="post" action="<?php echo base_url();?>home/login">
						<div class="media fleet fleet-list">
						<div class="row">
							<div class="col-md-5  col-sm-12 col-xs-12">
								<!-- <div class="media-left"><img src="<?php //echo base_url();?>assets/images/sedan-hover.png" alt=""></div> -->

								<input type="hidden" name="CarBrandId" value="<?php echo $CarBrandId;?>">
								<input type="hidden" name="BrandName" value="<?php echo $BrandName; ?>">
								<input type="hidden" name="StartPointCity" value="<?php echo $StartPointCity;?>">
								<input type="hidden" name="EndPointCity" value="<?php echo $EndPointCity;?>">
								<input type="hidden" name="PickupDate" value="<?php echo $PickupDate;?>">
								<input type="hidden" name="DropofDate" value="<?php echo $DropofDate;?>">
								<input type="hidden" name="PickupTime" value="<?php echo $PickupTime;?>">
								<div class="media-left"><img src="<?php echo base_url();?>admin/upload/carimages/<?php echo $row->BrandCarImage; ?>" alt="" height="200px" width="500px"></div>
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
											<h2 class="rent"><?php echo $row->BrandName; ?></h2>						
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
										<div class="row specification">
											<input type="submit" value="Book a cab" class="btn btn-primary">
										</div>
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
            ?>   
			

			

		</div>
	</section>
   
	<?php 
	 $this->load->view('common/footer');
	 ?>