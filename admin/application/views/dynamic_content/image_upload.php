
<div id="right">
<form id="product_form" name="product_form" action="<?php echo base_url()."dynamic_content/upload_image"; ?>" method="post" enctype="multipart/form-data">

    <div class="section">
		<?php if($message == 1) { ?>
			<div class="message green"><br /><ul><li>E-Stores Records Updated Successfully.</li></ul><br /></div>
		<?php } elseif($message == 3) { ?>
			<div class="message green"><br /><ul><li>Stores Records Updated Successfully.</li></ul><br /></div>
		<?php } elseif($message == 2) { ?>
			<?php echo '<div class="message red"><br /><ul>'.$errors.'</ul><br /></div>' ; ?>
		<?php } ?>
		<div class="box">
			<div class="title">Upload Library Image<span class="hide"></span></div>
			<div class="content">
				<div class="row">
                    <label>Image upload</label>
					<div class="right">
                    	<input type="file" id="image_file" name="image_file" />
                    </div>
				</div>
				<div class="row">
					<label></label>
					<div class="right">
						<button type="submit"><span>Upload</span></button>
                        <button type="button" id="cancel"><span>Cancel</span></button>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>    
</div>

<script type="text/javascript">
$(function(){
	$("#cancel").live('click',function(){
		window.location.href = "<?php echo base_url()."dynamic_content/view_library" ; ?>" ;
	}) ;
}) ;
</script>