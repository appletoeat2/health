<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyCyGAu05sQeK7UhFmsVqB7S_MEbH20T7ic&sensor=false"></script>
<script type="text/javascript" src="<?php echo base_url() ; ?>javascript/map_script.js"></script>
<style type="text/css">
.text{ font-size:12px;}
.win{ height:auto ;  overflow: hidden;}
</style>
<section class="container home-content">
    <section class="row column">
        <div>
        	<label for="address">Address: </label><input type="text" id="address" name="address" value="" />
		</div>
        
    	<div>
            <label for="city_name_dropdown">City: </label>
            <select id="city_name_dropdown"  name="city_name_dropdown">
                <?php $this->load->view("stores/cities") ; ?>
            </select>
        </div>
        
        <div>
            <label for="radius">Radius: </label>
            <select id="radius" name="radis">
                <option value="1">1 KM</option>
                <option value="5">5 KM</option>
                <option value="10">10 KM</option>
                <option value="25">25 KM</option>
                <option selected value="50">50 KM</option>
                <option value="100">100 KM</option>
                <option value="200">200 KM</option>
                <option value="500">500 KM</option>
            </select>
		</div>
        
        <div>    
    		<input type="button" id="submit_button" value="Search Locations" />
    	</div>
        
	</section>
    
        <div id="googleMap" style="height:380px; width:100%;"></div>
		<br />
        <br />
    	<table id="location_details_table" class="table table-hover">
        	<tbody>
        	</tbody>
    	</table>
        
        
        
    <hr class="vertical-space2">
</section>