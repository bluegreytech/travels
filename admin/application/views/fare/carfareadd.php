<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php 
	 $this->load->view('common/header');
	 $this->load->view('common/sidebar');
?>
 <div class="app-content content container-fluid">
    <div class="content-wrapper">
        
      <div class="content-body"><!-- Basic form layout section start -->
<section id="basic-form-layouts">
	<div class="row match-height">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title" id="basic-layout-form">
					<?php if($LocalTripId==1)
					{
						echo	"Edit Fare";
					}
					else{
					echo	"Add Fare";
					}
					?>
					<a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
					<a href="<?php echo base_url();?>car/hoursfarelist" class="btn btn-black" style="float:right">Back to Fare List</a>
				</div>
				</h4>
				<div class="card-body collapse in">
					<div class="card-block">
				
						<form class="form" method="post" enctype="multipart/form-data" id="form_valid"
						 action="<?php echo base_url();?>car/addhoursfare">
					
							<div class="form-body">
								<input type="hidden" name="LocalTripId" value="<?php echo $LocalTripId;?>">
								<h4 class="form-section"><i class="icon-clipboard4"></i> Requirements</h4>

									<div class="form-group">
									<label>Select Brand Car</label>
									<select name="CarBrandId" class="form-control" required>
									<?php
									if($CarBrandId=='')
									{
										?>
										<option desabled value="">Please select brand car</option>
										<?php
									}
									else
									{
										?>
										<option value="<?php echo $CarBrandId;?>"><?php echo $BrandName;?></option>
										<?php
									}
									?>
								
										<?php
										if($carbrand)
										{
											foreach($carbrand as $brand)
											{
										?>
								
											<option value="<?php echo $brand->CarBrandId; ?>"><?php echo $brand->BrandName;?></option>
										<?php
										}}
										?>
									</select>
								</div>

								<div class="form-group">
									<label>Hours</label>
									<input type="text" class="form-control" placeholder="Hours" id="Hours" name="Hours" value="<?php echo $Hours;?>" minlength="1" maxlength="5">
								</div>

								<div class="form-group">
									<label>Per Houre Fare</label>
									<input type="text" class="form-control" placeholder=" Car Fare Per Houre" id="PerHoureFare" name="PerHoureFare" value="<?php echo $PerHoureFare;?>" minlength="1" maxlength="5">
								</div>

								
											
								<?php  if($IsActive!=''){ ?>                                
								<div class="form-group">
									<label>Status</label>
									<div class="input-group">
										<label class="display-inline-block custom-control custom-radio ml-1">
											
											<input type="radio" name="IsActive" value="Active"
												<?php if($IsActive=="Active") { echo "checked"; } ?>
												 class="custom-control-input">																					<span class="custom-control-indicator"></span>																	<span class="custom-control-description ml-0">Active</span>
													</label>
													<label class="display-inline-block custom-control custom-radio"><input type="radio" name="IsActive" value="Inactive"  <?php if($IsActive=="Inactive") { echo "checked"; } ?> class="custom-control-input">
													<span class="custom-control-indicator"></span>
													<span class="custom-control-description ml-0">Inactive</span>
													</label>
														</div>
								</div>
								<?php } else { ?>
									<div class="form-group">
									<label>Status</label>
									<div class="input-group">
										<label class="display-inline-block custom-control custom-radio ml-1">                           
										<input type="radio" name="IsActive" value="Active" checked="" 
											class="custom-control-input">
											<span class="custom-control-indicator"></span>
											<span class="custom-control-description ml-0">Active</span>
										</label>
										<label class="display-inline-block custom-control custom-radio">
											<input type="radio" name="IsActive" value="Inactive"
												class="custom-control-input">
												<span class="custom-control-indicator"></span>
												<span class="custom-control-description ml-0">Inactive</span>
										</label>
									</div>
								</div>
								<?php } ?>


							<div class="form-actions">
									 <button class="btn btn-black" type="submit"><i class="icon-ok"></i> <?php echo ($LocalTripId!='')?'Update':'Submit' ?></button>
							
									<input type="button" name="cancel" class="btn btn-default" value="Cancel" onClick="location.href='<?php echo base_url(); ?>car/hoursfarelist'">
								
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

		
			
	</div>
</section>
<!-- // Basic form layout section end -->
        </div>
      </div>
    </div>
	<?php 
 $this->load->view('common/footer');
?>

<script>
$("#PerHoureFare").on("input", function(evt) {
		var self = $(this);
		self.val(self.val().replace(/[^\d].+/, ""));
		if ((evt.which < 48 || evt.which > 57)) 
		{
			evt.preventDefault();
		}});

$("#Hours").on("input", function(evt) {
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
				CarBrandId:{              
					required: true,                
				},
				PerHoureFare:{              
					required: true,                
				},
				Hours:{              
					required: true,                
				},
				  		
			 },

    });
});

</script>