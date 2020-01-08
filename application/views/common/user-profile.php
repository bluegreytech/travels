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
                  <img src="<?php echo base_url();?>assets/images/user.png" alt="user">
                </div>
                  
                  <div class="pro-user-bio">
                    <ul>
                        <li>
                            <h4><?php echo $this->session->userdata('FirstName')?> <?php echo $this->session->userdata('LastName');?></h4>
                            <input type="hidden" name="FirstName" value="<?php echo $this->session->userdata('FirstName')?>">
                          <input type="hidden" name="LastName" value="<?php echo $this->session->userdata('LastName')?>">
                          <input type="hidden" name="LastName" value="<?php echo $this->session->userdata('ContactNumber')?>">
                        </li>
                        <li><a><i class="fa fa-envelope"></i> <?php echo $this->session->userdata('EmailAddress')?></a></li>
                        <li><a><i class="fa fa-phone"></i> +91 <?php echo $this->session->userdata('ContactNumber')?></a></li>
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
                            <a href="#" data-id="<?=$row->UserId; ?>" data-toggle="modal" data-target="#faredetail"><i class="fa fa-eye" title="View Details"></i></a>
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
                                                <div class="col-md-7"><input type="text" id="FirstName" readonly></div>
                                            </div>
                                             <div class="col-md-6 col-xs-6">
                                                <div class="col-md-5"><strong>Phone No.:</strong></div>
                                                <div class="col-md-7"><input type="text" id="ContactNumber" readonly></div>
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <div class="col-md-6 col-xs-6">
                                                <div class="col-md-5"><strong>Email:</strong></div>
                                                <div class="col-md-7"><input type="text" id="EmailAddress" readonly></div>
                                            </div>
                                             <div class="col-md-6 col-xs-6">
                                                <div class="col-md-5"><strong>Cab Type:</strong></div>
                                                <div class="col-md-7"><input type="text" id="BrandName" readonly></div>
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <div class="col-md-6 col-xs-6">
                                                <div class="col-md-5"><strong>Origin:</strong></div>
                                                <div class="col-md-7"><input type="text" id="StartCity" readonly></div>
                                            </div>
                                             <div class="col-md-6 col-xs-6">
                                                <div class="col-md-5"><strong>Desination:</strong></div>
                                                <div class="col-md-7"><input type="text" id="EndCity" readonly></div>
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <div class="col-md-6 col-xs-6">
                                                <div class="col-md-5"><strong>Pickup Date:</strong></div>
                                                <div class="col-md-7"><input type="text" id="PickupDate" readonly></div>
                                            </div>
                                             <div class="col-md-6 col-xs-6">
                                                <div class="col-md-5"><strong>Drop Date:</strong></div>
                                                <div class="col-md-7"><input type="text" id="DropofDate" readonly></div>
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <div class="col-md-6 col-xs-6">
                                                <div class="col-md-5"><strong>Pickup Time:</strong></div>
                                                <div class="col-md-7"><input type="text" id="PickupTime" readonly></div>
                                            </div>
                                             <div class="col-md-6 col-xs-6">
                                                <div class="col-md-5"><strong>Drop Time:</strong></div>
                                                <div class="col-md-7"><input type="text" id="DropofTime" readonly></div>
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <div class="col-md-6 col-xs-6">
                                                <div class="col-md-5"><strong>Payment:</strong></div>
                                                <div class="col-md-7"><input type="text" id="payment_status" readonly></div>
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
                                                    <div class="total-data-left"><input type="text" id="KMS" readonly><span>KMS</span></div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-xs-6">
                                                 <div class="text-center">
                                                    <div><h3>Total Fare</h3></div>
                                                    <div class="total-data-right"><span>Rs.</span><input type="text" id="FinalAmount" readonly></div>
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
                  <form method="post" action="<?php echo base_url();?>home/userfeedback" class="contct-form row m0" id="form_valid">
                    <!-- <input type="hidden" name="TestimonialId" value="<?php echo $feedbackhistory[0]->TestimonialId;?>"> -->
                     <input type="hidden" name="FirstName" value="<?php echo $this->session->userdata('FirstName');?>">
                        <input type="hidden" name="LastName" value="<?php echo $this->session->userdata('LastName');?>">
                        <input type="hidden" name="ContactNumber" value="<?php echo $this->session->userdata('ContactNumber');?>">
                 
                      <div class="col-md-12">    
                        <div>
                            <textarea id="message" name="TestimonialDescription" class="form-control" placeholder="Your Valuable Review"></textarea>
                        </div>
                        <br>
                      </div>
                      
                  
                    <!-- <div class="col-md-12"> 
                      <div>
                          <textarea id="message" name="TestimonialDescription" class="form-control" placeholder="Your Valuable Review"></textarea>
                      </div>
                    </div> -->
                   
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

$(document).ready(function()
    {

         $('#form_valid').validate({
        rules: {
          TestimonialDescription:{              
            required: true,                
          },
            
         },
        });
    }); 
</script>

<script>
$(document).ready(function()
{
    $('#faredetail').on('show.bs.modal', function (e)
    {
        var UserId = $(e.relatedTarget).data('id');
        //alert(UserId);
        url="<?php echo base_url();?>"
            $.ajax({
            url: url+"home/ajaxuserdata/",
            type: "post",
            data: {UserId:UserId},
            success:function(response){
                var response = JSON.parse(response);
                //console.log(response.FirstName);

                $('#UserId').val(response.UserId);
                $('#FirstName').val(response.FirstName+' '+response.LastName);
                $('#EmailAddress').val(response.EmailAddress);
                $('#ContactNumber').val(response.ContactNumber);
                $('#BrandName').val(response.BrandName);
                $('#PickupDate').val(myDateFormatter(response.PickupDate));
                $('#DropofDate').val(myDateFormatter(response.DropofDate));
                $('#PickupTime').val(response.PickupTime);
                $('#DropofTime').val(response.DropofTime);
                $('#StartCity').val(response.StartCity);
                $('#EndCity').val(response.EndCity);
                $('#PerKmRate').val(response.PerKmRate);
                $('#KMS').val(response.KMS);
                $('#TotalFareAmount').val(response.TotalFareAmount);
                $('#StateTax').val(response.StateTax);
                $('#Tax').val(response.Tax);
                $('#TotalAmount').val(response.TotalAmount);
                $('#TaxAdded').val(response.TaxAdded);
                $('#FinalAmount').val(response.FinalAmount);
                $('#payment_status').val(response.payment_status);
            }
           
        });
     });
});


function myDateFormatter(dobdate) 
{
    var d = new Date(dobdate);
    var day = d.getDate();
    var month = d.getMonth() + 1;
    var year = d.getFullYear();
    if (day < 10) {
        day = "0" + day ;
    }
    if (month < 10) {
      month = "0" + month;
    }
    var date = day + "/" + month + "/" + year;
    return date;
}; 
</script>