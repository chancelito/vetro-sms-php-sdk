# Vetro Media Bulk SMS SDK

This package serves to send sms via Vetro media SMS SDK. Get an authorization token
on [this link](https://sms.vetro.co.za) by getting a account.


### Requirements
PHP >= 7.1
Php-curl


### Installation

    $ composer require chancelito/vetro-sms-sdk
  
### Example

      <?php
      require_once __DIR__ . '/../../vendor/autoload.php';
      
      use Chancelito\VetrosmsPhpSdk\Message\VetroSms;
      
      $account_token = 'YOUR_ACCOUNT_TOKEN';
      $authorization_token = 'YOUR_AUTHORIZATION_TOKEN';
      $cell_number = 'YOUR_SA_CELL_NUMBER';
      $message = 'YOUR_MESSAGE';
      
      $obj = new VetroSms($authorization_token, $account_token);
      $send = $obj->sendSingleSms($cell_number, $message);


### Contact

cshongo33@gmail.com
