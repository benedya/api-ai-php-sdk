<?php

namespace ApiAi;

abstract class AbstractClient
{
    protected $accessToken;
    protected $httpClient;
    protected $apiUrl = 'https://api.api.ai/v1';

    public function setApiUrl($url)
    {
        $this->apiUrl = $url;
    }

    public abstract function query($q, $v, $confidence, $sessionId, $lang);
}