<?php

use App\Core\Router;

$router = new Router();

$router->add('/lista/usuarios', 'HomeController@index');
$router->add('/login', 'CONTROLADOR NUEVIO@funcionnueva');



return $router;