<div id="right">
	<div class="section">
    	<?php show_message($message) ; ?>
       	<div class="box">
            <div class="title">Sliders<span class="hide"></span></div>
            <div class="content">
            	<table cellspacing="0" cellpadding="0" border="0" class="all"> 
					<thead> 
						<tr>
                        	<th width="60%">Page Title</th>
							<th width="15%">Status</th>
							<th width="25%">Action</th>
						</tr>
					</thead>
				<?php if($content) { ?>	
                    <tbody>
                    <?php foreach($content as $rec): ?>
						<tr>
                        	<td><?php echo stripslashes($rec->title_english) ; ?></td>
							<td><?php echo stripslashes($rec->status) ; ?></td>
							<td>
								<a href="<?php echo base_url()."dynamic_content/edit_page/".$rec->id ; ?>">Edit</a> 
								<!--<a href="<?php // echo base_url()."dynamic_content/remove_page/".$rec->id ; ?>" onclick="return confirm('Are you sure to remove this record?');">Remove</a>-->
							</td>
						</tr>
                    <?php endforeach ; ?>
					</tbody>
				<?php } ?>
                </table>
			</div>           
		</div>
	</div>
</div>
<?php
function show_message($message)
{
	if($message == 1) echo '<div class="message green"><span><b>Succes:</b>: Slider record added successfully.</span></div>' ;
	elseif($message == 2) echo '<div class="message green"><span><b>Succes:</b>: Slider record updated successfully.</span></div>' ;
	elseif($message == 3) echo '<div class="message green"><span><b>Succes:</b>: Slider record removed successfully.</span></div>' ;
}
?>