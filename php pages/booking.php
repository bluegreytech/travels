<?php include 'header.php';?>

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
					<form action="#" class="contactForm contct-form">
			      		<div class="col-sm-8">
			      			<div class="row">
			      				<div class="form-group col-sm-6">
			      					<h5 class="this-label">First Name <span>*</span></h5>
			      					<input type="text" class="form-control">
			      				</div>
			      				<div class="form-group col-sm-6">
			      					<h5 class="this-label">Last Name <span>*</span></h5>
			      					<input type="text" class="form-control">
			      				</div>
			      				<div class="form-group col-sm-6">
			      					<h5 class="this-label">Email Address <span>*</span></h5>
			      					<input type="text" class="form-control">
			      				</div>
			      				<div class="form-group col-sm-6">
			      					<h5 class="this-label">Phone <span>*</span></h5>
			      					<input type="text" class="form-control">
			      				</div>
			      				<div class="form-group col-sm-6">
			      					<h5 class="this-label">Car Type<span>*</span></h5>
			      					<input type="text" class="form-control" value="Sedan" readonly>
			      				</div>
			      				<div class="form-group col-sm-6">
			      					<h5 class="this-label">Select Car <span>*</span></h5>
			      					 <select class="form-control" id="sel1">
			      					 	<option disabled="" selected="">Select Your Car</option>
									    <option>Indica Vista</option>
									    <option>Suzuki Swift</option>
									    <option>Hyundai Eon</option>
									    <option>Toyota Liva</option>
									    <option>Dustan Go</option>
									  </select>
			      				</div>
			      				<div class="form-group col-sm-6">
			      					<h5 class="this-label">Pickup Date</h5>
			      					<input type="text" class="form-control" placeholder="01/01/2016">
			      				</div>
			      				<div class="form-group col-sm-6">
			      					<h5 class="this-label">Drop off Date</h5>
			      					<input type="text" class="form-control" placeholder="01/04/2016">
			      				</div>
			      				<div class="form-group col-sm-6">
			      					<h5 class="this-label">Pickup Location</h5>
			      					<textarea class="form-control"></textarea>
			      				</div>
			      				<div class="form-group col-sm-6">
			      					<h5 class="this-label">Destination</h5>
			      					<textarea class="form-control"></textarea>
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
			      				<label for="payment-method02">Paypal <a href="#"><img src="images\car-detail\paypal.png" alt=""></a></label>
			      			</div>
			      			<input type="submit" value="PAY NOW!" class="btn btn-primary btn-block">
			      		</div>
			      	</form>
				</div>
			</div>
		</div>
	</section>
  	
   
<?php include 'footer.php';?>