<?php
namespace App\Models;

use App\Core\Database;

class Category {
    private $conn;

    public function __construct(){
        $this->conn = Database::getInstance()->getConnection();
    }

    public function getAll(){
        $sql = "SELECT  *  FROM product_categories";
        $query = $this->conn->query($sql);
        $categories=[];
        while($row = $query->fetch_assoc()){
            $categories[] = $row;
        }
        return $categories;
    }
}