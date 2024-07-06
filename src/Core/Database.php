<?php

namespace App\Core;

use mysqli;

class Database{
    private static $instance = null;
    private $connection;

    private function __construct(){
        $this->connect();
    }

    public static function getInstance(){
        if(self::$instance === null){
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function connect(){
        $host = $_ENV['DB_HOST'];
        $user = $_ENV['DB_USER'];
        $password = $_ENV['DB_PASS'];
        $database = $_ENV['DB_NAME'];

        $this->connection = new mysqli($host, $user, $password, $database);

        if($this->connection->connect_error){
            die('Connection Failed:'. $this->connection->connect_error);
        }
    }

    public function getConnection(){
        return $this->connection;
    }

    private function __clone(){}
    //private function __wakeup(){}


    public function __destruct()
    {
        if($this->connection){
            $this->connection->close();
        }
    }
}
