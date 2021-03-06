<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="styles.css"/>
<script src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" ></script>

<script>
function initialise(){
	
	var map_holder = document.getElementById('map_holder');
	//New Code for geocoder
	geocoder = new google.maps.Geocoder();
	//End new Code
	var options = {
	
		center: new google.maps.LatLng(51.5615,-0.0700),
		zoom: 14,
		disableDefaultUI: true,
		mapTypeId: google.maps.MapTypeId.ROADMAP
		
	}
	
	
	var map = new google.maps.Map(map_holder,options);

	map.set('styles', [
  {
    featureType: 'road',
    elementType: 'geometry',
    stylers: [
      { color: '#73221A' },
      { weight: 0.7 }
    ]
  }, {
    featureType: 'road',
    elementType: 'labels',
    stylers: [
      { visibility: 'off' }
    ]
  }, {
    featureType: 'landscape',
    elementType: 'geometry',
    stylers: [
      { hue: '#ffff00' },
      { gamma: 1.4 },
      { saturation: 82 },
      { lightness: 96 }
    ]
  },{
  featureType: 'road.local',
  elementType: 'labels',
  stylers: [
  	{visibility: 'off'}
  ]
  },
  {
  featureType: 'poi',
  elementType: 'labels',
  stylers: [
  	{visibility: 'off'}
  ]
  },{
  featureType: 'landscape.natural',
  elementType: 'geometry',
  stylers: [
  	{color: '#CCCCCC'}
  ]
  },{
  featureType: 'poi.park',
  elementType: 'geometry',
  stylers: [
  	{color: '#085975'}
  ]
  },{
  featureType: 'administrative.neighborhood',
  elementType: 'labels',
  stylers: [
  	{color: '#DDA32F'},
  	{weight: '0.6'}
  ]
  }
]);


//New code for review

function getGeocode() {
	var address = document.getElementById('quickSearchField').value;
	//This gets the latlng of the address
	var newLatLng;
	geocoder.geocode( 
	{ 'address': address}, function(results, status) {
		var newLocation = results[0].geometry.location;
		var newLat = newLocation.lat();
		var newLng = newLocation.lng();
		console.log(newLat, newLng);
		//now recenter the map at the new address (we may want to move this)
		
		map.panTo(new google.maps.LatLng(newLat,newLng));
			}
	)};
	
	//the next bit of code I was going to write was the php / mySql query...
	//I had thought to get the coordinates of each row in the DB, then use pythagorus theorum to calculate the distance
	//between the lat and lng points, order the results in ascending order of distance and then return only the first two.
	
$('#quickSearchButton').on('click', function() {
	getGeocode();
}



);
//End new code

}

</script>
</head>
<body onload="initialise();">
<header id="header">
<span>NorthLondonPubs.</span>
</header>
<div id="map_holder"></div>

<div id="wrapper">


<section id="find" class="closed">
<nav class="tab"><span>FIND.</span></nav>
<article></article>
</section>

<section id="news" class="closed">
<nav class="tab"><span>NEWS.</span></nav>
<article></article>
</section>

<section id="suggest" class="closed">
<nav class="tab"><span>SUGGEST.</span></nav>
<article></article>
</section>

<section id="about" class="closed">
<nav class="tab"><span>ABOUT.</span></nav>
<article></article>
</section>

<section id="quick">

<!--New code-->
<form id="quickSearchForm">
<label for="quickSearchField" >
<span id="quickSearchButton">
</span>
<input type="text" name="quickSearchField" id="quickSearchField">
</label>
</form>
<!--End new code-->

</section>

</div> <!-- end of wrapper -->

</body>
</html>