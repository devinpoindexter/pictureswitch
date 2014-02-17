<?php

class Login
{
  private $_id;
  private $_username;
  private $_password;
  private $_passmd5;

  private $_errors;
  private $_access;
  private $_login;
  private $_token;

  public function __construct()
  {
    $this->_errors = array();
    $this->_login  = isset($_POST['login'])? 1 : 0;
    $this->_access = 0;
    $this->_token  = $_POST['token'];

    $this->_id       = 0;
    $this->_username = ($this->_login)? $this->filter($_POST['username']) : $_SESSION['username'];
    $this->_password = ($this->_login)? $this->filter($_POST['password']) : '';
    $this->_passmd5  = ($this->_login)? md5($this->_password) : $_SESSION['password'];
  }

  public function isLoggedIn()
  {
    ($this->_login)? $this->verifyPost() : $this->verifySession();

    return $this->_access;
  }

  public function filter($var)
  {
    return preg_replace('/[^a-zA-Z0-9]/','',$var);
  }

  public function verifyPost()
  {
    try
    {
      if(!$this->isTokenValid())
         throw new Exception('Invalid Form Submission');

      if(!$this->isDataValid())
         throw new Exception('Invalid Form Data');

      if(!$this->verifyDatabase())
         throw new Exception('Invalid Username/Password');

    $this->_access = 1;
    $this->registerSession();
    }
    catch(Exception $e)
    {
      $this->_errors[] = $e->getMessage();
    }
  }

  public function verifySession()
  {
    if($this->sessionExist() && $this->verifyDatabase())
       $this->_access = 1;
  }

  public function verifyDatabase()
  {
    //Database Connection Data
    mysql_connect("localhost", "dbuser", "dbpass") or die(mysql_error());
    mysql_select_db("pictureswitch") or die(mysql_error());

    $data = mysql_query("SELECT userid FROM users WHERE username = '{$this->_username}' AND password = '{$this->_passmd5}'");

    if(mysql_num_rows($data))
      {
        list($this->_id) = @array_values(mysql_fetch_assoc($data));
        return true;
      }
    else
      { return false; }
  }
// ensures that both username and password have between 5 and 12 chars and are a-z, A-Z, or 0-9
  public function isDataValid()
  {
    return (preg_match('/^[a-zA-Z0-9]{5,12}$/',$this->_username) && preg_match('/^[a-zA-Z0-9]{5,12}$/',$this->_password))? 1 : 0;
  }

  public function isTokenValid()
  {
    return (!isset($_SESSION['token']) || $this->_token != $_SESSION['token'])? 0 : 1;
  }

  public function registerSession()
  {
    $_SESSION['userid'] = $this->_uid;
    $_SESSION['username'] = $this->_username;
    $_SESSION['password'] = $this->_passmd5;
  }

  public function sessionExist()
  {
    return (isset($_SESSION['username']) && isset($_SESSION['password']))? 1 : 0;
  }

  public function showErrors()
  {
    echo "<h3>Errors</h3>";

    foreach($this->_errors as $key=>$value)
      echo $value."<br>";
  }
}

?>