<?php
require '../pictureswitch/includes/functions.php';
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
  else
    {
     uploadpicture($category);
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
  echo "Oops no file";
} 
//ensures code is working till this point. #change
echo "Upload page live";
?>