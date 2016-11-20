<?php
/**
 * Class Indicator
 */
class IndicatorOption
{
  private $id;
  private $option_name;
  private $indicator_id;
  /**
   * Usuario constructor.
   */
  public function __construct() {}
  /**
   * @return $id
   */
  public function getId()
  {
    return $this->id;
  }

  /**
   * @param $id
   */
  public function setId($id)
  {
    $this->id = $id;
  }

  public function getOptionName()
  {
    return $this->option_name;
  }

  /**
   * @param $name
   */
  public function setOptionName($option_name)
  {
    $this->option_name = $option_name;
  }

  public function getIndicatorId()
  {
    return $this->options;
  }

  public function setIndicatorId($options)
  {
    $this->options = $options;
  }

}
