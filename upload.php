<html>
<link href='http://fonts.googleapis.com/css?family=Varela' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" type="text/css" href="../pictureswitch/css/home.css">
  <link rel="stylesheet" type="text/css" href="../pictureswitch/css/core.css">
<?php
require '../pictureswitch/includes/functions.php';
require '../pictureswitch/includes/dbconnect.php';
include '../pictureswitch/includes/menubar.php';
date_default_timezone_set("America/Phoenix");
$datetime = date("Y-m-d H:i:s");
$allowedExts = array("gif", "jpeg", "jpg", "png");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = strtolower(end($temp));
$category = $_POST['category'];
if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/jpg")
|| ($_FILES["file"]["type"] == "image/pjpeg")
|| ($_FILES["file"]["type"] == "image/x-png")
|| ($_FILES["file"]["type"] == "image/png"))
//max file size is set to 5mb
&& ($_FILES["file"]["size"] < 5120000)
&& in_array($extension, $allowedExts))
  {
  if ($_FILES["file"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
    }
  elseif (!preg_match("/^[a-zA-Z0-9_-]{1,40}$/",$temp[0]) OR isset($temp[2])) {
    echo "Your filename can only include numbers, letters, dashes, and underscores, and must be less than 40 characters long.";
  }
  elseif (isset($category) AND isset($_FILES["file"]["name"]))
    {
     uploadpicture($category,$extension);
    }
  }
  elseif ($_FILES["file"]["size"] >= 5120000){
    echo "File exceeds 5MB";    
  }
elseif ((strlen($extension) > 2) AND ($extension !==("jpg" OR "png" OR "jpeg" OR "gif")) )
  {
  echo "Oops! Please make sure your file is an image: .jpg .jpeg .png or .gif </br>";
  }
else {
  echo "No file selected. </br>";
} 
// set some db variables and insert record of new image into db
$path = "categories/".$category."/" .$randompath.'.'.$extension;
$filename = $_FILES["file"]["name"];
if (isset($category) AND isset($filename) AND preg_match("/^[a-zA-Z0-9_-]{1,40}$/",$temp[0]) AND !isset($temp[2])){
   $sqlinsert = "INSERT INTO pictures (filepath, filename, category, upload_date, author) VALUES ('$path', '$filename', '$category', '$datetime', 'noauthor')";
  if (!mysqli_query($dbconnect, $sqlinsert)) {
    echo "error inserting query";
  }
  else {echo "1 record inserted";}
}
else {
  echo "Please select a file and category.";
}
echo $temp[0];
?>
</html>