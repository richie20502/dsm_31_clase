<?php

namespace App\Controllers;

use App\Core\Database;

class AuthController{
    private $db;

    public function __construct(){
        $this->db = Database::getInstance();
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
        //print_r($passwordEncryptada);
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
        $email = $_POST['email'];
        $password = $_POST['password'];
        $conecction = $this->db->getConnection();
        $query = $conecction->prepare('SELECT * FROM users WHERE email = ?');
        $query->bind_param('s',$email);
        $query->execute();

        $result = $query->get_result();

        if($result->num_rows === 1){
            $user = $result->fetch_assoc();
            $userPasswordEncrypt = $user['password'];
            $veryPassword = password_verify($password,$userPasswordEncrypt);
            
            if($veryPassword){
                echo "Password correcta";
                session_start();
                $_SESSION['id'] = $user["id"];
                $_SESSION['name'] = $user['first_name'];
                $_SESSION['email'] = $user["email"];
                header('Location: /home');
                exit();
            }else{
                echo "password incorrecta";
            }
        }else{
            echo "usuario existente";
        }
    }

    public function logout(){
        session_start();
        session_destroy();
        header("Location: /");
        exit();
    }
}