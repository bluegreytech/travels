<?php 
	 $this->load->view('common/header');
?>

	<script>

	function m1()
	{
		var a=document.getElementById("CarRate").value;
		var b=document.getElementById("Tax").value;

		var t=a*b/100;
		document.getElementById("TaxAmount").value=t;

		var f=a-t;
		document.getElementById("FinalAmount").value=f;

	}

	</script>

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
				<?php if(($this->session->flashdata('success'))){ ?>
			        <div class="alert alert-success" id="successMessage">
			        <strong> <?php echo $this->session->flashdata('success'); ?></strong> 
			        </div>
			    <?php } ?>
				<div class="col-md-12">
					<form class="contactForm contct-form" method="post" enctype="multipart/form-data" 
				        				action="<?php echo base_url();?>home/book" id="form_valid">
			      		<div class="col-sm-8">
			      			<div class="row">
			      				<div class="form-group col-sm-6">
			      					<?php
								    if($this->session->userdata('StartCity')!='')
								    {
									 	$CarBrandId=$this->session->userdata('CarBrandId');
										$BrandName=$this->session->userdata('BrandName');
										$StartCity=$this->session->userdata('StartCity');
										$EndCity=$this->session->userdata('EndCity');
										$PickupDate=$this->session->userdata('PickupDate');
										$DropofDate=$this->session->userdata('DropofDate');
										$PickupTime=$this->session->userdata('PickupTime');
										$DropofTime=$this->session->userdata('DropofTime');
										$ContactNumber=$this->session->userdata('ContactNumber');
										$OTPNumber=$this->session->userdata('OTPNumber');
									 }
								 ?>
			      				
								<input type="hidden" name="StartCity" value="<?php echo $StartCity;?>">
								<input type="hidden" name="EndCity" value="<?php echo $EndCity;?>">
								<input type="hidden" name="PickupDate" value="<?php echo $PickupDate;?>">
								<input type="hidden" name="DropofDate" value="<?php echo $DropofDate;?>">
								<input type="hidden" name="PickupTime" value="<?php echo $PickupTime;?>">
								<input type="hidden" name="DropofTime" value="<?php echo $DropofTime;?>">
								<input type="hidden" name="ContactNumber" value="<?php echo $ContactNumber;?>">
								<input type="hidden" name="OTPNumber" value="<?php echo $OTPNumber;?>">
								<input type="hidden" name="CarBrandId" value="<?php echo $CarBrandId;?>">
								<input type="hidden" name="BrandName" value="<?php echo $BrandName;?>">

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
			      				<!-- <div class="form-group col-sm-6">
			      					<h5 class="this-label">Select Car<span>*</span></h5>
			      					 <select class="form-control" name="CarId" onChange="getcartype(this.value)" 
			      					 id="carid">
			      					 	<option desabled value="">Select Your car</option>
										<?php
										// if($subcar)
										// {
											// foreach($subcar as $subcarData)
											// {
										?>
								
											<option value="<?php// echo $subcarData->CarId; ?>"><?php //echo $subcarData->CarName;?></option>
										<?php
										// }}
										?>
									  </select>
			      				</div> -->
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
			      					<input type="text" class="form-control" name="StartCity" placeholder="Pickup location" value="<?php echo $StartCity;?>" readonly>
			      				</div>
			      				<?php
	      						if($this->session->userdata('DropofTime')=='')
	      						{
	      						?>
			      				<div class="form-group col-sm-6">
			      					<h5 class="this-label">Destination<span>*</span></h5>
			      					<input type="text" class="form-control" name="EndCity" placeholder="Drop of location" value="<?php echo $EndCity;?>" readonly>
			      				</div>
			      				<?php
	      						}
	      						else
	      						{

	      							
	      						}
	      						?>
			      				<div class="form-group col-sm-6">
			      					<h5 class="this-label">Pickup Time<span>*</span></h5>
			      					<input type="text" class="form-control" name="PickupTime" placeholder="Pickup time" value="<?php echo $PickupTime;?>" readonly>
			      				</div>
			      				<div class="form-group col-sm-6">
			      					<h5 class="this-label">Drop Time<span>*</span></h5>
			      					<input type="text" class="form-control" name="DropofTime" placeholder="Drop of time" value="<?php echo $DropofTime;?>" readonly>
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
			      						<div class="media-left media-middle"><span>Type Of Cab</span></div>
			      						<div class="media-body"><input type="text" name="BrandName" readonly value="<?php echo $BrandName;?>"></div>
			      					</div>
			      					
			      					<ul class="nav other-infos-car">
			      						<li>Per KM Fare <span><i class="fa fa-inr"></i>
			      							<input type="text" name="PerKmRate" value="<?php echo $brandcar['PerKmRate'];?>" readonly></span>
			      						</li>

			      						<?php
			      						if($this->session->userdata('DropofTime')=='')
			      						{
			      						?>

			      						<li>KMS <span><i class="fa fa-inr"></i>
			      							<?php
			      							if($this->session->userdata('PickupDate')!='')
			      							{
			      								$RoundFare=200;
			      								?>
			      									<input type="text" name="KMS" value="<?php echo $RoundFare; ?>" readonly></span>
			      								<?php
			      							}
			      							else
			      							{
			      								$RoundFare=200*2;
			      								?>
													<input type="text" name="KMS" value="<?php echo $RoundFare; ?>" readonly></span>
			      								<?php
			      							}
			      							?>
			      							
			      						</li>

			      						<?php
			      							$TotalFareAmount=$brandcar['PerKmRate']*$RoundFare;
			      						?>

			      						<li>Total Fare Rs <span><i class="fa fa-inr"></i>
			      							<input type="text" name="TotalFareAmount" value="<?php echo $TotalFareAmount ?>" readonly></span>
			      						</li>

			      						<li>Extra KMS <span><i class="fa fa-inr"></i>
			      							<input type="text" name="ExtraKMS" value="<?php echo $brandcar['ExtraKMS'];?>" readonly></span>
			      						</li>

			      						<!-- <li>Driver <span><i class="fa fa-inr"></i>
			      							<input type="text" name="DriverAllowancePerDay" value="<?php //echo $brandcar['DriverAllowancePerDay'];?>"></span>
			      						</li> -->

			      						<li>State Tax  <span><i class="fa fa-inr"></i>
			      							<input type="text" name="StateTax" value="<?php echo $brandcar['StateTax'];?>" readonly></span>
			      						</li>
										<?php
			      							$TotalAmount=$brandcar['StateTax']+$TotalFareAmount;
			      						?>
			      						<li>total cost <span><i class="fa fa-inr"></i>
			      							<input type="text" name="TotalAmount" value="<?php echo $TotalAmount;?>" readonly> </span>
			      						</li>

			      						<li>Tax (<?php
										    echo $Taxes=$result[0]->Tax;?>%) <span>
											<input type="hidden" name="Tax" value="<?php echo $Taxes;?>" readonly>
											<!-- <input type="hidden"  name="Tax"> --></span>
										</li>

										<?php
			      							$TaxAdded=$TotalAmount*$Taxes/100;
			      						?>

										<li>Tax Fare<span><i class="fa fa-inr"></i>
			      							<input type="text" name="TaxAdded" value="<?php echo $TaxAdded;?>" readonly>
			      							 </span>
			      						</li>
										<?php
			      							$FinalAmount=$TaxAdded+$TotalAmount;
			      						?>
			      						<li>Final Fare<span><i class="fa fa-inr"></i>
			      							<input type="text" id="FinalAmount" name="FinalAmount" value="<?php echo $FinalAmount;?>" readonly> </span>
			      						</li>
										
			      						<?php
			      						}
			      						?>

			      					</ul>
			      				</div>
			      				<!-- <button class="btn btn-primary btn-block">BOOK BY EMAIL!</button>	 -->						
			      			</div>
			      			<div class="row m0 choose-payment-method">
			      				<input type="radio" name="payment-method" id="payment-method01" class="sr-only" checked="">
			      				<label for="payment-method01">Pay To Driver</label>
			      				<article class="stripe">Please send your cheque to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</article>
			      				<input type="radio" name="payment-method" id="payment-method02" class="sr-only">
			      				<label for="payment-method02">Paypal <a href="#"><img src="<?php echo base_url();?>assets/images/car-detail/paypal.png" alt=""></a></label>

			      				<label class="checkbox-inline agreement"><input type="checkbox" value="">I accept the <a href="#" data-toggle="modal" data-target="#Conditions">Terms and Conditions</a></label>
			      				<!-- Modal -->
								<div id="Conditions" class="modal fade" role="dialog">
								  <div class="modal-dialog">

								    <!-- Modal content-->
								    <div class="modal-content">
								      <div class="modal-header">
								        <button type="button" class="close" data-dismiss="modal"><i class="fa fa-times"></i></button>
								        <h4 class="modal-title">Terms and Conditions</h4>
								      </div>
								      <div class="modal-body condition-points">
								        <p>Fare inclusive of Driver Allowance & Other Charges except Government Taxes.</p>
								        <p>Remove your eyes off Odometer as we don't charge by KMs.</p>
								         <p>We understand Plans change, that’s why we do not charge any Cancellation Fees.</p>
								      </div>
								    </div>
								  </div>
								</div>
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

<script>
	function getcartype(CarBrandId) {
	alert(carid);
	url="<?php echo base_url();?>"
	$.ajax({
         url: url+'home/getcartype',
         type: 'post',
		 data:{CarBrandId:CarBrandId},
         success:function(response){
			var response = JSON.parse(response);
               console.log(response);
			//   console.log(response.FullName);
            $('#CarBrandId').val(response.CarBrandId);
			$('#BrandName').val(response.BrandName);
			// $('#CarRate').val(response.CarRate);
			// $('#StateTax').val(response.StateTax);
         }
      });	

}



</script>


<script type="text/javascript">
		$(function() { 
		    setTimeout(function() {
		  $('#successMessage').fadeOut('fast');
		}, 3000);
		   
		});
	
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
					PickupTime:{              
						required: true,                
					},
					
					CarName:{              
						required: true,                
					},
					CarRate:{              
						required: true,                
					},
					Tax:{              
						required: true,                
					},
					FinalAmount:{              
						required: true,                
					},
						
				 },
		    });
		});
</script>