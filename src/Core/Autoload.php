<?php

namespace App\Core;

class Autoload {
    public static function register(){
        spl_autoload_register(function ($class){
            $prefix = 'App\\';
            $base_dir = __DIR__.'/../';
            print($base_dir);
            $len = strlen($prefix);
            print($len) ;
            if( strncmp($prefix, $base_dir, $len ) !== 0){
                return;
            }
            $relative_class = substr($class, $len);
            $file = $base_dir. str_replace('\\', '/', $relative_class) .'.php';
            if(file_exists($file)){
                require $file;
            }
        });   
    }
}

Autoload::register();