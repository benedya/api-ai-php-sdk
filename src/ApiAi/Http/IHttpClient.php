<?php

namespace ApiAi\Http;

interface IHttpClient
{
    public function send($url, $method, $body, array $headers = []);
}