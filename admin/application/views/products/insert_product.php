<div id="right">
<form id="product_form" name="product_form" action="<?php echo base_url()."products/add_product" ; ?>" method="post">
	<div class="section">
		<div class="half">
			<div class="box">
				<div class="title">Basic Information<span class="hide"></span></div>
				<div class="content">
					<div class="row">
						<label>Product Code</label>
						<div class="right"><input type="text" id="product_code" name="product_code" value="" /></div>
					</div>
                    <div class="row">
                        <label>NPN #</label>
                        <div class="right"><input type="text" id="npn" name="npn" value="" /></div>
                    </div>
                    <div class="row">
                        <label>Sort Order</label>
                        <div class="right"><input type="text" id="sort_order" name="sort_order" value="" /></div>
                    </div>
                    <div class="row">
						<label>Product Group</label>
						<div class="right">
							<select id="group_id" name="group_id" class="big">
								<?php if($product_groups) { foreach($product_groups as $rec): ?>
                            		<option value="<?php echo $rec->id ; ?>" <?php if($group_id == $rec->id) echo 'selected="selected"' ; ?>><?php echo stripslashes($rec->group_name) ; ?></option>
                            	<?php endforeach ; } ?>
							</select>
						</div>
					</div>
                    <div class="row">
                        <label>Is New?</label>
                        <div class="right">
                            <input type="radio" name="isnew" id="isnew-1" value="Yes" checked="checked" /> 
                            <label for="isnew-1">Yes</label>
                            <input type="radio" name="isnew" id="isnew-2" value="No" /> 
                            <label for="isnew-2">No</label>
                        </div>
                    </div>
                    <div class="row">
                        <label>Status</label>
                        <div class="right">
                            <input type="radio" name="status" id="status-1" value="Active" checked="checked" /> 
                            <label for="status-1">Active</label>  
                            <input type="radio" name="status" value="Disable" id="status-2" /> 
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
								if($product_categories) {
									$i = 1 ;
									foreach($product_categories as $rec):
										echo '<div class="right">' ;
										echo '<input type="checkbox" id="product_category-'.$i.'" name="product_categories[]" value="'.stripslashes($rec->id).'"/>' ; 
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
							if($food_sensitivities) {
								$i = 1 ;
								foreach($food_sensitivities as $rec):
									echo '<div class="right">' ;
									echo '<input type="checkbox" id="food_sensitivities-'.$i.'" name="food_sensitivities[]" value="'.stripslashes($rec->id).'"/>' ; 
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
		<div class="half">
			<div class="box">
				<div class="title">English Information<span class="hide"></span></div>
				<div class="content">
					<div class="row">
						<label>Product Name</label>
						<div class="right"><input type="text" id="product_name" name="product_name" value="" /></div>
					</div>
					<div class="row">
						<label>Health Claim</label>
						<div class="right"><input type="text" id="health_claim" name="health_claim" value="" /></div>
					</div>
					<div class="row">
						<label>Short Description</label>
						<div class="right"><textarea id="short_description" name="short_description" rows="" cols="" class="wysiwyg" style="height:70px;"></textarea></div>
					</div>
                    <div class="row">
						<label>Description</label>
						<div class="right"><textarea id="description" name="description" rows="" cols="" class="wysiwyg" style="height:70px;"></textarea></div>
					</div>
                    <div class="row">
						<label>Formula</label>
						<div class="right"><textarea id="formula" name="formula" rows="" cols="" class="wysiwyg" style="height:70px;"></textarea></div>
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
						<div class="right"><input type="text" id="product_name_french" name="product_name_french" value="" /></div>
					</div>
					<div class="row">
						<label>Health Claim</label>
						<div class="right"><input type="text" id="health_claim_french" name="health_claim_french" value="" /></div>
					</div>
					<div class="row">
						<label>Short Description</label>
						<div class="right"><textarea id="short_description_french" name="short_description_french" class="wysiwyg" rows="" cols="" style="height:70px;"></textarea></div>
					</div>
                    <div class="row">
						<label>Description</label>
						<div class="right"><textarea id="description_french" name="description_french" class="wysiwyg" rows="" cols="" style="height:70px;"></textarea></div>
					</div>
                    <div class="row">
						<label>Formula</label>
						<div class="right"><textarea id="formula_french" name="formula_french" class="wysiwyg" rows="" cols="" style="height:70px;"></textarea></div>
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
						<tr id="row_1">
							<td><input type="text" id="sku_code1" name="sku_code[]" value="" class="intable" /></td>
                            <td><input type="text" id="size1" name="size[]" value="" class="intable" /></td>
                            <td><input type="text" id="size_french1" name="size_french[]" value="" class="intable" /></td>
                            <td><input type="text" id="price1" name="price[]" value="" class="intable" /></td>
                            <td><input type="text" id="wholesale_price1" name="wholesale_price[]" value="" class="intable" /></td>
                            <td><input type="text" id="weight1" name="weight[]" value="" class="intable" /></td>
                            <td><input type="text" id="upc1" name="upc[]" value="" class="intable" /></td>
                            <td><a class="remove_link" href="javascript:void(0);" row_id="1">Remove</a></td>
                        </tr>
                        <tr>
							<td colspan="8"><a id="add_sku_row" href="javascript:void(0);">Add New Sku</a></td>
						</tr>
                   	</tbody>
				</table>
                <input type="hidden" id="current_rows" name="current_rows" value="1" />
                <input type="hidden" id="counter_rows" name="counter_rows" value="1" />
			</div>
		</div>
	</div>
    
    <div class="section">
		<div class="box">
			<div class="content">
				<div class="row">
					<label></label>
					<div class="right">
						<button type="submit"><span>Sumbit</span></button>
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