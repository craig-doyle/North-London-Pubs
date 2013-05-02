<?php
require("includes/connections.php");
?>
<?php

$user_long = $_POST[newLng];
$user_lat = $_POST[newLat];

$sql="select name, lat, lon, SQRT((" . $user_lat . " - lat) * (" . $user_lat . " - lat)
 + (" . $user_long . " - lon) * (" . $user_long . " - lon)) 
as distance
from pubs
order by distance asc";

$result = mysql_query($sql);

if($result){
	
	while ($row = mysql_fetch_assoc($result)) {
    $json[] = $row;
	}

	echo json_encode($json);
	
	
//	$row = mysql_fetch_assoc($result);
//	while ($row = mysql_fetch_assoc($result -1)){
//	echo json_encode($row);
// }

}
else {
echo mysql_error($connect);
}

?>
