<?php 
	 $this->load->view('common/header');
?>

  	<!--Page Cover-->
  	<section class="row page-cover">
  		<div class="container">
  			<h2 class="h1 page-title">About us</h2>
  			<ol class="breadcrumb">
  				<li><a href="<?php echo base_url();?>">Home</a></li>
  				<li class="active">About</li>
  			</ol>
  		</div>
  	</section> 	
  	<section class="wrapper-about">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-sm-12 col-xs-12">
					<div class="media-left">
						<?php
            if($about[0]->AboutImage!='')
            {
                ?>
                  <span><img src="<?php echo base_url();?>admin/upload/aboutimage/<?php echo $about[0]->AboutImage;?>" alt="" width="100%"></span>
                <?php
            }
            else
            {
              ?>
                  <span><img src="<?php echo base_url();?>assets/images/about/about-us.png" alt="" width="100%"></span>
              <?php
            }  
            ?>
					</div>
				</div>
				<div class="col-md-6 col-sm-12 introduction">  			
					<div class="row section-title m0">
						<h6 class="this-top">Introduction</h6>
						<h2 class="h1 this-main"> 
                <?php
                  echo $about[0]->AboutTitle;
                ?>
            </h2>
						<p>
                <?php
                  echo $about[0]->AboutDescription;
                ?>
						</p>
					</div>
				</div>
			</div>
		</div>
  	</section>  	

  	<section class="row missin-benefits nopadding">
  		<div class="container">
  			<div class="row mis-be ipad-width">
  				<div class="col-md-6 col-sm-12 col-xs-12 mission-it">
  					<h3 class="this-title">
                <?php
                  echo $about[0]->SecondTitle;
                ?>  
            </h3>
  					<p class="this-para">
                <?php
                  echo $about[0]->SecondDescription;
                ?>
            </p>
  				</div>
  				<div class="col-md-6 col-sm-12 col-xs-12 mission-it">
  					<h3 class="this-title">
                <?php
                  echo $about[0]->ThirdTitle;
                ?>
            </h3>
  					<p class="this-para">
                <?php
                  echo $about[0]->ThirdDescription;
                ?>  
            </p>
  				</div>
  			</div>
  		</div>
  	</section>

    <section class="row missin-benefits">
      <div class="container">
        <div class="row mis-be ipad-width">
          <div class="col-md-12 col-sm-12 col-xs-12 mission-it">
            <h3 class="this-title">
                <?php
                  echo $about[0]->FourthTitle;
                ?>
            </h3>
            <p class="this-para">
                <?php
                  echo $about[0]->FourthDescription;
                ?>  
            </p>
          </div>
        </div>
      </div>
    </section>

  

	<?php 
	 $this->load->view('common/footer');
	?>