<?php 
require_once 'dbConnect.php'; 
session_start();
if (!isset($_SESSION['usuario'])){
    header("location: perfil.php");
}
include_once 'Cart.class.php'; 
$cart = new Cart; 
 
$sqlQ = "SELECT * FROM products"; 
$stmt = $db->prepare($sqlQ); 
$stmt->execute(); 
$result = $stmt->get_result(); 
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
    <link rel="stylesheet" href="carritoDiseño.css">

</head>
<body>
    <nav class="menu">
        <section class="menu__container">
        <img src="Logo/Logox2.png" class="menu__logo"></img>

        <ul class="menu__links">
        <li class="menu__item">
        <a href="viewCart.php" class="menu__link"><i class="icart"></i> <?php echo ($cart->total_items() > 0)?$cart->total_items().' - Producto/s en carrito ' : 0; ?></a>
</li>
        <li class="menu__item">
                <a href="perfil.php" class="menu__link">Perfil<img src="imagenes/despligue.svg" class="menu__arrow"></a>
            </li>

            <li class="menu__item">
                <a href="cerrar.php" class="menu__link">Cerrar sesión<img src="imagenes/despligue.svg" class="menu__arrow"></a>
             </li>


    </nav>
</head>
<body>
<div class="container">
    <h1 class="titulo">PRODUCTOS</h1>
	
    <div class="cart-view">
       
        <br>
        <br>
    </div>
    
    <div class="row col-lg-12">
    <?php 
    if($result->num_rows > 0){ 
        while($row = $result->fetch_assoc()){ 
            $proImg = !empty($row["image"])?'imagenes/'.$row["image"]:'imagenes/'; 
    ?>
        <div class="card" style="width: 900px";>
            <img src="<?php echo $proImg; ?>" class="card-img-top" alt="...">
            <div class="card-body">
                <h2 class="card-title"><?php echo $row["name"]; ?></h2>
                <h3 class="card-subtitle mb-2 text-muted">Precio: <?php echo $row["price"].' '.CURRENCY; ?></h3>
                <p class="card-text"><?php echo $row["description"]; ?></p>
                <a href="cartAction.php?action=addToCart&id=<?php echo $row["id"]; ?>" class="cta">Añadir al carrito</a>
            </div>
        </div>
        <br>
        <br>
        <br>
    <?php } }else{ ?>
        <p>No se han encontrado los productos.....</p>
    <?php } ?>
    </div>
</div>

<!-- FOOTER -->

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