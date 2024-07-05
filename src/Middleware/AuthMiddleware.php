<?php
namespace App\Middleware;

class AuthMiddleware {
    public static function handle(){
        session_start();
        if(!isset($_SESSION['id'])){
            header('Location: /');
            exit();
        }
    }
}