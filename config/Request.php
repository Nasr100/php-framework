<?php
namespace config; 
class Request{
    // private Route $route;
    private $bodyParams = [];
    private $queryParams = [];

    public function __construct(){
        if(isset($_GET)){
            foreach($_GET as $name => $value){
                $this->queryParams[$name] = $value;
            }
        }
        if(isset($_POST)){
            foreach($_POST as $name => $value){
                $this->queryParams[$name] = $value;

            }
        }
        // $this->route =$route;
    }
    public function post($key,$default=null){
        foreach($this->queryParams as $i=>$name ){
            if($i == $key){
                return  $name;
            }
        }
        return $default;
    }
    public function get($key,$default=null){
        foreach($this->bodyParams as $i=>$name ){
            if($i == $key){
                return  $name;
            }
        }
        return $default;
    }

    public function input($key){
       $Param = $this->post($key);
       return $Param == null ?  $this->get($key) :  $Param ;
    }

    

}

?>