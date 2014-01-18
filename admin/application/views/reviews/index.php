<div id="right">
	<div class="section">
    	<?php show_message($message) ; ?>
       	<div class="box">
            <div class="title">Review Detail<span class="hide"></span></div>
            <div class="content">
            	<table cellspacing="0" cellpadding="0" border="0" class="all"> 
					<thead> 
						<tr>
							<th width="10%">Product Id</th>
							<th width="10%">Stars</th>
							<th width="15%">Name</th>
                            <th width="30">Comment</th>
                            <th width="15%">Date</th>
                            <th width="10%">Approved</th>
							<th width="10%">Action</th>
						</tr>
					</thead>
					<?php if($reviews) { ?>	
                    <tbody>	 	 
                    <?php foreach($reviews as $rec): ?>
						<tr>
							<td><?php echo stripslashes($rec->product_code) ; ?></td>
							<td><?php echo stripslashes($rec->stars) ; ?></td>
							<td><?php echo stripslashes($rec->reviewer_name) ; ?></td>
                            <td><?php echo substr(stripslashes($rec->reviewer_comment), 0, 150) ; ?></td>
                            <td><?php echo date("d-M-Y", strtotime($rec->comment_timestamp)) ; ?></td>
                            <td><?php echo stripslashes($rec->approved) ; ?></td>
                            <td><a href="<?php echo base_url()."reviews/edit_review/".$rec->id ; ?>">Edit</a> - <a href="<?php echo base_url()."reviews/remove_review/".$rec->id ; ?>" onclick="return confirm('Are you sure to remove this record?');">Remove</a></td>
						</tr>
                    <?php endforeach ; ?>
					</tbody>
				<?php } ?>
                </table>
			</div>
            
            <div class="content">
           		<div class="right">
                	<button id="add_new_product" type="button"><span>Click Here to Add Product Review</span></button>
            	</div>
            </div>
            
		</div>
	</div>
</div>
<script type="text/javascript">
$(function(){
	$("#add_new_product").click(function(){
		window.location.href = "<?php echo base_url()."reviews/add_review" ; ?>" ;
	}) ;
}) ;
</script>
<?php
function show_message($message)
{
	if($message == 1)
		echo '<div class="message green"><span><b>Succes:</b>: Product Review record added successfully.</span></div>' ;
	elseif($message == 2)
		echo '<div class="message green"><span><b>Succes:</b>: Product Review record updated successfully.</span></div>' ;
	elseif($message == 3)
		echo '<div class="message green"><span><b>Succes:</b>: Product Review record removed successfully.</span></div>' ;
}
?>