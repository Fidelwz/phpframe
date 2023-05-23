<?php
namespace lib;

class Route
{
    private static  $routes = [];


    public static function GET($uri , $callback)
    {
        $uri = trim($uri, '/');
        self::$routes['GET'][$uri]= $callback;
    }

    public static function POST($uri , $callback)
    {
        $uri = trim($uri, '/');
        self::$routes['POST'][$uri]= $callback;
    }
    public static function PUT($uri , $callback)
    {
        $uri = trim($uri, '/');
        self::$routes['PUT'][$uri]= $callback;
    }
    public static function dispatch(){
        $uri = $_SERVER['REQUEST_URI'];
        $uri = trim($uri, '/');
        $method = $_SERVER['REQUEST_METHOD'];
        foreach(self::$routes[$method] as $route=>$callback){
            if($route == $uri){
                $callback();"</br>";
                return;
            }
        }
        echo "404";
      
    }

    
}