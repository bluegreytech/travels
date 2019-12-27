<?php 
	 $this->load->view('common/header');
?>
  	<!--Page Cover-->
  	<section class="row page-cover">
  		<div class="container">
  			<h2 class="h1 page-title">Booking Confirmation</h2>
  			<ol class="breadcrumb">
  				<li><a href="index.php">Home</a></li>
  				<li class="active">Booking Confirmation</li>
  			</ol>
  		</div>
  	</section> 	
  	<section class="wrapper-about">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<form class="contactForm contct-form" method="post" enctype="multipart/form-data" 
				        				action="<?php echo base_url();?>home/booking" id="form_valid">
			      		<div class="col-sm-8">
			      			<div class="row">
			      				<div class="form-group col-sm-6">
			      				<input type="hidden" name="CarBrandId" value="<?php echo $CarBrandId;?>">
								<!-- <input type="hidden" name="StartPointCity" value="<?php// echo $StartPointCity;?>">
								<input type="hidden" name="EndPointCity" value="<?php //echo $EndPointCity;?>">
								<input type="hidden" name="PickupDate" value="<?php //echo $PickupDate;?>"> -->
								<!-- <input type="hidden" name="PickupTime" value="<?php //echo $PickupTime;?>"> -->
								<!-- <input type="hidden" name="ContactNumber" value="<?php //echo $ContactNumber;?>">
								<input type="hidden" name="OTPNumber" value="<?php //echo $OTPNumber;?>"> -->
			      					<h5 class="this-label">First Name<span>*</span></h5>
			      					<input type="text" class="form-control" name="FirstName" placeholder="Enter First Name" minlength="2" maxlength="25">
			      				</div>
			      				<div class="form-group col-sm-6">
			      					<h5 class="this-label">Last Name<span>*</span></h5>
			      					<input type="text" class="form-control" name="LastName" placeholder="Enter Last Name" minlength="2" maxlength="12">
			      				</div>
			      				<div class="form-group col-sm-6">
			      					<h5 class="this-label">Email Address<span>*</span></h5>
			      					<input type="email" class="form-control" name="EmailAddress" placeholder="Enter Email Address">
			      				</div>
			      				<div class="form-group col-sm-6">
			      					<h5 class="this-label">Contact Number<span>*</span></h5>
			      					<input type="text" class="form-control" name="ContactNumber" id="ContactNumber" placeholder="Enter 10 Digit Mobile Number" minlength="10" maxlength="10" value="<?php echo $ContactNumber;?>" readonly>
			      				</div>
			      				<div class="form-group col-sm-6">
			      					<h5 class="this-label">Car Brand Type<span>*</span></h5>
			      					<input type="text"  class="form-control" placeholder="Select Brand Car" name="BrandName" value="<?php echo $BrandName;?>" readonly> 
			      				</div>
			      				<div class="form-group col-sm-6">
			      					<h5 class="this-label">Select Car<span>*</span></h5>
			      					 <select class="form-control" id="sel1" name="CarId">
			      					 	<option desabled value="">Select Your car</option>
										<?php
										if($subcar)
										{
											foreach($subcar as $subcarData)
											{
										?>
								
											<option value="<?php echo $subcarData->CarId; ?>"><?php echo $subcarData->CarName;?></option>
										<?php
										}}
										?>
									  </select>
			      				</div>
			      				<div class="form-group col-sm-6">
			      					<h5 class="this-label">Pickup Date<span>*</span></h5>
			      					<input type="text" class="form-control" name="PickupDate" placeholder="dd/mm/yyyy" value="<?php echo $PickupDate;?>" readonly>
			      				</div>

			      				<div class="form-group col-sm-6">
			      					<h5 class="this-label">Drop off Date<span>*</span></h5>
			      				<?php
			      				if($DropofDate=='')
			      				{
			      					?>

			      					<input type="text" class="form-control"  name="DropofDate" placeholder="dd/mm/yyyy" value="<?php echo $PickupDate;?>" readonly>
			      					<?php
			      				}
			      				else
			      				{
			      					?>

			      					<input type="text" class="form-control"  name="DropofDate" placeholder="dd/mm/yyyy" value="<?php echo $DropofDate;?>" readonly>
			      					<?php
			      				}
			      				?>
			      				</div>
			      				<div class="form-group col-sm-6">
			      					<h5 class="this-label">Pickup Location<span>*</span></h5>
			      					<input type="text" class="form-control" name="StartPointCity" placeholder="Pickup location" value="<?php echo $StartPointCity;?>" readonly>
			      				</div>
			      				<div class="form-group col-sm-6">
			      					<h5 class="this-label">Destination<span>*</span></h5>
			      					<input type="text" class="form-control" name="EndPointCity" placeholder="Drop of location" value="<?php echo $EndPointCity;?>" readonly>
			      				</div>
			      				<!-- <div class="form-group col-sm-12">
			      					<h5 class="this-label">Extra Note</h5>
			      					<textarea class="form-control"></textarea>
			      				</div> -->
			      			</div>
			      		</div>
			      		<div class="col-sm-4">
			      			<div class="your-order row m0">
			      				<h4 class="this-heading">Your Cab</h4>
			      				<div class="row order-data">
			      					<div class="media name-of-car">
			      						<div class="media-left media-middle"><span>Name of car</span></div>
			      						<div class="media-body">Indica Vista</div>
			      					</div>
			      					<ul class="nav other-infos-car">
			      						<li>Price (per day) <span><i class="fa fa-inr"></i>195.00</span></li>
			      						<li>Tax (10%) <span>(free) $0.00</span></li>
			      						<li>total cost <span><i class="fa fa-inr"></i>195.00</span></li>
			      					</ul>
			      				</div>
			      				<button class="btn btn-primary btn-block">BOOK BY EMAIL!</button>							
			      			</div>
			      			<div class="row m0 choose-payment-method">
			      				<input type="radio" name="payment-method" id="payment-method01" class="sr-only" checked="">
			      				<label for="payment-method01">Pay To Driver</label>
			      				<article class="stripe">Please send your cheque to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</article>
			      				<input type="radio" name="payment-method" id="payment-method02" class="sr-only">
			      				<label for="payment-method02">Paypal <a href="#"><img src="<?php echo base_url();?>assets/images/car-detail/paypal.png" alt=""></a></label>
			      			</div>
			      			<input type="submit" value="PAY NOW!" class="btn btn-primary btn-block">
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
					FirstName:{              
						required: true,                
					},
					LastName:{              
						required: true,                
					},
					EmailAddress:{              
						required: true,                
					},
					ContactNumber:{              
						required: true,                
					},
					BrandName:{              
						required: true,                
					},
					CarId:{              
						required: true,                
					},
					PickupDate:{              
						required: true,                
					},
					DropofDate:{              
						required: true,                
					},
					StartPointCity:{              
						required: true,                
					},
					EndPointCity:{              
						required: true,                
					},
						
				 },
		    });
		});
</script>