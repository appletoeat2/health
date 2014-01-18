<div id="right">
<form id="settings_form" name="settings_form" action="<?php echo base_url()."settings/update_settings" ; ?>" method="post">
<input type="hidden" id="setting_rec_id" name="setting_rec_id" value="<?php echo $setting_rec->id ; ?>" />
<div class="section">
	<div id="right">
<div class="section">
	<?php if($errors) {  echo '<div class="message red"><br /><ul>'.$errors.'</ul><br /></div>' ; } ?>
	<div class="box"> 	 	 
		<div class="title">Site General Settings<span class="hide"></span></div>
		<div class="content">
        	<div class="row">
				<label>Email for Product Detail</label>
				<div class="right"><input type="text" id="products_query_email" name="products_query_email" value="<?php echo set_value("products_query_email", $setting_rec->products_query_email) ; ?>" /></div>
			</div>
            <div class="row">
				<label>Email for Product Review</label>
				<div class="right"><input type="text" id="products_review_email" name="products_review_email" value="<?php echo set_value("products_review_email", $setting_rec->products_review_email) ; ?>" /></div>
			</div>
            <div class="row">
				<label>Goole Analytics Code</label>
				<div class="right"><textarea id="google_analytics" name="google_analytics"><?php echo set_value("google_analytics", $setting_rec->google_analytics) ; ?></textarea></div>
			</div>
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
</div>
<script type="text/javascript">
$(function(){
	$("#cancel").live('click',function(){
		window.location.href = "<?php echo base_url()."dashboard" ; ?>" ;
	}) ;
}) ;
</script>