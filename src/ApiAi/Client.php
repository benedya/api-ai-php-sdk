<?php

namespace ApiAi;

use ApiAi\Http\HttpClient;
use ApiAi\Http\IHttpClient;

class Client extends AbstractClient
{
    function __construct($accessToken, IHttpClient $httpClient = null)
    {
        $this->accessToken = $accessToken;
        if(!$httpClient) {
            $httpClient = new HttpClient();
        }
        $this->httpClient = $httpClient;
    }

    public function query($endpoint, $parameters)
    {
        $parameters = array_merge([
            'v' => '20150910',
            'sessionId' => time(),
            'confidence' => 0,
            'lang' => 'en',
        ], $parameters);
        $headers = [
            'Authorization: Bearer ' . $this->accessToken,
        ];

        $res = json_decode($this->httpClient->send($this->apiUrl . $endpoint, $parameters, 'get', $headers), true);
        $status = $res['status'];
        if($status['code'] !== 200) {
            throw new \Exception($status['errorType'] . ': ' .$status['errorDetails'], $status['code']);
        }
        return $res;
    }
}