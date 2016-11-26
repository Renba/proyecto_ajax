<?php
/**
 * Class User
 */
class User
{
  /**
   * @var String
   */
  private $id;
  private $email;
  private $password;
  private $name;

  /**
   * Usuario constructor.
   */
  public function __construct() {}
  /**
   * @return String
   */
  public function getId()
  {
    return $this->id;
  }

  /**
   * @param String $id
   */
  public function setId($id)
  {
    $this->id = $id;
  }

  public function getEmail()
  {
    return $this->email;
  }

  /**
   * @param String $email
   */
  public function setEmail($email)
  {
    $this->email = $email;
  }

  public function getPassword()
  {
    return $this->password;
  }

  /**
   * @param String $password
   */
  public function setPassword($password)
  {
    $this->password = $password;
  }


  public function getName()
  {
    return $this->name;
  }

  /**
   * @param String $name
   */
  public function setName($name)
  {
    $this->name = $name;
  }

  public function toJson(){
    return array(
      'id' => $this->id,
      'email' => $this->email,
      'name' => $this->name,
    );
  }



}
