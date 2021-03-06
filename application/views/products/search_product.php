<section id="headline" class="community">
	<div class="container">
    	<h3>Search Result for <?php echo '"'.$search_string.'"' ; ?></h3>
	</div>
</section>

<section class="container page-content">
	<hr class="vertical-space2">
    	<section class="eleven columns">
		<?php // $bodytag = str_replace( chr(13), "<br>", $groups->landing_page_description);  echo $bodytag ; ?>
        	<h2>Product Results</h2>
        	<?php if($product_recs) { ?>
			<?php foreach($product_recs as $rec): ?>
          		<div class="product_item">
                	<div class="img-item center" style="text-align:center">
                		<a href="<?php echo base_url()."products/product_details/".$rec->group_id."/".$rec->product_id ; ?>">
                        	<img src="<?php echo base_url()."admin/images/prod_images/small/".strtolower($rec->product_code).".jpg" ; ?>" border="1" />
                    	</a>
             		</div>
            	
                	<div class="product_title" style="text-align:center">
              			<p><a href="<?php echo base_url()."products/product_details/".$rec->group_id."/".$rec->product_id ; ?>"><?php echo $rec->product_name ; ?></a></p>
            		</div>
          		</div>
          	<?php endforeach ; }  else { echo '<h6>No Results found for "'.$search_string.'".</h6>' ;}?>
      		<!-- end-portfolio -->
      		
            <hr class="vertical-space2">
      		<script src="<?php echo base_url() ; ?>javascript/isotope/isotope.js"></script> 
      		<script src="<?php echo base_url() ; ?>javascript/isotope/isotope-custom.js"></script> 
      		<script src="<?php echo base_url() ; ?>javascript/jquery.prettyPhoto.js" type="text/javascript" charset="utf-8"></script> 
    	</section>
  		<?php $this->load->view("template/product_right_navigation") ; ?>
    	<hr class="vertical-space2">
  </section><!-- end- -->