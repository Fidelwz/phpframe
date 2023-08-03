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

    //check $uri var that allow all methods
        foreach(self::$routes[$method] as $route=>$callback){

            if(strpos($route, ':') !== false){
                $route = preg_replace('#:[\w]+#', '([\w]+)',$route );
            }
            if(preg_match("#^$route$#",$uri,$matches)){
                
                $params = array_slice($matches,1);

               $response = $callback(...$matches);                
               if(is_array($response) || is_object($response)){
                echo json_encode($response);
               }else{
                echo $response;
               }
                return;
            }
        }
        //return 404 when uri dont´t exist
        echo "404";
      
    }

    
}