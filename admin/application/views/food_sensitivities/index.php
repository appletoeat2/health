<div id="right">
	<div class="section">
    	<?php show_message($message) ; ?>
       	<div class="box">
            <div class="title">Food Sensitivites<span class="hide"></span></div>
            <div class="content">
            	<table cellspacing="0" cellpadding="0" border="0" class="all"> 
					<thead> 
						<tr>
							<th width="10%">Sort Order</th>
							<th width="40%">Food Sensitivity Name</th>
							<th width="35%">Food Sensitivity Tag</th>
							<th width="15%">Action</th>
						</tr>
					</thead>
				<?php if($food_sensitivities) { ?>	
                    <tbody>
             	 	 	 
                    <?php foreach($food_sensitivities as $rec): ?>
						<tr>
							<td><?php echo stripslashes($rec->sort_order) ; ?></td>
							<td><?php echo stripslashes($rec->name) ; ?></td>
							<td><?php echo stripslashes($rec->tag) ; ?></td>
							<td><a href="<?php echo base_url()."food_sensitivities/edit_food_sensitivity/".$rec->id ; ?>">Edit</a> - <a href="<?php echo base_url()."food_sensitivities/remove_food_sensitivity/".$rec->id ; ?>" onclick="return confirm('Are you sure to remove this record?');">Remove</a></td>
						</tr>
                    <?php endforeach ; ?>
					</tbody>
				<?php } ?>
                </table>
			</div>
            
            <div class="content">
           		<div class="right">
                	<button id="add_new_product" type="button"><span>Click Here to Add Food Sensitivity</span></button>
            	</div>
            </div>
            
		</div>
	</div>
</div>
<script type="text/javascript">
$(function(){
	$("#add_new_product").click(function(){
		window.location.href = "<?php echo base_url()."food_sensitivities/add_food_sensitivities" ; ?>" ;
	}) ;
}) ;
</script>
<?php
function show_message($message)
{
	if($message == 1)
		echo '<div class="message green"><span><b>Succes:</b>: Food Sensitivity record added successfully.</span></div>' ;
	elseif($message == 2)
		echo '<div class="message green"><span><b>Succes:</b>: Food Sensitivity record updated successfully.</span></div>' ;
	elseif($message == 3)
		echo '<div class="message green"><span><b>Succes:</b>: Food Sensitivity record removed successfully.</span></div>' ;
}
?>