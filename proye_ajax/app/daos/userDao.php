<?php

//incluye el dao con la información de la BD:
include_once 'connection.php';


function saveInfo($user)
{
    $sentence_sql = "INSERT INTO users ( email, password, name) VALUES
        ('" . $user->getEmail() . "','" . $user->getPassword() . "','" . $user->getName() . "');";
    return execute_query($sentence_sql);
}

function getUsers()
{
    $sentence_sql = "SELECT * FROM users";
    $users = execute_query($sentence_sql);
    return $users;
}

function getUser($id)
{
    $sentence_sql = "SELECT * FROM users WHERE id='$id';";
    $users = execute_query($sentence_sql);
    return $users;
}

function deleteUser($id)
{
    $sentence_sql = "DELETE FROM users WHERE id='$id';";
    return execute_query($sentence_sql);
}

function updateUser($user)
{
  $id = $user->getId();
  $name = $user->getName();
  $email = $user->getEmail();
  $password = $user->getPassword();
  $sentence_sql = "UPDATE users SET name ='$name', email ='$email',password = '$password' WHERE id = '$id'";
  return execute_query($sentence_sql);
}

function getCredentialsUser($email, $password){

  $sentence_sql = "SELECT * FROM users WHERE email='$email' AND password='$password';";
  $users = execute_query($sentence_sql);
  return $users;

}
