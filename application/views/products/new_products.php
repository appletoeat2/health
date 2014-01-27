<section id="headline" class="aboutus">
	<div class="container">
    	<h3>New Products</h3>
	</div>
</section>

<section class="container page-content">
	<hr class="vertical-space2">
    	<section class="eleven columns">
			<div id="msg_div" style="display:none;"><h6>No Products meet the filter criteria, deselect filter items to expand the scope</h6></div>
            <h2>Innovation to ignite your life</h2>
<p>For  over 30 years, Innovite Health has been a nationally recognized leader  in the development, manufacturing, and commercialization of innovative,  science-based natural health products which are distributed to natural  health retailers and in mass market across Canada. </p>
<p>Innovite  Health has been inspiring wellness and developing ways to nourish and  repair our bodies. We believe that when the body&rsquo;s core systems work in  synergy, optimal health can be achieved. That synergistic balance relies  on a strong nutritional foundation. With today&rsquo;s lifestyle, many  factors contribute to depleting the body&rsquo;s reserves of these critical  nutrients. Our goal at Innovite Health is to nourish and heal the body  from the inside out. By restoring nutrients and repairing damage, you  can reclaim your health.</p>
<p>Our  nutritional foundation is built from the latest research and clinical  evidence, and is safe, natural and effective. Our range of formulas with  clinically proven ingredients allows you to choose the right product  for your body&rsquo;s needs, at every stage of life.  As an industry leader in  quality, with an extensive raw material and finished product testing  program that includes analysis for identity, potency, environmental  contaminants, oxidation and more by certified third party laboratories,  all our products are gluten and soy free. Our manufacturing partners are  NSF-GMP registered in the U.S., GMP certified in Canada and exceeds the  standards of the United States Pharmacopeia (USP) for supplement  manufacturing.</p>
<p>At Innovite Health, we think it&rsquo;s what&rsquo;s inside that counts and that is true for our products, our people and you.</p>
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
				<div class="img-item center" style="text-align:center"> <a href="<?php echo base_url()."products/product_details/".$rec->group_id."/".$rec->product_id ; ?>"><img src="<?php echo base_url()."admin/images/prod_images/small/".strtolower($rec->product_code).".jpg" ; ?>" alt=""></a>
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