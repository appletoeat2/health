<div id="right">
<form id="product_group_form" name="product_group_form" action="<?php echo base_url()."product_groups/update_product_group/".$group_rec->id ; ?>" method="post">
    <div class="section">
		<div class="box">
			<div class="title">Edit Product Group Details<span class="hide"></span></div>
			<div class="content">
            <?php if($errors) { ?>
                <div class="message inner red"><br /><ul><?php echo $errors ; ?></ul><br /></div>
           	<?php } ?>
             	<input type="hidden" id="group_id" name="group_id" value="<?php echo $group_rec->id ; ?>" />
            	<div class="row"> 
					<label>Group Name</label>
					<div class="right"><input type="text" id="group_name" name="group_name" value="<?php echo set_value("group_name", $group_rec->group_name) ; ?>" /></div>
				</div>
                <div class="row">
					<label>Description</label>
					<div class="right"><input type="text" id="description" name="description" value="<?php echo set_value("description", $group_rec->description) ; ?>" /></div>
				</div>
                <div class="row"> 
					<label>Group Name (French)</label>
					<div class="right"><input type="text" id="group_name_french" name="group_name_french" value="<?php echo set_value("group_name_french", $group_rec->group_name_french) ; ?>" /></div>
				</div>
                <div class="row">
					<label>Description (French)</label>
					<div class="right"><input type="text" id="description_french" name="description_french" value="<?php echo set_value("description_french", $group_rec->description_french) ; ?>" /></div>
				</div>
                <div class="row">
					<label>Sort Order</label>
					<div class="right"><input type="text" id="sort_order" name="sort_order" value="<?php echo set_value("sort_order", $group_rec->sort_order) ; ?>" /></div>
				</div>
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
		window.location.href = "<?php echo base_url()."product_groups/index" ; ?>" ;
	}) ;
}) ;
</script>