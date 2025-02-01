<?php
namespace config;
class Route{
    protected $controller;
    protected $action;
    protected $method;
    protected $uri;

    public function __construct($method,$uri,$controller,$action)
    {
        $this->controller = $controller;
        $this->uri = $uri;
        $this->action = $action;
        $this->method = $method;
    }


    public function getController(){
        return $this->controller;
    }
    public function getAction(){
        return $this->action;
    }
    public function getUri(){
        return $this->uri;
    }
    public function getMethod(){
        return $this->method;
    }

    public function setController($controller){
        $this->controller = $controller;
    }
    public function setAction($action){
        $this->action = $action;
    }
    public function setUri($uri){
        $this->uri = $uri;
    }
    public function setMethod($method){
        $this->method = $method;
    }




}


?>