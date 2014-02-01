<div id="right">
<form id="settings_form" name="settings_form" action="<?php echo base_url()."settings/update_settings" ; ?>" method="post">
<input type="hidden" id="setting_rec_id" name="setting_rec_id" value="<?php echo $setting_rec->id ; ?>" />
<div class="section">
	<div id="right">
    
    	<div class="section">
			<?php if($errors) {  echo '<div class="message red"><br /><ul>'.$errors.'</ul><br /></div>' ; } ?>
    <div class="half">
    	<div class="box">
			<div class="title">English<span class="hide"></span></div>
			<div class="content">
           		<div class="row"> 
					<label>SEO Page Title <a href="<?php echo LINK1 ; ?>" target="_blank">Tips</a></label>
					<div class="right"><input type="text" id="seo_page_title" name="seo_page_title" value="<?php echo set_value("seo_page_title", stripslashes($setting_rec->seo_page_title)) ; ?>" /></div><br />
                </div>
                <div class="row">
					<label>SEO Page Description <a href="<?php echo LINK2 ; ?>" target="_blank">Tips</a></label>
					<div class="right"><input type="text" id="seo_page_description" name="seo_page_description" value="<?php echo set_value("seo_page_description", stripslashes($setting_rec->seo_page_description)) ; ?>" /></div><br />
				</div>
			</div>
		</div>
	</div>
    <div class="half">
		<div class="box">
			<div class="title">French<span class="hide"></span></div>
			<div class="content">
                <div class="row"> 
					<label>SEO Page Title (French)  <a href="<?php echo LINK1 ; ?>" target="_blank">Tips</a></label>
					<div class="right"><input type="text" id="seo_page_title_french" name="seo_page_title_french" value="<?php echo set_value("seo_page_title_french", stripslashes($setting_rec->seo_page_title_french)) ; ?>" /></div><br />
                </div>
                <div class="row">
					<label>SEO Page Description (French) <a href="<?php echo LINK2 ; ?>" target="_blank">Tips</a></label>
					<div class="right"><input type="text" id="seo_page_description_french" name="seo_page_description_french" value="<?php echo set_value("seo_page_description_french", stripslashes($setting_rec->seo_page_description_french)) ; ?>" /></div><br />
				</div>
			</div>
		</div>
	</div>
</div>
    
    
		<div class="section">
			<div class="box"> 	 	 
                <div class="title">Site General Settings<span class="hide"></span></div>
                <div class="content">
                    <div class="row">
                        <label>Email for Product Detail</label>
                        <div class="right"><input type="text" id="products_query_email" name="products_query_email" value="<?php echo set_value("products_query_email", $setting_rec->products_query_email) ; ?>" /></div><br />
                    </div>
                    <div class="row">
                        <label>Email for Product Review</label>
                        <div class="right"><input type="text" id="products_review_email" name="products_review_email" value="<?php echo set_value("products_review_email", $setting_rec->products_review_email) ; ?>" /></div><br />
                    </div>
                    <!--<div class="row">
                            <label>Goole Analytics Code</label>
                            <div class="right"><textarea id="google_analytics" name="google_analytics"><?php // echo set_value("google_analytics", $setting_rec->google_analytics) ; ?></textarea></div>
                        </div> -->
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