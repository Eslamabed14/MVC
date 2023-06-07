<?php 

namespace MVC\core;

class App 
{
    private $controller = 'home'; 
    private $method  = 'index'; 
    private $params = []; 

    public function __construct()
    {
        $this->url();
        $this->render();
    }

    private function url()
    {   
        if (!empty($_SERVER['QUERY_STRING'])) {
            $url = explode( "/" , $_SERVER['QUERY_STRING']);
            $this->controller = isset($url[0]) ? $url[0]."controller" : "homecontroller"; // class
            $this->method = isset($url[1]) ? $url[1] : "index"; // function
            unset($url[0] , $url[1]);
            $this->params = array_values($url); // props
        } else{
            $this->controller = 'homecontroller';
            $this->method = 'index';
        }
       
    }

    private function render()
    {
        $controller = "MVC\controllers\\".$this->controller;
        if (class_exists($controller)) {
            $controller = new $controller;

            if (method_exists($controller,$this->method)) {
               call_user_func_array([$controller,$this->method],$this->params);
            } else {
                echo 'Method not exist';
            }
        } else {
            echo 'Class not exist';
        }
    }
}