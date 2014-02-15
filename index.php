<html>
<head>
  <link href='http://fonts.googleapis.com/css?family=Varela' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" type="text/css" href="../pictureswitch/css/home.css">
  <link rel="stylesheet" type="text/css" href="../pictureswitch/css/core.css">
</head>
<body>
<header>
<div id="logo"><img src="../pictureswitch/assets/pslogo1.png"></div>
</header>
<div class="section">
  <div id="centerbox">
  <h2>Upload Your Photo:</h2>
    <div id="uploadbox">
      <form action="upload.php" method="post"
      enctype="multipart/form-data">
      <input class="filebtn" type="file" name="file" id="file"><br>
      <select name="category">
          <option selected="selected" disabled="disabled">--Category--</option>
          <option value="abstract">Abstract</option>
          <option value="animals">Animals</option>
          <option value="cityscapes">Cityscapes</option>
          <option value="landscapes">Landscapes</option>
          <option value="other">Other</option>
      </select>
  
      <button class="uploadbtn" type="submit" name="submit" value="Submit">Submit</button>
      </form>
    </div>
  </div>
</div>

<?php 
    // integer starts at 0 before counting
    $i = 0; 
    $dir = '../pictureswitch/uploads/';
    if ($handle = opendir($dir)) {
        while (($file = readdir($handle)) !== false){
            if (!in_array($file, array('.', '..')) && !is_dir($dir.$file)) 
                $i++;
        }
    }
    // prints out how many were in the directory
?>
</div>
</body>
</html>
