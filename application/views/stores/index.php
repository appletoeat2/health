<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyCyGAu05sQeK7UhFmsVqB7S_MEbH20T7ic&sensor=false"></script>
<script type="text/javascript" src="<?php echo base_url() ; ?>javascript/map_script.js"></script>
<style type="text/css">
.text{ font-size:12px;}
.win{ height:auto ;  overflow: hidden;}
</style>
<section class="container page-content" >
    <hr class="vertical-space2">
    
    <section class="sixteen columns">
    <h2>Retailer Locator</h2>
        <div class="one_third">
        	<label class="vertical-space2" for="address">Address: </label><input type="text" id="address" name="address" value="" />
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
                <option value="5" selected="selected">5 KM</option>
                <option value="10">10 KM</option>
                <option value="25">25 KM</option>
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
    <table id="location_details_table" class="table table-hover">
    	<tbody>
        </tbody>
    </table>
    </section>
    <hr class="vertical-space2">
</section>