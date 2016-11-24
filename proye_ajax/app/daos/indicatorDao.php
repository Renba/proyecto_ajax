<?php

include_once 'connection.php';


function saveInfo($indicator)
{
    $sentence_sql = "INSERT INTO indicators (name) VALUES
        ('" . $indicator->getName() . "');";
    return execute_query($sentence_sql);
}

function getIndicators()
{
    $sentence_sql = "SELECT * FROM indicators";
    $result = execute_query($sentence_sql);
    return $result;
}

function getIndicator($id)
{
    $sentence_sql = "SELECT * FROM indicators WHERE id='$id';";
    $indicator = execute_query($sentence_sql);
    return $indicator;
}

function getIndicatorByName($name)
{
    $sentence_sql = "SELECT * FROM indicators WHERE name='$name';";
    $indicator = execute_query($sentence_sql);
    return $indicator;
}

function deleteIndicator($id)
{
    $sentence_sql = "DELETE FROM indicators WHERE id='$id';";
    return execute_query($sentence_sql);

}

function updateIndicator($indicator)
{
  $id = $indicator->getId();
  $name = $indicator->getName();
  $sentence_sql = "UPDATE indicators SET name ='$name' WHERE id = '$id'";
  return execute_query($sentence_sql);

}
