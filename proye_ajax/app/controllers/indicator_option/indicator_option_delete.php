<?php
//TO DO
$status = "Notok";
require_once("../../models/indicator_option.php");
$option = new IndicatorOption();
$option->setId($_POST["option_id"]);

require_once("../../daos/indicatorOptionsDao.php");
if(deleteIndicatorOption( $option->getId()) ){
  $status= "ok";
}

echo($status);
