<link rel="stylesheet" href="<?php echo base_url()."stylesheets/chosen.css" ; ?>">
<?php	
	function if_selected2($id, $_recs)
	{
		if($_recs) {
			foreach($_recs as $rec):
				if($rec->product_id == $id) return 'selected="selected"' ;
			endforeach ;
		}
	}
	
	function is_equal($str1, $str2)
	{
		if($str1 == $str2) return true ;
		else return false ;
	}
?>
<form id="brochure_form" name="brochure_form" action="<?php echo base_url()."product_brochure/update_brochure" ; ?>" method="post" enctype="multipart/form-data">
<div class="section">
	<div id="right">
        <input type="hidden" id="brochure_id" name="brochure_id" value="<?php echo $brochure_rec->id ; ?>" />
        <div class="section">
        	<?php if($this->session->userdata("error_array") != "")  echo '<br/><div class="message red"><br /><ul>'.$this->session->userdata("error_array").'</ul><br /></div>' ;
				if($errors) echo '<div class="message red"><br /><ul>'.$errors.'</ul><br /></div>' ; ?>
            <br />
            <div class="half">
				<div class="box">
					<div class="title">Brochure Details (English)<span class="hide"></span></div>
					<div class="content">
                        <div class="row"> 
                    		<label>Brochure Name</label>
                        	<div class="right"><input type="text" id="brochure_name" name="brochure_name" value="<?php echo set_value("brochure_name", $brochure_rec->brochure_name) ; ?>" /></div>
                 		</div>
                        <div class="row">
                        	<label>Brochure PDF</label>
                            <div class="right">
                            	<input type="file" id="brochure_pdf_englsih" name="brochure_pdf_englsih" /><br />
                            	<?php if($brochure_rec->brochure_file_name_french == "") { ?> <h6>No PDF Uploaded</h6>
								<?php } else { ?> <a href="<?php echo base_url("")."product_brochures/english/product_brochure_".($brochure_rec->id).".pdf" ; ?>" target="_blank">View PDF</a><?php } ?>
                            	<input type="checkbox" id="brochure_pdf_checkbox_english" name="brochure_pdf_checkbox_english" value="Yes" /><label for="brochure_pdf_checkbox_english">Upload New PDF</label>
                            </div>
                       	</div>
                   	</div>
              	</div>
           	</div>
            
        	<div class="half">
				<div class="box">
					<div class="title">Brochure Details (French)<span class="hide"></span></div>
					<div class="content">
                        <div class="row"> 
                    		<label>Brochure Name</label>
                        	<div class="right"><input type="text" id="brochure_name_french" name="brochure_name_french" value="<?php echo set_value("brochure_name_french",$brochure_rec->brochure_name_french) ; ?>" /></div>
                 		</div>
                        <div class="row">
                        	<label>Brochure PDF</label>
                            <div class="right">
                            	<input type="file" id="brochure_pdf_french" name="brochure_pdf_french" /><br />
                            	<?php if($brochure_rec->brochure_file_name == "") { ?> <h6>No PDF Uploaded</h6>
								<?php } else { ?> <a href="<?php echo base_url("")."product_brochures/french/product_brochure_".($brochure_rec->id).".pdf" ; ?>" target="_blank">View PDF</a><?php } ?>
                            	<input type="checkbox" id="brochure_pdf_checkbox_french" name="brochure_pdf_checkbox_french" value="Yes" /><label for="brochure_pdf_checkbox_french">Upload New PDF</label>
                           	</div>
                       	</div>
					</div>
				</div>
			</div>
 		</div>
        
        <div class="section">
			<div class="box">
				<div class="content">
                    <div class="row">
						<label>Products</label>
                        <div class="right">
                        	<select id="product_brochure" name="product_brochure[]" data-placeholder="Click Here to Add Products" multiple="multiple" class="chosen-select" style="width:100%;">
                                <?php if($products) { ?>
                                	<?php foreach($products as $rec): ?>
                                		<option value="<?php echo $rec->id ; ?>" <?php echo if_selected2($rec->id, $product_brochure_recs) ; ?>><?php echo $rec->product_name ; ?></option>
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
		window.location.href = "<?php echo base_url()."product_brochure/index" ; ?>" ;
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
