<?php
//TO DO
$status = "No se pudo completar correctamente la edición del indicador";
require_once("../../models/indicator_option.php");
$option = new IndicatorOption();
$option->setId($_POST["option_id"]);
$option->setOptionName($_POST["option_name"]);
$option->setIndicatorId($_POST["indicator_id"]);

require_once("../../daos/indicatorOptionsDao.php");
if(updateIndicatorOption($option)){
  $status= "ok";
}

echo($status);
