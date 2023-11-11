<?php 
require_once 'config.php'; 
session_start();
if (!isset($_SESSION['usuario'])){
    header("location: viewcart.php");
}
include_once 'Cart.class.php'; 
$cart = new Cart; 
 

if($cart->total_items() <= 0){ 
    header("Location: index.php"); 
} 
 
$postData = !empty($_SESSION['postData'])?$_SESSION['postData']:array(); 
unset($_SESSION['postData']); 
  
$sessData = !empty($_SESSION['sessData'])?$_SESSION['sessData']:''; 
if(!empty($sessData['status']['msg'])){ 
    $statusMsg = $sessData['status']['msg']; 
    $statusMsgType = $sessData['status']['type']; 
    unset($_SESSION['sessData']['status']); 
} 
?>

<!DOCTYPE html>
<html lang="en">
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Colommerce</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="Logo/Logo2.png" type="image/x-icon">
    <link rel="stylesheet" href="styless.css">
    <link rel="stylesheet" href="estilos.css">
    <link rel="stylesheet" href="carritoDiseño.css">
</head>
<body>
    <nav class="menu">
        <section class="menu__container">
        <img data-aos="fade-up" src="Logo/Logox2.png" class="menu__logo"></img>

        <ul class="menu__links">
            <li class="menu__item">
                <a href="perfil.php" class="menu__link">Perfil<img src="imagenes/despligue.svg" class="menu__arrow"></a>
            </li>

            <li class="menu__item">
                <a href="cerrar.php" class="menu__link">Cerrar sesión<img src="imagenes/despligue.svg" class="menu__arrow"></a>
             </li>
         </ul>
    </nav>

</head>
<body>
<div class="contenedor">
    <h1 class="titulo">Pedido</h1>
    <div class="col-12">
        <div class="checkout">
            <div class="row">
                <?php if(!empty($statusMsg) && ($statusMsgType == 'success')){ ?>
                <div class="col-md-12">
                    <div class="alert alert-success"><?php echo $statusMsg; ?></div>
                </div>
                <?php }elseif(!empty($statusMsg) && ($statusMsgType == 'error')){ ?>
                <div class="col-md-12">
                    <div class="alert alert-danger"><?php echo $statusMsg; ?></div>
                </div>
                <?php } ?>
				
                <div class="col-md-4 order-md-2 mb-4">
                    <h3 class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-muted">Tu Carrito de Compras</span>
                        <span class="badge badge-secondary badge-pill"><?php echo $cart->total_items(); ?></span>
                    </h3>
                    <ul class="list-group mb-3">
                    <?php 
                    if($cart->total_items() > 0){ 
                        // Get cart items from session 
                        $cartItems = $cart->contents(); 
                        foreach($cartItems as $item){ 
                    ?>
                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                            <div>
                                <h3 class="my-0"><?php echo $item["name"]; ?></h3>
                                <small class="text-muted"><?php echo $item["price"]; ?>(<?php echo $item["qty"]; ?>)</small>
                            </div>
                            <span class="text-muted"><?php echo $item["subtotal"]; ?></span>
                        </li>
                    <?php } } ?>
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Total (<?php echo CURRENCY; ?>)</span>
                            <strong><?php echo $cart->total(); ?></strong>
                        </li>
                    </ul>
                    <a href="viewCart.php" class="btn btn-sm btn-info">+ Añadir más productos</a>
                </div>
                <div class="col-md-8 order-md-1">
                    <h2 class="mb-3">Detalles de Contacto</h2>
                    <form method="post" action="cartAction.php">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="first_name">Nombre</label>
                                <input type="text" class="form-control" name="first_name" value="<?php echo !empty($postData['first_name'])?$postData['first_name']:''; ?>" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="last_name">Apellido</label>
                                <input type="text" class="form-control" name="last_name" value="<?php echo !empty($postData['last_name'])?$postData['last_name']:''; ?>" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="email">Correo</label>
                            <input type="email" class="form-control" name="email" value="<?php echo !empty($postData['email'])?$postData['email']:''; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="phone">Telefono</label>
                            <input type="text" class="form-control" name="phone" value="<?php echo !empty($postData['phone'])?$postData['phone']:''; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="address">Direccion y descripcion del proceso que requiera</label>
                            <input type="text" class="form-control" name="address" value="<?php echo !empty($postData['address'])?$postData['address']:''; ?>" required>
                        </div>
                        <br>
                        <input type="hidden" name="action" value="placeOrder"/>
                        <input class="btn btn-success btn-block" type="submit" name="checkoutSubmit" value="Comprar">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

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