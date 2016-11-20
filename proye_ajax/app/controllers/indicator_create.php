<?php
require_once('../models/indicator.php');
$indicator = new Indicator();
$status="No se pudo crear el indicador";


$indicator->setName($_POST["name"]);
$indicator->setOptions($_POST["options"]);

require_once('../daos/indicatorDao.php');

if(saveInfo($indicator)){
  $status= "ok";
}else {
  $status = "ya existe ese usuario";
}

$result = getIndicatorByName($indicator->getName());
if($result->num_rows > 0){
    $row = $result->fetch_assoc();
    $indicatorForName = new Indicator();
    $indicatorForName->setId( $row['id']);
    $indicatorForName->setName( $row['name']);
}

require_once('../daos/indicatorOptionsDao.php');
require_once('../models/indicator_option.php');

foreach($indicator->getOptions() as $option){
  saveIndicatorOption();
}


echo($status);
