<?php
//TO DO
$status = "No se pudo completar correctamente la edición del indicador";
require_once("../../models/indicator_option.php");
$option = new IndicatorOption();
$option->setOptionName($_POST["option_name"]);
$option->setIndicatorId($_POST["indicator_id"]);

require_once("../../daos/indicatorOptionsDao.php");
if(saveIndicatorOption($option)){
  $status= "ok";
}

echo($status);
