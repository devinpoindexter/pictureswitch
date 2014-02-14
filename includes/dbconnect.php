<?php
DEFINE ('DB_USER', 'dbuser');
DEFINE ('DB_PSWD', 'dbpass');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'pictureswitch');

$dbconnect = mysql_connect(DB_HOST, DB_USER, DB_PSWD);

if (!$dbconnect) {
	die('error connecting to db');
}

else {
	echo "you have connected successfully";
}
?>