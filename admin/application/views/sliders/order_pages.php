<link rel="stylesheet" href="<?php echo base_url()."stylesheets/chosen.css" ; ?>">
<form id="store_form" name="store_form" action="<?php echo base_url()."coupon/insert_coupon" ; ?>" method="post" enctype="multipart/form-data">
<div class="section">
	<div id="right">
		<div class="section">
			<div class="box">
				<div class="content">
                    <div class="row">
						<label>Product Groups</label>
                        <div class="right">
                        	<select id="groups_coupon" name="groups_coupon[]" data-placeholder="Click Here to Add Product Groups" multiple="multiple" class="chosen-select" style="width:100%;">
                                <?php if($sliders) { ?>
                                	<?php foreach($sliders as $rec): ?>
                                		<option value="<?php echo $rec->id ; ?>"><?php echo $rec->slider_title ; ?></option>
									<?php endforeach ; ?>
								<?php } ?>
                            </select>
                        </div>
                	</div>
					<div class="row">
                  		<label>Status</label>
                        <div class="right">
                        	<input type="radio" id="status-1" name="status" value="Active"  <?php echo set_radio("status", "Active", TRUE); ?> /> 
                            	<label for="status-1">Active</label>  
                           	<input type="radio" id="status-2" name="status" value="Disable" <?php echo set_radio("status", "Disable"); ?> /> 
                            	<label for="status-2">Disable</label>
                    	</div>
                	</div>
                </div>
        	</div>
        </div>
        
        
    	<div class="section">
			<div class="box">
				<div class="content">
    				<div class="row">
						<label></label>
                        <div class="right"><button type="submit" id="add_store"><span>Sumbit</span></button><button type="button" id="cancel"><span>Cancel</span></button></div>
                	</div>
				</div>
        	</div>
        </div>
        
	</div>    
</div>
</form>
<script type="text/javascript">
$(function(){
	$("#cancel").live('click',function(){
		window.location.href = "<?php echo base_url()."coupon/index" ; ?>" ;
	}) ;
}) ;
</script>
<script src="<?php echo base_url()."javascript/chosen.jquery.js" ; ?>" type="text/javascript"></script>
<script src="<?php echo base_url()."javascript/prism.js" ; ?>" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">
	var config = {'.chosen-select':{}} ;
	for (var selector in config)
	{
		$(selector).chosen(config[selector]) ;
    }
</script>
