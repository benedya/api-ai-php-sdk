## This is simple, unofficial php-wrapper for api.ai

## Install
`composer require benedya/api-ai-php-sdk`

## How to use
```php
require_once __DIR__.'/vendor/autoload.php';
$client = new Client('access_token');
$res = $client->query('/query', ['query' => 'Hi']);
```
