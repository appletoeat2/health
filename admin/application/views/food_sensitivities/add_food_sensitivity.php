<div id="right">
<form id="food_sensitivity_form" name="food_sensitivity_form" action="<?php echo base_url()."food_sensitivities/insert_food_sensitivity" ; ?>" method="post">
    <div class="section">
		<div class="box">
			<div class="title">Add Food Sensitivity Details<span class="hide"></span></div>
			<div class="content">
            <?php if($errors) { ?>
                <div class="message inner red"><br /><ul><?php echo $errors ; ?></ul><br /></div>
           	<?php } ?>
            	<div class="row"> 
					<label>Food Sensitivity Name</label>
					<div class="right"><input type="text" id="name" name="name" value="<?php echo set_value("name") ; ?>" /></div>
				</div>
                <div class="row">
					<label>Food Sensitivity Tag</label>
					<div class="right"><input type="text" id="tag" name="tag" value="<?php echo set_value("tag") ; ?>" /></div>
				</div>
                <div class="row">
					<label>Sort Order</label>
					<div class="right"><input type="text" id="sort_order" name="sort_order" value="<?php echo set_value("sort_order") ; ?>" /></div>
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
		window.location.href = "<?php echo base_url()."food_sensitivities/index" ; ?>" ;
	}) ;
}) ;
</script>