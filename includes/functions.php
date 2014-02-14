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
?>