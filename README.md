Hubert Logger Extension
======

## Installation

Hubert is available via Composer:

```json
{
    "require": {
        "falkm/hubert-logger": "1.*"
    }
}
```

## Usage

Create an index.php file with the following contents:

```php
<?php

require 'vendor/autoload.php';

$app = new hubert\app();

$config = array(
    "factories" => array(
         "logger" => array(hubert\extension\logger\factory::class, 'get')
        ),
    "config" => array(
        "display_errors" => true,
        "logger" => array(
                "path" => __dir__.'/logs/',
            )
        ),
    "routes" => array(
        "home" => array(
            "route" => "/", 
            "method" => "GET|POST", 
            "target" => function($request, $response, $args){
                hubert()->container()->logger->error("test-error");
                echo "show in log-folder: ".hubert()->config()->logger["path"];
            })
    ),
    
);

hubert($config);
hubert()->emit(hubert()->run());
```

For more see the example in this repository.

### components

- monolog: [monolog/monolog](https://github.com/Seldaek/monolog)

## License

The MIT License (MIT). Please see [License File](https://github.com/falkmueller/hubert/blob/master/LICENSE) for more information.