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
	<br />
    <div class="section">
    		<?php if($errors) { ?><div class="message red"><br /><ul><?php echo $errors ; ?></ul><br /></div><?php } ?>
		<div class="half">
			<div class="box">
				<div class="title">Basic Information<span class="hide"></span></div>
				<div class="content">
					<div class="row">
						<label>Product Code</label>
						<div class="right"><input type="text" id="product_code" name="product_code" value="<?php echo set_value("product_code", stripslashes($product_detail->product_code)) ; ?>" disabled="disabled" /></div>
					</div>
                    <div class="row">
                        <label>NPN #</label>
                        <div class="right"><input type="text" id="npn" name="npn" disabled="disabled" value="<?php echo set_value("npn", stripslashes($product_detail->npn)) ; ?>" /></div>
                    </div>
                    <div class="row">
                        <label>Sort Order</label>
                        <div class="right"><input type="text" id="sort_order" name="sort_order" disabled="disabled" value="<?php echo set_value("sort_order", stripslashes($product_detail->sort_order)) ; ?>" /></div>
                    </div>
                    <div class="row">
						<label>Product Group</label>
						<div class="right">
							<select id="group_id" name="group_id" class="big" disabled="disabled">
								<?php if($product_groups) { foreach($product_groups as $rec): ?>
                            		<option value="<?php echo $rec->id ; ?>" <?php echo set_select('group_id', $rec->id, is_equal($rec->id, $group_rec->id)); ?>><?php echo stripslashes($rec->group_name) ; ?></option>
                            	<?php endforeach ; } ?>
							</select>
						</div>
					</div>
                    <div class="row">
						<label>Is New?</label>
						<div class="right">
							<input type="radio" name="isnew" id="isnew-1" value="Yes"  disabled="disabled" <?php echo set_radio("isnew", "Yes", is_equal($product_detail->isnew , "Yes")); ?>/> 
							<label for="isnew-1">Yes</label>
                        	<input type="radio" name="isnew" id="isnew-2" value="No" disabled="disabled" <?php echo set_radio("isnew", "No", is_equal($product_detail->isnew , "No")); ?>/>
							<label for="isnew-2">No</label>
						</div>
					</div>
                	<div class="row">
					<label>Status</label>
                        <div class="right">
                            <input type="radio" name="status" id="status-1" value="Active" disabled="disabled" <?php echo set_radio("status", "Active", is_equal($product_detail->status, "Active")); ?> /> 
                            <label for="status-1">Active</label>  
                            <input type="radio" name="status" value="Disable" id="status-2" disabled="disabled" <?php echo set_radio("status", "Disable", is_equal($product_detail->status, "Disable")); ?> /> 
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
									echo '<input type="checkbox" id="product_category-'.$i.'" name="product_categories[]" value="'.stripslashes($rec->id).'" '.set_checkbox('product_categories[]', stripslashes($rec->id), id_exists1($rec->id, $categories_recs)).' disabled="disabled" />' ;
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
									
									echo '<input type="checkbox" id="food_sensitivities-'.$i.'" name="food_sensitivities[]" value="'.stripslashes($rec->id).'" '.set_checkbox('food_sensitivities[]', stripslashes($rec->id), id_exists1($rec->id, $food_sensitivities_recs)).' disabled="disabled" />' ;
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
			<div class="title">Checkboxes, radiobuttons and file upload<span class="hide"></span></div>
			<div class="content">
            	<div class="row">
                    <div class="right">
                    	<div class="gallery">
                        	<div class="thumb">
                            	<a href="<?php echo base_url()."images/prod_images/large/".$product_detail->product_code.".jpg" ; ?>" class="pirobox" rel="single" title=""><img src="<?php echo base_url()."images/prod_images/small/".$product_detail->product_code.".jpg" ; ?>" alt="Photo" /></a>
                            </div>
                    	</div>
                	</div>
                </div>
			</div>
		</div>
	</div>
    
	<div class="section">
		<div class="half">
			<div class="box">
				<div class="title">English Information<span class="hide"></span></div>
				<div class="content">
                	<div class="row">
						<label>Product Name</label>
						<div class="right"><input type="text" id="product_name" name="product_name" value="<?php echo set_value("product_name", stripslashes($product_detail->product_name)) ; ?>" disabled="disabled" /></div>
					</div>
					<div class="row">
						<label>Health Claim</label>
						<div class="right"><input type="text" id="health_claim" name="health_claim" value="<?php echo set_value("health_claim", stripslashes($product_detail->health_claim)) ; ?>" disabled="disabled" /></div>
					</div>
					<div class="row">
						<label>Short Description</label>
                        <div class="row"><textarea id="short_description" name="short_description" disabled="disabled"><?php echo set_value("short_description", stripslashes($product_detail->short_description)) ; ?></textarea></div>
					</div>
                    <div class="row">
						<label>Description</label>
						<div class="row"><textarea id="description" name="description" disabled="disabled"><?php echo set_value("description", stripslashes($product_detail->description)) ; ?></textarea></div>
					</div>
                    <div class="row">
						<label>Formula <a href="javascript:void(0);" class="modalopen">Help!</a></label>
						<div class="row"><textarea id="formula" name="formula" disabled="disabled"><?php echo set_value("formula", stripslashes($product_detail->formula)) ; ?></textarea></div>
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
						<div class="right"><input type="text" id="product_name_french" name="product_name_french" value="<?php echo set_value("product_name_french", stripslashes($product_detail->product_name_french)) ; ?>" disabled="disabled" /></div>
					</div>
					<div class="row">
						<label>Health Claim</label>
						<div class="right"><input type="text" id="health_claim_french" name="health_claim_french" value="<?php echo set_value("health_claim_french", stripslashes($product_detail->health_claim_french)) ; ?>" disabled="disabled" /></div>
					</div>
					<div class="row">
						<label>Short Description</label>
                       	<div class="row"><textarea id="short_description_french" name="short_description_french" disabled="disabled"><?php echo set_value("short_description_french", stripslashes($product_detail->short_description_french)) ; ?></textarea></div>
					</div>
                    <div class="row">
						<label>Description</label>
						<div class="row"><textarea id="description_french" name="description_french" disabled="disabled"><?php echo set_value("description_french", stripslashes($product_detail->description_french)) ; ?></textarea></div>
					</div>
                    <div class="row">
						<label>Formula <a href="javascript:void(0);" class="modalopen">Help!</a></label>
						<br /><br /><textarea id="formula_french" name="formula_french" disabled="disabled"><?php echo set_value("formula_french", stripslashes($product_detail->formula_french)) ; ?></textarea></div>
					</div>
				</div>
			</div>
		</div>
	</div>
    
    <div class="section">
		<div class="box">
			<div class="title">Sizes and Detials<span class="hide"></span></div>
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
							<td><input type="text" id="sku_code<?php echo $x + 1 ; ?>" name="sku_code[]" value="<?php echo stripslashes($sku_codes[$x]) ; ?>" class="intable" disabled="disabled" /></td>
                        	<td><input type="text" id="size<?php echo $x + 1 ; ?>" name="size[]" class="intable" value="<?php echo stripslashes($sizes[$x]); ?>" disabled="disabled" /></td>
                        	<td><input type="text" id="size_french<?php echo $x + 1 ; ?>" name="size_french[]" class="intable" value="<?php echo stripslashes($sizes_french[$x]) ; ?>" disabled="disabled" /></td>
                        	<td><input type="text" id="price<?php echo $x + 1 ; ?>" name="price[]" class="intable" value="<?php echo stripslashes($prices[$x]) ; ?>" disabled="disabled" /></td>
                        	<td><input type="text" id="wholesale_price<?php echo $x + 1 ; ?>" name="wholesale_price[]" class="intable" value="<?php echo stripslashes($wholesale_prices[$x]) ; ?>" disabled="disabled" /></td>
                        	<td><input type="text" id="weight<?php echo $x + 1 ; ?>" name="weight[]" class="intable" value="<?php echo stripslashes($weights[$x]) ; ?>" disabled="disabled" /></td>
                        	<td><input type="text" id="upc<?php echo $x + 1 ; ?>" name="upc[]" class="intable" value="<?php echo stripslashes($upc[$x]) ; ?>" disabled="disabled" /></td>							<td><a class="remove_link" href="javascript:void(0);" row_id="<?php echo $x + 1 ; ?>" disabled="disabled">Remove</a></td>
                        </tr>
					<?php  } } elseif($skus_recs) { ?>
						<?php foreach($skus_recs as $rec): ?>
						<tr id="row_<?php echo $i ; ?>">
							<td><input type="text" id="sku_code<?php echo $i ; ?>" name="sku_code[]" value="<?php echo stripslashes($rec->sku_code) ; ?>" class="intable" disabled="disabled" /></td>
                            <td><input type="text" id="size<?php echo $i ; ?>" name="size[]" value="<?php echo stripslashes($rec->size) ; ?>" class="intable" disabled="disabled" /></td>
                            <td><input type="text" id="size_french<?php echo $i ; ?>" name="size_french[]" value="<?php echo stripslashes($rec->size_french) ; ?>" class="intable" disabled="disabled" /></td>
                            <td><input type="text" id="price<?php echo $i ; ?>" name="price[]" value="<?php echo stripslashes($rec->price) ; ?>" class="intable" disabled="disabled" /></td>
                            <td><input type="text" id="wholesale_price<?php echo $i ; ?>" name="wholesale_price[]" value="<?php echo stripslashes($rec->wholesale_price) ; ?>" class="intable" disabled="disabled" /></td>
                            <td><input type="text" id="weight<?php echo $i ; ?>" name="weight[]" value="<?php echo stripslashes($rec->weight) ; ?>" class="intable" disabled="disabled" /></td>
                            <td><input type="text" id="upc<?php echo $i ; ?>" name="upc[]" value="<?php echo stripslashes($rec->upc) ; ?>" class="intable" disabled="disabled" /></td>
                            <td><a class="remove_link" href="javascript:void(0);" row_id="<?php echo $i ; ?>" disabled="disabled">Remove</a></td>
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
</div>
</form>

<div class="modal" title="Instructions">
    <p>To insert a tables use the following syntax.</p>
    <p>[table]<br />item|5ml<br />item|5ml<br />[endtable]</p>
</div>
