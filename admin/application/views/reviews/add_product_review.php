<?php
function is_equal($group1_id, $rec_id)
{
	if($group1_id == $rec_id) return true ;
	else return false ;
}
?>
<div id="right">
<form id="product_review_form" name="product_review_form" action="<?php echo base_url()."reviews/insert_review" ; ?>" method="post">
<input type="hidden" id="review_id" name="review_id" value="<?php // echo $review_rec->id ; ?>" />

<div class="section">
	<?php if($errors) { ?><br /><div class="message red"><br /><ul><?php echo $errors ; ?></ul><br /></div><?php } ?>
	<div class="box">
		<div class="title">Product Review Details<span class="hide"></span></div>
		<div class="content">
        	<div class="row">
				<label>Products</label>
				<div class="right">
					<select id="product_id" name="product_id" class="jqselect big">
						<?php if($products) { foreach($products as $rec): ?>
                        <option value="<?php echo $rec->id ; ?>" <?php echo set_select('product_id', $rec->id) ; ?>><?php echo stripslashes($rec->product_name) ; ?></option>
                        <?php endforeach ; } ?>
					</select>
				</div>
			</div>
            
            <div class="row">
				<label>Review Title</label>
				<div class="right"><input type="text" id="review_title" name="review_title" value="<?php echo set_value("review_title") ; ?>" /></div>
			</div>
            
            <div class="row">
				<label>Reviewer Name</label>
				<div class="right"><input type="text" id="reviewer_name" name="reviewer_name" value="<?php echo set_value("reviewer_name") ; ?>" /></div>
			</div>
            
            <div class="row">
				<label>Reviewer Email</label>
				<div class="right"><input type="text" id="reviewer_email" name="reviewer_email" value="<?php echo set_value("reviewer_email") ; ?>" /></div>
			</div>
            
            <div class="row">
				<label>Reviewer Comment</label>
				<div class="right"><textarea id="reviewer_comment" name="reviewer_comment"><?php echo set_value("reviewer_comment") ; ?></textarea></div>
			</div>
            
            <div class="row">
				<label>Stars</label>
				<div class="right">
					<select id="stars" name="stars" class="jqselect big">
						<option value="1" <?php echo set_select('product_id', 1) ; ?>>1</option>
                        <option value="2" <?php echo set_select('product_id', 2) ; ?>>2</option>
                        <option value="3" <?php echo set_select('product_id', 3) ; ?>>3</option>
                        <option value="4" <?php echo set_select('product_id', 4) ; ?>>4</option>
                        <option value="5" <?php echo set_select('product_id', 5) ; ?>>5</option>
                	</select>
				</div>
			</div>
            
            <div class="row">
				<label>Approved</label>
                <div class="right">
                	<input type="radio" name="approved" id="approved-1" value="Yes" <?php echo set_radio("approved", "Yes", true) ; ?> /><label for="approved-1">Yes</label>  
                 	<input type="radio" name="approved" id="approved-2" value="No" <?php echo set_radio("approved", "No") ; ?> /><label for="approved-2">No</label>
               	</div>
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
		window.location.href = "<?php echo base_url()."reviews/index" ; ?>" ;
	}) ;
}) ;
</script>