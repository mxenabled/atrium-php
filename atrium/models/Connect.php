<?php

namespace AtriumMX\models;

class Connect
{
    private $connect_widget_url;
    private $guid;

    function __construct($response)
    {
        $this->connect_widget_url = $response['connect_widget_url'];
        $this->guid = $response['guid'];
    }

    function getConnectWidgetUrl()
    {
        return $this->connect_widget_url;
    }

    function getGuid()
    {
        return $this->guid;
    }
}

