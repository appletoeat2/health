<section class="container page-content">
	<hr class="vertical-space2">
    <?php $this->load->view("products/filter_menu") ; ?>
    <section class="eleven columns">
    <div id="msg_div" style="display:none;"><h6>No Products meet the filter criteria, deselect filter items to expand the scope</h6></div>
	<?php
		$group_id = 0 ;
		$loop = 1 ;
		if($products)
		{
			foreach($products as $rec):
				if($rec->group_id != $group_id)
				{
					$group_id = $rec->group_id ;
					if($loop == 1) echo '<div id="group_'.$rec->group_id.'" class="group_div"><h2>'.$rec->group_name.'</h2><p>'.$rec->short_description.'</p><hr class="vertical-space3">' ;
					else echo '<hr class="vertical-space3"></div><div id="group_'.$rec->group_id.'" class="group_div"><h2>'.$rec->group_name.'</h2><p>'.$rec->short_description.'</p><hr class="vertical-space3">' ;
				}
		?>
    		<div id="product<?php echo $rec->product_id ; ?>" class="product_item" food_sensitivities="<?php echo $rec->food_sensitivities_id ; ?>" categories="<?php echo $rec->categories_id ; ?>" product_id="<?php echo $rec->product_id ; ?>" title="<?php echo $rec->health_claim ; ?>">
				<div class="img-item center" style="text-align:center">
                	<img src="<?php echo base_url()."admin/images/prod_images/small/".strtolower($rec->product_code).".jpg" ; ?>" alt="">
                </div>
    			<div class="product_title"><p style="text-align:center"><?php echo $rec->product_name ; ?></p></div>
			</div>
    	
		<?php
			$loop++ ;
			endforeach ;
			echo '<hr class="vertical-space3"></div>' ;
		}
		?>
    </section>
	<hr class="vertical-space2">
</section>
<script type="text/javascript">
$(function(){
	$(".product_item").click(function(){
		var product_id = $(this).attr("product_id") ;
		window.location.href = "<?php echo base_url()."products/product_details/0/" ; ?>" + product_id ;
	}) ;
}) ;
</script>