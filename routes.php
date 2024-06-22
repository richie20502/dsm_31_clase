<?php

use App\Core\Router;

$router = new Router();

#$router->add('/lista/usuarios', 'HomeController@index');
$router->add('/login', 'AuthController@showlogin');
$router->add('/postLogin', 'AuthController@login', 'POST');



return $router;