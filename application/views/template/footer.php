<footer id="footer">
	<section class="container footer-in">
    	<div class="four columns">
        	<h4 class="subtitle">Contact Us</h4>
      		<p>97 Saramia Crescent<br> Concord, ON, L4K 4P7<br> Tel: 1-800-387-9111<br> Fax: 1-888-279-3373</p>
		</div><!-- end-contact-info /end -->
		<div class="four columns">
        	<h4 class="subtitle">Stay in the loop</h4>
     		<p>Keep up to date with the latest news, events and product information.
Enter email address</p>
<div id="form">
        <form action="<?php echo base_url() ; ?>" method="get">
            <p><input type="text" class=""></p>
            <button type="button" class="small">subscribe</button>
        </form>
	</div>
    	</div><!-- tweets  /end -->
    	<div class="four columns">
      		<h4 class="subtitle">Products</h4>
      		<div class="listbox1">
        		<ul>
                	<?php if($product_groups) { ?>
                    	<?php foreach($product_groups as $rec): ?>
                        	<li><a href="<?php echo base_url()."products/group_product/".$rec->id ; ?>"><?php echo $rec->group_name ; ?></a></li>    	
						<?php endforeach ; ?>
					<?php } ?>
        		</ul>
      		</div>
    	</div><!-- flickr /end -->
		<div class="four columns">
			<h4 class="subtitle">Stay Connected</h4>
			<div class="socailfollow">
            	<a href="<?php echo base_url("") ; ?>" class="facebook"><i class="icomoon-facebook"></i></a>
                <a href="<?php echo base_url("") ; ?>" class="twitter"><i class="icomoon-twitter"></i></a>
                <a href="<?php echo base_url("") ; ?>" class="youtube"><i class="icomoon-youtube"></i></a>
                <a href="<?php echo base_url("") ; ?>" class="instagram"><i class="icomoon-instagram"></i></a>
                <a href="<?php echo base_url("") ; ?>" class="pinterest"><i class="icomoon-pinterest"></i></a>
                <a href="<?php echo base_url("") ; ?>" class="google"><i class="icomoon-google"></i></a>
            </div><!-- flickr /end --> 
	</section><!-- end-footer-in -->
	<section class="footbot">
    	<div class="container">
     		<div class="tweleve columns">
      			<div class="">
                  
                    <p><small>These statements on this website have not been evaluated by Health Canada and should not be construed as medical claims nor intended to diagnose, treat, cure or prevent  any disease. For proper use of these products, consult a health care professional. © Innovite Health 2014. All rights reserved.<br>
                    <div class="footernav"><a href="<?php echo base_url()."home/privacy_policy" ; ?>">Privacy Policy</a> | <a href="<?php echo base_url()."home/terms_and_conditions" ; ?>">Terms and conditions</a> </div></small></p>
                  
      			</div>
	  		</div><!-- footer-navigation /end -->
	  		<div class="eight columns"></div>
    	</div>
	</section><!-- end-footbot --> 
</footer><!-- end-footer -->

<span id="scroll-top"><a class="scrollup"><i class="icomoon-arrow-up"></i></a></span>

</div><!-- end-wrap -->
<!-- End Document -->
<script src="<?php echo base_url() ; ?>javascript/jcarousel.js" type="text/javascript"></script>
<script src="<?php echo base_url() ; ?>javascript/jquery.flexslider-min.js" defer></script>
<script src="<?php echo base_url() ; ?>javascript/mexin-custom.js" type="text/javascript"></script>
<script src="<?php echo base_url() ; ?>javascript/doubletaptogo.js" type="text/javascript"></script>
<script src="<?php echo base_url() ; ?>javascript/layerslider/jQuery/jquery-easing-1.3.js" type="text/javascript"></script>
<script src="<?php echo base_url() ; ?>javascript/layerslider/js/layerslider.kreaturamedia.jquery.js" type="text/javascript"></script>
<script src="<?php echo base_url() ; ?>javascript/layerslider-init.js"></script>
<script src="<?php echo base_url() ; ?>javascript/bootstrap-alert.js"></script>
<script src="<?php echo base_url() ; ?>javascript/bootstrap-dropdown.js"></script>
<script src="<?php echo base_url() ; ?>javascript/bootstrap-tab.js"></script>
<script src="<?php echo base_url() ; ?>javascript/products_filter.js"></script>
</body>
</html>