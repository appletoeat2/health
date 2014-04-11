<div id="right">
	<div class="section">
    	<?php show_message($message) ; ?>
       	<div class="box">
            <div class="title">E-Stores<span class="hide"></span></div>
            <div class="content">
            	<table cellspacing="0" cellpadding="0" border="0" class="all"> 
					<thead> 
						<tr>
							<th width="35%">Store Name</th>
							<th width="35%">Website Url</th>
							<th width="15%">Status</th>
							<th width="15%">Action</th>
						</tr>
					</thead>
				<?php if($stores) { ?>	
                    <tbody>
                    <?php foreach($stores as $rec): ?>
						<tr>
							<td><?php echo stripslashes($rec->store_name_english) ; ?></td>
							<td><?php echo stripslashes($rec->website_url) ; ?></td>
							<td><?php echo stripslashes($rec->status) ; ?></td>
							<td><a href="<?php echo base_url()."stores/edit_estores/".$rec->estore_id ; ?>">Edit</a> - <a href="<?php echo base_url()."stores/remove_estores/".$rec->estore_id ; ?>" onclick="return confirm('Are you sure to remove this record?');">Remove</a></td>
						</tr>
                    <?php endforeach ; ?>
					</tbody>
				<?php } ?>
                </table>
			</div>
			
			<div class="content">
           		<div class="right">
                	<button id="import_records" type="button"><span>Import Records</span></button> &nbsp;
					<button id="export_records" type="button"><span>Export Records</span></button>
				</div>
            </div>

		</div>
	</div>
</div>

<script type="text/javascript">
$(function(){
	
	$("#import_records").click(function(){
		window.location.href = "<?php echo base_url()."stores/import_stores/estores/add" ; ?>" ;
	}) ;
	
	$("#export_records").click(function(){
		window.location.href = "<?php echo base_url()."PHPExcelClasses/export_excel_estores.php" ; ?>" ;
	}) ;
}) ;
</script>

	<form id="estore_form" name="estore_form" action="<?php echo base_url()."stores/insert_estore" ; ?>" method="post">
		<div class="section">
			<div id="right">
				<div class="section">
					<div class="box">
						<div class="title">Add E-Store<span class="hide"></span></div>
						<div class="content">
							<div class="row"> 
								<label>Store Name (English)</label>
								<div class="right"><input type="text" id="store_name_english" name="store_name_english" value="" /></div>
							</div>
							<div class="row">
								<label>Store Name (French)</label>
								<div class="right"><input type="text" id="store_name_french" name="store_name_french" value="" /></div>
							</div>
							<div class="row">
								<label>Website URL</label>
								<div class="right"><input type="text" id="website_url" name="website_url" value="" /></div>
							</div>
							<div class="row">
								<label>Status</label>
								<div class="right">
									<input type="radio" id="status-1" name="status" value="Active" checked="checked" /> <label for="status-1">Active</label>
									<input type="radio" id="status-2" name="status" value="Disable" /> <label for="status-2">Disable</label>
								</div>
							</div>
							<div class="row">
								<label></label>
								<div class="right"><button type="submit" id="add_store"><span>Add Store</span></button></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>
	

<?php
function show_message($message)
{
	if($message == 1)
		echo '<div class="message green"><span><b>Succes:</b>: E-Store record added successfully.</span></div>' ;
	elseif($message == 2)
		echo '<div class="message green"><span><b>Succes:</b>: E-Store record updated successfully.</span></div>' ;
	elseif($message == 3)
		echo '<div class="message green"><span><b>Succes:</b>: E-Store record removed successfully.</span></div>' ;
}
?>