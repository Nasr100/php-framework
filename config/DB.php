<?php
namespace config;
use PDO;
class DB{
    static private $password ="";
    static private $dsn = "mysql:host=localhost;port=3309;dbname=test";
    static private $userName = "root";
    static private $pdo;


    private function  __construct(){
        
    }

   static public function getConx(){
    if(!isset(self::$pdo)){
        self::$pdo = new PDO(self::$dsn,self::$userName,self::$password);
        self::$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        return self::$pdo;
    } else{
        return self::$pdo;
    }
   }
    
}


?>