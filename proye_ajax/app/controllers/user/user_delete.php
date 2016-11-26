<?php
require_once('../../daos/userDao.php');
$status = "No se pudo eliminar al usuario";
$id = $_POST['id'];
if(deleteUser($id)){
  $status = "ok";
}

echo($status);
