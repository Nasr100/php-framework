<?php

class Router{
    private static $router = null;
    private function __construct(private $routes = []){}
    public static function getRouter(){
        if(!isset(self::$router)){
            self::$router = new Router();
            return self::$router;
        }else{
            return self::$router;
        }
    }

    public function get($uri,$controller,$action){
        
       $this->add("GET",$uri,$controller,$action);
    }
    public  function post($uri,$controller,$action){
       $this->add("POST",$uri,$controller,$action);
    }
    public  function delete($uri,$controller,$action){
       $this->add("DELETE",$uri,$controller,$action);
    }
    public  function put($uri,$controller,$action){
       $this->add("PUT",$uri,$controller,$action);
    }
    private function add($method,$uri,$controller,$action){
        if(!isset($this->routes[$method])) $this->routes[$method] = [];
        $pattern = preg_replace('/{(\w+)}/', '(?P<$1>\w+)', $uri);
        $this->routes[$method][$pattern] = 
        [
            "controller" => $controller,
            "action" => $action,
        ];
    }

    public function route($method,$uri){

        $result = getData($this->routes,$uri,$method);
        if(!isset($result)){
            abort("route Not found");
        }

        $controller = $result["controller"];
        $action = $result["action"];
        if(class_exists($controller)){
           
            $controllerInstance = new $controller();
            if(method_exists($controllerInstance,$action)){
                
                call_user_func_array([$controllerInstance, $action],$result['params']);
                return true;
            }else{
                abort("no method {$action} on controller {$controller} was found",500);
            }
        }
        return false;
    }
}


?>