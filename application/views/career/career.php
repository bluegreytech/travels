<?php 
   $this->load->view('common/header');
?>

  <!--Page Cover-->
  <section class="row page-cover">
    <div class="container">
      <h2 class="h1 page-title">Career</h2>
      <ol class="breadcrumb">
        <li><a href="index.php">home</a></li>
        <li class="active">Career</li>
      </ol>
    </div>
  </section>    
  
  <section class="missin-benefits">
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
    <div class="container">
      <div class="row section-title text-center">
       
       
        <h6 class="this-top">Send Message</h6>
        <h2 class="h1 this-main">Current Openings</h2>
      </div>

        <?php
        $i=1;
        if($carrier){                             
        foreach($carrier as $row)
        {
        ?>
          <br>
                <div class="row">
                  <div class="col-sm-12 col-xs-12 benefit-it">
                    <div class="panel-group benefit-accordion" role="tablist" aria-multiselectable="true">
                      <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="heading1">
                          <h4 class="panel-title">
                            <a role="button" data-toggle="collapse" data-parent=".benefit-accordion" href="#collapse1" aria-expanded="true" aria-controls="collapse<?php echo $i; ?>">
                              <?php echo $i; ?>. <?php echo $row->CarrerTitle; ?>
                            </a>
                          </h4>
                        </div>
                        <div id="collapse<?php echo $i; ?>" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading1">
                           
                            <div class="panel-body">
                             <?php echo $row->CarrerDescription; ?>
                              <br><br>
                              <div>
                                <a href="#" data-id="<?php echo $row->CarrerTitle;?>" class="btn btn-primary user_dialog" data-toggle="modal" data-target="#career">APPLY NOW</a>

                                <!-- Modal -->
                                <div id="career" class="modal fade" role="dialog">
                                  <div class="modal-dialog">

                                    <!-- Modal content-->
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal"><i class="fa fa-times"></i></button>
                                        <h4 class="modal-title">APPLY FORM</h4>
                                      </div>
                                      <div class="modal-body">
                                        <div class="col-md-12">
                                      <div class="contact-form-info">
                                        <form method="post" class="contct-form contactForm row m0" id="form_valid" action="<?php echo base_url();?>Carrier/carreradd" enctype="multipart/form-data">
                                          <div class="col-md-6">
                                            <div class="input-group">
                                              <input type="text" name="FullName" class="form-control" placeholder="Full Name" minlength="3" maxlength="50">
                                            </div>
                                          </div>
                                          <div class="col-md-6">
                                            <div class="input-group">
                                              <input type="email" name="EmailAddress" class="form-control" placeholder="Enter your email">
                                            </div>
                                          </div>
                                          <div class="col-md-6">
                                            <div class="input-group">
                                              <input type="text" name="ContactNumber" id="ContactNumber" class="form-control" placeholder="Enter Mobile Number" minlength="10" maxlength="10">
                                            </div>
                                          </div>
                                          <div class="col-md-6">
                                            <div class="input-group">
                                              <input type="text" name="Subject" class="form-control" id="Subject"
                                               readonly>
                                            </div>
                                          </div>
                                          <div class="col-md-12">
                                            <div class="input-group">
                                              <textarea name="RemarkDescription" id="RemarkDescription" class="form-control" placeholder="Remark Message" minlength="3" maxlength="300"></textarea>
                                            </div>
                                          </div>

                                          <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="row">
                                                  <div class="col-md-4">
                                                    <label class="pt-2">Upload your CV</label>
                                                  </div>
                                                  <div class="col-md-8">
                                                   <input id="attach" type="file" name="CarrierCv" placeholder="Upload File">
                                              
                                                  </div>
                                                  <h6>Uplopad only doc,pdf,docx file</h6>
                                                </div>
                                            </div>
                                          </div>

                                          <div class="col-md-12">
                                            <input type="submit" value="SEND" class="btn btn-primary">
                                          </div>
                                        </form>
                                      </div>
                                    </div>
                                    </div>
                                  </div>
                                  </div>
                                </div>
                                <!-- End model -->
                              </div>
                            </div>
                            

                        </div>

                      </div>
                      
                    </div>
                  </div>  
                </div>
        <?php
        $i++;
            }      
          }      
        ?>  



    </div>

  </section>

  
<?php 
   $this->load->view('common/footer');
?>

<script>
$(document).on("click", ".user_dialog", function () {
     var UserName = $(this).data('id');
     $(".modal-body #Subject").val( UserName );
});

$(function() { 
    setTimeout(function() {
      $('#wrongMessage').fadeOut('fast');
    }, 10000);

     setTimeout(function() {
      $('#successMessage').fadeOut('fast');
    }, 10000);

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
  
      $('#form_valid').validate({
      rules: {
        FullName:{              
          required: true,                
        },  
        EmailAddress:{              
          required: true,                
        },  
        ContactNumber:{              
          required: true,                
        },  
        Subject:{              
          required: true,                
        }, 
        RemarkDescription:{              
          required: true,                
        },  
        CarrierCv:{              
          required: true,
          extension: "doc|pdf|docx",                
        },    
       },

       // errorPlacement: function (error, element) {
       //      console.log('dd', element.attr("name"))
       //      if (element.attr("name") == "CarrierCv") {
       //          error.appendTo("#logoerrorimg");
       //      } else{
       //            error.insertAfter(element)
       //      }
       //  }

    });
});

                
</script>