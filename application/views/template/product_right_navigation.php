<aside class="four columns offset-by-one sidebar">
	<!-- <h4 class="subtitle">Skeletal Health</h4>
   	<div class="listbox1">
    	<ul>
        	<li><a href="<?php echo base_url()."products/index/".$group_id ; ?>">Supplements</a></li>
            <li><a href="<?php echo base_url()."products/bone_and_joint_health_information/".$group_id ; ?>">Bone &amp; Joint Health</a></li>
            <li><a href="<?php echo base_url() ; ?>">Books &amp; Resources</a></li>
            <li><a href="<?php echo base_url() ; ?>">Where to buy</a></li>
    	</ul>
	</div>end-listbox1 --> 
  	<br class="clear">
  	<h4 class="subtitle">Product questions?</h4>
  	<p>Contact Us at 1-800-387-9111 or email us using the form below</p>
  	<div id="form">
    	<br>
        <p>Your Email: <input type="text" id="email_address" name="email_address" class=""></p>
        <p>Your Question: <textarea name="question" id="question" rows="1"></textarea></p>
        <button type="button" id="submit_query" class="small red">Send</button>
	</div>
    <!--<h4 class="subtitle">Did you know?</h4>
  	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor<a href="<?php echo base_url() ; ?>"> exercitation</a> ut labore et dolore magna aliqua. Ut enim ad</p>
</aside>end-sidebar-->
<!-- end-sidebar-->

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
		var data1 = "email_address="+email+"&question="+question+"&current_page="+(window.location) ;
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
	} /**/
}) ;
</script>