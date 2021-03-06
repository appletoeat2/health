<footer id="footer">
	<section class="container footer-in">
    	<div class="four columns">
        	<h4 class="subtitle">Contact Us</h4>
      		<p>97 Saramia Crescent<br> Concord, ON, L4K 4P7<br> Tel: 1-800-387-9111<br> Fax: 1-888-279-3373<br>
      		<a href="mailto:customerservice@innovitehealth.com">customerservice@innovitehealth.com</a></p>
		</div><!-- end-contact-info /end -->
		<div class="four columns">
        	<h4 class="subtitle">Stay in the loop</h4>
            <!-- BEGIN: Constant Contact Email List Form Button --><div><a href="http://visitor.r20.constantcontact.com/d.jsp?llr=giajnspab&amp;p=oi&amp;m=1116235661574&amp;sit=fwoszjoib&amp;f=460f1464-ee17-484a-940a-238f978be67d" target="_blank" class="button red small">Sign Up Now</a><!-- BEGIN: Email Marketing you can trust --><p></p><div><p>Stay in in the loop on products,<br>events and promotions.</p></div></div>
     		<!--<p>Keep up to date with the latest news, events and product information. Enter email address</p>
			<div id="form">
				<p><input type="text" id="email_address" name="email_address" class="" /></p>
    			<button type="button" id="subscription_email_address" class="small">subscribe</button>
    		</div>-->
    	</div><!-- tweets  /end -->
    	<div class="four columns">
      		<h4 class="subtitle">Products</h4>
      		<div class="listbox1">
        		<ul>
                	<?php if($product_groups) { ?>
                    	<?php foreach($product_groups as $rec): ?>
                        	<li><a href="<?php echo base_url()."products/group_product/".$rec->id ; ?>"><?php echo $rec->group_title ; ?></a></li>    	
						<?php endforeach ; ?>
					<?php } ?>
        		</ul>
      		</div>
    	</div><!-- flickr /end -->
		<div class="four columns">
			<h4 class="subtitle">Stay Connected</h4>
			<div class="socailfollow">
            	<a href="http://facebook.com/InnoviteHealth" target="_blank" class="facebook"><i class="icomoon-facebook"></i></a>
                <a href="http://twitter.com/InnoviteCanada" target="_blank" class="twitter"><i class="icomoon-twitter"></i></a>
                <a href="http://www.youtube.com/user/innovitecanada" target="_blank" class="youtube"><i class="icomoon-youtube"></i></a>
                <!--<a href="<?php echo base_url("") ; ?>" class="instagram"><i class="icomoon-instagram"></i></a>-->
                <!--<a href="<?php echo base_url("") ; ?>" class="pinterest"><i class="icomoon-pinterest"></i></a>-->
                <a href="https://plus.google.com/101210095383195582761" target="_blank" class="google"><i class="icomoon-google"></i></a>
            </div><!-- flickr /end --> 
	</section><!-- end-footer-in -->
	<section class="footbot">
    	<div class="container">
     		<div class="tweleve columns">
      			<div class="">
                    <p>These statements on this website have not been evaluated by Health Canada and should not be construed as medical claims nor intended to diagnose, treat, cure or prevent  any disease. For proper use of these products, consult a health care professional. © Innovite Health 2014. All rights reserved.<br>
                    <div class="bottom-links"><a href="<?php echo base_url()."home/privacy_policy" ; ?>">Privacy Policy</a> | <a href="<?php echo base_url()."home/terms_and_conditions" ; ?>">Terms and conditions</a> </div></p>
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

<script type="text/javascript">
$("#subscription_email_address").click(function(){
	var email_address = $("#email_address").val() ;
	var flag = false ;
	
	if(email_address == "") { alert("Email address is required.") ; flag = true ;}
	
	if(flag) return true ;
	else
	{
		var base_url = $("#base_url").val() ;
		var data1 = "email_address="+email_address ;
		$.ajax({
			type: "POST",
			url:  base_url+"home/subscription_email_address", 
			data: data1,
			success: function(response)
			{
				if(response == "success")
				{
					alert("Email address submitted successfully.") ;
					$("#email_address").val("") ;
				}
				else alert("Failed to submit email address.") ;
			}
		}) ;	
	}
}) ;
</script>
<script src="http://www.google-analytics.com/urchin.js" type="text/javascript">
</script>
<script type="text/javascript">
_uacct = "UA-1937552-12";
urchinTracker();
</script>

</body>
</html>