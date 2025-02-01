<?php
namespace config;
use config\Request;

    class Factory{
        private static ?Request $request = null;
        
        static public function createRequest(){
           
            if(!isset(self::$request)){
                self::$request = new Request();
            }
            return self::$request;
        }
        static public function resetRequest(){
                self::$request = null;
        }

    }


?>