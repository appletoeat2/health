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
    <form action="<?php echo base_url(); ?>resources/candida_results" method="post" name="form1" id="form2">
      <h2>The Candida Health Test</h2>
      <p>This questionnaire is designed to help determine the likelihood of your health problems being related to Candida. A positive score does not indicate a definite diagnosis, however the higher your score is, the stronger the likelihood that Candida is contributing to your health problems.</p>
      <div class="hoz-line"></div>
 <h2>Instructions:</h2>
      <ul type="disc">
        <li>Score each symptom between 0 and 10, depending on the degree to which it applies to you.</li>
        <li>If the symptom does not apply, score 0.</li>
        <li>If the symptom occurs occasionally or is very mild, score 1 or 3 points.</li>
        <li>If the symptom is frequent or moderately severe, score 4 or 6 points.</li>
        <li>If the symptom is severe, score 7 or 10 points</li>
      </ul>
      <?php if($error) { ?>
      	<div id="#error"><h4 style="color:#F00 !important;">Error: You need to answer all questions.</h4></div>
      <?php } ?>
      
      <?php 
	  	$headings = array("Abdominal Pain", "Anxiety or tearfulness", "Bad breath", "Burning/tearing of eyes", "Chronic sore throat",
						  "Confusion", "Cough or recurrent bronchitis", "Cravings for alcohol", "Cravings for bread", "Cravings for sweets",
						  "Diarrhea", "Difficulty with decision making", "endometriosis or infertility", "Fatigue", "Frequent colds and flues",
						  "Frequent indigestion", "Headaches", "Heartburn", "Hives", "Impotence",
						  "Inability to concentrate", "Insomnia", "Itchy ears/nose", "Jitteriness/irritability", "Loss of balance",
						  "Low libido", "Menstrual irregularities", "Mood swings", "Mucus in stools", "Multiple food sensitivities",
						  "Muscle aches", "Muscle weakness", "Nasal/sinus congestion", "Numbness, burning pain or tightness in chest", "PMS",
						  "Poor coordination", "Poor memory", "Poor sense of direction", "Post nasal drip", "Prostatitis",
						  "Rashes or psoriasis", "Rectal itching", "Recurrent ear infections", "Sensitivity to foods leavened with yeast", "Sensitivity to mould", 
						  "Sensitivity to perfume, paints chemicals", "Sensitivity to tobacco smoke", "Shaking or irritable", "Spacey feeling", "Strong body odour", 
						  "Swollen or painful joints", "Thrush in mouth", "Vaginal infections", "White coating on tongue") ; ?>
      <!--<input type="button" id="hahaha" name="" value="<?php echo count($headings) ; ?>"  />-->
      <p id="attributes"></p>
      <table id="questions_table1111" width="100%" cellspacing="0" cellpadding="0" class="table">
        <tbody><tr>
          <td>&nbsp;</td>
          <td align="center" colspan="4"> very       mild</td>
          <td align="center" colspan="3">moderately</td>
          <td align="center" colspan="4">severe</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td align="center">0</td>
          <td align="center">1</td>
          <td align="center">2</td>
          <td align="center">3</td>
          <td align="center">4</td>
          <td align="center">5</td>
          <td align="center">6</td>
          <td align="center">7</td>
          <td align="center">8</td>
          <td align="center">9</td>
          <td align="center">10</td>
        </tr>
        <?php
			$main_counter = 1 ;
			foreach($headings as $rec) :
				echo "<tr><td>".$rec."</td>" ;
				for($value_counter = 0 ; $value_counter <= 10 ; $value_counter++)
				{
					if($value_counter >= 0 && $value_counter <= 3)
						echo '<td bgcolor="#C4FFC4" align="center"><input type="radio" class="questions" value="'.$value_counter.'" name="q'.$main_counter.'" '.set_radio("q".$main_counter, $value_counter).'/></td>' ;
					
                    elseif($value_counter >= 4 && $value_counter <= 6)
                  		echo '<td bgcolor="#FFFEBF" align="center"><input type="radio" class="questions" value="'.$value_counter.'" name="q'.$main_counter.'" '.set_radio("q".$main_counter, $value_counter).'/></td>' ;
					elseif($value_counter >= 7 && $value_counter <= 10)
                  		echo '<td bgcolor="#FFB3B5" align="center"><input type="radio" class="questions" value="'.$value_counter.'" name="q'.$main_counter.'" '.set_radio("q".$main_counter, $value_counter).'/></td>' ;
				}
				echo "</tr>" ;	
				$main_counter = $main_counter + 1 ;
            endforeach ;
			
		?>
      </tbody></table>
      <div class="centre">
        <p>
          <input type="submit" value="Continue to see your score" id="submit_form_1" name="btn_submit">
            <input type="reset" value="Reset" name="Submit2">
        </p>
      </div>
    </form>
  </div>
                
                
			</figure>
		</div>
        <?php $this->load->view("resources/side_links") ; ?>
	</section><!-- end-main-content --> 

	<br class="clear"><!-- end-sidebar-->
</section>