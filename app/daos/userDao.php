<?php

//incluye el dao con la información de la BD:
include_once 'connection.php';


function saveInfo($user)
{
//debo encontrar otra manera de hacer este query:
    $sentence_sql = "INSERT INTO users ( email, password, name) VALUES
        ('" . $user->getEmail() . "','" . $user->getPassword() . "','" . $user->getName() . "');";

//    echo $sentence_sql;


    return execute_query($sentence_sql);

}

function getUsers()
{
    $sentence_sql = "SELECT * FROM users";
    $users = execute_query($sentence_sql);
    return $users;
}

function getUser($matricula)
{
    $sentence_sql = "SELECT * FROM users WHERE matricula='$matricula';";
    $users = execute_query($sentence_sql);
    return $users;
}

function deleteUser($matricula)
{
    //como todo es cascade, bastará con borrar desde la tabla libro:

    $sentence_sql = "DELETE FROM users WHERE matricula='$matricula';";

    execute_query($sentence_sql);

    //si hay error, lo muestra antes de llegar a true.
    return true;

}

function updateUser($user)
{
    $sentence_sql = "UPDATE users SET matricula='" . $user->getMatricula() .
        "',nombre='" . $user->getNombre() . "',correo='" . $user->getCorreo() . "',contrasena='" .
        $user->getContrasena() . "',tipo_user_id='" . $user->getTipo_user_id() . "' WHERE matricula='" .
        $user->getMatricula() . "';";

    execute_query($sentence_sql);
    header('location: ../vistas/vista-muestra_users.php');
}

function getCredentialsUser($email, $password){

  $sentence_sql = "SELECT * FROM users WHERE email='$email' AND password='$password';";
  $users = execute_query($sentence_sql);
  return $users;

}
