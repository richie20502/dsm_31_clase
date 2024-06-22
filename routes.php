<?php

use App\Core\Router;

$router = new Router();

$router->add('/lista/usuarios', 'HomeController@index');


return $router;