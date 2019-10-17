<?php


namespace Chancelito\VetrosmsPhpSdk\Message;


class ResponseFormatter
{
    /**
     * Formats response based on request response
     * @param $code
     * @param $body
     * @return object
     */
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
                if (isset($body->success) and ($body->success == true)) {
                    $success = true;
                    $message = 'Message sent successfully!';
                } else {
                    $success = false;
                    $message = isset($body->message) ? $body->message: 'Message could not be sent';
                }

                break;

            default:
                $message = 'Unknown error occurred! message not sent';
        }
        $response = ['success' => $success, 'message' => $message];

        return (object) $response;
    }
}
