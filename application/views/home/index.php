<section class="container home-content">
	<?php $this->load->view("template/slider") ; ?>
	
    <section class="">
        <div class="one_fifth">
        	<a href="<?php echo base_url()."products/group_product/1" ; ?>"><img src="<?php echo base_url() ; ?>images/global-images/sp_heart.jpg" /></a>
            <?php $group_rec = get_product_group(1) ; ?>
			<h6><?php echo $group_rec->group_name ; ?></h6>
            <p><?php echo $group_rec->short_description ; ?></p>
		</div>
	    <div class="one_fifth">
			<a href="<?php echo base_url()."products/group_product/6"  ; ?>"><img src="<?php echo base_url() ; ?>images/global-images/sp_brain.jpg" /></a>
			<?php $group_rec = get_product_group(6) ; ?>
			<h6><?php echo $group_rec->group_name ; ?></h6>
            <p><?php echo $group_rec->short_description ; ?></p>
		</div>
  		<div class="one_fifth">
        	<a href="<?php echo base_url()."products/group_product/4"  ; ?>"><img src="<?php echo base_url() ; ?>images/global-images/sp_bone.jpg" /></a>
			<?php $group_rec = get_product_group(4) ; ?>
			<h6><?php echo $group_rec->group_name ; ?></h6>
            <p><?php echo $group_rec->short_description ; ?></p>
		</div>
		<div class="one_fifth">
  			<a href="<?php echo base_url()."products/group_product/2"  ; ?>"><img src="<?php echo base_url() ; ?>images/global-images/sp_digestive.jpg" /></a>
			<?php $group_rec = get_product_group(2) ; ?>
			<h6><?php echo $group_rec->group_name ; ?></h6>
            <p><?php echo $group_rec->short_description ; ?></p>
		</div>
        <div class="one_fifth column-last">
        	<a href="<?php echo base_url()."products/group_product/5"  ; ?>"><img src="<?php echo base_url() ; ?>images/global-images/sp_general.jpg" /></a>
			<?php $group_rec = get_product_group(5) ; ?>
			<h6><?php echo $group_rec->group_name ; ?></h6>
            <p><?php echo $group_rec->short_description ; ?></p>
		</div>
	</section>
    
    <article class="eight columns">
    	<div class="pad-r10"> <a href="<?php echo base_url()."products" ; ?>"><img src="<?php echo base_url() ; ?>images/global-images/product-group.jpg" alt="" width="202" height="152" class="alignright"></a>
            <h6>Product Selector</h6>
    		<p>Innovite Health is a best-in-class nutritional supplement brand. Based in the latest research and technical innovations, all products are certified for proven quality, purity and label claims.  Better quality equals better results. See what Innovite Health product fits your life
</p>
    		<a href="<?php echo base_url()."products" ; ?>" class="magicmore">Ignite your life. Find products here.</a>
		</div>
	</article>

	<article class="eight columns alpha omega">
		<div class="brdr-l1 pad-l40">
       	<img src="/health/images/page_images/twitter.jpg" alt=""></div>
	</article>
    <hr class="vertical-space2">
</section>