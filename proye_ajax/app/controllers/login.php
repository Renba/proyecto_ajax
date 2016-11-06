<?php
session_start();
header("Content-Type:text/plain");
$_SESSION["valid"] = false;
$_SESSION["email"] = "";

$user_email=$_POST['email'];
$password=$_POST['password'];
echo($user_email);
echo($password);

require_once('../daos/userDao.php');
$result=getCredentialsUser($user_email, $password);
$status = "";
if($status == ""){
  if(true){
    $_SESSION["valid"] = true;
    $_SESSION["email"] = $user_email;

    $status = "";
  }else{
      $status = "no existe el usuario con ese usuario y contraseña";
  }
echo($status);
}
?>
