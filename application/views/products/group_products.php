<section id="headline" class="bone">
	<div class="container">
    	<h3><a href="index.php">Muscular Skeletal Therapies</a></h3>
	</div>
</section>

<section class="container page-content">
	<hr class="vertical-space2">
    	<section class="eleven columns">
<<<<<<< HEAD
      			<?php
                    $bodytag = str_replace( chr(13), "<br>", $groups->landing_page_description); 
=======
      		<h3>Stay Active with Healthy Bones & Joints</h3>
      		<p>
				<?php
                    $bodytag = str_replace( chr(13), "<br>", $groups->short_description); 
>>>>>>> 20f07182e1132e086e51ecf80e5d22d683e27ca2
                    echo $bodytag
                ?>
            <nav class="primary clearfix">
				<ul>
          			<li><a href="<?php echo base_url() ; ?>" class="selected" data-filter="*">All Products</a></li>
          			<li><a href="<?php echo base_url() ; ?>" class="" data-filter=".calmag">Cal Mag Complexes</a></li>
          			<li><a href="<?php echo base_url() ; ?>" class="" data-filter=".jointhealth">Bone & Joint</a></li>
          			<li><a href="<?php echo base_url() ; ?>" class="" data-filter=".vitamink2">With Vitamin K2</a></li>
        		</ul>
      		</nav>
			
            <div class="portfolio">
        	<?php if($products) { ?>
			<?php foreach($products as $rec): ?>
          		<figure class="portfolio-item three columns entry <?php echo $rec->filter ; ?> -item">
                	<div class="img-item centre" style="text-align: center">
                		<a href="<?php echo base_url()."products/product_details/".$groups->id."/".$rec->id ; ?>">
                        	<img src="<?php echo base_url()."admin/images/prod_images/small/".strtolower($rec->product_code).".jpg" ; ?>" border="1" />
                    	</a>
             		</div>
            	
                	<div style="text-align: center">
              			<p><a href="product-detail.php?prod_id=<?php echo $rec->id ; ?>&amp;cat_id=<?php echo $groups->id ; ?>"><?php echo $rec->product_name ; ?></a></p>
            		</div>
          		</figure>
          	<?php endforeach ; } ?>
      		</div><!-- end-portfolio -->
      		
            <hr class="vertical-space2">
      		<script src="<?php echo base_url() ; ?>javascript/isotope/isotope.js"></script> 
      		<script src="<?php echo base_url() ; ?>javascript/isotope/isotope-custom.js"></script> 
      		<script src="<?php echo base_url() ; ?>javascript/jquery.prettyPhoto.js" type="text/javascript" charset="utf-8"></script> 
    	</section>
  		<?php $this->load->view("template/product_right_navigation") ; ?>
    	<hr class="vertical-space2">
  </section><!-- end- -->