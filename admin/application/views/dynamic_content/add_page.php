<?php
$this->load->view("dynamic_content/texteditor") ;

function is_equal($group1_id, $rec_id)
{
	if($group1_id == $rec_id) return true ;
	else return false ;
}
?>

<div id="right">
<form id="product_form" name="product_form" action="<?php echo base_url()."dynamic_content/insert_page" ; ?>" method="post" enctype="multipart/form-data">
    <div class="section">
        <div class="box">
			<div class="title">English Information<span class="hide"></span></div>
			<div class="content">
				<div class="row"> 
					<label>Title</label>
					<div class="right"><input type="text" id="title_english" name="title_english" value="<?php echo set_value("title_english") ; ?>" /></div>
				</div>
				<div class="row"> 
					<label>Html Title</label>
					<div class="right"><input type="text" id="html_title_english" name="html_title_english" value="<?php echo set_value("html_title_english") ; ?>" /></div>
				</div>		
                <div class="row">
					<label>HTML Content</label>
					<div class="right" style="z-index:-9999 !important;">
						<textarea id="content_english" name="content_english" rows="20" cols="80" style="width: 100%"><?php echo set_value("content_english") ; ?></textarea>
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
					<div class="right"><input type="text" id="title_french" name="title_french" value="<?php echo set_value("title_french") ; ?>" /></div>
				</div>
				<div class="row"> 
					<label>Html Title</label>
					<div class="right"><input type="text" id="html_title_french" name="html_title_french" value="<?php echo set_value("html_title_french") ; ?>" /></div>
				</div>
                <div class="row">
					<label>Content</label>
					<div class="right" style="z-index:-9999 !important;">
						<textarea id="content_french" name="content_french" rows="20" cols="80" style="width: 100%"><?php echo set_value("content_french") ; ?></textarea>
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
						<button type="submit"><span>Sumbit</span></button>
                        <button type="button" id="cancel"><span>Cancel</span></button>
					</div>
				</div>
            </div>
		</div>
	</div>
</form>    
</div>
<div class="modal" title="Instructions">
    <p>To insert a tables use the following syntax.</p>
    <p>[table]<br />item|5ml<br />item|5ml<br />[endtable]</p>
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