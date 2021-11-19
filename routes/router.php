<?php

class router {
    /**
     * Holds the registered routes
     *
     * @var array $routes
     */
    
    public static $routes = [];


    /**
     * Register a new route
     *
     * @param $action string
     * @param \Closure $callback Called when current URL matches provided action
     */
    public function name($name)
    {
        if(!router::route($name)){
            $this->name = trim($name);
        }else{
            throw new Exception('Route name (' . $name . ') duplicated, route names are unique.');
        }
    }

    public static function route($name)
    {
        $route = null;
        foreach(router::$routes as $element){
            if($element->name == $name){
                $route = $element;
                break;
            }
        }
        return $route;
    }
    /**
     * Dispatch the router
     *
     * @param $action string
     */
    public static function dispatch($action)
    {
        $route = null;
        foreach(router::$routes as $element){
            if($element->action == $action){
                $route = $element;
                break;
            }
        }
        echo call_user_func($route->callback);
    }  
}
