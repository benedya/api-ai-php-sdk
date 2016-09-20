## This is the simplest php-wrapper for api.ai

## How to use
```php
require_once __DIR__.'/vendor/autoload.php';
$client = new Client('access_token');
$res = $client->query('/query', ['query' => 'Hi']);
```
