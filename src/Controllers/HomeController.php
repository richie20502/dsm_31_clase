<?php

namespace App\Controllers;

class HomeController {

    public function index(){
        $user = new \App\Models\User('Ricardo','Lugo');
        require __DIR__. '/../Views/home.php';
    }

} 