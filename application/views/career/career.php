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
    <div class="container">
      <div class="row section-title text-center">
        <h6 class="this-top">Send Message</h6>
        <h2 class="h1 this-main">Current Openings</h2>
      </div>
      <div class="row">
        <div class="col-sm-12 col-xs-12 benefit-it">
          <div class="panel-group benefit-accordion" role="tablist" aria-multiselectable="true">
            <div class="panel panel-default">
              <div class="panel-heading" role="tab" id="heading1">
                <h4 class="panel-title">
                  <a role="button" data-toggle="collapse" data-parent=".benefit-accordion" href="#collapse1" aria-expanded="true" aria-controls="collapse1">
                    1. Cab Driver
                  </a>
                </h4>
              </div>
              <div id="collapse1" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading1">
                <div class="panel-body">
                  We achieved our success because of how successfully we integrate with our clients. One complaint many people have about consultants is that they can be disruptive. Employees fear outside consultants coming in and destroying the workflow.
                  <br><br>
                  <div>
                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#career">APPLY NOW</a>

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
                            <form action="#" class="contct-form contactForm row m0">
                              <div class="col-md-6">
                                <div class="input-group">
                                  <input type="text" name="name" id="name" class="form-control" placeholder="Your name">
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="input-group">
                                  <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email">
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="input-group">
                                  <input type="tel" name="phone" id="phone" class="form-control" placeholder="Enter Mobile Number">
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="input-group">
                                  <input type="text" name="subject" id="subject" class="form-control" value="Cab Driver" readonly="">
                                </div>
                              </div>
                              <div class="col-md-12">
                                <div class="input-group">
                                  <textarea name="message" id="message" class="form-control" placeholder="Remark Message"></textarea>
                                </div>
                              </div>
                              <div class="col-md-12">
                                <div class="form-group">
                                                <div class="row">
                                                  <div class="col-md-4">
                                                    <label class="pt-2">Upload your CV</label>
                                                  </div>
                                                  <div class="col-md-8">
                                                   <input id="attach" type="file" name="attachment" placeholder="Upload File">
                                                  </div>
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
    </div>
  </section>
  
  
<?php 
   $this->load->view('common/footer');
?>