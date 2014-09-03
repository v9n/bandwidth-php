<?php

namespace Bandwidth\Api;

use Bandwidth\HttpClient\HttpClient;

/**
 * CNAM is an acronym which stands for Caller ID Name. CNAM can be used to display the calling party's name alongside the phone number, to help users easily identify a caller. CNAM API allows the user to get the CNAM information of a particular number
 *
 * @param $number phone number to get the info
 */
class NumberInfo
{

    private $number;
    private $client;

    public function __construct($number, HttpClient $client)
    {
        $this->number = $number;
        $this->client = $client;
    }

    /**
     * Get the CNAM of the number
     *
     * '/phoneNumbers/numberInfo/:number' GET
     */
    public function show(array $options = array())
    {
        $body = (isset($options['query']) ? $options['query'] : array());

        $response = $this->client->get('/phoneNumbers/numberInfo/'.rawurlencode($this->number).'', $body, $options);

        return $response;
    }

}
