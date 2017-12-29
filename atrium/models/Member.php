<?php

namespace AtriumMX\models;

class Member
{
    private $aggregated_at;
    private $guid;
    private $identifier;
    private $institution_code;
    private $is_being_aggregated;
    private $metadata;
    private $name;
    private $status;
    private $successfully_aggregated_at;
    private $user_guid;
    private $challenges;
    private $has_processed_accounts;
    private $has_processed_transactions;

    function __construct($response)
    {
        if (array_key_exists('aggregated_at', $response)) {
            $this->aggregated_at = $response['aggregated_at'];
        }
        if (array_key_exists('aggregated_at', $response)) {
            $this->aggregated_at = $response['aggregated_at'];
        }
        if (array_key_exists('guid', $response)) {
            $this->guid = $response['guid'];
        }
        if (array_key_exists('identifier', $response)) {
            $this->identifier = $response['identifier'];
        }
        if (array_key_exists('institution_code', $response)) {
            $this->institution_code = $response['institution_code'];
        }
        if (array_key_exists('is_being_aggregated', $response)) {
            $this->is_being_aggregated = $response['is_being_aggregated'];
        }
        if (array_key_exists('metadata', $response)) {
            $this->metadata = $response['metadata'];
        }
        if (array_key_exists('name', $response)) {
            $this->name = $response['name'];
        }
        if (array_key_exists('status', $response)) {
            $this->status = $response['status'];
        }
        if (array_key_exists('successfully_aggregated_at', $response)) {
            $this->successfully_aggregated_at
                = $response['successfully_aggregated_at'];
        }
        if (array_key_exists('user_guid', $response)) {
            $this->user_guid = $response['user_guid'];
        }
        if (array_key_exists('challenges', $response)) {
            $this->challenges = $response['challenges'];
        }
        if (array_key_exists('has_processed_accounts', $response)) {
            $this->challenges = $response['has_processed_accounts'];
        }
        if (array_key_exists('has_processed_transactions', $response)) {
            $this->challenges = $response['has_processed_transactions'];
        }
    }

    function getAggregatedAt()
    {
        return $this->aggregated_at;
    }

    function getGuid()
    {
        return $this->guid;
    }

    function getIdentifier()
    {
        return $this->identifier;
    }

    function getInstitutionCode()
    {
        return $this->institution_code;
    }

    function getIsBeingAggregatedAt()
    {
        return $this->is_being_aggregated;
    }

    function getMetadata()
    {
        return $this->metadata;
    }

    function getName()
    {
        return $this->name;
    }

    function getStatus()
    {
        return $this->status;
    }

    function getSuccessfullyAggregatedAt()
    {
        return $this->successfully_aggregated_at;
    }

    function getUserGuid()
    {
        return $this->user_guid;
    }

    function getChallenges()
    {
        return $this->challenges;
    }

    function getHasProcessedAccounts()
    {
        return $this->has_processed_accounts;
    }

    function getHasProcessedTransactions()
    {
        return $this->has_processed_transactions;
    }
}

