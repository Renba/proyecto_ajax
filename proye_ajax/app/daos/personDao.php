<?php

include_once 'connection.php';


function saveInfo($person)
{
    $sentence_sql = "INSERT INTO persons ( name, last_name, mother_last_name) VALUES
        ('" . $person->getName() . "','" . $person->getLastName() . "','". $person->getMotherLastName() . "');";
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

function updatePerson($person)
{
    $sentence_sql = "UPDATE persons SET name='" . $person->getName() . "',last_name='" . $person->getLastName() . "',mother_last_name='" .
        $person->getMotherLastName() . "',father_id='" . $person->getFather()->getId() ."',mother_id='". $person->getMother()->getId() ."' WHERE id='" .
        $person->getId(). "';";

    execute_query($sentence_sql);
    return true;
}
