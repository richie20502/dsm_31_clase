<?php
namespace App\Core;
use Dotenv\Dotenv;

class Env {
    public static function load($dir) {
        if(!file_exists($dir.'/.env')){
            throw new \Exception('El Archivo no existe');
        }
        $dotenv = Dotenv::createImmutable($dir);
        $dotenv->load();
    }
}

