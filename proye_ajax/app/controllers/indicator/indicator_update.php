<?php
//TO DO
$status = "No se pudo completar correctamente la edición del indicador";
require_once("../../models/indicator.php");
$indicator = new Indicator();
$indicator->setId($_POST["id"]);
$indicator->setName($_POST["name"]);
require_once("../../daos/indicatorDao.php");
$result = updateIndicator($indicator);

$indicator_options = $_POST["options"];

require_once("../../daos/indicatorOptionsDao.php");
require_once("../../models/indicator_option.php");

deleteIndicatorOptions($indicator->getId());

foreach ($indicator_options as $option) {
  $indicator_option = new IndicatorOption();
  $indicator_option->setOptionName($option);
  $indicator_option->setIndicatorId($indicator->getId());
  saveIndicatorOption($indicator_option);
}

$status = "ok";

echo($status);
