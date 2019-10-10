<?php


namespace Chancelito\VetrosmsPhpSdk\Message;


class ResponseFormatter
{
    public static function formatResponse($code, $body)
    {
        $response = [];
        $message = '';
        $success = false;
        switch ($code) {

            case 401:
                $message = 'Invalid authorization token';
                break;

            case 404:
                $message = 'Url not found';
                break;

            case 200:
                if ($body->success == true) {
                    $success = true;
                    $message = 'Message sent successfully!';
                } else {
                    $success = false;
                    $message = $body->message;
                }

                break;

            default:
                $message = 'Unknown error occurred! message not sent';
        }
        $response = ['success' => $success, 'message' => $message];

        return (object) $response;
    }
}
