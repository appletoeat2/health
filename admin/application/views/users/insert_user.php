<div id="right">
<form id="user_form" name="user_form" action="<?php echo base_url()."users/insert_user" ; ?>" method="post">
    <div class="section">
		<div class="box">
			<div class="title">User Details<span class="hide"></span></div>
			<div class="content">
            <?php if($errors) { ?>
                <div class="message inner red">
                    <br />
                    <br />
                    	<ul><?php echo $errors ; ?></ul>
                    <br />
                </div>
           	<?php } ?>
            	<div class="row"> 
					<label>Name</label>
					<div class="right"><input type="text" id="name" name="name" value="<?php echo set_value("name") ; ?>" /></div>
				</div>
                <div class="row">
					<label>Email Address</label>
					<div class="right"><input type="text" id="email_address" name="email_address" value="<?php echo set_value("email_address") ; ?>" /></div>
				</div>
                <div class="row">
					<label>Username</label>
					<div class="right"><input type="text" id="username" name="username" value="<?php echo set_value("username") ; ?>" /></div>
				</div>
                <div class="row">
					<label>Password</label>
					<div class="right"><input type="password" id="password" name="password" value="<?php echo set_value("password") ; ?>" /></div>
				</div>
                <div class="row">
					<label>Confirm Password</label>
					<div class="right"><input type="password" id="confirm_password" name="confirm_password" value="<?php echo set_value("confirm_password") ; ?>" /></div>
				</div>
                <div class="row">
					<label>Role</label>
					<div class="right">
						<input type="radio" name="role" id="role-1" value="Admin" <?php echo set_radio('role', 'Admin', TRUE); ?> /> <label for="role-1">Admin</label>
                        <input type="radio" name="role" id="role-2" value="User" <?php echo set_radio('role', 'User'); ?> /> <label for="role-2">User</label>
					</div>
				</div>
                <div class="row">
					<label>Status</label>
					<div class="right">
						<input type="radio" name="status" id="status-1" value="Active" <?php echo set_radio('status', 'Active', TRUE); ?> /> 
						<label for="status-1">Active</label>  
                        <input type="radio" name="status" value="Disable" id="status-2" <?php echo set_radio('status', 'Disable') ; ?> /> 
						<label for="status-2">Disable</label>
					</div>
				</div>
                <div class="row">
					<label></label>
					<div class="right">
						<button type="submit"><span>Sumbit</span></button>
                        <button type="button" id="cancel"><span>Cancel</span></button>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>    
</div>
<script type="text/javascript">
$(function(){
	$("#cancel").live('click',function(){
		window.location.href = "<?php echo base_url()."users/index" ; ?>" ;
	}) ;
}) ;
</script>