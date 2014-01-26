<div id="right">
	<div class="section">
    	<?php show_message($message) ; ?>
       	<div class="box">
            <div class="title">Stores<span class="hide"></span></div>
            <div class="content">
            	<table cellspacing="0" cellpadding="0" border="0" class="all"> 
					<thead> 
						<tr>
                        	<th width="15%">Sort Order</th>
							<th width="25%">Coupon Message</th>
							<th width="25%">Expiry Date</th>
							<th width="12%">Status</th>
							<th width="10%">Action</th>
						</tr>
					</thead>
				<?php if($coupons) { ?>	
                    <tbody>
                    <?php foreach($coupons as $rec): ?>
						<tr>
                        	<td><?php echo $rec->sort_order ; ?></td>
							<td><?php echo substr(stripslashes($rec->coupon_message), 0, 100) ; ?></td>
							<td><?php echo date("m/d/y", strtotime($rec->expiry_date)) ; ?></td>
							<td><?php echo $rec->status ; ?></td>
							<td><a href="<?php echo base_url()."coupon/edit_coupon/".$rec->id ; ?>">Edit</a> - <a href="<?php echo base_url()."coupon/remove_coupons/".$rec->id ; ?>" onclick="return confirm('Are you sure to remove this record?');">Remove</a></td>
						</tr>
                    <?php endforeach ; ?>
					</tbody>
				<?php } ?>
                </table>
			</div>
            
            <div class="content">
           		<div class="right">
                	<button id="add_new_product" type="button"><span>Click Here to Add Coupon</span></button>
            	</div>
            </div>
            
		</div>
	</div>
</div>
<script type="text/javascript">
$(function(){
	$("#add_new_product").click(function(){
		window.location.href = "<?php echo base_url()."coupon/add_coupon" ; ?>" ;
	}) ;
}) ;
</script>
<?php
function show_message($message)
{
	if($message == 1) echo '<div class="message green"><span><b>Succes:</b>: Coupon record added successfully.</span></div>' ;
	elseif($message == 2) echo '<div class="message green"><span><b>Succes:</b>: Coupon record updated successfully.</span></div>' ;
	elseif($message == 3) echo '<div class="message green"><span><b>Succes:</b>: Coupon record removed successfully.</span></div>' ;
}
?>