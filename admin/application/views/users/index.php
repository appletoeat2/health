<div id="right">
	<div class="section">
    	<?php show_message($message) ; ?>
       	<div class="box">
            <div class="title">Products Detail<span class="hide"></span></div>
            <div class="content">
            	<table cellspacing="0" cellpadding="0" border="0" class="all"> 
					<thead> 
						<tr>
							<th width="25%">Name</th>
							<th width="25%">Email Address</th>
							<th width="20%">Role</th>
							<th width="15%">Status</th>
							<th width="15%">Action</th>
						</tr>
					</thead>
				<?php if($users) { ?>	
                    <tbody>
                    <?php foreach($users as $rec): ?>
						<tr>
							<td><a href="<?php echo base_url()."users/user_detail/".$rec->id ; ?>"><?php echo stripslashes($rec->name) ; ?></a></td>
							<td><?php echo stripslashes($rec->email_address) ; ?></td>
							<td><?php echo stripslashes($rec->role) ; ?></td>
							<td><?php echo stripslashes($rec->status) ; ?></td>
							<td><a href="<?php echo base_url()."users/edit_user/".$rec->id ; ?>">Edit</a> - <a href="<?php echo base_url()."users/remove_user/".$rec->id ; ?>" onclick="return confirm('Are you sure to remove this user record?');">Remove</a></td>
						</tr>
                    <?php endforeach ; ?>
					</tbody>
				<?php } ?>
                </table>
			</div>
            
            <div class="content">
           		<div class="right">
                	<button id="add_new_product" type="button"><span>Click Here to Add New User</span></button>
            	</div>
            </div>
            
		</div>
	</div>
</div>
<script type="text/javascript">
$(function(){
	$("#add_new_product").click(function(){
		window.location.href = "<?php echo base_url()."users/add_user" ; ?>" ;
	}) ;
}) ;
</script>
<?php
function show_message($message)
{
	if($message == 1)
		echo '<div class="message green"><span><b>Succes:</b>: Administrator record added successfully.</span></div>' ;
	elseif($message == 2)
		echo '<div class="message green"><span><b>Succes:</b>: Administrator record updated successfully.</span></div>' ;
	elseif($message == 3)
		echo '<div class="message green"><span><b>Succes:</b>: Administrator record removed successfully.</span></div>' ;
	elseif($message == 4)
		echo '<div class="message red"><span><b>Warning:</b>: You cannot delete your own record.</span></div>' ;
	elseif($message == 5)
		echo '<div class="message red"><span><b>Warning:</b>: Failed to send email.</span></div>' ;
}
?>