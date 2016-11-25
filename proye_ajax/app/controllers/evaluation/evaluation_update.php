<?php
require_once("../../models/evaluation.php");
require_once("../../daos/evaluationDao.php");
$status="NotOk";

$person_id=$_POST["person_id"];
$indicator_id=$_POST["indicator_id"];
$option_id=$_POST["option_id"];
$evaluation = new Evaluation();
$evaluation->setPersonId($person_id);
$evaluation->setIndicatorId($indicator_id);
$evaluation->setOptionId($option_id);

$result = getEvaluationSelectedOption($person_id, $indicator_id);
if($result->num_rows > 0){
  $row= $result->fetch_assoc();
  decrementOptionTime($row["option_id"]);
  deleteEvaluation($person_id, $indicator_id);
}

if(saveEvaluation($evaluation)){
  incrementOptionTime($option_id);
  $status="ok";
}



echo($status);
