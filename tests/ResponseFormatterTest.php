<?php

use PHPUnit\Framework\TestCase;
use Chancelito\VetrosmsPhpSdk\Message\ResponseFormatter;

class ResponseFormatterTest extends TestCase
{
    public function testUrlNotFound()
    {
        $code = 404;
        $body = null;
        $response = ResponseFormatter::formatResponse($code, $body);
        $this->assertFalse($response->success);
    }

    public function testSuccessfullResponse()
    {
        $code = 200;
        $body = (object) ['success' => true, 'message' => 'Message sent successfully sent!'];
        $response = ResponseFormatter::formatResponse($code, $body);
        $this->assertTrue($response->success);
    }

    public function testEmptyBodyAndCode()
    {
        $code = null;
        $body = null;
        $response = ResponseFormatter::formatResponse($code, $body);
        $this->assertFalse($response->success);
    }

    public function testSuccessCodeAndFalseResponse()
    {
        $code = 200;
        $body = (object) ['success' => false, 'message' => 'Message could not sent!'];
        $response = ResponseFormatter::formatResponse($code, $body);
        $this->assertFalse($response->success);
    }

    public function testSuccessWithEmptyBody()
    {
        $code = 200;
        $body = null;
        $response = ResponseFormatter::formatResponse($code, $body);
        $this->assertFalse($response->success);
    }

    public function testEmptyCodeAndBody()
    {
        $code = null;
        $body = null;
        $response = ResponseFormatter::formatResponse($code, $body);
        $this->assertFalse($response->success);
    }
}
