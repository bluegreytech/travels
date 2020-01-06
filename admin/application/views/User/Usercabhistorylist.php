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
                <h4 class="card-title">List of User
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
<!---start Delete menu--->
<div class="modal fade bs-example-modal-sm" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm" role="document" style="margin:20% auto;">
        <div class="modal-content">
            <div class="modal-body" >
              	<p>Are you sure you want to delete this record?</p>
              </div>
              <div class="modal-footer text-center">
              	<!--<button type="button" class="next_btn" id="yes_btn" name="update">Yes</button>-->
				<center><button type="button" class="btn-md btn-icon btn-link p4" id="yes_btn" ><a href="" id="deleteYes" value="Yes"  class="btn btn-success">Yes</a></button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">No</button></center>
            </div>
        </div>
    </div>
</div>
<!---End Delete menu--->
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

