<?php

use App\Core\Router;
use App\Middleware\AuthMiddleware;

$router = new Router();

#$router->add('/lista/usuarios', 'HomeController@index');
$router->add('/', 'AuthController@showlogin');
$router->add('/postLogin', 'AuthController@login', 'POST');
$router->add('/register','AuthController@showRegister');
$router->add('/register','AuthController@sendRegister','POST');
$router->add('/home','HomeController@home','GET', [[AuthMiddleware::class, 'handle']]);
$router->add('/logout','AuthController@logout');


$router->add('/products/create','ProductController@create');
$router->add('/products/create','ProductController@store','POST');




return $router;