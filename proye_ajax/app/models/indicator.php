<?php
/**
 * Class Indicator
 */
class Indicator
{
  /**
   * @var String
   */
  private $id;
  private $name;
  private $options;
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

  /**
   * @param String $name
   */
  public function setName($name)
  {
    $this->name = $name;
  }

  public function getOptions()
  {
    return $this->options;
  }

  public function setOptions($options)
  {
    $this->options = $options;
  }

}
