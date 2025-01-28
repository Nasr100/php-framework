<?php
class dbConnection{
    static private $password;
    static private $dsn;
    static private $userName ;
    static private $pdo;


    private function  __construct(){
        
    }

   static public function getConx($dsn,$userName,$password){
    if(!isset(self::$pdo)){
        self::$dsn = $dsn;
        self::$userName = $userName;
        self::$password = $password;
        self::$pdo = new PDO(self::$dsn,self::$userName,self::$password);
        self::$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        return self::$pdo;
    } else{
        return self::$pdo;
    }
   }
    
}


?>