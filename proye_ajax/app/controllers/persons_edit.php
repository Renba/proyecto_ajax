<?php
require_once('../models/person.php');

$person = new Person();
$status = "No se pudo guardar la informacion de la persona" ;
$person->setId($_POST['id']);
$person->setName($_POST['name']);
$person->setLastName($_POST['last_name']);
$person->setMotherLastName($_POST['mother_last_name']);
$father_id = "NULL";
$mother_id = "NULL";

if($_POST['father_id'] != ""){
  $father_id = $_POST['father_id'];
}

if($_POST['mother_id'] != ""){
  $mother_id = $_POST['mother_id'] ;
}
require_once('../daos/personDao.php');

if(updatePerson($person,$father_id,$mother_id)){
  $status= "ok";
}
  echo($status);
