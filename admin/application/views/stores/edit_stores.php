<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyCyGAu05sQeK7UhFmsVqB7S_MEbH20T7ic&sensor=false"></script>
<?php
	function compare($var, $val)
	{
		if($var == $val) return true ;
		else return false ;
	}
?>
<form id="store_form" name="store_form" action="<?php echo base_url()."stores/update_store" ; ?>" method="post">
<div class="section">
	<div id="right">
		<div class="section">
        	<?php if($errors) {  echo '<div class="message red"><br /><ul>'.$errors.'</ul><br /></div>' ; } ?>
            <input type="hidden" name="store_id" id="store_id" value="<?php echo $store_rec->id ; ?>" />
            <div class="half">
				<div class="box">
					<div class="title">Store Address Details<span class="hide"></span></div>
					<div class="content">
                    	<div class="row"> 
                        	<label>Customer Code</label>
                            <div class="right"><input type="text" id="customer_code" name="customer_code" value="<?php echo set_value("customer_code", $store_rec->customer_code) ; ?>" /></div>
                      	</div>
                        <div class="row">
                        	<label>Retailer Name</label>
                            <div class="right"><input type="text" id="retailer_name" name="retailer_name" value="<?php echo set_value("retailer_name", $store_rec->retailer_name) ; ?>" /></div>
                       	</div>
                        <div class="row">
                        	<label>Email1</label>
                            <div class="right"><input type="text" id="email1" name="email1" value="<?php echo set_value("email1", $store_rec->email1) ; ?>" /></div>
                       	</div>
                        <div class="row">
                        	<label>Email2</label>
                            <div class="right"><input type="text" id="email2" name="email2" value="<?php echo set_value("email2", $store_rec->email2) ; ?>" /></div>
                       	</div>
                        <div class="row">
                        	<label>Address1</label>
                            <div class="right"><input type="text" id="address1" name="address1" value="<?php echo set_value("address1", $store_rec->address1) ; ?>" /></div>
                       	</div>
                        <div class="row">
                        	<label>Address2</label>
                            <div class="right"><input type="text" id="address2" name="address2" value="<?php echo set_value("address2", $store_rec->address2) ; ?>" /></div>
                       	</div>
                        <div class="row">
                        	<label>City</label>
                            <div class="right"><input type="text" id="city" name="city" value="<?php echo set_value("city", $store_rec->city) ; ?>" /></div>
                        </div>
                        <div class="row">
                        	<label>Province</label>
                            <div class="right"><input type="text" id="province" name="province" value="<?php echo set_value("province", $store_rec->province) ; ?>" /></div>
                       	</div>
                        <div class="row">
                        	<label>Postal Code</label>
                            <div class="right"><input type="text" id="postal_code" name="postal_code" value="<?php echo set_value("postal_code", $store_rec->postal_code) ; ?>" /></div>
                        </div>
                        <div class="row">
                        	<label>Telephone</label>
                            <div class="right"><input type="text" id="telephone" name="telephone" value="<?php echo set_value("telephone", $store_rec->telephone) ; ?>" /></div>
                       	</div>
                   	</div>
              	</div>
           	</div>
            
        	<div class="half">
				<div class="box">
					<div class="title">Store URL<span class="hide"></span></div>
					<div class="content">
            			<div class="row">
							<label>Website Url</label>
							<div class="right"><input type="text" id="website" name="website" value="<?php echo set_value("website", $store_rec->website) ; ?>" /></div>
                        </div>
                        <div class="row">
                            <label>Ecommerce Url</label>
                            <div class="right"><input type="text" id="ecommerce" name="ecommerce" value="<?php echo set_value("ecommerce", $store_rec->ecommerce) ; ?>" /></div>
                        </div>
                        <div class="row">
                            <label>Facebook Url</label>
                            <div class="right"><input type="text" id="facebook" name="facebook" value="<?php echo set_value("facebook", $store_rec->facebook) ; ?>" /></div>
                        </div>
                        <div class="row">
                            <label>Twitter Url</label>
                            <div class="right"><input type="text" id="twitter" name="twitter" value="<?php echo set_value("twitter", $store_rec->twitter) ; ?>" /></div>
                        </div>
                        <div class="row">
                            <label>GooglePlus Url</label>
                            <div class="right"><input type="text" id="googleplus" name="googleplus" value="<?php echo set_value("googleplus", $store_rec->googleplus) ; ?>" /></div>
                        </div>
                        <div class="row">
                            <label>Linkedin url</label>
                            <div class="right"><input type="text" id="linkedin" name="linkedin" value="<?php echo set_value("linkedin", $store_rec->linkedin) ; ?>" /></div>
                        </div>
                        <div class="row">
                            <label>Latitude</label>
                            <div class="right"><input type="text" id="latitude" name="latitude" value="<?php echo set_value("latitude", $store_rec->latitude) ; ?>" /></div>
                        </div>
                        <div class="row">
                            <label>Longitude</label>
                            <div class="right"><input type="text" id="longitude" name="longitude" value="<?php echo set_value("longitude", $store_rec->longitude) ; ?>" /></div>
                        </div>
                        <div class="row">
                            <label>Map Request Status</label>
                            <div class="right"><input type="text" id="map_request_status" name="map_request_status" value="<?php echo set_value("map_request_status", $store_rec->map_request_status) ; ?>" /></div>
                        </div>
                        <div class="row">
                            <label>Status</label>
                            <div class="right">
                                <input type="radio" id="status-1" name="status" value="Active"  <?php echo set_radio("status", "Active", compare($store_rec->status, "Active")) ; ?> /> 
                                	<label for="status-1">Active</label>  
                                <input type="radio" id="status-2" name="status" value="Disable" <?php echo set_radio("status", "Disable", compare($store_rec->status, "Disable")); ?> /> 
                                	<label for="status-2">Disable</label>
                        	</div>
                        </div>
					</div>
				</div>
			</div>
 		</div>
        
    	<div class="section">
			<div class="box">
				<div class="content">
    				<div class="row">
						<label></label>
                        <div class="right"><button type="submit" id="add_store"><span>Sumbit</span></button><button type="button" id="cancel"><span>Cancel</span></button>&nbsp;&nbsp;&nbsp;<a href="javascript:void(0);" id="google_map_attributes">Get Google Map Latitude/Longitude</a></div>
                	</div>
				</div>
        	</div>
        </div>
        
	</div>    
</div>
</form>
<script type="text/javascript">
$(function(){
	$("#google_map_attributes").click(function(){
		var address1 = $("#address1").val() ;
		var city = $("#city").val() ;
		var province = $("#province").val() ;
		var postal_code = $("#postal_code").val() ;
		var flag = true ;
		
		if(address1 == "") { alert("Address 1 is required.") ; flag = false ; }
		if(city == "") { alert("City is required.") ; flag = false ; }
		if(province == "") { alert("Province is required.") ; flag = false ; }
		if(postal_code == "") { alert("Postal Code is required.") ; flag = false ; }
		
		if(flag)
		{
			var address = address1 + ", " + city + ", " + province + ", " + postal_code ;
			var geocoder = new google.maps.Geocoder() ;
			geocoder.geocode({'address': address}, function(results, status){
				if(status == google.maps.GeocoderStatus.OK)
				{
					$("#latitude").val(results[0].geometry.location.lat()) ;
					$("#longitude").val(results[0].geometry.location.lng()) ;
					$("#map_request_status").val(status) ;
				
				} else {
					
					alert("Geocode was not successful for the following reason: " + status) ;
					$("#latitude").val("0.0") ;
					$("#longitude").val("0.0") ;
					$("#map_request_status").val(status) ;
				}
			});	
		}
		
	}) ;
	
	$("#add_store").click(function(){
		var latitude = $("#latitude").val() ;
		var longitude = $("#longitude").val() ;
		var map_request_status = $("#map_request_status").val() ;
		var flag = false ;
		
		if(latitude == "") { alert("Latitude is required.") ; flag = true ; }
		if(longitude == "") { alert("Longitude is required.") ; flag = true ; }
		if(map_request_status == "") { alert("Map Request Status is required.") ; flag = true ; }
		if(flag) return false ;
		else return true ;
	}) ;
	
	$("#cancel").live('click',function(){
		window.location.href = "<?php echo base_url()."stores/index" ; ?>" ;
	}) ;
}) ;
</script>