<?php

namespace ApiAi\Http;

class HttpClient implements IHttpClient
{
    public function send($url, $body, $method = 'get', array $headers = [])
    {
        $ch = curl_init();
        if($method == 'post') {
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
        } else {
            $url .= '?' . http_build_query($body);
        }
        if($headers) {
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        }
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
        if(curl_error($ch)) {
            throw new \Exception('Curl error ' . curl_error($ch));
        }
        curl_close($ch);

        return $output;
    }
}