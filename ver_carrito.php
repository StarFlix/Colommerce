<!DOCTYPE html>
<html lang="es">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OnlyMedik</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="imagenes\icono2.png" type="image/x-icon">
    <link rel="stylesheet" href="estilosnosotros.css">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="pagina.css">
    <link rel="stylesheet" href="carrito.css">
    <link rel="stylesheet" href="perfilcss.css">
    <link rel="stylesheet" href="https://unpkg.com/bulma@0.9.1/css/bulma.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">

</head>
<body>

    <nav class="menu">
        <section class="menu__container">
            <img src="logo/ESLOGAN TRAZADO.png" class="menu__logo"></img>
            <ul data-aos="fade-up" class="menu__links">
            <li class="menu__item">
                <a href="TIENDA.PHP" class="menu__link">VER TIENDA<img src="imagenes/despligue.svg" class="menu__arrow"></a>
             </li>
             <li class="menu__item">
                <a href="perfil.php" class="menu__link">PERFIL<img src="imagenes/despligue.svg" class="menu__arrow"></a>
            </li>
             <li class="menu__item">
                <a href="index.html" class="menu__link">CERRAR SESION<img src="imagenes/despligue.svg" class="menu__arrow"></a>
            </li>
         </ul>
    </nav>

<?php
include_once "funciones.php";
$productos = obtenerProductosEnCarrito();
if (count($productos) <= 0) {
?>
    <section class="hero is-info">
        <div class="hero-body">
            <div class="container">
                <h1 class="title">
                    Todavía no hay productos
                </h1>
                <h2 class="subtitle">
                    Visita la tienda para agregar productos a tu carrito
                </h2>
                <a href="tienda.php" class="button is-warning">Ver tienda</a>
            </div>
        </div>
    </section>
<?php } else { ?>
    <section class="Carrito">
    <div class="columns">
        <div class="column">
            <h2 class="is-size-2">Mi carrito de compras</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Precio</th>
                        <th>Quitar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $total = 0;
                    foreach ($productos as $producto) {
                        $total += $producto->precio;
                    ?>
                        <tr>
                            <td><?php echo $producto->nombre ?></td>
                            <td><?php echo $producto->descripcion ?></td>
                            <td>$<?php echo number_format($producto->precio, 2) ?></td>

                            <td>
                                <form action="eliminar_del_carrito.php" method="post">
                                    <input type="hidden" name="id" value="<?php echo $producto->id ?>">
                                    <input type="hidden" name="redireccionar_carrito">
                                    <button class="button is-danger">
                                        <i class="fa fa-trash-o"></i>
                                    </button>
                                </form>
                            </td>
                        <?php } ?>
                        </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="2" class="is-size-4 has-text-right"><strong>Total</strong></td>
                        <td colspan="2" class="is-size-4">
                            $<?php echo number_format($total, 2) ?>
                        </td>
                    </tr>
                </tfoot>
            </table>
            <a href="perfil.php" class="button is-success is-large"><i class="fa fa-check"></i>&nbsp;Terminar compra </a> 

        </div>
    </div>
<?php } ?>
<footer id="footer">
        <div class="contenedor footer-contenido">
                <div class="logo-us">
                    <img class="logo" src="Logo/logo_trazado.png">
                    <img class="logo" src="logo/ESLOGAN TRAZADO.png" alt="">
                </div>
                <div class="media">
                    <a href="perfil.php" class="media-icon">
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
        <p class="derechos">OnlyMedik</p>
    </footer>

    <script src="js/funcionespag.js"></script>

    </body>
    </html>