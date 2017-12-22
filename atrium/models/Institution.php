<?php
class Institution {
  private $code;
  private $name;
  private $url;
  private $small_logo_url;
  private $medium_logo_url;

  function __construct($response) {
    $this->code = $response['code'];
    $this->name = $response['name'];
    $this->url = $response['url'];
    $this->small_logo_url = $response['small_logo_url'];
    $this->medium_logo_url = $response['medium_logo_url'];
  }

  function getCode() {
    return $this->code;
  }

  function getName() {
    return $this->name;
  }

  function getUrl() {
    return $this->url;
  }

  function getSmallLogoUrl() {
    return $this->small_logo_url;
  }

  function getMediumLogoUrl() {
    return $this->medium_logo_url;
  }
}
?>
