<?php

namespace hubert\extension\logger;

class factory {
    public static function get($container){
        $log = new \Monolog\Logger('logger');
        if(empty(hubert()->config()->logger["path"])){
            $log->pushHandler(new \Monolog\Handler\TestHandler());
        } else {
           $log->pushHandler(new \Monolog\Handler\StreamHandler(hubert()->config()->logger["path"].date("Y-m-d").'.log', \Monolog\Logger::WARNING));
        }
        return $log;
    }
}
