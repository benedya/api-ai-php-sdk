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

    public function query($q, $v, $confidence, $sessionId, $lang)
    {
        // todo
    }
}