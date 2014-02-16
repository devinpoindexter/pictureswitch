<?php
session_start();

if(isset($_POST['login']))
{
  include('../pictureswitch/class.login.php');

  $login = new Login();

  if($login->isLoggedIn())
     header('location: ../pictureswitch/front.php');
  else
    $login->showErrors();

}
$token = $_SESSION['token'] = md5(uniqid(mt_rand(),true));
?>
<form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
<table>
 <tr><td>Username:</td><td><input type="text" name="username" /></td></tr>
 <tr><td>Password:</td><td><input type="password" name="password" /></td></tr>
</table>
<input type="hidden" name="token" value="<?php echo $token;?>" />
<input type="submit" name="login" value="Log In" />
</form>