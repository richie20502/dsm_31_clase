<?php

namespace App\Controllers;

use App\Core\Database;

class AuthController{
    private $db;

    public function __construct(){
        $this->db = new Database();
    }

    public function showlogin(){
        require __DIR__.'/../Views/login.php';
    }

    public function showRegister(){
        require __DIR__.'/../Views/register.php';
    }

    public function sendRegister(){
        print_r($_POST);
        $nombre= $_POST['nombre'];
        $correo= $_POST['correo'];
        $pasword= $_POST['password'];

        $passwordEncryptada = password_hash($pasword,PASSWORD_DEFAULT);

        print_r($passwordEncryptada);

        $connection = $this->db->getConnection();
        $query = $connection->prepare("INSERT INTO users (first_name, email, password) VALUES (?,?,?)");
        $query->bind_param('sss',$nombre, $correo, $passwordEncryptada);
        if($query->execute()){
            header('Location: /register');
            exit();
        }else{
            print('No se pudo generar el registro');
        }
        

    }

    public function login(){
        print_r($_POST['username']);
        print("<br>");
        print_r($_POST['password']);


    }
}