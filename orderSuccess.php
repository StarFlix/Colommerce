<?php 
if(empty($_REQUEST['id'])){ 
    header("Location: index.php"); 
} 
$order_id = base64_decode($_REQUEST['id']); 
 
// Include the database connection file 
require_once 'dbConnect.php'; 
 
// Fetch order details from the database 
$sqlQ = "SELECT r.*, c.first_name, c.last_name, c.email, c.phone, c.address FROM orders as r LEFT JOIN customers as c ON c.id = r.customer_id WHERE r.id=?"; 
$stmt = $db->prepare($sqlQ); 
$stmt->bind_param("i", $db_id); 
$db_id = $order_id; 
$stmt->execute(); 
$result = $stmt->get_result(); 
 
if($result->num_rows > 0){ 
    $orderInfo = $result->fetch_assoc(); 
}else{ 
    header("Location: indexcarrito.php"); 
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
    <h1 class="titulo">Estado del Pedido</h1>
    <div class="col-12">
        <?php if(!empty($orderInfo)){ ?>
            <div class="col-md-12">
                <div class="alert alert-success">Su pedido ha sido realizado correctamente.</div>
            </div>
			
            <!-- Order status & shipping info -->
            <div class="row col-lg-12 ord-addr-info">
                <div class="hdr">Informacion del Pedido</div>
                <p><b>ID de la orden:</b> #<?php echo $orderInfo['id']; ?></p>
                <p><b>Total:</b> <?php echo $orderInfo['grand_total'].' '.CURRENCY; ?></p>
                <p><b>Pedido el:</b> <?php echo $orderInfo['created']; ?></p>
                <p><b>Nombre del comprador:</b> <?php echo $orderInfo['first_name'].' '.$orderInfo['last_name']; ?></p>
                <p><b>Correo:</b> <?php echo $orderInfo['email']; ?></p>
                <p><b>Telefono:</b> <?php echo $orderInfo['phone']; ?></p>
                <p><b>Direccion:</b> <?php echo $orderInfo['address']; ?></p>
            </div>
			
            <!-- Order items -->
            <div class="row col-lg-12">
                <table class="table table-hover cart">
                    <thead>
                        <tr>
                            <th width="10%"></th>
                            <th width="45%">Producto</th>
                            <th width="15%">Precio</th>
                            <th width="10%">Cantidad del Producto</th>
                            <th width="20%">Precio total del Producto</th>
                            </tr>
                        </thead>
                        <tbody>
                    <?php 
                    // Get order items from the database 
                    $sqlQ = "SELECT i.*, p.name, p.price FROM order_items as i LEFT JOIN products as p ON p.id = i.product_id WHERE i.order_id=?"; 
                    $stmt = $db->prepare($sqlQ); 
                    $stmt->bind_param("i", $db_id); 
                    $db_id = $order_id; 
                    $stmt->execute(); 
                    $result = $stmt->get_result(); 
                     
                    if($result->num_rows > 0){  
                        while($item = $result->fetch_assoc()){ 
                            $price = $item["price"]; 
                            $quantity = $item["quantity"]; 
                            $sub_total = ($price*$quantity); 
                            $proImg = !empty($item["image"])?'imagenes/'.$item["image"]:'imagenes/'; 
                    ?>
                            <tr>
                                <td><img src="<?php echo $proImg; ?>" alt="..."></td>
                                <td><?php echo $item["name"]; ?></td>
                                <td><?php echo $price.' '.CURRENCY; ?></td>
                                <td><?php echo $quantity; ?></td>
                            <td><?php echo $sub_total.' '.CURRENCY; ?></td>
                        </tr>
                    <?php } } ?>
                    </tbody>
                </table>
            </div>
            
            <div class="col mb-2">
                <div class="row">
                    <div class="col-sm-12  col-md-6">
                        <a href="indexcarrito.php" class="btn btn-block btn-primary"><i class="ialeft"></i>Seguir comprando</a>
                    </div>
                </div>
            </div>
        <?php }else{ ?>
        <div class="col-md-12">
            <div class="alert alert-danger">Su pedido no ha podido ser realizado.</div>
        </div>
        <?php } ?>
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