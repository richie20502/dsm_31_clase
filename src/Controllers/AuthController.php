<?php

namespace App\Controllers;
class AuthController{

    public function showlogin(){
        require __DIR__.'/../Views/login.php';
    }

    public function login(){
        print_r($_POST['username']);
        print("<br>");
        print_r($_POST['password']);


    }
}