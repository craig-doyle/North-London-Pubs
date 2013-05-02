<?php
require('constants.php');

$connect = mysql_connect(SERVER, USERNAME, PASSWORD);

$select_db = mysql_select_db(DATABASE, $connect);

?>