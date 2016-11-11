<?php
/**
 * Class User
 */
class Person
{
  /**
   * @var String
   */
  private $id;
  private $name;
  private $last_name;
  private $mother_last_name;
  private $father;
  private $mother;

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

  public function getName()
  {
    return $this->name;
  }

  public function setName($name)
  {
    $this->name = $name;
  }

  public function getLastName()
  {
    return $this->last_name;
  }

  public function setLastName($last_name)
  {
    $this->last_name = $last_name;
  }

  public function getMotherLastName()
  {
    return $this->mother_last_name;
  }

  public function setMotherLastName($mother_last_name)
  {
    $this->mother_last_name = $mother_last_name;
  }

  public function getFather()
  {
    return $this->father;
  }

  public function setFather($father)
  {
    $this->father = $father;
  }

  public function getMother()
  {
    return $this->mother;
  }

  public function setMother($mother)
  {
    $this->mother = $mother;
  }

  public function fatherToJson()
   {
       return array(
            'id' => $this->id,
            'name' => $this->name,
            'last_name' => $this->last_name,
            'mother_last_name' => $this->mother_last_name,
       );
   }

   public function toJsonComplete(){
     return array(
       'id' => $this->id,
       'name' => $this->name,
       'last_name' => $this->last_name,
       'mother_last_name' => $this->mother_last_name,
       'father' => $this->toJson(),
     );
   }

}
