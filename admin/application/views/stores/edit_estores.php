<?php
function compare($var, $val)
{
	if($var == $val) return true ;
	else return false ;
}
?>

<form id="store_form" name="store_form" action="<?php echo base_url()."stores/update_estore" ; ?>" method="post">
<div class="section">
	<div id="right">
		<div class="section">
        	<?php if($errors) {  echo '<div class="message red"><br /><ul>'.$errors.'</ul><br /></div>' ; } ?>
            <input type="hidden" name="store_id" id="store_id" value="<?php echo $store_rec->estore_id ; ?>" />
            <div class="box">
				<div class="title">E-Store Details<span class="hide"></span></div>
				<div class="content">
					<div class="row"> 
						<label>Store Name (English)</label>
                        <div class="right"><input type="text" id="store_name_english" name="store_name_english" value="<?php echo set_value("store_name_english", $store_rec->store_name_english) ; ?>" /></div>
					</div>
                    <div class="row">
						<label>Store Name (French)</label>
                        <div class="right"><input type="text" id="store_name_french" name="store_name_french" value="<?php echo set_value("store_name_french", $store_rec->store_name_french) ; ?>" /></div>
                    </div>
                    <div class="row">
						<label>Website URL</label>
                        <div class="right"><input type="text" id="website_url" name="website_url" value="<?php echo set_value("website_url", $store_rec->website_url) ; ?>" /></div>
                    </div>
					<div class="row">
						<label>Status</label>
						<div class="right">
							<input type="radio" id="status-1" name="status" value="Active"  <?php echo set_radio("status", "Active", compare($store_rec->status, "Active")) ; ?> /> 
								<label for="status-1">Active</label>  
							<input type="radio" id="status-2" name="status" value="Disable" <?php echo set_radio("status", "Disable", compare($store_rec->status, "Disable")); ?> /> 
								<label for="status-2">Disable</label>
						</div>
                    </div>
					<div class="row">
						<label></label>
						<div class="right">
							<button type="submit" id="add_store"><span>Update</span></button>
							<button type="button" id="cancel"><span>Cancel</span></button>
						</div>
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
		window.location.href = "<?php echo base_url()."stores/estores" ; ?>" ;
	}) ;
}) ;
</script>