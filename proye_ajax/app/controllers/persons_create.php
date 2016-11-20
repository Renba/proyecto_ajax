<?php
require_once('../models/person.php');


$person = new Person();
$status = "No se pudo guardar la informacion de la persona" ;


$person->setName($_POST['name']);
$person->setLastName($_POST['last_name']);
$person->setMotherLastName($_POST['mother_last_name']);
$father_id = "NULL";
$mother_id = "NULL";


require_once('../daos/personDao.php');

if($_POST['father_id'] != ""){
  $father_id = $_POST['father_id'];
}

if($_POST['mother_id'] != ""){
  $mother_id = $_POST['mother_id'] ;
}

if(saveInfo($person,$father_id,$mother_id)){
  $status= "ok";
}
$conn = getConnection();
$last_id = $conn->insert_id;
echo 'LAST_INSERT_ID: '.$last_id;
