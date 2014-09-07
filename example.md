# Examples

## Sample helper class

```
class Bandwidth {

  /**
   * Return API cliet
   * @return Bandwidth\Client bandwidth api client
   */
  public function getClient() {
    return $this->apiClient;
  }
  
  /**
   * return app id
   *
   * @return string app id
   * @author kureikain
   */
  public function getAppId() {
    return $this->appId;
  }
  
  /**
   * return user id
   * @return string user id
   */
  public function getUserId() {
    return $this->userId;
  }

  protected function __construct()
  {
    $config = Zend_Registry::get('config');
    $this->appId =  $config->bandwidth->app_id;
    $this->userId = $config->bandwidth->user_id;
    $this->apiClient = new Bandwidth\Client([
        'username' => $config->bandwidth->api_token,
        'password' => $config->bandwidth->api_secret
        ]);
  }

  /**
   * Singleton instance
   *
   * @return Categories
   */
  public static function getInstance()
  {
    if (null === self::$_instance) {
      self::$_instance = new self();
    }

    return self::$_instance;
  }

}
```

# Transfer calls

```
Bandwidth::getInstance()->getClient()->calls(Bandwidth::getInstance()->getUserId())->update($body['callId'], [
    'body' => [
    'transferTo' =>$callAuthenticationInfo['redirect_number'],
    'state'  => 'transferring',
    'callbackUrl' => $url,
    'recordingEnabled' => "true"
    ]
    ]);
```

