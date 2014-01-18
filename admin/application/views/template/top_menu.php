<div id="menu">
	<ul>
    	<li <?php if($current_page == "dashboard") echo 'class="current"' ; ?>><a href="<?php echo base_url()."dashboard" ; ?>">Dashboard</a></li> 
		<li <?php if($current_page == "products") echo 'class="current"' ; ?>><a href="<?php echo base_url()."products" ; ?>">Products</a>
        	<ul> 
				<li <?php if($current_page == "") echo 'class="current"' ; ?>><a href="<?php echo base_url()."product_groups" ; ?>">Product Groups</a></li>
                <li <?php if($current_page == "") echo 'class="current"' ; ?>><a href="<?php echo base_url()."product_categories" ; ?>">Product Categories</a></li>
                <li <?php if($current_page == "") echo 'class="current"' ; ?>><a href="<?php echo base_url()."food_sensitivities" ; ?>">Food Sensitivities</a></li>
                <li <?php if($current_page == "reviews") echo 'class="current"' ; ?>><a href="<?php echo base_url()."reviews" ; ?>">Reviews</a></li>
			</ul>
        </li>
        <li <?php if($current_page == "stores") echo 'class="current"' ; ?>><a href="<?php echo base_url()."stores" ; ?>">Stores</a></li> 
		<li <?php if($current_page == "settings") echo 'class="current"' ; ?>><a href="<?php echo base_url()."settings" ; ?>">Settings</a></li>
		<?php if($this->session->userdata('role') == 'Admin') { ?>
        	<li <?php if($current_page == "users") echo 'class="current"' ; ?>><a href="<?php echo base_url()."users/index" ; ?>">Users</a></li>
        <?php } ?>
        <li><a href="#">Other Pages</a>
			<ul> 
				<li <?php if($current_page == "ui_elements") echo 'class="current"' ; ?>><a href="<?php echo base_url()."dashboard/uielements" ; ?>">UI Elements</a></li>
				<li <?php if($current_page == "typography") echo 'class="current"' ; ?>><a href="<?php echo base_url()."dashboard/typography" ; ?>">Typography</a></li>
				<li <?php if($current_page == "gallery") echo 'class="current"' ; ?>><a href="<?php echo base_url()."dashboard/gallery" ; ?>">Gallery</a></li>
				<li <?php if($current_page == "boxgrid") echo 'class="current"' ; ?>><a href="<?php echo base_url()."dashboard/boxgrid" ; ?>">Boxgrid</a></li>
				<li <?php if($current_page == "icons") echo 'class="current"' ; ?>><a href="<?php echo base_url()."dashboard/icons" ; ?>">Icons</a></li>
                <li <?php if($current_page == "forms") echo 'class="current"' ; ?>><a href="<?php echo base_url()."dashboard/forms" ; ?>">Forms</a></li> 
				<li <?php if($current_page == "charts") echo 'class="current"' ; ?>><a href="<?php echo base_url()."dashboard/charts" ; ?>">Charts</a></li>
			</ul> 
		</li>
	</ul>
</div>
</div>
		
