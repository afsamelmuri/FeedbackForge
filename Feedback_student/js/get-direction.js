// 
// ------------------------------------------------------------------------
// MapFun - An premium application
//
// @package		MapFun Ver 1.0
// @author		Sachin Ghare
// @copyright	Copyright (c) 2016 - Sachin Ghare
// @link		http://www.sachinghare.com
// @since		Version 1.0
// ------------------------------------------------------------------------
//
    var location1;
	var location2;
	var address1;
	var address2;
	var latlng;
	var geocoder;
	var distance;
	
	// finds the coordinates for the two locations and calls the showMap() function
	function initialize2()
	{
		geocoder = new google.maps.Geocoder(); // creating a new geocode object
		
		// getting the two address values
		address1 = document.getElementById("GetDirect").value;
		address2 = document.getElementById("dest").value;
		
		// finding out the coordinates
		if (geocoder) 
		{
			geocoder.geocode( { 'address': address1}, function(results, status) 
			{
				if (status == google.maps.GeocoderStatus.OK) 
				{
					//location of first address (latitude + longitude)
					location1 = results[0].geometry.location;
				} else 
				{
					alert("Geocode was not successful for the following reason: " + status);
				}
			});
			geocoder.geocode( { 'address': address2}, function(results, status) 
			{
				if (status == google.maps.GeocoderStatus.OK) 
				{
					//location of second address (latitude + longitude)
					location2 = results[0].geometry.location;
					// calling the showMap() function to create and show the map 
					showMap();
				} else 
				{
					alert("Geocode was not successful for the following reason: " + status);
				}
			});
		}
	}
		
	// creates and shows the map
	function showMap()
	{
		// center of the map (compute the mean value between the two locations)
		latlng = new google.maps.LatLng((location1.lat()+location2.lat())/2,(location1.lng()+location2.lng())/2);
		
		// set map options
			// set zoom level
			// set center
			// map type
		var mapOptions = 
		{
			zoom: 1,
			center: latlng,
			mapTypeId: google.maps.MapTypeId.ROADMAP
		};
		
		// create a new map object
			// set the div id where it will be shown
			// set the map options
		var map2 = new google.maps.Map(document.getElementById("get_direction"), mapOptions);
		
		// show route between the points
		directionsService = new google.maps.DirectionsService();
		directionsDisplay = new google.maps.DirectionsRenderer(
		{
			suppressMarkers: true,
			suppressInfoWindows: true
		});
		directionsDisplay.setMap(map2);
		directionsDisplay.setPanel(document.getElementById('panel'));
		var request = {
			origin:location1, 
			destination:location2,
			travelMode: google.maps.DirectionsTravelMode.DRIVING
		};
		directionsService.route(request, function(response, status) 
		{
			if (status == google.maps.DirectionsStatus.OK) 
			{
				directionsDisplay.setDirections(response);
				distance = "";
				distance += "";
				document.getElementById("panel").innerHTML = distance;
			}
		});
		

		
		// show a line between the two points
		var line = new google.maps.Polyline({
			map: map2, 
			path: [location1, location2],
			strokeWeight: 7,
			strokeOpacity: 0.8,
			strokeColor: "#FFAA00"
		});
		
		// create the markers for the two locations		
		var marker1 = new google.maps.Marker({
			map: map2, 
			position: location1,
			title: "First location"
		});
		var marker2 = new google.maps.Marker({
			map: map2, 
			position: location2,
			title: "Second location"
		});
		
		// create the text to be shown in the infowindows
		var text1 = '<div>'+
				'<h4 id="firstHeading">First location</h4>'+
				'<div id="bodyContent">'+
				'<p>Coordinates: '+location1+'</p>'+
				'<p>Address: '+address1+'</p>'+
				'</div>'+
				'</div>';
				
		var text2 = '<div>'+
			'<h4 id="firstHeading">Second location</h4>'+
			'<div id="bodyContent">'+
			'<p>Coordinates: '+location2+'</p>'+
			'<p>Address: '+address2+'</p>'+
			'</div>'+
			'</div>';
		
		
		// create info boxes for the two markers
		var infowindow1 = new google.maps.InfoWindow({
			content: text1
		});
		var infowindow2 = new google.maps.InfoWindow({
			content: text2
		});
		
		
		// add action events so the info windows will be shown when the marker is clicked
		google.maps.event.addListener(marker1, 'click', function() {
			infowindow1.open(map2,marker1);
		});
		google.maps.event.addListener(marker2, 'click', function() {
			infowindow2.open(map2,marker1);
		});
		
		
		// compute distance between the two points
		var R = 6371; 
		var dLat = toRad(location2.lat()-location1.lat());
		var dLon = toRad(location2.lng()-location1.lng()); 
		
		var dLat1 = toRad(location1.lat());
		var dLat2 = toRad(location2.lat());
		
		var a = Math.sin(dLat/2) * Math.sin(dLat/2) +
				Math.cos(dLat1) * Math.cos(dLat1) * 
				Math.sin(dLon/2) * Math.sin(dLon/2); 
		var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a)); 
		var d = R * c;
		
		document.getElementById("get_direction").style.display = "block";
	}
	
	function toRad(deg) 
	{
		return deg * Math.PI/180;
	}