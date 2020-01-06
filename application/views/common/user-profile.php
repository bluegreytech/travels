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
                        <th class="text-center">Action</th>
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
                        <td class="text-center">
                            <a href="#" data-toggle="modal" data-target="#faredetail"><i class="fa fa-eye" title="View Details"></i></a>
                        </td>
                        <!-- Modal -->
                        <div id="faredetail" class="modal fade" role="dialog">
                          <div class="modal-dialog faredetail">

                            <!-- Modal content-->
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Fare Detail</h4>
                              </div>
                              <div class="modal-body">
                                <div class="row mb-1">
                                    <div class="col-md-6 col-xs-6">
                                        <div class="col-md-5"><strong>Name:</strong></div>
                                        <div class="col-md-7">Veerbhadrasinh Chauhan</div>
                                    </div>
                                     <div class="col-md-6 col-xs-6">
                                        <div class="col-md-5"><strong>Phone No.:</strong></div>
                                        <div class="col-md-7">9843984930</div>
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-md-6 col-xs-6">
                                        <div class="col-md-5"><strong>Email:</strong></div>
                                        <div class="col-md-7">abc@gmail.com</div>
                                    </div>
                                     <div class="col-md-6 col-xs-6">
                                        <div class="col-md-5"><strong>Cab Type:</strong></div>
                                        <div class="col-md-7">Sedan</div>
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-md-6 col-xs-6">
                                        <div class="col-md-5"><strong>Origin:</strong></div>
                                        <div class="col-md-7">Ahemdabad</div>
                                    </div>
                                     <div class="col-md-6 col-xs-6">
                                        <div class="col-md-5"><strong>Desination:</strong></div>
                                        <div class="col-md-7">Surat</div>
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-md-6 col-xs-6">
                                        <div class="col-md-5"><strong>Pickup Date:</strong></div>
                                        <div class="col-md-7">06-Jan-2020</div>
                                    </div>
                                     <div class="col-md-6 col-xs-6">
                                        <div class="col-md-5"><strong>Drop Date:</strong></div>
                                        <div class="col-md-7">06-Jan-2020</div>
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-md-6 col-xs-6">
                                        <div class="col-md-5"><strong>Pickup Time:</strong></div>
                                        <div class="col-md-7">9:00am</div>
                                    </div>
                                     <div class="col-md-6 col-xs-6">
                                        <div class="col-md-5"><strong>Drop Time:</strong></div>
                                        <div class="col-md-7">12:00am</div>
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-md-6 col-xs-6">
                                        <div class="col-md-5"><strong>Payment:</strong></div>
                                        <div class="col-md-7">Online</div>
                                    </div>
                                    <!-- <div class="col-md-6 col-xs-6">
                                        <div class="col-md-5"><strong>Drop Time:</strong></div>
                                        <div class="col-md-7">12:00am</div>
                                    </div> -->
                                </div>
                                <div class="row price-detail">
                                    <div class="col-md-6 col-xs-6 left-border">
                                        <div class="text-center">
                                            <div><h3>Total Distance</h3></div>
                                            <div>200KM</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-xs-6">
                                         <div class="text-center">
                                            <div><h3>Total Fare</h3></div>
                                            <div>2000</div>
                                        </div>
                                    </div>
                                </div>
                              </div>
                            </div>

                          </div>
                        </div>
                        <!-- End Model --> 
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