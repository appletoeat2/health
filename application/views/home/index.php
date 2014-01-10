<section class="container home-content">
	<?php $this->load->view("template/slider") ; ?>
	
    <section class="row column">
        <div class="one_fifth">
        	<a href="<?php echo base_url() ; ?>"><img src="<?php echo base_url() ; ?>images/global-images/sp_heart.jpg" /></a>
            <?php $group_rec = get_product_group(1) ; ?>
			<h6><?php echo $group_rec->group_name ; ?></h6>
            <p><?php echo $group_rec->short_description ; ?></p>
		</div>
	    <div class="one_fifth">
			<a href="<?php echo base_url() ; ?>"><img src="<?php echo base_url() ; ?>images/global-images/sp_brain.jpg" /></a>
			<?php $group_rec = get_product_group(6) ; ?>
			<h6><?php echo $group_rec->group_name ; ?></h6>
            <p><?php echo $group_rec->short_description ; ?></p>
		</div>
  		<div class="one_fifth">
        	<a href="<?php echo base_url() ; ?>"><img src="<?php echo base_url() ; ?>images/global-images/sp_bone.jpg" /></a>
			<?php $group_rec = get_product_group(4) ; ?>
			<h6><?php echo $group_rec->group_name ; ?></h6>
            <p><?php echo $group_rec->short_description ; ?></p>
		</div>
		<div class="one_fifth">
  			<a href="<?php echo base_url() ; ?>"><img src="<?php echo base_url() ; ?>images/global-images/sp_digestive.jpg" /></a>
			<?php $group_rec = get_product_group(2) ; ?>
			<h6><?php echo $group_rec->group_name ; ?></h6>
            <p><?php echo $group_rec->short_description ; ?></p>
		</div>
        <div class="one_fifth column-last">
        	<a href="<?php echo base_url() ; ?>"><img src="<?php echo base_url() ; ?>images/global-images/sp_general.jpg" /></a>
			<?php $group_rec = get_product_group(5) ; ?>
			<h6><?php echo $group_rec->group_name ; ?></h6>
            <p><?php echo $group_rec->short_description ; ?></p>
		</div>
	</section>
    
    <article class="eight columns">
    	<div class="pad-r10">
    		<img src="<?php echo base_url() ; ?>images/global-images/product-group.jpg" alt="" width="202" height="152" class="alignright">
            <h6>Product Selector</h6>
    		<p>Aliquam enim enim, pharetra in sodales at, interdum sit amet dui. Nullam vulputate euismod urna non pharetra. Phasellus blandit mattis ipsum, ac laoreet lorem lacinia et. Cras et ligula libero. </p>
    		<a href="<?php echo base_url() ; ?>" class="magicmore">Haretra in sodales atsen interdum</a>
		</div>
	</article>

	<article class="eight columns alpha omega">
		<div class="brdr-l1 pad-l40">
        	<img src="<?php echo base_url() ; ?>images/global-images/logo.jpg" class="alignright" alt="">
            <h6>Why Innovite Health</h6>
			<p>Aliquam enim enim, pharetra in sodales at, interdum sit amet dui. Nullam vulputate euismod urna non pharetra. Phasellus blandit mattis ipsum, ac laoreet lorem lacinia et. Cras et ligula.</p>
            <a href="<?php echo base_url() ; ?>" class="magicmore">Haretra in sodales atsen interdum</a>
		</div>
	</article>
    <hr class="vertical-space2">
</section>