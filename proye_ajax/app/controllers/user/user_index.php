<?php
require_once('../../models/user.php');
require_once('../../daos/userDao.php');
  $users = array();
  $result = getUsers();
   if ($result->num_rows > 0) {
           while ($row = $result->fetch_assoc()) {
             $user = new User();
             $user->setId($row["id"]);
             $user->setName($row["name"]);
             $user->setEmail($row["email"]);
             array_push($users, $user->toJson());
           }
           echo json_encode($users);
       } else {
         echo json_encode($users);
       }
 ?>
