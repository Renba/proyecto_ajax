<?php

include_once 'connection.php';

function saveEvaluation($evaluation)
{
    $sentence_sql = "INSERT INTO evaluations (person_id, indicator_id, option_id) VALUES
        (" . $evaluation->getPersonId() . ",".$evaluation->getIndicatorId().",".$evaluation->getOptionId().");";
    return execute_query($sentence_sql);
}


function getEvaluationByPerson($person)
{
    $id = $person->getId();
    $sentence_sql = "SELECT * FROM evaluations WHERE person_id='$id';";
    $indicator = execute_query($sentence_sql);
    return $indicator;
}

//SELECT *,COUNT(option_id) FROM `evaluations` INNER JOIN indicator_options ON evaluations.option_id=indicator_options.id WHERE evaluations.indicator_id = 99 GROUP by option_id

//SELECT evaluations.indicator_id, option_id, option_name ,COUNT(option_id) as cnumber FROM `evaluations` INNER JOIN indicator_options ON evaluations.option_id=indicator_options.id WHERE evaluations.indicator_id = 99 GROUP by option_id
function getReportByIndicator($indicator_id){
  $sentence_sql = "SELECT * FROM indicator_options where indicator_id='$indicator_id'";
  $indicator = execute_query($sentence_sql);
  return $indicator;

}

function getEvaluationByIndicator($indicator)
{
    $id = $indicator->getId();
    $sentence_sql = "SELECT * FROM evaluations WHERE indicator_id='$id';";
    $indicator = execute_query($sentence_sql);
    return $indicator;
}

function getEvaluationSelectedOption($person_id, $indicator_id)
{
  $sentence_sql = "SELECT * FROM evaluations WHERE person_id='$person_id' AND indicator_id='$indicator_id';";
  $evaluation = execute_query($sentence_sql);
  return $evaluation;
}

function deleteEvaluation($person_id, $indicator_id)
{
    $sentence_sql = "DELETE FROM evaluations WHERE person_id='$person_id' AND indicator_id='$indicator_id';";
    return execute_query($sentence_sql);

}

function updateEvaluationByOption($person_id, $indicator_id, $option_id)
{
  $id = $indicator->getId();
  $name = $indicator->getName();
  $sentence_sql = "UPDATE evaluations SET option_id ='$option_id' WHERE person_id = '$id' AND indicator_id = '$indicator_id'";
  return execute_query($sentence_sql);

}

function incrementOptionTime($option_id){
  $sentence_sql = "UPDATE indicator_options SET times = times + 1 WHERE id = '$option_id'";
  return execute_query($sentence_sql);

}

function decrementOptionTime($option_id){
  $sentence_sql = "UPDATE indicator_options SET times = times - 1 WHERE id = '$option_id'";
  return execute_query($sentence_sql);
}
