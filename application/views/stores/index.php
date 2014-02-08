<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyCyGAu05sQeK7UhFmsVqB7S_MEbH20T7ic&sensor=false"></script>
<script type="text/javascript" src="<?php echo base_url() ; ?>javascript/map_script.js"></script>
<style type="text/css">
.text {
	font-size: 12px;
}
.win {
	height: auto;
	overflow: hidden;
}
</style>
<section id="headline" class="aboutus">

<div class="container shop-item">
  <h3><a href="index.php">Find a Retailer </a></h3>
</div>
</section>
<section class="container page-content" >
  <hr class="vertical-space2">
  <section class="sixteen columns">
    <div class="shop-item">
      <h2>Store Locator</h2>
      <h4>Enter your address below to find stores near you </h4>
    </div>
    <div class="one_third">
      <label class="vertical-space2" for="address">Address: </label>
      <input type="text" id="address" name="address" value="" />
    </div>
    <!--
        <div class="one_fourth">
            <label class="vertical-space2" for="city_name_dropdown">City: </label>
            <select id="city_name_dropdown"  name="city_name_dropdown">
            	<option value="">--Search By City--</option>
                <?php // if($cities) { foreach($cities as $rec): ?>
					<option value="<?php // echo $rec->city.", ".$rec->state ?>"><?php // echo $rec->city.", ".$rec->state ?></option>
				<?php // endforeach ; }?>
            </select>
        </div>-->
    <div class="one_third">
      <label class="vertical-space2" for="radius">Radius: </label>
      <select id="radius" name="radis">
        <option value="1">1 KM</option>
        <option value="5">5 KM</option>
        <option value="10">10 KM</option>
        <option value="25" selected="selected">25 KM</option>
      </select>
    </div>
    <div class="one_third column-last">
      <input type="button" id="submit_button" value="Search Locations" />
    </div>
  </section>
  <div id="googleMap" style="height:380px; width:100%;"></div>
  <br />
  <br />
  <section class="sixteen columns">
    <!--Waqas use this for the store list
    <div class="store-list">
      <hr>
      <div class="one_fifth"> <strong>Natural Choice Healing House</strong><br>
        (14 km away)</div>
      <div class="one_fifth">(705) 435-2300 </div>
      <div class="one_fifth">2943 Major Mackenzie Dr<br>
        Vaughan, ON, L6A 1C6 </div>
      <div class="one_fifth"> <a target="_blank" href="https://maps.google.ca/maps?saddr=&daddr=2943 Major Mackenzie Dr Vaughan ON L6A 1C6">Directions</a> | <a target="_blank" href="http://www.natures-source.com">Website</a> </div>
      <div class="one_fifth column-last"> <a target="_blank" href="https://www.facebook.com/natsrc"> <img src="http://www.innovitehealth.com/images/social-icons/facebook.png"> </a> <a target="_blank" href="https://twitter.com/Natures_Source"> <img src="http://www.innovitehealth.com/images/social-icons/twitter.png"> </a> </div>
    </div>-->
    <table id="location_details_table" class="table table-hover">
      <tbody>
      </tbody>
    </table>
  </section>
  <hr class="vertical-space2">
</section>
