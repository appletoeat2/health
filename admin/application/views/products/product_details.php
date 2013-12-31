<div id="right">
	<div class="section">
		<div class="half">
			<div class="box">
				<div class="title">Basic Product Details (English)<span class="hide"></span></div>
				<div class="content">
                	<div class="row">
						<label>Product Name</label>
						<div class="right"><input type="text" id="product_name" name="product_name" disabled="disabled" value="<?php echo stripslashes($product_detail->product_name_french) ; ?>" title="<?php echo stripslashes($product_detail->product_name_french) ; ?>" /></div>
					</div>
					<div class="row">
						<label>Health Claim</label>
						<div class="right"><input type="text" id="health_claim" name="health_claim" disabled="disabled" value="<?php echo stripslashes($product_detail->health_claim_french) ; ?>" title="<?php echo stripslashes($product_detail->health_claim_french) ; ?>" /></div>
					</div>
					<div class="row">
						<label>Short Description</label>
						<div class="right"><input type="text" id="short_description" name="short_description" disabled="disabled" value="<?php echo stripslashes($product_detail->short_description_french) ; ?>" title="<?php echo stripslashes($product_detail->short_description_french) ; ?>" /></div>
					</div>
                    <div class="row">
						<label>Description</label>
						<div class="right"><textarea id="description" name="description" rows="" cols="" style="height:70px;" disabled="disabled"><?php echo stripslashes($product_detail->description_french) ; ?></textarea></div>
					</div>
                    <div class="row">
						<label>Formula</label>
						<div class="right"><textarea id="formula" name="formula" rows="" cols="" style="height:70px;" disabled="disabled"><?php echo stripslashes($product_detail->formula_french) ; ?></textarea></div>
					</div>
				</div>
			</div>
		</div>
        <div class="half">
			<div class="box">
				<div class="title">Basic Product Details (French)<span class="hide"></span></div>
				<div class="content">
					<div class="row">
						<label>Product Name</label>
						<div class="right"><input type="text" id="product_name_french" name="product_name_french" disabled="disabled" value="<?php echo stripslashes($product_detail->product_name_french) ; ?>" title="<?php echo stripslashes($product_detail->product_name_french) ; ?>" /></div>
					</div>
					<div class="row">
						<label>Health Claim</label>
						<div class="right"><input type="text" id="health_claim_french" name="health_claim_french" disabled="disabled" value="<?php echo stripslashes($product_detail->health_claim_french) ; ?>" title="<?php echo stripslashes($product_detail->health_claim_french) ; ?>" /></div>
					</div>
					<div class="row">
						<label>Short Description</label>
						<div class="right"><input type="text" id="short_description_french" name="short_description_french" disabled="disabled" value="<?php echo stripslashes($product_detail->short_description_french) ; ?>" title="<?php echo stripslashes($product_detail->short_description_french) ; ?>" /></div>
					</div>
                    <div class="row">
						<label>Description</label>
						<div class="right"><textarea id="description_french" name="description_french" rows="" cols="" style="height:70px;" disabled="disabled"><?php echo stripslashes($product_detail->description_french) ; ?></textarea></div>
					</div>
                    <div class="row">
						<label>Formula</label>
						<div class="right"><textarea id="formula_french" name="formula_french" rows="" cols="" style="height:70px;" disabled="disabled"><?php echo stripslashes($product_detail->formula_french) ; ?></textarea></div>
					</div>
				</div>
			</div>
		</div>
	</div>
    
    <div class="section">
		<div class="box">
			<div class="title">Other Product Details<span class="hide"></span></div>
			<div class="content">
            	<div class="row">
					<label>Product Code</label>
					<div class="right"><input type="text" id="product_code" name="product_code" disabled="disabled" value="<?php echo stripslashes($product_detail->product_code) ; ?>" /></div>
				</div>
                <div class="row">
					<label>NPN</label>
					<div class="right"><input type="text" id="npn" name="npn" disabled="disabled" value="<?php echo stripslashes($product_detail->npn) ; ?>" /></div>
				</div>
                <div class="row">
					<label>Sort Order</label>
					<div class="right"><input type="text" id="sort_order" name="sort_order" disabled="disabled" value="<?php echo stripslashes($product_detail->sort_order) ; ?>" /></div>
				</div>
                <div class="row">
					<label>Product Group</label>
					<div class="right">
						<select id="group_id" name="group_id" class="big" disabled="disabled">
                            	<option value=""><?php echo $group_rec->group_name ; ?></option>
						</select>
					</div>
				</div>
                <div class="row">
					<label>Product Category</label>
					<div class="right">
						<select id="product_category" name="product_categories[]" multiple="multiple" size="5" class="multiple" disabled="disabled">
							<?php if($categories_recs) { foreach($categories_recs as $rec): ?>
                            	<option value=""><?php echo stripslashes($rec->category_name) ; ?></option>
                            <?php endforeach ; } ?>
						</select>
					</div>
				</div>
                <div class="row">
					<label>Food Sensitivities</label>
					<div class="right">
						<select id="food_sensitivities" name="food_sensitivities[]" multiple="multiple" size="5" class="multiple" disabled="disabled">
							<?php if($food_sensitivities_recs) { foreach($food_sensitivities_recs as $rec): ?>
                            	<option value=""><?php echo stripslashes($rec->name) ; ?></option>
                            <?php endforeach ; } ?>
						</select>
					</div>
				</div>
                <div class="row">
					<label>Is New?</label>
					<div class="right">
						<input type="radio" name="isnew" id="isnew-1" value="Yes" <?php if($product_detail->isnew == "Yes") echo 'checked="checked"' ; ?> /> 
						<label for="isnew-1">Yes</label>
                        <input type="radio" name="isnew" id="isnew-2" value="No" <?php if($product_detail->isnew == "No") echo 'checked="checked"' ; ?>  /> 
						<label for="isnew-2">No</label>
					</div>
				</div>
                <div class="row">
					<label>Status</label>
					<div class="right">
						<input type="radio" name="status" id="status-1" value="Active" <?php if($product_detail->status == "Active") echo 'checked="checked"' ; ?> /> 
						<label for="status-1">Active</label>  
                        <input type="radio" name="status" value="Deactive" id="status-2" <?php if($product_detail->status == "Disable") echo 'checked="checked"' ; ?> /> 
						<label for="status-2">Deactive</label>
					</div>
				</div>
			</div>
		</div>
	</div>
    
    <div class="section">
		<div class="box">
			<div class="title">Skus Detail<span class="hide"></span></div>
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
                    <?php if($skus_recs) { ?>
					<tbody>
                    	<?php foreach($skus_recs as $rec): ?>
						<tr id="row_1">
							<td><input type="text" value="<?php echo stripslashes($rec->sku_code) ; ?>" title="<?php echo stripslashes($rec->sku_code) ; ?>" class="intable" disabled="disabled"/></td>
                            <td><input type="text" value="<?php echo stripslashes($rec->size) ; ?>" title="<?php echo stripslashes($rec->size) ; ?>" class="intable" disabled="disabled" /></td>
                            <td><input type="text" value="<?php echo stripslashes($rec->size_french) ; ?>" title="<?php echo stripslashes($rec->size_french) ; ?>" class="intable" disabled="disabled" /></td>
                            <td><input type="text" value="<?php echo stripslashes($rec->price) ; ?>" title="<?php echo stripslashes($rec->price) ; ?>" class="intable" disabled="disabled" /></td>
                            <td><input type="text" value="<?php echo stripslashes($rec->wholesale_price) ; ?>" title="<?php echo stripslashes($rec->wholesale_price) ; ?>" class="intable" disabled="disabled" /></td>
                            <td><input type="text" value="<?php echo stripslashes($rec->weight) ; ?>" title="<?php echo stripslashes($rec->weight) ; ?>" class="intable" disabled="disabled" /></td>
                            <td><input type="text" value="<?php echo stripslashes($rec->upc) ; ?>" title="<?php echo stripslashes($rec->upc) ; ?>" class="intable" disabled="disabled" /></td>
                            <td><a class="remove_link" href="javascript:void(0);" row_id="1">Remove</a></td>
                        </tr>
                        <?php endforeach ; ?>
                   	</tbody>
                    <?php } ?>
				</table>
        	</div>
		</div>
	</div>
    
    <div class="section">
		<div class="box">
			<div class="content">
				<div class="row">
					<label></label>
					<div class="right">
                        <button type="button" id="cancel"><span>Back</span></button>
					</div>
				</div>
            </div>
		</div>
	</div>
</div>
<script type="text/javascript">
$(function(){
	$("#cancel").live('click',function(){
		window.location.href = "<?php echo base_url()."products/index/" ; ?>" ;
	}) ;
}) ;
</script>