<section id="headline" class="aboutus">
	<div class="container">
    	<h3><a href="index.php">Contact Us</a></h3>
	</div>
</section>

<section class="container page-content">
	<hr class="vertical-space2">
    <section class="sixteen columns">
		<div class="shop-wrap">
        	<figure class="shop-item two_third">
          		<h2>We would love to here from you</h2>
                <h4 class="subtitle"><strong>Customer Service</strong></h4>
  	<p>Require assistance? Please contact our friendly customer service team using the form below. </p>
  	<div id="form">
    	<br>
        <p>Your Email: <input type="text" id="email_address" name="email_address" class=""></p>
        <p>Your Question: <textarea name="question" id="question" rows="1"></textarea></p>
        <button type="button" id="submit_query" class="small red">Send</button>
        <hr>
        <p><strong>Ordering <br>
            </strong>Please note that  Innovite Health sells only to retailers and healthcare professionals.  Consumers can click here to find a <strong><a href="<?php echo base_url() ?>/stores">retailer</a></strong> or <strong><a href="<?php echo base_url() ?>/resources/estores">e-store</a>. </strong></p>
            <p>Customer Service is pleased to take orders during the following hours: <br>
              9:00 AM to 5:00 PM EST, Monday to Friday                </p>
            <p><strong>Innovite Health<br>
            </strong>97 Saramia Crescent<br>
              Concord, ON<br>
              L4K 4P7 <br>
              Tel: 1-800-387-9111 <br>
              Fax: 1-888-279-3373 </p>
            <p><a href="mailto:customerservice@innovitehealth.com">customerservice@innovitehealth.com</a> </p>
                

          <script type="text/javascript">
$("#submit_query").click(function(){
	var email = $("#email_address").val() ;
	var question = $("#question").val() ;
	var flag = false ;
	
	if(email == "") { alert("Email address is required.") ; flag = true ;}
	if(question == "") { alert("Question is required.") ; flag = true ;}
	
	if(flag) return true ;
	else
	{
		var base_url = $("#base_url").val() ;
		var data1 = "email_address="+email+"&question="+question ;
		$.ajax({
			type: "POST",
			url:  base_url+"products/send_product_query", 
			data: data1,
			success: function(response)
			{
				if(response == "success")
				{
					alert("Your query submitted successfully. You will be contacted shortly.") ;
					$("#email_address").val("") ;
					$("#question").val("") ;
				}
				else alert("Failed to submit query.") ;
			}
		}) ;	
	}
}) ;
                </script>
		  </div>
        	</figure>
		</div>
        <?php $this->load->view("about_us/side_links") ; ?>
	</section><!-- end-main-content --> 

	<br class="clear"><!-- end-sidebar-->
</section>