<?php

namespace Bandwidth\Api;

use Bandwidth\HttpClient\HttpClient;

/**
 * Lets you send SMS text messages and view messages that were previously sent or received
 *
 * @param $user_id user_id of account which is doing API call
 */
class Messages
{

    private $user_id;
    private $client;

    public function __construct($user_id, HttpClient $client)
    {
        $this->user_id = $user_id;
        $this->client = $client;
    }

    /**
     * Get a list of previous messages that were sent or received
     *
     * '/users/:user_id/messages' GET
     */
    public function fetch(array $options = array())
    {
        $body = (isset($options['query']) ? $options['query'] : array());

        $response = $this->client->get('/users/'.rawurlencode($this->user_id).'/messages', $body, $options);

        return $response;
    }

    /**
     * Send text messages
     *
     * '/users/:user_id/messages' POST
     */
    public function create(array $options = array())
    {
        $body = (isset($options['body']) ? $options['body'] : array());

        $response = $this->client->post('/users/'.rawurlencode($this->user_id).'/messages', $body, $options);

        return $response;
    }

    /**
     * Get information about a message that was sent or received
     *
     * '/users/:user_id/messages/:id' GET
     *
     * @param $id message id
     */
    public function show($id, array $options = array())
    {
        $body = (isset($options['query']) ? $options['query'] : array());

        $response = $this->client->get('/users/'.rawurlencode($this->user_id).'/messages/'.rawurlencode($id).'', $body, $options);

        return $response;
    }

}
