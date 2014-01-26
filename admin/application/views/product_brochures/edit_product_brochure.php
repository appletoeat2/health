<link rel="stylesheet" href="<?php echo base_url()."stylesheets/chosen.css" ; ?>">
<?php
	
	function if_selected1($id, $_recs)
	{
		if($_recs) {
			foreach($_recs as $rec):
				if($rec->group_id == $id) return 'selected="selected"' ;
			endforeach ;
		}
	}
	
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
<form id="store_form" name="store_form" action="<?php echo base_url()."coupon/update_coupon" ; ?>" method="post" enctype="multipart/form-data">
<div class="section">
	<div id="right">
		<input type="hidden" id="coupon_id" name="coupon_id" value="<?php echo $coupon_rec->id ; ?>" />
        <div class="section">
        	<?php if($this->session->userdata("error_array") != "")  echo '<br/><div class="message red"><br /><ul>'.$this->session->userdata("error_array").'</ul><br /></div>' ;
				if($errors) echo '<div class="message red"><br /><ul>'.$errors.'</ul><br /></div>' ; ?>
            <br />
            <div class="box">
				<div class="title">Coupon Expiry Date<span class="hide"></span></div>
				<div class="content">
                	<div class="row"> 
                    	<label>Expiry Date</label>
                        <div class="right"><input type="text" id="expiry_date" name="expiry_date" class="datepicker" value="<?php echo set_value("expiry_date", date("m/d/y", strtotime($coupon_rec->expiry_date))) ; ?>" /></div>
                 	</div>	
				</div>
			</div>
		</div>
        
        <div class="section">
            <div class="half">
				<div class="box">
					<div class="title">Coupon Details (English)<span class="hide"></span></div>
					<div class="content">
                    	<div class="row"> 
                        	<label>Coupon Message</label>
                            <div class="right"><textarea id="coupon_message" name="coupon_message"><?php echo set_value("coupon_message", $coupon_rec->coupon_message) ; ?></textarea></div>
                      	</div>
                        <div class="row">
                        	<label>Coupon Image</label>
                            <div class="right">
                            	<input type="file" id="coupon_image" name="coupon_image" /><br />
								<?php if($coupon_rec->coupon_image == "") { ?> <h6>No Image Uploaded</h6>
								<?php } else { ?> <a href="<?php echo base_url("")."coupons/coupon_images/coupon_image_en_".($coupon_rec->id).".jpg" ; ?>" target="_blank">View Image</a> <?php } ?>
                                <input type="checkbox" id="coupon_image_checkbox_english" name="coupon_image_checkbox_english" value="Yes" /><label for="coupon_image_checkbox_english">Upload New Image</label>
                            </div>
                       	</div>
                        
                        <div class="row">
                        	<label>Coupon PDF</label>
                            <div class="right">
                            	<input type="file" id="coupon_pdf" name="coupon_pdf" /><br />
                                <?php if($coupon_rec->coupon_pdf_french == "") { ?> <h6>No PDF Uploaded</h6>
								<?php } else { ?> <a href="<?php echo base_url("")."coupons/coupon_pdfs/coupon_pdf_fr_".($coupon_rec->id).".pdf" ; ?>" target="_blank">View PDF</a> <?php } ?>
                                <input type="checkbox" id="coupon_pdf_checkbox_english" name="coupon_pdf_checkbox_english" value="Yes" /><label for="coupon_pdf_checkbox_english">Upload New PDF</label>
                            </div>
                       	</div>
                        
                   	</div>
              	</div>
           	</div>
            
        	<div class="half">
				<div class="box">
					<div class="title">Coupon Details (French)<span class="hide"></span></div>
					<div class="content">
            			<div class="row"> 
                        	<label>Coupon Message</label>
                            <div class="right"><textarea id="coupon_message_french" name="coupon_message_french"><?php echo set_value("coupon_message_french", $coupon_rec->coupon_message_french) ; ?></textarea></div>
                      	</div>
                        <div class="row">
                        	<label>Coupon Image</label>
                            <div class="right">
                            	<input type="file" id="coupon_image_french" name="coupon_image_french" /><br />
                            	<?php if($coupon_rec->coupon_image_french == "") { ?> <h6>No Image Uploaded</h6>
								<?php } else { ?> <a href="<?php echo base_url("")."coupons/coupon_images/coupon_image_fr_".($coupon_rec->id).".jpg" ; ?>" target="_blank">View Image</a> <?php } ?>
                            	<input type="checkbox" id="coupon_image_checkbox_french" name="coupon_image_checkbox_french" value="Yes" /><label for="coupon_image_checkbox_french">Upload New PDF</label>
                        	</div>
                       	</div>
                        <div class="row">
                        	<label>Coupon PDF</label>
                            <div class="right">
                            	<input type="file" id="coupon_pdf_french" name="coupon_pdf_french" /><br />
                            	<?php if($coupon_rec->coupon_pdf_french == "") { ?> <h6>No PDF Uploaded</h6>
								<?php } else { ?> <a href="<?php echo base_url("")."coupons/coupon_pdfs/coupon_pdf_fr_".($coupon_rec->id).".pdf" ; ?>" target="_blank">View PDF</a><?php } ?>
                            	<input type="checkbox" id="coupon_pdf_checkbox_french" name="coupon_pdf_checkbox_french" value="Yes" /><label for="coupon_pdf_checkbox_french">Upload New PDF</label>
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
                    	<label>Sort Order</label>
                        <div class="right"><input type="text" id="sort_order" name="sort_order" value="<?php echo set_value("sort_order", $coupon_rec->sort_order) ; ?>" class="small" /></div>
                 	</div>	
                    <div class="row">
						<label>Product Groups</label>
                        <div class="right">
                        	<select id="groups_coupon" name="groups_coupon[]" data-placeholder="Click Here to Add Product Groups" multiple="multiple" class="chosen-select" style="width:100%;">
                            <?php if($product_groups) { ?>
                            	<?php foreach($product_groups as $rec): ?>
                                	<option value="<?php echo $rec->id ; ?>" <?php echo if_selected1($rec->id, $group_coupons_recs) ; ?>><?php echo $rec->group_name ; ?></option>
								<?php endforeach ; ?>
							<?php } ?>
                            </select>
                        </div>
                	</div>
                    <div class="row">
						<label>Products</label>
                        <div class="right">
                        	<select id="products_coupon" name="products_coupon[]" data-placeholder="Click Here to Add Products" multiple="multiple" class="chosen-select" style="width:100%;">
                            <?php if($products) { ?>
                            	<?php foreach($products as $rec): ?>
                                	<option value="<?php echo $rec->id ; ?>" <?php echo if_selected2($rec->id, $product_coupons_recs) ; ?>><?php echo $rec->product_name ; ?></option>
								<?php endforeach ; ?>
							<?php } ?>
                            </select>
                        </div>
                	</div>
					<div class="row">
                  		<label>Status</label>
                        <div class="right">
                        	<input type="radio" id="status-1" name="status" value="Active"  <?php echo set_radio("status", "Active", is_equal($coupon_rec->status, "Active")) ; ?> /> 
                            	<label for="status-1">Active</label>  
                           	<input type="radio" id="status-2" name="status" value="Disable" <?php echo set_radio("status", "Disable", is_equal($coupon_rec->status, "Disable")); ?> /> 
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
