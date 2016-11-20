<?php

include_once 'connection.php';


function saveIndicatorOption($indicatorOption)
{
    $sentence_sql = "INSERT INTO indicator_options (name, indicator_id) VALUES
        ('" . $indicatorOption->getOptionName() . "',". $indicatorOption->getIndicatorId() .");";
    return execute_query($sentence_sql);
}

function getIndicatorOptions($id_metric)
{
    $sentence_sql = "SELECT * FROM indicator_options where indicator_id='$id_metric'";
    $result = execute_query($sentence_sql);
    return $result;
}

function getIndicatorOption($id)
{
    $sentence_sql = "SELECT * FROM indicator_options WHERE id='$id';";
    $persons = execute_query($sentence_sql);
    return $persons;
}

function deleteIndicatorOption($id)
{
    $sentence_sql = "DELETE FROM indicator_options WHERE id='$id';";
    return execute_query($sentence_sql);

}

function updateIndicatorOption($person)
{
  $id = $person->getId();
  $name = $person->getName();
  $last_name = $person->getLastName();
  $mother_last_name = $person->getMotherLastName();
  $sentence_sql = "UPDATE indicator_options SET name ='$name' WHERE id = '$id'";
  return execute_query($sentence_sql);

}
