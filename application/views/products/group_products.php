
<section id="headline" style="background-image:url(<?php echo base_url()."admin/images/banner_images/".$groups->banner_file ; ?>); background-color:#01619e; background-repeat:no-repeat; background-position:center;">
	<div class="container">
    	<h3><a href="#"><?php echo $groups->group_name ; ?></a></h3>
	</div>
</section>

<section class="container page-content">
	<hr class="vertical-space2">
    	<section class="eleven columns">
		<?php $bodytag = str_replace( chr(13), "<br>", $groups->landing_page_description);  echo $bodytag ; ?>
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
              			<p><a href="<?php echo base_url()."products/product_details/".$groups->id."/".$rec->id ; ?>"><?php echo $rec->product_name ; ?></a></p>
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