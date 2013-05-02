<?php
require("includes/connections.php");
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>North London Pubs</title>
</head>

<body>

<?php

$test = mysql_query("select * from pubs" , $connect);

while($text = mysql_fetch_array($test)){
	
	echo("<h2>" . $text['name'] . "</h2>" . $text['review_body']);
	
	}


?>



</body>
</html>