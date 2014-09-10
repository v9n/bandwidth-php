<?php

namespace Bandwidth\Api;

use Bandwidth\HttpClient\HttpClient;

/**
 * Bridges resource. Bridge two calls allowing two way audio between them.
 *
 * @param $user_id user_id of account which is doing API call
 */
class Bridges
{

    private $user_id;
    private $client;

    public function __construct($user_id, HttpClient $client)
    {
        $this->user_id = $user_id;
        $this->client = $client;
    }

    /**
     * Create a bridge
     *
     * '/users/:user_id/bridges' POST
     *
     */
    public function create(array $options = array())
    {
        $body = (isset($options['body']) ? $options['body'] : array());

        $response = $this->client->post('/users/'.rawurlencode($this->user_id).'/bridges', $body, $options);

        return $response;
    }

    /**
     * Play an audio or speak a sentence in a bridge
     *
     * '/users/:user_id/bridges/:bridge_id/audio' POST
     *
     * @param $bridge_id Bridge ID
     */
    public function audio($bridge_id, array $options = array())
    {
        $body = (isset($options['body']) ? $options['body'] : array());

        $response = $this->client->post('/users/'.rawurlencode($this->user_id).'/bridges/'.rawurlencode($bridge_id).'/audio', $body, $options);

        return $response;
    }

    /**
     * Get the list of calls that are on the bridge
     *
     * '/users/:user_id/bridges/:bridge_id/calls' GET
     *
     * @param $bridge_id Bridge ID
     */
    public function listCall($bridge_id, array $options = array())
    {
        $body = (isset($options['query']) ? $options['query'] : array());

        $response = $this->client->get('/users/'.rawurlencode($this->user_id).'/bridges/'.rawurlencode($bridge_id).'/calls', $body, $options);

        return $response;
    }

    /**
     * Change calls in a bridge and bridge/unbridge the audio
     *
     * '/users/:user_id/bridges/:bridge_id' POST
     *
     * @param $bridge_id Bridge ID
     */
    public function update($bridge_id, array $options = array())
    {
        $body = (isset($options['body']) ? $options['body'] : array());

        $response = $this->client->post('/users/'.rawurlencode($this->user_id).'/bridges/'.rawurlencode($bridge_id).'', $body, $options);

        return $response;
    }

}
