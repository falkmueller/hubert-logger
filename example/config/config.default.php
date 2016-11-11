<?php
return array(
    
   "config" => array(
        "display_errors" => true,
    ),
    "routes" => array(
            "home" => array(
                "route" => "/", 
                "method" => "GET|POST", 
                "target" => function($request, $response, $args){
                    $container = hubert()->container();
                    $container["logger"]->error("test-error");
                    echo "show in log-folder: ".hubert()->config()->logger["path"];
                }
            ),
        )
);
