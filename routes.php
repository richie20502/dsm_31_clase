<?php

use App\Core\Router;

$router = new Router();

#$router->add('/lista/usuarios', 'HomeController@index');
$router->add('/', 'AuthController@showlogin');
$router->add('/postLogin', 'AuthController@login', 'POST');
$router->add('/register','AuthController@showRegister');
$router->add('/register','AuthController@sendRegister','POST');
$router->add('/home','HomeController@home');
$router->add('/logout','AuthController@logout');




return $router;