<?php

namespace ApiAi;

abstract class AbstractClient
{
    protected $accessToken;
    protected $httpClient;

    public abstract function query($q, $v, $confidence, $sessionId, $lang);
}