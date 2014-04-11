<section id="headline" class="aboutus">
	<div class="container">
    	<h3><a href="index.php">About Us</a></h3>
	</div>
</section>
<!-- 
title_english 	html_title_english 	 	title_french 	html_title_french 	content_french 	updation_timestamp 	status 
-->
<section class="container page-content">
	<hr class="vertical-space2">
    <section class="sixteen columns">
		<div class="shop-wrap">
        	<figure class="shop-item two_third">
          		<?php echo $dynamic_content->content_english ; ?>
			</figure>
		</div>
        <?php $this->load->view("about_us/side_links") ; ?>
	</section><!-- end-main-content --> 

	<br class="clear"><!-- end-sidebar-->
</section>