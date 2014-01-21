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
            <div class="productinfo">
          		<h2><?php echo $product_detail->product_name ; ?></h2>
          		<h4><?php echo $product_detail->health_claim ; ?></h4>
          		<p>NPN# <?php echo $product_detail->npn ; ?></p>
          		<p><?php $bodytag = str_replace(chr(13), "<br>", $product_detail->short_description) ; echo $bodytag ; ?></p>
  				<input type="hidden" id="product_id" name="product_id" value="<?php echo $product_detail->id ; ?>" />
                <span class='st_facebook_large' displayText='Facebook'></span>
                <span class='st_twitter_large' displayText='Tweet'></span>
                <span class='st_googleplus_large' displayText='Google +'></span>
                <span class='st_pinterest_large' displayText='Pinterest'></span>
                <span class='st_email_large' displayText='Email'></span>
                </div>
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
					echo "<div id='Description' class='tab-pane active'>", $bodydescript,"</div>"; 
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
                      			<td><?php echo $rec->upc ; ?></td>
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
                <?php if($product_reviews) { ?>
                	<?php foreach ($product_reviews as $rec): ?>
                    	<div style=""><?php echo $rec->reviewer_comment ; ?></div>
                        <div><?php echo $rec->stars." stars" ; ?></div>
                        <div><?php echo $rec->reviewer_name ; ?></div>
                        <br />
					<?php endforeach ; ?>
                    <br />
				<?php } else { ?>
                	<p>There are no reviews yet, would you like to submit yours?</p>
              	<?php } ?>
              	<h5><strong>Be the first to review this Product</strong></h5>
              	<label>Name</label> <input type="text" id="reviewer_name" name="reviewer_name" value="">
              	<label>Email</label> <input type="text" id="reviewer_email" name="reviewer_email" value="">
                <label>Stars</label> <select id="reviewer_ranking" name="reviewer_ranking"><option value="5">5</option><option value="4">4</option><option value="3">3</option><option value="2">2</option><option value="1">1</option></select>
              	<label>Your Review</label> <textarea id="reviewer_comment" name="reviewer_comment" cols="" rows=""></textarea>
              	<br>
              	<input type="submit" id="submit_comment" name="" class="small" value="Submit Review">
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

<script type="text/javascript">
$("#submit_comment").click(function(){
	var name = $("#reviewer_name").val() ;
	var email = $("#reviewer_email").val() ;
	var comment = $("#reviewer_comment").val() ;
	var stars = $("#reviewer_ranking option:selected").val() ;
	var product_id = $("#product_id").val() ;
	var flag = false ;
	
	if(name == "") { alert("Name is required.") ; flag = true ;}
	if(email == "") { alert("Email is required.") ; flag = true ;}
	if(comment == "") { alert("Comment is required.") ; flag = true ;}
	
	if(flag) return true ;
	else
	{
		var base_url = $("#base_url").val() ;
		var data1 = "product_id="+product_id+"&name="+name+"&email="+email+"&comment="+comment+"&stars="+stars ;
		$.ajax({
			type: "POST", 
			url:  base_url+"products/insert_comment", 
			data: data1,
			success: function(response)
			{
				if(response == "success")
				{
					alert("Thanks!!! Your review submitted successfully.") ;
					$("#reviewer_name").val("") ;
					$("#reviewer_email").val("") ;
					$("#reviewer_comment").val("") ;
					$("#reviewer_ranking").val("5") ;
				}
				else alert("Failed to submit review.") ;
			}
		}) ;	
	}
}) ;
</script>