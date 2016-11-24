<?php
require_once('../../models/person.php');
require_once('../../daos/personDao.php');
  $persons = array();
   $result = getPersons();


   if ($result->num_rows > 0) {
           while ($row = $result->fetch_assoc()) {

               $person = new Person();

               $person->setId($row["id"]);
               $person->setName($row["name"]);
               $person->setLastName($row["last_name"]);
               $person->setMotherLastName($row["mother_last_name"]);
               if($row["father_id"] == ""){
                 $person->setFather($row["father_id"]);
               }else{
                 $result_father = getPerson($row["father_id"]);
                 $row_father = mysqli_fetch_assoc($result_father);
                 $father=new Person();
                 $father->setId($row["father_id"]);
                 $father->setName($row_father['name'].' '. $row_father['last_name']);
                 $person->setFather($father);
               }
               if($row["mother_id"] == ""){
                 $person->setMother($row["mother_id"]);
               }else{
                 $result_mother = getPerson($row["mother_id"]);
                 $row_mother = mysqli_fetch_assoc($result_mother);
                 $mother=new Person();
                 $mother->setId($row["mother_id"]);
                 $mother->setName($row_mother['name'] .' '.$row_mother['last_name']);
                 $person->setMother($mother);
               }
               array_push($persons, $person->toJsonComplete());

           }
           echo json_encode($persons);
       } else {
         echo json_encode($persons);

       }
 ?>
