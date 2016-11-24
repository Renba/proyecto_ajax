<?php

include_once 'connection.php';

//SELECT id, count(indicator_id) FROM indicator_options GROUP by indicator_id
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
