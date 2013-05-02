<?php
	require('includes/connections.php');
?>
<!DOCTYPE html>
<html>
<head>
<style>
html, body {
	height:100%;
	width:100%;
	margin:0px;
	padding:0px;
}
#map_canvas {
height:100%;
width:100%;
opacity:0.6;
}
</style>
<script src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>

</head>
<body onload="initialise();">

<div id="map_canvas"></div>

<script>
function initialise(){
	
	var map_holder = document.getElementById('map_canvas');
	var options = {
	
		center: new google.maps.LatLng(51.5449,-0.1033),
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
//setTimeout(function(){
for (var j = 0; j < coords.length+1; j++) {
	var p = coords[j];
	j++;
	var q = coords[j];
    var location = new google.maps.LatLng(p,q);
	console.log(location);
    var marker = new google.maps.Marker({
        position: location,
        map: map
    });
} 
//}, 3000);
marker.setVisible(true);
marker.setMap(); 
}
var coords = new Array();
</script>
<?php
	$test = mysql_query("select lon,lat from pubs" , $connect);
	while($text = mysql_fetch_array($test)){
		?>
		<script>
		var i = <?php echo $text['lat']; ?>;
		coords.push(i);
		var t = <?php echo $text['lon']; ?>;
		coords.push(t);
		//console.log(coords);
		</script>
		
		<?php
	}
?>
</body>
</html>