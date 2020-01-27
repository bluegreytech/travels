<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php 
	 $this->load->view('common/header');
	 $this->load->view('common/sidebar');
?>
 <div class="app-content content container-fluid">
    <div class="content-wrapper">
        
      <div class="content-body">
      	
      <!-- Basic form layout section start -->
		<section id="basic-form-layouts">
			<div class="row match-height">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header">
							<h4 class="card-title" id="basic-layout-form">
							<?php if($SliderId==1)
							{
								echo	"Edit Slider";
							}
							else{
							echo	"Add Slider";
							}
							?>
							<a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
							<a href="<?php echo base_url();?>slider/sliderlist" class="btn btn-black" style="float:right">Back to Slider List</a>
						</div>
						</h4>
						<div class="card-body collapse in">
							<div class="card-block">
						
								<form class="form" method="post" enctype="multipart/form-data" id="form_valid"
								 action="<?php echo base_url();?>slider/slideradd">
							
									<div class="form-body">
										<h4 class="form-section"><i class="icon-clipboard4"></i> Requirements</h4>
									
										<div class="form-group">
										<input type="hidden" value="<?php echo $SliderId; ?>" name="SliderId">
											<label>Slider Title</label>
											<input type="text" class="form-control" placeholder="Slider Title" name="SliderTitle" value="<?php echo $SliderTitle;?>" minlength="3" maxlength="100">
										</div>
										
										<div class="form-group">
											<label>Slider Image</label>
											<p><span class="btn btn-black btn-file">
											<input type="hidden" name="pre_slider" value="<?php echo $SliderImage; ?>">
											Upload slider image<input type="file" name="SliderImage" id="SliderImage" onchange="readURLimg(this);">
											</span></p>									
											<span id="logoerrorimg"></span>
										</div>

										<div class="preview">									
											<?php if($SliderImage){ ?>
											<img id="blahimg" src="<?php echo base_url()?>upload/sliderimages/<?php echo $SliderImage; ?>" class="img-thumbnail border-0" style="display: block;  width: 100px; height: 100px;">
											<?php } else { ?>
											<img id="blahimg" src="" class="img-thumbnail border-0" style="display: none;  width: 100px; height: 100px;">
											<?php } ?>
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
											 <button class="btn btn-black " type="submit"><i class="icon-ok"></i> <?php echo ($SliderId!='')?'Update':'Submit' ?></button>
									
											<input type="button" name="cancel" class="btn btn-default" value="Cancel" onClick="location.href='<?php echo base_url(); ?>slider/sliderlist'">
										
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
	
$(document).ready(function()
{
	$.validator.addMethod('dimention', function(value, element, param) {
    if(element.files.length == 0){
        return true;
    }
    console.log(value);

    var width = $(element).data('imageWidth');
     console.log(width);


    var height = $(element).data('imageHeight');
     
    if(width == param[0] && height == param[1]){
        return true;
    }else{
        return false;
    }
},'Please upload an image with 110 x 110 pixels dimension');
	$.validator.addMethod('filesize', function (value, element, param) {
	return this.optional(element) || (element.files[0].size <= param)
	} ,'File size must be equal to or less then 2MB');
	$("#form_valid").validate(
	{
		ignore: []  ,
		rules:
		{
			SliderTitle:
			{
				required: true,
			},
			SliderImage:
			{
				extension: "JPG|jpeg|png|bmp",
				filesize: 2097152,  
				//dimention:[110,110]
			},
		},
		 errorPlacement: function (error, element) {
            console.log('dd', element.attr("name"))
            if (element.attr("name") == "SliderImage") {
                error.appendTo("#logoerrorimg");
            } else{
                  error.insertAfter(element)
            }
        }
    
							
	});
});


 //CKEDITOR.replace('editor1');

 function readURLimg(input) {
    if(input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#blahimg').css('display', 'block');
            $('#blahimg').attr('src', e.target.result);
        };
     reader.readAsDataURL(input.files[0]);
    }
}

$('#SliderImage').change(function() {
    $('#SliderImage').removeData('imageWidth');
    $('#SliderImage').removeData('imageHeight');
    var file = this.files[0];
    var tmpImg = new Image();
    tmpImg.src=window.URL.createObjectURL( file ); 
    tmpImg.onload = function() {
        width = tmpImg.naturalWidth,
        height = tmpImg.naturalHeight;
        $('#SliderImage').data('imageWidth', width);
        $('#SliderImage').data('imageHeight', height);
    }
});
    
</script>