<?php
DEFINE ('DB_USER', 'dbuser');
DEFINE ('DB_PSWD', 'dbpass');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'pictureswitch');

$dbconnect = mysqli_connect(DB_HOST, DB_USER, DB_PSWD, DB_NAME);


?>