<?php
//TO DO
$status = "No se pudo completar correctamente la edición del indicador";
require_once("../../models/indicator.php");
$indicator = new Indicator();
$indicator->setId($_POST["id"]);
$indicator->setName($_POST["name"]);

require_once("../../daos/indicatorDao.php");
if(updateIndicator($indicator)){
  $status= "ok";
}

echo($status);
