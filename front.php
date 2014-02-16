<?php
session_start();
require '../pictureswitch/includes/dbconnect.php';
include('../pictureswitch/class.login.php');

$login = new Login();

if($login->isLoggedIn()) {
  echo "<html><head>";

  echo "</head><body>";
  echo "photo approval page";

  




echo "</body></html>";

}
else {
  echo "404 Error, you may have encountered this page in error";
}


?>