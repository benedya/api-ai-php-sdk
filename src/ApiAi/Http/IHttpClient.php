<?php

namespace ApiAi\Http;

interface IHttpClient
{
    public function send($url, $body, $method = 'get', array $headers = []);
}