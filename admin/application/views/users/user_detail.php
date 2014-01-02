<div id="right">
	<div class="section">
		<div class="box">
			<div class="title">User Details<span class="hide"></span></div>
			<div class="content">
            	<div class="row"> 
					<label>Name</label>
					<div class="right"><input type="text" id="name" name="name" disabled="disabled" value="<?php echo set_value('name', $user_rec->name) ; ?>" /></div>
				</div>
                <div class="row">
					<label>Email Address</label>
					<div class="right"><input type="text" id="email_address" name="email_address" disabled="disabled" value="<?php echo set_value('email_address', $user_rec->email_address) ; ?>" /></div>
				</div>
                <div class="row">
					<label>Username</label>
					<div class="right"><input type="text" id="username" name="username" disabled="disabled" value="<?php echo set_value('username', $user_rec->username) ; ?>" /></div>
				</div>
                <div class="row">
					<label>Role</label>
					<div class="right">
						<input type="radio" name="role" id="role-1" value="Admin" disabled="disabled" <?php if($user_rec->role == "Admin") echo set_radio('role', 'Admin', TRUE) ; else  echo set_radio('role', 'Admin') ; ?> /> <label for="role-1">Admin</label>
                        <input type="radio" name="role" id="role-2" value="User" disabled="disabled" <?php if($user_rec->role == "User") echo set_radio('role', 'User', TRUE) ; else  echo set_radio('role', 'User') ; ?> /> <label for="role-2">User</label>
					</div>
				</div>
                <div class="row">
					<label>Status</label>
					<div class="right">
						<input type="radio" name="status" id="status-1" value="Active" disabled="disabled" <?php if($user_rec->status == "Active") echo set_radio('status', 'Active', TRUE) ; else  echo set_radio('status', 'Active') ; ?> /> 
						<label for="status-1">Active</label>  
                        <input type="radio" name="status" value="Disable" id="status-2" disabled="disabled" <?php if($user_rec->status == "Disable") echo set_radio('status', 'Disable', TRUE) ; else  echo set_radio('status', 'Disable') ; ?> /> 
						<label for="status-2">Disable</label>
					</div>
				</div>
                <div class="row">
					<label></label>
					<div class="right">
                        <button type="button" id="cancel"><span>Back</span></button>
					</div>
				</div>
			</div>
		</div>
	</div>   
</div>
<script type="text/javascript">
$(function(){
	$("#cancel").live('click',function(){
		window.location.href = "<?php echo base_url()."users/index" ; ?>" ;
	}) ;
}) ;
</script>