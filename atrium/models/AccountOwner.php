<?php
class AccountOwner {
  private $address;
  private $account_guid;
  private $city;
  private $country;
  private $email;
  private $guid;
  private $member_guid;
  private $owner_name;
  private $phone;
  private $postal_code;
  private $state;
  private $user_guid;

  function __construct($response) {
    $this->address = $response['address'];
    $this->account_guid = $response['account_guid'];
    $this->city = $response['city'];
    $this->country = $response['country'];
    $this->email = $response['email'];
    $this->guid = $response['guid'];
    $this->member_guid = $response['member_guid'];
    $this->owner_name = $response['owner_name'];
    $this->phone = $response['phone'];
    $this->postal_code = $response['postal_code'];
    $this->state = $response['state'];
    $this->user_guid = $response['user_guid'];
  }

  function getAddress() {
    return $this->address;
  }

  function getAccountGuid() {
    return $this->account_guid;
  }

  function getCity() {
    return $this->city;
  }

  function getCountry() {
    return $this->country;
  }

  function getEmail() {
    return $this->email;
  }

  function getGuid() {
    return $this->guid;
  }

  function getMemberGuid() {
    return $this->member_guid;
  }

  function getOwnerName() {
    return $this->owner_name;
  }

  function getPhone() {
    return $this->phone;
  }

  function getPostalCode() {
    return $this->postal_code;
  }

  function getState() {
    return $this->state;
  }

  function getUserGuid() {
    return $this->user_guid;
  }
}
?>
