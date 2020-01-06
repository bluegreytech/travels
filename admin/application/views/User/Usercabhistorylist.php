<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php 
	 $this->load->view('common/header');
	 $this->load->view('common/sidebar');
?>

    <div class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-body"><!-- Basic Tables start -->
  
<!-- Table head options start -->
<div class="row">
    <div class="col-xs-12">
   <?php //echo $this->session->flashdata('success');?>
    <?php if(($this->session->flashdata('success'))){ ?>
        <div class="alert alert-success" id="successMessage">
        <strong> <?php echo $this->session->flashdata('success'); ?></strong> 
        </div>
    <?php } ?>
       
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Booking History
                <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                <a href="<?php echo base_url();?>user/Userlist" class="btn btn-black" style="float:right">Back To User List</a>
                </h4>
            </div>
            <div class="card-body collapse in">
                <div class="table-responsive">
                    <table id="example" class="table">
                        <thead class="thead-inverse">
                            <tr>
                                <th>Sr No</th>
                                <th>Name</th>
                                <th>Email Address</th>
                                <th>Contact Number</th>
								<th>Status</th>
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
                                <td><?php echo $row->FirstName.' '.$row->LastName; ?></td>
                                <td><?php echo $row->EmailAddress; ?></td>
                                <td><?php echo $row->ContactNumber; ?></td>
                             
                                <td>
                                    <?php if($row->IsActive=="Active")
                                        {
                                            echo "<span class='label label-success'>Active</span>";
                                        } 
                                        else
                                        {
                                            echo "<span class='label label-danger'>Inactive</span>";
                                        } 
                                    ?>
                                </td>
                                <td class="text-center">
                                    <a href="#" data-toggle="modal" data-target="#myModal"><i class="ficon icon-eye" data-toggle="tooltip" title="View Details"></i></a>
                                </td>  
                                <!-- Modal -->
                                <div id="myModal" class="modal fade" role="dialog">
                                  <div class="modal-dialog">

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
        </div>
    </div>
</div>
<!-- Table head options end -->



        </div>
      </div>
    </div>

<?php 
$this->load->view('common/footer');
?>

<script>
$(function() { 
    setTimeout(function() {
  $('#successMessage').fadeOut('fast');
}, 3000);
   
});

function deletedata(UserId){  
   // alert(id);
    $('#myModal').modal('show')
   
        $('#yes_btn').click(function(){
           
                url="<?php echo base_url();?>"
                $.ajax({
                url: url+"/user/deletedata/",
                type: "post",
                data: {UserId:UserId} ,
                success: function (response) {  
                console.log(response);           
                //document.location.href = url+'user/userlist';                  

            },
            error: function(jqXHR, textStatus, errorThrown) {
                 console.log(textStatus, errorThrown);
            }
            })
           

        });
    
   

}
</script>

