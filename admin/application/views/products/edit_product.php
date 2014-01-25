<?php
$this->load->view("products/rich_text_editor") ;
function id_exists1($id, $recs)
{
	if($recs) {
		foreach($recs as $rec):
			if($rec->id == $id) return true ;
		endforeach ;
		return false ;
	} else
		return false ;
}

function id_exists2($id, $recs)
{
	if($recs) {
		foreach($recs as $rec):
			if($rec->id == $id) return true ;
		endforeach ;
		return false ;
	} else
		return false ;
}

function is_equal($group1_id, $rec_id)
{
	if($group1_id == $rec_id) return true ;
	else return false ;
}
?>
<div id="right">
<form id="product_form" name="product_form" action="<?php echo base_url()."products/update_product/".$product_detail->id ; ?>" method="post" enctype="multipart/form-data">
<input type="hidden" id="product_id" name="product_id" value="<?php echo $product_detail->id ; ?>" />
	<br />
    <div class="section">
    		<?php if($errors) { ?><div class="message red"><br /><ul><?php echo $errors ; ?></ul><br /></div><?php } ?>
		<div class="half">
			<div class="box">
				<div class="title">Basic Information<span class="hide"></span></div>
				<div class="content">
					<div class="row">
						<label>Product Code</label>
						<div class="right"><input type="text" id="product_code" name="product_code" value="<?php echo set_value("product_code", stripslashes($product_detail->product_code)) ; ?>" /></div>
					</div>
                    <div class="row">
                        <label>NPN #</label>
                        <div class="right"><input type="text" id="npn" name="npn" value="<?php echo set_value("npn", stripslashes($product_detail->npn)) ; ?>" /></div>
                    </div>
                    <div class="row">
                        <label>Sort Order</label>
                        <div class="right"><input type="text" id="sort_order" name="sort_order" value="<?php echo set_value("sort_order", stripslashes($product_detail->sort_order)) ; ?>" /></div>
                    </div>
                    <div class="row">
						<label>Product Group</label>
						<div class="right">
							<select id="group_id" name="group_id" class="jqselect big">
								<?php if($product_groups) { foreach($product_groups as $rec): ?>
                            		<option value="<?php echo $rec->id ; ?>" <?php echo set_select('group_id', $rec->id, is_equal($rec->id, $group_rec->id)); ?>><?php echo stripslashes($rec->group_name) ; ?></option>
                            	<?php endforeach ; } ?>
							</select>
						</div>
					</div>
                    <div class="row">
						<label>Is New?</label>
						<div class="right">
							<input type="radio" name="isnew" id="isnew-1" value="Yes" <?php echo set_radio("isnew", "Yes", is_equal($product_detail->isnew , "Yes")); ?>/> 
							<label for="isnew-1">Yes</label>
                        	<input type="radio" name="isnew" id="isnew-2" value="No" <?php echo set_radio("isnew", "No", is_equal($product_detail->isnew , "No")); ?>/>
							<label for="isnew-2">No</label>
						</div>
					</div>
                	<div class="row">
					<label>Status</label>
                        <div class="right">
                            <input type="radio" name="status" id="status-1" value="Active" <?php echo set_radio("status", "Active", is_equal($product_detail->status, "Active")); ?> /> 
                            <label for="status-1">Active</label>  
                            <input type="radio" name="status" value="Disable" id="status-2" <?php echo set_radio("status", "Disable", is_equal($product_detail->status, "Disable")); ?> /> 
                            <label for="status-2">Disable</label>
                        </div>
					</div>
				</div>
			</div>
		</div>
        <div class="half">
			<div class="box">
				<div class="title">Categories & Food Sensitivities<span class="hide"></span></div>
				<div class="content">
					<div class="row">
                		<label>Product Category</label>
                    	<?php
							if($product_categories)
							{
								$i = 1 ;
								foreach($product_categories as $rec):
									echo '<div class="right">' ;
									echo '<input type="checkbox" id="product_category-'.$i.'" name="product_categories[]" value="'.stripslashes($rec->id).'" '.set_checkbox('product_categories[]', stripslashes($rec->id), id_exists1($rec->id, $categories_recs)).' />' ;
									echo '<label for="product_category-'.$i.'">'.stripslashes($rec->category_name).'</label>' ;
									echo '</div>' ;
									$i++ ;
								endforeach ;
							}
						?>            
                   	</div>
                   	<div class="row">
                		<label>Food Sensitivities</label>
                    	<?php
							if($food_sensitivities)
							{
								$i = 1 ;
								foreach($food_sensitivities as $rec):
									echo '<div class="right">' ;
									echo '<input type="checkbox" id="food_sensitivities-'.$i.'" name="food_sensitivities[]" value="'.stripslashes($rec->id).'" '.set_checkbox('food_sensitivities[]', stripslashes($rec->id), id_exists1($rec->id, $food_sensitivities_recs)).' />' ;
									echo '<label for="food_sensitivities-'.$i.'">'.stripslashes($rec->name).'</label>' ;
									echo '</div>' ;
									$i++ ;
								endforeach ;
							}
						?>            
                   	</div>
				</div>
			</div>
		</div>
	</div>
    
    <div class="section">
		<div class="box">
			<div class="title">Product Image<span class="hide"></span></div>
			<div class="content">
            	<div class="row">
                    <div class="right">
                    	<div class="gallery">
                        	<div>
                            	<a href="<?php echo base_url()."images/prod_images/large/".$product_detail->product_code.".jpg" ; ?>" class="pirobox" rel="single" title=""><img src="<?php echo base_url()."images/prod_images/small/".$product_detail->product_code.".jpg" ; ?>" alt="Photo" /></a>
                            </div>
                    	</div>
                	</div>
                </div>
				<div class="row">
					<label>File upload</label>
					<div class="right">
                    	<input type="file" id="product_file" name="product_file" />
                    </div>
				</div>
                <div class="row">
					<label>Upload New File</label>
                    <div class="right">
                    	<input type="checkbox" name="upload_new_file" id="upload_new_file-1" value="Yes" /> 
                    	<label for="upload_new_file-1">Yes</label>
                    </div>
				</div>
			</div>
		</div>
	</div>
    
	<div class="section">
		<div class="half">
			<div class="box">
				<div class="title">English Information.<span class="hide"></span></div>
				<div class="content">
                	<div class="row">
						<label>Product Name</label>
						<div class="right"><input type="text" id="product_name" name="product_name" value="<?php echo set_value("product_name", stripslashes($product_detail->product_name)) ; ?>" /></div>
					</div>
                    <div class="row">
						<label>Sub Heading</label>
						<div class="right"><input type="text" id="sub_heading" name="sub_heading" value="<?php echo set_value("sub_heading", stripslashes($product_detail->sub_heading)) ; ?>" /></div>
					</div>
					<div class="row">
						<label>Health Claim</label>
						<div class="right"><input type="text" id="health_claim" name="health_claim" value="<?php echo set_value("health_claim", stripslashes($product_detail->health_claim)) ; ?>" /></div>
					</div>
					<div class="row"><br>
						<label>Short Description</label><br>
                        <div class="clear"><textarea id="short_description" name="short_description"><?php echo set_value("short_description", stripslashes($product_detail->short_description)) ; ?></textarea></div>
					</div>
                    <div class="row"><br>
						<label>Description</label><br>
						<div class="clear"><textarea id="description" name="description"><?php echo set_value("description", stripslashes($product_detail->description)) ; ?></textarea></div>
					</div>
                    <div class="row"><br>
						<label>Formula</label><br>
						<div class="clear"><textarea id="formula" name="formula"><?php echo set_value("formula", stripslashes($product_detail->formula)) ; ?></textarea></div>
					</div>
                    <div class="row"><br>
						<label>Dosage</label><br>
						<div class="clear"><textarea id="dosage" name="dosage"><?php echo set_value("dosage", stripslashes($product_detail->dosage)); ?></textarea></div>
					</div>
				</div>
			</div>
		</div>
        <div class="half">
			<div class="box">
				<div class="title">French Information<span class="hide"></span></div>
				<div class="content">
					<div class="row">
						<label>Product Name</label>
						<div class="right"><input type="text" id="product_name_french" name="product_name_french" value="<?php echo set_value("product_name_french", stripslashes($product_detail->product_name_french)) ; ?>" /></div>
					</div>
                    <div class="row">
						<label>Sub Heading</label>
						<div class="right"><input type="text" id="sub_heading_french" name="sub_heading_french" value="<?php echo set_value("sub_heading_french", stripslashes($product_detail->sub_heading_french)) ; ?>" /></div>
					</div>
					<div class="row">
						<label>Health Claim</label>
						<div class="right"><input type="text" id="health_claim_french" name="health_claim_french" value="<?php echo set_value("health_claim_french", stripslashes($product_detail->health_claim_french)) ; ?>" /></div>
					</div>
					<div class="row"><br>
						<label>Short Description</label><br>
                       	<div class="clear"><textarea id="short_description_french" name="short_description_french"><?php echo set_value("short_description_french", stripslashes($product_detail->short_description_french)) ; ?></textarea></div>
					</div>
                    <div class="row"><br>
						<label>Description</label><br>
						<div class="clear"><textarea id="description_french" name="description_french"><?php echo set_value("description_french", stripslashes($product_detail->description_french)) ; ?></textarea></div>
					</div>
                    <div class="row"><br>
						<label>Formula</label><br>
						<div class="clear"><textarea id="formula_french" name="formula_french"><?php echo set_value("formula_french", stripslashes($product_detail->formula_french)) ; ?></textarea></div>
					</div>
                    <div class="row"><br>
						<label>Dosage</label><br>
						<div class="clear"><textarea id="dosage_french" name="dosage_french"><?php echo set_value("dosage_french", stripslashes($product_detail->dosage_french)); ?></textarea></div>
					</div>
				</div>
			</div>
		</div>
    
    <div class="section">
		<div class="box">
			<div class="title">Available Product Sizes</div>
			<div class="content">
				<table id="skus_table" cellspacing="0" cellpadding="0" border="0"> 
					<thead> 
						<tr>
							<th>Sku Code</th>
							<th>Size (English)</th>
							<th>Size (French)</th>
							<th>Price</th>
							<th>Wholesale Price</th>
							<th>Weight</th>
							<th>UPC</th>
                            <th>Remove</th>
						</tr>
					</thead>
                    <tbody>
                    <?php
						$i = 1 ;
						if($row_counter > 0) { 
							for($x = 0 ; $x < $row_counter ; $x++) { 
					?>
                    	<tr id="row_<?php echo $x + 1 ; ?>">
							<td><input type="text" id="sku_code<?php echo $x + 1 ; ?>" name="sku_code[]" value="<?php echo stripslashes($sku_codes[$x]) ; ?>" class="intable" /></td>
                        	<td><input type="text" id="size<?php echo $x + 1 ; ?>" name="size[]" class="intable" value="<?php echo stripslashes($sizes[$x]); ?>" /></td>
                        	<td><input type="text" id="size_french<?php echo $x + 1 ; ?>" name="size_french[]" class="intable" value="<?php echo stripslashes($sizes_french[$x]) ; ?>" /></td>
                        	<td><input type="text" id="price<?php echo $x + 1 ; ?>" name="price[]" class="intable" value="<?php echo stripslashes($prices[$x]) ; ?>" /></td>
                        	<td><input type="text" id="wholesale_price<?php echo $x + 1 ; ?>" name="wholesale_price[]" class="intable" value="<?php echo stripslashes($wholesale_prices[$x]) ; ?>" /></td>
                        	<td><input type="text" id="weight<?php echo $x + 1 ; ?>" name="weight[]" class="intable" value="<?php echo stripslashes($weights[$x]) ; ?>" /></td>
                        	<td><input type="text" id="upc<?php echo $x + 1 ; ?>" name="upc[]" class="intable" value="<?php echo stripslashes($upc[$x]) ; ?>" /></td>							<td><a class="remove_link" href="javascript:void(0);" row_id="<?php echo $x + 1 ; ?>">Remove</a></td>
                        </tr>
					<?php  } } elseif($skus_recs) { ?>
						<?php foreach($skus_recs as $rec): ?>
						<tr id="row_<?php echo $i ; ?>">
							<td><input type="text" id="sku_code<?php echo $i ; ?>" name="sku_code[]" value="<?php echo stripslashes($rec->sku_code) ; ?>" class="intable"/></td>
                            <td><input type="text" id="size<?php echo $i ; ?>" name="size[]" value="<?php echo stripslashes($rec->size) ; ?>" class="intable"/></td>
                            <td><input type="text" id="size_french<?php echo $i ; ?>" name="size_french[]" value="<?php echo stripslashes($rec->size_french) ; ?>" class="intable" /></td>
                            <td><input type="text" id="price<?php echo $i ; ?>" name="price[]" value="<?php echo stripslashes($rec->price) ; ?>" class="intable" /></td>
                            <td><input type="text" id="wholesale_price<?php echo $i ; ?>" name="wholesale_price[]" value="<?php echo stripslashes($rec->wholesale_price) ; ?>" class="intable" /></td>
                            <td><input type="text" id="weight<?php echo $i ; ?>" name="weight[]" value="<?php echo stripslashes($rec->weight) ; ?>" class="intable"/></td>
                            <td><input type="text" id="upc<?php echo $i ; ?>" name="upc[]" value="<?php echo stripslashes($rec->upc) ; ?>" class="intable" /></td>
                            <td><a class="remove_link" href="javascript:void(0);" row_id="<?php echo $i ; ?>">Remove</a></td>
                        </tr>
                        <?php $i++ ; endforeach ; ?>
                    <?php } ?>
					    <tr>
							<td colspan="8"><a id="add_sku_row" href="javascript:void(0);">Add New Sku</a></td>
						</tr>
                	</tbody>
                </table>
                <?php if($row_counter > 0) { ?>
                	<input type="hidden" id="current_rows" name="current_rows" value="<?php echo $row_counter ; ?>" />
                	<input type="hidden" id="counter_rows" name="counter_rows" value="<?php echo $row_counter ; ?>" />
				<?php } else { ?>
                	<input type="hidden" id="current_rows" name="current_rows" value="<?php echo $i-- ; ?>" />
                	<input type="hidden" id="counter_rows" name="counter_rows" value="<?php echo $i-- ; ?>" />
        		<?php } ?>
            </div>
		</div>
	</div>
    
    <div class="section">
		<div class="box">
			<div class="content">
				<div class="row">
					<label></label>
					<div class="right">
                        <button type="submit"><span>Update</span></button>
                        <button type="button" id="cancel"><span>Cancel</span></button>
					</div>
				</div>
            </div>
		</div>
	</div>
</form>

<div class="modal" title="Instructions">
    <p>To insert a tables use the following syntax.</p>
    <p>[table]<br />item|5ml<br />item|5ml<br />[endtable]</p>
</div>

<script type="text/javascript">
$(function(){
	$("#cancel").live('click',function(){
		window.location.href = "<?php echo base_url()."products/index/" ; ?>" ;
	}) ;
}) ;

$(function(){
	$(".remove_link").live('click',function(){
		var current_row = $(this).attr("row_id") ;
		var row = "#row_" + current_row ;
		$(row).fadeOut(500, function(){ $(row).remove(); }) ;
		$("#counter_rows").val(parseInt($("#counter_rows").val()) - 1) ;
	}) ;
}) ;

$(function(){
	$("#add_sku_row").click(function(){
		var current_row = $("#current_rows").val() ;
		current_row = parseInt(current_row) + 1 ;
		$("#current_rows").val(current_row) ;
		var string = create_string(current_row) ;
		$('#skus_table tr:last').before(string) ;
		$("#counter_rows").val(parseInt($("#counter_rows").val()) + 1) ;
	}) ;
}) ;

function create_string(number)
{
	var html = '<tr id="row_'+number+'"><td><input type="text" id="sku_code'+number+'" name="sku_code[]" value="" class="intable" /></td><td><input type="text" id="size'+number+'" name="size[]" value="" class="intable" /></td><td><input type="text" id="size_french'+number+'" name="size_french[]" value="" class="intable" /></td><td><input type="text" id="price'+number+'" name="price[]" value="" class="intable" /></td><td><input type="text" id="wholesale_price'+number+'" name="wholesale_price[]" value="" class="intable" /></td><td><input type="text" id="weight'+number+'" name="weight[]" value="" class="intable" /></td><td><input type="text" id="upc'+number+'" name="upc[]" value="" class="intable" /></td><td><a class="remove_link" href="javascript:void(0);" row_id="'+number+'">Remove</a></td></tr>' ;
	
	return html ;
}
</script>