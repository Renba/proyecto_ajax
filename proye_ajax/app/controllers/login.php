<?php
session_start();
$_SESSION["valid"] = false;
$_SESSION["email"] = "";

require_once('../daos/userDao.php');
$user_email=$_POST['email'];
$password=$_POST['password'];
$status = "";
if($status == ""){
  $result = getCredentialsUser($user_email, $password);
  if($result->num_rows > 0){
    $_SESSION["valid"] = true;
    $_SESSION["email"] = $user_email;
    $status = "ok";
  }else{
      $status = "no existe el usuario con ese usuario y contraseña";
  }
  echo($status);
}
?>
