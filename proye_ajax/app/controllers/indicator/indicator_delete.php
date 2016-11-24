<?php
require_once('../../daos/indicatorDao.php');
$status = "No se pudo eliminar el indicador";
$id = $_POST['id'];
if(deleteIndicator($id)){
  $status = "ok";
}

echo($status);
