<?php
namespace config\logger;
use config\logger\Event;

class Logger{
    private static  $file;
    // private static Event $event;
    private static ?Logger $logger = null;

    private function __construct(){
    }

    public static function getLogger(){
        if(!isset(self::$logger)){
            self::$logger = new Logger();
            self::$logger::$file = "../../logs.txt";
        }
    }

}


?>