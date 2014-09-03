<?php

namespace Bandwidth\Api;

use Bandwidth\HttpClient\HttpClient;

/**
 * The Phone Numbers resource lets you get phone numbers for use with your programs and manage numbers you already have
 *
 * @param $user_id user_id of account which is doing API call
 */
class PhoneNumbers
{

    private $user_id;
    private $client;

    public function __construct($user_id, HttpClient $client)
    {
        $this->user_id = $user_id;
        $this->client = $client;
    }

    /**
     * Gets a list of your numbers. 
     *
     * '/users/:user_id/phoneNumbers' GET
     */
    public function fetch(array $options = array())
    {
        $body = (isset($options['query']) ? $options['query'] : array());

        $response = $this->client->get('/users/'.rawurlencode($this->user_id).'/phoneNumbers', $body, $options);

        return $response;
    }

    /**
     * Allocates a number so you can use it to make and receive calls and send and receive messages
     *
     * '/users/:user_id/phoneNumbers' POST
     *
     * @param $number An available telephone number you want to use (must be in E.164 format, like +19195551212)
     */
    public function create($number, array $options = array())
    {
        $body = (isset($options['body']) ? $options['body'] : array());
        $body['number'] = $number;

        $response = $this->client->post('/users/'.rawurlencode($this->user_id).'/phoneNumbers', $body, $options);

        return $response;
    }

    /**
     * Gets information about one of your numbers using the number's ID
     *
     * '/users/:user_id/phoneNumbers/:number_id' GET
     *
     * @param $number_id Number ID inside Bandwidth system
     */
    public function showById($number_id, array $options = array())
    {
        $body = (isset($options['query']) ? $options['query'] : array());

        $response = $this->client->get('/users/'.rawurlencode($this->user_id).'/phoneNumbers/'.rawurlencode($number_id).'', $body, $options);

        return $response;
    }

    /**
     * Gets information about one of your numbers using the E.164 number string, like +19195551212. Remember to URL encode the plus sign prefix
     *
     * '/users/:user_id/phoneNumbers/:number' GET
     *
     * @param $number phone number
     */
    public function showByNumber($number, array $options = array())
    {
        $body = (isset($options['query']) ? $options['query'] : array());

        $response = $this->client->get('/users/'.rawurlencode($this->user_id).'/phoneNumbers/'.rawurlencode($number).'', $body, $options);

        return $response;
    }

    /**
     * Makes changes to a number you have. POST a new JSON representation with the property values you desire to the URL that you got back in the "Location" header when you first allocated it. Properties you don't send will remain unchanged.
     *
     * '/users/:user_id/phoneNumbers/:number_id' POST
     *
     * @param $number_id id of phone number in twilio system. The ID of a number can be found by showByNumber
     */
    public function update($number_id, array $options = array())
    {
        $body = (isset($options['body']) ? $options['body'] : array());

        $response = $this->client->post('/users/'.rawurlencode($this->user_id).'/phoneNumbers/'.rawurlencode($number_id).'', $body, $options);

        return $response;
    }

    /**
     * emoves a number from your account so you can no longer make or receive calls, or send or receive messages with it. When you remove a number from your account, it will not immediately become available for re-use, so be careful.
     *
     * '/users/:user_id/phoneNumbers/:number_id' DELETE
     */
    public function destroy(array $options = array())
    {
        $body = (isset($options['body']) ? $options['body'] : array());

        $response = $this->client->delete('/users/'.rawurlencode($this->user_id).'/phoneNumbers/:number_id', $body, $options);

        return $response;
    }

}
