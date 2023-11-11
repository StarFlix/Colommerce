<?php 

$user = "root";
$pass = "";
$host = "localhost";


$connection = mysqli_connect($host, $user, $pass);


$doc=$_POST['Documento'];
$foto=$_POST['Foto'];
$nom=$_POST['Nombres'];
$ape=$_POST['Apellidos'];
$edad=$_POST['Edad'];
$genero=$_POST['Genero'];
$tel=$_POST['Telefono'];
$correo=$_POST['Correo'];
$direccion=$_POST['Direccion'];
$Interes=$_POST['Interes'];
$id_cargo=$_POST['id_cargo'];
$Usuario=$_POST['usuario'];
$Contraseña=sha1($_POST['Contraseña']);

if(!$connection) 
        {
            echo "No se ha podido conectar con el servidor" . mysql_error();
        }
  else
        {
            echo "<b><h3>Hemos conectado al servidor</h3></b>" ;
        }
        $datab = "colommerce";
        $db = mysqli_select_db($connection,$datab);

        if (!$db)
        {
            echo "<h3>No se ha podido registrar" ;
        }
        else
        {
  
        include("ingresar.html");
        echo "REGISTRADO";
        }
        $instruccion_SQL = "INSERT INTO usuario VALUES ('$doc','$foto','$nom','$ape','$edad','$genero','$tel','$correo','$direccion','$Interes','$id_cargo','$Usuario','$Contraseña')";                    
        $resultado = mysqli_query($connection,$instruccion_SQL);

        $consulta = "SELECT * FROM usuario";
        

?>