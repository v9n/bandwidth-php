<?php

namespace Bandwidth\Api;

use Bandwidth\HttpClient\HttpClient;

/**
 * Retrieve current balance, transaction list, account type and all elements related to your platform account.
 *
 * @param $user_id user_id of account which is doing API call
 */
class Account
{

    private $user_id;
    private $client;

    public function __construct($user_id, HttpClient $client)
    {
        $this->user_id = $user_id;
        $this->client = $client;
    }

    /**
     * Get information about your account: balance, accountType.
     *
     * '/users/:user_id/account' GET
     */
    public function show(array $options = array())
    {
        $body = (isset($options['query']) ? $options['query'] : array());

        $response = $this->client->get('/users/'.rawurlencode($this->user_id).'/account', $body, $options);

        return $response;
    }

    /**
     * Get the transactions from the user's Account..
     *
     * '/users/:user_id/account/transactions' GET
     */
    public function transactions(array $options = array())
    {
        $body = (isset($options['query']) ? $options['query'] : array());

        $response = $this->client->get('/users/'.rawurlencode($this->user_id).'/account/transactions', $body, $options);

        return $response;
    }

}
