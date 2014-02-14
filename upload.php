<?php
$allowedExts = array("gif", "jpeg", "jpg", "png");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);
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
      //displays the uploaded photo to the user. We will need to remove the static file path. #change
      echo "<img src="."'"."http://localhost:8888/sites/pictureswitch/uploads/" . $_FILES["file"]["name"]."' width='100%' height='auto'>";
    //displays info about the file. We really only want to echo the first line eventually. #change
    echo "Upload: " . $_FILES["file"]["name"] . "<br>";
    echo "Type: " . $_FILES["file"]["type"] . "<br>";
    echo "Size: " . ($_FILES["file"]["size"] / 5120) . " kB<br>";
    echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";

    if (file_exists("uploads/" . $_FILES["file"]["name"]))
      {
      echo $_FILES["file"]["name"] . " already exists. ";
      }
    else
      {
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "uploads/" . $_FILES["file"]["name"]);
      echo "Stored in: " . "uploads/" . $_FILES["file"]["name"];
      }
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