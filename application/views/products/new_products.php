<section id="headline" style="background-image:url(<?php // echo base_url()."admin/images/banner_images/".$groups->banner_file ; ?>); background-color:#01619e; background-repeat:no-repeat; background-position:center;">
	<div class="container">
    	<h3>New Products</h3>
	</div>
</section>

<section class="container page-content">
	<hr class="vertical-space2">
    	<section class="eleven columns">
			<div id="msg_div" style="display:none;"><h6>No Products meet the filter criteria, deselect filter items to expand the scope</h6></div>
			<?php
				$group_id = 0 ;
				$loop = 1 ;
				if($products) {
					foreach($products as $rec):
						if($rec->group_id != $group_id) {
							
							$group_id = $rec->group_id ;
							if($loop == 1) {
								echo '<div id="group_'.$rec->group_id.'" class="group_div">' ;
								echo '<h2>'.$rec->group_name.'</h2>' ;
								//echo '<p>'.$rec->short_description.'</p>' ;
								echo '<hr class="vertical-space3">' ;
							} else {
								echo '<hr class="vertical-space3"></div>' ;
								echo '<div id="group_'.$rec->group_id.'" class="group_div">' ;
								echo '<h2>'.$rec->group_name.'</h2>' ;
								//echo '<p>'.$rec->short_description.'</p>' ;
								echo '<hr class="vertical-space3">' ;
							}
						}
			?>
    		<div id="product<?php echo $rec->product_id ; ?>" class="product_item" food_sensitivities="<?php echo $rec->food_sensitivities_id ; ?>" categories="<?php echo $rec->categories_id ; ?>" product_id="<?php echo $rec->product_id ; ?>" title="<?php echo $rec->health_claim ; ?>">
				<div class="img-item center" style="text-align:center">
                	<img src="<?php echo base_url()."admin/images/prod_images/small/".strtolower($rec->product_code).".jpg" ; ?>" alt="">
                </div>
    			<div class="product_title"><p style="text-align:center"><?php echo $rec->product_name ; ?></p></div>
			</div>
		<?php
			$loop++ ;
			endforeach ;
			echo '<hr class="vertical-space3"></div>' ;
		}
		?>
            <hr class="vertical-space2">
      		<script src="<?php echo base_url() ; ?>javascript/isotope/isotope.js"></script> 
      		<script src="<?php echo base_url() ; ?>javascript/isotope/isotope-custom.js"></script> 
      		<script src="<?php echo base_url() ; ?>javascript/jquery.prettyPhoto.js" type="text/javascript" charset="utf-8"></script> 
    	</section>
  		<?php $this->load->view("template/product_right_navigation") ; ?>
    	<hr class="vertical-space2">
  </section><!-- end- -->