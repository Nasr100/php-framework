<?php
    function getData(array $routes,$uri,$method){

        if (!isset($routes[$method])) {
            return null;
        }
    
        foreach ($routes[$method] as $pattern => $route) {
            $pattern = str_replace("/\{([a-zA-Z0-9_]+)\}/", "([^/]+)", $pattern);
            if (preg_match("~^{$pattern}$~", $uri, $matches)) {
                
                $param[0] = isset($matches[1]) ? $matches[1] : null;
                  return [
                    'controller' => $route['controller'],
                    'action' => $route['action'],
                    'params' => $param,
                ];
            }
        }
        return null;
                
        }
       

    
    function abort($message,$code = 404){
        http_response_code($code);
        echo $message;
        exit();
    }

?>