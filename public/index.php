<?php

require __DIR__.'/../vendor/autoload.php';

use App\Controllers\HomeController;
use App\Core\Env;
ENV::load(__DIR__.'/../');

$controller = new HomeController();

$controller->index();
