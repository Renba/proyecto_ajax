<?php
require_once('../../daos/personDao.php');
$status = "No se pudo eliminar la persona";
$id = $_POST['id'];
if(deletePerson($id)){
  $status = "ok";
}

echo($status);
