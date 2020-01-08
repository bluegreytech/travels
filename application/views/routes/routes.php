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
           <form class="form" method="post" enctype="multipart/form-data">
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
                    ?>
                    <tr class="routes">
                       <!-- <input type="hidden" name="StartCity" value="<?php echo $routes->StartCity;?>">
                        <input type="hidden" name="EndCity" value="<?php echo $routes->EndCity;?>"> -->
                         <td>
                            <a href="<?php echo base_url();?>home?StartCity=<?php echo $routes->StartCity?>&EndCity=<?php echo $routes->EndCity?>" target="_blanck" value="<?php echo $routes->StartCity.' '.$routes->EndCity;?>">
                              <?php echo $routes->StartCity;?> to <?php echo $routes->EndCity;?></a> 
                         </td>
                    </tr>
                    <?php
                    }
                    ?>
              </tbody>
            </table>
           </form>
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