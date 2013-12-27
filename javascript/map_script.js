var base_url = "http://localhost/health/" ;
//var base_url = "http://localhost/www.inno-vite.org/health/" ;
var map ;
var infoWindow = new google.maps.InfoWindow() ;
var markersArray = [] ;
var _Circle, flag1 = 0 ;
var central_location, KMs = 0, flag2 = 0 ;

function clearOverlays()
{
	if (markersArray)
		for(i in markersArray)
	  		markersArray[i].setMap(null) ;
	
	markersArray = [] ;
}

function build_tr(retailor_name, address1, city, provience, postal_code, website)
{
	var t_add = address1 + " " + city + " " + provience + " " + postal_code ;
	
	var rec = '<tr><td style="width:30%; text-align:top;"><h6>'+ retailor_name +'</h6></td><td class="text" style="width:40%;">'+ address1 +'<br /><br />'+ city +', '+ provience + ', ' + postal_code +'</td><td class="text" style="width:30%;"><a href="https://maps.google.ca/maps?saddr=&daddr=' + t_add+ '" target="_blank">Directions</a>  | <a href="'+ website +'" target="_blank">Website</a></td></tr>' ;	
	
	return rec ;
}


function get_user_location()
{
}

function get_nearby_locations(location_data)
{
	$.ajax({
    	type: "POST", 
        url:  base_url+"stores/get_palces", 
        data: location_data,
        dataType: "json",
		success: function(response)
        {
			console.log(response) ;
			place_merkers(response) ;
			flag2 = 0 ;
			KMs = 0 ;
		}
    }) ;
}

function place_merkers(response)
{
	$("#location_details_table tbody").html("") ;
	for (var i in response)
	{
		var output = "" ;
		var marker_position = new google.maps.LatLng(response[i].latitude, response[i].longitude) ;
		
		if(flag2)
		{
			var distance = google.maps.geometry.spherical.computeDistanceBetween(central_location, marker_position) ;
			if(distance <= KMs)
			{
				var info_content_string = '<div class="win">' + response[i].retailer_name + "<br />" + response[i].address1 + " <br /> " + response[i].city + ", " + response[i].province + ", " +response[i].postal_code + " <br /> Phone: " + response[i].telephone + '</div>' ;
			
			markersArray[i] = new google.maps.Marker({position: marker_position, map: map}) ;
			marker = markersArray[i] ;
			google.maps.event.addListener(marker, 'click', (function(marker, i){ return function() {
            	infoWindow.setContent(info_content_string) ;
				infoWindow.open(map, marker) ;
            }})(marker, i)) ;
			
			$("#location_details_table tbody").append(build_tr(response[i].retailer_name, response[i].address1, response[i].city, response[i].province, response[i].postal_code, response[i].website)) ;
			
			}
		} else {
			
			var info_content_string = '<div class="win">' + response[i].retailer_name + "<br />" + response[i].address1 + " <br /> " + response[i].city + ", " + response[i].province + ", " +response[i].postal_code + " <br /> Phone: " + response[i].telephone + '</div>' ;
			
			markersArray[i] = new google.maps.Marker({position: marker_position, map: map}) ;
			marker = markersArray[i] ;
			google.maps.event.addListener(marker, 'click', (function(marker, i){ return function() {
            	infoWindow.setContent(info_content_string) ;
				infoWindow.open(map, marker) ;
            }})(marker, i)) ;
			
			$("#location_details_table tbody").append(build_tr(response[i].retailer_name, response[i].address1, response[i].city, response[i].province, response[i].postal_code, response[i].website)) ;
		
		}
	}
}


google.maps.event.addDomListener(window, 'load', initialize) ;

$(function(){
	
	$("#city_name_dropdown").on("change", function(){
		$("#address").val(this.value) ;
	});
	
	$("#submit_button").click(function(){
		var address = $("#address").val() ;
		var radius = $("#radius :selected").val() ;
		//alert("radius: "+radius) ;
		var geocoder = new google.maps.Geocoder();
		if(flag1) _Circle.setMap(null) ;
    	geocoder.geocode({'address': address}, function(results, status){
     		if(status == google.maps.GeocoderStatus.OK) {
        		map.setCenter(results[0].geometry.location) ;
				central_location = results[0].geometry.location ; flag2 = 1 ; KMs = radius * 1000 ;
				map.setZoom(4) ;	
				var StoreLocations = {
					strokeColor: 'TRANSPARENT',
					//strokeOpacity: 0.8,
					//strokeWeight: 2,
					fillColor: 'TRANSPARENT',
					//fillOpacity: 0.35,
					map: map,
					center: results[0].geometry.location,
					radius: radius * 1000 
				} ;
				
				var cityCircle = new google.maps.Circle(StoreLocations) ;
				_Circle = cityCircle ;
				flag1 = 1 ;
				map.fitBounds(cityCircle.getBounds()) ;
				
      		} else {
        		alert("Geocode was not successful for the following reason: " + status);
      		}
		});
	});
});

function initialize()
{	
	/*
	var myLatlng ;
	$.ajax({
    	type: "POST", 
        url:  "user_location.php", 
        data: "location=yes",
        dataType: "json",
		success: function(response)
        {
			myLatlng =  new google.maps.LatLng(parseFloat(response.latitude), parseFloat(response.longitude)) ;
		}
    }) ;
	/**/
	
	var myLatlng =  new google.maps.LatLng(56.130366, -106.346771) ;	
	var mapOptions = {zoom: 5, center: myLatlng, mapTypeId: google.maps.MapTypeId.ROADMAP} ;
	
	map = new google.maps.Map(document.getElementById('googleMap'), mapOptions) ;
	
	google.maps.event.addListener(map,'idle',function(){
		clearOverlays() ;
		var bounds = map.getBounds() ;
		var NE = bounds.getNorthEast();
		var SW = bounds.getSouthWest();
		var response = "" ;
    	var location_data = {latitude1: NE.lat(), logitude1: NE.lng(), latitude2: SW.lat(), logitude2: SW.lng()} ;
		var map_markers = get_nearby_locations(location_data) ;
	}) ;
	/**/	
}