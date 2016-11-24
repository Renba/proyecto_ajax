<?php
/**
 * Class Evaluation
 */
class Evaluation
{
  private $person_id;
  private $indicator_id;
  private $option_id;
  /**
   * Usuario constructor.
   */
  public function __construct() {}
  /**
   * @return $id
   */
  public function getPersonId()
  {
    return $this->person_id;
  }

  /**
   * @param $id
   */
  public function setPersonId($person_id)
  {
    $this->person_id = $person_id;
  }

  public function getIndicatorId()
  {
    return $this->indicator_id;
  }

  /**
   * @param $name
   */
  public function setIndicatorId($indicator_id)
  {
    $this->indicator_id = $indicator_id;
  }

  public function getOptionId()
  {
    return $this->option_id;
  }

  public function setOptionId($option_id)
  {
    $this->option_id = $option_id;
  }

}
