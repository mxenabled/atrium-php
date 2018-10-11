<?php
class Transaction {
  private $account_guid;
  private $amount;
  private $category;
  private $check_number;
  private $created_at;
  private $date;
  private $description;
  private $guid;
  private $id;
  private $is_bill_pay;
  private $is_direct_deposit;
  private $is_expense;
  private $is_fee;
  private $is_income;
  private $is_overdraft_fee;
  private $is_payroll_advance;
  private $latitude;
  private $longitude;
  private $member_guid;
  private $memo;
  private $merchant_category_code;
  private $original_description;
  private $posted_at;
  private $status;
  private $top_level_category;
  private $transacted_at;
  private $type;
  private $updated_at;
  private $user_guid;

  function __construct($response) {
    $this->account_guid = $response['account_guid'];
    $this->amount = $response['amount'];
    $this->category = $response['category'];
    $this->check_number = $response['check_number'];
    $this->created_at = $response['created_at'];
    $this->date = $response['date'];
    $this->description = $response['description'];
    $this->guid = $response['guid'];
    $this->id = $response['id'];
    $this->is_bill_pay = $response['is_bill_pay'];
    $this->is_direct_deposit = $response['is_direct_deposit'];
    $this->is_expense = $response['is_expense'];
    $this->is_fee = $response['is_fee'];
    $this->is_income = $response['is_income'];
    $this->is_overdraft_fee = $response['is_overdraft_fee'];
    $this->is_payroll_advance = $response['is_payroll_advance'];
    $this->latitude = $response['latitude'];
    $this->longitude = $response['longitude'];
    $this->member_guid = $response['member_guid'];
    $this->memo = $response['memo'];
    $this->merchant_category_code = $response['merchant_category_code'];
    $this->original_description = $response['original_description'];
    $this->posted_at = $response['posted_at'];
    $this->status = $response['status'];
    $this->top_level_category = $response['top_level_category'];
    $this->transacted_at = $response['transacted_at'];
    $this->type = $response['type'];
    $this->updated_at = $response['updated_at'];
    $this->user_guid = $response['user_guid'];
  }

  function getAccountGuid() {
    return $this->account_guid;
  }

  function getAmount() {
    return $this->amount;
  }

  function getCategory() {
    return $this->category;
  }

  function getCheckNumber() {
    return $this->check_number;
  }

  function getCreatedAt() {
    return $this->created_at;
  }

  function getDate() {
    return $this->date;
  }

  function getDescription() {
    return $this->description;
  }

  function getGuid() {
    return $this->guid;
  }

  function getId() {
    return $this->id;
  }

  function getIsBillPay() {
    return $this->is_bill_pay;
  }

  function getIsDirectDeposit() {
    return $this->is_direct_deposit;
  }

  function getIsExpense() {
    return $this->is_expense;
  }

  function getIsFee() {
    return $this->is_fee;
  }

  function getIsIncome() {
    return $this->is_income;
  }

  function getIsOverdraftFee() {
    return $this->is_overdraft_fee;
  }

  function getIsPayrollAdvance() {
    return $this->is_payroll_advance;
  }

  function getLatitude() {
    return $this->latitude;
  }

  function getLongitude() {
    return $this->longitude;
  }

  function getMemberGuid() {
    return $this->member_guid;
  }

  function getMemo() {
    return $this->memo;
  }

  function getMerchantCategoryCode() {
    return $this->merchant_category_code;
  }

  function getOriginalDescription() {
    return $this->original_description;
  }

  function getPostedAt() {
    return $this->posted_at;
  }

  function getStatus() {
    return $this->status;
  }

  function getTopLevelCategory() {
    return $this->top_level_category;
  }

  function getTransactedAt() {
    return $this->transacted_at;
  }

  function getType() {
    return $this->type;
  }

  function getUpdatedAt() {
    return $this->updated_at;
  }

  function getUserGuid() {
    return $this->user_guid;
  }
}
?>
