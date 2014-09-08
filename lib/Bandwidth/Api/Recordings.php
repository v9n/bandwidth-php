<?php

namespace Bandwidth\Api;

use Bandwidth\HttpClient\HttpClient;

/**
 * Retrieve call recordings, filtering by Id, user and/or calls. Learn how record a Call The recording information retrieved by GET method contains only textual data related to call recording as described on Properties section. To properly work with recorded media content such as download and removal of media file, please access Media documentation
 *
 */
class Recordings
{

    private $client;

    public function __construct(HttpClient $client)
    {
        $this->client = $client;
    }

    /**
     * Retrieve a specific call recording information, identified by recordingId
     *
     * '/users/:user_id/recordings/:recording_id' GET
     *
     * @param $recording_id Recording ID
     */
    public function show($recording_id, array $options = array())
    {
        $body = (isset($options['query']) ? $options['query'] : array());

        $response = $this->client->get('/users/:user_id/recordings/'.rawurlencode($recording_id).'', $body, $options);

        return $response;
    }

    /**
     * List a user's call recordings
     *
     * '/users/:user_id/recordings' GET
     */
    public function fetch(array $options = array())
    {
        $body = (isset($options['query']) ? $options['query'] : array());

        $response = $this->client->get('/users/:user_id/recordings', $body, $options);

        return $response;
    }

}
