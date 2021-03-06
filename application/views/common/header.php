<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Required meta tags always come first -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Yashdeep Travels</title>
	<!-- Favicon -->
	<link rel="shortcut icon" type="image/png" href="<?php echo base_url();?>assets/images/favicon.png">
	<!--Fonts-->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet">
	<!--Bootstrap-->
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap-theme.min.css">
	<!--Font Awesome-->
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/font-awesome.min.css">
	<!--Simple Line Icons-->
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/ionicons.min.css">
	<!--Owl Carousel-->
	<link rel="stylesheet" href="<?php echo base_url();?>assets/vendors/owl.carousel/owl.carousel.css">
	<!--Select-->
	<link rel="stylesheet" href="<?php echo base_url();?>assets/vendors/bootstrap-select/css/bootstrap-select.css">
	<!-- Timedroper -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/vendors/timedroper/timedropper.min.css">
    <!-- Datedroper -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/vendors/datedroper/datedropper.min.css">
	<!--Theme Styles-->
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/theme.css">
	<!--slider-->
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/slider.css">
	<script src="<?php echo base_url();?>assets/js/jssor.slider-27.5.0.min.js"></script>
	<script src="<?php echo base_url();?>assets/js/slider.js"></script>
</head>
<body>

	 <?php
      if($this->session->userdata('ContactNumber')!='')
      {
           $FirstName=$this->session->userdata('FirstName');
           $LastName=$this->session->userdata('LastName');
           $ContactNumber=$this->session->userdata('ContactNumber');
           $EmailAddress=$this->session->userdata('EmailAddress');
      }
  ?>
	<!--Top Bar-->
	<section class="row top-bar">
		<h2 class="hd-sec">Heading</h2>
		<div class="container">
			<div class="col-md-8 col-xs-6 col-rpadd">
				<div class="welcome-texts"><span class="welcome-text">Welcome to
					</span><span> 
						<?php
							echo $result[0]->FullName;
						?>	
					</span>
				</div>
			</div>
			<!-- Book via call Laptop -->
			<div class="col-md-4 col-xs-6 col-rpadd hidden-xs">
				<ul class="nav navbar-nav request-btn">
					<li><a href="tel:+91 90990 42156">Book Via Call</a></li>	
				</ul>
			</div>
			<!-- Login panel Mobile -->
			<div class="col-md-4 col-xs-5 col-rpadd hidden-sm hidden-md hidden-lg">
				<ul class="nav navbar-nav login-menu">
					<?php
			      	if($this->session->userdata('ContactNumber')=='')
			      	{
			      		?>
			      		<li><a href="<?php echo base_url();?>home/userlogin">Login</a></li>
			      		<?php
			      	}
			      	else if($this->session->userdata('FirstName')=='' && $this->session->userdata('LastName')=='')
			      	{
			      		?>
			      		<li><a href="<?php echo base_url();?>home/userlogin">Login</a></li>
			      		<?php
			      	}
			      	else
			      	{
			      		?>

						<li class="dropdown">
			              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
			              	<?php
			              	if($this->session->userdata('FirstName')!='' && $this->session->userdata('LastName')!='')
			              	{
			              		echo $FirstName.' '.$LastName;
			              	}
			     
			              	?>
			              	
			              	<b class="caret"></b></a>
			              <ul class="dropdown-menu">
			                <li><a href="<?php echo base_url();?>home/userprofile"><i class="fa fa-user"></i> User Profile</a></li>
			                <li><a href="<?php echo base_url();?>home/logout"><i class="fa fa-sign-out"></i> Sign Out</a></li>
			               </ul>
			            </li>
			          <?php
			      	}
			          ?>
			      	
					
	         	</ul>
			</div>

		</div>
	</section>
	<!--Info Bar-->
	<section class="row info-bar">
		<div class="container">
			<div class="row">
				<div class="col-sm-5 col-xs-8 logo-box">
					<a href="<?php echo base_url();?>" class="logo"><img src="<?php echo base_url();?>assets/images/logo.png" alt=""></a>
				</div>
				<div class="col-sm-7 col-xs-4 info-box">
					<div class="header-informations hidden-xs">
						<div class="col-md-7">
							<div class="media info-media">
								<div class="media-left"><i><img src="<?php echo base_url();?>assets/images/locate.png"></i></div>
								<div class="media-body">
									<h5 class="this-top">
									<?php
										echo $result[0]->OfficeAddress;
									?>									
								</h5>
								</div>
							</div>
						</div>
						<div class="col-md-5">
							<div class="media info-media flashit">
								<div class="media-left"><i><img src="<?php echo base_url();?>assets/images/call.png"></i></div>
								<div class="media-body">
									<h5 class="this-top call">
									<?php
										echo $result[0]->SiteContactNumber;
									?>	
									</h5>
									<h5 class="this-bottom">
									<?php
										echo $result[0]->SiteEmail;
									?>
									</h5>
								</div>
							</div>
						</div>
					</div>
					<div class="cart-nav">
						<button type="button" class="navbar-toggle nav-hider collapsed" data-toggle="collapse" data-target="#main-nav" aria-expanded="false">
							<span class="sr-only">Toggle navigation</span>
							<i class="ion-android-menu"></i>
						</button>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--Navigation-->
	<nav id="myHeader" class="navbar navbar-default main-navigation navbar-static-top">
		<div class="container">
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="main-nav">				
				<ul class="nav navbar-nav">
					<li class="active"><a href="<?php echo base_url();?>">Home</a></li>
					<li><a href="<?php echo base_url();?>about">About</a></li>
					<li><a href="<?php echo base_url();?>services">Services</a></li>
					<li><a href="<?php echo base_url();?>routes">Routes</a></li>
					<li><a href="<?php echo base_url();?>carrier">career</a></li>
					<li><a href="<?php echo base_url();?>contact">contact</a></li>


				</ul>
				
				<!-- Login panel Laptop -->
				<div class="col-rpadd hidden-xs">
					<ul class="nav navbar-nav login-menu" style="float: right;">
					<?php
			      	if($this->session->userdata('ContactNumber')=='')
			      	{
			      		?>
			      		<li><a href="<?php echo base_url();?>home/userlogin">Login</a></li>
			      		<?php
			      	}
			      	else if($this->session->userdata('FirstName')=='' && $this->session->userdata('LastName')=='')
			      	{
			      		?>
			      		<li><a href="<?php echo base_url();?>home/userlogin">Login</a></li>
			      		<?php
			      	}
			      	else
			      	{
			      		?>

						<li class="dropdown">
			              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
			              	<?php
			              	if($this->session->userdata('FirstName')!='' && $this->session->userdata('LastName')!='')
			              	{
			              		echo $FirstName.' '.$LastName;
			              	}
			     
			              	?>
			              	
			              	<b class="caret"></b></a>
			              <ul class="dropdown-menu">
			                <li><a href="<?php echo base_url();?>home/userprofile"><i class="fa fa-user"></i> User Profile</a></li>
			                <li><a href="<?php echo base_url();?>home/logout"><i class="fa fa-sign-out"></i> Sign Out</a></li>
			               </ul>
			            </li>
			          <?php
			      	}
			          ?>
			      	
		         	</ul>
				</div>				
				
			</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	</nav> 