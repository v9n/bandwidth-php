# bandwidth-php

Bandwidth API library client for PHP

__This library is generated by [alpaca](https://github.com/pksunkara/alpaca)__

## Installation

Make sure you have [composer](https://getcomposer.org) installed.

Add the following to your composer.json

```js
{
    "require": {
        "kureikain/bandwidth-alpaca": "*"
    }
}
```

Update your dependencies

```bash
$ php composer.phar update
```

> This package follows the `PSR-0` convention names for its classes, which means you can easily integrate these classes loading in your own autoloader.

#### Versions

Works with [ 5.4 / 5.5 ]

## Usage

```php
<?php

// This file is generated by Composer
require_once 'vendor/autoload.php';

// Then we instantiate a client (as shown below)
```

### Build a client

__Using this api without authentication gives an error__

##### Basic authentication

```php
$auth = array('username' => 'pksunkara', 'password' => 'password');

$client = new Bandwidth\Client($auth, $clientOptions);
```

##### Authorization header token

```php
$client = new Bandwidth\Client('1a2b3', $clientOptions);
```

### Client Options

The following options are available while instantiating a client:

 * __base__: Base url for the api
 * __api_version__: Default version of the api (to be used in url)
 * __user_agent__: Default user-agent for all requests
 * __headers__: Default headers for all requests
 * __request_type__: Default format of the request body

### Response information

__All the callbacks provided to an api call will receive the response as shown below__

```php
$response = $client->klass('args')->method('args', $methodOptions);

$response->code;
// >>> 200

$response->headers;
// >>> array('x-server' => 'apache')
```

##### JSON response

When the response sent by server is __json__, it is decoded into an array

```php
$response->body;
// >>> array('user' => 'pksunkara')
```

### Method Options

The following options are available while calling a method of an api:

 * __api_version__: Version of the api (to be used in url)
 * __headers__: Headers for the request
 * __query__: Query parameters for the url
 * __body__: Body of the request
 * __request_type__: Format of the request body

### Request body information

Set __request_type__ in options to modify the body accordingly

##### RAW request

When the value is set to __raw__, don't modify the body at all.

```php
$body = 'username=pksunkara';
// >>> 'username=pksunkara'
```

##### FORM request

When the value is set to __form__, urlencode the body.

```php
$body = array('user' => 'pksunkara');
// >>> 'user=pksunkara'
```

##### JSON request

When the value is set to __json__, JSON encode the body.

```php
$body = array('user' => 'pksunkara');
// >>> '{"user": "pksunkara"}'
```

### account information api

Retrieve current balance, transaction list, account type and all elements related to your platform account.

The following arguments are required:

 * __user_id__: user_id of account which is doing API call

```php
$account = $client->account("u-account_id_in_bandwidth");
```

##### Get information about your account (GET /users/:user_id/account)

Get information about your account: balance, accountType.

```php
$response = $account->show($options);
```

##### Get a list of the transactions made to your account (GET /users/:user_id/account/transactions)

Get the transactions from the user's Account..

```php
$response = $account->transactions($options);
```

### message resources api

Lets you send SMS text messages and view messages that were previously sent or received

The following arguments are required:

 * __user_id__: user_id of account which is doing API call

```php
$messages = $client->messages("u-account_id_in_bandwidth");
```

##### Get a list of previous messages that were sent or received (GET /users/:user_id/messages)

Get a list of previous messages that were sent or received

```php
$response = $messages->fetch($options);
```

##### Send text messages (POST /users/:user_id/messages)

Send text messages

```php
$response = $messages->create($options);
```

##### Read a message (GET /users/:user_id/messages/:id)

Get information about a message that was sent or received

The following arguments are required:

 * __id__: message id

```php
$response = $messages->show("111111", $options);
```

### This resource provides a CNAM number info api

CNAM is an acronym which stands for Caller ID Name. CNAM can be used to display the calling party's name alongside the phone number, to help users easily identify a caller. CNAM API allows the user to get the CNAM information of a particular number

The following arguments are required:

 * __number__: phone number to get the info

```php
$numberInfo = $client->numberInfo("14084442222 //or 408444222 is ok");
```

##### Get the CNAM of the number (GET /phoneNumbers/numberInfo/:number)

Get the CNAM of the number

```php
$response = $numberInfo->show($options);
```

### User Errors api

 The User Errors resource lets you see information about errors that happened in your API calls and during applications callbacks. This error information can be very helpful when you're debugging an application.  Because error information can be large, and errors in the distant past are less useful than new ones, Bandwidth API limits the number of user errors it keeps. 

```php
$errors = $client->errors("u-account_id_in_bandwidth");
```

##### Gets information about one user error (GET /users/:user_id/errors/:error_id)

Gets information about one user error

The following arguments are required:

 * __error_id__: Error ID

```php
$response = $errors->show("error_id", $options);
```

##### Gets all the user errors for a user (GET /users/:user_id/errors)

Gets all the user errors for a user

```php
$response = $errors->fetch($options);
```

### Find and Buy available numbers api

The Available Numbers resource lets you search for numbers that are available for use with your application.

```php
$availableNumbers = $client->availableNumbers("u-account_id_in_bandwidth");
```

##### Search an available local number (GET /availableNumbers/local)

Search and available local number that we can buy

The following arguments are required:


```php
$response = $availableNumbers->searchLocal("San Jose", "CA", 95111, 408, "4083", true, 10, "*2%3F9", $options);
```

##### Buy a local number (POST /availableNumbers/local)

Search and order available local numbers

The following arguments are required:


```php
$response = $availableNumbers->createLocal("San Jose", "CA", 95111, 408, "4083", true, 10, $options);
```

##### Search for available toll free numbers (GET /availableNumbers/tollFree)

Search for available toll free numbers

```php
$response = $availableNumbers->searchTollFree($options);
```

##### Search and order available toll free numbers (POST /availableNumbers/tollFree)

Search and order available toll free numbers

```php
$response = $availableNumbers->createTollFree($options);
```

### Manipulation calls api

The Calls resource lets you make phone calls and view information about previous inbound and outbound calls.

The following arguments are required:

 * __user_id__: user_id of account which is doing API call

```php
$calls = $client->calls("u-account_id_in_bandwidth");
```

##### Send DTMF (POST /users/:user_id/calls/:call_id/dtmf)

Send DTMF to a call

The following arguments are required:

 * __call_id__: call id

```php
$response = $calls->dtmf("111111", $options);
```

##### Retrieve all recordings related to the call (GET /users/:user_id/calls/:call_id/recordings)

Retrieve all recordings related to the call

The following arguments are required:

 * __call_id__: call id

```php
$response = $calls->recordings("111111", $options);
```

##### Update the gather DTMF (Stop Gather) (POST /users/:user_id/calls/:call_id/gather/:gather_id)

Update the gather DTMF (Stop Gather)

The following arguments are required:

 * __call_id__: call id
 * __gather_id__: gather id

```php
$response = $calls->updateGather("111111", "222222", $options);
```

##### Gets a list of active and historic calls you made or received (GET /users/:user_id/calls)

Gets a list of active and historic calls you made or received

```php
$response = $calls->fetch($options);
```

##### Makes a phone call. (POST /users/:user_id/calls)

Makes a phone call.

The following arguments are required:

 * __to__: number which we call to
 * __from__: number which we call from

```php
$response = $calls->create("4081112244", "6501112222", $options);
```

##### Gets information about an active or completed call (GET /users/:user_id/calls/:call_id)

Gets information about an active or completed call. No query parameters are supported

The following arguments are required:

 * __call_id__: call id

```php
$response = $calls->show("111111", $options);
```

##### Changes properties of an active phone call (POST /users/:user_id/calls/:call_id)

Changes properties of an active phone call

The following arguments are required:

 * __call_id__: call id

```php
$response = $calls->update("111111", $options);
```

##### Play an audio or speak a sentence in a call (POST /users/:user_id/calls/:call_id/audio)

Play an audio or speak a sentence in a call

The following arguments are required:

 * __call_id__: call id

```php
$response = $calls->audio("111111", $options);
```

##### Gather the DTMF digits pressed (POST /users/:user_id/calls/:call_id/gather)

Gather the DTMF digits pressed by the user.

The following arguments are required:

 * __call_id__: call id

```php
$response = $calls->createGather("111111", $options);
```

##### Get the gather DTMF parameters and results (GET /users/:user_id/calls/:call_id/gather/:gather_id)

Get the gather DTMF parameters and results

The following arguments are required:

 * __call_id__: call id
 * __gather_id__: gather id

```php
$response = $calls->gather("111111", "222222", $options);
```

### The Phone Numbers resource lets you get phone numbers for use with your programs and manage numbers you already have api

The Phone Numbers resource lets you get phone numbers for use with your programs and manage numbers you already have

The following arguments are required:

 * __user_id__: user_id of account which is doing API call

```php
$phoneNumbers = $client->phoneNumbers("u-account_id_in_bandwidth");
```

##### Gets a list of your numbers.  (GET /users/:user_id/phoneNumbers)

Gets a list of your numbers. 

```php
$response = $phoneNumbers->fetch($options);
```

##### Allocates a number so you can use it to make and receive calls and send and receive messages (POST /users/:user_id/phoneNumbers)

Allocates a number so you can use it to make and receive calls and send and receive messages

The following arguments are required:

 * __number__: An available telephone number you want to use (must be in E.164 format, like +19195551212)

```php
$response = $phoneNumbers->create("+19195551212", "u-hdsadasdsad7-sample-app-id", "Customer Name", "Default NC Number", $options);
```

##### Gets information about one of your numbers using the number's ID (GET /users/:user_id/phoneNumbers/:number_id)

Gets information about one of your numbers using the number's ID

The following arguments are required:

 * __number_id__: Number ID inside Bandwidth system

```php
$response = $phoneNumbers->showById("sample_number_id", $options);
```

##### Gets information about one of your numbers using the number itself (GET /users/:user_id/phoneNumbers/:number)

Gets information about one of your numbers using the E.164 number string, like +19195551212. Remember to URL encode the plus sign prefix

The following arguments are required:

 * __number__: phone number

```php
$response = $phoneNumbers->showByNumber("+14083872696", $options);
```

##### Make changes to a number you have (POST /users/:user_id/phoneNumbers/:number_id)

Makes changes to a number you have. POST a new JSON representation with the property values you desire to the URL that you got back in the "Location" header when you first allocated it. Properties you don't send will remain unchanged.

The following arguments are required:

 * __number_id__: id of phone number in twilio system. The ID of a number can be found by showByNumber

```php
$response = $phoneNumbers->update("n-111111", $options);
```

##### Remove a number from your account (DELETE /users/:user_id/phoneNumbers/:number_id)

emoves a number from your account so you can no longer make or receive calls, or send or receive messages with it. When you remove a number from your account, it will not immediately become available for re-use, so be careful.

The following arguments are required:

 * __number_id__: id of phone number in twilio system. The ID of a number can be found by showByNumber

```php
$response = $phoneNumbers->destroy("n-111111", $options);
```

### Conference resouce api

The Conference resource allows you create conferences, add members to it, play audio, speak text, mute/unmute members, hold/unhold members and other things related to conferencing.

The following arguments are required:

 * __user_id__: user_id of account which is doing API call

```php
$conferences = $client->conferences("u-account_id_in_bandwidth");
```

##### Create a conference. (POST /users/:user_id/conferences)

Creates a conference.

The following arguments are required:

 * __from__: the phone number which conferences will be created on it

```php
$response = $conferences->create("+14081112323", $options);
```

##### Add a member to a conference. (POST /users/:user_id/conferences/:conference_id/members)

Add a member to a conference.

The following arguments are required:

 * __conference_id__: Conference ID
 * __callId__: Call ID to join into conference

```php
$response = $conferences->createMember("conf-2jir46wjc5puqpiwthqma5y", "c-m2vrf4lpryjlvwgvsnf6ery", $options);
```

##### Play an audio/speak a sentence in the conference. (POST /users/:user_id/conferences/:conference_id/audio)

Play an audio/speak a sentence in the conference.

The following arguments are required:

 * __conference_id__: Conference ID

```php
$response = $conferences->audio("conf-2jir46wjc5puqpiwthqma5y", $options);
```

### Bridges resource api

Bridges resource. Bridge two calls allowing two way audio between them.

The following arguments are required:

 * __user_id__: user_id of account which is doing API call

```php
$bridges = $client->bridges("u-account_id_in_bandwidth");
```

##### Create a bridge (POST /users/:user_id/bridges)

Create a bridge

The following arguments are required:


```php
$response = $bridges->create("true", "c-m2vrf4lpryjlvwgvsnf6ery", $options);
```

##### Play an audio or speak a sentence in a bridge (POST /users/:user_id/bridges/:bridge_id/audio)

Play an audio or speak a sentence in a bridge

The following arguments are required:

 * __bridge_id__: Bridge ID

```php
$response = $bridges->audio("b_bridge_id_in_bandwidth", $options);
```

##### Get the list of calls that are on the bridge (GET /users/:user_id/bridges/:bridge_id/calls)

Get the list of calls that are on the bridge

The following arguments are required:

 * __bridge_id__: Bridge ID

```php
$response = $bridges->listCall("b_bridge_id_in_bandwidth", $options);
```

##### Change calls in a bridge and bridge/unbridge the audio (POST /users/:user_id/bridges/:bridge_id)

Change calls in a bridge and bridge/unbridge the audio

The following arguments are required:

 * __bridge_id__: Bridge ID

```php
$response = $bridges->update("b_bridge_id_in_bandwidth", $options);
```

### Retrieve call recordings, filtering by Id, user and/or calls api

Retrieve call recordings, filtering by Id, user and/or calls. Learn how record a Call The recording information retrieved by GET method contains only textual data related to call recording as described on Properties section. To properly work with recorded media content such as download and removal of media file, please access Media documentation

```php
$recordings = $client->recordings("u-account_id_in_bandwidth");
```

##### Retrieve a specific call recording information, identified by recordingId (GET /users/:user_id/recordings/:recording_id)

Retrieve a specific call recording information, identified by recordingId

The following arguments are required:

 * __recording_id__: Recording ID

```php
$response = $recordings->show("r_recoridng_id_in_bandwidth", $options);
```

##### List a user's call recordings (GET /users/:user_id/recordings)

List a user's call recordings

```php
$response = $recordings->fetch($options);
```

## Contributors
Here is a list of [Contributors](https://github.com/kureikain/bandwidth-php/contributors)

### TODO

## License
MIT

## Bug Reports
Report [here](https://github.com/kureikain/bandwidth-php/issues).

## Contact
kureikain (kurei@axcoto.com)
