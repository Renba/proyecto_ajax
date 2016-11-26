<?php
require_once('../../models/user.php');

$user = new User();
$status = "No se pudo guardar la informacion de la persona" ;
$user->setId($_POST['id']);
$user->setName($_POST['name']);
$user->setEmail($_POST['email']);
$user->setPassword($_POST['password']);

require_once('../../daos/userDao.php');

if(updateUser($user)){
  $status= "ok";
}
echo($status);
