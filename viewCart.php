<?php 
require_once 'config.php'; 
session_start();
if (!isset($_SESSION['usuario'])){
    header("location: indexcarrito.php");
}
include_once 'Cart.class.php'; 
$cart = new Cart; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Colommerce</title>

<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OnlyMedik</title>
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

<script src="js/jquery.min.js"></script>

<script>
function updateCartItem(obj,id){
    $.get("cartAction.php", {action:"updateCartItem", id:id, qty:obj.value}, function(data){
        if(data == 'ok'){
            location.reload();
        }else{
            alert('Cart update failed, please try again.');
        }
    });
}
</script>
</head>
<body>
<section class="contenedor">
    <h1 class="titulo">CARRITO DE COMPRAS</h1>
    <div class="row">
        <div class="cart">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-striped cart">
                        <thead>
                            <tr>
                                <th width="10%"></th>
                                <th width="35%">Productos</th>
                                <th width="15%">Precio</th>
                                <th width="15%">Cantidad</th>
                                <th width="20%">Total</th>
                                <th width="5%"> </th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                        if($cart->total_items() > 0){ 
                            // Get cart items from session 
                            $cartItems = $cart->contents(); 
                            foreach($cartItems as $item){ 
                                $proImg = !empty($item["image"])?'imagenes/'.$item["image"]:'imagenes/'; 
                        ?>
                            <tr>
                                <td><img class= "card-img-top" src="<?php echo $proImg; ?>" alt="..."></td>
                                <td><?php echo $item["name"]; ?></td>
                                <td><?php echo $item["price"].' '.CURRENCY; ?></td>
                                <td><input class="form-control" type="number" value="<?php echo $item["qty"]; ?>" onchange="updateCartItem(this, '<?php echo $item["rowid"]; ?>')"/></td>
                                <td><?php echo $item["subtotal"].' '.CURRENCY; ?></td>
                                <td><button class="btn btn-sm btn-danger" onclick="return confirm('Estas seguro de querer eliminar el producto?')?window.location.href='cartAction.php?action=removeCartItem&id=<?php echo $item["rowid"]; ?>':false;" title="Remove Item"><i class="itrash"></i> </button> </td>
                            </tr>
                        <?php } }else{ ?>
                            <tr><td colspan="6"><p>Tu carrito de compras se encuentra vacio...</p></td>
                        <?php } ?>
                        <?php if($cart->total_items() > 0){ ?>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><strong>Precio total</strong></td>
                                <td><strong><?php echo $cart->total().' '.CURRENCY; ?></strong></td>
                                <td></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col mb-2">
                <div class="row">
                    <div class="col-sm-12  col-md-6">
                        <a href="indexcarrito.php" class="btn btn-block btn-secondary"><i class="ialeft"></i>Seguir comprando</a>
                    </div>
                    <div class="col-sm-12 col-md-6 text-right">
                        <?php if($cart->total_items() > 0){ ?>
                        <a href="checkout.php" class="btn btn-block btn-primary">Proceder a la compra<i class="iaright"></i></a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
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