<div id="right">
<form id="product_category_form" name="product_category_form" action="<?php echo base_url()."product_categories/update_product_categories" ; ?>" method="post">
    <div class="section">
		<div class="box">
			<div class="title">Edit Product Category Details<span class="hide"></span></div>
			<div class="content">
            <?php if($errors) { ?>
                <div class="message inner red">
                    <br />
                    	<ul><?php echo $errors ; ?></ul>
                    <br />
                </div>
           	<?php } ?>
             	<input type="hidden" id="category_id" name="category_id" value="<?php echo $category_rec->id ; ?>" />
            	<div class="row"> 
					<label>Category Name</label>
					<div class="right"><input type="text" id="category_name" name="category_name" value="<?php echo set_value("category_name", $category_rec->category_name) ; ?>" /></div>
				</div>
                <div class="row">
					<label>Category Tag</label>
					<div class="right"><input type="text" id="category_tag" name="category_tag" value="<?php echo set_value("category_tag", $category_rec->category_tag) ; ?>" /></div>
				</div>
                <div class="row">
					<label>Sort Order</label>
					<div class="right"><input type="text" id="sort_order" name="sort_order" value="<?php echo set_value("sort_order", $category_rec->sort_order) ; ?>" /></div>
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
		window.location.href = "<?php echo base_url()."product_categories/index" ; ?>" ;
	}) ;
}) ;
</script>