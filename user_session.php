<?php

$user = "root";
$pass = "";
$host = "localhost";

$connection = mysqli_connect($host, $user, $pass);
        $datab = "onlymedik";
        $db = mysqli_select_db($connection,$datab);

class UserSession{


    public function __construct(){
        session_start();
    }

    public function setCurrentUser($Usuario){
        $_SESSION['usuario'] = $Usuario;
    }

    public function getCurrentUser(){
        return $_SESSION['usuario'];
    }

    public function closeSession(){

        session_unset();
        session_destroy();
    }

    
}