<section id="headline" class="resources">
	<div class="container">
    	<h3><a href="index.php">Candida Questionnaire</a></h3>
	</div>
</section>

<section class="container page-content">
	<hr class="vertical-space2">
    <section class="sixteen columns">
		<div class="shop-wrap">
        	<figure class="shop-item two_third">
          		
                <div id="left">
      <h2>The Candida Questionnaire</h2>
      <h2>Your Results </h2>
            <p>Your total score will help you and your health practitioner determine how likely it is that your health problems are Candida-related. </p>
            <p>A positive score does not translate into a definite case of Candida. However, the higher your score, the stronger the likelihood overgrowth is contributing to your health problems:</p>
            <table class="table" width="100%" border="0" cellpadding="50">
              <tr>
                <td width="33%" align="left" valign="top" bgcolor="#F2FFF0"><h4><strong>Your score is..</strong></h4></td>
                <td width="67%" valign="top" bgcolor="#F2FFF0"><h4>If you scored <strong>MODERATE</strong> to <strong>SEVERE</strong>, you might be interesed in more information available on Candida by <a href="<?php echo base_url()."products/product_details/0/5" ; ?>">clicking here</a></h4></td>
              </tr>
              <tr>
                <td width="33%" align="center" valign="middle" bgcolor="#EFEFEF" ><?php 
			if (
			is_int($q1) || is_int($q2) || is_int($q3) || is_int($q4) || is_int($q5) || is_int($q6) || is_int($q7) || is_int($q8) || is_int($q9) || is_int($q10) || is_int($q11) || is_int($q12) || is_int($q13) || is_int($q14) || is_int($q15) || is_int($q16) || is_int($q17) || is_int($q18) || is_int($q19) || is_int($q20) || is_int($q21) || is_int($q22) || is_int($q23) || is_int($q24) || is_int($q25) || is_int($q26) || is_int($q27) || is_int($q28) || is_int($q29) || is_int($q30) || is_int($q31) || is_int($q32) || is_int($q33) || is_int($q34) || is_int($q35) || is_int($q36) || is_int($q37) || is_int($q38) || is_int($q39) || is_int($q40) || is_int($q41) || is_int($q42) || is_int($q43) || is_int($q44) || is_int($q45) || is_int($q46) || is_int($q47) || is_int($q48) || is_int($q49) || is_int($q50) || is_int($q51) || is_int($q52) || is_int($q53) || is_int($q54)
			)  
			     { echo("<p class='tx-bodycopy'>Sorry, you may have miss a question. All of the questions must be answered. <a href='javascript: history.go(-1)'>Please go back and try again</a></p>");}
			else{

               $math = $q1 + $q2 + $q3 + $q4 + $q5 + $q6 + $q7 + $q8 + $q9 + $q10 + $q11 + $q12 + $q13 + $q14 + $q15 + $q16 + $q17 + $q18 + $q19 + $q20 + $q21 + $q22 + $q23 + $q24 + $q25 + $q26 + $q27 + $q28 + $q29 + $q30 + $q31 + $q32 + $q33 + $q34 + $q35 + $q36 + $q37 + $q38 + $q39 + $q40 + $q41 + $q42 + $q43 + $q44 + $q45 + $q46 + $q47 + $q48 + $q49 + $q50 + $q51 + $q52 + $q53 + $q54;
			   
			   /*
			   $math = $q1 + $q2 + $q3 + $q4 + $q5 + $q6 + $q7 + $q8 + $q9 + $q10 + $q11 + $q12 + $q13 + $q14 + $q15 + $q16 + $q17 + $q18 + $q19 + $q20 + $q21 + $q22 + $q23 + $q24 + $q25 + $q26 + $q27 + $q28 + $q29 + $q30 + $q31 + $q32 + $q33 + $q34 + $q35 + $q36 + $q37 + $q38 + $q39 + $q40 + $q41 + $q42 + $q43 + $q44 + $q45 + $q46 + $q47 + $q48 + $q49 + $q50 + $q51 + $q52 + $q53 + $q54; /**/
				echo "<h1>".$math."</h1>";}
			?>                </td>
                <td valign="top" bgcolor="#EFEFEF" >
                  <h3>35 to 55 MILD: </h3>
                    <h3> 55 to	80 MODERATE:</h3>
                <h3>80 and over SEVERE: </h3></td>
              </tr>
              <tr>
                <td align="center" valign="middle" bgcolor="#FFFFFF" ><img src="/admin/images/prod_images/medium/ad-27-06.jpg" width="176" height="234" alt=""/></td>
                <td valign="top" bgcolor="#FFFFFF" ><h6>&nbsp;</h6>
                  <h6>&nbsp;</h6>
                  <h6>NEW &amp; IMPROVED: Yeast Buster® candida detox program now with Activated Charcoal for easier digestion                  </h6>
                  <h6>Restore: The healthy balance of intestinal flora<br>
                  Repair: The overpopulation of Candida in your intestinal tract <br>
                Reclaim: Your vitality and quality of life
                  </h6>
                <h6><a href="http://www.innovitehealth.com/products/product_details/2/5">Click here to learn more</a></h6></td>
              </tr>
            </table>

  </div>
                
                
			</figure>
		</div>
        <?php $this->load->view("resources/side_links") ; ?>
	</section><!-- end-main-content --> 

	<br class="clear"><!-- end-sidebar-->
</section>