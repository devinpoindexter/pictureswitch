<html>
  <?php include '../pictureswitch/includes/head.php';?>
<body>

<div class="section">
  <div id="centerbox">
  <h2>Upload Your Photo:</h2>
    <div id="uploadbox">
      <form action="upload.php" method="post"
      enctype="multipart/form-data">
      <input class="filebtn" type="file" name="file" id="file" required><br>
      <select name="category" required>
          <option selected="selected" disabled="disabled">--Category--</option>
          <option value="abstract">Abstract</option>
          <option value="animals">Animals</option>
          <option value="cityscapes">Cityscapes</option>
          <option value="landscapes">Landscapes</option>
          <option value="people">People</option>
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
