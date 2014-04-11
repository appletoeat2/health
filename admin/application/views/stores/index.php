<div id="right">
	<div class="section">
    	<?php show_message($message) ; ?>
       	<div class="box">
            <div class="title">Stores<span class="hide"></span></div>
            <div class="content">
            	<table cellspacing="0" cellpadding="0" border="0" class="all"> 
					<thead> 
						<tr>
							<th width="25%">Name</th>
							<th width="25%">Address</th>
							<th width="12%">City</th>
                            <th width="10%">Province</th>
							<th width="18%">Telephone No.</th>
							<th width="10%">Action</th>
						</tr>
					</thead>
				<?php if($stores) { ?>	
                    <tbody>
                    <?php foreach($stores as $rec): ?>
						<tr>
							<td><?php echo stripslashes($rec->retailer_name) ; ?></td>
							<td><?php echo stripslashes($rec->address1) ; ?></td>
							<td><?php echo stripslashes($rec->city) ; ?></td>
							<td><?php echo stripslashes($rec->province) ; ?></td>
							<td><?php echo format_number(stripslashes($rec->telephone)) ; ?></td>
							<td><a href="<?php echo base_url()."stores/edit_stores/".$rec->id ; ?>">Edit</a> - <a href="<?php echo base_url()."stores/remove_stores/".$rec->id ; ?>" onclick="return confirm('Are you sure to remove this record?');">Remove</a></td>
						</tr>
                    <?php endforeach ; ?>
					</tbody>
				<?php } ?>
                </table>
			</div>
            
            <div class="content">
           		<div class="right">
                	<button id="add_new_product" type="button"><span>Click Here to Add Store</span></button> &nbsp; 
					<button id="import_records" type="button"><span>Import Records</span></button> &nbsp;
					<button id="export_records" type="button"><span>Export Records</span></button>
				</div>
            </div>
            
		</div>
	</div>
</div>
<script type="text/javascript">
$(function(){
	$("#add_new_product").click(function(){
		window.location.href = "<?php echo base_url()."stores/add_stores" ; ?>" ;
	}) ;
	
	$("#import_records").click(function(){
		window.location.href = "<?php echo base_url()."stores/import_stores/stores/add" ; ?>" ;
	}) ;
	
	$("#export_records").click(function(){
		window.location.href = "<?php echo base_url()."PHPExcelClasses/export_excel.php" ; ?>" ;
	}) ;
}) ;
</script>
<?php
function show_message($message)
{
	if($message == 1)
		echo '<div class="message green"><span><b>Succes:</b>: Store record added successfully.</span></div>' ;
	elseif($message == 2)
		echo '<div class="message green"><span><b>Succes:</b>: Store record updated successfully.</span></div>' ;
	elseif($message == 3)
		echo '<div class="message green"><span><b>Succes:</b>: Store record removed successfully.</span></div>' ;
}
?>