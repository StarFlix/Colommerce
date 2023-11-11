<?php
$usuario=$_POST['usuario'];
$contraseña=sha1($_POST['contraseña']);
session_start();
$_SESSION['usuario']=$usuario;

$conexion=mysqli_connect("localhost","id21381387_root","8Dj^&@QlQ}o<i)u_","id21381387_colommerce");

$consulta="SELECT*FROM usuario where usuario='$usuario' and contraseña='$contraseña'";
$resultado=mysqli_query($conexion,$consulta);

$filas=mysqli_fetch_array($resultado);

if($filas['id_cargo']==1){ 
    header("location:perfil.php");

}else
if($filas['id_cargo']==2){ 
header("location:AdminPerfil.php");
}
else{
    ?>
    <?php
    include("index.html");
    ?>
    <h1 class="bad">ERROR EN LA AUTENTIFICACION</h1>
    <?php
}
mysqli_free_result($resultado);
mysqli_close($conexion);
