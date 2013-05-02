<?php
require("includes/connections.php");
?>
<!doctype html>
<html>
<head>
</head>

<body>
<?php

$sql="INSERT INTO pubs (name, street, area, postcode, photo_count, lon, lat, review_title, review_body, review_time, lager, ale, cider, garden, football, rugby, other, ambience, jukebox, size, moustaches, food)
VALUES
('$_POST[name]',
'$_POST[street]',
'$_POST[area]',
'$_POST[postcode]',
'$_POST[photo_count]',
'$_POST[lon]',
'$_POST[lat]',
'$_POST[review_title]',
'$_POST[review_body]',
'$_POST[review_time]',
'$_POST[lager]',
'$_POST[ale]',
'$_POST[cider]',
'$_POST[garden]',
'$_POST[football]',
'$_POST[rugby]',
'$_POST[othersports]',
'$_POST[ambience]',
'$_POST[jukebox]',
'$_POST[size]',
'$_POST[moustaches]',
'$_POST[garden]'
)";

$result = mysql_query($sql);

if($result){
echo "1 row inserted";
}
else {
echo mysql_error($connect);
}

?>
</body>
</html>