<?php 
	 $this->load->view('common/header');
?>


  	<!--Page Cover-->
  	<section class="row page-cover">
  		<div class="container">
  			<h2 class="h1 page-title">Fare Information</h2>
  			<ol class="breadcrumb">
  				<li><a href="index.php">Home</a></li>
  				<li class="active">Fare Information</li>
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
				       id="form_valid" action="<?php echo base_url();?>home/book">
			      		<div class="col-sm-8">
			      			<div class="row">
			      				<div class="form-group col-sm-6">
			      					<?php
								    if($this->session->userdata('StartCity')!='')
								    {
									 	$CarBrandId=$this->session->userdata('CarBrandId');
										$BrandName=$this->session->userdata('BrandName');
										$PerHoureFare=$this->session->userdata('PerHoureFare');
										$StartCity=$this->session->userdata('StartCity');
										$EndCity=$this->session->userdata('EndCity');
										$PickupDate=$this->session->userdata('PickupDate');
										$DropofDate=$this->session->userdata('DropofDate');
										$PickupTime=$this->session->userdata('PickupTime');
										$DropofTime=$this->session->userdata('DropofTime');
										$ContactNumber=$this->session->userdata('ContactNumber');
										$OTPNumber=$this->session->userdata('OTPNumber');

										$LocalTripId=$this->session->userdata('LocalTripId');
										
									 }
								 ?>

									<?php
									if($this->session->userdata('LocalTripId')!='')
									{
										$localresult=$this->Login_model->getlocal_pack($LocalTripId);
										foreach($localresult as $res)
										{
											$LocalTripId=$res->LocalTripId;
											$PerHourKMS=$res->PerHourKMS;
											$Hours=$res->Hours;
											
											
										}
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
								<input type="hidden" name="PerHoureFare" value="<?php echo $PerHoureFare; ?>">

								

			      					<h5 class="this-label">First Name<span>*</span></h5>
			      					<input type="text" class="form-control" name="FirstName" id="FirstName" placeholder="Enter First Name" minlength="2" maxlength="25" >
			      				</div>
			      				<div class="form-group col-sm-6">
			      					<h5 class="this-label">Last Name<span>*</span></h5>
			      					<input type="text" class="form-control" name="LastName" id="LastName" placeholder="Enter Last Name" minlength="2" maxlength="12" >
			      				</div>
			      				<div class="form-group col-sm-6">
			      					<h5 class="this-label">Email Address<span>*</span></h5>
			      					<input type="email" class="form-control" name="EmailAddress" id="EmailAddress" placeholder="Enter Email Address">
			      				</div>
			      				<div class="form-group col-sm-6">
			      					<h5 class="this-label">Contact Number<span>*</span></h5>
			      					<input type="text" class="form-control" name="ContactNumber" id="ContactNumber" placeholder="Enter 10 Digit Mobile Number" minlength="10" maxlength="10" value="<?php echo $ContactNumber;?>" readonly>
			      				</div>
			      				<div class="form-group col-sm-6">
			      					<h5 class="this-label">Cab Type<span>*</span></h5>
			      					<input type="text"  class="form-control" placeholder="Select Brand Car" id="BrandName" name="BrandName" value="<?php echo $BrandName;?>" readonly> 
			      				</div>
			      			
			      				<div class="form-group col-sm-6">
			      					<h5 class="this-label">Pickup Date<span>*</span></h5>
			      					<input type="text" class="form-control" name="PickupDate" id="PickupDate" placeholder="dd/mm/yyyy" value="<?php echo $PickupDate;?>" readonly>
			      				</div>

			      				<div class="form-group col-sm-6">
			      					<h5 class="this-label">Drop off Date<span>*</span></h5>
			      				<?php
			      				if($DropofDate=='')
			      				{
			      					?>
			      					<input type="text" class="form-control" id="DropofDate"  name="DropofDate" placeholder="dd/mm/yyyy" value="<?php echo $PickupDate;?>" readonly>
			      					<?php
			      				}
			      				else
			      				{
			      					?>

			      					<input type="text" class="form-control" id="DropofDate" name="DropofDate" placeholder="dd/mm/yyyy" value="<?php echo $DropofDate;?>" readonly>
			      					<?php
			      				}
			      				?>
			      				</div>

			      				<div class="form-group col-sm-6">
			      					<h5 class="this-label">Pickup Location<span>*</span></h5>
			      					<input type="text" class="form-control" name="StartCity" id="StartCity" placeholder="Pickup location" value="<?php echo $StartCity;?>" readonly>
			      				</div>

			      				<?php
	      						if($this->session->userdata('DropofTime')=='')
	      						{
	      						?>

			      				<div class="form-group col-sm-6">
			      					<h5 class="this-label">Destination<span>*</span></h5>
			      					<input type="text" class="form-control" name="EndCity" id="EndCity" placeholder="Drop of location" value="<?php echo $EndCity;?>" readonly>
			      				</div>
			      				<?php
	      						}
	      						?>

			      				<div class="form-group col-sm-6">
			      					<h5 class="this-label">Pickup Time<span>*</span></h5>
			      					<input type="text" class="form-control" name="PickupTime" id="PickupTime" placeholder="Pickup time" value="<?php echo $PickupTime;?>" readonly>
			      				</div>

			      				<?php
	      						if($this->session->userdata('DropofTime')!='')
	      						{
	      						?>
			      				<div class="form-group col-sm-6">
			      					<h5 class="this-label">Drop Time<span>*</span></h5>
			      					<input type="text" class="form-control" name="DropofTime" id="DropofTime" placeholder="Drop of time" value="<?php echo $DropofTime;?>" readonly>
			      				</div>
								<?php
	      						}
	      						?>
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
			      						<div class="media-body"><input type="text" name="BrandName" id="BrandName" readonly value="<?php echo $BrandName;?>"></div>
			      					</div>
			      					
			      					<ul class="nav other-infos-car">
			      						
		      						<?php
		      						if($this->session->userdata('EndCity')!='')
		      						{
			      						if($this->session->userdata('DropofTime')=='')
			      						{
			      						?>
			      						<li>Per KM Fare <span><i class="fa fa-inr"></i>
			      							<input type="text" name="PerKmRate" id="PerKmRate" value="<?php echo $brandcar['PerKmRate'];?>" readonly></span>
			      						</li>

			      						<li>KMS <span><i class="fa fa-inr"></i>
			      							<?php
			      							if($this->session->userdata('PickupDate')!='' && $this->session->userdata('DropofDate')=='')
			      							{
			      								$RoundFare=200;
			      								//$RoundFare=$result[0]->PerTripMinKMS;
			      								?>
			      									<input type="text" name="KMS" id="KMS" value="<?php echo $RoundFare; ?>" readonly></span>
			      								<?php
			      							}
			      							else
			      							{
			      								$RoundFare=200*2;
			      								if($RoundFare <= $result[0]->PerTripMinKMS)
			      								{
			      									?>
													<input type="text" name="KMS" id="KMS" value="<?php echo $result[0]->PerTripMinKMS; ?>" readonly></span>
			      									<?php
			      								}
			      								else
			      								{
			      									?>
													<input type="text" name="KMS" id="KMS" value="<?php echo $RoundFare; ?>" readonly></span>
			      									<?php
			      								}
			      				
			      								
			      							}
			      							?>
			      							
			      						</li>

			      						<?php
			      							$TotalFareAmount=$brandcar['PerKmRate']*$RoundFare;
			      						?>

			      						<li>Total Fare Rs <span><i class="fa fa-inr"></i>
			      							<input type="text" name="TotalFareAmount" id="TotalFareAmount" value="<?php echo $TotalFareAmount ?>" readonly></span>
			      						</li>

			      						<li>Extra KMS <span><i class="fa fa-inr"></i>
			      							<input type="text" name="ExtraKMS" id="ExtraKMS" value="<?php echo $brandcar['ExtraKMS'];?>" readonly></span>
			      						</li>

			      						<!-- <li>Driver <span><i class="fa fa-inr"></i>
			      							<input type="text" name="DriverAllowancePerDay" value="<?php //echo $brandcar['DriverAllowancePerDay'];?>"></span>
			      						</li> -->

			      						<li>State Tax  <span><i class="fa fa-inr"></i>
			      							<input type="text" name="StateTax" id="StateTax" value="<?php echo $brandcar['StateTax'];?>" readonly></span>
			      						</li>
										<?php
			      							$TotalAmount=$brandcar['StateTax']+$TotalFareAmount;
			      						?>
			      						<li>total cost <span><i class="fa fa-inr"></i>
			      							<input type="text" name="TotalAmount" id="TotalAmount" value="<?php echo $TotalAmount;?>" readonly> </span>
			      						</li>

			      						<li>Tax (<?php
										    echo $Taxes=$result[0]->Tax;?>%) <span>
											<input type="hidden" name="Tax" id="Tax" value="<?php echo $Taxes;?>" readonly>
											</span>
										</li>

										<?php
			      							$TaxAdded=$TotalAmount*$Taxes/100;
			      						?>

										<li>Tax Fare<span><i class="fa fa-inr"></i>
			      							<input type="text" name="TaxAdded" id="TaxAdded" value="<?php echo $TaxAdded;?>" readonly>
			      							 </span>
			      						</li>
										<?php
			      							$FinalAmount=$TaxAdded+$TotalAmount;
			      						?>
			      						<li>Final Fare<span><i class="fa fa-inr"></i>
			      							<input type="text" id="FinalAmount"id="FinalAmount" name="FinalAmount" value="<?php echo $FinalAmount;?>" readonly> </span>
			      						</li>
										
			      					<?php
			      						}
			      					}
			      					// else if($this->session->userdata('EndCity')!='' && $this->session->userdata('DropofDate')!='')
			      					// {

			      					// }
			      					else
			      					{
			      						?>
			      						<li>Per Hour Fare <span><i class="fa fa-inr"></i>
			      							<input type="hidden" name="LocalTripId" id="LocalTripId" value="<?php echo $LocalTripId;?>" readonly>
			      							<input type="text" name="PerHoureFare" id="PerHoureFare" value="<?php echo $brandcar['PerHoureFare'];?>" readonly></span>
			      						</li>

			      						<li>KMS <span>
			      							<input type="text" name="PerHourKMS" id="PerHourKMS" value="<?php echo $PerHourKMS;?>" readonly></span>
			      						</li>

			      						<li>Hours<span>
			      							<input type="text" name="Hours" id="Hours" value="<?php echo $Hours;?>" readonly></span>
			      						</li>

			      						<?php
			      							$FinalAmount=$PerHoureFare*$Hours;
			      						?>
			      						<li>Final Fare<span><i class="fa fa-inr"></i>
			      							<input type="text" id="FinalAmount"id="FinalAmount" name="FinalAmount" value="<?php echo $FinalAmount;?>" readonly> </span>
			      						</li>
											
											
			      						<?php
			      					}
			      					?>
			      					</ul>




			      				</div>
			      									
			      			</div>
			      			<div class="row m0 choose-payment-method">

			      				<input type="radio" name="payment-method" id="payment-method01" class="sr-only" checked="">
			      				<label for="payment-method01">Pay To Driver</label>
			      				<article class="stripe">Please send your cheque to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</article>

			      				<?php
			      				if($this->session->userdata('EndCity')!='')
			      				{
			      				?>	

			      				<input type="radio" name="payment-method" data-amount="<?php echo $FinalAmount;?>" data-id="1"  id="payment-method02"  class="sr-only">
			      				<label for="payment-method02">Razorpay <a href="#"><img src="<?php echo base_url();?>assets/images/car-detail/paypal.png" alt=""></a></label>

								<?php
			      				}
			      				?>	

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

			      			<input type="button" id="submit" value="PAY NOW!" class="btn btn-primary btn-block" style="display:none">

			      			<input type="submit" id="booknow" value="Book NOW!" class="btn btn-primary btn-block">

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
$(document).ready(function(){
  $("#payment-method01").click(function(){
    $("#submit").hide();
	$("#booknow").show();
  });
  $("#payment-method02").click(function(){
    $("#booknow").hide();
	$("#submit").show();
  });
});
</script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.css">
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.4/jquery-confirm.min.js" text="javascript"></script>

<script>	
var SITEURL = "<?php echo base_url() ?>";
$('body').on('click', '#submit', function(e)
{
	if($('#FirstName').val() == "")
        {
            $.alert({ title: 'Alert !', content: "Please enter First Name.", type: 'red', typeAnimated: true, }); return false; 
        }
      	else 
      	{
            if($('#LastName').val() == "") {
                $.alert({ title: 'Alert !', content: "Please enter Last Name.", type: 'red', typeAnimated: true, }); return false; 
        }
        else {
            if($('#EmailAddress').val() == "") {
                $.alert({ title: 'Alert !', content: "Please enter Email Address.", type: 'red', typeAnimated: true, }); return false; 
            }
        else
        {


    //var totalAmount = $('#FinalAmount').val();
    var FirstName = $('#FirstName').val();
    var LastName = $('#LastName').val();
    var EmailAddress = $('#EmailAddress').val();
    var ContactNumber = $('#ContactNumber').val();
    var CarBrandId = $('#CarBrandId').val();
    var BrandName = $('#BrandName').val();
    var PickupDate = $('#PickupDate').val();
    var DropofDate = $('#DropofDate').val();
    var PickupTime = $('#PickupTime').val();
  	var DropofTime = $('#DropofTime').val();
   	var StartCity = $('#StartCity').val();
    var EndCity = $('#EndCity').val();
    var PerKmRate = $('#PerKmRate').val();
    var KMS = $('#KMS').val();
    var TotalFareAmount = $('#TotalFareAmount').val();
    var ExtraKMS = $('#ExtraKMS').val();
    var StateTax = $('#StateTax').val();
    var Tax = $('#Tax').val();
    var TotalAmount = $('#TotalAmount').val();
    var TaxAdded = $('#TaxAdded').val();
    var totalAmount = $('#FinalAmount').val();
  	

    var options = {
    //"key":'rzp_test_C7fnEIVjsS6Bsd',
    "key":'rzp_test_ZoADm9oDeOx3hS',   
    "amount":(totalAmount*100), // 2000 paise = INR 20
    "name": "Yashdeep Travel Pay",
    "description": "Report  Payment",
    "image": "<?php echo base_url();?>assets/images/favicon.png",
    "handler": function (response){
      console.log(response);
          $.ajax({
            url: SITEURL + 'home/razorPaySuccess',
            type: 'post',
            dataType: 'json',
            data: {
                razorpay_payment_id:response.razorpay_payment_id,FinalAmount:totalAmount,FirstName:FirstName,LastName:LastName,EmailAddress:EmailAddress,ContactNumber:ContactNumber,CarBrandId:CarBrandId,BrandName:BrandName,PickupDate:PickupDate,DropofDate:DropofDate,PickupTime:PickupTime,DropofTime:DropofTime,StartCity:StartCity,EndCity:EndCity,PerKmRate:PerKmRate,KMS:KMS,TotalFareAmount:TotalFareAmount,ExtraKMS:ExtraKMS,StateTax:StateTax,Tax:Tax,TotalAmount:TotalAmount,TaxAdded:TaxAdded
            }, 
            success: function (msg) { 
            	//alert(msg);
                window.location.href = '<?php echo base_url();?>home/ThankYou';
               // console.log(msg);
             
            }
        });
    },
    "theme": {
        "color": "#528FF0"
          }
  };
  var rzp1 = new Razorpay(options);
  rzp1.open();
  e.preventDefault();
  }
}
}
});

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
