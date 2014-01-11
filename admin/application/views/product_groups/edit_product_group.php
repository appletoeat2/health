<?php $this->load->view("product_groups/rich_text_editor") ; ?>
<div id="right">
<form id="product_group_form" name="product_group_form" action="<?php echo base_url()."product_groups/update_product_group/".$group_rec->id ; ?>" method="post"  enctype="multipart/form-data">
<input type="hidden" id="group_id" name="group_id" value="<?php echo $group_rec->id ; ?>" />
<div class="section">
	<?php if($errors) { ?><br /><div class="message red"><br /><ul><?php echo $errors ; ?></ul><br /></div><?php } ?>
	<div class="half">
		<div class="box">
			<div class="title">English<span class="hide"></span></div>
			<div class="content">
				<div class="row"> 
					<label>Group Name</label>
					<div class="right"><input type="text" id="group_name" name="group_name" value="<?php echo set_value("group_name", stripslashes($group_rec->group_name)) ; ?>" /></div>
				</div>
                <div class="row"> 
					<label>Group Title</label>
					<div class="right"><input type="text" id="group_title" name="group_title" value="<?php echo set_value("group_title", stripslashes($group_rec->group_title)) ; ?>" /></div>
				</div>
                <div class="row">
					<label>Short Description</label>
					<div class="right" style="z-index:-9999 !important;"><textarea id="short_description" name="short_description"><?php echo set_value("short_description", stripslashes($group_rec->short_description)) ; ?></textarea></div>
				</div>
           		<div class="row">
					<label>Group Landing Page Description</label>
					<div class="right" style="z-index:-9999 !important;"><textarea id="landing_page_description" name="landing_page_description" class="richtext_textarea"><?php echo set_value("landing_page_description", stripslashes($group_rec->landing_page_description)) ; ?></textarea></div>
				</div>
			</div>
		</div>
	</div>
    <div class="half">
		<div class="box">
			<div class="title">French<span class="hide"></span></div>
			<div class="content">
            	<div class="row"> 
						<label>Group Name (French)</label>
						<div class="right"><input type="text" id="group_name_french" name="group_name_french" value="<?php echo set_value("group_name_french", stripslashes($group_rec->group_name_french)) ; ?>" /></div>
					</div>
                <div class="row"> 
					<label>Group Title</label>
					<div class="right"><input type="text" id="group_title_french" name="group_title_french" value="<?php echo set_value("group_title_french", stripslashes($group_rec->group_title_french)) ; ?>" /></div>
				</div>
                <div class="row">
						<label>Short Description (French)</label>
						<div class="right" style="z-index:-9999 !important;"><textarea id="short_description_french" name="short_description_french"><?php echo set_value("short_description", stripslashes($group_rec->short_description)) ; ?></textarea></div>
					</div>
                <div class="row">
						<label>Group Landing Page Description (French)</label>
						<div class="right" style="z-index:-9999 !important;"><textarea id="landing_page_description_french" name="landing_page_description_french" class="richtext_textarea"><?php echo set_value("landing_page_description_french", stripslashes($group_rec->landing_page_description_french)) ; ?></textarea></div>
					</div>
			</div>
		</div>
	</div>
</div>

<div class="section">
	<div class="box">
		<div class="title">Banner Image<span class="hide"></span></div>
		<div class="content">
        	<div class="row">
				<label></label>
				<div class="right">
					<div class="custom-checkbox"><input type="checkbox" id="upload_new_banner" value="Yes" name="upload_new_banner" <?php echo set_checkbox('upload_new_banner', 'Yes'); ?>><label for="upload_new_banner">Upload New Banner</label></div>
				</div>
			</div>
            <div class="row">
				<label>Banner Image</label>
				<div class="right"><input type="file" id="banner_file" name="banner_file" /></div>
			</div>
            <br />
            <img src="<?php echo base_url()."images/banner_images/".$group_rec->banner_file ; ?>" />
		</div>
	</div>
</div>
    
<div class="section">
	<div class="box">
		<div class="title">Sort Order<span class="hide"></span></div>
		<div class="content">
        	<div class="row">
				<label>Meta</label>
				<div class="right"><input type="text" id="meta" name="meta" value="<?php echo set_value("meta", $group_rec->meta) ; ?>" /></div>
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