<?php

include_once 'connection.php';


function saveIndicatorOption($indicatorOption)
{
    $sentence_sql = "INSERT INTO indicator_options (option_name, indicator_id) VALUES
        ('" . $indicatorOption->getOptionName() . "',". $indicatorOption->getIndicatorId() .");";
    return execute_query($sentence_sql);
}

function getIndicatorOptions($id_indicator)
{
    $sentence_sql = "SELECT * FROM indicator_options where indicator_id='$id_indicator'";
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

function deleteIndicatorOptions($indicator_id)
{
    $sentence_sql = "DELETE FROM indicator_options WHERE indicator_id='$indicator_id';";
    return execute_query($sentence_sql);

}

function updateIndicatorOption($indicator_option)
{
  $id = $indicator_option->getId();
  $option_name = $indicator_option->getOptionName();
  $sentence_sql = "UPDATE indicator_options SET option_name ='$option_name' WHERE id = '$id'";
  return execute_query($sentence_sql);

}
