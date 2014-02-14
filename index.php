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
      <button class="uploadbtn" type="submit" name="submit" value="Submit">Submit</button>
      </form>
    </div>
  </div>
</div>
</body>
</html>
