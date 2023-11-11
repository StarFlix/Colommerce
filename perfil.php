<?php 
include("basedatos.php");
	session_start();
    if (!isset($_SESSION['usuario'])){
        header("location: ingresar.html");
    }
    $usuario = $_SESSION['usuario'];
    $sql = "SELECT Documento, Foto, Nombres, Apellidos, Telefono, Interes,Genero, Edad, Direccion, Correo, Usuario FROM usuario WHERE usuario='$usuario'";
    $resultado = $conexion->query($sql);
    $row = $resultado->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="es">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Colommerce</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="Logo/Logo2.png" type="image/x-icon">
    <link rel="stylesheet" href="estilosnosotros.css">
    <link rel="stylesheet" href="estilos.css">
    <link rel="stylesheet" href="pagina.css">
    <link rel="stylesheet" href="perfilcss.css">
</head>
<body>

    <nav class="menu">
        <section class="menu__container">
            <img src="Logo/Logox2.png" class="menu__logo"></img>
            <ul data-aos="fade-up" class="menu__links">
            <li class="menu__item">
                <a href="indexcarrito.php" class="menu__link">Tienda<img src="imagenes/despligue.svg" class="menu__arrow"></a>
             </li>
             <li class="menu__item">
                <a href="cerrar.php" class="menu__link">Cerrar sesión<img src="imagenes/despligue.svg" class="menu__arrow"></a>
            </li>
         </ul>
    </nav>
<section class="seccion-perfil-usuario">
        <div class="perfil-usuario-header">
            <div class="perfil-usuario-portada">
                <div class="perfil-usuario-avatar">
                    <img src="imagenes/<?php echo utf8_decode($row['Foto']);?>" alt="img-avatar"></img>
                </div>

            </div>
        </div>
        <div class="perfil-usuario-body">
            <div class="perfil-usuario-bio">
                <h3 class="titulo"><?php echo utf8_decode($row['Nombres']);?> <?php echo utf8_decode($row['Apellidos']);?></h3>
                <p class="texto">¡Bienvenido a su perfil, cliente. No olvide en contactarnos si requiere alguna ayuda!</p>
            </div>
            <div class="perfil-usuario-footer">
                <ul class="lista-datos">
                <li><i class="icono fas fa-phone-alt"></i> Usuario:<?php echo utf8_decode($row['Usuario']);?></li>
                <li><i class="icono fas fa-phone-alt"></i> Correo:<?php echo utf8_decode($row['Correo']);?></li>

                    <li><i class="icono fas fa-map-signs"></i> Direccion del cliente: <?php echo utf8_decode($row['Direccion']);?></li> 

                    <li><i class="icono fas fa-phone-alt"></i> Telefono:<?php echo utf8_decode($row['Telefono']);?></li>
                </ul>
                <ul class="lista-datos">
                    <li><i class="icono fas fa-map-marker-alt"></i> Genero: <?php echo utf8_decode($row['Genero']);?></li>
                    <li><i class="icono fas fa-calendar-alt"></i> Edad: <?php echo utf8_decode($row['Edad']);?> años</li>
                </ul>
            </div>
        </div>
        <br>
        </section>
        
<!-- Footer -->

<footer id="footer">
    <div class="contenedor footer-contenido">
            <div class="logo-us">
                <img data-aos="fade-up" class="logo" src="Logo/Logox2.png">
                <img data-aos="fade-up" class="logo" src="Logo/Logo2.png">
            </div>
            <div data-aos="fade-up"  class="media">
                <a href="index.html" class="media-icon">
                    <i class='icono_home'>
                        <img src="imagenes/home.svg" alt="">
                    </i>
                </a>
                <a href="registrar.html" class="media-icon">
                    <i class='icono_nosotros'>
                        <img src="imagenes/question.svg" alt="">
                    </i>
                </a>
                <a href="ingresar.html" class="media-icon">
                    <i class='icono_ingresar' >
                        <img src="imagenes/ingresar.svg" alt="">
                    </i>
                </a>
            </div>
    </div>
    <div class="linea"></div>
    <p  class="derechos">Colommerce</p>
    <br>
    <p  class="contactom"> Contacto: colommerce@gmail.com || +573136769185 || 
        Facebook/Instagram/Twitter: Colommerce ||</p>
</footer>


    <script src="js/funcionespag.js"></script>

    </body>
    </html>
