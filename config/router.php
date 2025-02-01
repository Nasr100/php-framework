<?php
use config\Route;
use config\Factory;
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
        
       return $this->add("GET",$uri,$controller,$action);
    }
    public  function post($uri,$controller,$action){
      return  $this->add("POST",$uri,$controller,$action);
    }
    public  function delete($uri,$controller,$action){
      return $this->add("DELETE",$uri,$controller,$action);
    }
    public  function put($uri,$controller,$action){
       return $this->add("PUT",$uri,$controller,$action);
    }
    private function add($method,$uri,$controller,$action){
        $route = new Route($method,$uri,$controller,$action); 
        if(!isset($this->routes[$route->getMethod()])) $this->routes[$route->getMethod()] = [];
        $pattern = preg_replace('/{(\w+)}/', '(?P<$1>\w+)', $route->getUri());
        $this->routes[$route->getMethod()][$pattern] = 
        [
            "controller" => $route->getController(),
            "action" => $route->getAction(),
        ];
        return $route;
    }

    public function route($method,$uri){

        $result = getData($this->routes,$uri,$method);
        if(!isset($result)){
            abort("route Not found");
        }
        Factory::createRequest();
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