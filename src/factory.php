<?php

namespace hubert\extension\logger;

class factory {
    public static function get($container){
        
        if(empty(hubert()->config()->logger["path"])){
            $loger = new \Monolog\Logger('logger');
            $loger->pushHandler(new \Monolog\Handler\TestHandler());
            return $loger;
        } else {
            return self::getLogger(hubert()->config()->logger["path"], date("Y-m-d").'.log');
        }
    }
    
    public static function getLogger($path, $filename, $logLevel = \Monolog\Logger::WARNING){
        $log = new \Monolog\Logger('logger');
        $log->pushHandler(new \Monolog\Handler\StreamHandler($path.$filename, $logLevel));
        return $log;
    }
}
