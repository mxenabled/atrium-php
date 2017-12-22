<?php
class User {
  private $guid;
  private $identifier;
  private $is_disabled;
  private $metadata;

  function __construct($response) {
    $this->guid = $response['guid'];
    $this->identifier = $response['identifier'];
    $this->is_disabled = $response['is_disabled'];
    $this->metadata = $response['metadata'];
  }

  function getGuid() {
    return $this->guid;
  }

  function getIdentifier() {
    return $this->identifier;
  }

  function getIsDisabled() {
    return $this->is_disabled;
  }

  function getMetadata() {
    return $this->metadata;
  }
}
?>
