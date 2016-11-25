<?php
$indicator_id = $_GET["indicator_id"];
$evaluations = array();
require_once("../../daos/evaluationDao.php");
require_once("../../models/indicator_option.php");
$result = getReportByIndicator($indicator_id);

if($result->num_rows > 0){
  while($row = $result->fetch_assoc()){
    $option = new IndicatorOption();
    $option->setId($row["id"]);
    $option->setOptionName($row["option_name"]);
    $option->setIndicatorId($row["indicator_id"]);
    $option->setTimes($row["times"]);
    array_push($evaluations, $option->toJson());
  }
  echo json_encode($evaluations);
}else{
  echo json_encode($evaluations);

}
