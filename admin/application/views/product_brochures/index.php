<div id="right">
	<div class="section">
    	<?php show_message($message) ; ?>
       	<div class="box">
            <div class="title">Product Brochures<span class="hide"></span></div>
            <div class="content">
            	<table cellspacing="0" cellpadding="0" border="0" class="all"> 
					<thead> 
						<tr>
                        	<th width="30%">Brochure Name (English)</th>
							<th width="30%">Brochure Name (French)</th>
							<th width="20%">Status</th>
							<th width="20%">Action</th>
						</tr>
					</thead>
				<?php if($brochures) { ?>	
                    <tbody>
                    <?php foreach($brochures as $rec): ?>
						<tr>
                        	<td><?php echo $rec->brochure_name ; ?></td>
                            <td><?php echo $rec->brochure_name_french ; ?></td>
							<td><?php echo $rec->status ; ?></td>
							<td><a href="<?php echo base_url()."product_brochure/edit_brochure/".$rec->id ; ?>">Edit</a> - <a href="<?php echo base_url()."product_brochure/remove_brochure/".$rec->id ; ?>" onclick="return confirm('Are you sure to remove this record?');">Remove</a></td>
						</tr>
                    <?php endforeach ; ?>
					</tbody>
				<?php } ?>
                </table>
			</div>
            
            <div class="content">
           		<div class="right">
                	<button id="add_new_brochure" type="button"><span>Click Here to Add Brochure</span></button>
            	</div>
            </div>
            
		</div>
	</div>
</div>
<script type="text/javascript">
$(function(){
	$("#add_new_brochure").click(function(){
		window.location.href = "<?php echo base_url()."product_brochure/add_brochure" ; ?>" ;
	}) ;
}) ;
</script>
<?php
function show_message($message)
{
	if($message == 1) echo '<div class="message green"><span><b>Succes:</b>: Product Brochure record added successfully.</span></div>' ;
	elseif($message == 2) echo '<div class="message green"><span><b>Succes:</b>: Product Brochure record updated successfully.</span></div>' ;
	elseif($message == 3) echo '<div class="message green"><span><b>Succes:</b>: Product Brochure record removed successfully.</span></div>' ;
}
?>