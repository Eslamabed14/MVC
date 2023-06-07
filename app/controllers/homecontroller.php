<?php

namespace MVC\controllers;

use MVC\core\controller;

class homecontroller extends controller
{
    public function index()
    {   
        
        $data = $this->db()->rows("SELECT * FROM users");
        $title = 'home index';
        $h1 = 'ESLAM - ABED';
        $this->view("\home\index" ,["title"=>$title , 'h1' => $h1 , 'data' => $data]);
    }

    public function add()
    {
        echo 'add';
    }

    public function login()
    {
        $this->view("\home\login" , ["title" => "LOGIN"]);
    }
}