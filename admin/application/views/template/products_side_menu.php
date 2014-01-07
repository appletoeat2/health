<div id="left">
	<div class="box search">
		<div class="content">
			<form method="post" action="<?php echo base_url()."products/search_products/" ?>">
				<input type="text" id="search_string" name="search_string" value="" placeholder="Search" autocomplete="off" />
				<button type="submit"></button>
			</form>
		</div>
	</div>
    
    <div class="box submenu">
		<div class="content">
			<?php if($side_product_groups) { ?>
            <ul>
            	<?php
					$i = 1 ;
					foreach($side_product_groups as $rec):
						if($rec->id == $group_id)
							echo '<li class="current">' ;
						else
							echo '<li>' ;
						echo '<a href="'.base_url()."products/index/".$rec->id.'">'.$rec->group_name.'</a>' ;
						echo '</li>' ;
						$i++ ;
					endforeach ;
				?>
            </ul>
		<?php } ?>
		</div>
	</div>
</div>