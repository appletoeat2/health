<?php
function is_equal($group1_id, $rec_id)
{
	if($group1_id == $rec_id) return true ;
	else return false ;
}
?>
<div id="right">
<form id="product_review_form" name="product_review_form" action="<?php echo base_url()."reviews/update_review" ; ?>" method="post">
<input type="hidden" id="review_id" name="review_id" value="<?php echo $review_rec->id ; ?>" />

<div class="section">
	<?php if($errors) { ?><br /><div class="message red"><br /><ul><?php echo $errors ; ?></ul><br /></div><?php } ?>
	<div class="box">
		<div class="title">Product Review Details<span class="hide"></span></div>
		<div class="content">     
            <div class="row">
				<label>Reviewer Name</label>
				<div class="right"><input type="text" id="reviewer_name" name="reviewer_name" value="<?php echo set_value("reviewer_name", $review_rec->reviewer_name) ; ?>" /></div>
			</div>
            
            <div class="row">
				<label>Reviewer Email</label>
				<div class="right"><input type="text" id="reviewer_email" name="reviewer_email" value="<?php echo set_value("reviewer_email", $review_rec->reviewer_email) ; ?>" /></div>
			</div>
            
            <div class="row">
				<label>Reviewer Comment</label>
				<div class="right"><textarea id="reviewer_comment" name="reviewer_comment"><?php echo set_value("reviewer_comment",  $review_rec->reviewer_comment) ; ?></textarea></div>
			</div>
            
            <div class="row">
				<label>Stars</label>
				<div class="right">
					<select id="stars" name="stars" class="big">
						<option value="1" <?php echo set_select('product_id', 1, is_equal($review_rec->stars, 1)) ; ?>>1</option>
                        <option value="2" <?php echo set_select('product_id', 2, is_equal($review_rec->stars, 2)) ; ?>>2</option>
                        <option value="3" <?php echo set_select('product_id', 3, is_equal($review_rec->stars, 3)) ; ?>>3</option>
                        <option value="4" <?php echo set_select('product_id', 4, is_equal($review_rec->stars, 4)) ; ?>>4</option>
                        <option value="5" <?php echo set_select('product_id', 5, is_equal($review_rec->stars, 5)) ; ?>>5</option>
                	</select>
				</div>
			</div>
            
            <div class="row">
				<label>Approved</label>
                <div class="right">
                	<input type="radio" name="approved" id="approved-1" value="Yes" <?php echo set_radio("approved", "Yes", is_equal($review_rec->approved, $review_rec->approved)) ; ?> /><label for="approved-1">Yes</label>  
                 	<input type="radio" name="approved" id="approved-2" value="No" <?php echo set_radio("approved", "No", is_equal($review_rec->approved, $review_rec->approved)) ; ?> /><label for="approved-2">No</label>
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