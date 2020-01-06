<?php 
   $this->load->view('common/header');
?>

 
  <!--Page Cover-->
  <section class="row page-cover">
    <div class="container">
      <h2 class="h1 page-title">User Profile</h2>
      <ol class="breadcrumb">
        <li><a href="index.php">home</a></li>
        <li class="active">User Profile</li>
      </ol>
    </div>
  </section> 

  
    <section class="missin-benefits">
      <div class="container">
          <div class="row">
            <div class="col-sm-3 col-xs-12 benefit-it">
              <div id="sidebar">
                <div class="pro-user">
                  <img src="http://rn53themes.net/themes/demo/education-master/images/user.jpg" alt="user">
                </div>
                  
                  <div class="pro-user-bio">
                    <ul>
                        <li>
                            <h4><?php echo $this->session->userdata('FirstName')?> <?php echo $this->session->userdata('LastName');?></h4>
                            <input type="hidden" name="FirstName" value="<?php echo $this->session->userdata('FirstName')?>">
                          <input type="hidden" name="LastName" value="<?php echo $this->session->userdata('LastName')?>">
                          <input type="hidden" name="LastName" value="<?php echo $this->session->userdata('ContactNumber')?>">
                        </li>
                        <li><a href="#"><i class="fa fa-envelope"></i> <?php echo $this->session->userdata('EmailAddress')?></a></li>
                        <li><a href="#"><i class="fa fa-phone"></i> +91 <?php echo $this->session->userdata('ContactNumber')?></a></li>
                        <!-- <li><a href="#profile"><i class="fa fa-user"></i> User Profile</a></li> -->
                        <li><a href="#history"><i class="fa fa-history"></i> Booking History</a></li>
                        <li><a href="#feedback"><i class="fa fa-comments-o "></i> Feedback</a></li>
                    </ul>
                  </div>

              </div>
            </div>

            <div class="col-sm-9 col-xs-12">
              <div class="col-sm-12 content-side book-history" id="history">

                <?php if(($this->session->flashdata('wrong'))){ ?>
                  <div class="alert alert-danger" id="wrongMessage">
                  <strong> <?php echo $this->session->flashdata('wrong'); ?></strong> 
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


                <h3 class="this-title"><i class="fa fa-history"></i>Booking History</h3>
                <div class="table-responsive">          
                  <table class="table">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Brand</th>
                        <th>Pickup Date</th>
                        <th>Start Point</th>
                        <th>End Point</th>
                        <th>Fare</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                          $i=1;
                          if($cabhistory){                             
                          foreach($cabhistory as $row)
                          {
                      ?>
                      <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $row->BrandName; ?></td>
                        <td><?php echo $row->PickupDate; ?></td>
                        <td><?php echo $row->StartCity; ?></td>
                        <td><?php if($row->EndCity!=''){echo $row->EndCity;}else{echo "N/A";}  ?></td>
                        <td><i class="fa fa-inr"></i> <?php echo $row->FinalAmount;?></td>
                      </tr>
                      <?php
                      $i++;
                          } }
                      ?> 
                    </tbody>
                  </table>
                </div>
              </div>

              <div class="col-sm-12 content-side" id="feedback">
                <h3 class="this-title"><i class="fa fa-comments-o"></i> Valuable Feedback</h3>
                <div class="contact-form-info">
                  <form method="post" action="<?php echo base_url();?>home/userfeedback" class="contct-form row m0">
                  <?php
                  if($TestimonialId=='')
                  {
                  ?>
                    <div class="col-md-12">
                        <input type="hidden" name="TestimonialId" value="<?php echo $feedbackhistory[0]->TestimonialId;?>">
                        <input type="hidden" name="FirstName" value="<?php echo $this->session->userdata('FirstName');?>">
                        <input type="hidden" name="LastName" value="<?php echo $this->session->userdata('LastName');?>">
                        <input type="hidden" name="ContactNumber" value="<?php echo $this->session->userdata('ContactNumber');?>">
                    <div>
                        <textarea id="message" name="TestimonialDescription" class="form-control" placeholder="Your Valuable Review"><?php echo $feedbackhistory[0]->TestimonialDescription;?></textarea>
                    </div>
                      <br>
                    </div>
                    <?php
                    }
                    else
                    {
                      ?>
                      <div class="col-md-12">
                        <input type="hidden" name="FirstName" value="<?php echo $this->session->userdata('FirstName');?>">
                        <input type="hidden" name="LastName" value="<?php echo $this->session->userdata('LastName');?>">
                        <input type="hidden" name="ContactNumber" value="<?php echo $this->session->userdata('ContactNumber');?>">
                    <div>
                        <textarea id="message" name="TestimonialDescription" class="form-control" placeholder="Your Valuable Review"></textarea>
                    </div>
                      <br>
                    </div>
                    <?php
                    }
                    ?>
                    <div class="col-md-12">
                      <input type="submit" value="SUBMIT" class="btn btn-primary">
                    </div>
                  </form>
                </div> 
              </div>


             </div>
          </div>


      </div>
    </section>
  
  
<?php 
   $this->load->view('common/footer');
?>

<script type="text/javascript">

  $(function() { 
      setTimeout(function() {
      $('#wrongMessage').fadeOut('fast');
    }, 10000);
       
    });

    $(function() { 
      setTimeout(function() {
      $('#successMessage').fadeOut('fast');
    }, 10000);
       
    });

  $('#sidebar').affix({
      offset: {
        top: 530,
        bottom:360
      }
}); 
</script>