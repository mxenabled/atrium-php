<?php

namespace AtriumMX\models;

class Credential
{
    private $field_name;
    private $guid;
    private $label;
    private $type;

    function __construct($response)
    {
        $this->field_name = $response['field_name'];
        $this->guid = $response['guid'];
        $this->label = $response['label'];
        $this->type = $response['type'];
    }

    function getFieldName()
    {
        return $this->field_name;
    }

    function getGuid()
    {
        return $this->guid;
    }

    function getLabel()
    {
        return $this->label;
    }

    function getType()
    {
        return $this->type;
    }
}
