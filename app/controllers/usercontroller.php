<?php

namespace MVC\controllers;
use MVC\core\controller;
use MVC\core\Session;
use MVC\models\user;
use Rakit\Validation\Validator;

class usercontroller extends controller
{
    public function __construct()
    {
        Session::start();
        $user_data = Session::get('user');
        
        if (empty($user_data)) {
            echo 'Class not access';
            die;
        }
    }

    public function index()
    {
        echo 'user';
    }
}