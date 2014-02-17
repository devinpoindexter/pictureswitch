<?php

// want to make file path random string with the id appended to end, filename stay same
require '../pictureswitch/includes/dbconnect.php';

$filename = "01616_overview_1920x1200.jpg";

$idget = "SELECT * FROM pictures ORDER BY id DESC LIMIT 1";
$iddata = mysqli_query($dbconnect, $idget) or die('error getting data');



if($row = mysqli_fetch_array($iddata, MYSQLI_ASSOC)) {
        $nextid = $row['id']+1;
    }

function generateRandomString($length) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $randomString;
}

$newfilepath = generateRandomString(7).($nextid*3);
echo $newfilepath;


?>