<?php

// want to make file path random string with the id appended to end, filename stay same
require '../pictureswitch/includes/dbconnect.php';

$filename = "01616_overview_1920x1200.jpg";

$sqlget = "SELECT * FROM pictures WHERE filename ='$filename' ORDER BY RAND() LIMIT 1";
$sqldata = mysqli_query($dbconnect, $sqlget) or die('error getting data');



if($row = mysqli_fetch_array($sqldata, MYSQLI_ASSOC)) {
	if ($row['filename'] !== '') {
		$dbfilename = $row['filename'];
	}
}


function generateRandomString($length) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $randomString;
}

if (isset($dbfilename)) {
	$newfilename = generateRandomString(7);
}
else {
	$newfilename = $filename;
}

echo $newfilename;


?>