<?php
namespace App\Models;

use App\Core\Database;

class Product{
    private $conn;

    public function __construct(){
        $this->conn =  Database::getInstance()->getConnection();
    }

    public function create($data){
        
    }

}