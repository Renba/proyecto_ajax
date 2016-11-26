<?php
require_once('../../models/user.php');


$user = new User();
$status = "No se pudo guardar la informacion del Usuario" ;
$user->setName($_POST["name"]);
$user->setEmail($_POST["email"]);
$user->setPassword($_POST["password"]);


require_once('../../daos/userDao.php');
if(saveInfo($user)){
  $status= "ok";
}else{
  $status = "Ya existe una cuenta con este correo" ;
}
echo $status;
