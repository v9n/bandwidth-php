<?php

namespace Bandwidth\Api;

use Bandwidth\HttpClient\HttpClient;

/**
 * The Calls resource lets you make phone calls and view information about previous inbound and outbound calls.
 *
 * @param $user_id user_id of account which is doing API call
 */
class Calls
{

    private $user_id;
    private $client;

    public function __construct($user_id, HttpClient $client)
    {
        $this->user_id = $user_id;
        $this->client = $client;
    }

    /**
     * Play an audio or speak a sentence in a call
     *
     * '/users/:user_id/calls/:call_id/audio' POST
     *
     * @param $call_id call id
     */
    public function audio($call_id, array $options = array())
    {
        $body = (isset($options['body']) ? $options['body'] : array());

        $response = $this->client->post('/users/'.rawurlencode($this->user_id).'/calls/'.rawurlencode($call_id).'/audio', $body, $options);

        return $response;
    }

    /**
     * Gather the DTMF digits pressed by the user.
     *
     * '/users/:user_id/calls/:call_id/gather' POST
     *
     * @param $call_id call id
     */
    public function createGather($call_id, array $options = array())
    {
        $body = (isset($options['body']) ? $options['body'] : array());

        $response = $this->client->post('/users/'.rawurlencode($this->user_id).'/calls/'.rawurlencode($call_id).'/gather', $body, $options);

        return $response;
    }

    /**
     * Gets a list of active and historic calls you made or received
     *
     * '/users/:user_id/calls' GET
     */
    public function fetch(array $options = array())
    {
        $body = (isset($options['query']) ? $options['query'] : array());

        $response = $this->client->get('/users/'.rawurlencode($this->user_id).'/calls', $body, $options);

        return $response;
    }

    /**
     * Makes a phone call.
     *
     * '/users/:user_id/calls' POST
     *
     * @param $to number which we call to
     * @param $from number which we call from
     */
    public function create($to, $from, array $options = array())
    {
        $body = (isset($options['body']) ? $options['body'] : array());
        $body['to'] = $to;
        $body['from'] = $from;

        $response = $this->client->post('/users/'.rawurlencode($this->user_id).'/calls', $body, $options);

        return $response;
    }

    /**
     * Gets information about an active or completed call. No query parameters are supported
     *
     * '/users/:user_id/calls/:call_id' GET
     *
     * @param $call_id call id
     */
    public function show($call_id, array $options = array())
    {
        $body = (isset($options['query']) ? $options['query'] : array());

        $response = $this->client->get('/users/'.rawurlencode($this->user_id).'/calls/'.rawurlencode($call_id).'', $body, $options);

        return $response;
    }

    /**
     * Changes properties of an active phone call
     *
     * '/users/:user_id/calls/:call_id' POST
     *
     * @param $call_id call id
     */
    public function update($call_id, array $options = array())
    {
        $body = (isset($options['body']) ? $options['body'] : array());

        $response = $this->client->post('/users/'.rawurlencode($this->user_id).'/calls/'.rawurlencode($call_id).'', $body, $options);

        return $response;
    }

    /**
     * Send DTMF to a call
     *
     * '/users/:user_id/calls/:call_id/dtmf' POST
     *
     * @param $call_id call id
     */
    public function dtmf($call_id, array $options = array())
    {
        $body = (isset($options['body']) ? $options['body'] : array());

        $response = $this->client->post('/users/'.rawurlencode($this->user_id).'/calls/'.rawurlencode($call_id).'/dtmf', $body, $options);

        return $response;
    }

    /**
     * Retrieve all recordings related to the call
     *
     * '/users/:user_id/calls/:call_id/recordings' GET
     *
     * @param $call_id call id
     */
    public function recordings($call_id, array $options = array())
    {
        $body = (isset($options['query']) ? $options['query'] : array());

        $response = $this->client->get('/users/'.rawurlencode($this->user_id).'/calls/'.rawurlencode($call_id).'/recordings', $body, $options);

        return $response;
    }

    /**
     * Get the gather DTMF parameters and results
     *
     * '/users/:user_id/calls/:call_id/gather/:gather_id' GET
     *
     * @param $call_id call id
     * @param $gather_id gather id
     */
    public function gather($call_id, $gather_id, array $options = array())
    {
        $body = (isset($options['query']) ? $options['query'] : array());

        $response = $this->client->get('/users/'.rawurlencode($this->user_id).'/calls/'.rawurlencode($call_id).'/gather/'.rawurlencode($gather_id).'', $body, $options);

        return $response;
    }

    /**
     * Update the gather DTMF (Stop Gather)
     *
     * '/users/:user_id/calls/:call_id/gather/:gather_id' POST
     *
     * @param $call_id call id
     * @param $gather_id gather id
     */
    public function updateGather($call_id, $gather_id, array $options = array())
    {
        $body = (isset($options['body']) ? $options['body'] : array());

        $response = $this->client->post('/users/'.rawurlencode($this->user_id).'/calls/'.rawurlencode($call_id).'/gather/'.rawurlencode($gather_id).'', $body, $options);

        return $response;
    }

}
