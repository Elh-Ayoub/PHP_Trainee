<?php
spl_autoload_register(function ($class_name) {
    include ''.$class_name . '.php';
});
// require './router.php';
// require './Models/Model.php';
// require './Models/Post.php';

class Route extends router{

    protected $name = null;

    public $action;

    public $callback;

    public static function get($action, $callback){
        $o = new self;
        $action = trim($action, '/'); 

        $o->action = $action;
        $o->callback = $callback;

        array_push(Route::$routes, $o);
        return $o;
    }

    // public static function post($action, $callback){...}
}
