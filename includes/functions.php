<?php 
    // integer starts at 0 before counting
    function nextfilenumber() {$i = 0; 
        $dir = '../pictureswitch/uploads/';
        if ($handle = opendir($dir)) {
            while (($file = readdir($handle)) !== false){
                if (!in_array($file, array('.', '..')) && !is_dir($dir.$file)) 
                    $i++;
            }
        }
        // prints out how many were in the directory, there are 2 invisible files in the directory so we subtract 1 from the count.
        $nextfilenumb = $i-1;
        return $nextfilenumb;
    }
// This function needs to be modified. There will no longer be one uploads file, but numerous category files.
    function getExtension($id) {
        if (file_exists('../pictureswitch/uploads/'.$id."."."jpg")) {
            return ".jpg";
        }
        elseif (file_exists('../pictureswitch/uploads/'.$id."."."jpeg")) {
            return ".jpeg";
        }
        elseif (file_exists('../pictureswitch/uploads/'.$id."."."png")) {
            return ".png";
        }
        elseif (file_exists('../pictureswitch/uploads/'.$id."."."gif")) {
            return ".gif";
        }
        else {
            echo "No go";
        }
    }

    function uploadpicture($catname) {
         //displays the uploaded photo to the user. We will need to remove the static file path. #change
      echo "<img src="."'"."http://localhost:8888/sites/pictureswitch/categories/".$catname."/" . $_FILES["file"]["name"]."' width='100%' height='auto'>";
    //displays info about the file. We really only want to echo the first line eventually. #change
    echo "Upload: " . $_FILES["file"]["name"] . "<br>";
    echo "Type: " . $_FILES["file"]["type"] . "<br>";
    echo "Size: " . ($_FILES["file"]["size"] / 1000) . " kB<br>";
    echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";

    if (file_exists("categories/".$catname."/" . $_FILES["file"]["name"]))
      {
      echo $_FILES["file"]["name"] . " already exists. ";
      }
    else
      {
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "categories/".$catname."/" . $_FILES["file"]["name"]);
      echo "Stored in: " . $catname."/" . $_FILES["file"]["name"];
      }

    }
?>