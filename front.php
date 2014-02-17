<?php
session_start();
require '../pictureswitch/includes/dbconnect.php';
include('../pictureswitch/class.login.php');

$login = new Login();

if($login->isLoggedIn()) {
  echo "<html><head> <link rel='stylesheet' type='text/css' href='../pictureswitch/css/admin.css'>";
  
  if (isset($_POST['decision'])) {
  	$decisionid = $_POST['idfield'];
  	$decisionyn = $_POST['decision'];
  	$query = "UPDATE pictures 
SET approved = '$decisionyn' 
WHERE id = '$decisionid' ";
mysqli_query($dbconnect, $query);
  }


  echo "</head><body>";
  $paths = array();
  $ids = array();
  
//find all unapproved images
  $sqlget = "SELECT * FROM pictures WHERE approved ='0' ORDER BY upload_date ";
  $sqldata = mysqli_query($dbconnect, $sqlget) or die('error getting data');

//get file paths of all unapproved images
while($row = mysqli_fetch_array($sqldata, MYSQLI_ASSOC)) {
	$id = $row['id'];
	$path = $row['filepath'];
	array_push($paths, $path);
	array_push($ids,$id);
}

$numUnApproved = count($paths);
echo "<div id='header'><h1>Photo Approval Page</h1><p>There are currently <b>".$numUnApproved."</b> unapproved images.</p></div>";
$i=0;
while ($i < $numUnApproved) {
	echo "<div class='approvalbox'><img src='".$paths[$i]."'>";
	echo "<form class='approvalform approve' method='post'
      enctype='multipart/form-data'>
      <input type='hidden' name='idfield' value='".$ids[$i]."'>
      <button type='submit' name='decision' value='2'>Approve</button>
      </form><form class='approvalform deny' method='post'
      enctype='multipart/form-data'>
       <input type='hidden' name='idfield' value='".$ids[$i]."'>
      <button type='submit' name='decision' value='1'>Deny</button>
      </form>";
	echo "</div>";
	$i++;
}





echo "</body></html>";

}
else {
  echo "404 Error, you may have encountered this page in error";
}


?>