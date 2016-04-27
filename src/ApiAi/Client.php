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

    public function query($q, $sessionId, $confidence = 0, $v = '20150910', $lang = 'en')
    {
        $body = [
            'query' => $q,
            'v' => $v,
            'sessionId' => $sessionId,
            'confidence' => $confidence,
            'lang' => $lang,
        ];
        $headers = [
            'Authorization: Bearer ' . $this->accessToken,
        ];

        $res = json_decode($this->httpClient->send($this->apiUrl . '/query', $body, 'get', $headers), true);
        $status = $res['status'];
        if($status['code'] !== 200) {
            throw new \Exception($status['errorType'] . ': ' .$status['errorDetails'], $status['code']);
        }
        return $res;
    }
}