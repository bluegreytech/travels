<?php 
	 $this->load->view('common/header');
?>

  	<!--Page Cover-->
  	<section class="row page-cover">
  		<div class="container">
  			<h2 class="h1 page-title">Routes</h2>
  			<ol class="breadcrumb">
  				<li><a href="<?php echo base_url();?>">Home</a></li>
  				<li class="active">Routes</li>
  			</ol>
  		</div>
  	</section> 	
  			
  	<section class="row missin-benefits route-price">
       
  		<div class="container">

  			<div class="row mis-be ipad-width">
          <?php
          if($brandcar){                             
          foreach($brandcar as $row)
          {
                $CarBrandId=$row->CarBrandId;
                $subroutes=$this->Routes_model->getcarroutes($CarBrandId);
               // print_r($subroutes);die;
          ?>
  				<div class="col-md-6 col-sm-12 col-xs-12 mission-it">
  					<!-- <h3 class="this-title">Cabs</h3> -->
           
            <table class="table">
              <thead>
                <tr>
                  <th width="60%">Routes Of <?php echo $row->BrandName;?></th>
                </tr>
              </thead>
              <tbody>
                    <?php
                    foreach($subroutes as $routes)
                    {
                          //print_r($car);
                    ?>
                    <tr class="routes">
                        <td><?php echo $routes->StartCity;?> to <?php echo $routes->EndCity;?> </td>
                    </tr>
                    <?php
                    }
                    ?>
              </tbody>
            </table>
           
          </div>
			    <?php
             }
           }
          ?>
  				
  			</div>
      
  		</div>

  	</section>  	
   
	  <?php 
	 $this->load->view('common/footer');
	 ?>