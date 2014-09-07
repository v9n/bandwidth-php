<?php

namespace Bandwidth\Api;

use Bandwidth\HttpClient\HttpClient;

/**
 * The Conference resource allows you create conferences, add members to it, play audio, speak text, mute/unmute members, hold/unhold members and other things related to conferencing.
 *
 * @param $user_id user_id of account which is doing API call
 */
class Conferences
{

    private $user_id;
    private $client;

    public function __construct($user_id, HttpClient $client)
    {
        $this->user_id = $user_id;
        $this->client = $client;
    }

    /**
     * Creates a conference.
     *
     * '/users/:user_id/conferences' POST
     *
     * @param $from the phone number which conferences will be created on it
     */
    public function create($from, array $options = array())
    {
        $body = (isset($options['body']) ? $options['body'] : array());
        $body['from'] = $from;

        $response = $this->client->post('/users/'.rawurlencode($this->user_id).'/conferences', $body, $options);

        return $response;
    }

}
