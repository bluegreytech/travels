<?php 
	 $this->load->view('common/header');
?>

	<!--Page Cover-->
	<section class="row page-cover">
		<div class="container">
			<h2 class="h1 page-title">contact us</h2>
			<ol class="breadcrumb">
				<li><a href="index.html">home</a></li>
				<li class="active">contact</li>
			</ol>
		</div>
	</section>  	
	<section class="wrapper-about">
		<div class="container">
			<div class="row section-title text-center">
				<h6 class="this-top">Send Message</h6>
				<h2 class="h1 this-main">Drop us message for any query</h2>
			</div>
			<div class="row">
				<div class="col-md-6 col-sm-6">
						<?php if(($this->session->flashdata('error'))){ ?>
							<div class="alert alert-danger" id="errorMessage">
							<strong> <?php echo $this->session->flashdata('error'); ?></strong> 
							</div>
							<?php } ?>
							<?php if(($this->session->flashdata('success'))){ ?>
									<div class="alert alert-success" id="successMessage">
									<strong> <?php echo $this->session->flashdata('success'); ?></strong> 
									</div>
							<?php } ?>
							<?php if(($this->session->flashdata('warning'))){ ?>
							<div class="alert alert-warning" id="warningMessage">
							<strong> <?php echo $this->session->flashdata('warning'); ?></strong> 
							</div>
						<?php } ?>

                
					<div class="contact-form-info">
						<form class="contct-form contactForm row m0" id="form_valid" method="post" >
							<div class="col-md-6">
								<div class="input-group">
									<input type="text" name="FullName" class="form-control" placeholder="Your full name">
								</div>
							</div>
							<div class="col-md-6">
								<div class="input-group">
									<input type="email" name="EmailAddress" class="form-control" placeholder="Enter your email">
								</div>
							</div>
							<div class="col-md-6">
								<div class="input-group">
									<input type="tel" name="ContactNumber" id="ContactNumber" class="form-control" placeholder="Enter Mobile Number">
								</div>
							</div>
							<div class="col-md-6">
								<div class="input-group">
									<input type="text" name="City"  class="form-control" placeholder="Enter city">
								</div>
							</div>
							<div class="col-md-12">
								<div class="input-group">
									<textarea name="MessageDescription" class="form-control" placeholder="Enter your query"></textarea>
								</div>
							</div>
							<div class="col-md-12">
								<input type="submit" value="SEND MESSENGE" class="btn btn-primary">
							</div>
						</form>
					</div>
				</div>
				<div class="col-md-6 col-sm-6">
					<div class="contact-info">
	                    <ul>
	                        <li>
	                            <div class="icon">
	                                <i class="fa fa-map-marker"></i>
	                            </div>
	                            <span>Address</span>
								<?php
									echo $result[0]->OfficeAddress;
								?>
	                        </li>

	                        <li>
	                            <div class="icon">
	                                <i class="fa fa-envelope"></i>
	                            </div>
	                            <span>Email</span>
	                            <?php
									echo $result[0]->SiteEmail;
								?>
	                        </li>

	                        <li>
	                            <div class="icon">
	                                <i class="fa fa-phone"></i>
	                            </div>
	                            <span>Phone</span>
	                            <a href="tel:<?php
									echo $result[0]->SiteContactNumber;
								?>">
								<?php
									echo $result[0]->SiteContactNumber;
								?>
								</a>
	                         
	                        </li>
	                    </ul>
	                </div>
				</div>
			</div>
		</div>
	</section>
	
	<section>
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14765.85587080295!2d73.1715233!3d22.2982862!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x65d3f36ae97baca2!2sYashdeepTravels!5e0!3m2!1sen!2sin!4v1575882974890!5m2!1sen!2sin" width="100%" height="400" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
				</div>
			</div>
		</div>
	</section> 	
 	
	<?php 
	 $this->load->view('common/footer');
	 ?>

	 <script>

	 
		$(function() { 
		setTimeout(function() {
		$('#errorMessage').fadeOut('fast');
		}, 10000);  
		});

		$(function() { 
		setTimeout(function() {
		$('#successMessage').fadeOut('fast');
		}, 10000);  
		});

		$(function() { 
		setTimeout(function() {
		$('#warningMessage').fadeOut('fast');
		}, 10000);  
		});

		$("#ContactNumber").on("input", function(evt) {
		var self = $(this);
		self.val(self.val().replace(/[^\d].+/, ""));
		if ((evt.which < 48 || evt.which > 57)) 
		{
			evt.preventDefault();
		}});

$(document).ready(function()
{
		$("#form_valid").validate(
		{
				rules: {
					FullName: {
							required: true,
								},
					EmailAddress: {
							required: true,
								},
					ContactNumber: {
							required: true,
								},
					City: {
							required: true,
								},
					MessageDescription: {
							required: true,
								},
								
				},

				messages:{
					FullName: {
							required: "Please enter a full name",
								},
					EmailAddress: {
							required: "Please enter a emai address",
								},
					ContactNumber: {
							required: "Please enter a contact number ",
								},
					City: {
							required: "Please enter a your city",
								},
					MessageDescription: {
							required: "Please enter a your query",
								},
			},
		});		
});	







</script>