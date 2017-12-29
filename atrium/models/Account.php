<?php

namespace AtriumMX\models;

class Account
{
    private $apr;
    private $apy;
    private $available_balance;
    private $available_credit;
    private $balance;
    private $created_at;
    private $credit_limit;
    private $day_payment_is_due;
    private $guid;
    private $institution_code;
    private $interest_rate;
    private $is_closed;
    private $last_payment;
    private $last_payment_at;
    private $matures_on;
    private $member_guid;
    private $minimum_balance;
    private $minimum_payment;
    private $name;
    private $original_balance;
    private $payment_due_at;
    private $payoff_balance;
    private $started_on;
    private $subtype;
    private $total_account_value;
    private $type;
    private $updated_at;
    private $user_guid;

    function __construct($response)
    {
        $this->apr = $response['apr'];
        $this->apy = $response['apy'];
        $this->available_balance = $response['available_balance'];
        $this->available_credit = $response['avaialble_credit'];
        $this->balance = $response['balance'];
        $this->created_at = $response['created_at'];
        $this->credit_limit = $response['credit_limit'];
        $this->day_payment_is_due = $response['day_payment_is_due'];
        $this->guid = $response['guid'];
        $this->institution_code = $response['institution_code'];
        $this->interest_rate = $response['interest_rate'];
        $this->is_closed = $response['is_closed'];
        $this->last_payment = $response['last_payment'];
        $this->last_payment_at = $response['last_payment_at'];
        $this->matures_on = $response['matures_on'];
        $this->member_guid = $response['member_guid'];
        $this->minimum_balance = $response['minimum_balance'];
        $this->minimum_payment = $response['minimum_payment'];
        $this->name = $response['name'];
        $this->original_balance = $response['original_balance'];
        $this->payment_due_at = $response['payment_due_at'];
        $this->payoff_balance = $response['payoff_balance'];
        $this->started_on = $response['started_on'];
        $this->subtype = $response['subtype'];
        $this->total_account_value = $response['total_account_value'];
        $this->type = $response['type'];
        $this->updated_at = $response['updated_at'];
        $this->user_guid = $response['user_guid'];
    }

    function getApr()
    {
        return $this->apr;
    }

    function getApy()
    {
        return $this->apy;
    }

    function getAvailableBalance()
    {
        return $this->available_balance;
    }

    function getAvailableCredit()
    {
        return $this->available_credit;
    }

    function getBalance()
    {
        return $this->balance;
    }

    function getCreatedAt()
    {
        return $this->created_at;
    }

    function getCreditLimit()
    {
        return $this->credit_limit;
    }

    function getDayPaymentIsDue()
    {
        return $this->day_payment_is_due;
    }

    function getGuid()
    {
        return $this->guid;
    }

    function getInstitutionCode()
    {
        return $this->institution_code;
    }

    function getInterestRate()
    {
        return $this->interest_rate;
    }

    function getIsClosed()
    {
        return $this->is_closed;
    }

    function getLastPayment()
    {
        return $this->last_payment;
    }

    function getLastPaymentAt()
    {
        return $this->last_payment_at;
    }

    function getMaturesOn()
    {
        return $this->matures_on;
    }

    function getMemberGuid()
    {
        return $this->member_guid;
    }

    function getMinimumBalance()
    {
        return $this->minimum_balance;
    }

    function getMinimumPayment()
    {
        return $this->minimum_payment;
    }

    function getName()
    {
        return $this->name;
    }

    function getOriginalBalance()
    {
        return $this->original_balance;
    }

    function getPaymentDueAt()
    {
        return $this->payment_due_at;
    }

    function getPayoffBalance()
    {
        return $this->payoff_balance;
    }

    function getStartedOn()
    {
        return $this->started_on;
    }

    function getSubtype()
    {
        return $this->subtype;
    }

    function getTotalAccountValue()
    {
        return $this->total_account_value;
    }

    function getType()
    {
        return $this->type;
    }

    function getUpdatedAt()
    {
        return $this->updated_at;
    }

    function getUserGuid()
    {
        return $this->user_guid;
    }
}
