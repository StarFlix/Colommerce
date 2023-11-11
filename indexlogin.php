<?php

$user = "root";
$pass = "";
$host = "localhost";

$connection = mysqli_connect($host, $user, $pass);
        $datab = "onlymedik";
        $db = mysqli_select_db($connection,$datab);

include_one 'includes/login1.php';
include_one 'includes/user_session.php';

$userSession = new UserSession();
$user = new User();

if(isset($_SESSION['user'])){
    echo "Hay sesión";
}else if(isset($_POST['Usuario']) && isset($_POST['Contraseña'])){
    echo "Validacion del login";
}else{
    echo "Login";
}