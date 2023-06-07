<?php

namespace MVC\controllers;

use MVC\core\controller;
use MVC\models\user;

class homecontroller extends controller
{
    public function index()
    {   
        $user = new user();
        $data = $user->getAllUsers();
       // $data = $this->db()->rows("SELECT * FROM users");
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