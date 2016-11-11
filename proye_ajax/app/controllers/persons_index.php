<?php
require_once('../models/person.php');
require_once('../daos/personDao.php');
  $persons = array();
   $result = getPersons();


   if ($result->num_rows > 0) {
           while ($row = $result->fetch_assoc()) {

               $person = new Person();

               $person->setId($row["id"]);
               $person->setName($row["name"]);
               $person->setLastName($row["last_name"]);
               $person->setMotherLastName($row["mother_last_name"]);
               array_push($persons, $person->toJsonComplete());

           }
           echo json_encode($persons);
       } else {
         echo json_encode($persons);

       }








 ?>
