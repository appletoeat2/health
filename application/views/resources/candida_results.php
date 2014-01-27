<section id="headline" class="resources">
	<div class="container">
    	<h3><a href="index.php">Resources - Candida Questionnaire</a></h3>
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
            <table width="100%" border="0" cellpadding="20">
              <tr>
                <td width="33%" align="left" valign="top" bgcolor="#F2FFF0"><strong>Your score is:</strong></td>
                <td width="67%" valign="top" bgcolor="#F2FFF0">If you scored <strong>MODERATE</strong> to <strong>SEVERE</strong>, you might be interesed in more information available on Candida by <a href="../health_focus/candida.php">clicking here</a> </td>
              </tr>
              <tr>
                <td width="33%" align="left" valign="top" bgcolor="#EFEFEF" class="tx-largebold"><?php 
			if (
			is_int($q1) || is_int($q2) || is_int($q3) || is_int($q4) || is_int($q5) || is_int($q6) || is_int($q7) || is_int($q8) || is_int($q9) || is_int($q10) || is_int($q11) || is_int($q12) || is_int($q13) || is_int($q14) || is_int($q15) || is_int($q16) || is_int($q17) || is_int($q18) || is_int($q19) || is_int($q20) || is_int($q21) || is_int($q22) || is_int($q23) || is_int($q24) || is_int($q25) || is_int($q26) || is_int($q27) || is_int($q28) || is_int($q29) || is_int($q30) || is_int($q31) || is_int($q32) || is_int($q33) || is_int($q34) || is_int($q35) || is_int($q36) || is_int($q37) || is_int($q38) || is_int($q39) || is_int($q40) || is_int($q41) || is_int($q42) || is_int($q43) || is_int($q44) || is_int($q45) || is_int($q46) || is_int($q47) || is_int($q48) || is_int($q49) || is_int($q50) || is_int($q51) || is_int($q52) || is_int($q53) || is_int($q54)
			)  
			     { echo("<p class='tx-bodycopy'>Sorry, you may have miss a question. All of the questions must be answered. <a href='javascript: history.go(-1)'>Please go back and try again</a></p>");}
			else{

               $math = $_POST['q1'] + $_POST['q2'] + $_POST['q3'] + $_POST['q4'] + $_POST['q5'] + $_POST['q6'] + $_POST['q7'] + $_POST['q8'] + $_POST['q9'] + $_POST['q10'] + $_POST['q11'] + $_POST['q12'] + $_POST['q13'] + $_POST['q14'] + $_POST['q15'] + $_POST['q16'] + $_POST['q17'] + $_POST['q18'] + $_POST['q19'] + $_POST['q20'] + $_POST['q21'] + $_POST['q22'] + $_POST['q23'] + $_POST['q24'] + $_POST['q25'] + $_POST['q26'] + $_POST['q27'] + $_POST['q28'] + $_POST['q29'] + $_POST['q30'] + $_POST['q31'] + $_POST['q32'] + $_POST['q33'] + $_POST['q34'] + $_POST['q35'] + $_POST['q36'] + $_POST['q37'] + $_POST['q38'] + $_POST['q39'] + $_POST['q40'] + $_POST['q41'] + $_POST['q42'] + $_POST['q43'] + $_POST['q44'] + $_POST['q45'] + $_POST['q46'] + $_POST['q47'] + $_POST['q48'] + $_POST['q49'] + $_POST['q50'] + $_POST['q51'] + $_POST['q52'] + $_POST['q53'] + $_POST['q54'];
				echo $math;}
			?>                </td>
                <td valign="top" bgcolor="#EFEFEF" class="tx-textbold"><p>35 to 55 MILD: </p>
                    <p> 55 to	80 MODERATE:</p>
                  <p>80 and over SEVERE: </p></td>
              </tr>
            </table>

  </div>
                
                
			</figure>
		</div>
        <?php $this->load->view("resources/side_links") ; ?>
	</section><!-- end-main-content --> 

	<br class="clear"><!-- end-sidebar-->
</section>