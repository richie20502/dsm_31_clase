<?php

namespace App\Controllers;

use App\Core\Database;
use App\Models\User;

class HomeController {
    private $db;
    public function __construct(){
        $this->db = new Database();
    }

    public function index(){
        $connection = $this->db->getConnection();

        $resquest = $connection->query("SELECT * FROM users");
        //die($resquest);
        //print_r($resquest);

        $users = [];

        while($row = $resquest->fetch_assoc()){
            $users[] = new User($row['first_name'], $row['last_name']);
        }
        
        require __DIR__. '/../Views/home.php';           
    }

    public function home(){
        require __DIR__.'/../Views/home.php';
    }

} 