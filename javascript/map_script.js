var map ;
google.maps.event.addDomListener(window, 'load', initialize) ;
var markersArray = [] ;
var infowindowArray = [] ;
var _Circle, flag1 = 0 ;
var central_location, KMs = 0 ;
var start_flag = 0 ;
var bounds = new google.maps.LatLngBounds() ; 


function initialize()
{
	var myLatlng =  new google.maps.LatLng(56.130366, -106.346771) ;	
	var mapOptions = {zoom: 4, center: myLatlng, mapTypeId: google.maps.MapTypeId.ROADMAP} ;
	
	map = new google.maps.Map(document.getElementById('googleMap'), mapOptions) ;
	
	google.maps.event.addListener(map, 'idle', function(){
		if(start_flag) {
			clearOverlays() ;
			var bounds = map.getBounds() ;
			var NE = bounds.getNorthEast();
			var SW = bounds.getSouthWest();
			var response = "" ;
    		var location_data = {latitude1: NE.lat(), logitude1: NE.lng(), latitude2: SW.lat(), logitude2: SW.lng()} ;
			var map_markers = get_nearby_locations(location_data) ;
		}
	});
}
/**/

function get_nearby_locations(location_data)
{
	var base_url = $("#base_url").val() ;
	$.ajax({
    	type: "POST", 
        url:  base_url+"stores/get_places", 
        data: location_data,
        dataType: "json",
		success: function(response)
        {
			console.log(response) ;
			place_merkers(response) ;
		}
    }) ;
}

function place_merkers(response)
{
	$("#location_details_table tbody").html("") ;
 	
	var infowindow1 = new google.maps.InfoWindow ;
	
	for (var i in response)
	{
		var marker_position = new google.maps.LatLng(response[i].latitude, response[i].longitude) ;
		var distance = google.maps.geometry.spherical.computeDistanceBetween(central_location, marker_position) ;
		
		if(distance <= KMs)
		{
			var info_content_string = '<div class="win"><h6>' + response[i].retailer_name + "</h6>" + response[i].address1 + " <br /> " + response[i].city + ", " + response[i].province + ", " +response[i].postal_code + " <br /> Phone: " + response[i].telephone + '</div>' ;
        	
			markersArray[i] = new google.maps.Marker({position: marker_position, map: map}) ;
			var marker = markersArray[i] ;
			
			infowindowArray[i] = infowindow1 ;
			bindInfoW(marker, info_content_string, infowindow1);

			$("#location_details_table tbody").append(build_tr(response[i].retailer_name, response[i].address1, response[i].city, response[i].province, response[i].postal_code, response[i].telephone, response[i].website, response[i].facebook, response[i].twitter, response[i].linkedin, response[i].googleplus));
		}
	}
}

function bindInfoW(marker, contentString, infowindow)
{ 
	google.maps.event.addListener(marker, 'click', function() {
    	infowindow.setContent(contentString);
        infowindow.open(map, marker) ;
	});
}

function clearOverlays()
{
	if(markersArray)
		for(i in markersArray)
	  		markersArray[i].setMap(null) ;
	
	markersArray = [] ;
}


function build_tr(retailor_name, address1, city, provience, postal_code, telephone, website, facebook, twitter, linkedin, googleplus)
{
	var t_add = address1 + " " + city + " " + provience + " " + postal_code ;
	var rec = '' ;
	var base_url = $("#base_url").val() ;
	rec = rec + '<tr>' ;
	rec = rec + '<td style="width:20%; text-align:top;"><h6>'+ retailor_name +'</h6></td>' ;
	rec = rec + '<td style="width:20%; text-align:top;">Ph: '+telephone+'</td>' ;
	rec = rec + '<td class="text" style="width:25%;">'+ address1 +'<br /><br />'+ city +', '+ provience + ', ' + postal_code +'</td>' ;
	rec = rec + '<td class="text" style="width:20%;"><a href="https://maps.google.ca/maps?saddr=&daddr=' + t_add+ '" target="_blank">Directions</a>' ;
	if(website != "") rec = rec + ' | <a href="'+ website +'" target="_blank">Website</a></td>' ; 
	rec = rec + '<td class="text" style="width:15%;">'
	
	if(facebook != "") rec = rec + '<a href="'+facebook+'" target="_blank"><img src="'+base_url+'images/social-icons/facebook.png" /></a> &nbsp; &nbsp;' ;
	if(twitter != "") rec = rec + '<a href="'+twitter+'" target="_blank"><img src="'+base_url+'images/social-icons/twitter.png" /></a> &nbsp; &nbsp;' ;
	if(linkedin != "") rec = rec + '<a href="'+linkedin+'" target="_blank"><img src="'+base_url+'images/social-icons/linkedin.png" /></a> &nbsp; &nbsp;' ;
	if(googleplus != "")rec = rec + '<a href="'+googleplus+'" target="_blank"><img src="'+base_url+'images/social-icons/googleplus.png" /></a> &nbsp; &nbsp;' ;
	
	rec = rec + '</td>' ;
	
	rec = rec + '</tr>' ;	
	
	return rec ;
}

$(function(){
	
	$("#city_name_dropdown").on("change", function(){
		$("#address").val(this.value) ;
	});
	
	$("#submit_button").click(function(){
		var address = $("#address").val() ;
		var radius = $("#radius :selected").val() ;
		if(address == "") { alert("You have not entered any address.") ; return false ; }
		start_flag = 1 ;
		var geocoder = new google.maps.Geocoder();
		if(flag1) _Circle.setMap(null) ;
    	geocoder.geocode({'address': address}, function(results, status){
     		if(status == google.maps.GeocoderStatus.OK) {
        		map.setCenter(results[0].geometry.location) ;
				central_location = results[0].geometry.location ; KMs = radius * 1000 ;
				
	var different_marker = new google.maps.Marker({position: results[0].geometry.location, map: map, icon:'http://maps.google.com/mapfiles/marker_green.png',  animation: google.maps.Animation.BOUNCE}) ;
	 
				map.setZoom(4) ;	
				var StoreLocations = {
					strokeOpacity: 0.8,
					strokeWeight: 2,
					fillOpacity: 0.35,
					//strokeColor: '#FF0000',
					//fillColor: '#FF0000',
					strokeColor: 'TRANSPARENT',
					fillColor: 'TRANSPARENT',
					map: map,
					center: results[0].geometry.location,
					radius: radius * 1000 
				} ;
				
				var searchCircle = new google.maps.Circle(StoreLocations) ;
				_Circle = searchCircle ;
				flag1 = 1 ;
				
				map.fitBounds(searchCircle.getBounds()) ;
				
      		} else {
        		alert("Geocode was not successful for the following reason: " + status);
      		}
		});
	});
});