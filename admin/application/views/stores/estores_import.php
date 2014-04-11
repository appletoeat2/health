
<div id="right">
<form id="import_form" name="import_form" action="<?php echo base_url()."stores/upload_import_file"; ?>" method="post" enctype="multipart/form-data">

    <div class="section">
		<?php if($message == 1) { ?>
			<div class="message green"><br /><ul><li>E-Stores Records Updated Successfully.</li></ul><br /></div>
		<?php } elseif($message == 3) { ?>
			<div class="message green"><br /><ul><li>E-Stores Records Updated Successfully.</li></ul><br /></div>
		<?php } elseif($message == 2) { ?>
			<?php echo '<div class="message red"><br /><ul>'.$errors.'</ul><br /></div>' ; ?>
		<?php } ?>
		<div class="box">
			<div class="title">Upload File<span class="hide"></span></div>
			<div class="content">
				<div class="row">
					<a href="javascript:void(0);" class="modalopen"><span>Click here for important instructions</span></a>
				</div>
				<div class="row">
                    <label>File upload</label>
					<div class="right">
                    	<input type="file" id="stores_records_file" name="stores_records_file" />
                    </div>
				</div>
				
				<input type="hidden" name="store_type" value="estores" />
				
				<div class="row">
					<label>Update Type</label>
					<div class="right">
						<input type="radio" id="add" name="update_type" value="add" <?php if($update_type == "add") echo 'checked="checked"' ; ?> /> <label for="add">Add to existing</label>
						<input type="radio" id="replace" name="update_type" value="replace" <?php if($update_type == "replace") echo 'checked="checked"' ; ?> /> <label for="replace">Replace</label>
					</div>
                </div>
				
				<div class="row">
					<a href="javascript:void(0);" class="modalopen"><span>Click here for important instructions</span></a>
					<div class="modal" title="Important Information">
						<ul>
							<li>You need to strictly follow the format provided in excel files.
								<ul>
									<!--<li><a href="<?php // echo base_url() ; ?>template/stores.xls">Click Here to Download Template for Stores</a></li>-->
									<li><a href="<?php echo base_url() ; ?>template/estores.xls">Click Here to Download Template for E-Stores</a></li>
								</ul>
							</li>
						</ul>
					</div>
				</div>
				
				<div class="row">
					<label></label>
					<div class="right">
						<button type="submit" id="upload"><span>Upload</span></button>
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
	
	$("#upload").live('click',function(){
		if($('#replace:checked').length > 0) {
			if(confirm("Are you sure want to replace with existing records?")) {
				$("#import_form").submit() ;
			} else {
				return false ;
			}
		} else {
			$("#import_form").submit() ;
		}
	}) ;
	
	$("#cancel").live('click',function(){
		window.location.href = "<?php echo base_url()."products/index/" ; ?>" ;
	}) ;
}) ;
</script>