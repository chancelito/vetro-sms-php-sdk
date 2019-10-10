<?php
require_once __DIR__ . '/../../vendor/autoload.php';

use Chancelito\VetrosmsPhpSdk\Message\VetroSms;

$account_token = 'YOUR_ACCOUNT_TOKEN';
$authorization_token = 'YOUR_AUTHORIZATION_TOKEN';
$cell_number = 'YOUR_SA_CELL_NUMBER';
$message = 'YOUR_MESSAGE';

$obj = new VetroSms($authorization_token, $account_token);
$send = $obj->sendSingleSms($cell_number, $message);
