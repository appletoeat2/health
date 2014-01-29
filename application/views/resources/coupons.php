<section id="headline" class="resources">
	<div class="container">
    	<h3><a href="index.php">Coupons</a></h3>
	</div>
</section>

<section class="container page-content">
	<hr class="vertical-space2">
    <section class="sixteen columns">
		<div class="shop-wrap">
        	<figure class="shop-item two_third">
          		<h2>Current Coupons</h2>
                <hr>
              <?php if($coupon_recs) { ?>
              	<?php foreach($coupon_recs as $rec): ?>
              		<?php if($rec->_DAYS_DIFFERENCE_ < 0) { ?>
                    	<div class="coupon">
                        	<h3><?php echo stripslashes($rec->coupon_message) ; ?></h3>
                        	<p><a href="<?php echo base_url()."admin/coupons/coupon_pdfs/coupon_pdf_en_".$rec->id.".pdf" ; ?>" target="_blank">Click on the  coupon below to download a printable pdf.</a></p>
                        	<a href="<?php echo base_url()."admin/coupons/coupon_pdfs/coupon_pdf_en_".$rec->id.".pdf" ; ?>" target="_blank">
                            	<img src="<?php echo base_url()."admin/coupons/coupon_images/coupon_image_fr_".$rec->id.".jpg" ; ?>" alt="">
                            </a>
                        	<hr>
                		</div>
                	<?php } ?>
				<?php endforeach ; ?>
			  <?php } else { ?>
              	<p>There are no coupons available at this time, please check back soon.</p>
              <?php } ?>
              
              <!--<div class="coupon">
<h3>SAVE $5.00 Off your next purchase of any Innovite Health Cardiovascular Health Product</h3>
       		  <p><a href="<?php // echo base_url() ?>admin/coupons/coupon_pdfs/cardio_coupon_en.pdf" target="_blank">Click on the  coupon below to download a printable pdf.</a></p>
          		<a href="<?php // echo base_url() ?>admin/coupons/coupon_pdfs/cardio_coupon_en.pdf" target="_blank"><img src="<?php // echo base_url() ?>admin/coupons/coupon_images/cardio_coupon_en.jpg" alt=""/></a>
  				<hr>
              </div>
              <div class="coupon">
<h3>SAVE $10.00 On next purchase of Innovite Health Yeast Buster® candida detox kit.</h3>
       		  <p><a href="<?php // echo base_url() ?>admin/coupons/coupon_pdfs/innovite_yeastbuster_coupon.pdf" target="_blank">Click on the  coupon below to download a printable pdf.</a></p>
          		<a href="<?php // echo base_url() ?>admin/coupons/coupon_pdfs/cardio_coupon_en.pdf" target="_blank"><img src="<?php // echo base_url() ?>admin/coupons/coupon_images/yeastbusters-coupon.jpg" alt=""/></a>
  				<hr>
              </div>
                <div class="coupon">
<h3>SAVE $3.00 On next purchase of Innovite Health Gut Repair.</h3>
       		  <p><a href="<?php // echo base_url() ?>admin/coupons/coupon_pdfs/innovite_gut_repair_coupon.pdf" target="_blank">Click on the  coupon below to download a printable pdf.</a></p>
          		<a href="<?php // echo base_url() ?>admin/coupons/coupon_pdfs/cardio_coupon_en.pdf" target="_blank"><img src="<?php // echo base_url() ?>admin/coupons/coupon_images/gutrepair-coupon.jpg" alt=""/></a>
  				<hr>
              </div>
              -->
			</figure>
		</div>
        <?php $this->load->view("resources/side_links") ; ?>
	</section><!-- end-main-content --> 

	<br class="clear"><!-- end-sidebar-->
</section>