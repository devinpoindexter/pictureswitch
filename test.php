<?php
require '../pictureswitch/includes/dbconnect.php';

$sqlget = "SELECT * FROM pictures WHERE approved ='0' ORDER BY RAND() LIMIT 1";
$sqldata = mysqli_query($dbconnect, $sqlget) or die('error getting data');

while($row = mysqli_fetch_array($sqldata, MYSQLI_ASSOC)) {
	echo $row['filepath'];
}

?>