<?php

namespace Chancelito\VetrosmsPhpSdk\Message;

use GuzzleHttp\Client;

class VetroSms
{
    /**
     * @var string
     */
    private $vetro_end_point_url = 'https://sms.vetro.co.za/api/sms/send';

    /**
     * @var string
     */
    protected $authorization_token;

    /**
     * @var string
     */
    protected $account_token;

    public function __construct($authorization_token, $account_token)
    {
        $this->authorization_token = $authorization_token;
        $this->account_token       = $account_token;
    }

    public function sendSingleSms($phone_number, $message)
    {
        $client = new Client();
        $headers = [
            'Authorization' => 'Bearer ' . $this->authorization_token,
            'Accept'        => 'application/json',
            'Content-Type'  => 'application/json'
        ];

        try {
            $response = $client->request('POST', $this->vetro_end_point_url, [
                    'headers' => $headers,
                    'json' => [
                        'msisdn' => $phone_number,
                        'message' => $message,
                        'account_token' => $this->account_token
                    ]
                ]
            );

            $body = $response->getBody();
            $code = $response->getStatusCode();

            return ResponseFormatter::formatResponse($code, $body);

        } catch (\Exception $e) {

            return (object) ['success' => 'false', 'message' => 'Could not send your sms'];
        }
    }
}
