<?php

include_once 'connection.php';


function saveInfo($person,$father_id,$mother_id)
{
    $sentence_sql = "INSERT INTO persons ( name, last_name, mother_last_name, father_id, mother_id) VALUES
        ('" . $person->getName() . "','" . $person->getLastName() . "','". $person->getMotherLastName() . "',"
        . $father_id . ",". $mother_id . ");";
    return execute_query($sentence_sql);
}

function getPersons()
{
    $sentence_sql = "SELECT * FROM persons";
    $persons = execute_query($sentence_sql);
    return $persons;
}

function getPerson($id)
{
    $sentence_sql = "SELECT * FROM persons WHERE id='$id';";
    $persons = execute_query($sentence_sql);
    return $persons;
}

function deletePerson($id)
{
    $sentence_sql = "DELETE FROM persons WHERE id='$id';";
    execute_query($sentence_sql);
    return true;

}

function updatePerson($person, $father_id, $mother_id)
{
  $id=$person->getId();
  $name=$person->getName();
  $last_name=$person->getLastName();
  $sentence_sql = "UPDATE persons SET name ='$name',last_name ='$last_name', father_id = $father_id, mother_id = $mother_id WHERE id = '$id'";
  return execute_query($sentence_sql);

}
