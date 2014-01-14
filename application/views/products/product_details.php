<section id="headline" style="background-image: url(<?php echo base_url()."admin/images/banner_images/".$groups->banner_file ; ?>); background-color: #01619e; background-repeat: no-repeat; background-position: center">
	<div class="container">
    	<h3><a href="#"><?php echo $groups->group_name ; ?></a></h3>
	</div>
</section>

<section class="container page-content">
	<hr class="vertical-space2">
    <section class="sixteen columns">
		<div class="shop-wrap">
        	<figure class="shop-item two_third">
          		<h2><?php echo $product_detail->product_name ; ?></h2>
          		<h4><?php echo $product_detail->health_claim ; ?></h4>
          		<p><?php echo $product_detail->npn ; ?></p>
          		<p><?php $bodytag = str_replace(chr(13), "<br>", $product_detail->short_description) ; echo $bodytag ; ?></p>
  				
                <span class='st_facebook_large' displayText='Facebook'></span>
                <span class='st_twitter_large' displayText='Tweet'></span>
                <span class='st_googleplus_large' displayText='Google +'></span>
                <span class='st_pinterest_large' displayText='Pinterest'></span>
                <span class='st_email_large' displayText='Email'></span>
          		<hr class="vertical-space2">
          		<ul class="nav nav-tabs" id="myTab">
            		<?php
                	if($product_detail->description != "") 
					{ 
						echo "<li class='active'><a data-toggle='tab' href='#Description'>Description</a></li>"; 
						echo "<li><a data-toggle='tab' href='#Formula'>Formula</a></li>"; 
					} 
					else 
					{ 
						echo "<li class='active'><a data-toggle='tab' href='#Formula'>Formula</a></li>"; 
					} 
         			?>
            		<li><a data-toggle="tab" href="#Dosage">Dosage</a></li>
            		<li><a data-toggle="tab" href="#Sizes">Available Sizes</a></li>
               		<li class="last"><a data-toggle="tab" href="#Reviews">Reviews</a></li>
          		</ul>
          		<div class="tab-content" id="myTabContent">
            	<?php 
				if($product_detail->description != "") 
				{ 
					$bodydescript = str_replace(chr(13), "<br>", $product_detail->description);
					echo "<div id='Description' class='tab-pane active'><p>", $bodydescript,"</p></div>"; 
					echo "<div id='Formula' class='tab-pane'>", $product_detail->formula, "</div>"; 
				} 
				else 
				{ 
					echo "<div id='Formula' class='tab-pane active'>", $product_detail->formula, "</div>"; 
				} 
         		?>
            	<div id="Sizes" class="tab-pane">
                	<h2>Available Sizes</h2>
              		<table class="table table-bordered table-striped">
                		<thead>
                  			<tr>
                    			<th>Size</th>
                    			<th>Sku Code</th>
                    			<th>UPC Code</th>
                  			</tr>
                		</thead>
                		<tbody>
                  		<?php if($skus_detail) { foreach($skus_detail as $rec): ?>
                    		<tr>
                      			<td><?php echo $rec->size ; ?></td>
                      			<td><?php echo $rec->sku_code ; ?></td>
                      			<td>35627345</td>
                    		</tr>
                    	<?php endforeach ; } ?>
                		</tbody>
              	</table>
            </div>
            
            <div id="Dosage" class="tab-pane">
            	
                <?php echo $product_detail->dosage ;?>
			
            </div>
		
        	<div id="Reviews" class="tab-pane">
            	<hr class="vertical-space1">
              	<h1>Reviews</h1>
              	<p>There are no reviews yet, would you like to submit yours?</p>
              	<h5><strong>Be the first to review this Product</strong></h5>
              	<label>Name</label> <input name="" type="text">
              	<label>Email</label> <input name="" type="text">
              	<label>Your Review</label><textarea name="" cols="" rows=""></textarea>
              	<br>
              	<input name="" type="submit" class="small" value="Submit Review">
			</div>
		</div>
	</figure><!-- end-product-item-->

	<div class="one_third column-last"> 
    	<div class="portfolio">
      		<script src="<?php echo base_url() ; ?>javascript/jquery.prettyPhoto.js" type="text/javascript" charset="utf-8"></script>
        	<a href="<?php echo base_url()."admin/images/prod_images/large/".strtolower($product_detail->product_code).".jpg" ; ?>" rel="help" title="" class="prettyPhoto zoomlink1">
            	<img src="<?php echo base_url()."admin/images/prod_images/medium/".strtolower($product_detail->product_code).".jpg" ; ?>" border="0"/>
            </a>
          	<section id="side-nav" class="five columns">
            	<ul>
              		<li><a href="<?php echo base_url()."admin/images/prod_images/large/".strtolower($product_detail->product_code).".jpg" ; ?>" rel="help" title="" class="prettyPhoto zoomlink1">Click Here for a Larger View</a></li>
              		<!--
<?php if($brochure) ?>
                	<li><a href="<?php echo base_url()."products/product_brochures/".$brochure->brochure_file_name ; ?>" target="_blank">Download The Brochure</a></li>
-->
                	
            	</ul>
			</section>
		</div>
        <hr class="vertical-space1">
	</div>
</section><!-- end-main-content --> 

<br class="clear"><!-- end-sidebar-->

<div class="sixteen columns"><!-- Our-Clients- start -->
	<h4 class="subtitle">Related Products</h4>
    <ul id="our-clients" class="our-clients tooltips top">
		<?php if($related_products) foreach($related_products as $rec): ?>
        	<li><a href="<?php echo base_url()."products/product_details/".$rec->group_id."/".$rec->id ; ?>" rel="help" title="<?php echo $rec->health_claim ; ?>"><img src="<?php echo base_url()."admin/images/prod_images/small/".$rec->product_code.".jpg" ; ?>"></a></li>
		<?php endforeach ; ?>
	</ul>
</div><!-- Our-Clients-end --> 
</section>