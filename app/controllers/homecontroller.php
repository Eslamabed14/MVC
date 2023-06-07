<?php

namespace MVC\controllers;
use MVC\core\controller;
use MVC\models\user;
use Rakit\Validation\Validator;

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
    public function postLogin()
    {   
        $validator = new Validator;
        $validation = $validator->validate($_POST , [
            'email'                 => 'required|email',
        ]);
        if ($validation->fails()) {
            // handling errors
            $errors = $validation->errors();
            echo "<pre>";
            print_r($errors->firstOfAll());
            echo "</pre>";
            exit;
        } else {
            // validation passes
            echo "Success!";
        }
    }
}