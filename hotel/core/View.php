<?php

namespace core;


class View
{
    public $errMsg;
    public $routes;
    public $arr;

    public function __construct($routes)
    {
        $this->routes = $routes;
    }

    public function render($errMsg = '', $arr = []){
        $this->arr = $arr;
        if($_SESSION){
            $link = 'http://hotel/logout';
            $name = 'Выйти';
        }else{
            $link = 'http://hotel/login';
            $name = 'Войти';
        }
        $this->errMsg = $errMsg;
        if($this->routes['style']){
            $style = '<link rel="stylesheet" href="../core/views/css/'.$this->routes['style'].'.css">';
        }else{
            $style = '';
        }
        if($this->routes['script']){
            $script = '<script src="../core/views/js/'.$this->routes['script'].'.js"></script>';
        }else{
            $script = '';
        }
        if($this->routes['ajax']){
            $ajax = '<script src="../core/views/js/'.$this->routes['ajax'].'.js"></script>';
        }else{
            $ajax = '';
        }
        require 'core/views/header.php';
        require 'core/views/'.$this->routes['view'].'.php';
        require 'core/views/footer.php';
       
    }
}