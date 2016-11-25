<?php
/**
 * Class Evaluation
 */
class Evaluation
{
  private $person_id;
  private $indicator_id;
  private $option_id;
  private $option_name;
  private $indicator_number = 0;
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

  public function getOptionName()
  {
    return $this->option_name;
  }

  public function setOptionName($option_name)
  {
    $this->option_name = $option_name;
  }

  public function getIndicatorNumber()
  {
    return $this->indicator_number;
  }

  public function setIndicatorNumber($indicator_number)
  {
    $this->indicator_number = $indicator_number;
  }


  public function toJson(){
    return array(
      'indicator_id' => $this->indicator_id,
      'option_id' => $this->option_id,
      'option_name' => $this->option_name,
      'indicator_number' => $this->indicator_number,
    );
  }


}
