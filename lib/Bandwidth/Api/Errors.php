<?php

namespace Bandwidth\Api;

use Bandwidth\HttpClient\HttpClient;

/**
 *  The User Errors resource lets you see information about errors that happened in your API calls and during applications callbacks. This error information can be very helpful when you're debugging an application.  Because error information can be large, and errors in the distant past are less useful than new ones, Bandwidth API limits the number of user errors it keeps. 
 *
 */
class Errors
{

    private $client;

    public function __construct(HttpClient $client)
    {
        $this->client = $client;
    }

    /**
     * Gets information about one user error
     *
     * '/users/:user_id/errors/:error_id' GET
     *
     * @param $error_id Error ID
     */
    public function show($error_id, array $options = array())
    {
        $body = (isset($options['query']) ? $options['query'] : array());

        $response = $this->client->get('/users/:user_id/errors/'.rawurlencode($error_id).'', $body, $options);

        return $response;
    }

    /**
     * Gets all the user errors for a user
     *
     * '/users/:user_id/errors' GET
     */
    public function fetch(array $options = array())
    {
        $body = (isset($options['query']) ? $options['query'] : array());

        $response = $this->client->get('/users/:user_id/errors', $body, $options);

        return $response;
    }

}
