<?php
class Challenge {
  private $field_name;
  private $guid;
  private $label;
  private $type;
  private $image_data;
  private $options;

  function __construct($response) {
    $this->field_name = $response['field_name'];
    $this->guid = $response['guid'];
    $this->label = $response['label'];
    $this->type = $response['type'];
    $this->image_data = $response['image_data'];
    $this->options = $response['options'];
  }

  function getFieldName() {
    return $this->field_name;
  }

  function getGuid() {
    return $this->guid;
  }

  function getLabel() {
    return $this->label;
  }

  function getType() {
    return $this->type;
  }

  function getImageData() {
    return $this->image_data;
  }

  function getOptions() {
    return $this->options;
  }
}
?>
