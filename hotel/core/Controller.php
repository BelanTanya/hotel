<?php

namespace core;

class Controller 
{
    protected $routes = [];
    protected $key;

    public function __construct()
    {
        $arr = require 'core/settings/routes.php';
        $url = explode("/",trim($_SERVER['REQUEST_URI'], '/'));
        foreach ($arr as $key => $value) {
            if($url[0] === $key){
                $this->key = $key;
                $this->routes = $value;
            }elseif(!$url[0]){
                $this->key = $key[0];
                $this->routes = $arr['home'];
            }
        }
        if($this->key){

            $path = 'core\Model';
            $action = $this->routes['action'].'Action';
            $model = new $path($this->routes);
            $model->$action();
        }else{
            echo 'error';
        }
    }
}