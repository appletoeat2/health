<?php
$this->load->view("dynamic_content/texteditor") ;

function is_equal($group1_id, $rec_id)
{
	if($group1_id == $rec_id) return true ;
	else return false ;
}
?>

<div id="right">
<form id="product_form" name="product_form" action="<?php echo base_url()."dynamic_content/update_page" ; ?>" method="post" enctype="multipart/form-data">
    <input type="hidden" id="page_id" name="page_id" value="<?php echo $page_rec->id ; ?>" />
	<br />
	<div class="section">
        <div class="box">
			<div class="title">English Information<span class="hide"></span></div>
			<div class="content">
				<div class="row"> 
					<label>Title</label>
					<div class="right"><input type="text" id="title_english" name="title_english" value="<?php echo set_value("title_english", $page_rec->title_english) ; ?>" /></div>
				</div>
				<div class="row"> 
					<label>Html Title</label>
					<div class="right"><input type="text" id="html_title_english" name="html_title_english" value="<?php echo set_value("html_title_english", $page_rec->html_title_english) ; ?>" /></div>
				</div>		
                <div class="row">
					<label>HTML Content</label>
					<div class="right" style="z-index:-9999 !important;">
						<textarea id="content_english" name="content_english" rows="20" cols="80" style="width: 100%"><?php echo set_value("content_english", $page_rec->content_english) ; ?></textarea>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="section">
        <div class="box">
			<div class="title">French Information<span class="hide"></span></div>
			<div class="content">
				<div class="row"> 
					<label>Title</label>
					<div class="right"><input type="text" id="title_french" name="title_french" value="<?php echo set_value("title_english", $page_rec->title_french) ; ?>" /></div>
				</div>
				<div class="row"> 
					<label>Html Title</label>
					<div class="right"><input type="text" id="html_title_french" name="html_title_french" value="<?php echo set_value("html_title_french", $page_rec->html_title_french) ; ?>" /></div>
				</div>
                <div class="row">
					<label>HTML Content</label>
					<div class="right" style="z-index:-9999 !important;">
						<textarea id="content_french" name="content_french" rows="20" cols="80" style="width: 100%"><?php echo set_value("content_french", $page_rec->content_french) ; ?></textarea>
					</div>
				</div>
			</div>
		</div>
	</div>
	
    <div class="section">
		<div class="box">
			<div class="content">
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
		window.location.href = "<?php echo base_url()."dynamic_content/index/" ; ?>" ;
	}) ;
}) ;
</script>