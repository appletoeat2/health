<div id="right">
	<div class="section">
    	<?php show_message($message) ; ?>
       	<div class="box">
            <div class="title">Product Groups<span class="hide"></span></div>
            <div class="content">
            	<table cellspacing="0" cellpadding="0" border="0" class="all"> 
					<thead> 
						<tr>
							<th width="10%">Sort Order</th>
							<th width="40%">Group Title</th>
							<th width="35%">Group Title French</th>
							<th width="15%">Action</th>
						</tr>
					</thead>
					<?php if($product_groups) { ?>	
                    <tbody>	 	 
                    <?php foreach($product_groups as $rec): ?>
						<tr>
							<td><?php echo stripslashes($rec->sort_order) ; ?></td>
							<td><?php echo stripslashes($rec->group_title) ; ?></td>
							<td><?php echo stripslashes($rec->group_title_french) ; ?></td>
							<td><a href="<?php echo base_url()."product_groups/edit_product_group/".$rec->id ; ?>">Edit</a> - <a href="<?php echo base_url()."product_groups/remove_product_group/".$rec->id ; ?>" onclick="return confirm('Are you sure to remove this record?');">Remove</a></td>
						</tr>
                    <?php endforeach ; ?>
					</tbody>
				<?php } ?>
                </table>
			</div>
            
            <div class="content">
           		<div class="right">
                	<button id="add_new_product" type="button"><span>Click Here to Add Product Group</span></button>
            	</div>
            </div>
            
		</div>
	</div>
</div>
<script type="text/javascript">
$(function(){
	$("#add_new_product").click(function(){
		window.location.href = "<?php echo base_url()."product_groups/add_product_group" ; ?>" ;
	}) ;
}) ;
</script>
<?php
function show_message($message)
{
	if($message == 1)
		echo '<div class="message green"><span><b>Succes:</b>: Product Group record added successfully.</span></div>' ;
	elseif($message == 2)
		echo '<div class="message green"><span><b>Succes:</b>: Product Group record updated successfully.</span></div>' ;
	elseif($message == 3)
		echo '<div class="message green"><span><b>Succes:</b>: Product Group record removed successfully.</span></div>' ;
}
?>