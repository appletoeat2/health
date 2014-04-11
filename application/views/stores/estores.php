<section id="headline" class="aboutus">
	<div class="container">
    	<h3><a href="index.php">e-Stores </a></h3>
	</div>
</section>

<section class="container page-content">
	<hr class="vertical-space2">
    <section class="sixteen columns">
		<div class="shop-wrap">
        	<figure class="shop-item two_third">
				<h2>Shop Online </h2>
				<h4>Innovite Health products are available for purchase online at these natural health retailers.</h4>
				<table class="table">
       		    <?php
					if($estores) {
						foreach($estores as $rec):
							echo '<tr>' ;
							echo '<td>'.$rec->store_name_english.'</td>' ;
							echo '<td><a href="http://'.$rec->website_url.'" target="_blank">'.$rec->website_url.'</a></td>' ;
							echo '</tr>' ;
						endforeach ;
					}
				?>
				</table>
			</figure>
		</div>
        <?php $this->load->view("resources/side_links") ; ?>
	</section><!-- end-main-content --> 
	<br class="clear"><!-- end-sidebar-->
</section>