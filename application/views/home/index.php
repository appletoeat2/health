<section class="container home-content">
	<?php $this->load->view("template/slider") ; ?>
    <section class="spotlights">
        <div class="one_fifth">
        	<a href="<?php echo base_url()."products/group_product/1" ; ?>"><img src="<?php echo base_url() ; ?>images/global-images/sp_heart.jpg" /></a>
            <?php $group_rec = get_product_group(1) ; ?>
			<h6><?php echo $group_rec->group_title ; ?></h6>
            <p><?php echo $group_rec->short_description ; ?></p>
		</div>
	    <div class="one_fifth">
			<a href="<?php echo base_url()."products/group_product/6"  ; ?>"><img src="<?php echo base_url() ; ?>images/global-images/sp_brain.jpg" /></a>
			<?php $group_rec = get_product_group(6) ; ?>
			<h6><?php echo $group_rec->group_title ; ?></h6>
            <p><?php echo $group_rec->short_description ; ?></p>
		</div>
  		<div class="one_fifth">
        	<a href="<?php echo base_url()."products/group_product/4"  ; ?>"><img src="<?php echo base_url() ; ?>images/global-images/sp_bone.jpg" /></a>
			<?php $group_rec = get_product_group(4) ; ?>
			<h6><?php echo $group_rec->group_title ; ?></h6>
            <p><?php echo $group_rec->short_description ; ?></p>
		</div>
		<div class="one_fifth">
  			<a href="<?php echo base_url()."products/group_product/2"  ; ?>"><img src="<?php echo base_url() ; ?>images/global-images/sp_digestive.jpg" /></a>
			<?php $group_rec = get_product_group(2) ; ?>
			<h6>Detox and Digestive Restoration</h6>
            <p>Includes support for: <a href="<?php echo base_url()."/products/group_product/3" ; ?>">probiotics</a>, <a href="<?php echo base_url()."/products/group_product/2" ; ?>">candida and general detox</a>.</p>
		</div>
        <div class="one_fifth column-last">
        	<a href="<?php echo base_url()."products/group_product/5"  ; ?>"><img src="<?php echo base_url() ; ?>images/global-images/sp_general.jpg" /></a>
			<?php $group_rec = get_product_group(5) ; ?>
			<h6><?php echo $group_rec->group_title ; ?></h6>
            <p><?php echo $group_rec->short_description ; ?></p>
		</div>
	</section>
    
    <article class="eight columns">
    	<div class="pad-r10"> <a href="<?php echo base_url()."products" ; ?>"><img src="<?php echo base_url() ; ?>images/global-images/product-group.jpg" alt="" width="202" height="152" class="alignright"></a>
            <h6>Product Selector</h6>
    		<p>Innovite Health is a best-in-class nutritional supplement brand. Based in the latest research and technical innovations, all products are certified for proven quality, purity and label claims. See what Innovite Health product fits your life. <br><a href="<?php echo base_url()."products" ; ?>">Find products here</a>
</p>
    		<hr>
          <a href="<?php echo base_url()."/resources/coupons" ; ?>"><img src="<?php echo base_url() ; ?>/images/page_images/home_coupon.jpg"/></a>
<p>For great savings on great products, check out our <a href="<?php echo base_url()."/resources/coupons" ; ?>">coupon section.</a>
</p>
    		
		</div>
	</article>

	<article class="eight columns alpha omega">
		<div class="brdr-l1 pad-l40">
       	<a class="twitter-timeline" height="280" href="https://twitter.com/InnoviteCanada" data-widget-id="425092470272032768">Tweets by @twitterapi</a>
    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
        </div>
	</article>
    <hr class="vertical-space2">
</section>