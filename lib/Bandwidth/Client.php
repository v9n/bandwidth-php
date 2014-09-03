<?php

namespace Bandwidth;

use Bandwidth\HttpClient\HttpClient;

class Client
{
    private $httpClient;

    public function __construct($auth = array(), array $options = array())
    {
        $this->httpClient = new HttpClient($auth, $options);
    }

    /**
     * Retrieve current balance, transaction list, account type and all elements related to your platform account.
     *
     * @param $user_id user_id of account which is doing API call
     */
    public function account($user_id)
    {
        return new Api\Account($user_id, $this->httpClient);
    }

    /**
     * The Available Numbers resource lets you search for numbers that are available for use with your application.
     */
    public function availableNumbers()
    {
        return new Api\AvailableNumbers($this->httpClient);
    }

    /**
     * Lets you send SMS text messages and view messages that were previously sent or received
     *
     * @param $user_id user_id of account which is doing API call
     */
    public function messages($user_id)
    {
        return new Api\Messages($user_id, $this->httpClient);
    }

    /**
     * The Calls resource lets you make phone calls and view information about previous inbound and outbound calls.
     *
     * @param $user_id user_id of account which is doing API call
     */
    public function calls($user_id)
    {
        return new Api\Calls($user_id, $this->httpClient);
    }

    /**
     * CNAM is an acronym which stands for Caller ID Name. CNAM can be used to display the calling party's name alongside the phone number, to help users easily identify a caller. CNAM API allows the user to get the CNAM information of a particular number
     *
     * @param $number phone number to get the info
     */
    public function numberInfo($number)
    {
        return new Api\NumberInfo($number, $this->httpClient);
    }

    /**
     * The Phone Numbers resource lets you get phone numbers for use with your programs and manage numbers you already have
     *
     * @param $user_id user_id of account which is doing API call
     */
    public function phoneNumbers($user_id)
    {
        return new Api\PhoneNumbers($user_id, $this->httpClient);
    }

}
