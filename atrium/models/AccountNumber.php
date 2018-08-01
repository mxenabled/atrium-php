<?php
class AccountNumber {
  private $account_guid;
  private $account_number;
  private $guid;
  private $member_guid;
  private $routing_number;
  private $user_guid;

  function __construct($response) {
    $this->account_guid = $response['account_guid'];
    $this->account_number = $response['account_number'];
    $this->guid = $response['guid'];
    $this->member_guid = $response['member_guid'];
    $this->routing_number = $response['routing_number'];
    $this->user_guid = $response['user_guid'];
  }

  function getAccountGuid() {
    return $this->account_guid;
  }

  function getAccountNumber() {
    return $this->account_number;
  }

  function getGuid() {
    return $this->guid;
  }

  function getMemberGuid() {
    return $this->member_guid;
  }

  function getRoutingNumber() {
    return $this->routing_number;
  }

  function getUserGuid() {
    return $this->user_guid;
  }
}
?>
