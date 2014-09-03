<?php

namespace Bandwidth\Api;

use Bandwidth\HttpClient\HttpClient;

/**
 * The Available Numbers resource lets you search for numbers that are available for use with your application.
 *
 */
class AvailableNumbers
{

    private $client;

    public function __construct(HttpClient $client)
    {
        $this->client = $client;
    }

    /**
     * Search and available local number that we can buy
     *
     * '/availableNumbers/local' GET
     *
     */
    public function searchLocal(array $options = array())
    {
        $body = (isset($options['query']) ? $options['query'] : array());

        $response = $this->client->get('/availableNumbers/local', $body, $options);

        return $response;
    }

    /**
     * Search and order available local numbers
     *
     * '/availableNumbers/local' POST
     *
     */
    public function createLocal(array $options = array())
    {
        $body = (isset($options['body']) ? $options['body'] : array());

        $response = $this->client->post('/availableNumbers/local', $body, $options);

        return $response;
    }

    /**
     * Search for available toll free numbers
     *
     * '/availableNumbers/tollFree' GET
     */
    public function searchTollFree(array $options = array())
    {
        $body = (isset($options['query']) ? $options['query'] : array());

        $response = $this->client->get('/availableNumbers/tollFree', $body, $options);

        return $response;
    }

    /**
     * Search and order available toll free numbers
     *
     * '/availableNumbers/tollFree' POST
     */
    public function createTollFree(array $options = array())
    {
        $body = (isset($options['body']) ? $options['body'] : array());

        $response = $this->client->post('/availableNumbers/tollFree', $body, $options);

        return $response;
    }

}
