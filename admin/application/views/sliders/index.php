<!--
slider_id
image
order
link
start_date
end_date
insertion_timestamp
updation_timestamp
status
-->
<div id="right">
	<div class="section">
    	<?php show_message($message) ; ?>
       	<div class="box">
            <div class="title">Sliders<span class="hide"></span></div>
            <div class="content">
            	<table cellspacing="0" cellpadding="0" border="0" class="all"> 
					<thead> 
						<tr>
                        	<th width="14%">Sort Order</th>
							<th width="25%">Title</th>
							<th width="12%">Start Date</th>
							<th width="12%">End Date</th>
							<th width="15%">Image</th>
							<th width="12%">Status</th>
							<th width="10%">Action</th>
						</tr>
					</thead>
				<?php if($sliders) { ?>	
                    <tbody>
                    <?php foreach($sliders as $rec): ?>
						<tr>
                        	<td><?php echo $rec->order ; ?></td>
							<td><?php echo stripslashes($rec->slider_title) ; ?></td>
							<td><?php echo date("m/d/y", strtotime($rec->start_date)) ; ?></td>
							<td><?php echo date("m/d/y", strtotime($rec->end_date)) ; ?></td>
							<td><?php echo '<a href="'.base_url()."sliders/".$rec->english_image.'" target="_blank">English</a>'.' '.
										   '<a href="'.base_url()."sliders/".$rec->french_image.'" target="_blank">French</a>' ; ?></td>
							<td><?php echo $rec->status ; ?></td>
							<td>
								<a href="<?php echo base_url()."slider/edit_slider/".$rec->slider_id ; ?>">Edit</a> - 
								<a href="<?php echo base_url()."slider/remove_slider/".$rec->slider_id ; ?>" onclick="return confirm('Are you sure to remove this record?');">Remove</a>
							</td>
						</tr>
                    <?php endforeach ; ?>
					</tbody>
				<?php } ?>
                </table>
			</div>
            
            <div class="content">
           		<div class="right">
                	<button id="add_new_product" type="button"><span>Click Here to Add Slider</span></button>
					<!-- <br /> <a href="<?php echo base_url() ; ?>slider/order_pages">Click here to Order Pages</a> -->
            	</div>
            </div>
            
		</div>
	</div>
</div>
<script type="text/javascript">
$(function(){
	$("#add_new_product").click(function(){
		window.location.href = "<?php echo base_url()."slider/add_slider" ; ?>" ;
	}) ;
}) ;
</script>
<?php
function show_message($message)
{
	if($message == 1) echo '<div class="message green"><span><b>Succes:</b>: Slider record added successfully.</span></div>' ;
	elseif($message == 2) echo '<div class="message green"><span><b>Succes:</b>: Slider record updated successfully.</span></div>' ;
	elseif($message == 3) echo '<div class="message green"><span><b>Succes:</b>: Slider record removed successfully.</span></div>' ;
}
?>